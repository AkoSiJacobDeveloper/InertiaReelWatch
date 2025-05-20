<script setup>
</script>

<template>
    <section class="relative z-0">
        <div class="absolute h-full w-full bg-cover bg-center bg-no-repeat">
            <img class="h-[90vh] w-full" :src="'/Images/background.jpg'" alt="background">
        </div>
        <div class="absolute inset-0 bg-black/60 backdrop-blur-sm z-10 h-full w-full"></div>
        <section class="relative flex flex-col justify-center items-center h-screen z-[9999] p-5 md:p-7 md:px-16 md:mx-16">
            <h1 class="font-bebas text-6xl lg:text-9xl tracking-tighter">Unlimited <span class="text-[#A31621]">Cinema</span>. One <span class="text-[#A31621]">Platform</span>.</h1>
            <p class="font-[Poppins] text-sm md:text-lg">Dive into a world of top-rated films, fresh releases, and timeless favorites — all in one place.</p>
        </section>
    </section>
</template>