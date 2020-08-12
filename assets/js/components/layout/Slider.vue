<template>
    <div class="row" id="slider">

        <div id="leftSlide" class="col-lg-1 indexArrows" >
            <svg><use href="#indexArrowLeft"></use></svg>
            <a class="prev" @click="prev" >Previous</a>
        </div>


        <div class="col-lg-10" id="indexNewsSlider">

         <div v-for="i in [currentIndex]" :key="i" >
             <div class="row">
             <img class="col-lg-5"v-bind:src="currentArticle.thumbnail">
             <div class="col-lg-7"id="bgNewsArticleBox">
                 <h3 class="slider-title">{{currentArticle.title}}</h3>
                 <p id="slider-text">{{currentArticle.shortText}}</p>
                 <router-link class="slider-title"  id="slider-readMore" :to="'/news/' + currentArticle.id"> mehr lesen <b>>> </b></router-link>
             </div>
             </div>
         </div>
        </div>
        <div id="rightSlide" class="col-lg-1 text-right indexArrows">
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
            this.startSlide(),

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
            },
            startSlide: function() {
                this.timer = setInterval(this.next, 5000);
            },
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
    .prev, .next {
        cursor: pointer;
        position: absolute;
        top: 40%;
        width: 80px;
        padding: 16px;
        color: white;
        font-weight: bold;
        font-size: 12px;
        transition: 0.7s ease;
        border-radius: 4px 4px 4px 4px;
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


    .indexArrows svg { width: 50%; fill: #97B753; color:BLACK; }
    .indexArrows svg:hover { fill: #B8E269; }
    .indexArrows svg:active { fill: #707070; }

    /*---------------------------------------Media Queries-----------------------------------------------*/
    /*Large devices (desktops, less than 1200px)*/
    @media (max-width: 1199.98px) {

        .col-sm-5 {
            width: 50%;
        }

        .col-sm-7 {
            width: 50%;
        }

        .prev, .next {
            top: 40%;
            width: 70px;
            padding: 16px;
            text-align: center;
        }
    }
        /* Medium devices (tablets, less than 992px)*/
        @media (max-width: 991.98px) {

            img {
                width: 50%;
                height: auto;
            }

            #slider-readMore {
                font-size: 80%;
                margin-left: 70%;
            }

            .prev, .next {
                cursor: pointer;
                position: absolute;
                top: 40%;
                width: 70px;
                padding: 16px;
                color: white;
                font-weight: bold;
                font-size: 12px;
                transition: 0.7s ease;
                border-radius: 4px 4px 4px 4px;
                text-decoration: none;
                user-select: none;
                text-align: center;
            }
        }

        /*Small devices (landscape phones, less than 768px)*/
        @media (max-width: 767.98px) {
            .mobile{
                display:none;
            }
            img{
               min-width:35%;
                height:auto;
            }
            #slider-readMore {
                font-size: 80%;
                margin-left: 60%;
            }

            .prev, .next {
                top: 40%;
                width: 70px;
                padding: 16px;
                text-align: center;
            }
        }

        /* Extra small devices (portrait phones, less than 576px)*/
        @media (max-width: 575.98px) {

            .col-sm-1{
                width:20%;
            }
            .col-sm-10{
                width:80%;
            }

        }

</style>