<template>
    <form method="post" @submit="submitForm" id="loginForm">
        <div v-if="error" class="alert alert-danger">{{error}}</div>

        <div class="mb-3 text-center" v-if="user != null">
            <span class="loggedInText">Sie sind als <router-link :to="'/profile/' + user.username" class="profileLink">{{user.username}}</router-link> eingeloggt.</span>
            <router-link to="/logout" class="logoutButton">Ausloggen</router-link>
        </div>

        <div v-else class="container-fluid">
            <div class="row placeContentCenter">
                <h1 class="loginRegisterh1">Logge dich ein!</h1>
            </div>
            <div class="row">
                <label for="inputEmail" class="labelForm">Email</label>
                <input v-model="email"  placeholder="email@email.at" type="email" value="" name="email" id="inputEmail" class="form-control inputForm" required autofocus>
            </div>
            <div class="row">
                <label for="inputPassword" class="labelForm">Password</label>
                <input v-model="password" placeholder="************" type="password" name="password" id="inputPassword" class="form-control inputForm" required>
            </div>

            <button class="btn btn-lg btn-primary buttonWhite float-right" id="loginButton" type="submit">
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

    .loginRegisterh1 {
        font-size: 140%;
        text-transform: uppercase;
        margin-bottom: 5%;
        text-align: center;
    }

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
        text-align: right;
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


    /*---------------------------------------Media Queries-----------------------------------------------*/
    /*Large devices (desktops, less than 1200px)*/
    @media (max-width: 1199.98px) {
        .inputForm { width: 70% !important; }
        #loginButton { margin-right: 0 !important;}
    }

    /* Medium devices (tablets, less than 992px)*/
    @media (max-width: 991.98px) {
        .inputForm { width: 61% !important; }
        #loginButton { margin-right: 13% !important;}
    }

    /*Small devices (landscape phones, less than 768px)*/
    @media (max-width: 767.98px) {

    }

    /* Extra small devices (portrait phones, less than 576px)*/
    @media (max-width: 575.98px) {
        .inputForm { width: 97% !important; }
        .labelForm { width: 97% !important; }
        #loginButton { margin-right: 0 !important; }
        #loginForm label { text-align: left; }
        #loginForm input { margin-bottom: 4% !important; }
    }
</style>