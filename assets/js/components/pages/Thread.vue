<template>
    <div id="root" v-if="thread!=null">

        <div class="container-fluid paddingLeftRight">
            <div class="row marginTopOnSite">

                <div class="col-lg-9 paddingNormalize">
                    <h1 class="forumH1">
                        <router-link to="/forum"  id="naviLogo" class="backtextColor">
                            Forum
                        </router-link>
                        <span v-if="thread.category.parent!==''">/ {{thread.category.parent.title}}</span>
                        / {{thread.category.title}}</h1>
                </div>


                <div class="col-lg-2 text-right">
                            <router-link class="backLink routeBack" :to="'/forum/'">
                                <svg class="backSvg"><use href="#backIcon"></use></svg>
                                <span class="desktop backtext backtextColor">Zurück</span>
                            </router-link>
                </div>

                <!-- Button zum löschen von Threads für admins und supporting users -->
                <button v-show="checkRole()" type="button" class="buttonDarkGreen col-lg-2" @click="removeThread">
                    Thread löschen
                    <!-- Comment  <router-link :to="'/forum'" ></router-link>-->
                </button>

            </div>
            <div class="row greenLine paddingNormalize lineUnderHL"></div>

            <div class="row"><h3 class="h3MarginThread">{{thread.headline}}</h3></div>
            <div class="row greenLine lineAboveStart"></div>

            <div class="row threadText text-center bgWhiteGrey startPost">
                <div class="col-lg-2">
                    <img class="smallUserPics" v-bind:src="thread.userPic" /><br>
                    <p>{{thread.username}}</p>
                </div>
                <div class="col-lg-8 text-left">
                    <p>{{thread.text}}</p>
                </div>
                <div class="col-lg-2 paddingNormalize">
                    <div class="row">
                        <p>{{thread.created}}</p>
                        <p class="commentNr">#0</p>
                    </div>
                    <div class="row threadIcons">
                        <svg @click="likeIt" xmlns="http://www.w3.org/2000/svg" width="27.681" height="24.848" viewBox="0 0 27.681 24.848" id="heart">
                            <path id="heartFill" class="heartHover" d="M23.644,2.236A6.906,6.906,0,0,0,18.508,0a6.461,6.461,0,0,0-4.035,1.393,8.256,8.256,0,0,0-1.631,1.7,8.251,8.251,0,0,0-1.632-1.7A6.46,6.46,0,0,0,7.174,0,6.906,6.906,0,0,0,2.038,2.236,8.027,8.027,0,0,0,0,7.718a9.559,9.559,0,0,0,2.547,6.257,54.314,54.314,0,0,0,6.376,5.985c.883.753,1.885,1.606,2.925,2.516a1.508,1.508,0,0,0,1.985,0c1.04-.909,2.042-1.763,2.926-2.517a54.284,54.284,0,0,0,6.376-5.984,9.558,9.558,0,0,0,2.547-6.257,8.026,8.026,0,0,0-2.037-5.482Zm0,0" transform="translate(1 1)" v-bind:fill="likeHeartFill" stroke="#707070" stroke-width="2"/>
                        </svg>
                        <p class="iconText">{{thread.likes}}</p>
                    </div>
                </div>
            </div>
            <div class="greyLine commentLine"></div>

            <form method="post" @submit="submitForm" id="commentForm" class="commentForm">

                <div class="container-fluid">
                    <div class="row">
                        <label for="comment">Kommentar</label>
                        <textarea v-model="comment"  type="text" name="comment" id="comment" class="form-control" required
                                  placeholder="Dein Kommentar"></textarea>
                    </div>
                </div>

                <button class="btn btn-lg btn-primary buttonDarkGreen float-right" type="submit">
                    Kommentar erstellen
                </button>
            </form>

            <div class="greyLine commentLine"></div>
            <div v-for="comment in comments">
                <div class="row threadText text-center startPost" :id="'comment' + comment.id">
                    <div class="col-lg-2">
                        <img class="smallUserPics" v-bind:src="comment.userPic" /><br>
                        <p>{{comment.username}}</p>
                    </div>
                    <div class="col-lg-8 text-left">
                        <p>{{comment.text}}</p>
                    </div>
                    <div class="col-lg-2 paddingNormalize">
                        <div class="row">
                            <p>{{comment.created}}</p>
                            <p class="commentNr">#{{commentNr(comment.id)}}</p>
                        </div>
                        <div class="row threadIcons">
                            <svg @click="likeItId(comment.id)" xmlns="http://www.w3.org/2000/svg" width="27.681" height="24.848" viewBox="0 0 27.681 24.848" id="heart">
                                <path :id='"heartFill" + comment.id' class="heartHover" d="M23.644,2.236A6.906,6.906,0,0,0,18.508,0a6.461,6.461,0,0,0-4.035,1.393,8.256,8.256,0,0,0-1.631,1.7,8.251,8.251,0,0,0-1.632-1.7A6.46,6.46,0,0,0,7.174,0,6.906,6.906,0,0,0,2.038,2.236,8.027,8.027,0,0,0,0,7.718a9.559,9.559,0,0,0,2.547,6.257,54.314,54.314,0,0,0,6.376,5.985c.883.753,1.885,1.606,2.925,2.516a1.508,1.508,0,0,0,1.985,0c1.04-.909,2.042-1.763,2.926-2.517a54.284,54.284,0,0,0,6.376-5.984,9.558,9.558,0,0,0,2.547-6.257,8.026,8.026,0,0,0-2.037-5.482Zm0,0" transform="translate(1 1)" v-bind:fill="setHeartsComments(comment.id)" stroke="#707070" stroke-width="2"/>
                            </svg>
                            <p class="iconText">{{comment.likes}}</p>
                        </div>

                    </div>
                    <!-- Button zum löschen von Comments für admins und supporting users -->
                    <button v-if="checkRole()" type="button" class="buttonDarkGreen col-lg-2" @click="removeThread()">
                        Kommentar löschen
                    </button>
                </div>
                <div class="greyLine commentLine"></div>
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
                comments: null,
                loggedUser: {},

                commentCounter: 0,

                isLiked: null,
                likeHeartFill: null,

                likedComments: [],
            }
        },

        created: function(){
            this.loggedUser = JSON.parse(localStorage.getItem('user'));

            //Retrieve user item from local storage in case of login
            this.$root.$on('loggedIn', () => {
                this.loggedUser = JSON.parse(localStorage.getItem('user'));
            });

            this.$http.post('/forum/likedStatus/' + this.$route.params.id, {
                userId: this.loggedUser.id,
            })
                .then(response => {
                    this.isLiked = response.data;
                    if (this.isLiked === true) {
                        this.likeHeartFill = '#707070';
                    } else {
                        this.likeHeartFill = '#dedede';
                    }
                })
                .catch(error => {
                    alert(error);
                });

            this.$http.post('/forum/commentsLikedStatus/' + this.$route.params.id, {
                userId: this.loggedUser.id,
            })
                .then(response => {
                    this.likedComments = response.data;

                })
                .catch(error => {
                    alert(error);
                });
        },

        mounted: function() {
            this.$http.post('/api/thread/' + this.$route.params.id, {
                userId: this.loggedUser.id,
            }).then(response => {
                this.thread = response.data.shift();
                this.comments = response.data;
            })
                .catch(error => {
                    alert(error);
                });
        },

        methods: {
            // ------------------------------------ CommentForm ------------------------------------

            submitForm: function(e){
                e.preventDefault();

                this.isLoading = true;
                this.error = '';

                this.$http
                    .post('/forum/addcomment', {
                        userId: this.loggedUser.id,
                        comment: this.comment,
                        threadId: this.$route.params.id,
                        likes: 0,
                    })
                    .then(response => {
                        this.comment = '';
                        this.comments.push(response.data)
                    }).catch(error => {
                    if(error.response.data){
                        this.error = error.response.data.error;
                    }
                    console.log(error.response.data);
                });
            },

            //--------------------------------------THREADS LIKES + HILFSMETHODEN-------------------------------
            //likeIt for threads
            likeIt: function() {
                this.$http.post('/forum/likedStatus/' + this.thread.id, {
                    userId: this.loggedUser.id,
                })
                    .then(response => {
                        this.isLiked = response.data;
                        this.setHearts(this.isLiked, this.thread.id);
                    })
                    .catch(error => {
                        alert(error);
                    });
            },
            //setHearts for threads
            setHearts: function(liked, threadID) {
                if (liked === false) {
                    this.$http.post('/api/forum/addThreadLike/'+ threadID, {
                        userId: this.loggedUser.id,
                    })
                        .then(response => {
                        })
                        .catch(error => {
                            alert(error);
                        });

                    this.likeHeartFill = "#707070";
                    this.isLiked = false;
                    this.thread.likes++;
                } else {
                    this.$http.post('/api/forum/removeThreadLike/' + threadID, {
                        userId: this.loggedUser.id,
                    })
                        .then(response => {
                        })
                        .catch(error =>  {
                            alert(error);
                        });

                    this.likeHeartFill = "#dedede";
                    this.isLiked = true;
                    this.thread.likes--;
                }
            },
            //check for threads
            checkLiked: function(commentId) {
                let isLiked = false;
                for (let i = 0; i < this.likedComments.length; i++) {
                    if (this.likedComments[i] === commentId) {
                        isLiked = true;
                        return '#707070';
                    } else {
                        return '#dedede';
                    }
                }
            },

            //--------------------------------------COMMENTS LIKES + HILFSMETHODEN-------------------------------
            likeItId: function(commentid) {
                let commentId = commentid - 1;
                let isLiked = false;
                let idArray = null;

                for (let i = 0; i < this.likedComments.length; i++) {
                    if (this.likedComments[i] === commentid) {
                        isLiked = true;
                        idArray = i;
                    }
                }

                if (isLiked === false) {
                    this.$http.post('/forum/addLike/' + commentid, {
                        userId: this.loggedUser.id,
                    })
                        .then(response => { })
                        .catch(error => { console.log(error); });

                    this.comments.forEach(function (comment) {
                        if (commentid === comment.id) {
                            comment.likes++;
                            comment.isliked = true;
                        }
                    });

                    this.$http.post('/forum/commentsLikedStatus/' + this.$route.params.id, {
                        userId: this.loggedUser.id,
                    })
                        .then(response => { this.likedComments = response.data; })
                        .catch(error => { console.log(error); });
                } else {
                    this.$http.post('/forum/removeLike/' + commentid, {
                        userId: this.loggedUser.id,
                    })
                        .then(response => { })
                        .catch(error => { console.log(error); });

                    this.comments.forEach(function (comment) {
                        if (commentid === comment.id) {
                            comment.likes--;
                            comment.isLiked = false;
                        }
                    });

                    this.$http.post('/forum/commentsLikedStatus/' + this.$route.params.id, {
                        userId: this.loggedUser.id,
                    })
                        .then(response => {
                            this.likedComments = response.data;
                        })
                        .catch(error => { console.log(error); });
                }
            },
            setHeartsComments: function(commentId) {
                let like = false;
                for(let i = 0; i < this.likedComments.length; i++) {
                    if (commentId === this.likedComments[i]) {
                        like = true;
                    }
                }
                if (like === true) {
                    return '#707070';
                } else {
                    return '#dedede';
                }
            },
            /*----------------comments---------------*/
            commentNr: function (id) {
                return id + 1;
            },
            removeThread: function () {
                this.$http.delete('/api/forum/removeThread/' + this.thread.id)
                    .then(response => {
                        this.thread = response.data;
                    })
                    .catch(error => {
                        alert(error);
                    }).finally(() => {
                    this.isLoading = false;
                    this.$router.push('/forum/');
    });
            },
            checkRole: function () {
                if(this.loggedUser.roles == 'ROLE_ADMIN') {
                    return true;
                } else {
                    return false;
                }
            },

            filters: {
                reverse(items) {
                    return items.slice().reverse()
                }
            }
        }
    }
</script>

<style scoped>
    .commentForm { margin-bottom: 115px; }
    .searchForum svg:hover .searchStroke { stroke: #B8E269; }
    .searchForum svg:active .searchStroke { stroke: #707070; }

    .forumH1 { font-weight: normal; font-size: 150%; }

    .lineUnderHL { margin-top: 1%; margin-bottom: 5%; }
    .lineAboveStart { margin-bottom: 1%; }
    .commentLine{ margin:0; padding:0; }

    .routeBack { float: right;}

    .startPost {
        padding: 2%;
        border-radius: 10px 10px 0px 0px;
    }

    .backtextColor {
        color: #6c757d;
    }

    .backtext {
        font-weight: normal;
        margin-top: 4%;
    }

    .h3MarginThread {
        color: #97B753;
        font-weight: normal;
        margin-top: 4%;
    }

    .threadIcons svg { width: 10%; margin-right: 1%; }
    .threadIcons #heart:hover .heartHover { fill: #707070; }
    .iconText { margin-right: 5%; }
    .commentNr { font-weight: bolder; margin-left: 5%; }

    .row { margin-top: 3%; margin-bottom: 1%; }
    #comment { height: 10em; }

    /*---------------------------------------Media Queries-----------------------------------------------*/
    /* Medium devices (tablets, less than 992px)*/
    @media (max-width: 991.98px) {
        .col-lg-1, .col-lg-10, .col-lg-2  { width: 20% !important;}
        .col-lg-8 { width: 60% !important;}
        .col-lg-9 { width: 70% !important;}
    }
</style>