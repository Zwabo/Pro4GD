<template>
    <div class="marginLeftRight row" v-if="friendsData">
        <div class="col-lg-8">
            <h3 class="h3Margin">Freunde</h3>
            <div class="greenLine"></div>

            <div v-for="friend in friendsData.friends" class="row justify-content-md-center bgWhiteGrey dropShadow borderRad10 friendEntry">
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

            if(this.loggedInUser == null){
                this.$router.push('/login');
            }
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
    .bgLightGrey { background-color: #DEDEDE; }

    .marginLeftRight { margin-left: 5%; margin-right: 5%; }
    .h3Margin {
        margin-top: 50px;
        color: #97B753;
    }
    .greenLine {
        width: 100%;
        height: 2px;
        background: #97B753;
        margin-bottom: 4%;
    }
    .smallUserPics {
        max-width: 100px;
        min-width: 50px;
        width: 80%;
        border-radius: 100px;
    }
    /*to align pictures to the center*/
    .selfAlignCenter {
        align-self: center;
    }
    /*ul class for no list style*/
    .noListStyle {
        list-style-type: none;
        margin-bottom: 0px;
        padding: 0px;
    }
    .rightBoxes {
        background-color: white;
        border: 2px solid #DEDEDE;
        border-radius: 10px;
        margin-bottom: 50px;
    }
    .rightBoxes:first-of-type {
        margin-top: 50px;
    }
    /*right side floating boxes*/
    .rightBoxesPadding { padding: 20px; }

    .buttonDarkGreenMini{
        background-color: #97B753;
        padding: 5px 8px;
        margin-left: 10px;
        color: white;
        border: 2px solid #97B753;
        border-radius: 10px;
        font-size: 10pt;
    }
    .friendEntry{
        margin-bottom: 20px;
        padding: 10px;
    }
    .h4Box { margin-top: 0px; }

    /*Large devices (desktops, less than 1200px)*/
    @media (max-width: 1199.98px) {
        .marginLeftRight { margin-left: 4%; margin-right: 4%; }

        .smallUserPics { width: 80%; }
    }

    /* Medium devices (tablets, less than 992px)*/
    @media (max-width: 991.98px) {
        .smallUserPics { width: 60%; }
    }

    @media (max-width: 767.98px) {
        .h4Box { font-size: 120%; }
    }

    /* Extra small devices (portrait phones, less than 576px)*/
    @media (max-width: 575.98px) {
        .marginLeftRight { margin-left: 2%; margin-right: 2%; }
    }
</style>