<template>
    <div class="row">
        <div class="col right marginLeftRight">
            <div class="row garden">
                <h1 class="col-sm" id="news">Neuigkeiten</h1>

                <div class="greenLine"></div>
                <!-- v-for start-->
                <div v-for="news in newsData">
                <div class="col-lg-4">
                    <img id="newsThumbnail"  v-bind:src="news.thumbnail">
                </div>

                <div class="col-lg-8">
                    <h3 id="date">{{news.date}}</h3>
                    <h2 id="title" >{{news.title}}</h2>
                    <p id="shortText">{{ news.shortText }}</p>
                    <router-link class="readMore"   :to="'/news/' + news.id"> mehr lesen <b>>> </b></router-link>

                </div>
                <div class="greenLine"></div>
            </div>
                <!-- v-for end-->

            </div>

            </div>
        </div>
</template>

<script>
    export default {
        name: "News",

        data: function(){
            return {
                newsData: null
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
            getArticle:function(){
                this.$http.get('/api/news/' + this.$route.params.id)
                    .then(response => {
                        this.newsData = response.data;
                        console.log(response.data);
                    })
                    .catch(error => {
                        alert(error);
                    });
            }

        }
    }
</script>

<style scoped>

</style>