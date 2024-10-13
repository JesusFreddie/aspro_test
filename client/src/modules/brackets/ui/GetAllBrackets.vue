<script setup>
const { data, error, isLoading } = defineProps({
  data: {
    type: Array,
    required: true
  },
  isLoading: Boolean,
  error: String
})

</script>

<template>
  <div>
    <div v-if="isLoading">Loading...</div>
    <p v-if="error">{{ error }}</p>

    <table class="table w-50" v-if="data.length > 0">
      <thead>
      <tr>
        <th scope="col">String</th>
        <th scope="col">Success</th>
      </tr>
      </thead>
      <tbody>
      <tr v-for="bracket in data">
        <td>{{ bracket.string }}</td>
        <td>{{ bracket.success ? true : false }}</td>
      </tr>
      </tbody>
    </table>
  </div>
</template>

<style scoped>

</style>