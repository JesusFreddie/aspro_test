<script setup>

import {ref} from "vue";
import useCreateBracket from "../hooks/useCreateBracket.js";

const emit = defineEmits(['createBracket'])

const bracketData = ref({ string: '' });
const { isLoading, error, createBracket, data } = useCreateBracket();

async function handleSubmit() {
  await createBracket({ string: bracketData.value.string });
  if (data.value.string) {
    emit('createBracket', data.value)
  }
  bracketData.value.string = '';
}
</script>

<template>
  <form class="d-flex flex-column w-25 gap-2" @submit.prevent="handleSubmit">
    <input class="input" name="string" v-model="bracketData.string">
    <button class="btn btn-primary" type="submit" :disabled="isLoading">Отправить</button>
    <div v-if="error" class="error">{{ error }}</div>
  </form>
</template>

<style scoped>
.error {
  color: red;
}
</style>