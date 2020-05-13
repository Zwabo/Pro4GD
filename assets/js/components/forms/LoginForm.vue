<template>
    <form method="post" @submit="submitForm" id="loginForm">
        <div v-if="error" class="alert alert-danger">{{error}}</div>

        <div class="mb-3" v-if="user != null">
            You are logged in as {{user.username}}, <a href="/security/logout">Logout</a>
        </div>

        <div class="container-fluid">
            <div class="row placeContentCenter">
                <h1 class="loginRegisterh1">Logge dich ein!</h1>
            </div>
            <div class="row">
                <label for="inputEmail">Email</label>
                <input v-model="email"  placeholder="email@email.at" type="email" value="" name="email" id="inputEmail" class="form-control" required autofocus>
            </div>
            <div class="row">
                <label for="inputPassword">Password</label>
                <input v-model="password" placeholder="************" type="password" name="password" id="inputPassword" class="form-control" required>
            </div>
        </div>

        <button class="btn btn-lg btn-primary buttonWhite float-right" type="submit">
            Einloggen
        </button>
    </form>
</template>

<script>
    export default {
        name: "LoginForm",
        mounted() {
            this.user = window.user; //get the global user object if user is already logged in
        },
        data: function(){
            return{
                email: "",
                password: "",
                isLoading: false,
                error: '',
                user: null
            }
        },
        methods:{
            submitForm: function(e){
                e.preventDefault();

                this.isLoading = true;
                this.error = '';

                this.$http
                    .post('/security/login', {
                        email: this.email,
                        password: this.password
                    })
                    .then(response => {
                        console.log(response.data);
                        this.user = response.data;
                        window.user = this.user; //Set the global user object to current user

                        //this.$emit('user-authenticated', userUri);
                        //this.email = '';
                        //this.password = '';
                    }).catch(error => {
                    if(error.response.data){
                        this.error = error.response.data.error;
                    }
                    console.log(error.response.data);
                }).finally(() => {
                    this.isLoading = false;
                })
            }
        }
    }
</script>

<style scoped>

</style>