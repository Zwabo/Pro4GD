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
                <div v-for="news in newsData" >
                    <div class ="row">
                        <div class="col-sm-4">
                        <img id="newsThumbnail"  v-bind:src="news.thumbnail">
                        </div>
                        <div class="col-sm-8">
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
                loggedInUser: {}
            }
        },
        created: function(){
            this.loggedInUser = JSON.parse(localStorage.getItem('user'));

            //Retrieve user item from local storage in case of login
            this.$root.$on('loggedIn', () => {
                this.loggedInUser = JSON.parse(localStorage.getItem('user'));
            });
            if(this.loggedInUser === null){
                this.$router.push('/login');
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
            },

            checkRole: function(){
                let role = this.loggedInUser.roles;

                for(let i = 0; i < this.loggedInUser.roles.length; i++) {
                    console.log(this.loggedInUser.roles);
                    if ((role[i] =='ROLE_ADMIN')) {
                        return true;
                    }
                }
            },
            }

            /*filters: {
                reverse(items) {
                    return items.slice().reverse()
                }
            }*/
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



    .iconNews svg { width: 3%; fill: white; }
    .iconNews svg .path1 { fill: #B8E269; }
    .iconNews svg:hover .path1 {  fill: #97B753; }
    .iconNews svg:active { fill: #B8E269; }
    .iconNews svg:active .path1 { fill: #000000;}


    /*---------------------------------------Media Queries-----------------------------------------------*/
    /*Large devices (desktops, less than 1200px)*/
    @media (max-width: 1199.98px) {
        .col-sm-4{width:40%}
        .col-sm-8 { width: 60% !important;}

        #newsThumbnail{
            max-width: 100%;
            height: auto;}
    }

    /* Medium devices (tablets, less than 992px)*/
    @media (max-width: 991.98px) {
        .col-sm-4{width:40%}
        .col-sm-8 { width: 60% !important;}

        #newsThumbnail{ height:300px;
            max-width: 100%;
            height: auto;}

        #date{font-size:110%;
            margin-top:5%;
        }
        #shortText{
            font-size:110%;
        }
    }


    /*Small devices (landscape phones, less than 768px)*/
    @media (max-width: 767.98px) {
        .col-sm-4{width:40% }
        .col-sm-8 { width: 100% !important;}

        #newsThumbnail{
            max-width: 100%;
            min-width:60%;
            height: auto;}

    }

    /* Extra small devices (portrait phones, less than 576px)*/
    @media (max-width: 575.98px) {
        .col-sm-4{width:40%}
        .col-sm-8 { width:100% !important;}

        #newsThumbnail{
            max-width: 100%;
            height: auto;}
    }

</style>