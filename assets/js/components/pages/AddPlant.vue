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

            <div class="row">
                <div class="container-fluid marginLeftRight">

                    <form>
                        <h3 class="h3Margin search">Neue Pflanze hinzufügen</h3>
                        <div class="greenLine"></div>

                        <h4 class="addPlantH4">Eckdaten</h4>

                        <div class="row form-group">
                            <div class="col-lg-2 col-form-label">
                                <label for="Name" class="paddingNormalize marginNormalize" required>Name*</label>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" class="form-control-sm searchBarDatabase inputPlantForm"
                                       id="Name" placeholder="Pflanzenname">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-lg-2 col-form-label">
                                <label for="alNamen" class="paddingNormalize marginNormalize">Alternative Namen</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control-sm searchBarDatabase inputPlantForm"
                                       id="alNamen" placeholder="Alternativer Name">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-lg-2 col-form-label">
                                <label for="alNamen" class="paddingNormalize marginNormalize" required>Gattung*</label>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" class="form-control-sm searchBarDatabase inputPlantForm"
                                       id="gattung" placeholder="Pflanzengattung">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-lg-2 col-form-label">
                                <label for="feature" class="paddingNormalize marginNormalize">Besonderheit</label>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" class="form-control-sm searchBarDatabase inputPlantForm"
                                       id="feature" placeholder="Besonderheit">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-lg-2 col-form-label">
                                <label for="plantCategory" class="paddingNormalize marginNormalize">Kategorie</label>
                            </div>
                            <div class="col-lg-10">
                                <select v-model="plantCategorySelect" class="form-control-sm searchBarDatabase DropdownFont
                                        selectBoxes inputPlantForm" id="plantCategory" multiple>
                                    <option value="" disabled selected >Pflegeaufwand wählen</option>
                                    <option v-for="(category, index) in plantCategorySelectOptions"
                                            v-bind:key="index">{{category.text}}</option>
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-lg-2 col-form-label">
                                <label for="plantDfficulty" class="paddingNormalize marginNormalize" required>Pflegeaufwand*</label>
                            </div>
                            <div class="col-lg-10">
                                <select v-model="difficultySelect" class="form-control-sm searchBarDatabase DropdownFont
                                        selectBoxes inputPlantForm" id="plantDfficulty">
                                    <option value="" disabled selected >Pflegeaufwand wählen</option>
                                    <option v-for="(difficulty, index) in difficultySelectOptions"
                                            v-bind:key="index">{{difficulty.text}}</option>
                                </select>
                            </div>
                        </div>

                        <div class="greyLineThin"></div>
                        <h4 class="addPlantH4">Information (Icons)</h4>

                        <h5 class="addPlantH5">Standort*</h5>
                        <div class="row form-group">
                            <div class="col-lg-5 paddingNormalize marginNormalize">
                                <div class="container-fluid">
                                    <h6 class="addPlantH6">Sonne</h6>
                                    <input type="checkbox" name="plantPosition" id="sunny">
                                    <label for="sunny">sonnig</label>
                                    <br>
                                    <input type="checkbox" name="palntPosition" id="muchSun">
                                    <label for="muchSun">viel Sonne</label>
                                    <br>
                                    <input type="checkbox" name="plantPosition" id="directSun">
                                    <label for="directSun">direkte Sonneneinstrahlung</label>
                                    <br>
                                    <input type="checkbox" name="plantPosition" id="notTooMuchSun">
                                    <label for="notTooMuchSun">nicht zu viel direkte Sonneneinstrahlung</label>
                                    <br>
                                    <input type="checkbox" name="plantPosition" id="noSun">
                                    <label for="noSun">keine direkte Sonneneinstrahlung</label>
                                    <br>
                                    <input type="checkbox" name="plantPosition" id="noMiddaySun">
                                    <label for="noMiddaySun">keine Mittagssonne</label>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="container-fluid">
                                    <h6 class="addPlantH6">Helligkeit / Schatten</h6>
                                    <input type="checkbox" name="plantPosition" id="bright">
                                    <label for="bright">hell</label>
                                    <br>
                                    <input type="checkbox" name="plantPosition" id="veryBright">
                                    <label for="veryBright">sehr hell</label>
                                    <br>
                                    <input type="checkbox" name="plantPosition" id="shadow">
                                    <label for="shadow">schattig</label>
                                    <br>
                                    <input type="checkbox" name="plantPosition" id="halfShade">
                                    <label for="halfShade">Halbschatten</label>
                                    <br>
                                    <input type="checkbox" name="plantPosition" id="moderateShadow">
                                    <label for="moderateShadow">mäßig Schatten</label>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="container-fluid">
                                    <h6 class="addPlantH6">Jahreszeiten</h6>
                                    <input type="checkbox" name="plantPosition" id="winter-shadow">
                                    <label for="winter-shadow">Winter: schattig</label>
                                    <br>
                                    <input type="checkbox" name="plantPosition" id="spring-bright">
                                    <label for="spring-bright">Frühjahr: hell</label>
                                </div>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-lg-2 col-form-label">
                                <label for="temperature" class="paddingNormalize marginNormalize" required>
                                    <h5 class="addPlantH5">Temperatur*</h5></label>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" class="form-control-sm searchBarDatabase inputPlantForm"
                                       id="temperature" placeholder="Temperatur">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-lg-2 col-form-label">
                                <label for="plantSubstrat" class="paddingNormalize marginNormalize" required><h5
                                    class="addPlantH5">Substrat*</h5></label>
                            </div>
                            <div class="col-lg-10">
                                <select v-model="plantSubstratSelect" class="form-control-sm searchBarDatabase DropdownFont
                                    selectBoxes inputPlantForm" id="plantSubstrat" multiple>
                                    <option value="" disabled selected >Substrat wählen</option>
                                    <option v-for="(substrat, index) in plantSubstratSelectOptions"
                                        v-bind:key="index">{{substrat.text}}</option>
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-lg-2 col-form-label">
                                <label for="dung" class="paddingNormalize marginNormalize" required>
                                    <h5 class="addPlantH5">Dünger*</h5></label>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" class="form-control-sm searchBarDatabase inputPlantForm"
                                       id="dung" placeholder="Düngerinterval">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-lg-2 col-form-label">
                                <label for="watering" class="paddingNormalize marginNormalize" required>
                                    <h5 class="addPlantH5">Gießen*</h5></label>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" class="form-control-sm searchBarDatabase inputPlantForm"
                                       id="watering" placeholder="Gießintervall">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-lg-2 col-form-label">
                                <label for="size" class="paddingNormalize marginNormalize" required>
                                    <h5 class="addPlantH5">Größe*</h5></label>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" class="form-control-sm searchBarDatabase inputPlantForm"
                                       id="size" placeholder="Maximale Pflanzengröße">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-lg-2 col-form-label">
                                <label for="color" class="paddingNormalize marginNormalize">
                                    <h5 class="addPlantH5">Farbe</h5></label>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" class="form-control-sm searchBarDatabase inputPlantForm"
                                       id="color" placeholder="Blütenfarben">
                            </div>
                        </div>

                        <div class="greyLineThin"></div>
                        <h4 class="addPlantH4">Beschreibungen</h4>

                        <div class="row form-group">
                            <div class="col-lg-2 col-form-label">
                                <label for="shortDescription" class="paddingNormalize marginNormalize" required>Kurzbeschreibung*</label>
                            </div>
                            <div class="col-lg-10">
                                <textarea type="text" class="form-control-sm searchBarDatabase textareaPlantForm"
                                          id="shortDescription" placeholder="Kurzbeschreibung eingeben"></textarea>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-lg-2 col-form-label">
                                <label for="tippsInfo" class="paddingNormalize marginNormalize" required>Pflegetipps*</label>
                            </div>
                            <div class="col-lg-10">
                                <textarea type="text" class="form-control-sm searchBarDatabase textareaPlantForm"
                                          id="tippsInfo" placeholder="Pflegetipps eingeben"></textarea>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-lg-2 col-form-label">
                                <label for="specialFeaturesInfo" class="paddingNormalize marginNormalize">Besonderheiten</label>
                            </div>
                            <div class="col-lg-10">
                                <textarea type="text" class="form-control-sm searchBarDatabase textareaPlantForm"
                                          id="specialFeaturesInfo" placeholder="Besonderheiten Langbeschreibung"></textarea>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-lg-2 col-form-label">
                                <label for="idealLocationInfo" class="paddingNormalize marginNormalize" required>Idealer Standort*</label>
                            </div>
                            <div class="col-lg-10">
                                <textarea type="text" class="form-control-sm searchBarDatabase textareaPlantForm"
                                          id="idealLocationInfo" placeholder="Kurzbeschreibung Langbeschreibung"></textarea>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-lg-2 col-form-label">
                                <label for="temperatureInfo" class="paddingNormalize marginNormalize">Temperatur</label>
                            </div>
                            <div class="col-lg-10">
                                <textarea type="text" class="form-control-sm searchBarDatabase textareaPlantForm"
                                          id="temperatureInfo" placeholder="Besonderheiten Langbeschreibung"></textarea>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-lg-2 col-form-label">
                                <label for="potInfo" class="paddingNormalize marginNormalize">Topf</label>
                            </div>
                            <div class="col-lg-10">
                                <textarea type="text" class="form-control-sm searchBarDatabase textareaPlantForm"
                                          id="potInfo" placeholder="Umsetzung und Aufbewahrung Langbeschreibung"></textarea>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-lg-2 col-form-label">
                                <label for="wateringInfo" class="paddingNormalize marginNormalize">Wasserbedarf</label>
                            </div>
                            <div class="col-lg-10">
                                <textarea type="text" class="form-control-sm searchBarDatabase textareaPlantForm"
                                          id="wateringInfo" placeholder="Wasserbedarf Langbeschreibung"></textarea>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-lg-2 col-form-label">
                                <label for="soilInfo" class="paddingNormalize marginNormalize">Erde</label>
                            </div>
                            <div class="col-lg-10">
                                <textarea type="text" class="form-control-sm searchBarDatabase textareaPlantForm"
                                          id="soilInfo" placeholder="Erde Langbeschreibung"></textarea>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-lg-2 col-form-label">
                                <label for="fertilizerInfo" class="paddingNormalize marginNormalize">Dünger</label>
                            </div>
                            <div class="col-lg-10">
                                <textarea type="text" class="form-control-sm searchBarDatabase textareaPlantForm"
                                          id="fertilizerInfo" placeholder="Dünger Langbeschreibung"></textarea>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-lg-2 col-form-label">
                                <label for="heydayInfo" class="paddingNormalize marginNormalize">Blütezeit</label>
                            </div>
                            <div class="col-lg-10">
                                <textarea type="text" class="form-control-sm searchBarDatabase textareaPlantForm"
                                          id="heydayInfo" placeholder="Blütezeit Langbeschreibung"></textarea>
                            </div>
                        </div>

                        <div class="row float-right">
                            <div class="container-fluid">
                                <button class="buttonDarkGreen">Hinzufügen</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>

</template>

<script>
    export default {
        name: "AddPlant",
        data: function(){
            return{
                plants: null,

                plantCategorySelect: "",
                plantCategorySelectOptions: [
                    {text: 'Wildpflanze'},
                    {text: 'Heilpflanze'},
                    {text: 'Fleischfressende Pflanze'},
                    {text: 'Kletterpflanze'},
                    {text: 'Palme'},
                    {text: 'Zimmerpflanze'},
                    {text: 'Sonnenpflanze'},
                    {text: 'Frühlingsblüher'},
                    {text: 'Sommerblüher'},
                    {text: 'Herbstblüher'},
                    {text: 'Winterblüher'},
                ],

                difficultySelect: "",
                difficultySelectOptions: [
                    {text: 'gering'},
                    {text: 'mittel'},
                    {text: 'hoch'},
                    {text: 'extrem'},
                ],

                plantSubstratSelect: "",
                plantSubstratSelectOptions: [
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



            }
        },
        mounted: function() {

        }
    }

</script>

<style scoped>

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

</style>