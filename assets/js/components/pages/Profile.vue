<template>
    <div id="root">
    <div v-if="profileUser != null && createdUserString != null && loggedInUser != null">

        <div class="container-fluid">

            <!-- upper profile part -->
            <div class="row bgDarkGrey fontWhite" id="userInfoCnt">
                <div class="col-lg-4" id="userPicCnt">
                    <img class="userPicture" v-bind:src="profileUser.userPic">
                </div>

                <div id="userCnt" class="col-lg-5">
                    <h1>{{ profileUser.firstname}} {{ profileUser.lastname }}</h1>
                    <h2> {{ profileUser.username }}</h2>
                    <p> Rang: {{ profileUser.level }}</p>
                    <p>Level: {{getLevel(profileUser.xp)}}</p>
                    <b-progress :value="profileUser.xp" :max="max" variant="dark" class="w-50 mb-2" height="1.2rem"></b-progress>
                    <p>{{XPleft(profileUser.xp)}}</p>

                    <button v-if="!(loggedInUser.username == profileUser.username) && loggedInUserIsStranger" @click="sendFriendRequest()" id="userButton">Hinzufügen <svg><use href="#plusOnly"></use></svg></button>
                    <button v-else-if="loggedInUser.username===profileUser.username && editProfile!=true" id="userButton"  v-on:click="changeProfile">Profil bearbeiten</button>
                    <button v-else-if="loggedInUser.username===profileUser.username && editProfile==true" id="userButton" v-on:click="saveProfile">Profil speichern</button>
                </div>

                <div id="userDataCnt" class="col-lg-3">
                    <ul class="noListStyle">
                        <li>
                            <svg><use href="#profile"></use></svg>
                            seit {{ createdUserString }} Mitglied
                        </li>
                        <li>
                            <svg><use href="#locationPin"></use></svg>
                            {{ profileUser.country }}
                        </li>
                        <li>
                            <svg><use href="#birthday"></use></svg>
                            {{ userAge }}
                        </li>
                        <li v-if="showBirthday">
                            <svg><use href="#calendar"></use></svg>
                            {{ birthdayString }}
                        </li>
                    </ul>
                </div>
            </div>

            <!--lower profile part-->
            <div class="row marginLeftRight">
                <div class="col-lg-8">
                    <div class="left">
                        <div id="description">
                            <h3 class="h3Margin">Über {{ profileUser.username }} </h3>
                            <div class="greenLine"></div>
                            <p v-if="editProfile">
                                <textarea class="smallInput" @blur="saveProfile" v-model="profileUser.description"></textarea>
                            </p>
                            <p v-if="!editProfile">
                                {{ profileUser.description }}
                            </p>

                        </div>

                        <div v-if="showFriends">
                            <h3 class="h3Margin">Freunde</h3>
                            <div class="greenLine"></div>

                            <div class="containerfluid">

                                <div v-for="(friend, index) in profileUserFriends" class="row friends bgWhiteGrey dropShadow borderRad10">

                                    <div class="col-lg-2 friendsPicture text-center justify-content-center">
                                        <!-- change to friends.userPic when friends are implemented correctly-->
                                        <img class="smallUserPics" v-bind:src="friend.userPic">
                                    </div>

                                    <div class="col-lg-6 friendsInfo selfAlignCenter">
                                        <ul class="noListStyle">
                                            <li>{{ friend.firstName }} {{ friend.lastname }}</li> <!-- {{ profileUser.username }}-->
                                            <li>{{ friend.username }}</li>
                                            <li>Rang: {{ friend.level }}</li> <!-- Rang Benennung: aus Lvl berechnet -->
                                        </ul>
                                    </div>

                                    <div class="col-lg-4 text-right selfAlignCenter friendsButtons justify-content-center">
                                        <span class="userProfileButton">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 455.4 455.4" style="enable-background:new 0 0 455.4 455.4;" xml:space="preserve">
<path class="path1" d="M405.5,412.8c-69.7,56.9-287.3,56.9-355.6,0c-69.7-56.9-62.6-300.1,0-364.1s293-64,355.6,0S475.2,355.9,405.5,412.8z"/><g><g><path class="path2" d="M229,16.7c-61.1,0-110.9,49.8-110.9,110.9S167.9,238.5,229,238.5s110.9-49.8,110.9-110.9S290.1,16.7,229,16.7z"/></g></g><path class="path2" d="M366,304.9c-30.4-30.8-70.6-47.8-113.3-47.8h-49.3c-42.7,0-83,17-113.3,47.8c-26,26.4-42,60.2-45.9,96.5c1.9,1.9,3.8,3.7,5.8,5.3c68.3,56.9,285.9,56.9,355.6,0c2.2-1.8,4.3-3.7,6.3-5.9C407.8,364.8,391.9,331.2,366,304.9z"/></svg>
                                        </span>
                                        <span class="addUserButton">
                                            <span class="addUserButton">
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 455.4 455.4" style="enable-background:new 0 0 455.4 455.4;" xml:space="preserve"><path class="path1" d="M405.5,412.8c-69.7,56.9-287.3,56.9-355.6,0c-69.7-56.9-62.6-300.1,0-364.1s293-64,355.6,0S475.2,355.9,405.5,412.8z"/><path class="path2" d="M362.8,227.9c0,14.2-11.4,25.6-25.6,25.6h-85.3v85.3c0,14.2-11.4,25.6-25.6,25.6s-25.6-11.4-25.6-25.6v-85.3
	h-85.3c-14.2,0-25.6-11.4-25.6-25.6s11.4-25.6,25.6-25.6h85.3v-85.3c0-14.2,11.4-25.6,25.6-25.6s25.6,11.4,25.6,25.6v85.3h85.3
	C351.4,202.3,362.8,213.7,362.8,227.9z"/></svg>
                            </span>
                                        </span>
                                    </div>
                                </div> <!--v-for ends here-->

                                <div class="row d-flex justify-content-end">
                                    <button class="buttonDarkGreen">Alle Freunde</button>
                                </div>

                            </div>
                        </div> <!-- freinds part end-->

                        <div id="garden" v-if="showGarden">
                            <h3 class="h3Margin">{{ profileUser.username }}s Garten</h3>
                            <div class="greenLine"></div>
                        </div>


                        <div class="container-fluid">
                            <div class="row">

                                <div class="col-lg-6">
                                    <div v-for="(userplant, index) in profileUserplants" class="container-fluid">
                                        <div v-if="index % 2 == 0 || index == 0" class="row paddingNormalize">
                                            <router-link :to="'/userplant/' + userplant.id" class="container-fluid">
                                                <div class="container-fluid plantsProfile dropShadow bgWhiteGrey ">
                                                    <div class="row">
                                                        <div class="col-lg-8 selfAlignCenter plantsProfileInfoCol">
                                                            <ul class="noListStyle">
                                                                <li>{{ userplant.name }}</li>
                                                                <li>{{ userplant.location }}</li>
                                                                <li>level erstellen</li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-lg-4 plantsProfileImgCol text-right align-self-center">
                                                            <img class="plantsProfileImg" v-bind:src="'../' + userplant.plant.icon">
                                                        </div>
                                                    </div>
                                                </div>
                                            </router-link>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div v-for="(userplant, index) in profileUserplants" class="container-fluid">
                                        <div v-if="index % 2 !== 0" class="row paddingNormalize">
                                            <router-link :to="'/userplant/' + userplant.id" class="container-fluid">
                                                <div class="container-fluid plantsProfile dropShadow bgWhiteGrey">
                                                    <div class="row">
                                                        <div class="col-lg-8 selfAlignCenter plantsProfileInfoCol">
                                                            <ul class="noListStyle">
                                                                <li>{{ userplant.name }}</li>
                                                                <li>{{ userplant.location }}</li>
                                                                <li>level erstellen</li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-lg-4 plantsProfileImgCol text-rigth align-self-center">
                                                            <img class="plantsProfileImg" v-bind:src="'../' + userplant.plant.icon">
                                                        </div>
                                                    </div>
                                                </div>
                                            </router-link>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="container-fluid" id="Besuchernachrichten" v-if="showComments">
                            <h3 class="h3Margin">Besuchernachrichten</h3>
                            <div class="greenLine"></div>
                            <div class="row" id="leaveComment">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-2"><img class="commentPics" v-bind:src="profileUser.userPic"></div>
                                        <div class="col-lg-10"><textarea v-model="commentMessage" class="commentInput" type="text" placeholder="Nachricht hinterlassen"></textarea></div>
                                    </div>
                                    <div class="text-right"><button v-on:click="saveComment" class="buttonComments">Nachricht speichern</button></div>
                                </div>
                            </div>

                            <div v-if="profileUser.comments == null" id="commentInfo">Keine Besuchernachrichten vorhanden</div>
                            <div v-else v-for="(profileComment, index) in profileUser.comments" class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-1 paddingNormalize"><img class="commentPics" v-bind:src="profileComment.userpic"></div>
                                    <div class="col-lg-11 commentMsg container-fluid">{{profileComment.msg}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-1"></div>
                                    <div class="col-lg-5 paddingNormalize">{{profileComment.username}}</div>
                                    <div class="col-lg-6 paddingNormalize text-right">{{profileComment.date}},  {{profileComment.time}}</div>
                                </div>
                                <div class="row">
                                    <div class="container-fluid text-right paddingNormalize">
                                        <button v-if="profileUser!=null && editProfile==true" class="deleteButton" @click="deleteComment(index)">Löschen</button>
                                    </div>
                                </div>
                                <div class="row smallWhiteGreyLine paddingNormalize"></div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-4">
                    <div class="rightBoxes">
                        <h4 class="bgLightGrey rightBoxesPadding h4Box" @click="checkAwards">Erungenschaften</h4>
                        <p class="rightBoxesPadding">
                            <span v-for="(award, index) in profileUser.awards">
                                <img class="awardImage" v-bind:src="'../' + award.awardIcon" v-bind:alt="loggedInUser.username + award.altText">
                            </span>


                        </p>
                    </div>

                    <div class="rightBoxes" v-if="showForum">
                        <h4 class="bgLightGrey rightBoxesPadding h4Box">Forenposts</h4>
                        <p class="rightBoxesPadding">Liste an Forenposts</p> <!-- wird aus dem Forum ausgelesen -->
                    </div>
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
        name: "Profile",
        data: function() {
            return {
                profileUser: null,              // object for user
                profileUserplants: null,        // object for userplants
                profileUserFriends: null,

                createdUserString: null,        // date objects and age calculated from date objects
                birthdayString: null,
                userAge: null,

                editProfile: false,             // bool if edit profile is active or not
                userTemp: null,

                commentMessage: "",             // new comment added in textarea
                newComment: "",                 // comment class of ProfileComment
                commentArray: "",               // temp array for deleting purpose

                loggedInUser: null,
                loggedInUserData: null,
                loggedInUserDataUserplants: null,
                loggedInUserDataFriends: null,

                loggedInUserIsFriend: false,
                loggedInUserIsProfileUser: false,
                loggedInUserIsStranger: false,

                requestsFinished: false,

                //Bools that determine whether certain components are shown or not
                showBirthday: false,
                showComments: false,
                showFriends: false,
                showGarden: false,
                showForum: false,

                max: 0,
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

            console.log("loggedInUser");
            console.log(this.loggedInUser);

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
                    return this.$http.get('/api/profile/' + this.$route.params.username + '/friends');
                })
                //friends
                .then(response => {
                    this.profileUserFriends = response.data;

                    this.checkRelationshipSelf(); //Check if logged in user is profile user
                    this.checkRelationshipFriend(); //Check if logged in user is a friend of profile user
                })
                .catch(error => {
                    //alert(error);
                    this.getError(error);
                });


            //userplants
            this.$http.get('/api/profile/' + this.$route.params.username + '/userplants')
                .then(response => {
                    this.profileUserplants = response.data;
                    if (this.profileUser.username === this.loggedInUser.username) {
                        this.checkAwards();
                    }
                })
                    .catch(error => {
                        this.getError(error);
                });

            /*---------------------------------------------------awards data-------------------------*/


            /*---------------------------------------------------badges data end-------------------------*/
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

            changeProfile: function() {
                this.editProfile = true;
            },

            saveProfile: function() {
                this.$http.put('/api/profile/' + this.$route.params.username + '/setDescription', this.profileUser.description)
                    .then(response => {
                        this.profileUser.descriptioin = response.data;
                    })
                    .catch(error => {
                        getError(error);
                    });

                this.editProfile = false;
            },

            saveComment: function() {

                let datetime = new Date();

                let month = datetime.getUTCMonth()+ 1;
                let day = datetime.getUTCDate();
                let year = datetime.getUTCFullYear();
                let hours = datetime.getHours();
                let minutes = datetime.getMinutes();

                let date = day + "." + month + "." + year;
                let time = hours + ":" + minutes;

                this.newComment = new ProfileComment(this.commentMessage, this.loggedInUser.username,
                    this.loggedInUser.id, this.loggedInUser.userPic, date, time);

                this.$http.put('/api/profile/' + this.$route.params.username + '/saveComment', this.newComment)
                    .then(response => {
                        this.profileUser = response.data;
                    })
                    .catch(error => {
                        this.getError(error);
                    });
                this.commentMessage = "";
                this.newComment = "";
            },

            deleteComment: function(index) {
                console.log(index);
                //this.profileUser.comments = this.profileUser.comments.splice(index, 1);
                console.log(this.profileUser.comments);
                this.commentArray = this.profileUser.comments.splice(index, 1);
                console.log("this.commentArray before");
                console.log(this.commentArray);

                this.commentArray = JSON.stringify(this.commentArray);

                console.log("splice");
                console.log(this.commentArray);


                this.$http.put('/api/profile/' + this.$route.params.username + '/deleteComment', this.commentArray)
                    .then(response => {
                        this.profileUser = response.data;
                        console.log(response.data);
                    })
                    .catch(error => {
                        this.getError(error);
                    });
            },

            getError(error) {
                console.log(error);

                let element = document.getElementById("root");
                let div = document.createElement("div");
                div.setAttribute('class', 'text-center errorMsg');

                let p1 = document.createElement("p");
                p1.textContent = "Ups. An error occured.";
                let p2 = document.createElement("p");
                p2.textContent = error;

                element.appendChild(div);
                div.appendChild(p1);
                div.appendChild(p2);
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

            sendFriendRequest: function(){
                this.$http.post('/api/friends/sendRequest/' + this.profileUser.id)
                    .then(response => {
                        return this.$http.get('/api/profile/' + this.$route.params.username + '/friends');
                    })
                    .then(response => {
                        this.profileUserFriends = response.data;
                        this.checkRelationshipSelf(); //Check if logged in user is profile user
                        this.checkRelationshipFriend(); //Check if logged in user is a friend of profile user
                    })
                    .catch(error => {
                        this.getError(error);
                    });
            },

            checkAwards: function() {
                //if user is on it's profile for the first time after registration
                if (this.loggedInUser.username === this.profileUser.username) {

                    /*----------------------------------member awards----------------------------------------------------*/
                    let memberAward = null;
                    let memberAwardVar = null;
                    let memberAwardMsg = null;

                    if (this.profileUser.memberAward === null) {
                        memberAward = "memberNew";
                        memberAwardVar = 1;
                        memberAwardMsg = "Glückwunsch. Errungenschaft \"Mitglied geworden\" freigeschalten.";
                    }
                    else if (this.profileUser.memberAward < 4) {
                        /*calculate difference between the dates*/
                        let currentDate = new Date();
                        let year = Number(this.profileUser.dateCreated.date.substr(0,4));
                        let month = Number(this.profileUser.dateCreated.date.substr(5,2));
                        let difference = (currentDate.getUTCFullYear()*12 + currentDate.getUTCMonth()) - (year*12 + month);

                        if (this.profileUser.memberAward === 1 && difference >= 3) {
                            memberAward = "memberBronce";
                            memberAwardVar = 2;
                            memberAwardMsg = "Glückwunsch. Errungenschaft \"Bronze Mitglied\" freigeschalten.";
                        } else if (this.profileUser.memberAward === 2 && difference >= 6) {
                            memberAward = "memberSilver";
                            memberAwardVar = 3;
                            memberAwardMsg = "Glückwunsch. Errungenschaft \"Silber Mitglied\" freigeschalten.";
                        } else if (this.profileUser.memberAward === 3 && difference >= 12) {
                            memberAward = "memberGold";
                            memberAwardVar = 4;
                            memberAwardMsg = "Glückwunsch. Errungenschaft \"Gold Mitglied\" freigeschalten.";
                        }
                    }

                    if (memberAward !== null || memberAwardMsg !== null) {
                        this.$http.put('/api/profile/' + this.profileUser.username + '/addNewAward', memberAward)
                            .then(response => { this.profileUser = response.data; })
                            .catch(error => { this.getError(error); });

                        this.$http.put('/api/profile/' + this.profileUser.username + '/setMemberAward', memberAwardVar)
                            .then(response => { this.profileUser = response.data; })
                            .catch(error => { this.getError(error); });

                        alert(memberAwardMsg);
                    }

                    /*----------------------------------friends awards----------------------------------------------------*/

                    if (this.profileUser.friendsAward < 300) {
                        let friendsAward = null;
                        let friendsAwardVar = null;
                        let friendsAwardMsg = null;

                        if (this.profileUser.friendsAward === null && this.profileUser.counterFriends >= 1) {
                            friendsAward = "friendsOne";
                            friendsAwardVar = 1;
                            friendsAwardMsg = "Glückwunsch. Errungenschaft \"Erste Freundschaf geschlossen\" freigeschalten.";
                        } else if (this.profileUser.friendsAward === 1 && this.profileUser.counterFriends >= 5) {
                            friendsAward = "friendsFive";
                            friendsAwardVar = 5;
                            friendsAwardMsg = "Glückwunsch. Errungenschaft \"Fünf Freundschaften geschlossen\" freigeschalten.";
                        } else if (this.profileUser.friendsAward === 5 && this.profileUser.counterFriends >= 10) {
                            friendsAward = "friendsTen";
                            friendsAwardVar = 10;
                            friendsAwardMsg = "Glückwunsch. Errungenschaft \"Zehn Freundschaften geschlossen\" freigeschalten.";
                        } else if (this.profileUser.friendsAward === 10 && this.profileUser.counterFriends >= 20) {
                            friendsAward = "friendsTwenty";
                            friendsAwardVar = 20;
                            friendsAwardMsg = "Glückwunsch. Errungenschaft \"Zwanzig Freundschaften geschlossen\" freigeschalten.";
                        } else if (this.profileUser.friendsAward === 20 && this.profileUser.counterFriends >= 50) {
                            friendsAward = "friendsFifty";
                            friendsAwardVar = 50;
                            friendsAwardMsg = "Glückwunsch. Errungenschaft \"50 Freundschaften geschlossen\" freigeschalten.";
                        } else if (this.profileUser.friendsAward === 50 && this.profileUser.counterFriends >= 70) {
                            friendsAward = "friendsSeventy";
                            friendsAwardVar = 70;
                            friendsAwardMsg = "Glückwunsch. Errungenschaft \"70 Freundschaften geschlossen\" freigeschalten.";
                        } else if (this.profileUser.friendsAward === 70 && this.profileUser.counterFriends >= 100) {
                            friendsAward = "friendsOnehundret";
                            friendsAwardVar = 100;
                            friendsAwardMsg = "Glückwunsch. Errungenschaft \"100 Freundschaften geschlossen\" freigeschalten.";
                        } else if (this.profileUser.friendsAward === 100 && this.profileUser.counterFriends >= 150) {
                            friendsAward = "friendsOnehundretfifty";
                            friendsAwardVar = 150;
                            friendsAwardMsg = "Glückwunsch. Errungenschaft \"150 Freundschaften geschlossen\" freigeschalten.";
                        } else if (this.profileUser.firendsAward === 150 && this.profileUser.counterFriends >= 200) {
                            friendsAward = "friendsTwohundret";
                            friendsAwardVar = 200;
                            friendsAwardMsg = "Glückwunsch. Errungenschaft \"200 Freundschaften geschlossen\" freigeschalten.";
                        } else if (this.profileUser.friendsAward === 200 && this.profileUser.counterFriends >= 250) {
                            friendsAward = "friendsTwohundretfifty";
                            friendsAwardVar = 250;
                            friendsAwardMsg = "Glückwunsch. Errungenschaft \"250 Freundschaften geschlossen\" freigeschalten.";
                        } else if (this.profileUser.friendsAward === 250 && this.profileUser.counterFriends >= 300) {
                            friendsAward = "friendsThreehundret";
                            friendsAwardVar = 300;
                            friendsAwardMsg = "Glückwunsch. Errungenschaft \"300 Freundschaften geschlossen\" freigeschalten.";
                        }

                        if (friendsAward !== null || friendsAwardVar !== null) {
                            this.$http.put('/api/profile/' + this.profileUser.username + '/addNewAward', friendsAward)
                                .then(response => { this.profileUser = response.data; })
                                .catch(error => { this.getError(error); });

                            this.$http.put('/api/profile/' + this.profileUser.username + '/setFriendsAward', friendsAwardVar)
                                .then(response => { this.profileUser = response.data; })
                                .catch(error => { this.getError(error); });

                            alert(friendsAwardMsg);
                        }
                    }

                    /*----------------------------------plant lived awards----------------------------------------------------*/
                    if (this.profileUserplants.length > 0 && this.profileUser.livedAward < 12) {

                        let currentDate = new Date;
                        let difference = 0;

                        // get the longest date out of the userplants created data
                        for (let i = 0; i < this.profileUserplants.length; i++) {
                            let currentYear = Number(this.profileUserplants[i].dateAdded.date.substr(0,4));
                            let currentMonth = Number(this.profileUserplants[i].dateAdded.date.substr(5,2));
                            let currentDifference = (currentDate.getUTCFullYear()*12 + currentDate.getUTCMonth()) - (currentYear*12 + currentMonth);
                            if (currentDifference > difference) {
                                difference = currentDifference;
                            }
                        }

                        let livedAward = null;
                        let livedAwardVar = null;
                        let livedAwardMsg = null;

                        if (this.profileUser.livedAward === null && difference >= 1) {
                            livedAward = "livedOneMonth";
                            livedAwardVar = 1;
                            livedAwardMsg = "Glückwunsch. Errungenschaft \"Pflanze hat einen Monat überlebt.\" freigeschalten.";
                        } else if (this.profileUser.livedAward === 1 && difference >= 3) {
                            livedAward = "livedThreeMonths";
                            livedAwardVar = 3;
                            livedAwardMsg = "Glückwunsch. Errungenschaft \"Pflanze hat drei Monate überlebt.\" freigeschalten.";
                        } else if (this.profileUser.livedAward === 3 && difference >= 6) {
                            livedAward = "livedSixMonths";
                            livedAwardVar = 6;
                            livedAwardMsg = "Glückwunsch. Errungenschaft \"Pflanze hat sechs Monate überlebt.\" freigeschalten.";
                        } else if (this.profileUser.livedAward === 6 && difference >= 12) {
                            livedAward ="livedTwelveMonths";
                            livedAwardVar = 12;
                            livedAwardMsg = "Glückwunsch. Errungenschaft \"Pflanze hat ein Jahr überlebt.\" freigeschalten.";
                        }

                        if (livedAward !== null || livedAwardVar !== null) {
                            this.$http.put('/api/profile/' + this.profileUser.username + '/addNewAward', livedAward)
                                .then(response => { this.profileUser = response.data; })
                                .catch(error => { this.getError(error); });

                            this.$http.put('/api/profile/' + this.profileUser.username + '/setLivedAward', livedAwardVar)
                                .then(response => { this.profileUser = response.data; })
                                .catch(error => { this.getError(error); });

                            alert(livedAwardMsg);
                        }
                    }

                    /*----------------------------------userplant added awards----------------------------------------------------*/

                    if (this.profileUserplants.length > 0 && this.profileUser.userplantAward < 500) {
                        let userplantAward = null;
                        let userplantAwardVar = null;
                        let userplantAwardMsg = null;

                        if (this.profileUser.userplantAward === null && this.profileUser.counterPlantsAdded >= 1) {
                            userplantAward = "userplantOne";
                            userplantAwardVar = 1;
                            userplantAwardMsg = "Glückwunsch. Errungenschaft \"Eine Pflanze dem eigenen Garten hinzugefügt.\" freigeschalten.";
                        } else if (this.profileUser.userplantAward === 1 && this.profileUser.counterPlantsAdded >= 5) {
                            userplantAward = "userplantFive";
                            userplantAwardVar = 5;
                            userplantAwardMsg = "Glückwunsch. Errungenschaft \"Fünf Pflanzen dem eigenen Garten hinzugefügt.\" freigeschalten.";
                        } else if (this.profileUser.userplantAward === 5 && this.profileUser.counterPlantsAdded >= 10) {
                            userplantAward = "userplantTen";
                            userplantAwardVar = 10;
                            userplantAwardMsg = "Glückwunsch. Errungenschaft \"Zehn Pflanzen dem eigenen Garten hinzugefügt.\" freigeschalten.";
                        } else if (this.profileUser.userplantAward === 10 && this.profileUser.counterPlantsAdded >= 20) {
                            userplantAward = "userplantTwenty";
                            userplantAwardVar = 20;
                            userplantAwardMsg = "Glückwunsch. Errungenschaft \"Zwanzig Pflanzen dem eigenen Garten hinzugefügt.\" freigeschalten.";
                        } else if (this.profileUser.userplantAward === 20 && this.profileUser.counterPlantsAdded >= 50) {
                            userplantAward ="userplantFifty";
                            userplantAwardVar = 50;
                            userplantAwardMsg = "Glückwunsch. Errungenschaft \"50 Pflanzen dem eigenen Garten hinzugefügt.\" freigeschalten.";
                        } else if (this.profileUser.userplantAward === 50 && this.profileUser.counterPlantsAdded >= 70) {
                            userplantAward = "userplantSeventy";
                            userplantAwardVar = 70;
                            userplantAwardMsg = "Glückwunsch. Errungenschaft \"70 Pflanzen dem eigenen Garten hinzugefügt.\" freigeschalten.";
                        } else if (this.profileUser.userplantAward === 70 && this.profileUser.counterPlantsAdded >= 100) {
                            userplantAward = "userplantOnehundret";
                            userplantAwardVar = 100;
                            userplantAwardMsg = "Glückwunsch. Errungenschaft \"100 Pflanzen dem eigenen Garten hinzugefügt.\" freigeschalten.";
                        } else if (this.profileUser.userplantAward === 100 && this.profileUser.counterPlantsAdded >= 150) {
                            userplantAward = "userplantOnehundretfifty";
                            userplantAwardVar = 150;
                            userplantAwardMsg = "Glückwunsch. Errungenschaft \"150 Pflanzen dem eigenen Garten hinzugefügt.\" freigeschalten.";
                        } else if (this.profileUser.userplantAward === 150 && this.profileUser.counterPlantsAdded >= 200) {
                            userplantAward = "userplantTwohundret";
                            userplantAwardVar = 200;
                            userplantAwardMsg = "Glückwunsch. Errungenschaft \"200 Pflanzen dem eigenen Garten hinzugefügt.\" freigeschalten.";
                        } else if (this.profileUser.userplantAward === 200 && this.profileUser.counterPlantsAdded >= 250) {
                            userplantAward = "userplantTwohundretfifty";
                            userplantAwardVar = 250;
                            userplantAwardMsg = "Glückwunsch. Errungenschaft \"250 Pflanzen dem eigenen Garten hinzugefügt.\" freigeschalten.";
                        } else if (this.profileUser.userplantAward === 250 && this.profileUser.counterPlantsAdded >= 300) {
                            userplantAward = "userplantThreehundret";
                            userplantAwardVar = 300;
                            userplantAwardMsg = "Glückwunsch. Errungenschaft \"300 Pflanzen dem eigenen Garten hinzugefügt.\" freigeschalten.";
                        } else if (this.profileUser.userplantAward === 300 && this.profileUser.counterPlantsAdded >= 350) {
                            userplantAward = "userplantThreehundretfifty";
                            userplantAwardVar = 350;
                            userplantAwardMsg = "Glückwunsch. Errungenschaft \"350 Pflanzen dem eigenen Garten hinzugefügt.\" freigeschalten.";
                        } else if (this.profileUser.userplantAward === 350 && this.profileUser.counterPlantsAdded >= 400) {
                            userplantAward = "userplantFourhundret";
                            userplantAwardVar = 400;
                            userplantAwardMsg = "Glückwunsch. Errungenschaft \"400 Pflanzen dem eigenen Garten hinzugefügt.\" freigeschalten.";
                        } else if (this.profileUser.userplantAward === 400 && this.profileUser.counterPlantsAdded >= 500) {
                            userplantAward = "userplantFivehundret";
                            userplantAwardVar = 500;
                            userplantAwardMsg = "Glückwunsch. Errungenschaft \"500 Pflanzen dem eigenen Garten hinzugefügt.\" freigeschalten.";
                        }

                        if (userplantAward !== null || userplantAwardVar !== null) {
                            this.$http.put('/api/profile/' + this.profileUser.username + '/addNewAward', userplantAward)
                                .then(response => { this.profileUser = response.data; })
                                .catch(error => { this.getError(error); });

                            this.$http.put('/api/profile/' + this.profileUser.username + '/setUserplantAddedAward', userplantAwardVar)
                                .then(response => { this.profileUser = response.data; })
                                .catch(error => { this.getError(error); });

                            alert(userplantAwardMsg);
                        }
                    }

                    /*----------------------------------userplant watered awards----------------------------------------------------*/

                    if (this.profileUserplants.length > 0 && this.profileUser.counterPlantsWatered < 500) {
                        let wateredAward = null;
                        let wateredAwardVar = null;
                        let wateredAwardMsg = null;

                        if (this.profileUser.wateredAward === null && this.profileUser.counterPlantsWatered >= 1) {
                            wateredAward = "wateredOne";
                            wateredAwardVar = 1;
                            wateredAwardMsg = "Glückwunsch. Errungenschaft \"Eine Pflanze gegossen.\" freigeschalten.";
                        } else if (this.profileUser.wateredAward === 1 && this.profileUser.counterPlantsWatered >= 5) {
                            wateredAward = "wateredFive";
                            wateredAwardVar = 5;
                            wateredAwardMsg = "Glückwunsch. Errungenschaft \"Fünf Pflanzen gegossen.\" freigeschalten.";
                        } else if (this.profileUser.wateredAward === 5 && this.profileUser.counterPlantsWatered >= 10) {
                            wateredAward = "wateredTen";
                            wateredAwardVar = 10;
                            wateredAwardMsg = "Glückwunsch. Errungenschaft \"Zehn Pflanzen gegossen.\" freigeschalten.";
                        } else if (this.profileUser.wateredAward === 10 && this.profileUser.counterPlantsWatered >= 20) {
                            wateredAward = "wateredTwenty";
                            wateredAwardVar = 20;
                            wateredAwardMsg = "Glückwunsch. Errungenschaft \"Zwanzig Pflanzen gegossen.\" freigeschalten.";
                        } else if (this.profileUser.wateredAward === 20 && this.profileUser.counterPlantsWatered >= 50) {
                            wateredAward ="wateredFifty";
                            wateredAwardVar = 50;
                            wateredAwardMsg = "Glückwunsch. Errungenschaft \"50 Pflanzen gegossen.\" freigeschalten.";
                        } else if (this.profileUser.wateredAward === 50 && this.profileUser.counterPlantsWatered >= 70) {
                            wateredAward = "wateredSeventy";
                            wateredAwardVar = 70;
                            wateredAwardMsg = "Glückwunsch. Errungenschaft \"70 Pflanzen gegossen.\" freigeschalten.";
                        } else if (this.profileUser.wateredAward === 70 && this.profileUser.counterPlantsWatered >= 100) {
                            wateredAward = "wateredOnehundret";
                            wateredAwardVar = 100;
                            wateredAwardMsg = "Glückwunsch. Errungenschaft \"100 Pflanzen gegossen.\" freigeschalten.";
                        } else if (this.profileUser.wateredAward === 100 && this.profileUser.counterPlantsWatered >= 150) {
                            wateredAward = "wateredOnehundretfifty";
                            wateredAwardVar = 150;
                            wateredAwardMsg = "Glückwunsch. Errungenschaft \"150 Pflanzen gegossen.\" freigeschalten.";
                        } else if (this.profileUser.wateredAward === 150 && this.profileUser.counterPlantsWatered >= 200) {
                            wateredAward = "wateredTwohundret";
                            wateredAwardVar = 200;
                            wateredAwardMsg = "Glückwunsch. Errungenschaft \"200 Pflanzen gegossen.\" freigeschalten.";
                        } else if (this.profileUser.wateredAward === 200 && this.profileUser.counterPlantsWatered >= 250) {
                            wateredAward = "wateredTwohundretfifty";
                            wateredAwardVar = 250;
                            wateredAwardMsg = "Glückwunsch. Errungenschaft \"250 Pflanzen gegossen.\" freigeschalten.";
                        } else if (this.profileUser.wateredAward === 250 && this.profileUser.counterPlantsWatered >= 300) {
                            wateredAward = "wateredThreehundret";
                            wateredAwardVar = 300;
                            wateredAwardMsg = "Glückwunsch. Errungenschaft \"300 Pflanzen gegossen.\" freigeschalten.";
                        } else if (this.profileUser.wateredAward === 300 && this.profileUser.counterPlantsWatered >= 350) {
                            wateredAward = "wateredThreehundretfifty";
                            wateredAwardVar = 350;
                            wateredAwardMsg = "Glückwunsch. Errungenschaft \"350 Pflanzen gegossen.\" freigeschalten.";
                        } else if (this.profileUser.wateredAward === 350 && this.profileUser.counterPlantsWatered >= 400) {
                            wateredAward = "wateredFourhundret";
                            wateredAwardVar = 400;
                            wateredAwardMsg = "Glückwunsch. Errungenschaft \"400 Pflanzen gegossen.\" freigeschalten.";
                        } else if (this.profileUser.wateredAward === 400 && this.profileUser.counterPlantsWatered >= 500) {
                            wateredAward = "wateredFivehundret";
                            wateredAwardVar = 500;
                            wateredAwardMsg = "Glückwunsch. Errungenschaft \"500 Pflanzen gegossen.\" freigeschalten.";
                        }

                        if (wateredAward !== null || wateredAwardVar !== null) {
                            this.$http.put('/api/profile/' + this.profileUser.username + '/addNewAward', wateredAward)
                                .then(response => { this.profileUser = response.data; console.log(response.data);})
                                .catch(error => { this.getError(error); });

                            this.$http.put('/api/profile/' + this.profileUser.username + '/setWateredAward', wateredAwardVar)
                                .then(response => { this.profileUser = response.data; console.log(response.data);})
                                .catch(error => { this.getError(error); });

                            alert(wateredAwardMsg);
                        }
                    }

                    /*----------------------------------xp rang awards----------------------------------------------------*/
                    let lvlAward = null;
                    let lvlAwardVar = null;
                    let lvlAwardMsg = null;

                    console.log(this.profileUser.xp);
                    console.log(this.profileUser.username);

                    if (this.profileUser.lvlAward !== "GoldenerDaumen") {
                        if (this.profileUser.xp >= 0 && this.profileUser.lvlAward === null) {
                            lvlAward = "lvlSproessling";
                            lvlAwardVar = "Sproessling";
                            lvlAwardMsg ="Glückwunsch! Sie haben den Rang \"Sprössling\" erreicht!";
                        } else if (this.profileUser.xp >= 100 && this.profileUser.lvlAward === "Sproessling") {
                            lvlAward = "lvlHobbygaertner";
                            lvlAwardVar = "Hobbygaertner";
                            lvlAwardMsg ="Glückwunsch! Sie haben den Rang \"Hobbygärtner\" erreicht!";
                        } else if (this.profileUser.xp >= 400 && this.profileUser.lvlAward === "Hobbygaertner") {
                            lvlAward = "lvlPflanzenfluesterer";
                            lvlAwardVar = "Pflanzenfluesterer";
                            lvlAwardMsg = "Glückwunsch! Sie haben den Rang \"Pflanzenflüsterer\" erreicht!";
                        } else if (this.profileUser.xp >= 1000 && this.profileUser.lvlAward === "Pflanzenfluesterer") {
                            lvlAward = "lvlGoldenerDaumen";
                            lvlAwardVar = "GoldenerDaumen";
                            lvlAwardMsg = "Glückwunsch! Sie haben den Rang \"Goldener Daumen\" erreicht!";
                        }
                    }

                    if (lvlAward !== null || lvlAwardVar !== null ){
                        this.$http.put('/api/profile/' + this.profileUser.username + '/addNewAward', lvlAward)
                            .then(response => { this.profileUser = response.data; console.log(response.data);})
                            .catch(error => { this.getError(error); });

                        this.$http.put('/api/profile/' + this.profileUser.username + '/setLvlAward', lvlAwardVar)
                            .then(response => { this.profileUser = response.data; console.log(response.data);})
                            .catch(error => { this.getError(error); });

                        alert(lvlAwardMsg);
                    }
                }
            },
        }
    }
</script>

<style scoped>
    .edit { display: none; }

    /* trigger fields with class editProfile*/
    .smallInput {
        display: block;
        width: 100%;
        height: 200px;
        border: 1px solid #97B753;
        background-color: #F5F5F5;
    }
    #leaveComment{
        margin-bottom: 3%;
    }
    .commentPics {
        max-width: 100px;
        min-width: 50px;
        width: 80%;
        border-radius: 100px;
    }
    .commentInput {
        width: 100%;
        height: 100%;
        border: 1px solid #97B753;
        border-radius: 4px;
        background-color: #F5F5F5;
    }
    .buttonComments {
        background-color: #97B753;
        padding: 1%;
        color: white;
        border: 2px solid #97B753;
        border-radius: 10px;
        font-size: 80%;
        margin-bottom: 2%;
        margin-top: 1%;
    }
    .buttonComments:hover {
        background-color: #B8E269;
        border: 2px solid #B8E269;
        color: #707070;
    }
    .buttonComments:active {
        background-color: #97B753;
        border: 2px solid #97B753;
        color: white;
    }

    .deleteButton {
        background-color: #97B753;
        padding: 1%;
        color: white;
        border: 2px solid #97B753;
        border-radius: 10px;
        font-size: 80%;
        margin-top: 1%;
    }
    .deleteButton:hover {
        background-color: #B8E269;
        border: 2px solid #B8E269;
        color: #707070;
    }
    .deleteButton:active {
        background-color: #97B753;
        border: 2px solid #97B753;
        color: white;
    }

    .smallWhiteGreyLine {
        width: 100%;
        height: 1px;
        background: #DEDEDE;
        margin-bottom: 4%;
        margin-top: 2%;
    }

    .commentMsg {
        background-color: #F5F5F5;
        border-radius: 6px;
        padding: 10px;
    }

    .awardImage {
        width: 15%;
        margin-bottom: 2%;
        margin-left: 1%;
    }
</style>