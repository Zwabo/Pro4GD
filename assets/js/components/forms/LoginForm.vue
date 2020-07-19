<template>
    <form method="post" @submit="submitForm" id="loginForm">
        <div v-if="error" class="alert alert-danger">{{error}}</div>

        <div class="mb-3" v-if="user != null">
            <span class="loggedInText">Sie sind als <router-link :to="'/profile/' + user.username" class="profileLink">{{user.username}}</router-link> eingeloggt.</span>
            <router-link :to="'/profile/' + user.username" class="logoutButton">Ausloggen</router-link>
        </div>

        <div v-else class="container-fluid">
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

            <button class="btn btn-lg btn-primary buttonWhite float-right" type="submit">
                Einloggen
            </button>
        </div>


    </form>
</template>

<script>
    export default {
        name: "LoginForm",
        mounted: function(){
            //Get user from local storage
          this.user = JSON.parse(localStorage.getItem('user'));
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
            goToLogout: function() {
                this.$router.push({path: '/logout'});
            },

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

                        //Store user in local storage
                        localStorage.setItem('user', JSON.stringify(this.user));

                        //Send logged in information to Event Bus
                        this.$root.$emit('loggedIn');

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
                    this.$router.push('/garden/' + this.user.id);
                });


            }
        }
    }
</script>

<style scoped>
    .loginLogo svg {
        fill: white;
        height: 200px;
    }

    .h1Logo {
        font-size: 350%;
        text-transform: uppercase;
    }

    .loggedInText {
        font-size: 120%;
    }

    .profileLink { color: #707070; }
    .profileLink:hover { color: #B8E269; }
    .profileLink:active { color: #707070; }

    /*--------------------button---------------------------*/
    .logoutButton {
        background-color: white;
        padding: 1% 2%;
        color: #97B753;;
        border: 2px solid #97B753;
        border-radius: 10px;
        font-size: 90%;
        margin-left: 2%;
    }
    .logoutButton:hover {
        background-color: #B8E269;
        color: #707070;
        border: 2px solid #B8E269;
    }
    .logoutButton:active {
        background-color: white;
        color: #97B753;;
        border: 2px solid white;
    }

    /*Formular*/

    #loginForm label {
        width: 25%;
        font-size: 130%;
        text-align: left;
        margin-right: 2%;
    }
    #loginForm input {
        width: 61%;
        margin-bottom: 2%;
        color: #707070;
        height: 80%;
        border-radius: 10px;
    }
    #loginForm button {
        margin-right: 13%;
    }
</style>