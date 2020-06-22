<template>
    <div class="row">
        <div class="col right marginLeftRight">

            <div v-if="checkRole()">
            <add-news-article-modal
                    :newsData="newsData"
                @newArticle="newArticle" >
            </add-news-article-modal>
            </div>


                <h1 class="col-sm" id="news"  >Neuigkeiten </h1>
                <div class="greenLine"></div>

                <!-- v-for start-->
                <div v-for="news in newsData" >
                    <div class ="row">
                        <div class="col-lg-4">
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
               newsData: {},
                profileUser: { roles:['ROLE_ADMIN']},
                isAdmin: false,
                loggedInUser: {}
            }
        },
        created: function(){
            this.loggedInUser = JSON.parse(localStorage.getItem('user'));

            //Retrieve user item from local storage in case of login
            this.$root.$on('loggedIn', () => {
                this.loggedInUser = JSON.parse(localStorage.getItem('user'));
            });
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
            },

            checkRole: function(){
                if(this.loggedInUser.roles == 'ROLE_ADMIN'){
                    return true;
                } else {
                    return false;
                }

            }

    }


    }
</script>

<style scoped>
    .greyLine {
        margin-top: 3%;
        margin-bottom: 3%;
        width: 100%;
        height: 1.5px;
        background: grey;
    }

    #newsThumbnail{
        height:300px;
        width: 100%;
    }

    #news{
        text-transform: uppercase;
        color: #97B753;
        margin-top: 3%;
        font-size: 160%;
    }
    #date{
        font-size: 100%;
    }

    #title{
        margin-top: 4%;
        font-size: 135%;
        color:#97B753;

    }

    #shortText{
        margin-top: 2%;
        font-size: 100%;
    }

    #readMore{
        font-size: 90%;
        margin-top: 3%;
        margin-bottom: 10%;
        color:#97B753;
    }

    #longText{

        text-align: justify;
        margin-left:15%;

    }

    #shortTextIntro{
        margin-top: 3%;
        font-weight: bold;

    }

    .iconNews svg { width: 3%; fill: white; }
    .iconNews svg .path1 { fill: #B8E269; }
    .iconNews svg:hover .path1 {  fill: #97B753; }
    .iconNews svg:active { fill: #B8E269; }
    .iconNews svg:active .path1 { fill: #000000;}
    .iconNews {
        padding-top: 11px;
        padding-bottom: 5px;

    }

    .articleButtons{
        background-color: Transparent;
        outline: none;
        background-repeat:no-repeat;
        border: none;
        cursor:pointer;
        overflow: hidden;
    }
</style>