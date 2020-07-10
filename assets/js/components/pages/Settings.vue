<template>

    <div id="root">
        <div v-if="profileUser != null">

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
                    </div>

                    </div>
                </div>

                <!--lower profile part-->
                <div class="row marginLeftRight">
                    <div class="col-lg-12">
                        <div class="left">
                            <div id="settingsTitle">
                                <h3 id="settings"class="h3Margin">Einstellungen </h3>
                                <div class="greenLine"></div>

                            </div>

                            <div>
                                <div class="row">
                                <h3 id="push"class="col-lg-3">Push-Benachrichtigungen</h3>
                                    <label class="switch">
                                <input id="rudeSwitch"class="col-lg-4" type="checkbox">
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                                <div class="greenLine"></div>


                                    <div class="row">

                                    <h4 class="bulletPoints col-lg-8">Gieß-Erinnerungen</h4>
                                        <label class="switch">
                                        <input class="col-lg-4" type="checkbox">
                                        <span class="slider round"></span>
                                        </label>
                                    <p class="bulletExplanation col-lg-12">Erlauben für die Gieß-Erinnerungen E-Mails und Push-Up Nachrichten an ihren Account zu schicken.</p>
                                    </div>


                                    <div class="row">
                                        <h4 class="bulletPoints col-lg-8">Tipps-Benachrichtigungen</h4>
                                        <label class="switch">
                                            <input class="col-lg-4" type="checkbox">
                                            <span class="slider round"></span>
                                        </label>
                                        <p class="bulletExplanation col-lg-12">Erlauben für die Kategorie Tipps und Tricks E-Mails und Push-Up Nachrichten an ihren Account zu schicken.</p>

                                    </div>

                                    <div class="row">
                                        <h4 class="bulletPoints col-lg-8">Tägliche News</h4>
                                        <label class="switch">
                                            <input class="col-lg-4" type="checkbox">
                                            <span class="slider round"></span>
                                        </label>
                                        <p class="bulletExplanation col-lg-12">Erlauben für die Kategorie Tägliche News E-Mails und Push-Up Nachrichten an ihren Account zu schicken.</p>

                                    </div>

                                    </div>

                            <div>
                                <div class="row">
                                <h3 id="privateHeader" class="h3Margin col-lg-6">Privatsphäreeinstellungen</h3>

                                    <h3 class="privacyOptions h3Margin col-lg-1">Alle</h3>
                                    <h3 class="privacyOptions h3Margin col-lg-1">Freunde</h3>
                                    <h3 class="privacyOptions h3Margin col-lg-1">Keiner</h3>

                                </div>
                                </div>

                                <div class="greenLine"></div>
                                <div>
                                    <div class="row">
                                        <h4 class="col-lg-6 private">Userprofil</h4>
                                    <div class ="col-lg-6">
                                    <input class="radioButton" name="userprofile"type="radio" checked data-toggle="toggle" data-style="ios">
                                    <input class="radioButton" name="userprofile"type="radio" checked data-toggle="toggle" data-style="ios">
                                    <input class="radioButton" name="userprofile"type="radio" checked data-toggle="toggle" data-style="ios">
                                    </div>
                                    </div>
                                    <div class="greenLine"></div>

                                    <div class="row">
                                    <h4 class="col-lg-6 private">Geburtsdatum</h4>
                                    <div class ="col-lg-6">
                                        <form @change="privacySettingsChange('birthday', privacyBirthday)">
                                            <input class="radioButton" name="birthday" v-model="privacyBirthday" value="all" type="radio" checked data-toggle="toggle" data-style="ios">
                                            <input class="radioButton" name="birthday" v-model="privacyBirthday" value="friends" type="radio" checked data-toggle="toggle" data-style="ios">
                                            <input class="radioButton" name="birthday" v-model="privacyBirthday" value="none" type="radio" checked data-toggle="toggle" data-style="ios">
                                        </form>
                                    </div>
                                    </div>
                                    <div class="greenLine"></div>

                                    <div class="row">
                                    <h4 class="col-lg-6 private">Online-Status</h4>
                                        <div class ="col-lg-6">
                                            <form>
                                                <input class="radioButton" name="onlinestatus" value="all" type="radio" checked data-toggle="toggle" data-style="ios">
                                                <input class="radioButton" name="onlinestatus" value="friends" type="radio" checked data-toggle="toggle" data-style="ios">
                                                <input class="radioButton" name="onlinestatus" value="none" type="radio" checked data-toggle="toggle" data-style="ios">
                                            </form>
                                        </div>
                                    </div>
                                    <div class="greenLine"></div>

                                    <div class="row">
                                    <h4 class="col-lg-6 private">Errungenschaften</h4>
                                        <div class ="col-lg-6">
                                            <form>
                                                <input class="radioButton" name="achievements" value="all" type="radio" checked data-toggle="toggle" data-style="ios">
                                                <input class="radioButton" name="achievements" value="friends" type="radio" checked data-toggle="toggle" data-style="ios">
                                                <input class="radioButton" name="achievements" value="none" type="radio" checked data-toggle="toggle" data-style="ios">
                                            </form>
                                        </div>
                                    </div>
                                    <div class="greenLine"></div>

                                    <div class="row">
                                    <h4 class="col-lg-6 private">Besuchernachrichten</h4>
                                        <div class ="col-lg-6">
                                            <form @change="privacySettingsChange('comments', privacyComments)">
                                                <input class="radioButton" name="messages" v-model="privacyComments" value="all" type="radio" checked data-toggle="toggle" data-style="ios">
                                                <input class="radioButton" name="messages" v-model="privacyComments" value="friends" type="radio" checked data-toggle="toggle" data-style="ios">
                                                <input class="radioButton" name="messages" v-model="privacyComments" value="none" type="radio" checked data-toggle="toggle" data-style="ios">
                                            </form>
                                    </div>
                                </div>
                                    <div class="greenLine"></div>

                                    <div class="row">
                                    <h4 class="col-lg-6 private">Freunde</h4>
                                    <div class ="col-lg-6">
                                        <form @change="privacySettingsChange('friends', privacyFriends)">
                                            <input class="radioButton" name="friendlist" v-model="privacyFriends" value="all" type="radio" checked data-toggle="toggle" data-style="ios">
                                            <input class="radioButton" name="friendlist" v-model="privacyFriends" value="friends" type="radio" checked data-toggle="toggle" data-style="ios">
                                            <input class="radioButton" name="friendlist" v-model="privacyFriends" value="none" type="radio" checked data-toggle="toggle" data-style="ios">
                                        </form>
                                    </div>
                                    </div>
                                    <div class="greenLine"></div>

                                        <div class="row">
                                    <h4 class="col-lg-6 private">Garten</h4>
                                        <div class ="col-lg-6">
                                            <form @change="privacySettingsChange('garden', privacyGarden)">
                                                <input class="radioButton" name="garden" v-model="privacyGarden" value="all" type="radio" checked data-toggle="toggle" data-style="ios">
                                                <input class="radioButton" name="garden" v-model="privacyGarden" value="friends" type="radio" checked data-toggle="toggle" data-style="ios">
                                                <input class="radioButton" name="garden" v-model="privacyGarden" value="none" type="radio" checked data-toggle="toggle" data-style="ios">
                                            </form>
                                        </div>
                                        </div>
                                    <div class="greenLine"></div>

                                            <div class="row">
                                    <h4 class="col-lg-6 private">Forenposts</h4>
                                            <div class ="col-lg-6">
                                                <form @change="privacySettingsChange('forum', privacyForum)">
                                                    <input class="radioButton" name="posts" v-model="privacyForum" type="radio" value="all" checked data-toggle="toggle" data-style="ios">
                                                    <input class="radioButton" name="posts" v-model="privacyForum" type="radio" value="friends" checked data-toggle="toggle" data-style="ios">
                                                    <input class="radioButton" name="posts" v-model="privacyForum" type="radio" value="none" checked data-toggle="toggle" data-style="ios">
                                                </form>
                                            </div>
                                            </div>
                                    <div class="greenLine"></div>
                                </div>
                            </div>
                    <div class="row">
                        <div id="creditBox" class="col-lg-4">
                    <h3 id="credit">Credits</h3>
                    <p class="creditText">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, ed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.
                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et
                    </p>
                        </div>


                        <div id="contactBox" class="col-lg-4">

                            <h3 id="contact">Kontakt</h3>
                            <p class="contactText">Bei Problemen, Fragen und Beschwerden
                                kontaktieren Sie uns bitte über unser
                                Kontaktformular.
                            </p>
                            <button id="contactButton"type="button">Beschwerdeknopf</button>
                        </div>
                    </div>
                            </div>
                </div>
                </div>
        </div>
</template>

<script>


    export default {
        name: "Settings",
        data: function() {
            return {
                profileUser: null,
                privacyBirthday: "all",
                privacyComments: "all",
                privacyFriends: "all",
                privacyGarden: "all",
                privacyForum: "all"
            }
        },
        mounted: function (){
            this.profileUser = JSON.parse(localStorage.getItem('user'));
            this.privacyBirthday = this.profileUser.privacyBirthday;
            this.privacyComments = this.profileUser.privacyComments;
            this.privacyFriends = this.profileUser.privacyFriends;
            this.privacyGarden = this.profileUser.privacyGarden;
            this.privacyForum = this.profileUser.privacyForum;
        },
        methods:{
            privacySettingsChange: function(type, val){
                console.log(this.privacyBirthday);

                this.$http.put('/api/settings/changePrivacySettings/' + type + "/" + val)
                    .then(response => {
                        switch(type){
                            case "birthday":
                                this.profileUser.privacyBirthday = val;
                                break;
                            case "comments":
                                this.profileUser.privacyComments = val;
                                break;
                            case "friends":
                                this.profileUser.privacyFriends = val;
                                break;
                            case "garden":
                                this.profileUser.privacyGarden = val;
                                break;
                            case "forum":
                                this.profileUser.privacyForum = val;
                                break;
                        }
                        localStorage.setItem('user', JSON.stringify(this.profileUser));
                    })
                    .catch(error => {
                        console.log(error);
                    });
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
        }
    }
</script>

<style scoped>
    #settings{
        text-transform: uppercase;
        color: #707070;
        margin-top: 8%;
        font-size: 120%;
        font-weight: lighter;
    }

    #push{
        font-weight: normal;
        font-size: 100%;
        color:#97B753;
    }

    .bulletPoints{
        color:#97B753;

        font-size: 88%;
    }
    .bulletExplanation{
        font-weight: lighter;
        font-size: 75%;
    }
    .toggle.ios, .toggle-on.ios, .toggle-off.ios { border-radius: 20px; }
    .toggle.ios .toggle-handle { border-radius: 20px; }

    .greyProfileLine{
        color: #707070;
        height: 3px;
        width: 100%;
    }
    .private{
        color: #707070;
        font-size: 88%;
    }

    #privateHeader{
        font-weight: lighter;
        font-size: 90%;
    }

    .radioButton{
        margin-right: 15%;
        color: #97B753;
    }

    .privacyOptions{
        color: #707070;
        font-weight: lighter;
        font-size: 90%;


    }
    #creditBox{
        background-color: #B8E269;
        padding:10px;
        height: 280px;
        border-radius: 12px;

    }

    #contactBox{
        background-color:#97B753;
        margin-left:5%;
        height: 280px;
        border-radius: 12px;
    }

    .creditText{
        margin-left:5%;
        margin-right:8%;
        font-size:70%;
        color: #707070;
    }
    #credit{
        margin-left:5%;
        margin-top:10%;
        font-size:20px;
        color: #707070;
    }

    .contactText{
        margin-right:8%;
        margin-top:8%;
        margin-left:5%;
        font-size:70%;
        color: #FFFFFF;
    }
    #contact{
        margin-left:5%;
        margin-top:10%;
        font-size:20px;
        color: #FFFFFF;
    }

    #contactButton{
        margin-left:5%;
        margin-top:12%;
        background-color: #FFFFFF;
        color:#97B753;
        border-radius: 12px;
        font-size:14px;
        border:  none;
        padding: 5px 60px;

    }


    /* The switch - the box around the slider */
    .switch {
        position: relative;
        display: inline-block;
        width: 40px;
        height: 20px;

    }

    /* Hide default HTML checkbox */
    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    /* The slider */
    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 14px;
        width: 14px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked + .slider {
        background-color: #97B753;
    }

    input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
        -webkit-transform: translateX(20px);
        -ms-transform: translateX(20px);
        transform: translateX(20px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 14px;
    }

    .slider.round:before {
        border-radius: 50%;
    }

    #rudeSwitch{
        margin-bottom: -10%;

    }
</style>
