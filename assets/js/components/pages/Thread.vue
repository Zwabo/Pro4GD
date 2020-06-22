<template>
    <div id="root" v-if="thread!=null">

        <div class="container-fluid paddingLeftRight">
            <div class="row marginTopOnSite">
                <div class="col-lg-10 paddingNormalize">
                    <h1 class="forumH1">
                        <router-link to="/forum"  id="naviLogo">
                            Forum
                        </router-link>
                        /{{thread.category.title}}/</h1>
                </div>
                <div class="col-lg-2 text-right">
                    <span class="searchForum"><svg xmlns="http://www.w3.org/2000/svg" width="41.472" height="35.105" viewBox="0 0 41.472 35.105">
                      <g id="Gruppe_730" data-name="Gruppe 730" transform="translate(0.872)">
                        <g id="Ellipse_28" data-name="Ellipse 28" transform="translate(12.6)" fill="#fff" stroke="#97b753" class="searchStroke" stroke-width="3">
                          <circle cx="14" cy="14" r="14" stroke="none"/>
                          <circle cx="14" cy="14" r="12.5" fill="none"/>
                        </g>
                        <line id="Linie_14" data-name="Linie 14" y1="10.93" x2="15.303" transform="translate(0 22.954)" fill="none" stroke="#97b753" class="searchStroke" stroke-width="3"/>
                      </g>
                    </svg></span>
                </div>
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="41.215" height="28.101" viewBox="0 0 41.215 28.101">
                            <g id="eye" transform="translate(0 -74.667)">
                                <g id="Gruppe_987" data-name="Gruppe 987" transform="translate(0 74.667)">
                                    <g id="Gruppe_986" data-name="Gruppe 986" transform="translate(0 0)">
                                        <path id="Pfad_515" data-name="Pfad 515" d="M176.287,170.667a5.62,5.62,0,1,0,5.62,5.62A5.625,5.625,0,0,0,176.287,170.667Z" transform="translate(-155.68 -162.237)" fill="#707070"/>
                                        <path id="Pfad_516" data-name="Pfad 516" d="M20.607,74.667A22.156,22.156,0,0,0,0,88.717a22.137,22.137,0,0,0,41.215,0A22.147,22.147,0,0,0,20.607,74.667Zm0,23.417a9.367,9.367,0,1,1,9.367-9.367A9.37,9.37,0,0,1,20.607,98.084Z" transform="translate(0 -74.667)" fill="#707070"/>
                                    </g>
                                </g>
                            </g>
                        </svg>
                        <p class="iconText">seen</p>

                        <svg @click="likeIt" xmlns="http://www.w3.org/2000/svg" width="27.681" height="24.848" viewBox="0 0 27.681 24.848" id="heart">
                            <path id="heartFill" class="heartHover" d="M23.644,2.236A6.906,6.906,0,0,0,18.508,0a6.461,6.461,0,0,0-4.035,1.393,8.256,8.256,0,0,0-1.631,1.7,8.251,8.251,0,0,0-1.632-1.7A6.46,6.46,0,0,0,7.174,0,6.906,6.906,0,0,0,2.038,2.236,8.027,8.027,0,0,0,0,7.718a9.559,9.559,0,0,0,2.547,6.257,54.314,54.314,0,0,0,6.376,5.985c.883.753,1.885,1.606,2.925,2.516a1.508,1.508,0,0,0,1.985,0c1.04-.909,2.042-1.763,2.926-2.517a54.284,54.284,0,0,0,6.376-5.984,9.558,9.558,0,0,0,2.547-6.257,8.026,8.026,0,0,0-2.037-5.482Zm0,0" transform="translate(1 1)" fill="#dedede" stroke="#707070" stroke-width="2"/>
                        </svg>
                        <p class="iconText">{{thread.likes}}</p>
                    </div>
                </div>
            </div>
            <div class="greyLine commentLine"></div>

            <div class="row">
                <div class="container-fluid">
                    <comment-form></comment-form>
                </div>
            </div>

            <div class="greyLine commentLine"></div>
            <div v-for="comment in comments">
                <div class="row threadText text-center startPost">
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
                            <svg xmlns="http://www.w3.org/2000/svg" width="41.215" height="28.101" viewBox="0 0 41.215 28.101">
                                <g id="eye" transform="translate(0 -74.667)">
                                    <g id="Gruppe_987" data-name="Gruppe 987" transform="translate(0 74.667)">
                                        <g id="Gruppe_986" data-name="Gruppe 986" transform="translate(0 0)">
                                            <path id="Pfad_515" data-name="Pfad 515" d="M176.287,170.667a5.62,5.62,0,1,0,5.62,5.62A5.625,5.625,0,0,0,176.287,170.667Z" transform="translate(-155.68 -162.237)" fill="#707070"/>
                                            <path id="Pfad_516" data-name="Pfad 516" d="M20.607,74.667A22.156,22.156,0,0,0,0,88.717a22.137,22.137,0,0,0,41.215,0A22.147,22.147,0,0,0,20.607,74.667Zm0,23.417a9.367,9.367,0,1,1,9.367-9.367A9.37,9.37,0,0,1,20.607,98.084Z" transform="translate(0 -74.667)" fill="#707070"/>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                            <p class="iconText">seen</p>

                            <svg @click="likeItId(comment.id)" xmlns="http://www.w3.org/2000/svg" width="27.681" height="24.848" viewBox="0 0 27.681 24.848" id="heart">
                                <path :id='"heartFill" + comment.id' class="heartHover" d="M23.644,2.236A6.906,6.906,0,0,0,18.508,0a6.461,6.461,0,0,0-4.035,1.393,8.256,8.256,0,0,0-1.631,1.7,8.251,8.251,0,0,0-1.632-1.7A6.46,6.46,0,0,0,7.174,0,6.906,6.906,0,0,0,2.038,2.236,8.027,8.027,0,0,0,0,7.718a9.559,9.559,0,0,0,2.547,6.257,54.314,54.314,0,0,0,6.376,5.985c.883.753,1.885,1.606,2.925,2.516a1.508,1.508,0,0,0,1.985,0c1.04-.909,2.042-1.763,2.926-2.517a54.284,54.284,0,0,0,6.376-5.984,9.558,9.558,0,0,0,2.547-6.257,8.026,8.026,0,0,0-2.037-5.482Zm0,0" transform="translate(1 1)" fill="#dedede" stroke="#707070" stroke-width="2"/>
                            </svg>
                            <p class="iconText">{{comment.likes}}</p>
                        </div>
                    </div>
                </div>
                <div class="greyLine commentLine"></div>
            </div>
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

                commentCounter: 0
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

        methods: {
            likeIt: function() {
                let heart = document.getElementById("heartFill").getAttribute('fill');

                if (heart === "#dedede") {
                    document.getElementById("heartFill").setAttribute("fill", "#707070");
                    this.thread.likes++;
                } else if (heart === "#707070") {
                    document.getElementById("heartFill").setAttribute("fill", "#dedede");
                    this.thread.likes--;
                }
            },
            likeItId: function(id) {
                let heartID = document.getElementById('heartFill' + id).getAttribute('fill');

                let commentId = id-1;
                console.log(this.comments);

                if (heartID === "#dedede") {
                    document.getElementById('heartFill' + id).setAttribute("fill", "#707070");
                } else if (heartID === "#707070") {
                    document.getElementById('heartFill' + id).setAttribute("fill", "#dedede");
                }
            },

            commentNr: function(id) {
                return id+1;
            }
        },

        filters: {
            reverse(items) {
                return items.slice().reverse()
            }
        }
    }
</script>

<style scoped>
    .searchForum svg:hover .searchStroke { stroke: #B8E269; }
    .searchForum svg:active .searchStroke { stroke: #707070; }

    .forumH1 { font-weight: normal; font-size: 150%; }

    .lineUnderHL { margin-top: 1%; margin-bottom: 5%; }
    .lineAboveStart { margin-bottom: 1%; }
    .commentLine{ margin:0; padding:0; }

    .startPost {
        padding: 2%;
        border-radius: 10px 10px 0px 0px;
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
</style>