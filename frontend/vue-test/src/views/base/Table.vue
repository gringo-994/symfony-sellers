<template>
  <table class="table mt-5">
    <thead>
    <tr>
      <th scope="col" v-for="(field, i) in fields" :key="i">{{ field }}</th>
    </tr>
    </thead>
    <tbody>
    <tr v-for="(item, i) in items" :key="i">
      <td v-for="(field, i) in fields" :key="i">{{ item[field] }}</td>
    </tr>
    </tbody>
  </table>
</template>
<script>
export default {
  name: 'Table',
  props: {
    items: Array,
    fields: Array
  }
}
</script>

<style scoped>

</style>
