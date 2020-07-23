<template>
    <div v-if="profileUser != null" id="root" style="margin:0" >
        <profile-header></profile-header>

        <div class="firstAfterHeader"></div>

        <div class="privacy paddingNormalize marginLeftRight">
            <div class="container-fluid paddingNormalize">
                <div class="row h3Margin">
                    <h3 class="col-lg-8 siteHL">Auszeichnungen <span class="desktop displaySmall">von {{profileUser.username}}</span></h3>
                    <div class="col-lg-4 siteBack">
                        <div class="backLinkDiv">
                            <router-link class="backLink" :to="'/profile/' + profileUser.username">
                                <svg class="backSvg"><use href="#backIcon"></use></svg><span class="desktop">Zurück</span>
                            </router-link>
                        </div>

                    </div>
                </div>
            </div>

            <div class="greenLine"></div>

            <div v-if="profileUser.awards.length === 0">
                {{profileUser.username}} hat noch keine Einträge ins Forum erstellt.
            </div>

            <div v-else class="container-fluid paddingNormalize">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="container-fluid paddingNormalize left">
                            <div v-if="memberAwards.length > 0">
                                <h4>Mitglied Auszeichnungen</h4>
                                <hr>
                                <div class="awards" v-for="(award, index) in memberAwards">
                                    <img class="awardImage" v-bind:src="'/../' + award.awardIcon" v-bind:alt="profileUser.username + award.altText" v-b-tooltip.hover :title="profileUser.username + award.altText">
                                    <span>{{profileUser.username}} {{award.altText}}</span>
                                </div>
                            </div>

                            <div v-if="lvlAwards.length > 0">
                                <h4 >Rang Auszeichnungen</h4>
                                <hr>
                                <div class="awards" v-for="(award, index) in lvlAwards">
                                    <img class="awardImage" v-bind:src="'/../' + award.awardIcon" :alt="profileUser.username + award.altText" v-b-tooltip.hover :title="profileUser.username + award.altText">
                                    <span>{{profileUser.username}} {{award.altText}}</span>
                                </div>
                            </div>

                            <div v-if="friendsAwards.length > 0">
                                <h4>Freundschaften Auszeichnungen</h4>
                                <hr>
                                <div class="awards" v-for="(award, index) in friendsAwards">
                                    <img class="awardImage" v-bind:src="'/../' + award.awardIcon" :alt="profileUser.username + award.altText" v-b-tooltip.hover :title="profileUser.username + award.altText">
                                    <span>{{profileUser.username}} {{award.altText}}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="container-fluid paddingNormalize right">
                            <div v-if="livedAwards.length > 0">
                                <h4>Pflanzen Überlebt Auszeichnungen</h4>
                                <hr>
                                <div class="awards" v-for="(award, index) in livedAwards">
                                    <img class="awardImage" v-bind:src="'/../' + award.awardIcon" :alt="profileUser.username + award.altText" v-b-tooltip.hover :title="profileUser.username + award.altText">
                                    <span>{{profileUser.username}} {{award.altText}}</span>
                                </div>
                            </div>

                            <div v-if="userplantAwards.length > 0">
                                <h4>Pflanzen hinzugefügt Auszeichnungen</h4>
                                <hr>
                                <div class="awards" v-for="(award, index) in userplantAwards">
                                    <img class="awardImage" v-bind:src="'/../' + award.awardIcon" :alt="profileUser.username + award.altText" v-b-tooltip.hover :title="profileUser.username + award.altText">
                                    <span>{{profileUser.username}} {{award.altText}}</span>
                                </div>
                            </div>

                            <div v-if="wateredAwards.length > 0">
                                <h4>Pflanzen gewässert Auszeichnungen</h4>
                                <hr>
                                <div class="awards" v-for="(award, index) in wateredAwards">
                                    <img class="awardImage" v-bind:src="'/../' + award.awardIcon" :alt="profileUser.username + award.altText" v-b-tooltip.hover :title="profileUser.username + award.altText">
                                    <span>{{profileUser.username}} {{award.altText}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div style="display: none;">
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	  style="enable-background:new 0 0 41 49;" xml:space="preserve">
                <symbol id="backIcon" viewBox="0 0 41 49">
                    <g id="Polygon_98" transform="translate(41) rotate(90)">
                        <path class="st0" d="M7,4.8l34.9,0c1.1,0,2.1,0.6,2.6,1.5s0.5,2.1,0,3L27.1,38.5c-0.5,0.9-1.5,1.5-2.6,1.5s-2-0.5-2.6-1.5L4.5,9.3
                            c-0.6-0.9-0.6-2.1,0-3C5,5.4,6,4.8,7,4.8z"/>
                        <path class="st0" d="M24.5,39c0.3,0,1.2-0.1,1.7-1L43.7,8.8c0.5-0.9,0.2-1.7,0-2c-0.2-0.3-0.7-1-1.7-1L7,5.8c-1.1,0-1.6,0.7-1.7,1
                            c-0.2,0.3-0.5,1.1,0,2L22.8,38C23.3,38.9,24.2,39,24.5,39 M24.5,41c-1.3,0-2.7-0.6-3.4-1.9L3.6,9.8C2,7.2,3.9,3.8,7,3.8l34.9,0
                            c3.1,0,5,3.4,3.4,6.1L27.9,39.1C27.2,40.4,25.8,41,24.5,41z"/>
                    </g>
                    </symbol>
</svg>

        </div>

        <div class="lastBeforeFooter"></div>
    </div>
</template>

<script>
    import ProfileHeader from "../pages/ProfileHeader.vue";
    export default {
        components: {ProfileHeader},
        name: "ProfileForum",
        data: function() {
            return {
                loggedInUser: null,
                profileUser: null,

                createdThreadsFilled: false,
                writtenCommentsFilled: false,

                createdThreads: null,
                writtenComments: null,

                friendsAwards: [],
                livedAwards: [],
                memberAwards: [],
                userplantAwards: [],
                wateredAwards: [],
                lvlAwards: [],
            }
        },

        created: function() {
            this.loggedInUser = JSON.parse(localStorage.getItem('user'));

            //Retrieve user item from local storage in case of login
            this.$root.$on('loggedIn', () => {
                this.loggedInUser = JSON.parse(localStorage.getItem('user'));
            });
        },

        mounted: function() {
            this.$http.get('/api/profile/' + this.$route.params.username)
                .then(response => {
                    this.profileUser = response.data;
                    console.log("get /api/profile/username");
                    console.log(response.data);

                    this.sortAwards();
                })
                .catch(error => {
                    console.log("get /api/profile/username error");
                    console.log(error);
                })
        },

        methods: {
            getDateString: function(date) {
                return date.date.substr(8,2)
                    + "." + date.date.substr(5,2)
                    + "." + date.date.substr(0,4)
                    + ", " + date.date.substr(11,2)
                    + ":" + date.date.substr(14,2);
            },

            sortAwards: function() {
                let friendsAwards = [];

                for (let i = 0; i < this.profileUser.awards.length; i++) {
                    let friendsString = this.profileUser.awards[i].name.slice(0, 7);
                    let livedString = this.profileUser.awards[i].name.slice(0, 5);
                    let memberString = this.profileUser.awards[i].name.slice(0, 6);
                    let userplantString = this.profileUser.awards[i].name.slice(0, 9);
                    let wateredString = this.profileUser.awards[i].name.slice(0, 7);
                    let lvlString = this.profileUser.awards[i].name.slice(0, 3);

                    if (friendsString === "friends") {
                        this.friendsAwards.push(this.profileUser.awards[i]);
                    }
                    if (livedString === "lived") {
                        this.livedAwards.push(this.profileUser.awards[i]);
                    }
                    if (memberString === "member") {
                        this.memberAwards.push(this.profileUser.awards[i]);
                    }
                    if (userplantString === "userplant") {
                        this.userplantAwards.push(this.profileUser.awards[i]);
                    }
                    if (wateredString === "watered") {
                        this.wateredAwards.push(this.profileUser.awards[i]);
                    }
                    if (lvlString === "lvl") {
                        this.lvlAwards.push(this.profileUser.awards[i]);
                    }
                }
            }
        }
    }
</script>

<style scoped>
    .awardImage {
        width: 5%;
        margin-bottom: 1%;
    }

    .left {
        width: 100%;
        margin-right: 3%;
    }
    .right {
        width: 100%;
        margin-left: 3%;
    }

    .siteHL { font-size: 140%; }

    /*---------------------------------------Media Queries-----------------------------------------------*/
    /*Large devices (desktops, less than 1200px)*/
    @media (max-width: 1199.98px) {
    }

    /* Medium devices (tablets, less than 992px)*/
    @media (max-width: 991.98px) {
        .siteHL { width: 70%; }
        .siteBack { width: 30%; }
        .left { margin-right: 0; }
        .right { margin-left: 0; }
        h4 { margin-top: 5%; }
    }

    /*Small devices (landscape phones, less than 768px)*/
    @media (max-width: 767.98px) {
        .siteHL { width: 70%; }
        .siteBack { width: 30%; }
        .displaySmall { display: none; }
        h4 { margin-top: 7%; }
    }

    /* Extra small devices (portrait phones, less than 576px)*/
    @media (max-width: 575.98px) {
        .desktop { display: none; }
        h4 { margin-top: 8%; }
        .left, .right {
            margin-left: 2%;
            margin-right: 2%;
        }
    }
</style>