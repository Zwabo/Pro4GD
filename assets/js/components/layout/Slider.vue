<template>
<div class="root">
    <transition-group name="fade" tag="div">
         <div v-for="i in [currentIndex]" :key="i">
            <div class="row">
             <img class="col-lg-5"v-bind:src="currentArticle.thumbnail">
             <div class="col-lg-7"id="bgNewsArticleBox">
                 <h3 class="slider-title">{{currentArticle.title}}</h3>
                 <p id="slider-text">{{currentArticle.shortText}}</p>
                 <router-link class="slider-title"  id="slider-readMore" :to="'/news/' + currentArticle.id"> mehr lesen <b>>> </b></router-link>
             </div>
            </div>
        </div>
    </transition-group>
    <a class="prev" @click="prev" >&#10094; Previous</a>
    <a class="next" @click="next" >&#10095; Next</a>
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
                  long_text: null,
                  thumbnail:null,
                  id: null
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