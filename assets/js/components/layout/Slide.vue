<template>
    <div class="slide">
        <img v-bind:src="slide.src">
    </div>
</template>

<script>
    export default {
        name: "Slide",
        data:function(){
            return {}
        },
        props:{
          slide:['slide']
        }
    }
</script>

<style scoped>

</style>