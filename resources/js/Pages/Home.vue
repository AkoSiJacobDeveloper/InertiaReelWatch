<script setup>
import Layout from '@/Layouts/GuestLayout.vue';
import { ref } from 'vue';

const props = defineProps({
    moviesByGenre: {
        type: Object,
        default: () => ({})
    },
    error: {
        type: String,
        default: ''
    }
});

const scrollContainer = ref({});

const scroll = (direction, genre) => {
    const container = scrollContainer.value[genre];
    if (container) {
        const scrollAmount = 300;
        const currentScroll = container.scrollLeft;
        const newScroll = direction === 'left' 
            ? currentScroll - scrollAmount 
            : currentScroll + scrollAmount;
        
        container.scrollTo({
            left: newScroll,
            behavior: 'smooth'
        });
    }
};
</script>

<template>
    <Layout>
        <main class="py-28 px-5 md:px-16 md:mx-16 relative min-h-screen">
            <h1 class="text-2xl md:text-3xl font-bold mb-6 font-[Poppins]">Movies</h1>
            <div v-if="error" class="text-red-500 mb-4">
                {{ error }}
            </div>
            <div v-else-if="Object.keys(moviesByGenre).length === 0" class="text-gray-500">
                No movies available at the moment.
            </div>
            <div v-else class="space-y-8">
                <div v-for="(movies, genre) in moviesByGenre" :key="genre" class="genre-section">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl md:text-2xl font-semibold font-[Poppins]">{{ genre }}</h2>
                        <div class="flex gap-2">
                            <button @click="scroll('left', genre)" 
                                class="p-2 rounded-full bg-[#171717] hover:bg-[#A31621] transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                </svg>
                            </button>
                            <button @click="scroll('right', genre)"
                                class="p-2 rounded-full bg-[#171717] hover:bg-[#A31621] transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div :ref="el => scrollContainer[genre] = el" 
                        class="flex overflow-x-auto gap-4 pb-4 snap-x snap-mandatory scrollbar-hide">
                        <div v-for="movie in movies" :key="movie.id" 
                            class="flex-none w-48 md:w-56 snap-center">
                            <div class="movie-card bg-[#171717] rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300">
                                <img 
                                    :src="`https://image.tmdb.org/t/p/w500${movie.poster_path}`" 
                                    :alt="movie.title" 
                                    class="w-full h-auto object-cover"
                                >
                                <div class="p-3">
                                    <h3 class="font-semibold text-sm line-clamp-1 font-[Poppins]">{{ movie.title }}</h3>
                                    <p>{{ movie.detail }}</p>
                                    <p class="text-xs text-gray-400 release-date">{{ movie.release_date }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </Layout>
</template>

<style scoped>
.scrollbar-hide {
    -ms-overflow-style: none;
    scrollbar-width: none;
}
.scrollbar-hide::-webkit-scrollbar {
    display: none;
}

.movie-card {
    transition: transform 0.2s;
}

.movie-card:hover {
    transform: translateY(-5px);
}

.line-clamp-1 {
    display: -webkit-box;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>