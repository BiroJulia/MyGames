<script setup>
import { ref } from 'vue'
import { router } from '@inertiajs/vue3'
import GameCard from '@/Components/GameCard.vue'
import GameCardWide from '@/Components/GameCardWide.vue'
import Navigation from '@/Components/Navigation.vue'
import SearchBar from '@/Components/SearchBar.vue'
import AppLayout from '@/Layouts/AppLayout.vue'

const props = defineProps(['games','genre', 'newReleases', 'popularGames', 'search'])


const searchQuery = ref(props.search)
const hasSearched = ref(!!props.search)

const submitSearch = () => {
  router.get('/dashboard', { search: searchQuery.value }, {
    preserveScroll: true,
    replace: true,
  })
}
</script>


<template>
  <AppLayout>
    <Navigation />

    <div class="flex justify-center mt-8 px-4 mb-6">
      <SearchBar v-model="searchQuery" @search="submitSearch" />
    </div>

  <section v-if="hasSearched">
    <h1 class="text-2xl font-bold px-6 mb-3">
      Search Results for "{{ searchQuery }}"
    </h1>
    <div v-if="games.length > 0"
      class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6 px-6 pb-4">
      <GameCard v-for="game in games" :key="game.id" :game="game" />
    </div>
    <div v-else class="px-6 text-gray-400 italic">No results found.</div>
  </section>


    <template v-else>
      <section class="mt-10">
        <h1 class="text-2xl font-bold px-6 mb-3">New Releases</h1>
        <div class="flex gap-6 px-6 pb-4 overflow-x-auto no-scrollbar">
          <GameCard v-for="game in newReleases" :key="game.id" :game="game" />
        </div>
      </section>

      <section class="mt-10 flex flex-col items-center">
        <h1 class="text-2xl font-bold px-6 mb-3">Popular Games</h1>
        <div class="flex flex-col gap-4 px-6 w-full max-w-3xl mx-auto">
          <GameCardWide
            v-for="(game, idx) in popularGames"
            :key="game.id"
            :game="game"
            :index="idx"
          />
        </div>
      </section>
    </template>
  </AppLayout>
</template>

<style>
.no-scrollbar::-webkit-scrollbar {
  display: none;
}
</style>
