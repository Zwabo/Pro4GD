<template>
    <div id="root">
        <div class="container-fluid">

            <div class="row bgDarkGrey fontWhite" id="userInfoCnt">
                <div v-for="thread in threads">
                   <div id="threadRow">
                        <div id="threadBox">
                            <div id="threadHeadline">{{thread[0]}}</div>
                            <p id="commentText">{{thread[3]}}</p>
                            <p id="commentText">KommentarAnzahl {{thread[4]}}</p>
                            <img id="commentUserImage" v-bind:src="thread[2]" />

                            <a v-bind:href="'/forum/'+ thread[1]">Mehr lesen</a>
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
    }
</script>

<style scoped>
</style>