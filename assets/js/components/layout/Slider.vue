<template>
    <div class="row" id="slider">

        <div id="leftSlide" class="col-lg-1 indexArrows" >

            <a class="prev" @click="prev"> <svg xmlns="http://www.w3.org/2000/svg" width="49.021" height="62.886" viewBox="0 0 49.021 62.886">
                <g id="arrows" transform="translate(2156.676 -153.6) rotate(180)">
                    <g id="Gruppe_14" data-name="Gruppe 14" transform="translate(1900.2 -280)">
                        <g id="Gruppe_13" data-name="Gruppe 13" transform="translate(208 64.013)">
                            <path id="Pfad_37" data-name="Pfad 37" d="M255.1,93.077l-25.317-28.13a2.815,2.815,0,0,0-2.093-.934H210.816a2.811,2.811,0,0,0-2.093,4.692l23.624,26.251L208.723,121.2a2.816,2.816,0,0,0,2.093,4.7h16.878a2.851,2.851,0,0,0,2.093-.928L255.1,96.841A2.815,2.815,0,0,0,255.1,93.077Z" transform="translate(-208 -64.013)" fill="#97b753" stroke="#97b753" stroke-width="1"/>
                        </g>
                    </g>
                </g>
            </svg></a>
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
            <a class="next" @click="next" > <svg xmlns="http://www.w3.org/2000/svg" width="49.021" height="62.886" viewBox="0 0 49.021 62.886">
                <g id="arrows" transform="translate(-2107.655 216.487)">
                    <g id="Gruppe_14" data-name="Gruppe 14" transform="translate(1900.2 -280)">
                        <g id="Gruppe_13" data-name="Gruppe 13" transform="translate(208 64.013)">
                            <path id="Pfad_37" data-name="Pfad 37" d="M255.1,93.077l-25.317-28.13a2.815,2.815,0,0,0-2.093-.934H210.816a2.811,2.811,0,0,0-2.093,4.692l23.624,26.251L208.723,121.2a2.816,2.816,0,0,0,2.093,4.7h16.878a2.851,2.851,0,0,0,2.093-.928L255.1,96.841A2.815,2.815,0,0,0,255.1,93.077Z" transform="translate(-208 -64.013)" fill="#97b753" stroke="#97b753" stroke-width="1"/>
                        </g>
                    </g>
                </g>
            </svg>
            </a>
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
        font-size: 11px;
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


        .prev,.next{
            width:10%;
        }

        .col-lg-5 {
            width: 50%;
        }

        .col-lg-7 {
            width: 50%;
        }
        /*

        .prev, .next {
            top: 40%;
            width:70px;
            padding: 16px;
            text-align: left;
        }
        */
    }
        /* Medium devices (tablets, less than 992px)*/
        @media (max-width: 991.98px) {

            img {
                height:auto;
                width:50%
            }

            .col-lg-1{
                width:10%;
            }
            .col-lg-10{
                width:80%;
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
            .prev,.next{
                width:10%;
            }
            .col-lg-1{
                width:10%;
            }
            .col-lg-10{
                width:80%;
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

            .prev,.next{
                width:15%;
                top: 40%;
                width: 60px;
                padding: 16px;

            }
            .col-lg-1{
                width:15%;
            }
            .col-lg-10{
                width:70%;
            }
            #slider-readMore {
                font-size: 80%;
                margin-left: 60%;
            }


        }

</style>