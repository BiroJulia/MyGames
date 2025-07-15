<template>
  <div>
    <h1>Game datas:</h1>
    <div v-if="game">
      <p><strong>Name:</strong> {{ game.name }}</p>
      <p><strong>Description:</strong> {{ game.summary }}</p>
      <p><strong>Rating:</strong> {{ game.total_rating }}</p>
      <p>
        <strong>IGDB Link:</strong> 
        <a :href="game.url" target="_blank" rel="noopener noreferrer">IGDB oldal</a>
      </p>
    </div>
    <div v-else>
      <p>There is no data to list.</p>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    game: Object,
  },
};
</script>
