<template>
    <div>
        <div class="container-fluid">
            <div class="whiteLine"></div>

            <div class="row bgDarkGreen fontWhite addPlantTop">
                <div class="col-lg-5 text-right">
                    <span id="dataSearchLogo">
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 209.1 205.5" style="enable-background:new 0 0 209.1 205.5;" xml:space="preserve">
                            <path class="st0" d="M104.4,2C48.5,2,3.3,47.3,3.3,103.1s45.3,101.1,101.1,101.1s101.1-45.3,101.1-101.1S160.2,2,104.4,2z M70,141.2
                                c-4.9,4.9-19.9,3.1-33-6.9c-15.3-11.6-17.8-32.7-15.9-42c9.3-1.9,30.9,1,42.5,16.3C73.6,121.6,75.3,135.8,70,141.2z M122.9,102.5
                                c-2.2,23.6-11,40-18.6,40c-7,0-16.3-17.3-18.5-40.9C83.2,74,96.3,49.8,104.3,42.2C112.3,49.8,125.5,74.9,122.9,102.5z M171.4,134.7
                                c-13.1,10-27.3,11.7-32.6,6.4c-4.9-4.9-3.1-19.9,6.9-33c11.6-15.3,32.7-17.8,42-15.9C189.6,101.5,186.7,123.1,171.4,134.7z"/>
                        </svg>
                    </span>
                </div>
                <div class="col-lg-7 text-left"><h1 class="font-weight-light"><span class="font-weight-bolder text-uppercase">Plant</span><span class="text-uppercase">Base</span> <br>Datenbank</h1></div>
            </div>
            <div class="row" v-if="!checkRole()">
                <div id="creditBox" class="col-lg-12">
                    <h3 id="credit">Tut uns Leid!</h3>
                    <p class="creditText">Du musst Administrator oder unterstützender Nutzer sein um Pflanzen in die Datenbank einfügen zu können!
                    </p>
                </div>
            </div>

            <div class="firstAfterHeader"></div>

            <div class="row" >
                <div class="container-fluid marginLeftRight" >

                    <form v-if="checkRole()" class="container-fluid paddingNormalize">
                        <h3 class="h3Margin search">Neue Pflanze hinzufügen</h3>
                        <div class="greenLine"></div>

                        <h4 class="addPlantH4">Eckdaten</h4>

                        <div v-if="errors.length" class="errors">
                            <p>Bitte korrigieren Sie folgende Errors:</p>
                                <ul>
                                    <li v-for="error in erros">{{ error }}</li>
                                </ul>
                        </div>

                        <div class="row form-group">
                            <div class="col-lg-2 col-form-label fieldName">
                                <label for="Name" class="paddingNormalize marginNormalize" >Name*</label>
                            </div>
                            <div class="col-lg-10 fieldInput">
                                <input v-model="name" type="text" class="form-control-sm searchBarDatabase inputPlantForm"
                                       id="Name" placeholder="Pflanzenname" required>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-lg-2 col-form-label fieldName">
                                <label for="Linkname" class="paddingNormalize marginNormalize" >Link Name*</label>
                            </div>
                            <div class="col-lg-10 fieldInput">
                                <input v-model="linkname" type="text" class="form-control-sm searchBarDatabase inputPlantForm"
                                       id="Linkname" placeholder="Link Name - z.B. aloeVera (plantBase/plant/aloeVera)" required>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-lg-2 col-form-label fieldName">
                                <label for="alNamen" class="paddingNormalize marginNormalize">Alternative Namen</label>
                            </div>
                            <div class="col-sm-10 fieldInput">
                                <input v-model="alternativeName" type="text" class="form-control-sm searchBarDatabase inputPlantForm"
                                       id="alNamen" placeholder="Alternativer Name">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-lg-2 col-form-label fieldName">
                                <label for="LatinName" class="paddingNormalize marginNormalize">Lateinischer Namen*</label>
                            </div>
                            <div class="col-sm-10 fieldInput">
                                <input v-model="latinName" type="text" class="form-control-sm searchBarDatabase inputPlantForm"
                                       id="LatinName" placeholder="Lateinischer Name">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-lg-2 col-form-label fieldName">
                                <label for="alNamen" class="paddingNormalize marginNormalize" >Gattung*</label>
                            </div>
                            <div class="col-lg-10 fieldInput">
                                <input v-model="genus" type="text" class="form-control-sm searchBarDatabase inputPlantForm"
                                       id="gattung" placeholder="Pflanzengattung" required>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-lg-2 col-form-label fieldName">
                                <label for="feature" class="paddingNormalize marginNormalize">Besonderheit</label>
                            </div>
                            <div class="col-lg-10 fieldInput">
                                <input v-model="specialFeatureIcon" type="text" class="form-control-sm searchBarDatabase inputPlantForm"
                                       id="feature" placeholder="Besonderheit">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-lg-2 col-form-label fieldName">
                                <label for="plantCategory" class="paddingNormalize marginNormalize">Kategorie*</label>
                            </div>
                            <div class="col-lg-10 fieldInput">
                                <select v-model="categorySelect" class="form-control-sm searchBarDatabase DropdownFont
                                        selectBoxes inputPlantForm" id="plantCategory" > <!-- multiple-->
                                    <option v-model="categorySelectOptions" disabled selected >Pflegeaufwand wählen</option>
                                    <option v-for="(category, index) in categorySelectOptions"
                                            v-bind:key="index" required>{{category.text}}</option>
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-lg-2 col-form-label fieldName">
                                <label for="plantDfficulty" class="paddingNormalize marginNormalize" >Pflegeaufwand*</label>
                            </div>
                            <div class="col-lg-10 fieldInput">
                                <select v-model="careLevelSelect" class="form-control-sm searchBarDatabase DropdownFont
                                        selectBoxes inputPlantForm" id="plantDfficulty">
                                    <option v-model="careLevelSelectOptions" disabled selected >Pflegeaufwand wählen</option>
                                    <option v-for="(difficulty, index) in careLevelSelectOptions"
                                            v-bind:key="index" required>{{difficulty.text}}</option>
                                </select>
                            </div>
                        </div>

                        <hr>

                        <h4 class="addPlantH4">Bilder*</h4>
                        <p>Jpg oder png zulässig.</p>
                        <div class="row form-group">
                            <div class="col-lg-2 col-form-label fieldName">
                                <label for="plantPicture">Pflanzenbild*</label>
                            </div>
                            <div class="col-lg-10 fieldInput">
                                <input class="inputPicture" type="file" @change="onPlantFileSelected" name="plantPicture" id="plantPicture">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-lg-2 col-form-label fieldName">
                                <label for="plantBackground">Hintergrundbild*</label>
                            </div>
                            <div class="col-lg-10 fieldInput">
                                <input class="inputPicture" type="file" @change="onBackgroundFileSelected"
                                       name="plantBackground" id="plantBackground">
                            </div>
                        </div>

                        <hr>

                        <h4 class="addPlantH4">Information (Icons)</h4>

                        <h5 class="addPlantH5 standortH5">Standort*</h5>
                        <div class="row form-group">
                            <div class="col-lg-5 paddingNormalize marginNormalize selectInputOne">
                                <div class="container-fluid">
                                    <h6 class="addPlantH6">Sonne</h6>
                                    <input v-model="locationIcon" value="sonnig" type="checkbox" id="sunny">
                                    <label for="sunny">sonnig</label>
                                    <br>
                                    <input v-model="locationIcon" value="viel Sonne" type="checkbox" id="muchSun">
                                    <label for="muchSun">viel Sonne</label>
                                    <br>
                                    <input v-model="locationIcon" value="direkte Sonneneinstrahlung" type="checkbox" id="directSun">
                                    <label for="directSun">direkte Sonneneinstrahlung</label>
                                    <br>
                                    <input v-model="locationIcon" value="nicht zu viel direkte Sonneneinstrahlung" type="checkbox" id="notTooMuchSun">
                                    <label for="notTooMuchSun">nicht zu viel direkte Sonneneinstrahlung</label>
                                    <br>
                                    <input v-model="locationIcon" value="keine direkte Sonneneinstrahlung" type="checkbox" id="noSun">
                                    <label for="noSun">keine direkte Sonneneinstrahlung</label>
                                    <br>
                                    <input v-model="locationIcon" value="keine Mittagssonne" type="checkbox" id="noMiddaySun">
                                    <label for="noMiddaySun">keine Mittagssonne</label>
                                </div>
                            </div>
                            <div class="col-lg-3 selectInputTwo">
                                <div class="container-fluid">
                                    <h6 class="addPlantH6">Helligkeit / Schatten</h6>
                                    <input v-model="locationIcon" value="hell" type="checkbox" id="bright">
                                    <label for="bright">hell</label>
                                    <br>
                                    <input v-model="locationIcon" value="sehr hell" type="checkbox" id="veryBright">
                                    <label for="veryBright">sehr hell</label>
                                    <br>
                                    <input v-model="locationIcon" value="schattig" type="checkbox" id="shadow">
                                    <label for="shadow">schattig</label>
                                    <br>
                                    <input v-model="locationIcon" value="Halbschatten" type="checkbox" id="halfShade">
                                    <label for="halfShade">Halbschatten</label>
                                    <br>
                                    <input v-model="locationIcon" value="mäßig Schatten" type="checkbox" id="moderateShadow">
                                    <label for="moderateShadow">mäßig Schatten</label>
                                </div>
                            </div>
                            <div class="col-lg-4 selectInputThree">
                                <div class="container-fluid">
                                    <h6 class="addPlantH6">Jahreszeiten</h6>
                                    <input v-model="locationIcon" value="Winter: schattig" type="checkbox" id="winter-shadow">
                                    <label for="winter-shadow">Winter: schattig</label>
                                    <br>
                                    <input v-model="locationIcon" value="Frühjahr: hell" type="checkbox" id="spring-bright">
                                    <label for="spring-bright">Frühjahr: hell</label>
                                </div>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-lg-2 col-form-label fieldName">
                                <label for="temperature" class="paddingNormalize marginNormalize" >
                                    <h5 class="addPlantH5">Temperatur*</h5></label>
                            </div>
                            <div class="col-lg-10 fieldInput">
                                <input v-model="temperatureIcon" type="text" class="form-control-sm searchBarDatabase inputPlantForm"
                                       id="temperature" placeholder="Temperatur" required>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-lg-2 col-form-label fieldName">
                                <label for="plantSubstrat" class="paddingNormalize marginNormalize" ><h5
                                    class="addPlantH5">Substrat*</h5></label>
                            </div>
                            <div class="col-lg-10 fieldInput">
                                <select v-model="substrateIconSelect" class="form-control-sm searchBarDatabase DropdownFont
                                    selectBoxes inputPlantForm" id="plantSubstrat" > <!--multiple-->
                                    <option v-model="substrateIconSelectOptions" disabled selected >Substrat wählen</option>
                                    <option v-for="(substrat, index) in substrateIconSelectOptions"
                                        v-bind:key="index" required>{{substrat.text}}</option>
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-lg-2 col-form-label fieldName">
                                <label for="dung" class="paddingNormalize marginNormalize" >
                                    <h5 class="addPlantH5">Dünger*</h5></label>
                            </div>
                            <div class="col-lg-10 fieldInput">
                                <input v-model="fertiliserIcon" type="text" class="form-control-sm searchBarDatabase inputPlantForm"
                                       id="dung" placeholder="Düngerinterval" required>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-lg-2 col-form-label fieldName">
                                <label for="watering" class="paddingNormalize marginNormalize" >
                                    <h5 class="addPlantH5">Gießen*</h5></label>
                            </div>
                            <div class="col-lg-10 fieldInput">
                                <input v-model="wateringAmount" type="text" class="form-control-sm searchBarDatabase inputPlantForm"
                                       id="watering" placeholder="Gießintervall" required>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-lg-2 col-form-label fieldName">
                                <label for="size" class="paddingNormalize marginNormalize" >
                                    <h5 class="addPlantH5">Größe*</h5></label>
                            </div>
                            <div class="col-lg-10 fieldInput">
                                <input v-model="heightIcon" type="text" class="form-control-sm searchBarDatabase inputPlantForm"
                                       id="size" placeholder="Maximale Pflanzengröße" required>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-lg-2 col-form-label fieldName">
                                <label for="heyday" class="paddingNormalize marginNormalize">
                                    <h5 class="addPlantH5">Blütezeit</h5></label>
                            </div>
                            <div class="col-lg-10 fieldInput">
                                <input v-model="heydayIcon" type="text" class="form-control-sm searchBarDatabase inputPlantForm"
                                       id="heyday" placeholder="Blütezeit der Pflanze">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-lg-2 col-form-label fieldName">
                                <label for="color" class="paddingNormalize marginNormalize">
                                    <h5 class="addPlantH5">Farbe</h5></label>
                            </div>
                            <div class="col-lg-10 fieldInput">
                                <input v-model="flowerColor" type="text" class="form-control-sm searchBarDatabase inputPlantForm"
                                       id="color" placeholder="Blütenfarben (bitte Eintragen, wenn Blütezeit vorhanden">
                            </div>
                        </div>

                        <hr>

                        <h4 class="addPlantH4">Beschreibungen</h4>

                        <div class="row form-group">
                            <div class="col-lg-2 col-form-label fieldName">
                                <label for="shortDescription" class="paddingNormalize marginNormalize" >Kurzbeschreibung*</label>
                            </div>
                            <div class="col-lg-10 fieldInput">
                                <textarea v-model="shortDescription" type="text"
                                          class="form-control-sm searchBarDatabase textareaPlantForm"
                                          id="shortDescription" placeholder="Kurzbeschreibung eingeben" required></textarea>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-lg-2 col-form-label fieldName">
                                <label for="tippsInfo" class="paddingNormalize marginNormalize" >Pflegetipps*</label>
                            </div>
                            <div class="col-lg-10 fieldInput">
                                <textarea v-model="careTips" type="text" class="form-control-sm searchBarDatabase textareaPlantForm"
                                          id="tippsInfo" placeholder="Pflegetipps eingeben" required></textarea>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-lg-2 col-form-label fieldName">
                                <label for="specialFeaturesInfo" class="paddingNormalize marginNormalize">Besonderheiten</label>
                            </div>
                            <div class="col-lg-10 fieldInput">
                                <textarea v-model="specialFeaturesAddinfo" type="text"
                                          class="form-control-sm searchBarDatabase textareaPlantForm"
                                          id="specialFeaturesInfo" placeholder="Besonderheiten Langbeschreibung"></textarea>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-lg-2 col-form-label fieldName">
                                <label for="idealLocationInfo" class="paddingNormalize marginNormalize" >Idealer Standort*</label>
                            </div>
                            <div class="col-lg-10 fieldInput">
                                <textarea v-model="locationAddinfo" type="text" class="form-control-sm searchBarDatabase textareaPlantForm"
                                          id="idealLocationInfo" placeholder="Idealer Standort Langbeschreibung" required></textarea>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-lg-2 col-form-label fieldName">
                                <label for="temperatureInfo" class="paddingNormalize marginNormalize">Temperatur</label>
                            </div>
                            <div class="col-lg-10 fieldInput">
                                <textarea v-model="temperatureAddinfo" type="text"
                                          class="form-control-sm searchBarDatabase textareaPlantForm"
                                          id="temperatureInfo" placeholder="Temperatur Langbeschreibung"></textarea>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-lg-2 col-form-label fieldName">
                                <label for="potInfo" class="paddingNormalize marginNormalize">Topf</label>
                            </div>
                            <div class="col-lg-10 fieldInput">
                                <textarea v-model="pot" type="text" class="form-control-sm searchBarDatabase textareaPlantForm"
                                          id="potInfo" placeholder="Umsetzung und Aufbewahrung Langbeschreibung"></textarea>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-lg-2 col-form-label fieldName">
                                <label for="wateringInfo" class="paddingNormalize marginNormalize">Wasserbedarf</label>
                            </div>
                            <div class="col-lg-10 fieldInput">
                                <textarea v-model="wateringAmountAddinfo" type="text"
                                          class="form-control-sm searchBarDatabase textareaPlantForm"
                                          id="wateringInfo" placeholder="Wasserbedarf Langbeschreibung"></textarea>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-lg-2 col-form-label fieldName">
                                <label for="soilInfo" class="paddingNormalize marginNormalize">Erde</label>
                            </div>
                            <div class="col-lg-10 fieldInput">
                                <textarea v-model="substrateAddinfo" type="text"
                                          class="form-control-sm searchBarDatabase textareaPlantForm"
                                          id="soilInfo" placeholder="Erde Langbeschreibung"></textarea>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-lg-2 col-form-label fieldName">
                                <label for="fertilizerInfo" class="paddingNormalize marginNormalize">Dünger</label>
                            </div>
                            <div class="col-lg-10 fieldInput">
                                <textarea v-model="fertiliserAddinfo" type="text"
                                          class="form-control-sm searchBarDatabase textareaPlantForm"
                                          id="fertilizerInfo" placeholder="Dünger Langbeschreibung"></textarea>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-lg-2 col-form-label fieldName">
                                <label for="heydayInfo" class="paddingNormalize marginNormalize">Blütezeit</label>
                            </div>
                            <div class="col-lg-10 fieldInput">
                                <textarea v-model="heydayAddinfo" type="text" class="form-control-sm searchBarDatabase textareaPlantForm"
                                          id="heydayInfo" placeholder="Blütezeit Langbeschreibung"></textarea>
                            </div>
                        </div>

                        <div class="row float-right">
                            <div class="container-fluid">
                                <button @click="addPlantCreateNew" class="buttonDarkGreen">Hinzufügen</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>
        <div class="lastBeforeFooter"></div>
    </div>

</template>

<script>
    export default {
        name: "AddPlant",
        data: function(){
            return{
                errors: [],

                // Eckdaten
                loggedInUser: {roles:[]},
                name: null,
                linkname: null,
                alternativeName: null,
                latinName: null,
                genus: null,
                specialFeatureIcon: null,

                categorySelect: null,                 // category in plant database
                categorySelectOptions: [
                    {text: 'Farn'},
                    {text: 'Fleischfressende Pflanze'},
                    {text: 'Frühlingsblüher'},
                    {text: 'Gräser'},
                    {text: 'Heilpflanze'},
                    {text: 'Herbstblüher'},
                    {text: 'Kletterpflanze'},
                    {text: 'Palme'},
                    {text: 'Sommerblüher'},
                    {text: 'Sonnenpflanze'},
                    {text: 'Wildflanze'},
                    {text: 'Winterblüher'},
                    {text: 'Zierpflanze'},
                    {text: 'Zimmerpflanze'},
                    {text: 'Zwiebelgewächse'},
                ],

                careLevelSelect: null,            // careLevel in plant database
                careLevelSelectOptions: [
                    {text: 'gering'},
                    {text: 'mittel'},
                    {text: 'hoch'},
                    {text: 'extrem'},
                ],

                // Icons

                locationIcon: [],           // Standortbeschreibung
                temperatureIcon: null,        // Temperatur Beschreibung

                substrateIconSelect: null,            // substratIcon in database     - Erde für die Pflanze
                substrateIconSelectOptions: [
                    {text: 'Azaleenerde'},
                    {text: 'Blumenerde'},
                    {text: 'Bonsaierde'},
                    {text: 'Gartenerde'},
                    {text: 'Kakteenerde'},
                    {text: 'Komposterde'},
                    {text: 'Lauberde'},
                    {text: 'lockere und Nährstoffreiche Erde'},
                    {text: 'Orchideenerde'},
                    {text: 'Sand'},
                    {text: 'Substrat auf Torfbasis'},
                    {text: 'Sukkulentenerde'},
                    {text: 'ungedüngter Torf'},
                    {text: 'Universalerde'},
                    {text: 'Palmenerde'},
                    {text: 'Pflanzenerde'},
                    {text: 'Rhododendrenerde'},

                    {text: 'Blumen-/Kakteenerde'},
                    {text: 'Blumen-/Orchideenerde'},
                    {text: 'Gartenerde und Sand'},
                    {text: 'Gartenerde, Laub- oder Komposterde'},
                    {text: 'Kakteen-/Sukkulentenerde'},
                    {text: 'Universal-/Palmenerde'},
                    {text: 'Rhododendren-/Azaleenerde'},
                    {text: 'Substrat auf Torfbasis, Blumenerde'},
                    {text: 'ungedüngter Torf, keine Blumenerde'},
                ],

                fertiliserIcon: null,         // Düngerinterval
                wateringAmount: null,         // Geißeintervall
                heightIcon: null,             // Größe der Pflanze
                heydayIcon: null,             // Blütezeit der Pflanze
                flowerColor: null,            // Blütenfarbe

                // Beschreibungen

                shortDescription: null,
                careTips: null,
                specialFeaturesAddinfo: null,
                locationAddinfo: null,
                temperatureAddinfo: null,
                pot: null,                    // Information zu Tope / Umtopfen
                wateringAmountAddinfo: null,
                substrateAddinfo: null,
                fertiliserAddinfo: null,
                heydayAddinfo: null,

                // Bild Uploads

                selectedPlantFile: null,
                selectedPlantFileName: null,
                selectedBackgroundFile: null,
                selectedBackgroundFileName: null

            }
        },
        created: function(){
            this.loggedInUser = JSON.parse(localStorage.getItem('user'));

            //Retrieve user item from local storage in case of login
            this.$root.$on('loggedIn', () => {
                this.loggedInUser = JSON.parse(localStorage.getItem('user'));
            });
                if(this.loggedInUser == null){
                    this.$router.push('/login');
                }


        },

        methods: {
            checkRole: function () {
                let role = this.loggedInUser.roles;

                for(let i = 0; i < this.loggedInUser.roles.length; i++) {
                    console.log(this.loggedInUser.roles);
                    if ((role[i] =='ROLE_ADMIN') || (role[i] == 'ROLE_SUPPORT_USER') ) {
                        return true;
                    }
                }
            },
            addPlantCreateNew: function(e) {
                this.locationIcon = this.locationIcon.toString();

                let plantFileString = "images/plants/" + this.selectedPlantFileName;
                let backgroundFileString = "images/plants/" + this.selectedBackgroundFileName;

                if(this.name && this.linkname ) {

                    /*this.$http.post('/api/uploadPlantFile/', {
                        iconName: this.selectedPlantFileName,
                        iconElement: this.selectedPlantFile,
                        windowIconName: this.selectedBackgroundFileName,
                        windowIconElement: this.selectedBackgroundFile,
                    })
                        .then(response => {

                        })
                        .catch(error=> {
                            alert(error);
                        });*/

                    this.$http.post('/api/addPlant/createNewPlant/', {
                        name: this.name,
                        linkName: this.linkname,
                        alternativeName: this.alternativeName,
                        latinName: this.latinName,
                        genus: this.genus,
                        careLevel: this.careLevelSelect,
                        wateringAmount: this.wateringAmount,
                        locationIcon: this.locationIcon,
                        temperatureIcon: this.temperatureIcon,
                        fertiliserIcon: this.fertiliserIcon,
                        substrateIcon: this.substrateIconSelect,
                        heydayIcon: this.heydayIcon,
                        heightIcon: this.heightIcon,
                        specialFeatureIcon: this.specialFeatureIcon,
                        shortDescription: this.shortDescription,
                        specialFeaturesAddinfo: this.specialFeaturesAddinfo,
                        locationAddinfo: this.locationAddinfo,
                        temperatureAddinfo: this.temperatureAddinfo,
                        pot: this.pot,
                        wateringAmountAddinfo: this.wateringAmountAddinfo,
                        substrateAddinfo: this.substrateAddinfo,
                        flowerColor: this.flowerColor,
                        heydayAddinfo: this.heydayAddinfo,
                        careTips: this.careTips,
                        category: this.categorySelect,

                        // send file to the background
                        iconElement: this.selectedPlantFile,
                        windowIconElement: this.selectedBackgroundFile,

                        iconElementName: this.selectedPlantFileName,
                        windowIconElementName: this.selectedBackgroundFileName,

                        // this will be set in the background, just dummy code for now
                        icon: "images/plants/Aloe.png",
                        windowIcon: "images/plants/AloeBackground.png",
                    }), {
                        headers: {
                            'Contnet-Type': 'multipart/form-data'
                        }
                    }
                        .then(response => {
                            //this.savePlantPicture(response.data, this.selectedPlantFile);
                        })
                        .catch(error => {
                            if(error.response.data) {
                                this.error = error.response.data;
                            }
                        });


                } else {
                    e.preventDefault();
                    alert("Bitte füllen Sie alle Pflichtfelder aus.");
                }
                e.preventDefault();
            },

            /*savePlantPicture: function(plantid, file) {
                console.log(plantid);
                console.log(file);

                this.$http.get('/api/' + plantid + '/addPlant/createNewPlant/addPicture', file)
                    .then(response => {
                        console.log(response.data);
                    })
                    .catch(error => {
                       alert(error);
                    });
            },*/


            onPlantFileSelected: function(event) {
                this.selectedPlantFile = event.target.files[0];
                this.selectedPlantFileName = event.target.files[0].name;
                console.log(this.selectedPlantFile);
                console.log(event.target.files);
            },

            onBackgroundFileSelected: function(event) {
                this.selectedBackgroundFile = event.target.files[0];
                this.selectedBackgroundFileName= event.target.files[0].name;
                console.log(this.selectedBackgroundFile);
            }
        }
    }

</script>


<style scoped>
    .firstAfterHeader { margin-top: 4%; }

    #dataSearchLogo svg {
        width: 20%;
        fill: white;
        padding-bottom: 11px
    }

    .addPlantTop {
        padding-top: 4%;
        padding-bottom: 4%;
        align-items: center;
    }

    .addPlantH4 {
        font-size: 120%;
        margin-bottom: 2%;
        color: #97B753;
        margin-top: 4%;
    }
    .addPlantH5 {
        font-size: 100%;
        text-transform: uppercase;
        margin-bottom: 3%;
    }
    .addPlantH6 {
        margin-bottom: 3%;
    }

    .selectBoxes {
        text-align-last: center;
    }

    /*info box für nicht administratoren*/
    #creditBox {
        background-color: white;
        padding: 10px;
        border-radius: 0;
    }
    #creditBox .creditText{
        margin-left:5%;
        margin-right:8%;
        font-size:90%;
        color: #707070;
    }
    #creditBox #credit{
        margin-left:5%;
        margin-top:7%;
        font-size: 120%;
        color: #707070;
    }

    /*select boxes area*/
    .selectInputOne {
        margin-bottom: 3%;
    }
    .standortH5 { margin-top: 5%; }


    /*---------------------------------------Media Queries-----------------------------------------------*/
    @media (max-width: 1350px) {
        .fieldName { min-width: 23%; }
        .fieldInput { max-width: 77%; }
    }

    /*Large devices (desktops, less than 1200px)*/
    @media (max-width: 1199.98px) {
        .fieldName { min-width: 23%; }
        .fieldInput { max-width: 77%; }
    }

    /* Medium devices (tablets, less than 992px)*/
    @media (max-width: 991.98px) {
        .fieldName { min-width: 27%; max-width: 27%; }
        .fieldInput { max-width: 73%; }

        .selectInputOne { width: 60%; }
        .selectInputTwo { width: 40%; }
        .selectInputThree {
            padding-left: 62%;
            margin-top: -5%;
            margin-bottom: 3%;
        }

        .selectInputOne label, .selectInputTwo label, .selectInputThree label { font-size: 90%; }
        .selectInputOne .addPlantH6, .selectInputTwo .addPlantH6, .selectInputThree .addPlantH6 { font-size: 90%; }

    }

    /*Small devices (landscape phones, less than 768px)*/
    @media (max-width: 767.98px) {
        .fieldName { min-width: 30%; max-width: 30%; }
        .fieldInput { max-width: 70%; }
    }

    /* Extra small devices (portrait phones, less than 576px)*/
    @media (max-width: 575.98px) {
        .fieldName {
            min-width: 100%;
            max-width: 100%;
            font-size: 120%;
        }
        .fieldInput { max-width: 100%; }

        .selectInputOne { width: 100%; }
        .selectInputTwo {
            width: 100%;
            padding-left: 0;
            margin-bottom: 3%;
        }
        .selectInputThree {
            width: 100%;
            padding-left: 0;
            margin-top: 0;
        }
        .selectInputOne label, .selectInputTwo label, .selectInputThree label { font-size: 100%; }
        .selectInputOne .addPlantH6, .selectInputTwo .addPlantH6, .selectInputThree .addPlantH6 { font-size: 100%; }
    }

</style>