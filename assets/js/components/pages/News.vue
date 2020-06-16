<template>
    <div class="row">
        <div class="col right marginLeftRight">


            <add-news-article-modal
                    :newsData="newsData"
                @newArticle="newArticle">
            </add-news-article-modal>


                <h1 class="col-sm" id="news"  >Neuigkeiten </h1>
                <div class="greenLine"></div>

                <!-- v-for start-->
                <div v-for="news in newsData">
                    <div class ="row">
                        <div class="col-lg-3">
                        <img id="newsThumbnail"  v-bind:src="news.thumbnail">
                        </div>
                        <div class="col-lg-8">
                            <h3 id="date">{{ news.date_posted.date.substr(8, 2)
                                + "." + news.date_posted.date.substr(5, 2)
                                + "." + news.date_posted.date.substr(0, 4) + "  " + news.date_posted.date.substr(10,6)}}</h3>
                            <h2 id="title" >{{news.title}}</h2>
                            <p id="shortText">{{ news.shortText }}</p>
                            <router-link id="readMore"  :to="'/news/' + news.id"> mehr lesen <b>>> </b></router-link>

                </div>


            </div>
                    <div class="greyLine"></div>
            </div>
                <!-- v-for end-->

            </div>

        </div>
</template>

<script>
    import AddNewsArticleModal from "../modals/AddNewsArticleModal";
    export default {
        name: "News",
        components: {AddNewsArticleModal},

        data: function(){
            return {
               newsData: null,
                dateFormat: null,
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
            newArticle: function(){
                location.reload(true);
            }
    }
    }
</script>

<style scoped>

</style>