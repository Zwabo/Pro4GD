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
                        <p>Sprössling</p>           <!-- Rang Benennung: aus Lvl berechnet -->
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
                                <h3 id="push"class="h3Margin">Push-Benachrichtigungen</h3>
                                <input id="toggle0"type="checkbox" checked data-toggle="toggle" data-style="ios">

                                <div class="greenLine"></div>
                                <div>
                                    <h4 class="bulletPoints">Gieß-Erinnerungen</h4>
                                    <p class="bulletExplanation">Erlauben für die Gieß-Erinnerungen E-Mails und Push-Up Nachrichten an ihren Account zu schicken.</p>

                                    <input id="toggle1"type="checkbox" checked data-toggle="toggle" data-style="ios">

                                    <h4 class="bulletPoints">Tipps-Benachrichtigungen</h4>
                                    <p class="bulletExplanation">Erlauben für die Kategorie Tipps und Tricks E-Mails und Push-Up Nachrichten an ihren Account zu schicken.</p>
                                    <input id="toggle2"type="checkbox" checked data-toggle="toggle" data-style="ios">

                                    <h4 class="bulletPoints">Tägliche News</h4>
                                    <p class="bulletExplanation">Erlauben für die Kategorie Tägliche News E-Mails und Push-Up Nachrichten an ihren Account zu schicken.</p>
                                    <input id="toggle3"type="checkbox" checked data-toggle="toggle" data-style="ios">
                                </div>
                                    </div>

                            <div>
                                <div class="row">
                                <h3 id="privateHeader" class="h3Margin col-lg-6">Privatsphäreeinstellungen</h3>
                                <div class="col-lg-6"></div>
                                    <div class="col-lg-1">
                                        <h3 class="privacyOptions h3Margin">Alle</h3>
                                    </div>
                                    <div class="col-lg-1">
                                        <h3 class="privacyOptions h3Margin">Freunde</h3>
                                    </div>
                                        <div class="col-lg-1">
                                        <h3 class="privacyOptions h3Margin">Keiner</h3>
                                        </div>
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
                                    <input class="radioButton" name="birthday"type="radio" checked data-toggle="toggle" data-style="ios">
                                    <input class="radioButton" name="birthday"type="radio" checked data-toggle="toggle" data-style="ios">
                                    <input class="radioButton" name="birthday"type="radio" checked data-toggle="toggle" data-style="ios">
                                    </div>
                                    </div>
                                    <div class="greenLine"></div>

                                    <div class="row">
                                    <h4 class="col-lg-6 private">Online-Status</h4>
                                        <div class ="col-lg-6">
                                    <input class="radioButton" name="onlinestatus"type="radio" checked data-toggle="toggle" data-style="ios">
                                    <input class="radioButton" name="onlinestatus"type="radio" checked data-toggle="toggle" data-style="ios">
                                    <input class="radioButton" name="onlinestatus"type="radio" checked data-toggle="toggle" data-style="ios">
                                        </div>
                                    </div>
                                    <div class="greenLine"></div>

                                    <div class="row">
                                    <h4 class="col-lg-6 private">Errungenschaften</h4>
                                        <div class ="col-lg-6">
                                    <input class="radioButton" name="achievements"type="radio" checked data-toggle="toggle" data-style="ios">
                                    <input class="radioButton" name="achievements"type="radio" checked data-toggle="toggle" data-style="ios">
                                    <input class="radioButton" name="achievements"type="radio" checked data-toggle="toggle" data-style="ios">
                                        </div>
                                    </div>
                                    <div class="greenLine"></div>

                                    <div class="row">
                                    <h4 class="col-lg-6 private">Besuchernachrichten</h4>
                                        <div class ="col-lg-6">
                                    <input class="radioButton" name="messages"type="radio" checked data-toggle="toggle" data-style="ios">
                                    <input class="radioButton" name="messages"type="radio" checked data-toggle="toggle" data-style="ios">
                                    <input class="radioButton" name="messages"type="radio" checked data-toggle="toggle" data-style="ios">
                                    </div>
                                </div>
                                    <div class="greenLine"></div>

                                    <div class="row">
                                    <h4 class="col-lg-6 private">Freunde</h4>
                                    <div class ="col-lg-6">
                                    <input class="radioButton" name="friendlist"type="radio" checked data-toggle="toggle" data-style="ios">
                                    <input class="radioButton" name="friendlist"type="radio" checked data-toggle="toggle" data-style="ios">
                                    <input class="radioButton" name="friendlist"type="radio" checked data-toggle="toggle" data-style="ios">
                                    </div>
                                    </div>
                                    <div class="greenLine"></div>

                                        <div class="row">
                                    <h4 class="col-lg-6 private">Garten</h4>
                                        <div class ="col-lg-6">
                                    <input class="radioButton" name="garden"type="radio" checked data-toggle="toggle" data-style="ios">
                                    <input class="radioButton" name="garden"type="radio" checked data-toggle="toggle" data-style="ios">
                                    <input class="radioButton" name="garden"type="radio" checked data-toggle="toggle" data-style="ios">
                                        </div>
                                        </div>
                                    <div class="greenLine"></div>

                                            <div class="row">
                                    <h4 class="col-lg-6 private">Forenposts</h4>
                                            <div class ="col-lg-6">
                                    <input class="radioButton" name="posts"type="radio" checked data-toggle="toggle" data-style="ios">
                                    <input class="radioButton" name="posts"type="radio" checked data-toggle="toggle" data-style="ios">
                                    <input class="radioButton" name="posts"type="radio" checked data-toggle="toggle" data-style="ios">
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
                profileUser: null,              // object for user
            }
        },
        mounted: function (){

            this.$http.get('/api/profile/' + this.$route.params.username)
                .then(response => {
                    this.profileUser = response.data;
        })
                .catch(error => {
                    //alert(error);
                    this.getError(error);
                });
        }
    }
</script>

<style scoped>

</style>
