<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Http;
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
}
