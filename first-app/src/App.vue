<template>
  <h1>{{ email }}</h1>
  <div v-if="showHeader">
    <HeaderNav  @edit="show">
    <h1>Welcome to Header Template</h1>
      <template v-slot:links>
                  <a href="#">Sign up</a>
                  <a href="#">view more</a>
      </template>
    </HeaderNav>
    
  </div>

  <div v-if="showHeaderTwo">
    <HeaderNav  @edit="showTwo">
      <h1>Welcome to Vue js</h1>
      <p>Helloooo there</p>
    </HeaderNav>
  </div>
  
  <button @click="show" >show</button>
  <button @click="showTwo" >showTwo</button>
  <button @click="count+=1">counter is: {{count}} </button>
  <input type="email"v-model="email">
</template>

<script>
import HeaderNav from "./components/HeaderNav.vue";

export default {
  name: 'App',
  data(){
    return{
      count:0 ,
      showHeader : false,
      showHeaderTwo : false,
      email:''
    }
  },
  components:{
    HeaderNav
  },
  methods:{
    show(){
      this.showHeader = !this.showHeader
    },
    showTwo(){
      this.showHeaderTwo = !this.showHeaderTwo
    },
    

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
