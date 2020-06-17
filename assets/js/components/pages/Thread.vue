 <template>
    <div id="root">

        {{ thread }}

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
                comment: null
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
                    this.thread = response.data;
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
              this.$router.go();
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