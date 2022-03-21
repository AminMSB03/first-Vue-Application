<template>
    <div class="container" @click.self="showTwo">
        <div class="popUp">
            <!--default slot  -->
            <slot></slot>
            <!--slot with a name -->
            <slot name="links"></slot>
        </div>
        
    </div>
</template>

<script>
export default {
    name: "HeaderNav",
    props: ['title','edit'],
    methods:{
        showTwo(){
            this.$emit('edit')
        }
    }
}
</script>


<style scoped>
.container{
    width: 100%;
    height: 100vh;
    background-color: rgba(0, 0, 0, 0.377);
    position: fixed;
    left: 0;
    top: 0;

}
.popUp{
    margin: auto;
    margin-top:50px;
    width: 400px;
    height: 300px;
    background-color: white;
    border-radius: 10px;
}
</style>