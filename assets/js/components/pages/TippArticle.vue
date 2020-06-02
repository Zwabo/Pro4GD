<template>
    <div class="row">
        <div class="col right marginLeftRight">
            <div class="row garden">
                <h1 class="col-sm" id="news"> </h1>

                <div class="greenLine"></div>

                <div class="col-lg-8">
                    <h3 id="date">{{formatDate}}</h3>
                    <h2 id="title">{{tippArticle.title}}</h2>
                    <p id="shortTextIntro">{{tippArticle.shortText}}</p>
                    <p id="longText">{{tippArticle.long_Text}}</p>
                    <router-link  class="readMore"  :to="'/tipps'"> >zurück </router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "TippArticle",

        data: function(){
            return {
                tippArticle: {},
                formatDate : null
            }
        },

        mounted: function(){
            this.$http.get('/api/tipps/' + this.$route.params.id)
                .then(response => {
                    this.tippArticle = response.data;
                    console.log(response.data);
                    //  this.formatDate = this.article.date_posted.date.substring(8,2);

                    this.formatDate = this.tippArticle.date_posted.date.substr(8,2)
                        + "." + this.tippArticle.date_posted.date.substr(5,2)
                        + "." + this.tippArticle.date_posted.date.substr(0,4) + "  " + this.tippArticle.date_posted.date.substr(10,6);
                })
                .catch(error => {
                    alert(error);
                });
        }
    }
</script>

<style scoped>

</style>