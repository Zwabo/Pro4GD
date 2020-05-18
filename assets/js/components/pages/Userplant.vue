<template>
    <div>
        <div class="row marginLeftRight" id="basicInfos">
            <div class="col-lg-3" align="center">
                <div class ="plantPicture">
                    <img  src="/images/plants/Aloe.png" alt="Userbild von">
                </div>
                <p>Level: </p>
            </div>
            <div class="col-lg-5">
                <h1>{{userplant.name}}</h1>
                <h2>Plantname</h2>

                <ul>
                    <li>Userplant Location</li>
                    <li id ="watering">Watering amount</li>
                    <li id="wateringDay">Gießtag</li>
                </ul>
            </div>
            <div class="col-lg-4">
                <div class="d-flex align-content-center flex-wrap" id="InfoWidgetContainerBasic">
                    <div class="infoWidget dung">
                        <ul>
                            <li>Düngen</li>
                            <li><img src="/images/icons/userplant/duenger.svg" height="75"></li>
                            <li>Ferilizer icon</li>
                        </ul>
                    </div>
                    <div class="infoWidget location">
                        <ul>
                            <li>Standort</li>
                            <li><img src="/images/icons/userplant/location.svg" height="75"></li>
                            <li>Location icon</li>
                        </ul>
                    </div>
                    <div class="infoWidget substrate">
                        <ul>
                            <li>Substrat</li>
                            <li><img src="/images/icons/userplant/substrat.svg" height="75"></li>
                            <li>Substrate icon</li>
                        </ul>
                    </div>
                    <div class="infoWidget temperature">
                        <ul>
                            <li>Temperatur</li>
                            <li><img src="/images/icons/userplant/temperature.svg" height="75"></li>
                            <li>Temperature icon</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row marginLeftRight" id="careTips">
            <div class="col-lg-8">
                <div id="careTips">
                    <h3>Pflegetipps</h3>
                    <div class="greenLine"></div>
                    <p>Care tips</p>
                </div>

                <div id="moreInfos">
                    <h3>Weitere Informationen</h3>
                    <div class="greenLine"></div>
                    <h4>Standort</h4>
                    <p>Location info</p>
                    <h4>Temperatur</h4>
                    <p>Temperature info</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="d-flex align-content-center flex-wrap" id="InfoWidgetContainerSpecial">
                    <div class="infoWidget bloom">
                        <ul>
                            <li>Blütezeit</li>
                            <li><img src="/images/icons/userplant/bloom.svg" height="75"></li>
                            <li>HeyDay infos</li>
                        </ul>
                    </div>
                    <div class="infoWidget uniqueness">
                        <ul>
                            <li>Besonderheiten</li>
                            <li><img src="/images/icons/userplant/uniqueness.svg" height="75"></li>
                            <li>Special info</li>
                        </ul>
                    </div>
                </div>

                <div id="notes">
                    <div class="heading">Meine Notizen <a href="#">Bearbeiten</a></div>
                    <div class="body">Userplant notes</div>
                </div>

                <div id="dataBaseLink" class="text-center">
                    <a href="" class="buttonDarkGreen">Zum Datenbankeintrag</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Userplant",
        data: function(){
            return{
                userplant: null
            }
        },
        mounted: function(){
            this.$http.get('/api/userplant/' + this.$route.params.id)
                .then(response => {
                    this.userplant = response.data;
                })
                .catch(error => {
                    console.log(error);
                });
        }
    }
</script>

<style scoped>

</style>