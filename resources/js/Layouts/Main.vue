<script setup>
import { switchTheme } from '../theme';
import NavLink from '../Components/NavLink.vue';
import { usePage } from '@inertiajs/vue3';
import { computed, ref } from 'vue';

const page = usePage();
const user = computed(() => page.props.auth.user);

const show = ref(false);


</script>

<template>
    <!---- Overlay -->
    <div v-show="show" @click="show = false" class="fixed inset-0 z-40"></div>
    <header class="bg-slate-800 text-white">
        <nav class="py-6 container flex justify-between items-center">
            <NavLink routeName="home" componentName="Home">Home</NavLink>
            
            
            <div class="flex items-center space-x-6">
                <!---------------------- Auth -------------------->
                <div class="relative" v-if="user" @click="show = !show">
                    <div class="flex items-center gap-2 px-3 py-1 rounded-lg transition ease-in-out duration-300 hover:bg-slate-700 cursor-pointer"
                    :class="{ 'bg-slate-700': show }"
                    >
                        <span v-if="user">{{ user.name }}</span>
                        <i class="fa-solid fa-chevron-down"></i>
                    </div>

                    <div @click="show = false" v-show="show" class="absolute z-50 top-[110%] right-0 bg-slate-800 text-white rounded-lg border-slate-700 border-1 border overflow-hidden w-40">
                        <Link :href="route('home')" class="block text-left w-full px-4 py-2 hover:bg-slate-700 transition ease-in-out duration-300">Dashboard</Link>
                        <Link :href="route('logout')" 
                        as="button" 
                        type="button" 
                        method="post" 
                        class="block text-left w-full px-4 py-2 hover:bg-slate-700 transition ease-in-out duration-300"
                        >Logout</Link>
                    </div>
                    
                </div>
            
                

                <!---------------------- Guest -------------------->
                <div class="flex items-center space-x-6" v-else>
                    <NavLink routeName="login" componentName="Auth/Login">Login</NavLink>
                    <NavLink routeName="register" componentName="Auth/Register">Register</NavLink>
                </div>
                
                
                <button @click="switchTheme" class="hover:bg-slate-700 w-6 h-6 grid place-items-center rounded-full hover:outline outline-1 outline-white transition ease-in-out duration-300">
                    <i class="fa-solid fa-circle-half-stroke"></i>
                </button>
            </div>
        </nav>
    </header>

    <main class="p-6">
        <slot />
    </main>
</template>
