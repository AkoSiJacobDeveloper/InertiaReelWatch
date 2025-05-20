<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import { ref } from 'vue';

const props = defineProps({
    recommendations: {
        type: Array,
        default: () => []
    },
    error: {
        type: String,
        default: ''
    },
    movie: {
        type: Object,
        default: () => ({ title: 'Unknown Movie' })
    }
});

const scrollContainer = ref(null);

const scroll = (direction) => {
    if (scrollContainer.value) {
        const scrollAmount = 300; 
        const currentScroll = scrollContainer.value.scrollLeft;
        const newScroll = direction === 'left' 
            ? currentScroll - scrollAmount 
            : currentScroll + scrollAmount;

        scrollContainer.value.scrollTo({
            left: newScroll,
            behavior: 'smooth'
        });
    }
};
</script>

<template>
    <section class="py-16 px-5 md:px-16 md:mx-16 relative">
        <div class="py-5 md:py-10 text-center mb-10">
            <h1 class="font-bebas font-bold text-4xl md:text-5xl lg:text-6xl">Recommended Movies</h1>
            <p class="font-[Poppins] text-sm md:text-base">Discover your next favorite movie.</p>
        </div>

        <!-- Error or empty state -->
        <div v-if="error" class="text-red-600 font-semibold text-center mb-6">
            {{ error }}
        </div>
        <div v-else-if="recommendations.length === 0" class="text-center font-[Poppins] text-white/70 mb-6">
            Sorry, No recommendations available.
        </div>

        <!-- Scrollable recommendations -->
        <div v-if="recommendations.length" class="relative">
            <!-- Navigation Buttons -->
            <div class="absolute top-1/2 -translate-y-1/2 left-0 right-0 flex justify-between z-10">
                <button @click="scroll('left')" 
                    class="text-white/80 hover:text-white p-2 rounded-full transition-all duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <button @click="scroll('right')" 
                    class="text-white/80 hover:text-white p-2 rounded-full transition-all duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>

            <!-- Scrollable container -->
            <div ref="scrollContainer" class="flex overflow-x-auto gap-6 pb-6 snap-x snap-mandatory px-12">
                <div v-for="movie in recommendations" :key="movie.id" class="flex-none w-72 snap-center">
                    <div class="rounded-lg shadow-md overflow-hidden h-full">
                        <img v-if="movie.poster_path" 
                            :src="`https://image.tmdb.org/t/p/w500${movie.poster_path}`" 
                            :alt="movie.title"
                            class="w-full h-auto">
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped>
.overflow-x-auto::-webkit-scrollbar {
    display: none;
}
.overflow-x-auto {
    -ms-overflow-style: none;
    scrollbar-width: none;
}
</style>
