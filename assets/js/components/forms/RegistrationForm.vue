<template>
    <div>
        <div v-if="!registrationComplete">
            <form method="post" @submit="submitForm" id="loginForm">
                <div v-if="error" class="alert alert-danger">{{error}}</div>

                <div class="mb-3" v-if="user != null">
                    You are logged in as {{user.username}}, <router-link to="/logout">Logout</router-link>
                </div>

                <div class="container-fluid">
                    <div class="row">
                        <label for="inputEmail">Email</label>
                        <input v-model="email"  placeholder="email@email.at" type="email" value="" name="email" id="inputEmail" class="form-control" required autofocus>
                    </div>
                    <div class="row">
                        <label for="inputFirstName">Vorname</label>
                        <input v-model="firstName"  placeholder="Max" type="text" value="" name="firstName" id="inputFirstName" class="form-control" required>
                    </div>
                    <div class="row">
                        <label for="inputLastName">Nachname</label>
                        <input v-model="lastName"  placeholder="Mustermann" type="text" value="" name="lastName" id="inputLastName" class="form-control" required>
                    </div>
                    <div class="row">
                        <label for="inputUsername">Benutzername</label>
                        <input v-model="username"  placeholder="Username" type="text" value="" name="username" id="inputUsername" class="form-control" required>
                    </div>
                    <div class="row">
                        <label for="inputPassword">Passwort</label>
                        <input v-model="password" placeholder="************" type="password" name="password" id="inputPassword" class="form-control" required>
                    </div>
                </div>

                <button class="btn btn-lg btn-primary buttonWhite float-right" type="submit">
                    Registrieren
                </button>
            </form>
        </div>

        <div v-if="registrationComplete">
            Registrierung abgeschlossen! <router-link to="/login/">LOGIN</router-link>
        </div>
    </div>
</template>

<script>
    export default {
        name: "RegistrationForm",
        mounted: function(){
            //Get user from local storage
            this.user = JSON.parse(localStorage.getItem('user'));
        },
        data: function(){
            return{
                email: "",
                firstName: "",
                lastName: "",
                username: "",
                password: "",
                isLoading: false,
                error: '',
                user: null,

                registrationComplete: false
            }
        },
        methods:{
            submitForm: function(e){
                e.preventDefault();

                this.isLoading = true;
                this.error = '';

                this.$http
                    .post('/security/register', {
                        email: this.email,
                        firstName: this.firstName,
                        lastName: this.lastName,
                        username: this.username,
                        password: this.password
                    })
                    .then(response => {
                        this.registrationComplete = true;
                        this.password = "";
                    }).catch(error => {
                    if(error.response.data){
                        this.error = error.response.data.error;
                    }
                    console.log(error.response.data);
                }).finally(() => {
                    this.isLoading = false;
                });
            }
        }
    }
</script>

<style scoped>

</style>