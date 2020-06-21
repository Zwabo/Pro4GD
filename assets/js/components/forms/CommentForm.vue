<template>
    <form method="post" @submit="submitForm" id="commentForm">

        <div class="container-fluid">
            <div class="row">
                <label for="comment">Kommentar</label>
                <textarea v-model="comment"  type="text" name="comment" id="comment" class="form-control" required
                          placeholder="Dein Kommentar"></textarea>
            </div>
        </div>

        <button class="btn btn-lg btn-primary buttonDarkGreen float-right" type="submit">
            Kommentar erstellen
        </button>
    </form>
</template>

<script>
    export default {
        name: "CommentForm",
        mounted: function(){
            //Get user from local storage
            this.user = JSON.parse(localStorage.getItem('user'));
        },
        data: function(){
            return{
                comment: "",
                isLoading: false,
                error: '',
                threadId: this.$route.params.id,
            }
        },
        methods:{
            submitForm: function(e){
                e.preventDefault();

                this.isLoading = true;
                this.error = '';

                this.$http
                    .post('/forum/addcomment', {
                        userId: this.user.id,
                        comment: this.comment,
                        threadId: this.$route.params.id,
                        likes: 0,
                    })
                    .then(response => {
                        console.log(response.data);
                    }).catch(error => {
                    if(error.response.data){
                        this.error = error.response.data.error;
                    }
                    console.log(error.response.data);
                }).finally(() => {
                    this.isLoading = false;
                    this.$router.go();
                });
            }
        }
    }
</script>

<style scoped>

    .row { margin-top: 3%; margin-bottom: 1%; }
    #comment { height: 10em; }
</style>