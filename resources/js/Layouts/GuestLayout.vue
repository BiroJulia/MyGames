<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="flex min-h-screen flex-col items-center 
    bg-gradient-to-b from-blue-900/80  to-gray-900 text-gray-200 pt-6 sm:justify-center sm:pt-0">
        <div>
            <Link href="/">
            <img src="images/logo.svg" alt="Logo" class="mx-auto h-50 w-50" />
            </Link>
        </div>

        <div class="mt-6 w-full overflow-hidden bg-white/5 border border-white/20 px-20 py-10 shadow-lg  sm:max-w-md sm:rounded-lg">
            <slot />
        </div>
    </div>
</template>
