<template>
    <button @click= "close" class="addPizza " >Add Pizza</button>
    
    <div class="pizza" v-for="pizza in pizzas" :key="pizza.id">
        <router-link :to="{name:'pizza' , params: {id: pizza.id}} " class="links">
            <h3>{{pizza.createdBy}}</h3>  
        </router-link>
        <h1 @click="DeletePizza(pizza.id)">-</h1>
    </div>
    <div class="addPizzaPop" v-if="addPizza" @click.self="close">
        <div class="addPizzaForm">
            <h2>Order A Pizza</h2>
            <div class="inputs">
                <label for=""><h3> Created By : </h3></label>
                <input type="text" v-model="form.createdBy">
            </div>
            <div class="inputs">
                <label for=""><h3> Date : </h3></label>
                <input type="date" v-model="form.date">
            </div>
            <div class="inputs">
                <label for=""><h3> Elements : </h3></label>
                <input type="text" v-model="form.elements">
            </div>
            <button @click="addPizzaFun">Add Pizza</button>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            pizzas :[],
            addPizza : false,
            form:{
                createdBy :'',
                date : '',
                elements : ''
            }
        }
    }
    ,
    methods:{
        async getData(){
            let response = await fetch('http://localhost:3000/data/API/read.php')
            let json = await response.json()
            return json
        },
        async DeletePizza(id){
            let response = await fetch('http://localhost:3000/data/API/delete.php',
            {
            method: "DELETE",
            body : JSON.stringify({"id": id})
            })
            let json = await response.json()
            console.log(json)
            this.pizzas = this.pizzas.filter((e)=>{
                return id !== e.id
            })
        }

        ,close(){
            this.addPizza = !this.addPizza
            this.createdBy = ''
            this.date = ''
            this.elements = ''
        },
        
        async addPizzaFun(){
            console.log(this.form);
            let response = await fetch('http://localhost:3000/data/API/create.php',
            {
            method: "POST",
            body: JSON.stringify(this.form)
            })
            
            this.addPizza = !this.addPizza

            let json = await response.json()
            this.pizzas.push(json.pizza);
        }

    },
    mounted(){
        this.getData().then(res => {
            this.pizzas = res.data;
        })
    }
}

</script>

<style scoped>


.pizza{
    display: flex;
    padding: 10px;
    justify-content: space-between;
    align-items: center;
    margin: 10px auto;
    width: 200px;
    height: 50px;
    border-radius: 10px;
    background: #eee;
}
.pizza h1:hover{
    cursor: pointer;
    color: #42b983;
}
.pizza:hover{
    background: rgb(246, 246, 246);
}
.links{
    text-decoration: none;
    color: #2c3e50;
}
.links:hover{
    color: #42b983;
}
.addPizzaPop{
    display: flex;
    justify-content: center;
    align-items: center;
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.411);

}
.addPizzaForm{
    width: 25%;
    height: 600px;
    background-color: white;
}
.addPizzaForm button{
    background-color: #2c3e50;
    color: white;
    width: 100px;
    height: 40px;
    border: none;
}
.inputs{
    width: 70%;
    height: 100px;
    margin: 20px auto;
    /* background-color: crimson;   */
    display: flex;
    flex-direction: column;
    /* justify-items:center; */
    align-items: flex-start;
}
.inputs input{
    width: 300px;
    height: 70px;
    border: 0px 0px 1px rgb(116, 115, 115) 0px ;
    
}
.addPizza{
    background-color: #2c3e50;
    color: white;
    width: 100px;
    height: 40px;
    border: none;
    margin-bottom:20px ;
}
.addPizza:hover{
    cursor: pointer;
    background-color: #42b983;
}

</style>