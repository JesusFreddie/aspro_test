<script setup>

import {useGetAllBrackets} from "../model/useGetAllBrackets.js";

const { error, data, isLoading } = useGetAllBrackets();

</script>

<template>
  <div>
    Brackets
    <ul class="list-unstyled flex flex-column gap-2" v-if="data.length > 0">
      <li class="flex" v-for="bracket in data">
        {{ bracket.string }} --
        {{ bracket.success ? true : false }}
      </li>
    </ul>
    <div v-if="isLoading">Loading...</div>
    <p v-if="error">{{ error }}</p>
  </div>
</template>

<style scoped>

</style>