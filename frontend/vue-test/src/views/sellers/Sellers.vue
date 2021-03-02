<template>
  <div class="container">
    <h1 class="mt-4 text-center">Sellers</h1>
    <form>
      <div v-if="errors.length">
        <b>Please correct the following error(s):</b>
        <ul>
          <li v-for="(error, i) in errors" v-bind:key="i">{{ error }}</li>
        </ul>
      </div>
      <div class="form-group">
        <label for="domain">*Domain to verify</label>
        <input
          id="domain"
          type="text"
          placeholder="example.com"
          v-model="domain"
          class="form-control"
        />
      </div>
      <div class="form-group">
        <button type="button" @click="onSubmit" class="btn btn-dark">
          Submit
        </button>
      </div>
    </form>
    <Table
      :fields="fields"
      :items="sellers"
    />
  </div>
</template>

<script>
import Table from '../base/Table'
import axios from 'axios'
import {SELLERS} from "../../repository/endpoint";

export default {
  name: 'Sellers',
  components: {Table},
  data: () => ({
    domain: '',
    errors: [],
    sellers: [],
    fields: ['id', 'seller_id', 'is_confidential', 'is_passthrough', 'seller_type', 'name', 'domain', 'comment', 'ext']
  }),
  methods: {
    async onSubmit() {
      if (this.isValidDomain(this.domain)) {
        try {
          let response = await axios.get(SELLERS, {params: {domain: this.domain}})
          console.log('start');
          this.sellers = this.getData(response.data)
        } catch (error) {
          if (error.response) {
            console.log(error.response.data)
            console.log(error.response.status)
            console.log(error.response.headers)
            this.errors.push('invalid domain or seller json')
          } else if (error.request) {
            console.log(error.request)
          } else {
            console.log(error.message)
          }
        }
      }
      this.clearForm()
    },
    clearForm() {
      this.name = ''
      this.score = ''
    },
    getData(response) {
      return response.data
    },
    isValidDomain(domain) {
      if (domain === null || domain === '') {
        this.errors.push('domain is required')
        return false;
      }
      return true;
    }
  }
}
</script>

<style scoped>

</style>
