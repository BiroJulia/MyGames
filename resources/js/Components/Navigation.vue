<template>
  <header class="bg-gray-800 px-6 py-4 flex items-center justify-between shadow">
    <div class="flex items-center space-x-4">
      <Link href="/dashboard" class="text-2xl font-bold text-white hover:text-blue-300">
        MyGames
      </Link>
      <Link v-if="!auth" href="/login" class="text-white hover:text-blue-300">Login</Link>
      <Link v-if="!auth" href="/register" class="text-white hover:text-blue-300">Register</Link>
      <Link v-if="auth" href="/my-games" class="text-white hover:text-blue-300">My Games</Link>
      <Link v-if="auth" href="/profile" class="text-white hover:text-blue-300">Profile</Link>
    </div>
    <div class="flex items-center space-x-4">
      <Link v-if="auth" method="post" href="/logout" class="text-red-400 hover:text-red-600">Logout</Link>
    </div>
  </header>

</template>

<script setup>
import { usePage, Link } from '@inertiajs/vue3'

const page = usePage()
const auth = !!page.props.auth?.user

</script>
