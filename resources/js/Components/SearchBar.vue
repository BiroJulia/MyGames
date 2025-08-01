<script setup>
import { defineEmits, defineProps } from 'vue';

const props = defineProps({
  modelValue: {
    type: String,
    default: '',
  },
});
const emit = defineEmits(['update:modelValue', 'search']);
</script>

<template>
   <div class="flex items-center w-full max-w-xl bg-gray-800 rounded-full px-5 py-3">
    <input
      :value="modelValue"
      @input="emit('update:modelValue', $event.target.value)"
      @keyup.enter=" emit('search')"
      class="bg-gray-800  border-gray-700 rounded-full px-6 py-3 w-full max-w-xl focus:outline-none focus:border-blue-500 transition"
      placeholder="Search games by name or genre…"/>
    <button @click=" emit('search')"
      class="ml-2 px-6 py-3 bg-blue-600 hover:bg-blue-700 transition text-white rounded-full">
        Search
    </button>
  </div>
</template>
