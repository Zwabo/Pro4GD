<template>
    <form method="post" @submit="submitForm" id="loginForm">
        <div v-if="error" class="alert alert-danger">{{error}}</div>

        <div class="mb-3" v-if="user != null">
            You are logged in as {{user.username}}, <router-link to="/logout">Logout</router-link>
        </div>

        <div class="container-fluid">
            <div class="row">
                <label for="inputComment">Comment</label>
                <input v-model="comment"  placeholder="Kommentar" type="text" value="" name="comment" id="comment" class="form-control" required autofocus>
            </div>
        </div>

        <button class="btn btn-lg btn-primary buttonWhite float-right" type="submit">
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
                error: ''
            }
        },
        methods:{
            submitForm: function(e){
                e.preventDefault();

                this.isLoading = true;
                this.error = '';

                this.$http
                    .post('/forum/addcomment', {
                        comment: this.comment,
                        user: this.user,
                        threadId: this.$route.params.id,
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

</style>