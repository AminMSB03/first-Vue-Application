<template>


  <nav class="text-center bg-green-300 mb-10 flex flex-col md:flex-row " >
    <router-link to="/">Home</router-link> |
    <router-link to="/about">About</router-link> |
    <router-link to="/Pizzas">Pizza</router-link>
  </nav>
  <router-view/>
</template>


<script>
import Header from './components/Header'

export default ({
  components:{
    Header
  },
  setup() {
    
  },
})
</script>



<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

nav {
  padding: 30px;
}

nav a {
  font-weight: bold;
  color: #2c3e50;
}

nav a.router-link-exact-active {
  color: #42b983;
}
</style>
