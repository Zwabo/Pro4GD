<template>
    <div id="root">
{{ threads }}
        <div class="container-fluid">

            <div class="row bgDarkGrey fontWhite" id="userInfoCnt">

                <div v-for="thread in threads">
                    <div id="threadRow">
                        <div id="threadBox">
                            <div class="col-lg-12">
                                <div class="left">
                                    <h3 >{{thread[0]}}</h3>
                                    <p >{{thread[1]}}</p>
                                    <a v-bind:href="'/forum/'+ thread[2]">Mehr lesen</a>
                                </div>
                                <div class="right">
                                    <p >{{thread[3]}}</p>
                                    <p >{{thread[4]}}</p>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <h3>Neuen Thread erstellen</h3>
            <thread-form></thread-form>
        </div>


    </div>
</template>

<script>
    import ThreadForm from "../forms/ThreadForm.vue";

    export default {
        components: {ThreadForm},
        name: "Forum",

        data: function() {
            return{
                isLoading: false,
                errorIndex: '',
                threads: null
            }
        },

        created: function(){
            this.loggedUser = JSON.parse(localStorage.getItem('user'));

            //Retrieve user item from local storage in case of login
            this.$root.$on('loggedIn', () => {
                this.loggedUser = JSON.parse(localStorage.getItem('user'));
            });
        },

        mounted: function() {
            console.log(this.loggedUser);
            this.$http.get('/api/threads')
                .then(response => {
                    this.threads = response.data;
                })
                .catch(error => {
                    alert(error);
                });


        },

        methods: {
            submitFormIndex: function(e){
                e.preventDefault();

                this.isLoading = true;
                this.errorIndex = '';

                this.$http
                    .post('/security/login', {
                        email: this.emailIndex,
                        password: this.passwordIndex
                    })
                    .then(response => {
                        console.log(response.data);

                        this.redirect();

                    }).catch(error => {
                    if(error.response.data){
                        this.errorIndex = error.response.data.error;
                    }
                    console.log(error.response.data);
                }).finally(() => {
                    this.isLoading = false;
                })
            },

            redirect: function() {
                this.$router.push({name: 'forum'});
            },
        }
    }
</script>

<style scoped>
    .rowsIndexBottom { padding-bottom: 5%; }

    .rowsIndexBottom p {
        font-size: 120%;
        margin: 0 5%;
    }
</style>