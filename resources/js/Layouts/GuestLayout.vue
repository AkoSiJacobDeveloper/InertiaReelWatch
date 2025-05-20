<script setup>
import Header from '@/Components/Header.vue';
import Footer from '@/Components/Footer.vue';
</script>

<template>
    <div class="w-full">
        <Header />
        <main class="text-[#E0E0E0]">
            <slot></slot>
        </main>
        <Footer />
    </div>
</template>

