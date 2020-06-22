<template>
    <div class="row">
        <div class="col-lg-1 indexArrows">
            <svg><use href="#indexArrowLeft"></use></svg>
            <a class="prev" @click="prev" >Previous</a>
        </div>
        <div class="col-lg-10" id="indexNewsSlider">
    <transition-group name="fade" tag="div">
         <div v-for="i in [currentIndex]" :key="i">
            <div  class="row">
             <img class="col-lg-5"v-bind:src="currentArticle.thumbnail">
             <div class="col-lg-7"id="bgNewsArticleBox">
                 <h3 class="slider-title">{{currentArticle.title}}</h3>
                 <p id="slider-text">{{currentArticle.shortText}}</p>
                 <router-link class="slider-title"  id="slider-readMore" :to="'/news/' + currentArticle.id"> mehr lesen <b>>> </b></router-link>
             </div>

            </div>
             </div>

    </transition-group>

        </div>
        <div class="col-lg-1 text-right indexArrows">
            <svg><use href="#indexArrowRight"></use></svg>
            <a class="next" @click="next" > Next</a>
        </div>

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
    img {
        height:300px;
        width:100%
    }
    #indexNewsSlider {

    }
    .prev, .next {
        cursor: pointer;
        position: absolute;
        top: 40%;
        width: auto;
        padding: 16px;
        color: white;
        font-weight: bold;
        font-size: 18px;
        transition: 0.7s ease;
        border-radius: 0 4px 4px 0;
        text-decoration: none;
        user-select: none;
    }

    .next {
        right: 0;
    }

    .prev {
        left: 0;
    }

    .prev:hover, .next:hover {
        background-color: rgba(0,0,0,0.9);
    }


    #slider-text{
        padding-top: 4%;
        color:#707070;
        font-size:80%;
    }

    .slider-title{
        padding-top: 8%;
        color:white;
        font-size:100%;
    }
    #bgNewsArticleBox{
        background-color: #97B753;
        height: auto;
        width: auto;

    }

    #slider-readMore{
        font-size:80%;
        margin-left: 80%;
    }
</style>