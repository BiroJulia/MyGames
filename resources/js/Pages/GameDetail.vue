<script setup>
import { ref } from 'vue'
import Navigation from '@/Components/Navigation.vue'
import AppLayout from '@/Layouts/AppLayout.vue'

const props = defineProps({
  game: Object
})

const scrollIndex = ref(0)


</script>

<template>
    <AppLayout>
        <Navigation />

        <div class="max-w-4xl mx-auto px-6 py-8">
            <div class="rounded-2xl overflow-hidden border border-gray-700">

                <div class="relative h-96 bg-cover bg-center bg-gray-700"
                    :style="game?.screenshots?.[0]?.url
                    ? { backgroundImage: `url('${game.screenshots[0].url.replace('t_thumb', 't_screenshot_big')}')` }: {}">
                    <div class="absolute bottom-0 p-6">
                        <div class="flex bg-black/40 backdrop-blur-sm rounded-xl p-4 gap-4 items-center">
                            <div v-if="game?.cover?.url">
                                <img :src="game.cover.url.replace('t_thumb', 't_cover_big')"
                                alt="Game Cover"
                                class="h-24 rounded-lg"/>
                            </div>

                            <div class="flex flex-col items-center">
                                <div class="text-4xl font-bold text-cyan-400 mb-1">
                                   {{ game?.rating ? Math.round(game.rating) : 'NS' }}
                                </div>
                                <div class="text-xs text-gray-300">IGDB Rating</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-8">
                <div>
                    <h1 class="text-4xl font-bold text-white mb-3">
                    {{ game?.name }}
                    </h1>
                    <p class="text-gray-400 text-lg mb-3">
                    Released:
                    <div class="text-gray-200">
                        {{ new Date(game.first_release_date).toLocaleDateString() }}
                        
                    </div>
                    </p>
                </div>

                <div class="grid gap-4">
                
                    <div v-if="game?.genres?.length">
                        <h1 class="text-sm font-semibold text-gray-400">Genres</h1>
                        <div class="flex flex-wrap gap-2">
                            <div class="text-white px-2 py-1">
                            {{ game.genres?.map(g => g.name).join(', ') }}
                            </div>
                        </div>
                    </div>

                    <div v-if="game?.platforms?.length">
                        <h1 class="text-sm font-semibold text-gray-400">Platforms</h1>
                        <div class="flex flex-wrap gap-2">
                            <div class="text-white px-2 py-1">
                            {{game.platforms?.map(g => g.name).join(', ') }}
                            </div>
                        </div>
                    </div>
                </div>

                <div v-if="game?.summary" class="pt-8">
                    <h1 class="text-2xl text-gray-300 mb-4">About This Game</h1>
                    <p class="text-gray-400 text-lg">{{ game.summary }}</p>
                </div>

                <div v-if="game?.storyline" class="pt-8">
                    <h1 class="text-2xl text-gray-300 mb-4">Storyline</h1>
                    <p class="text-gray-400 text-lg">{{ game.storyline }}</p>
                </div>
                </div>

                
                <div v-if="game?.screenshots?.length" >
                
                    <div class="flex items-center justify-between px-8 py-3">
                        <div class="flex items-center gap-2 text-gray-300 text-sm">
                        <img src="/images/icon-camera.svg" alt="Screenshot icon" class="w-4 h-4 opacity-60"/>
                        Screenshots ({{ props.game.screenshots.length }})
                        </div>
                        
                        <div class="flex gap-2">
                            <button @click="scrollIndex = scrollIndex > 0 ? scrollIndex - 1 : 0" 
                                :disabled="scrollIndex === 0" 
                                class="p-2 disabled:opacity-30 "> 
                                <img src="/images/icon-arrow-left.svg" alt="Left arrow" class="w-4 h-4 opacity-80"/>
                            </button>
                            <div class="text-gray-300 text-sm flex items-center">
                                {{ scrollIndex + 1 }} / {{ game.screenshots.length }}
                            </div>
                            <button 
                                @click="scrollIndex = scrollIndex < game.screenshots.length - 1 ? scrollIndex + 1 : scrollIndex" 
                                :disabled="scrollIndex >= game.screenshots.length - 1"
                                class="p-2 disabled:opacity-30">
                                <img src="/images/icon-arrow-right.svg" alt="Right arrow" class="w-4 h-4 opacity-80"/>
                            </button>
                        </div>

                    </div>

                    <div class="relative overflow-hidden px-6 pb-6">
                        <img v-if="game.screenshots?.[scrollIndex]"
                        :src="game.screenshots[scrollIndex].url.replace('t_thumb','t_screenshot_big')"
                        class="w-full  object-cover rounded-xl"/>
                    </div>
                    
                </div>

            </div>
        </div>
    </AppLayout>
</template>
