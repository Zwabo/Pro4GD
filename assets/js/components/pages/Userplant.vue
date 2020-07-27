<template>
    <div v-if="userplant != null">
        <div class="row marginLeftRight" id="basicInfos">
            <div class="col-lg-3" align="center">
                <div class ="plantPicture">
                    <img v-bind:src="'../' + userplant.plant.icon" alt="Plant Image">
                </div>
                <p>Level {{plantLevel(userplant.xp)}}</p>
                <b-progress :value="userplant.xp" :max="userplant.xp - userplant.xp%100 +100" variant="dark" class="w-25"></b-progress>
                <p v-b-tooltip.hover title="Sammle XPs indem du deine Pflanzen gießt">{{XPleft(userplant.xp)}}</p>

            </div>
            <div class="col-lg-5">
                <h1>{{userplant.name}}</h1>

                    <edit-userplant-modal
                            :userplant="userplant"
                            @updatedUserplant="updateUserplant">
                    </edit-userplant-modal>

                <h2>{{userplant.plant.name}}</h2>

                <ul>
                    <li>{{userplant.location}}</li>
                    <li id ="watering">{{userplant.plant.wateringAmount}}</li>
                    <li id="wateringDay">Alle {{userplant.wateringCycle}} Tage</li>
                </ul>
            </div>
            <div class="col-lg-4">
                <div class="d-flex align-content-center flex-wrap" id="InfoWidgetContainerBasic">
                    <div class="infoWidget dung">
                        <ul>
                            <li>Düngen</li>
                            <li><img src="/images/icons/userplant/duenger.svg" height="75"></li>
                            <li>{{userplant.plant.fertilizerIcon}}</li>
                        </ul>
                    </div>
                    <div class="infoWidget location">
                        <ul>
                            <li>Standort</li>
                            <li><img src="/images/icons/userplant/location.svg" height="75"></li>
                            <li>{{userplant.plant.locationIcon}}</li>
                        </ul>
                    </div>
                    <div class="infoWidget substrate">
                        <ul>
                            <li>Substrat</li>
                            <li><img src="/images/icons/userplant/substrat.svg" height="75"></li>
                            <li>{{userplant.plant.substrateIcon}}</li>
                        </ul>
                    </div>
                    <div class="infoWidget temperature">
                        <ul>
                            <li>Temperatur</li>
                            <li><img src="/images/icons/userplant/temperature.svg" height="75"></li>
                            <li>{{userplant.plant.temperatureIcon}}</li>
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
                    <p>{{userplant.plant.careTips}}</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="d-flex align-content-center flex-wrap" id="InfoWidgetContainerSpecial">
                    <div class="infoWidget bloom">
                        <ul>
                            <li>Blütezeit</li>
                            <li><img src="/images/icons/userplant/bloom.svg" height="75"></li>
                            <li>{{userplant.plant.heydayIcon}}</li>
                        </ul>
                    </div>
                    <div class="infoWidget uniqueness">
                        <ul>
                            <li>Besonderheiten</li>
                            <li><img src="/images/icons/userplant/uniqueness.svg" height="75"></li>
                            <li>{{userplant.plant.specialFeatureIcon}}</li>
                        </ul>
                    </div>
                </div>

                <div id="notes">
                    <div class="heading">Meine Notizen <button @click="editNotes">Bearbeiten</button></div>
                    <div class="body" v-if="editing">
                        <textarea class="form-control" v-model="userplant.notes" @blur="stopEditing"></textarea>
                    </div>
                    <div class="body" v-if="!editing">{{userplant.notes}}</div>
                </div>

                <div id="dataBaseLink" class="text-center">
                    <a href="" class="buttonDarkGreen">Zum Datenbankeintrag</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import EditUserplantModal from "../modals/EditUserplantModal";
    export default {
        name: "Userplant",
        components: {EditUserplantModal},
        data: function(){
            return{
                userplant: null,
                editing: false,
                dateWatered: null,
            }
        },
        mounted: function(){
            this.$http.get('/api/userplant/' + this.$route.params.id)
                .then(response => {
                    this.userplant = response.data;
                })
                .catch(error => {
                    alert(error);
                });
        },
        methods: {
            editNotes: function(){
                this.editing = true;
            },
            stopEditing: function(){
                this.$http.put('/api/userplant/setNotes/' + this.$route.params.id, this.userplant.notes)
                    .then(response => {
                        this.userplant = response.data;
                    })
                    .catch(error => {
                        alert(error);
                    });

                this.editing = false;
            },
            updateUserplant: function(updatedUserplant){
                this.userplant = updatedUserplant;
            },
            plantLevel: function (xp) {

                return Math.trunc(xp/100)+1;
            },
            XPleft: function (xp) {

                let goal = xp - xp%100 +100;

                return xp + "/" + goal + "XP";
            },

        }
    }
</script>

<style scoped>
    #basicInfos{
        margin-top:50px;
    }
    #basicInfos h1{
        font-size: 2.5rem;
    }
    #basicInfos h2{
        font-size: 1.25rem;
    }
    #basicInfos h3{
        font-size: 0.75rem;
    }
    .plantPicture {
        position: relative;
        width: 200px;
        height: 200px;
        overflow: hidden;
        border: 2px solid #97B753;
        border-radius: 50%;
    }
    .plantPicture img{
        width: 50%;
        height: auto;
    }
    #InfoWidgetContainerBasic{
        color: #ffffff;
    }
    #InfoWidgetContainerSpecial{
        margin-top:25px;
        color: #ffffff;
    }
    .infoWidget{
        width:50%;
    }
    .infoWidget.dung{
        background-color: #5eb5e0;
    }
    .infoWidget.location{
        background-color: #97B753;
    }
    .infoWidget.substrate{
        background-color: #000000;
    }
    .infoWidget.temperature{
        background-color: #718C00;
    }
    .infoWidget.bloom{
        background-color: #5eb5e0;
    }
    .infoWidget.uniqueness{
        background-color: #718C00;
    }

    .infoWidget ul{
        list-style: none;
        margin-left: 0;
        margin-bottom: 0;
        padding:5px;

        text-align:center;
    }
    .infoWidget ul li:first-child{
        font-size: 1.25rem;
    }
    .infoWidget ul li{
        margin-bottom: 10px;
    }
    .infoWidget ul li:last-child{
        margin-bottom: 0;
    }
    #notes{
        color: #ffffff;
        background-color: #97B753;
        margin-top: 25px;
        margin-bottom: 25px;
        border-radius: 10px;
    }
    #notes .heading{
        background-color: #718C00;
        border-bottom:2px #222222 solid;
        padding:10px;
    }
    #notes .body{
        padding:10px;
    }
    #notes button{
        background-color: #97B753;
        padding: 5px 8px;
        margin-left: 10px;
        color: white;
        border: 2px solid #97B753;
        border-radius: 10px;
        font-size: 10pt;
    }
    #notes button {
        background-color: #B8E269;
        border: 2px solid #B8E269;
        color: #707070;
    }
    #notes button {
        background-color: #97B753;
        border: 2px solid #97B753;
        color: white;
    }
    .greenLine {
        width: 100%;
        height: 2px;
        background: #97B753;
        margin-bottom: 4%;
    }
    #dataBaseLink{
        margin-bottom: 25px;
    }

    @media (max-width: 991.98px) {
        #InfoWidgetContainerBasic{
            margin-bottom: 50px;
        }
    }
</style>