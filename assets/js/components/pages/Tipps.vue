<template>
    <div class="row">
        <div class="col right marginLeftRight">

            <button @click="adding = true">
            <add-tipps-article-modal
                :tippsData="tippsData"
                @newTippsArticle="newTippsArticle">
            </add-tipps-article-modal>
            </button>

            <h1 class="col-sm" id="news">Tipps & Tricks</h1>
            <div class="greenLine"></div>

            <!-- v-for start-->
            <div v-for="tipps in tippsData">
                <div class ="row">
                    <img class="col-sm-4"id="newsThumbnail"  v-bind:src="tipps.thumbnail">
                    <div class="col-sm-8">
                        <h3 id="date">{{ tipps.date_posted.date.substr(8, 2)
                            + "." + tipps.date_posted.date.substr(5, 2)
                            + "." + tipps.date_posted.date.substr(0, 4) + "  " + tipps.date_posted.date.substr(10,6)}}</h3>
                        <h2 id="title" >{{tipps.title}}</h2>
                        <p id="shortText">{{ tipps.shortText }}</p>
                        <router-link id="readMore"  :to="'/tipps/' + tipps.id"> mehr lesen <b>>> </b></router-link>

                    </div>

                    <div class="greyLine"></div>
                </div>
            </div>
            <!-- v-for end-->

        </div>
    </div>
</template>

<script>
  import AddTippsArticleModal from "../modals/AddTippsArticleModal";
    export default {

        name: "Tipps",
        components: {AddTippsArticleModal},

        data: function(){
            return {
                tippsData: null,
                dateFormat: null,
                adding: false
            }
        },

        mounted: function(){
            this.$http.get('/api/tipps')
                .then(response => {
                    this.tippsData = response.data;
                    console.log(response.data);

                })
                .catch(error => {
                    alert(error);
                });

        },
        methods: {
            newTippsArticle: function(){
               location.reload(true);
            }
        }
    }
</script>

<style scoped>

</style>