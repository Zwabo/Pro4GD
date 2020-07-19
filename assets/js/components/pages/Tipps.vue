<template>
    <div class="row">
        <div class="col right marginLeftRight">


            <add-tipps-article-modal
                :tippsData="tippsData"
                @newTippsArticle="newTippsArticle" v-if="checkRole()">
            </add-tipps-article-modal>

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
                loggedInUser:{}
            }
        },
        created: function(){
            this.loggedInUser = JSON.parse(localStorage.getItem('user'));

            //Retrieve user item from local storage in case of login
            this.$root.$on('loggedIn', () => {
                this.loggedInUser = JSON.parse(localStorage.getItem('user'));
            });
            if(this.loggedInUser == null){
                this.$router.push('/login');
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
            },

            checkRole: function(){
                let role = this.loggedInUser.roles;

                for(let i = 0; i < this.loggedInUser.roles.length; i++) {
                    console.log(this.loggedInUser.roles);
                    if ((role[i] =='ROLE_ADMIN')) {
                        return true;
                    }
                };

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
        width:100%;
    }

    #news{
        text-transform: uppercase;
        color: #97B753;
        margin-top: 7%;
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
</style>