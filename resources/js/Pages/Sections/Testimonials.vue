<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import { ref } from 'vue';

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

const testimonials = [
    { 
        img: '/Images/user.png',
        name: 'Samantha R.',
        roles: 'Movie Enthusiast',
        message: "I absolutely love this site! Being able to create my own watchlist has completely changed how I plan my movie nights. The interface is super clean, and the trailer previews are a fantastic touch. It's like having my own personalized cinema guide!"
    },
    {
        img: '/Images/user.png',
        name: 'Marcus T.',
        roles: 'Film Buff',
        message: "Finally, a website that understands what movie lovers need! I can add movies I want to see to my watchlist with just one click, and the trailer feature helps me decide what to watch next. It's smooth, fast, and incredibly user-friendly."
    },
    {
        img: '/Images/user.png',
        name: ' Alicia M.',
        roles: 'College Student',
        message: "This platform is a game-changer. I used to forget the names of films I wanted to watch, but now I can save them all in my watchlist and revisit the trailers whenever I want. It's organized, convenient, and just fun to use!"
    },
    {
        img: '/Images/user.png',
        name: 'Devon K.',
        roles: 'Casual Viewer',
        message: "I've tried a lot of movie-tracking websites, but this one stands out. The ability to create a personalized watchlist and instantly watch high-quality trailers makes it so much easier to keep up with what's new and exciting. Highly recommended!"
    },
    {
        img: '/Images/user.png',
        name: 'Jordan P.',
        roles: 'Aspiring Filmmaker',
        message: "As someone who loves movies and aspires to make them, this site is a treasure trove. The watchlist feature is perfect for keeping track of films that inspire me, and the trailers are a great way to study different styles and techniques. A must-have for any film buff!"
    },
    {
        img: '/Images/user.png',
        name: 'Taylor W.',
        roles: 'Movie Critic',
        message: "This site has completely transformed how I discover and keep track of films. The watchlist feature is incredibly useful, and the trailer previews are a fantastic addition. It's like having a personal movie assistant at my fingertips!"
    }
]
</script>


<template>
    <section class="py-16 px-5 md:px-16 md:mx-16 relative">
        <div class="py-5 md:py-10 text-center mb-10">
            <h1 class="font-bebas font-bold text-4xl md:text-5xl lg:text-6xl">Testimonials</h1>
            <p class="font-[Poppins] text-sm md:text-base">Join a growing community of passionate streamers.</p>
        </div>

        <div class="relative">
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
            
            <div ref="scrollContainer" class="flex overflow-x-auto gap-6 pb-6 snap-x snap-mandatory px-12">
                <div v-for="(testimonial, index) in testimonials" :key="index" class="flex-none w-72 snap-center bg-[#171717] p-5 rounded-lg h-[50vh] flex flex-col justify-center">
                    <div class="flex gap-2 mb-5">
                        <div>
                            <img :src="testimonial.img" alt="user" class="w-12 h-12 rounded-full shadow-lg" />
                        </div>
                        <div class="flex flex-col justify-center">
                            <p class="font-[Poppins] text-sm font-semibold">{{ testimonial.name }}</p>
                            <p class="roles text-xs text-gray-400">{{ testimonial.roles }}</p>
                        </div>
                    </div>
                    <div>
                        <p class="message">{{ testimonial.message }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped>
/* Hide scrollbar for Chrome, Safari and Opera */
.overflow-x-auto::-webkit-scrollbar {
    display: none;
}

/* Hide scrollbar for IE, Edge and Firefox */
.overflow-x-auto {
    -ms-overflow-style: none;  /* IE and Edge */
    scrollbar-width: none;  /* Firefox */
}
</style>