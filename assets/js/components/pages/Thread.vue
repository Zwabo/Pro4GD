<template>
    <div id="root">

        <h3>{{ thread[0] }}</h3><br>
        <div id="commentBox">
            <p id="commentText">InputText: {{ thread[1] }}</p><br>
            <p id="commentText">ThreadID: {{ thread[2] }}</p><br>
            <p id="commentText">Datum: {{ thread[3] }}</p><br>
            <p id="commentText">User: {{ thread[4] }}</p><br>
            <img id="commentUserImage" v-bind:src="thread[5]" /><br>
        </div>

        <div v-for="comment in comments">

            <div id="commentBox">
                <p id="commentText">KommentarID: {{ comment[0] }}</p><br>
                <p id="commentText">Kommentartext: {{ comment[1] }}</p><br>
                <p id="commentText">ErstelltDatum: {{ comment[2] }}</p><br>
                <p id="commentText">NutzerName: {{ comment[3] }}</p><br>
                <img id="commentUserImage" v-bind:src="comment[4]" />

            </div>
        </div>
        <comment-form></comment-form>

    </div>
</template>

<script>
    import CommentForm from "../forms/CommentForm.vue";

    export default {
        components: {CommentForm},
        name: "Thread",

        data: function() {
            return{
                isLoading: false,
                errorIndex: '',
                thread: null,
                comment: null,
                comments: null
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
            this.$http.get('/api/thread/' + this.$route.params.id)
                .then(response => {
                    this.thread = response.data.shift();
                    this.comments = response.data
                })
                .catch(error => {
                    alert(error);
                });
        },
    }
</script>

<style scoped>
</style>