<script setup>
import GetStarted from './GetStarted.vue'

const explores = [
    {
        heading: 'Explore',
        links: [
            { name: 'Home', href: '#' },
            { name: 'Browse Movies', href: '#' },
            { name: 'Watchlist', href: '#' },
            { name: 'Trailers', href: '#' },
            { name: 'Top Rated', href: '#' },
            { name: 'New Releases', href: '#' },
            { name: 'Genres', href: '#' },
        ]
    }
]

const companies = [
    {
        heading: 'Company',
        links: [
            { name: 'About Us', href: '#' },
            { name: 'Blog/News', href: '#' },
            { name: 'Careers', href: '#' },
            { name: 'Press', href: '#' },
        ]
    }
]

const supports = [
    {
        heading: 'Support',
        links: [
            { name: 'Help Center', href: '#' },
            { name: 'FAQs', href: '#' },
            { name: 'Contact Us', href: '#' },
            { name: 'Report a Bug', href: '#' },
            { name: 'How It Works', href: '#' },
        ]
    }
]

const legals = [
    {
        heading: 'Legal',
        links: [
            { name: 'Terms of Service', href: '#' },
            { name: 'Privacy Policy', href: '#' },
            { name: 'DMCA', href: '#' },
            { name: 'Cookie Policy', href: '#' },
        ]
    }
]

const socials = [
    {
        img: '/Images/fb.svg',
        links: 'https://www.facebook.com/pauljacob.tocmo'
    },
    {
        img: '/Images/ig.svg',
        links: 'https://www.instagram.com/paaul_jcb/'
    },
    {
        img: '/Images/twitter.svg',
        links: 'https://x.com/Jacob_tocs?t=deGyVJ8lQqxuS3WW5z5B_A&s=09'
    },
    {
        img: '/Images/tiktok.svg',
        links: 'https://www.tiktok.com/@.paauulll?_t=ZS-8wQh49olb5r&_r=1'
    }
]
</script>

<template>
    <section class="w-full mt-16 text-[#E0E0E0] bg-[#171717] flex flex-col">
        <div class="flex flex-col md:flex-row ">
            <div class="py-16 px-5 md:px-16 md:ml-16">
                <div class="flex flex-col justify-center">
                    <p class="text-2xl font-bold font-[Poppins] mb-3">Reel<span class="bg-[#A31621] rounded">Watch</span></p>
                    <p class="font-[Poppins] mb-3">Your ultimate movie and TV show companion.</p>
                    <GetStarted />
                </div>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4">
                <div class="py-16 px-5 md:px-14">
                    <div v-for="(explore, index) in explores" :key="index" class="">
                        <p class="font-[Poppins] font-bold">{{ explore.heading }}</p>
                        <ul>
                            <li v-for="(link, i) in explore.links" :key="'explore-link-' + i">
                                <a :href="link.href" class="hover:text-[#e0e0e0] text-gray-400 text-sm footer-links">{{ link.name }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="py-16 px-5 md:px-14">
                    <div v-for="(company, index) in companies" :key="index">
                        <p class="font-[Poppins] font-bold">{{ company.heading }}</p>
                        <ul>
                            <li v-for="(link, i) in company.links" :key="'company-link-' + i">
                                <a :href="link.href" class="hover:text-[#e0e0e0] text-gray-400 text-sm footer-links">{{ link.name }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="py-16 px-5 md:px-14">
                    <div v-for="(support, index) in supports" :key="index">
                        <p class="font-[Poppins] font-bold">{{ support.heading }}</p>
                        <ul class="p-0">
                            <li v-for="(link, i) in support.links" :key="'support-link-' + i">
                                <a :href="link.href" class="hover:text-[#e0e0e0] text-gray-400 text-sm footer-links">{{ link.name }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="py-16 px-5 md:px-14">
                    <div v-for="(legal, index) in legals" :key="'legal-' + index">
                        <p class="font-[Poppins] font-bold">{{ legal.heading }}</p>
                        <ul class="space-y-1">
                            <li v-for="(link, i) in legal.links" :key="'legal-link-' + i">
                                <a :href="link.href" class="hover:text-[#e0e0e0] text-gray-400 text-sm footer-links">{{ link.name }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <hr class="border-t border-[#060606]">
        <div class="p-5 md:px-16 md:mx-16 flex justify-between">
            <div class="flex justify-center items-center">
                <p class="font-[Poppins] text-xs">&copy; 2025 ReelWatch. All rights reserved.</p>
            </div>
            <div class="flex gap-2">
                <div v-for="(social, index) in socials" :key="index" class="rounded-full bg-[#060606] hover:bg-[#171717] transition p-3 hover:cursor-pointer"> 
                    <a :href="social.links" target="_blank">
                        <img :src="social.img" alt="social" class="w-3 h-3 filter brightness-0 invert" />
                    </a>
                </div>
            </div>
        </div>
    </section>
</template>

