<template>
    <div class="pizza" v-if="pizza">
        <!-- <h1>Demand Num° : {{ pizza.id }}</h1> -->
        <h1>Created In  : {{ pizza.date }}</h1>
        <h1>Created By  : {{ pizza.createdBy }}</h1>
    </div>
    <button @click="showUpdateForm">Up date</button>
    <div class="formUpdate" v-if="addPizza" @click.self="close">
        <div class="addPizzaForm">
            <h2>Update the Pizza</h2>
            <div class="inputs">
                <label for=""><h3> Created By : </h3></label>
                <input type="text" >
            </div>
            <div class="inputs">
                <label for=""><h3> Date : </h3></label>
                <input type="date" >
            </div>
            <div class="inputs">
                <label for=""><h3> Elements : </h3></label>
                <input type="text" >
            </div>
            <button @click="addPizzaFun">Add Pizza</button>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            id : this.$route.params.id,
            addPizza : false,
            pizza : null,

        }
    },
    methods:{
        async getData(){
            let response = await fetch('http://localhost:3000/data/API/read_Single.php?id='+this.id)
            if(!response.ok){
                throw Error('no data available')
            }
            let json = await response.json()
            return json
        },
        showUpdateForm(){
            this.addPizza = !this.addPizza
        },
        close(){
            this.addPizza = !this.addPizza
            this.createdBy = ''
            this.date = ''
            this.elements = ''
        },
    },
    mounted(){
        this.getData().then(res => {
            this.pizza = res
        })
    }
}

</script>

<style>

.formUpdate{
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.377);
    display: flex;
    justify-content: center;
    align-items: center;
}
addPizzaPop{
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