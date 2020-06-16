<template>
<div class="root">
    <transition-group name="fade" tag="div">
    <div v-for="i in [currentIndex]" :key="i">
            <div class ="row">
                <div>
                  <img src="currentArticle.src">

                </div>
        </div>
</div>
    </transition-group>
    <a class="prev" @click="prev" href="#">&#10094; Previous</a>
    <a class="next" @click="next" href="#">&#10095; Next</a>
</div>
</template>

<script>
    export default {
        name: "Slider",

        props:{
          news:null
        },
        data: function(){
            return {
              newsData: [{
                  title:null,
                  shortText:null,
                  long_text: null
              }],
                timer: null,
                currentIndex: 0,
            }
        },
        mounted: function(){
            this.$http.get('/api/news')
                .then(response => {
                    this.newsData = response.data;
                    console.log(response.data);

                })
                .catch(error => {
                    alert(error);
                });

        },
        methods: {

            next: function() {
                this.currentIndex += 1;
            },
            prev: function() {
                this.currentIndex -= 1;
            }
        },
        computed: {
            currentArticle: function() {
                return this.newsData[Math.abs(this.currentIndex) % this.newsData.length];
            }

    }
    }
</script>

<style scoped>

</style>