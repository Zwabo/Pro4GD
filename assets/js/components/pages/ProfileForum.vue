<template>
    <div v-if="profileUser != null && writtenCommentsFilled === true && createdThreadsFilled === true" id="root" style="margin:0" >
        <profile-header></profile-header>

            <div class="privacy paddingNormalize marginLeftRight">
                <div class="container-fluid paddingNormalize">
                    <div class="row marginTopOnSite h3Margin">
                        <h3 class="col-lg-8">Forumeinträge {{profileUser.username}}</h3>
                        <div class="col-lg-4">
                            <div class="backLinkDiv">
                                <router-link class="backLink" :to="'/profile/' + profileUser.username">
                                    <svg class="backSvg"><use href="#backIcon"></use></svg>Zurück
                                </router-link>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="greenLine"></div>

                <div v-if="writtenComments.length === 0 && createdThreads.length === 0">
                    {{profileUser.username}} hat noch keine Einträge ins Forum erstellt.
                </div>

                <div v-else class="container-fluid paddingNormalize">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="container-fluid paddingNormalize marginNormalize left">
                                <div class="paddingNormalize" v-if="writtenComments !== null">
                                    <h4 class="threadCommentsHL">Kommentierte Threads</h4>
                                    <hr>
                                    <div class="threadsCommentsInfo">
                                        <p v-for="(comment, index) in writtenComments" class=" threadList">
                                            <router-link :to="'/forum/' + comment.thread.id + '#comment' + comment.id">
                                                <div class="paddingNormalize">
                                                    <span class="commentHL">{{comment.thread.headline}}</span>
                                                    <span class="commentCategory">{{comment.thread.category.title}}</span>
                                                </div>
                                                <div class="paddingNormalize commentText">
                                                    <span>{{comment.text}}</span>
                                                </div>
                                                <div class="paddingNormalize commentCreated">
                                                    <span>{{getDateString(comment.created)}}</span>
                                                </div>
                                            </router-link>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="container-fluid paddingNormalize right">
                                <div class="paddingNormalize" v-if="createdThreads !== null">
                                    <h4 class="threadCommentsHL">Eröffnete Threads</h4> <!-- wird aus dem Forum ausgelesen -->
                                    <hr>
                                    <div class="threadCommentsInfo">
                                        <p v-for="(thread, index) in createdThreads" class="threadList">
                                            <router-link :to="'/forum/' + thread.id">
                                                <div class="paddingNormalize">
                                                    <span class="threadHL">{{thread.headline}}</span>
                                                    <span class="threadCategory">{{thread.category.title}}</span>
                                                </div>
                                                <div class="paddingNormalize">
                                                    <span class="threadCreated">{{getDateString(thread.created)}}</span>
                                                </div>
                                            </router-link>
                                        </p>
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

                    this.getCreatedThreads();
                    this.getWrittenComments();
                })
                .catch(error => {
                    console.log("get /api/profile/username error");
                    console.log(error);
                })
        },

        methods: {
            getCreatedThreads: function() {
                console.log(this.profileUser.id);
                this.$http.get('/api/profile/getCreatedThreads/' + this.profileUser.id)
                    .then(response => {
                        this.createdThreads = response.data;
                        this.createdThreadsFilled = true;
                        console.log('get /api/profile/getCreatedThreads/userid');
                        console.log(response.data);
                    })
                    .catch(error => {
                        console.log('get /api/profile/getCreatedThreads/userid error');
                        console.log(error);
                    });
            },

            getWrittenComments: function() {
                this.$http.get('/api/profile/getWrittenComments/' + this.profileUser.id)
                    .then(response => {
                        this.writtenCommentsFilled = true;
                        this.writtenComments = response.data;
                        console.log("get /api/profile/getWrittenComments/userid");
                        console.log(response.data);
                    })
                    .catch(error => {
                        console.log("get /api/profile/getWrittenComments/userid error");
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
        }
    }
</script>

<style scoped>
    /*.left { margin-right: 2%; }
    .right { margin-left: 2%; }*/
    .backSvg {
        width: 20px;
        height: 20px;
        fill: #97B753;
        padding-right: 2%;
    }
    .backLinkDiv {
        text-align: right;
        padding-right: 1%;
    }
    .backLink:hover { color: #97B753; }
    .backLink:hover .backSvg { fill: #B8E269; }
    .backLink:active { color: #707070; }
    .backLink:active .backSvg { fill: #707070; }
</style>