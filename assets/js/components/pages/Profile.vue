<template>
    <div v-if="profile != null">

        <div class="container-fluid" id="route">

            <!-- upper profile part -->
            <div class="col-lg-4" id="userPicCnt">
                <img class="userPicture" v-bind:src="profile.userPic">
            </div>

            <div id="userCnt" class="col-lg-5">
                <h1>{{ profile.firstname}} {{ profile.lastname }}</h1>
                <h2> {{ profile.username }}</h2>
                <p> Rang: {{ profile.level }}</p>

                <button v-if="profile==null">Hinzufügen</button>
                <button v-else>Profil bearbeiten</button>
            </div>

        </div>


        <div style="display: none;">
            <!-- plus symbole -->
            <!--<svg height="448pt"  width="448pt" xmlns="http://www.w3.org/2000/svg">
                <symbol id="plusOnly" viewBox="0 0 448 448">
                    <path d="m408 184h-136c-4.417969 0-8-3.582031-8-8v-136c0-22.089844-17.910156-40-40-40s-40 17.910156-40 40v136c0 4.417969-3.582031 8-8 8h-136c-22.089844 0-40 17.910156-40 40s17.910156 40 40 40h136c4.417969 0 8 3.582031 8 8v136c0 22.089844 17.910156 40 40 40s40-17.910156 40-40v-136c0-4.417969 3.582031-8 8-8h136c22.089844 0 40-17.910156 40-40s-17.910156-40-40-40zm0 0"/></symbol></svg>-->
        </div>

    </div>
</template>

<script>
    export default {
        name: "Profile",
        data: function() {
            return {
                profile: null,
                profileUser: null,

                /*email: "",
                userPic: "",
                firstName: "",
                lastName: "",
                userName: "",
                dateBirth: "",
                country: "",
                description: "",
                level: "",
                created: "",
                roles: [],
                achievements: [],
                //friends: [],
                userplants: "",
                error: "",*/

            }
        },

        created: function() {

        },

        mounted: function(){
            this.$http.get('/api/profile/' + this.$route.params.username)
                .then(response => {
                    console.log("response: " + response.data);
                    this.profile = response.data;
                })
                .catch(error => {
                    alert(error);
                    //this.getError(error);
                });

            this.profileUser = JSON.parse(localStorage.getItem('user'));

            console.log(this.profile);
        },

        methods: {
            /*getError(error) {
                console.log(error);

                let element = document.getElementById("route");
                let div = document.createElement("div");
                div.setAttribute('class', 'text-center errorMsg');

                let p1 = document.createElement("p");
                p1.textContent = "Ups. An error occured.";
                let p2 = document.createElement("p");
                p2.textContent = error;

                element.appendChild(div);
                div.appendChild(p1);
                div.appendChild(p2);
            }*/
        }
    }
</script>

<style scoped>

</style>