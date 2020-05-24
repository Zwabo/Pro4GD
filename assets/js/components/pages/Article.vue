<template>
    <div class="row">
        <div class="col right marginLeftRight">
            <div class="row garden">
                <h1 class="col-sm" id="news"> </h1>

                <div class="greenLine"></div>

                <div class="col-lg-8">
                    <h3 id="date">{{formatDate}}</h3>
                    <h2 id="title">{{article.title}}</h2>
                    <p id="shortTextIntro">{{article.shortText}}</p>
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
                article: null,
                formatDate : null
            }
        },

       mounted: function(){
            this.$http.get('/api/news/' + this.$route.params.id)
                .then(response => {
                    this.article = response.data;
                    console.log(response.data);
                  //  this.formatDate = this.article.date_posted.date.substring(8,2);

                    this.formatDate = this.article.date_posted.date.substr(8,2)
                        + "." + this.article.date_posted.date.substr(5,2)
                        + "." + this.article.date_posted.date.substr(0,4) + "  " + this.article.date_posted.date.substr(10,6);
                })
                .catch(error => {
                    alert(error);
                });
        }
    }
</script>

<style scoped>

</style>