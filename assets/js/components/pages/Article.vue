<template>
    <div class="row">
        <div class="col right marginLeftRight">
            <div class="row garden">
                <h1 class="col-sm" id="news"> </h1>

                <div class="greenLine"></div>

                <div class="col-lg-8">
                    <h3 id="date">{{article.date}}</h3>
                    <h2 id="title">{{article.title}}</h2>
                    <p id="longText">{{article.long_Text}}</p>
                    <router-link  class="readMore"  :to="'/news'"> >zurück </router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Article",

        data: function(){
            return {
                article: null

            }
        },

       mounted: function(){
            this.$http.get('/api/news/' + this.$route.params.id)
                .then(response => {
                    this.article = response.data;
                    console.log(response.data);
                })
                .catch(error => {
                    alert(error);
                });
        }
    }
</script>

<style scoped>

</style>