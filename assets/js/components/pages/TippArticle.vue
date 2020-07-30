<template>
    <div class="row">
        <div class="col right marginLeftRight">
            <div class="row garden">

                <div class="col-sm-11">
                    <h3 id="date">{{formatDate}}</h3>
                    <h2 id="title">{{tippArticle.title}}</h2>
                    <p id="shortTextIntro">{{tippArticle.shortText}}</p>
                    <div class="greenLine"></div>
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

    /*---------------------------------------Media Queries-----------------------------------------------*/
    /*Large devices (desktops, less than 1200px)*/
    @media (max-width: 1199.98px) {

        .col-sm-11 { width: 100% !important;}
        #date{
            margin-top:5%;
            font-size:120%;
        }
        #shortTextIntro{
            font-weight: bold;
            font-size:110%;
        }

    }

    /* Medium devices (tablets, less than 992px)*/
    @media (max-width: 991.98px) {

        .col-sm-11 { width: 100% !important;}
    }

    /*Small devices (landscape phones, less than 768px)*/
    @media (max-width: 767.98px) {

        .col-sm-11  { width: 100% !important;}

    }

    /* Extra small devices (portrait phones, less than 576px)*/
    @media (max-width: 575.98px) {
        .col-sm-11 { width: 100% !important;}

        longText{font-size: 110%;}
    }


</style>