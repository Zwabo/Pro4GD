<template>
    <div>
        <!-- Button trigger modal -->
        <button type="button" class="buttonDarkGreen" data-toggle="modal" data-backdrop="static" data-target="#addNewsArticle"  @click="modalOpen = true">
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
                        <form v-on:submit="addNewsArticle">
                            <div class="form-group">
                                <label for="newsArticleTitle">Titel</label>
                                <input type="text" class="form-control" id="newsArticleTitle" v-model="title" required>
                            </div>
                            <div class="form-group">
                                <label for="shortText">Kurztext</label>
                                <textarea name="shortText" cols="40" rows="5" class="form-control" id="shortText" v-model="shortText"required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="fullText">Artikel</label>
                                <textarea name="fullText" cols="40" rows="5" class="form-control" id="fullText" v-model="long_text" required></textarea>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Artikel speichern">
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
                title: '',
                shortText: '',
                long_text: '',
                error: ''
            }
        },

        methods: {
            addNewsArticle: function (e) {

                if (this.title && this.shortText && this.long_text) {

                    this.$http.post('/api/news/createNewsArticle', {

                        title: this.title,
                        shortText: this.shortText,
                        long_text: this.long_text,
                    })
                        .catch(error => {
                            if (error.response.data) {
                                this.error = error.response.data;
                            }
                        });
                    this.$emit('newArticle');
                    e.preventDefault();
                }

            }

        }
    }
</script>

<style scoped>

</style>