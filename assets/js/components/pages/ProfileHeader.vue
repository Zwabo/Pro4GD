<template>
    <div id="root">
    <div v-if="profileUser != null && createdUserString != null && loggedInUser != null">

        <div class="container-fluid">

            <!--------------------------------- upper profile part - HEADER ---------------------------->
            <div class="row bgDarkGrey fontWhite" id="userHeader">

                <!---------------------------user pictuer------------------------->
                <div class="col-lg-4" id="userPicCnt">
                    <img class="userPicture" v-bind:src="profileUser.userPic">
                </div>
                <div class="smallMobile">
                    <h2 class="userCntH2"> {{ profileUser.username }}</h2>
                    <p class="userCntRang">{{getLevel(profileUser.xp)}}</p>
                </div>

                <!---------------------------user name / info------------------------->
                <div id="userCnt" class="col-lg-5">
                    <h1 class="userCntH1 biggerMobile">{{ profileUser.firstname}} {{ profileUser.lastname }}</h1>
                    <h2 class="userCntH2 biggerMobile"> {{ profileUser.username }}</h2>
                    <p class="userCntRang biggerMobile">{{getLevel(profileUser.xp)}}</p>
                    <p class="userCntLevelbar"><b-progress :value="profileUser.xp" :max="max" variant="dark" class="w-50 mb-2" height="1.2rem"></b-progress></p>
                    <p class="userCntXPLeft">{{XPleft(profileUser.xp)}}</p>
                </div>

                <!------------------------------------user info---------------------------->
                <div id="userDataCnt" class="col-lg-3">
                    <ul class="noListStyle">
                        <li id="userDataCntCreated" class="floatSmall">
                            <svg><use href="#profile"></use></svg>
                            seit {{ createdUserString }} Mitglied
                        </li>
                        <li id="userDataCntLocation">
                            <svg><use href="#locationPin"></use></svg>
                            {{ profileUser.country }}
                        </li>
                        <li v-if="showBirthday" id="userDataCntBirthday" class="floatSmall">
                            <svg><use href="#calendar"></use></svg>
                            {{ birthdayString }}
                        </li>
                        <li id="userDataCntAge" v-if="showBirthday">
                            <svg><use href="#birthday"></use></svg>
                            {{ userAge }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div style="display: none;">
            <!-- plus symbole -->
            <svg height="448pt"  width="448pt" xmlns="http://www.w3.org/2000/svg">
                <symbol id="plusOnly" viewBox="0 0 448 448">
                    <path d="m408 184h-136c-4.417969 0-8-3.582031-8-8v-136c0-22.089844-17.910156-40-40-40s-40 17.910156-40 40v136c0 4.417969-3.582031 8-8 8h-136c-22.089844 0-40 17.910156-40 40s17.910156 40 40 40h136c4.417969 0 8 3.582031 8 8v136c0 22.089844 17.910156 40 40 40s40-17.910156 40-40v-136c0-4.417969 3.582031-8 8-8h136c22.089844 0 40-17.910156 40-40s-17.910156-40-40-40zm0 0"/></symbol></svg>
            <!-- profile symbole -->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
          xml:space="preserve">
    <symbol id="profile" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;">
    <g> <g> <path d="M256,0c-74.4,0-135,60.6-135,135s60.6,135,135,135s135-60.6,135-135S330.4,0,256,0z"/></g></g>
    <g><g><path d="M424,358.2c-37-37.5-86-58.2-138-58.2h-60c-52,0-101,20.7-138,58.2C51.3,395.5,31,444.8,31,497c0,8.3,6.7,15,15,15h420
			c8.3,0,15-6.7,15-15C481,444.8,460.7,395.5,424,358.2z"/></g></g>
    </symbol></svg>
            <!-- location pin -->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
         style="enable-background:new 0 0 512 512;" xml:space="preserve">
    <symbol id="locationPin" viewBox="0 0 512 512" >
    <g><g><path d="M256,0C153.755,0,70.573,83.182,70.573,185.426c0,126.888,165.939,313.167,173.004,321.035
			c6.636,7.391,18.222,7.378,24.846,0c7.065-7.868,173.004-194.147,173.004-321.035C441.425,83.182,358.244,0,256,0z M256,278.719
			c-51.442,0-93.292-41.851-93.292-93.293S204.559,92.134,256,92.134s93.291,41.851,93.291,93.293S307.441,278.719,256,278.719z"/>
    </g></g></symbol></svg>
            <!-- birthday symbole -->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
     style="enable-background:new 0 0 469.333 469.333;" xml:space="preserve">
    <symbol id="birthday" viewBox="0 0 469.333 469.333" >
    <g><g><g>
   <path d="M234.56,128c23.573,0,42.667-19.093,42.667-42.667c0-8-2.24-15.573-6.08-21.973L234.56,0l-36.587,63.36
	c-3.84,6.4-6.08,13.973-6.08,21.973C191.893,108.907,210.987,128,234.56,128z"/>
    <path d="M362.56,192L362.56,192H255.893v-42.667h-42.667V192H106.56c-35.307,0-64,28.693-64,64v32.853
	c0,23.04,18.773,41.813,41.813,41.813c11.2,0,21.653-4.373,29.547-12.267l45.653-45.547l45.547,45.44
	c15.787,15.787,43.307,15.787,59.093,0l45.653-45.44l45.547,45.44c7.893,7.893,18.347,12.267,29.547,12.267
	c23.04,0,41.813-18.773,41.813-41.813V256C426.56,220.693,397.867,192,362.56,192z"/>
    <path d="M332.587,341.013L332.587,341.013l-22.933-22.933l-23.04,22.933c-27.84,27.84-76.48,27.84-104.32,0L159.36,318.08
	l-23.04,22.933c-13.76,13.973-32.213,21.653-51.947,21.653c-15.467,0-29.867-4.907-41.813-13.12V448
	c0,11.733,9.6,21.333,21.333,21.333h341.333c11.733,0,21.333-9.6,21.333-21.333v-98.453c-11.947,8.213-26.24,13.12-41.813,13.12
	C365.013,362.667,346.56,354.987,332.587,341.013z"/></g></g></g>
    </symbol></svg>
            <!-- calender symbole -->
            <svg height="512pt"  width="512pt" xmlns="http://www.w3.org/2000/svg">
                <symbol id="calendar" viewBox="0 0 512 512"><path d="m80 320h53.332031c8.832031 0 16-7.167969 16-16v-53.332031c0-8.832031-7.167969-16-16-16h-53.332031c-8.832031 0-16 7.167969-16 16v53.332031c0 8.832031 7.167969 16 16 16zm0 0"/><path d="m80 448h53.332031c8.832031 0 16-7.167969 16-16v-53.332031c0-8.832031-7.167969-16-16-16h-53.332031c-8.832031 0-16 7.167969-16 16v53.332031c0 8.832031 7.167969 16 16 16zm0 0"/><path d="m229.332031 320h53.335938c8.832031 0 16-7.167969 16-16v-53.332031c0-8.832031-7.167969-16-16-16h-53.335938c-8.832031 0-16 7.167969-16 16v53.332031c0 8.832031 7.167969 16 16 16zm0 0"/><path d="m229.332031 448h53.335938c8.832031 0 16-7.167969 16-16v-53.332031c0-8.832031-7.167969-16-16-16h-53.335938c-8.832031 0-16 7.167969-16 16v53.332031c0 8.832031 7.167969 16 16 16zm0 0"/><path d="m378.667969 320h53.332031c8.832031 0 16-7.167969 16-16v-53.332031c0-8.832031-7.167969-16-16-16h-53.332031c-8.832031 0-16 7.167969-16 16v53.332031c0 8.832031 7.167969 16 16 16zm0 0"/><path d="m448 64h-21.332031v-42.667969c0-11.773437-9.558594-21.332031-21.335938-21.332031h-21.332031c-11.777344 0-21.332031 9.558594-21.332031 21.332031v42.667969h-213.335938v-42.667969c0-11.773437-9.554687-21.332031-21.332031-21.332031h-21.332031c-11.777344 0-21.335938 9.558594-21.335938 21.332031v42.667969h-21.332031c-35.285156 0-64 28.714844-64 64v320c0 35.285156 28.714844 64 64 64h384c35.285156 0 64-28.714844 64-64v-320c0-35.285156-28.714844-64-64-64zm21.332031 384c0 11.753906-9.578125 21.332031-21.332031 21.332031h-384c-11.753906 0-21.332031-9.578125-21.332031-21.332031v-233.8125h426.664062zm0 0"/>
                </symbol></svg>
        </div>

    </div>
    </div>
</template>

<script>

    class ProfileComment {
        constructor(msg, username, userid, userpic, date, time) {
            this.msg = msg;
            this.username = username;
            this.userid = userid;
            this.userpic = userpic;
            this.date = date;
            this.time = time;
        }

        get commentDate() { return this.date; }
        get commentTime() { return this.time; }
        get commentUsername() { return this.username; }
        get commentUserid() { return this.userid; }
        get commentMsg() { return this.msg; }
        get commentUserpic() { return this.userpic; }
    }

    export default {
        name: "ProfileHeader",
        data: function() {
            return {
                profileUser: null,              // object for user
                profileUserFriends: null,

                createdUserString: null,        // date objects and age calculated from date objects
                birthdayString: null,
                userAge: null,

                loggedInUser: null,

                loggedInUserIsFriend: false,
                loggedInUserIsProfileUser: false,
                loggedInUserIsStranger: false,

                createdThreads: null,
                writtenComments: null,

                showBirthday: false,
                showComments: false,
                showFriends: false,
                showGarden: false,
                showForum: false,
            }
        },

        created: function(){
            this.loggedInUser = JSON.parse(localStorage.getItem('user'));

            //Retrieve user item from local storage in case of login
            this.$root.$on('loggedIn', () => {
                this.loggedInUser = JSON.parse(localStorage.getItem('user'));
            });
        },

        mounted: function(){
            //user

            this.$http.get('/api/profile/' + this.$route.params.username)
                .then(response => {
                    this.profileUser = response.data;

                    /*save the created date as string*/
                    this.createdUserString = this.profileUser.dateCreated.date.substr(8,2)
                        + "." + this.profileUser.dateCreated.date.substr(5,2)
                        + "." + this.profileUser.dateCreated.date.substr(0,4);

                    /*save the birtday as string*/
                    this.birthdayString = this.profileUser.dateBirth.date.substr(8,2)
                        + "." + this.profileUser.dateBirth.date.substr(5,2)
                        + "." + this.profileUser.dateBirth.date.substr(0,4);

                    /*calculate the age*/
                    let year = Number(this.profileUser.dateBirth.date.substr(0,4));
                    let month = Number(this.profileUser.dateBirth.date.substr(5,2));
                    let day = Number(this.profileUser.dateBirth.date.substr(8,2));
                    let today = new Date();
                    let age = today.getFullYear() - year;
                    if(today.getMonth() < month || (today.getMonth() == month && today.getDate() < day)) {
                        age--;
                    }
                    this.userAge = age.toString();

                    //console.log("start");
                    if(this.profileUser.comments == null) {
                        //console.log("it's null");
                    } else {
                        //console.log(this.profileUser.comments);
                    }

                    this.getCreatedThreads();
                    this.getWrittenComments();
                    return this.$http.get('/api/profile/' + this.$route.params.username + '/friends');
                })
                //friends
                .then(response => {
                    this.profileUserFriends = response.data;
                    console.log("here");
                    console.log(response.data);

                    this.checkRelationshipSelf(); //Check if logged in user is profile user
                    this.checkRelationshipFriend(); //Check if logged in user is a friend of profile user
                })
                .catch(error => {
                    //alert(error);
                    console.log(error);
                });
        },

        watch: {
            loggedInUserIsFriend: function(val) {
                if(this.profileUser.privacyBirthday == "friends" || "all"){
                    this.showBirthday = true;
                } if(this.profileUser.privacyComments == "friends" || "all") {
                    this.showComments = true;
                } if(this.profileUser.privacyFriends == "friends" || "all") {
                    this.showFriends = true;
                } if(this.profileUser.privacyGarden == "friends" || "all") {
                    this.showGarden = true;
                } if(this.profileUser.privacyForum == "friends" || "all") {
                    this.showForum = true;
                }
            },
            loggedInUserIsProfileUser: function(val){
                if(val){
                    this.showBirthday = true; this.showComments = true;
                    this.showFriends = true; this.showGarden = true;
                    this.showForum = true;
                }
            },
            loggedInUserIsStranger: function(val){
                if(this.profileUser.privacyBirthday == "all"){
                    this.showBirthday = true;
                } if(this.profileUser.privacyComments == "all") {
                    this.showComments = true;
                } if(this.profileUser.privacyFriends == "all") {
                    this.showFriends = true;
                } if(this.profileUser.privacyGarden == "all") {
                    this.showGarden = true;
                } if(this.profileUser.privacyForum == "all") {
                    this.showForum = true;
                }
            },

            checkAwardsTwo: function() {
                console.log("here");
            }
        },

        methods: {
            goBack: function() {
                this.$router.push({path: '/profile' + porfileUser.username});
            },

            getLevel: function (xp) {

                let level;
                if(xp <= 99){
                    level = "Sprössling";
                    this.max = 100;
                } else if(xp <= 399) {
                    level = "Hobbygärtner";
                    this.max = 400;
                } else if(xp <= 999) {
                    level = "Pflanzenflüsterer";
                    this.max = 1000;
                } else {
                    level = "Goldener Daumen";
                }

                return level;

            },

            XPleft: function (xp) {

                let string;

                if(xp <= 99){
                    string = xp + "/100XP bis zum Hobbygärtner";
                } else if(xp <= 399) {
                    string =  xp + "/400XP bis zum Pflanzenflüsterer";
                } else if(xp <= 999) {
                    string =  xp + "/1000XP bis zum Goldener Daumen";
                } else {
                    string ='';
                }

                return string;

            },

            getCreatedThreads: function() {
                console.log(this.profileUser.id);
                this.$http.get('/api/profile/getCreatedThreads/' + this.profileUser.id)
                    .then(response => {
                        this.createdThreads = response.data;
                    })
                    .catch(error => {
                        console.log(error);
                    });
            },

            getWrittenComments: function() {
                this.$http.get('/api/profile/getWrittenComments/' + this.profileUser.id)
                    .then(response => {
                        console.log(response.data);
                        this.writtenComments = response.data;
                    })
                    .catch(error => {
                        //console.log("getWrittenComments");
                        console.log(error);
                    })
            },

            getDateString: function(date) {
                return date.date.substr(8,2)
                    + "." + date.date.substr(5,2)
                    + "." + date.date.substr(0,4)
                    + ", " + date.date.substr(11,2)
                    + ":" + date.date.substr(14,2);
            },

            checkRelationshipSelf: function(){
                if(this.profileUser.username == this.loggedInUser.username){
                    this.loggedInUserIsProfileUser = true;
                }
            },
            checkRelationshipFriend: function(){
                if(!this.loggedInUserIsProfileUser){
                    for(let i = 0; i < this.profileUserFriends.length; i++){
                        if(this.profileUserFriends[i].username == this.loggedInUser.username){
                            this.loggedInUserIsFriend = true;
                            return;
                        }
                    }
                    this.loggedInUserIsStranger = true;
                }
            },
        }
    }
</script>

<style scoped>
    #userHeader { padding: 40px 50px; }
    #userHeader .smallMobile { display: none; }

    #userHeader #userPicCnt {
        text-align-last: center;
        align-self: center;
    }
    #userHeader #userPicCnt .userPicture {
        width: 150px;
        height: 150px;
        border-radius: 100px;
    }
    #userHeader #userCnt .userCntH1 {
        font-size: 180%;
        color: #B8E269;
    }
    #userHeader #userCnt .userCntH2 { font-size: 140%; }

    #userHeader #userDataCnt { align-self: center; }
    #userHeader #userDataCnt ul { font-size: 110%; }

    #userDataCnt ul li svg {
        width: 18px;
        height: 18px;
        margin-right: 3%;
        fill: #B8E269;
    }

    .userplantGardenAge svg {
        width: 10%;
        padding-bottom: 5%;
    }
    .userplantGardenAge p {
        display: inline-block;
        padding-left: 3%;
    }

    #userButton svg {
        fill: white;
        width: 15px;
        height: 15px;
        margin-left: 10px;
    }
    #userButton:hover svg { fill: #707070; }
    #userButton:active svg { fill: white; }


    /* picture in Buttons +*/
    .userProfileButton svg{ width: 20%; fill: white; }
    .userProfileButton svg .path1 { fill: #707070; }
    .firends:hover .userProfileButton svg { fill: white; }
    .friends:hover .userProfileButton svg .path1 {  fill: #97B753; }
    .friends:hover .userProfileButton svg:hover .path1 { fill: #B8E269; }
    .friends:active .userProfileButton svg:active { fill: #B8E269; }
    .friends:active .userProfileButton svg:active .path1 { fill: #000000;}

    .addUserButton svg { width: 20%; fill: white; }
    .addUserButton svg .path1 { fill: #707070; }
    .friends:hover .addUserButton svg { fill: white; }
    .friends:hover .addUserButton svg .path1 {  fill: #97B753; }
    .friends:hover .addUserButton svg:hover .path1 { fill: #B8E269; }
    .friends:active .addUserButton svg:active { fill: #B8E269; }
    .friends:active .addUserButton svg:active .path1 { fill: #000000;}

    /*---------------------------------------Media Queries-----------------------------------------------*/
    /*Large devices (desktops, less than 1200px)*/
    @media (max-width: 1199.98px) {
        .userProfileButton svg { width: 20%; }
        .addUserButton svg { width: 20%; }

        #userHeader #userPicCnt { width: 20%; }

        #userHeader #userCnt { width: 50%; }
        #userHeader #userCnt .userCntH1 { font-size: 160%; }
        #userHeader #userCnt .userCntH2 { font-size: 120%; }

        #userHeader #userDataCnt { width: 30%; }
        #userHeader #userDataCnt li {
            margin-bottom: 2%;
            font-size: 90%;
        }
    }

    /* Medium devices (tablets, less than 992px)*/
    @media (max-width: 991.98px) {
        #userHeader #userPicCnt .userPicture {
            width: 120px;
            height: 120px;
            border-radius: 100px;
        }
        #userHeader #userCnt { padding-left: 4%; }
        #userHeader #userCnt .userCntH1 { font-size: 140%; }
        #userHeader #userCnt .userCntH2 {
            font-size: 100%;
            margin-bottom: 1%;
        }
        #userHeader #userCnt p { font-size: 80%; }
        #userHeader #userCnt .userCntLevelbar { width: 150%; }

        #userHeader #userDataCnt li { font-size: 80%; }

    }

    /*Small devices (landscape phones, less than 768px)*/
    @media (max-width: 767.98px) {
        .userProfileButton svg { width: 22%; }
        .addUserButton svg { width: 22%; }

        #userHeader #userPicCnt { width: 30%; }
        #userHeader #userPicCnt .userPicture {
            float: left;
        }

        #userHeader #userCnt { width: 70%; align-self: center; }
        #userHeader #userCnt .userCntH1 { font-size: 120%; }
        #userHeader #usercnt .userCntH2 { font-size: 110%; }
        #userHeader #userCnt .userCntLevelbar { margin-bottom: 2%; }

        #userHeader #userDataCnt {
            width: 100%;
            margin-left: 31%;
            margin-top: 6%;
        }
        #userHeader #userDataCnt li { margin-bottom: 1%; }
        #userHeader #userDataCnt .floatSmall {
            float: left;
            width: 180px;
        }
    }

    /* Extra small devices (portrait phones, less than 576px)*/
    @media (max-width: 575.98px) {
        .userProfileButton svg { width: 40%; }
        .addUserButton svg { width: 40%; }

        #userHeader #userPicCnt { width: 40%; }
        #userHeader #userPicCnt .userPicture {
            width: 100px;
            height: 100px;
        }
        #userHeader #userCnt { width: 60%; }
        #userHeader #userCnt .userCntLevelbar { width: 200%; }

        #userHeader #userDataCnt {
            width: 100%;
            margin-left: 39%;
        }
        #userHeader #userDataCnt .floatSmall {float: none; }
        #userHeader #userDataCnt li { font-size: 80%; }
    }

    /* eigener Query */
    @media (max-width: 430px) {
        #userHeader #userPicCnt {
            width: 50%;
        }

        #userHeader #userPicCnt .userPicture {
            width: 80px;
            height: 80px;
            margin-bottom: 10%;
        }

        #userHeader .biggerMobile {
            display: none;
        }

        #userHeader .smallMobile {
            display: block;
            align-self: center;
        }

        #userHeader .smallMobile .userCntH2 {
            font-size: 120%;
            margin-bottom: 1%;
        }

        #userHeader .smallMobile .userCntRang {
            font-size: 100%;
        }

        #userHeader #userCnt {
            width: 100%;
            font-size: 110%;
        }

        #userHeader #userButton {
            font-size: 80%;
        }

        #userHeader #userDataCnt {
            width: 100%;
            margin-left: 0;
        }

        #userHeader #userDataCnt .floatSmall {
            float: left;
            width: 150px;
        }
    }
</style>