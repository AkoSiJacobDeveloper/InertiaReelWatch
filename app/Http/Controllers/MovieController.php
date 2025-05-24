<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Client\RequestException;

class MovieController extends Controller
{
    public function getRecommendations()
    {
        try {
            // Get a popular movie to base recommendations on
            $response = Http::get('https://api.themoviedb.org/3/movie/popular', [
                'api_key' => env('TMDB_API_KEY'),
            ]);

            if (!$response->successful()) {
                throw new \Exception('Failed to fetch popular movies.');
            }

            $popularMovies = $response->json();

            // Get recommendations based on the first popular movie
            $recommendations = [];

            if (!empty($popularMovies['results'])) {
                $firstMovie = $popularMovies['results'][0];

                $recommendationsResponse = Http::get("https://api.themoviedb.org/3/movie/{$firstMovie['id']}/recommendations", [
                    'api_key' => env('TMDB_API_KEY'),
                ]);

                if ($recommendationsResponse->successful()) {
                    $recommendations = $recommendationsResponse->json();
                } else {
                    throw new \Exception('Failed to fetch recommendations.');
                }
            }

            return Inertia::render('Welcome', [
                'recommendations' => $recommendations['results'] ?? [],
                'error' => null,
            ]);

        } catch (\Exception $e) {
            // Catch both HTTP and general exceptions
            return Inertia::render('Welcome', [
                'recommendations' => [],
                'error' => 'Error fetching movie data: ' . $e->getMessage(),
            ]);
        }
    }

    public function getMovies() {
        try {
            $moviesByGenre = [];
            $totalPages = 3; // Fetch 3 pages of movies (60 movies total)

            // Fetch multiple pages of popular movies
            for ($page = 1; $page <= $totalPages; $page++) {
                $response = Http::get('https://api.themoviedb.org/3/movie/popular', [
                    'api_key' => env('TMDB_API_KEY'),
                    'language' => 'en-US',
                    'page' => $page
                ]);

                if (!$response->successful()) {
                    throw new \Exception('Failed to fetch popular movies.');
                }

                $movies = $response->json()['results'] ?? [];

                // Get detailed information for each movie and group by genre
                foreach ($movies as $movie) {
                    $movieResponse = Http::get("https://api.themoviedb.org/3/movie/{$movie['id']}", [
                        'api_key' => env('TMDB_API_KEY'),
                        'language' => 'en-US'
                    ]);

                    if ($movieResponse->successful()) {
                        $movieDetails = $movieResponse->json();
                        $genres = $movieDetails['genres'] ?? [];
                        
                        // Add movie to each of its genres
                        foreach ($genres as $genre) {
                            $genreName = $genre['name'];
                            if (!isset($moviesByGenre[$genreName])) {
                                $moviesByGenre[$genreName] = [];
                            }
                            // Only add the movie if it's not already in this genre
                            if (!in_array($movie['id'], array_column($moviesByGenre[$genreName], 'id'))) {
                                $moviesByGenre[$genreName][] = $movie;
                            }
                        }
                    }
                }
            }

            // Sort genres by number of movies (descending)
            uasort($moviesByGenre, function($a, $b) {
                return count($b) - count($a);
            });

            // Only keep genres that have at least 5 movies
            $moviesByGenre = array_filter($moviesByGenre, function($movies) {
                return count($movies) >= 5;
            });

            return Inertia::render('Home', [
                'moviesByGenre' => $moviesByGenre,
                'error' => null
            ]);
        } catch (\Exception $e) {
            Log::error('Error in getMovies: ' . $e->getMessage());
            return Inertia::render('Home', [
                'moviesByGenre' => [],
                'error' => 'Error fetching movie data: ' . $e->getMessage()
            ]);
        }
    }
}
