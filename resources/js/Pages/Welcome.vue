<script setup>
import Layout from '@/Layouts/GuestLayout.vue';
import Hero from './Sections/Hero.vue';
import Features from './Sections/Features.vue';
import Recommended from './Sections/Recommended.vue';
import Testimonials from './Sections/Testimonials.vue';

const props = defineProps({
    recommendations: {
        type: Array,
        default: () => []
    }
});

// defineProps([
//     'appName', 'time'
// ])

</script>

<template>
    <Layout>
        <Hero />
        <Features />
        <Recommended :recommendations="recommendations" />
        <Testimonials />
    </Layout>
</template> 