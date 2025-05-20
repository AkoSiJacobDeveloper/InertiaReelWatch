<script setup>
import { Link, useForm, usePage } from '@inertiajs/vue3';
import { ref } from 'vue';
import { route } from 'ziggy-js';

const form = useForm ({
    email: '',
    password: ''
})

const showError = ref(false)

function submit() {
    form.post(route('login'), {
        onFinish: () => {
            form.reset('password');
            if (form.errors.email) {
                showError.value = true;
                setTimeout(() => {
                    showError.value = false;
                    form.errors.email = null;
                }, 5000);
            }
        },
    });
}

</script>

<template>
        <main class="flex text-[#E0E0E0] relative">
            <section class="hidden lg:block lg:w-2/3 h-screen">
                <div class="absolute p-10">
                    <Link href="/">
                        <i class="fa-solid fa-arrow-left text-2xl"></i>
                    </Link>
                </div>
                <img src="/Images/loginbg.jpg" alt="Background" class="h-full w-full hidden lg:block">
            </section>
            <section class="w-full my-16 lg:w-1/3 flex items-center p-5 ">
                <div class="w-full p-5 flex flex-col justify-center gap-5">
                    <div class="flex flex-col gap-8 text-center p-5">
                        <Link href="/" class="text-sm md:text-lg font-bold font-[Poppins]">Reel<span class="bg-[#A31621] rounded">Watch</span></Link>
                        <div>
                            <p class="font-bebas text-2xl md:text-4xl">Welcome Back!</p>
                            <p class="font-[Poppins] text-xs md:text-sm">Login to continue your movie journey</p>
                        </div>
                    </div>
                    <div>
                        <div v-if="showError && form.errors.email" class="text-red-500 mb-4 text-sm text-center font-[Poppins]">
                            {{ form.errors.email }}
                        </div>
                        <form @submit.prevent="submit">
                            <div class="flex flex-col">
                                <label class="font-[Poppins] text-xs md:text-base font-semibold" for="email">Email</label>
                                <input v-model="form.email" type="email" id="email" class="bg-[#121212] border-0 outline-none focus:outline focus:outline-2 focus:outline-[#A31621] focus:ring-0 rounded p-2 md:p-3 mb-4 input-data" placeholder="johndoe@gmail.com" required>

                                <label class="font-[Poppins] text-xs md:text-base font-semibold" for="password">Password</label>
                                <input v-model="form.password" type="password" id="password" class="bg-[#121212] border-0 outline-none focus:outline focus:outline-2 focus:outline-[#A31621] focus:ring-0 rounded p-2 md:p-3 mb-4 input-data" placeholder="Password" required> 

                                <div class="flex justify-between mb-4">
                                    <button class="font-[Poppins] text-[#A31621] hover:text-[#D12B39] transition-colors duration-200 text-sm md:text-base" type="reset">Reset</button>
                                    <a href="#" class="font-[Poppins] text-[#A31621] hover:text-[#D12B39] transition-colors duration-200 text-sm md:text-base">Forgot Password</a>
                                </div>
                                
                                <button class="p-2 md:p-3 bg-[#A31621] rounded font-[Poppins] hover:bg-[#89121B] mb-4 text-sm md:text-base" type="submit">Login</button>
                            </div>
                        </form>
                    </div>
                    <p class="font-[Poppins] text-sm md:text-base text-center">Dont have an account? <Link class="text-[#A31621] hover:text-[#D12B39] transition-colors duration-200 hover:underline" href="/signup">Signup</Link></p>
                </div>
            </section>
        </main>
</template>