<template>
    <form method="post" @submit="submitForm" id="threadForm">
        <div class="container-fluid">
            <div class="row">
                <label for="inputEmail">Headline</label>
                <input v-model="headline"  placeholder="Überschrift" type="text" value="" name="headline" id="headline" class="form-control" required autofocus>
            </div>
            <div class="row">
                <label for="inputPassword">Text</label>
                <input v-model="text"  type="text" name="text" id="text" class="form-control" required>
            </div>
        </div>

        <button class="btn btn-lg btn-primary buttonWhite float-right" type="submit">
            Thread erstellen
        </button>
    </form>
</template>

<script>
    export default {
        name: "ThreadForm",
        mounted: function(){
            //Get user from local storage
          this.user = JSON.parse(localStorage.getItem('user'));
        },
        data: function(){
            return{
                headline: "",
                text: "",
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
                    .post('/forum/addthread', {
                        headline: this.headline,
                        text: this.text,
                        user: this.user
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