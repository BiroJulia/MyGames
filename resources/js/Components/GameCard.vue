<script setup>
import { router } from '@inertiajs/vue3'

const props = defineProps({
  game: Object,
})

const goToDetail = () => {
  router.get(`/game/${props.game.id}`)
}
</script>

<template>
  <div
    class="bg-gray-800 rounded-2xl shadow-lg min-w-[220px] max-w-xs p-4 flex-shrink-0 cursor-pointer hover:bg-gray-700 transition"
    @click="goToDetail"
  >
    <img :src="game.cover?.url
        ? game.cover.url.replace('t_thumb', 't_cover_big')
        : '/images/no-image.svg'"
      alt="Game Cover"
      class="rounded-lg mb-3 w-full h-44 object-cover shadow-md bg-gray-900"
    />
    <h3 class="font-semibold text-white text-lg truncate mb-1">{{ game.name }}</h3>

    <div class="text-xs text-blue-300">
      {{ game.genres?.map(g => g.name).join(', ') }}
    </div>

    <div v-if="game.rating" class="mt-2 flex items-center gap-2">
      <span class="text-white-400 font-bold">{{ Math.round(game.rating) }}</span>
      <span class="text-gray-500 text-xs">/ 100</span>
    </div>

    <div v-if="game.first_release_date" class="text-xs mt-1 text-gray-400">
      {{ new Date(game.first_release_date).toLocaleDateString() }}
    </div>

    <button class="ml-auto rounded-full border border-gray-700 bg-gray-800 w-8 h-8 flex items-center 
      justify-center transform transition-colors duration-200 hover:bg-gray-600 group z-10"
      title="Add"
      @click.stop>
      <span class="text-2xl text-gray-300">+</span>
    </button>
  </div>
</template>
