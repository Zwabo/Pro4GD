<template>
    <div class="row">
        <div class="col right marginLeftRight">
            <div class="row garden">
                <div class="col-sm-11">
                    <p id="date">{{formatDate}}</p>
                    <h2 id="title">{{article.title}}</h2>
                    <p id="shortTextIntro">{{article.shortText}}</p>
                    <div class="greenLine"></div>
                    <p id="longText">{{article.long_Text}}</p>
                    <div class="backLinkDiv">
                    <router-link  class="readMore"  :to="'/news'">
                        <svg class="backSvg"><use href="#backIcon"></use></svg><span class="desktop">Zurück</span>
                    </router-link>
                    </div>
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
                article: {},
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

#date{
    margin-top:5%;
}
#shortTextIntro{
    font-weight: bold;
}

.backSvg {
    width: 20px;
    height: 20px;
    fill: #97B753;
    padding-right: 2%;
}

.backLinkDiv {
    text-align: right;
    padding-right: 1%;
}
.backLink:hover { color: #97B753; }
.backLink:hover .backSvg { fill: #B8E269; }
.backLink:active { color: #707070; }
.backLink:active .backSvg { fill: #707070; }


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