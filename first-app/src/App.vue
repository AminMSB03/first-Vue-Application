<template>
  <!-- <h1>{{ email }}</h1> -->
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
  <input type="text" name="" id="" v-model="email" @keyup.alt="addItem">
  <div>
    <h4>{{ items }}</h4>
  </div>
  <div class="items" v-for="item in items" :key="item">
        <span @click="deleteItem(item)">{{item}}</span>
  </div>
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
      email:'',
      items : []
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
    addItem(e){
      if(e.key === "," && this.email){
        if(!this.items.includes(this.email)){
          this.items.push(this.email)
        }
        this.email = ""
      }
    },
    deleteItem(item){
        this.items = this.items.filter((e)=>{
              return e !== item
        })
    }
    

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
.items{
  width: 100px;
  height: 100px;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius:20px ;
  margin: 20px;
  background-color: crimson;
  color: white;
  cursor: pointer;
}
</style>
