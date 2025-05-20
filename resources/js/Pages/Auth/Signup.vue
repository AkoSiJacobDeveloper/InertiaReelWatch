<script setup>
import { Link, useForm, router } from '@inertiajs/vue3';
import { route } from 'ziggy-js'
import { ref } from 'vue';

const form = useForm ({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
})

const showError = ref(false)

function submit() {
    form.post(route('signup'), {
        onFinish: () => {
            form.reset('password', 'password_confirmation');

            if (Object.keys(form.errors).length > 0) {
                showError.value = true;
                setTimeout(() => {
                    showError.value = false;
                }, 5000);
            }
        }
    });
}

</script>

<template>
    <main class="flex justify-center items-center text-[#E0E0E0] relative h-screen">
        <section class="hidden lg:block lg:w-2/3 h-screen">
            <div class="absolute p-10">
                <Link href="/">
                    <i class="fa-solid fa-arrow-left text-2xl"></i>
                </Link>
            </div>
            <img src="/Images/signupbg.jpg" alt="Background" class="h-full w-full hidden lg:block">
        </section>
        <section class="w-full lg:w-1/3 flex items-center p-5 overflow-y-auto">
            <div class="w-full p-5 flex flex-col gap-5">
                <div class="flex flex-col gap-8 text-center p-5">
                    <Link href="/" class="text-sm md:text-lg font-bold font-[Poppins]">Reel<span class="bg-[#A31621] rounded">Watch</span></Link>
                    <div>
                        <p class="font-bebas text-2xl md:text-4xl">Create Your Account</p>
                        <p class="font-[Poppins] text-xs md:text-sm">Track your favorite movies and discover new ones</p>
                    </div>
                </div>
                <div>
                    <form @submit.prevent="submit">
                        <div class="flex flex-col">
                            <label class="font-[Poppins] text-xs md:text-base font-semibold" for="name">Full Name</label>
                            <input v-model="form.name" type="text" id="name" class="bg-[#121212] border-0 outline-none focus:outline focus:outline-2 focus:outline-[#A31621] focus:ring-0 rounded p-2 md:p-3 mb-3 input-data" placeholder="John Doe" required>
                            <div v-if="showError" class="text-red-500 text-xs font-[Poppins]">{{ form.errors.name }}</div>

                            <label class="font-[Poppins] text-xs md:text-base font-semibold" for="email">Email</label>
                            <input v-model="form.email" type="email" id="email" class="bg-[#121212] border-0 outline-none focus:outline focus:outline-2 focus:outline-[#A31621] focus:ring-0 rounded p-2 md:p-3 mb-3 input-data" placeholder="johndoe@gmail.com" required>
                            <div v-if="showError" class="text-red-500 text-xs font-[Poppins]">{{ form.errors.email }}</div>

                            <label class="font-[Poppins] text-xs md:text-base font-semibold" for="password">Password</label>
                            <input v-model="form.password" type="password" id="password" class="bg-[#121212] border-0 outline-none focus:outline focus:outline-2 focus:outline-[#A31621] focus:ring-0 rounded p-2 md:p-3 mb-3 input-data" placeholder="Password" required>
                            <div v-if="showError" class="text-red-500 text-xs font-[Poppins]">{{ form.errors.password }}</div>

                            <label class="font-[Poppins] text-xs md:text-base font-semibold" for="password_confirmation">Confirm Password</label>
                            <input v-model="form.password_confirmation" type="password" id="password_confirmation" class="bg-[#121212] border-0 outline-none focus:outline focus:outline-2 focus:outline-[#A31621] focus:ring-0 rounded p-2 md:p-3 mb-3 input-data" placeholder="Password" required>
                            <div v-if="showError" class="text-red-500 text-xs font-[Poppins]">{{ form.errors.password_confirmation }}</div>

                            <div class="flex justify-start mb-3 ">
                                <button class="font-[Poppins] text-[#A31621] hover:text-[#D12B39] transition-colors duration-200 text-sm md:text-base" type="reset">Reset</button>
                            </div>
                            
                            
                            <button class="p-2 md:p-3 bg-[#A31621] rounded font-[Poppins] hover:bg-[#89121B] mb-3 text-sm md:text-base" type="submit">Sign Up</button>
                        </div>
                    </form>
                </div>
                <p class="font-[Poppins] text-sm md:text-base text-center">Already have an account? <Link class="text-[#A31621] hover:text-[#D12B39] transition-colors duration-200 hover:underline" href="/login">Login</Link></p>
            </div>
        </section>
    </main>
</template>
