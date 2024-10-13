<script setup>

import GetAllBrackets from "./ui/GetAllBrackets.vue";
import CreateBracketForm from "./ui/CreateBracketForm.vue";
import {useGetAllBrackets} from "./hooks/useGetAllBrackets.js";
import {ref} from "vue";

const { data, error, isLoading } = useGetAllBrackets();

const brackets = ref(data);
function createBracket(data) {
  brackets.value.push({...data});
}

</script>

<template>
  <div class="d-flex container justify-content-between pt-5">
    <GetAllBrackets
      :data="brackets"
      :error="error"
      :isLoading="isLoading"
    />
    <CreateBracketForm
      @createBracket="createBracket"
    />
  </div>
</template>

<style scoped>

</style>