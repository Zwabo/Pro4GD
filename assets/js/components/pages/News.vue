<template>
    <div class="row">
        <div class="col right marginLeftRight">
            <div class="row garden">
                <h1 class="col-sm" id="news">Neuigkeiten</h1>

                <div class="greenLine"></div>

                <div  v-for="article in news">
                <div class="col-lg-4">
                    <p><img style="width: 10%;" src="{{ news.thumbnail }}"></p>
                </div>
                <div class="col-lg-8">
                    <h3 id="date">03. April 2020, 00:35</h3>
                    <h2 id="title">{{ news.title }}</h2>
                    <p id="shortText">{{ news.shortText }}</p>
                    <a  class="readMore"  router-link to="/news/article.id"> >mehr lesen <b>>> </b></a>
                </div>
                <div class="greenLine"></div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "News.vue",

        data: function(){
            return {
                news: null

            }
        },

     mounted: function(){
            this.$http.get('/api/news/')
                .then(response => {
                    this.news = response.data;
                })
                .catch(error => {
                    alert(error);
                });
        },
    }
</script>

<style scoped>

</style>