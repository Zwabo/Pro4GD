<template>
    <div class="marginLeftRight row" v-if="friendsData">
        <div class="col-lg-8">
            <h3 class="h3Margin">Freunde</h3>
            <div class="greenLine"></div>

            <div v-for="friend in friendsData.friends" class="row justify-content-md-center bgWhiteGrey dropShadow borderRad10">
                <div class="col-lg-2 friendsPicture text-center justify-content-center">
                    <img class="smallUserPics" v-bind:src="friend.userPic">
                </div>
                <div class="col-lg-4 friendsInfo selfAlignCenter">
                    <ul class="noListStyle">
                        <li><b><router-link :to="{ name: 'profile', params: { username: friend.username }}">{{friend.firstName}} {{friend.lastName}}</router-link></b> <em>({{friend.username}})</em></li>
                        <li>Sprössling</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="rightBoxes">
                <h4 class="bgLightGrey rightBoxesPadding h4Box">Freundschaftsanfragen</h4>
                <p class="rightBoxesPadding" v-for="request in friendsData.incomingRequests">
                    <b><router-link :to="{ name: 'profile', params: { username: request.username }}">{{request.firstName}} {{request.lastName}}</router-link></b> <em>({{request.username}})</em>
                    <button class="buttonDarkGreenMini" @click="confirmRequest(request.requestId)">Bestätigen</button>
                </p>
                <p class="rightBoxesPadding" v-if="friendsData.incomingRequests.length == 0">Keine Freundschaftsanfragen vorhanden</p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Friends",
        data: function(){
            return{
                friendsData: null,
                loggedInUser: null
            };
        },

        created: function() {
            this.loggedInUser = JSON.parse(localStorage.getItem('user'));

            //Retrieve user item from local storage in case of login
            this.$root.$on('loggedIn', () => {
                this.loggedInUser = JSON.parse(localStorage.getItem('user'));
            });
        },
        mounted: function(){
            this.$http.get('/api/friends/')
                .then(response => {
                    this.friendsData = response.data;
                    console.log(this.friendsData);
                })
                .catch(error => {
                    alert(error);
                });
        },
        methods: {
            confirmRequest: function(requestId){
                this.$http.put('/api/friends/confirmRequest/' + requestId)
                    .then(response => {
                        return this.$http.get('/api/friends/').then(response => {
                            this.friendsData = response.data;
                        });
                    })
                    .catch(error => {
                        alert(error);
                    });

                console.log(this.loggedInUser.username);

                this.$http.put('api/friends/' + this.loggedInUser.username + '/setCounterFriendsAdded')
                    .then(response => {console.log(response.data);})
                    .catch(error => {alert(error);});

            }
        }
    }
</script>

<style scoped>

</style>