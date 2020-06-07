<template>
    <div>
        <!-- Button trigger modal -->
        <button type="button" class="buttonDarkGreen" data-toggle="modal" data-backdrop="static" data-target="#addNewsArticle" @click="modalOpen = true">
            Neuer Artikel
        </button>

        <!-- Modal -->
        <div class="modal fade" id="addNewsArticle" tabindex="-1" role="dialog" aria-hidden="true" v-if="modalOpen == true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>Erstelle einen neuen Artikel: </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="modalOpen = false">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form v-on:submit.prevent="addNewsArticle">
                            <div class="form-group">
                                <label for="newsArticleTitle">Titel</label>
                                <input type="text" class="form-control" id="newsArticleTitle">
                            </div>
                            <div class="form-group">
                                <label for="shortText">Kurztext</label>
                                <textarea name="shortText" cols="40" rows="5" class="form-control" id="shortText"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="fullText">Artikel</label>
                                <textarea name="fullText" cols="40" rows="5" class="form-control" id="fullText"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary" @click="addNewsArticle" data-dismiss="modal">Artikel Speichern</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "AddNewsArticleModal",
        data: function(){
            return{
                modalOpen: false,
            }
        },
        methods:{
           addNewsArticle: function(){

            }
        }
    }
</script>

<style scoped>

</style>