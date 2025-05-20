<script setup>

const features = [
    {
        image: '/Images/search.svg',
        heading: 'Browse and Search',
        description: 'Search for movies, TV shows, and people. Filter by genre, release date, and more.',
    },
    {
        image: '/Images/plus.svg',
        heading: 'Create Watchlists',
        description: 'Create and manage your watchlists. Add movies and shows to your watchlist with a single click.',
    },
    {
        image: '/Images/list.svg',
        heading: 'Track Your Progress',
        description: 'Keep track of what you\'ve watched and what you want to watch next. Mark movies and shows as watched.',
    },
    {
        image: '/Images/eye.svg',
        heading: 'Watch Trailers',
        description: 'Watch trailers and previews for movies and shows. Get a sneak peek before you watch.',
    }
]
</script>

<template>
    <section class=" p-5 md:p-7 md:px-16 md:mx-16 flex flex-col justify-center items-center gap-10">
        <div class="py-5 md:py-10 text-center">
            <h1 class="font-bebas font-bold text-4xl md:text-5xl lg:text-6xl">Features</h1>
            <p class="font-[Poppins] text-sm md:text-base">All the tools you need to explore, preview, and decide — before you press play elsewhere.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-5 w-full">
            <div class="bg-[#171717] rounded-lg p-5 h-[50vh] flex justify-center  flex-col" v-for="(feature, index) in features" :key="index">
                <div class="bg-[#A31621] rounded-full w-12 h-12 flex justify-center items-center mb-5">
                    <img class="fill-white" :src="feature.image" alt="">
                </div>
                <h3 class="font-[Poppins] font-bold text-xl mb-3">{{ feature.heading }}</h3>
                <p class="text-sm features">{{ feature.description }}</p>
            </div>
        </div>
    </section>
</template>