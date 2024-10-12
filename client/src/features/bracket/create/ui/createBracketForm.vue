<script setup>
import useCreateBracket from "../model/useCreateBracket.js";
import { ref } from "vue";

const bracketData = ref({ string: '' });
const { isLoading, error, createBracket } = useCreateBracket();

function handleSubmit() {
  createBracket({ string: bracketData.value.string });
  bracketData.value.string = ''; // Очищаем поле после отправки
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