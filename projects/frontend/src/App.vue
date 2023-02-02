<template>
  <img alt="Vue logo" src="./assets/logo.png"> 
  <h2>List User</h2>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>name</th>
        <th>email</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="user in list" :key="user.name">
        <td>{{user.name}}</td>
        <td>{{user.email}}</td>
      </tr>  
    </tbody>
  </table>
</template>

<script> 
import axios from "axios"
export default {
  name: 'App',
  data()
  {
    return {
      list: []
    }
  },
  async mounted() {
    let result = await axios.get("http://127.0.0.1/users");
    console.warn(result.data.data);
    this.list = result.data.data;
  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
