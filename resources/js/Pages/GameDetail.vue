<script setup>
import { ref } from 'vue'
import Navigation from '@/Components/Navigation.vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import { useGameDetailComposable } from '@/Composables/GameDetailComposables.js'

const props = defineProps({
  game: {
    type: Object,
    required: true,
    default: () => ({ screenshots: [] })
  }
})
const game = props.game

const { scrollIndex, nextScreenshot, prevScreenshot,isFirst, isLast,screenshotCount } = useGameDetailComposable(game)


</script>

<template>
    <AppLayout>
        <Navigation />

        <div class="max-w-4xl mx-auto px-6 py-8">
            <div class="rounded-2xl overflow-hidden border border-gray-700">

                <div class="relative h-96 overflow-hidden bg-gray-700">
                    <img v-if="game?.screenshots?.length"
                    :src="game.screenshots[0].replace('t_thumb', 't_screenshot_big')"
                    alt="Game Background"
                    class=" w-full h-full object-cover" />
                    <div class="absolute bottom-0 p-6">
                        <div class="flex bg-black/40 backdrop-blur-sm rounded-xl p-4 gap-4 items-center">
                            <div v-if="game?.coverUrl">
                                <img :src="game.coverUrl.replace('t_thumb', 't_cover_big')"
                                alt="Game Cover"
                                class="h-24 rounded-lg"/>
                            </div>

                            <div class="flex flex-col items-center">
                                <div class="text-4xl font-bold text-cyan-400 mb-1">
                                   {{ game?.rating }}
                                </div>
                                <div class="text-xs text-gray-300">IGDB Rating</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-8">
                <div>
                    <h1 class="text-4xl font-bold text-white mb-3">
                    {{ game.name }}
                    </h1>
                    <div class="text-gray-400 text-lg mb-3">
                    Released:
                    <div class="text-gray-200">
                        {{game.formattedReleaseDate  }}
                    </div>
                    </div>
                </div>

                <div>
                    <div v-if="game?.genres?.length">
                        <h1 class="text-sm font-semibold text-gray-400 py-2">Genres</h1>
                        <div class="flex flex-wrap gap-2">
                            <div v-for ="genre in game.genres" :key="genre" 
                            class="text-white py-1 px-2 bg-cyan-900 rounded-lg">
                            {{ genre }}
                            </div>
                        </div>
                    </div>

                    <div v-if="game?.platforms?.length">
                        <h1 class="text-sm font-semibold text-gray-400 py-2">Platforms</h1>
                        <div class="flex flex-wrap gap-2">
                            <div v-for="platform in game.platforms" :key="platform"
                            class="text-white py-1 px-2 bg-cyan-900 rounded-lg" >
                            {{platform}}
                            </div>
                        </div>
                    </div>
                </div>

                <div v-if="game?.summary" class="pt-8">
                    <h1 class="text-2xl text-gray-300 mb-4">About This Game</h1>
                    <div class="text-gray-400 text-lg">{{ game.summary }}</div>
                </div>

                <div v-if="game?.storyline" class="pt-8">
                    <h1 class="text-2xl text-gray-300 mb-4">Storyline</h1>
                    <div class="text-gray-400 text-lg">{{ game.storyline }}</div>
                </div>
                </div>

                
                <div v-if="screenshotCount > 0" >
                
                    <div class="flex items-center justify-between px-8 py-3">
                        <div class="flex items-center gap-2 text-gray-300 text-sm">
                        <img src="/images/icon-camera.svg" alt="Screenshot icon" class="w-4 h-4 opacity-60"/>
                        Screenshots ({{ screenshotCount }})
                        </div>
                        
                        <div class="flex gap-2">
                            <button @click="prevScreenshot" 
                                :disabled="isFirst" 
                                class="p-2 disabled:opacity-30 "> 
                                <img src="/images/icon-arrow-left.svg" alt="Left arrow" class="w-4 h-4 opacity-80"/>
                            </button>
                            <div class="text-gray-300 text-sm flex items-center">
                                {{ scrollIndex + 1 }} / {{ screenshotCount }}
                            </div>
                            <button 
                                @click="nextScreenshot" 
                                :disabled="isLast"
                                class="p-2 disabled:opacity-30">
                                <img src="/images/icon-arrow-right.svg" alt="Right arrow" class="w-4 h-4 opacity-80"/>
                            </button>
                        </div>

                    </div>

                    <div class="relative overflow-hidden px-6 pb-6">
                        <img v-if="game.screenshots?.[scrollIndex]"
                        :src="game.screenshots[scrollIndex].replace('t_thumb','t_screenshot_big')"
                        class="w-full  object-cover rounded-xl"/>
                    </div>
                    
                </div>

            </div>
        </div>
    </AppLayout>
</template>
