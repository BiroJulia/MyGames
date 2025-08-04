<script setup>
import { router } from '@inertiajs/vue3'
const props = defineProps({
  game: Object,
  index: Number,
});

const goToDetail = () => {
  router.get(`/game/${props.game.id}`)
}
</script>

<template>
  <div class="relative flex items-center rounded-2xl shadow-lg px-4 py-3 mb-4 w-full max-w-2xl overflow-hidden cursor-pointer"
  @click="goToDetail">
    
     <img v-if="game.cover?.url"
      :src="game.cover.url.replace('t_thumb', 't_screenshot_big')"
      alt="Background"
      class="absolute inset-0 w-full h-full object-cover"/>
    <div class="absolute inset-0 backdrop-blur-md bg-gray-900/70"></div>

    <div class="relative flex items-center w-16 flex-shrink-0 ">
      <div
        v-if="typeof index === 'number'"
        class="flex items-center justify-center bg-gray-700 text-gray-200 font-semibold rounded-lg w-7 h-7 mr-3 text-sm bg-opacity-70 backdrop-blur-sm">
        {{ index + 1 }}
      </div>
      <img :src="game.cover?.url
          ? game.cover.url.replace('t_thumb', 't_cover_big')
          : '/images/no-image.svg'" 
          alt="Cover" class="w-12 h-12 rounded-lg object-cover shadow"/>
    </div>

    <div class="ml-5 flex-1 min-w-0 ">
      <div class="text-white font-bold text-lg drop-shadow">
        {{ game.name }}
      </div>
    </div>

    <div class="flex items-center mr-6 text-gray-200 font-medium space-x-2 drop-shadow">
      <span class="text-sm">{{ Math.round(game.rating) }}</span>
      <span class="text-gray-400 text-xs">/ 100</span>
      <img src="/images/icon-star-yellow.svg" alt="Star icon" class="w-5 h-5 opacity-80"/>
    </div>

    <button class="ml-auto rounded-full border border-gray-700 bg-gray-800 w-8 h-8 flex items-center 
    justify-center transform transition-colors duration-200 hover:bg-gray-600 group z-10" title="Add"
    @click.stop>
      <span class="text-2xl text-gray-300">+</span>
    </button>
  </div>
</template>
