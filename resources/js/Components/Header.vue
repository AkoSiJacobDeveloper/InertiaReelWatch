<script setup>
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';

import LoginButton from './LoginButton.vue';
import SigninButton from './SigninButton.vue';

const links = [
    { name: 'Home', href: '/'},
    { name: 'About', href: '/about'},
    { name: 'Contact', href: '/contact'}
]

const isMobileMenuOpen = ref(false);

const toggleMobileMenu = () => {
    isMobileMenuOpen.value = !isMobileMenuOpen.value;
};
</script>

<template>
    <header class="fixed top-0 left-0 w-full z-[9999] bg-[#060606] text-[#E0E0E0] font-[Poppins]">
        <!-- Desktop Header -->
        <div class="hidden md:flex justify-between p-7 px-32">
            <div class="flex gap-10">
                <div class="flex justify-center items-center">
                    <Link href="/" class="text-sm md:text-2xl font-bold">Reel<span class="bg-[#A31621] rounded">Watch</span></Link>
                </div>
                <nav class="flex justify-center items-center">
                    <ul class="flex space-x-4">
                        <li v-for="(link, index) in links" :key="index">
                            <Link :href="link.href" class="header-links">{{ link.name }}</Link>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="flex gap-2">
                <LoginButton />
                <SigninButton />
            </div>
        </div>

        <!-- Mobile Header -->
        <div class="md:hidden p-5">
            <div class="flex justify-between items-center">
                <div class="flex justify-center items-center">
                    <p class="text-2xl font-bold">Reel<span class="bg-[#A31621] rounded">Watch</span></p>
                </div>
                <button @click="toggleMobileMenu" class="text-white focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path v-if="!isMobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path v-else stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div v-show="isMobileMenuOpen" class="mt-4 space-y-4">
                <nav>
                    <ul class="space-y-4">
                        <li v-for="(link, index) in links" :key="index">
                            <Link :href="link.href" class="block header-links">{{ link.name }}</Link>
                        </li>
                    </ul>
                </nav>
                <div class="flex flex-col gap-2">
                    <LoginButton class="w-full" />
                    <SigninButton class="w-full" />
                </div>
            </div>
        </div>
    </header>
</template>