<template>
    <div class="row container-fluid all">

        <div class="col right marginLeftRight garden">

            <div class="row mygarden">
                <h1 class="col-sm">Mein Garten
                    <span class="fontLight edit" v-if="!edit && garden !== null" @click="edit = true"> edit</span>
                    <span v-if="edit && garden !== null" class="fontLight edit" @click="edit = false"> close</span></h1>
                <div v-if="add===false" class="col-sm text-right add"><span @click="add = true" class="iconGarden">

                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     viewBox="0 0 455.4 455.4" style="enable-background:new 0 0 455.4 455.4;" xml:space="preserve"><path class="path1" d="M405.5,412.8c-69.7,56.9-287.3,56.9-355.6,0c-69.7-56.9-62.6-300.1,0-364.1s293-64,355.6,0S475.2,355.9,405.5,412.8z"/><path
                        class="path2" d="M362.8,227.9c0,14.2-11.4,25.6-25.6,25.6h-85.3v85.3c0,14.2-11.4,25.6-25.6,25.6s-25.6-11.4-25.6-25.6v-85.3
	h-85.3c-14.2,0-25.6-11.4-25.6-25.6s11.4-25.6,25.6-25.6h85.3v-85.3c0-14.2,11.4-25.6,25.6-25.6s25.6,11.4,25.6,25.6v85.3h85.3
	C351.4,202.3,362.8,213.7,362.8,227.9z"/></svg></span></div>
                <div v-if="add===true" class="col-sm text-right add"><span @click="add = false" class="iconGarden">

                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     viewBox="0 0 455.4 455.4" style="enable-background:new 0 0 455.4 455.4;" xml:space="preserve"><path class="path1" d="M405.5,412.8c-69.7,56.9-287.3,56.9-355.6,0c-69.7-56.9-62.6-300.1,0-364.1s293-64,355.6,0S475.2,355.9,405.5,412.8z"/><path
                        class="path2" d="M362.8,227.9c0,14.2-11.4,25.6-25.6,25.6h-85.3v85.3c0,14.2-11.4,25.6-25.6,25.6s-25.6-11.4-25.6-25.6v-85.3
	h-85.3c-14.2,0-25.6-11.4-25.6-25.6s11.4-25.6,25.6-25.6h85.3v-85.3c0-14.2,11.4-25.6,25.6-25.6s25.6,11.4,25.6,25.6v85.3h85.3
	C351.4,202.3,362.8,213.7,362.8,227.9z"/></svg></span></div>

            </div>

            <div class="greenLine"></div>

            <div v-if="garden === null" class="text-center">Wow such empty! Füge Pflanzen zu deinem Garten hinzu.</div>

            <div class="row scrollPlants">

                <b-modal id="modal-center" centered title="Pflanze gegossen!" ok-only>
                    <p v-if="!LevelUp" class="my-4">Noch {{(MissingXPs(currentPlantXP))}} XP bis zum nächsten Level</p>
                    <b-progress v-if="!LevelUp" :value="currentPlantXP" :max="currentPlantXP - currentPlantXP%100 +100"
                                variant="dark" class="w-60" height="1.2rem" show-value ></b-progress>
                    <p v-else class="my-4">Level Up! Pflanze ist jetzt Level {{plantLevel(currentPlantXP)}}</p>
                </b-modal>

                <div class="col" v-if="garden !== null">
                    <div v-for="(userplant, index) in garden">
                        <div v-if="index % 2 == 0 || index == 0" class="row paddingNormalize">
                            <remove-plant-modal v-if="edit" :userplant="userplant" @newUserplant="newUserplant"></remove-plant-modal>
                            <router-link :to="'/userplant/' + userplant.id">
                                <div class="plantsProfil dropShadow bgWhiteGrey "
                                     v-on:mouseover="replaceImage(userplant.plant.WindowIcon)">
                                    <div class="row">
                                        <div class="col-sm-5 plantInfo">
                                            <p class="text-left gardenPFirst"><b>{{ userplant.name }}</b> ({{
                                                userplant.plant.name }})</p>
                                            <p>{{thirst(userplant.dateWatered)}}</p>
                                            <div class="list"></div>
                                            <p><span class="iconsGarden"> <svg version="1.1" id="Layer_1"
                                                                              xmlns="http://www.w3.org/2000/svg"
                                                                              xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                              x="0px" y="0px"
                                                                              viewBox="0 0 512 512"
                                                                              style="enable-background:new 0 0 512 512;"
                                                                              xml:space="preserve">
                                            <g>
                                                <g>
                                                    <path d="M256,0C153.755,0,70.573,83.182,70.573,185.426c0,126.888,165.939,313.167,173.004,321.035
                                                        c6.636,7.391,18.222,7.378,24.846,0c7.065-7.868,173.004-194.147,173.004-321.035C441.425,83.182,358.244,0,256,0z M256,278.719
                                                        c-51.442,0-93.292-41.851-93.292-93.293S204.559,92.134,256,92.134s93.291,41.851,93.291,93.293S307.441,278.719,256,278.719z"/>
                                                </g>
                                            </g>
                                            </svg>
                                   </span> {{ userplant.location }}
                                            </p>
                                            <p><span class="iconsGarden"> <svg xmlns="http://www.w3.org/2000/svg"
                                                                              xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                              x="0px" y="0px" viewBox="0 0 455.4 455.4"
                                                                              style="enable-background:new 0 0 455.4 455.4;"
                                                                              xml:space="preserve"><path class="path1" d="m80 320h53.332031c8.832031 0 16-7.167969 16-16v-53.332031c0-8.832031-7.167969-16-16-16h-53.332031c-8.832031 0-16 7.167969-16 16v53.332031c0 8.832031 7.167969 16 16 16zm0 0"/><path
                                                    class="path1"
                                                    d="m80 448h53.332031c8.832031 0 16-7.167969 16-16v-53.332031c0-8.832031-7.167969-16-16-16h-53.332031c-8.832031 0-16 7.167969-16 16v53.332031c0 8.832031 7.167969 16 16 16zm0 0"/><path
                                                    class="path1"
                                                    d="m229.332031 320h53.335938c8.832031 0 16-7.167969 16-16v-53.332031c0-8.832031-7.167969-16-16-16h-53.335938c-8.832031 0-16 7.167969-16 16v53.332031c0 8.832031 7.167969 16 16 16zm0 0"/><path
                                                    class="path1"
                                                    d="m229.332031 448h53.335938c8.832031 0 16-7.167969 16-16v-53.332031c0-8.832031-7.167969-16-16-16h-53.335938c-8.832031 0-16 7.167969-16 16v53.332031c0 8.832031 7.167969 16 16 16zm0 0"/><path
                                                    class="path1"
                                                    d="m378.667969 320h53.332031c8.832031 0 16-7.167969 16-16v-53.332031c0-8.832031-7.167969-16-16-16h-53.332031c-8.832031 0-16 7.167969-16 16v53.332031c0 8.832031 7.167969 16 16 16zm0 0"/><path
                                                    class="path1"
                                                    d="m448 64h-21.332031v-42.667969c0-11.773437-9.558594-21.332031-21.335938-21.332031h-21.332031c-11.777344 0-21.332031 9.558594-21.332031 21.332031v42.667969h-213.335938v-42.667969c0-11.773437-9.554687-21.332031-21.332031-21.332031h-21.332031c-11.777344 0-21.335938 9.558594-21.335938 21.332031v42.667969h-21.332031c-35.285156 0-64 28.714844-64 64v320c0 35.285156 28.714844 64 64 64h384c35.285156 0 64-28.714844 64-64v-320c0-35.285156-28.714844-64-64-64zm21.332031 384c0 11.753906-9.578125 21.332031-21.332031 21.332031h-384c-11.753906 0-21.332031-9.578125-21.332031-21.332031v-233.8125h426.664062zm0 0"/></svg>
                                   </span> {{wateringTime(userplant.dateWatered)}}
                                            </p>
                                            <p><span class="water"> <svg xmlns="http://www.w3.org/2000/svg"
                                                                              width="39.355" height="62.318"
                                                                              viewBox="0 0 39.355 62.318">
                                            <path id="Pfad_371" data-name="Pfad 371"
                                                  d="M46.867,425.31a19.678,19.678,0,1,1-39.355,0c0-8.9,13.184-33.135,17.968-41.639a1.96,1.96,0,0,1,3.417,0c4.786,8.5,17.97,32.743,17.97,41.639Zm0,0"
                                                  transform="translate(-7.512 -382.671)" fill="#B8E269"/>
                                            </svg>
                                   </span> {{wateringShedule(userplant.wateringCycle)}}
                                            </p>
                                            <button v-b-modal.modal-center class="buttonDarkGreenSmall"
                                                    @click="water($event, userplant)"> Gießen
                                            </button>
                                        </div>

                                        <img class="col-sm-7 imgTest" v-bind:src="'../' + userplant.plant.icon"
                                             alt="Picture of plant">


                                    </div>
                                </div>
                            </router-link>

                        </div>
                    </div>
                </div>

                <div class="col" v-if="garden !== null">
                    <div v-for="(userplant, index) in garden">
                        <div v-if="index % 2 !== 0" class="row paddingNormalize">
                            <remove-plant-modal v-if="edit" :userplant="userplant"
                                                @newUserplant="newUserplant"></remove-plant-modal>
                            <router-link :to="'/userplant/' + userplant.id">
                                <div class="plantsProfil dropShadow bgWhiteGrey "
                                     v-on:mouseover="replaceImage(userplant.plant.WindowIcon)">
                                    <div class="row">
                                        <div class="col-sm-5 plantInfo">
                                            <p class="text-left gardenPFirst"><b>{{ userplant.name }}</b> ({{
                                                userplant.plant.name }})</p>
                                            <p>{{thirst(userplant.dateWatered)}}</p>
                                            <div class="list"></div>
                                            <p><span class="iconsGarden"> <svg version="1.1" id="Layer_1"
                                                                               xmlns="http://www.w3.org/2000/svg"
                                                                               xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                               x="0px" y="0px"
                                                                               viewBox="0 0 512 512"
                                                                               style="enable-background:new 0 0 512 512;"
                                                                               xml:space="preserve">
                                            <g>
                                                <g>
                                                    <path d="M256,0C153.755,0,70.573,83.182,70.573,185.426c0,126.888,165.939,313.167,173.004,321.035
                                                        c6.636,7.391,18.222,7.378,24.846,0c7.065-7.868,173.004-194.147,173.004-321.035C441.425,83.182,358.244,0,256,0z M256,278.719
                                                        c-51.442,0-93.292-41.851-93.292-93.293S204.559,92.134,256,92.134s93.291,41.851,93.291,93.293S307.441,278.719,256,278.719z"/>
                                                </g>
                                            </g>
                                            </svg>
                                   </span> {{ userplant.location }}
                                            </p>
                                            <p><span class="iconsGarden"> <svg xmlns="http://www.w3.org/2000/svg"
                                                                               xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                               x="0px" y="0px" viewBox="0 0 455.4 455.4"
                                                                               style="enable-background:new 0 0 455.4 455.4;"
                                                                               xml:space="preserve"><path class="path1" d="m80 320h53.332031c8.832031 0 16-7.167969 16-16v-53.332031c0-8.832031-7.167969-16-16-16h-53.332031c-8.832031 0-16 7.167969-16 16v53.332031c0 8.832031 7.167969 16 16 16zm0 0"/><path
                                                    class="path1"
                                                    d="m80 448h53.332031c8.832031 0 16-7.167969 16-16v-53.332031c0-8.832031-7.167969-16-16-16h-53.332031c-8.832031 0-16 7.167969-16 16v53.332031c0 8.832031 7.167969 16 16 16zm0 0"/><path
                                                    class="path1"
                                                    d="m229.332031 320h53.335938c8.832031 0 16-7.167969 16-16v-53.332031c0-8.832031-7.167969-16-16-16h-53.335938c-8.832031 0-16 7.167969-16 16v53.332031c0 8.832031 7.167969 16 16 16zm0 0"/><path
                                                    class="path1"
                                                    d="m229.332031 448h53.335938c8.832031 0 16-7.167969 16-16v-53.332031c0-8.832031-7.167969-16-16-16h-53.335938c-8.832031 0-16 7.167969-16 16v53.332031c0 8.832031 7.167969 16 16 16zm0 0"/><path
                                                    class="path1"
                                                    d="m378.667969 320h53.332031c8.832031 0 16-7.167969 16-16v-53.332031c0-8.832031-7.167969-16-16-16h-53.332031c-8.832031 0-16 7.167969-16 16v53.332031c0 8.832031 7.167969 16 16 16zm0 0"/><path
                                                    class="path1"
                                                    d="m448 64h-21.332031v-42.667969c0-11.773437-9.558594-21.332031-21.335938-21.332031h-21.332031c-11.777344 0-21.332031 9.558594-21.332031 21.332031v42.667969h-213.335938v-42.667969c0-11.773437-9.554687-21.332031-21.332031-21.332031h-21.332031c-11.777344 0-21.335938 9.558594-21.335938 21.332031v42.667969h-21.332031c-35.285156 0-64 28.714844-64 64v320c0 35.285156 28.714844 64 64 64h384c35.285156 0 64-28.714844 64-64v-320c0-35.285156-28.714844-64-64-64zm21.332031 384c0 11.753906-9.578125 21.332031-21.332031 21.332031h-384c-11.753906 0-21.332031-9.578125-21.332031-21.332031v-233.8125h426.664062zm0 0"/></svg>
                                   </span> {{wateringTime(userplant.dateWatered)}}
                                            </p>
                                            <p><span class="water"> <svg xmlns="http://www.w3.org/2000/svg"
                                                                         width="39.355" height="62.318"
                                                                         viewBox="0 0 39.355 62.318">
                                            <path id="Pfad_371" data-name="Pfad 371"
                                                  d="M46.867,425.31a19.678,19.678,0,1,1-39.355,0c0-8.9,13.184-33.135,17.968-41.639a1.96,1.96,0,0,1,3.417,0c4.786,8.5,17.97,32.743,17.97,41.639Zm0,0"
                                                  transform="translate(-7.512 -382.671)" fill="#B8E269"/>
                                            </svg>
                                   </span> {{wateringShedule(userplant.wateringCycle)}}
                                            </p>
                                            <button v-b-modal.modal-center class="buttonDarkGreenSmall"
                                                    @click="water($event, userplant)"> Gießen
                                            </button>
                                        </div>

                                        <img class="col-sm-7 imgTest" v-bind:src="'../' + userplant.plant.icon"
                                             alt="Picture of plant">


                                    </div>
                                </div>
                            </router-link>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="col windowImage" v-if="add">

            <div class="col addPlant">

                <div class="row search">
                    <div class="col-11 searchBar">
                        <input type="text" placeholder="Suche nach Pflanzen.." class="form-control" aria-label="Search"
                               v-model="search">
                    </div>
                    <button type="button" class="close col-1 searchBar" aria-label="Close" @click="add = false">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="row">

                    <div class="col-lg-6">
                        <div v-for="(plant, index) in filteredPlants" class="container-fluid">
                            <div v-if="index % 2 == 0 || index == 0" class="row paddingNormalize">
                                <div class="container-fluid plantProfileAdd dropShadow bgWhiteGrey ">
                                    <div class="row">
                                        <div class="col-sm-7 plantInfo">
                                            <p class="text-left gardenPFirst"><b>{{ plant.name }}</b></p>
                                            <p>{{ plant.genus}}</p>
                                            <add-userplant-modal :plant="plant" :user="$route.params.id"
                                                                 @newUserplant="newUserplant">
                                            </add-userplant-modal>

                                        </div>
                                        <img class="col-sm-5 imgTest" v-bind:src="'../' + plant.icon"
                                             alt="Picture of plant">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div v-for="(plant, index) in filteredPlants" class="container-fluid">
                            <div v-if="index % 2 !== 0" class="row paddingNormalize">
                                <div class="container-fluid plantProfileAdd dropShadow bgWhiteGrey">
                                    <div class="row">
                                        <div class="col-sm-7 plantInfo">
                                            <p class="text-left gardenPFirst"><b>{{ plant.name }}</b></p>
                                            <p>{{plant.genus}}</p>
                                            <add-userplant-modal :plant="plant" :user="$route.params.id"
                                                                 @newUserplant="newUserplant">
                                            </add-userplant-modal>

                                        </div>
                                        <img class="col-sm-5 imgTest" v-bind:src="'../' + plant.icon"
                                             alt="Picture of plant">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <div class="col windowImage windowPlant" v-else-if="!add && garden !== null">
            <div v-if="image === ''" >
                <img :src="'../' + garden[0].plant.WindowIcon" alt="Plant side view"
                     class="col-sm plantWindow">
            </div>
            <div v-else="image !== ''" >
                <img :src="'../' + image" alt="Plant side view" class="col-sm plantWindow">
            </div>
        </div>

        <div class="mobile">
            <div  v-if="!add" class="row">
                <p class="col-8 mygardenmobile">Mein Garten</p>
                <button class="btn col-3 mobileAdd" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <span class="iconMobile">

                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     viewBox="0 0 455.4 455.4" style="enable-background:new 0 0 455.4 455.4;" xml:space="preserve"><path class="path1" d="M405.5,412.8c-69.7,56.9-287.3,56.9-355.6,0c-69.7-56.9-62.6-300.1,0-364.1s293-64,355.6,0S475.2,355.9,405.5,412.8z"/><path
                        class="path2" d="M362.8,227.9c0,14.2-11.4,25.6-25.6,25.6h-85.3v85.3c0,14.2-11.4,25.6-25.6,25.6s-25.6-11.4-25.6-25.6v-85.3
	h-85.3c-14.2,0-25.6-11.4-25.6-25.6s11.4-25.6,25.6-25.6h85.3v-85.3c0-14.2,11.4-25.6,25.6-25.6s25.6,11.4,25.6,25.6v85.3h85.3
	C351.4,202.3,362.8,213.7,362.8,227.9z"/></svg></span>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#" @click="add = true" >Neue Pflanze hinzufügen</a>
                    <a v-if="change===false" class="dropdown-item" href="#" @click="change=true"  >Zu Listenansicht wechseln</a>
                    <a v-if="change===true" class="dropdown-item" href="#" @click="change=false"  >Zu Fensterbankansicht wechseln</a>
                    <a class="dropdown-item" href="#" @click="edit = true" >Pflanzen löschen</a>
                </div>
            </div>

                <div id="carouselExampleIndicators" class="carousel slide position-relative" data-ride="carousel" v-if="change === false && garden !== null && !add">
                    <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" class="active"></li>
                            <li data-target="#carouselExampleIndicators" v-for="userplant in garden" v-if="userplant !== garden[0]"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="position-absolute mobileProfile">
                                <remove-plant-modal v-if="edit" :userplant="garden[0]" @newUserplant="newUserplant" @closeModal="editU"></remove-plant-modal>
                                <router-link :to="'/userplant/' + garden[0].id">
                                    <div class="container-fluid plantsProfil border border-secondary bgWhite "
                                         v-on:mouseover="replaceImage(garden[0].plant.WindowIcon)">
                                        <p class="text-left gardenPFirstMobile"><b>{{ garden[0].name }}</b> ({{
                                            garden[0].plant.name }})</p>
                                        <p class="thirst">{{thirst(garden[0].dateWatered)}}</p>
                                        <div class="row">
                                            <div class="col-sm-6 plantInfoMobile">
                                                <div class="list"></div>
                                                <p><span class="iconsGarden"> <svg version="1.1" id="Layer_1"
                                                                                   xmlns="http://www.w3.org/2000/svg"
                                                                                   xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                   x="0px" y="0px"
                                                                                   viewBox="0 0 512 512"
                                                                                   style="enable-background:new 0 0 512 512;"
                                                                                   xml:space="preserve">
                                            <g>
                                                <g>
                                                    <path d="M256,0C153.755,0,70.573,83.182,70.573,185.426c0,126.888,165.939,313.167,173.004,321.035
                                                        c6.636,7.391,18.222,7.378,24.846,0c7.065-7.868,173.004-194.147,173.004-321.035C441.425,83.182,358.244,0,256,0z M256,278.719
                                                        c-51.442,0-93.292-41.851-93.292-93.293S204.559,92.134,256,92.134s93.291,41.851,93.291,93.293S307.441,278.719,256,278.719z"/>
                                                </g>
                                            </g>
                                            </svg>
                                   </span> {{ garden[0].location }}
                                                </p>
                                                <p><span class="iconsGarden"> <svg xmlns="http://www.w3.org/2000/svg"
                                                                                   xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                   x="0px" y="0px" viewBox="0 0 455.4 455.4"
                                                                                   style="enable-background:new 0 0 455.4 455.4;"
                                                                                   xml:space="preserve"><path class="path1" d="m80 320h53.332031c8.832031 0 16-7.167969 16-16v-53.332031c0-8.832031-7.167969-16-16-16h-53.332031c-8.832031 0-16 7.167969-16 16v53.332031c0 8.832031 7.167969 16 16 16zm0 0"/><path
                                                        class="path1"
                                                        d="m80 448h53.332031c8.832031 0 16-7.167969 16-16v-53.332031c0-8.832031-7.167969-16-16-16h-53.332031c-8.832031 0-16 7.167969-16 16v53.332031c0 8.832031 7.167969 16 16 16zm0 0"/><path
                                                        class="path1"
                                                        d="m229.332031 320h53.335938c8.832031 0 16-7.167969 16-16v-53.332031c0-8.832031-7.167969-16-16-16h-53.335938c-8.832031 0-16 7.167969-16 16v53.332031c0 8.832031 7.167969 16 16 16zm0 0"/><path
                                                        class="path1"
                                                        d="m229.332031 448h53.335938c8.832031 0 16-7.167969 16-16v-53.332031c0-8.832031-7.167969-16-16-16h-53.335938c-8.832031 0-16 7.167969-16 16v53.332031c0 8.832031 7.167969 16 16 16zm0 0"/><path
                                                        class="path1"
                                                        d="m378.667969 320h53.332031c8.832031 0 16-7.167969 16-16v-53.332031c0-8.832031-7.167969-16-16-16h-53.332031c-8.832031 0-16 7.167969-16 16v53.332031c0 8.832031 7.167969 16 16 16zm0 0"/><path
                                                        class="path1"
                                                        d="m448 64h-21.332031v-42.667969c0-11.773437-9.558594-21.332031-21.335938-21.332031h-21.332031c-11.777344 0-21.332031 9.558594-21.332031 21.332031v42.667969h-213.335938v-42.667969c0-11.773437-9.554687-21.332031-21.332031-21.332031h-21.332031c-11.777344 0-21.335938 9.558594-21.335938 21.332031v42.667969h-21.332031c-35.285156 0-64 28.714844-64 64v320c0 35.285156 28.714844 64 64 64h384c35.285156 0 64-28.714844 64-64v-320c0-35.285156-28.714844-64-64-64zm21.332031 384c0 11.753906-9.578125 21.332031-21.332031 21.332031h-384c-11.753906 0-21.332031-9.578125-21.332031-21.332031v-233.8125h426.664062zm0 0"/></svg>
                                   </span> {{wateringTime(garden[0].dateWatered)}}
                                                </p>
                                                <p><span class="water"> <svg xmlns="http://www.w3.org/2000/svg"
                                                                             width="39.355" height="62.318"
                                                                             viewBox="0 0 39.355 62.318">
                                            <path id="Pfad_371" data-name="Pfad 371"
                                                  d="M46.867,425.31a19.678,19.678,0,1,1-39.355,0c0-8.9,13.184-33.135,17.968-41.639a1.96,1.96,0,0,1,3.417,0c4.786,8.5,17.97,32.743,17.97,41.639Zm0,0"
                                                  transform="translate(-7.512 -382.671)" fill="#B8E269"/>
                                            </svg>
                                   </span> {{wateringShedule(garden[0].wateringCycle)}}
                                                </p>
                                            </div>
                                            <button v-b-modal.modal-center class="col-sm-3 waterMobile"
                                                    @click="water($event, garden[0])"> Gießen
                                            </button>

                                        </div>
                                    </div>
                                </router-link>
                            </div>
                            <img :src="'../' + garden[0].plant.WindowIcon" class="d-block imgMobile" alt="Window Image of Plant">
                        </div>
                        <div class="carousel-item" v-for="userplant in garden" v-if="userplant !== garden[0]">
                            <div class="position-absolute mobileProfile">
                                <remove-plant-modal v-if="edit" :userplant="userplant" @newUserplant="newUserplant" @closeModal="editU"></remove-plant-modal>
                                <router-link :to="'/userplant/' + userplant.id">
                                    <div class="container-fluid plantsProfil border border-secondary bgWhite"
                                         v-on:mouseover="replaceImage(userplant.plant.WindowIcon)">
                                        <p class="text-left gardenPFirstMobile"><b>{{ userplant.name }}</b> ({{
                                            userplant.plant.name }})</p>
                                        <p class="thirst">{{thirst(userplant.dateWatered)}}</p>
                                        <div class="row">
                                            <div class="col-sm-6 plantInfoMobile">
                                                <div class="list"></div>
                                                <p><span class="iconsGarden"> <svg version="1.1" id="Layer_1"
                                                                                   xmlns="http://www.w3.org/2000/svg"
                                                                                   xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                   x="0px" y="0px"
                                                                                   viewBox="0 0 512 512"
                                                                                   style="enable-background:new 0 0 512 512;"
                                                                                   xml:space="preserve">
                                            <g>
                                                <g>
                                                    <path d="M256,0C153.755,0,70.573,83.182,70.573,185.426c0,126.888,165.939,313.167,173.004,321.035
                                                        c6.636,7.391,18.222,7.378,24.846,0c7.065-7.868,173.004-194.147,173.004-321.035C441.425,83.182,358.244,0,256,0z M256,278.719
                                                        c-51.442,0-93.292-41.851-93.292-93.293S204.559,92.134,256,92.134s93.291,41.851,93.291,93.293S307.441,278.719,256,278.719z"/>
                                                </g>
                                            </g>
                                            </svg>
                                   </span> {{ userplant.location }}
                                                </p>
                                                <p><span class="iconsGarden"> <svg xmlns="http://www.w3.org/2000/svg"
                                                                                   xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                   x="0px" y="0px" viewBox="0 0 455.4 455.4"
                                                                                   style="enable-background:new 0 0 455.4 455.4;"
                                                                                   xml:space="preserve"><path class="path1" d="m80 320h53.332031c8.832031 0 16-7.167969 16-16v-53.332031c0-8.832031-7.167969-16-16-16h-53.332031c-8.832031 0-16 7.167969-16 16v53.332031c0 8.832031 7.167969 16 16 16zm0 0"/><path
                                                        class="path1"
                                                        d="m80 448h53.332031c8.832031 0 16-7.167969 16-16v-53.332031c0-8.832031-7.167969-16-16-16h-53.332031c-8.832031 0-16 7.167969-16 16v53.332031c0 8.832031 7.167969 16 16 16zm0 0"/><path
                                                        class="path1"
                                                        d="m229.332031 320h53.335938c8.832031 0 16-7.167969 16-16v-53.332031c0-8.832031-7.167969-16-16-16h-53.335938c-8.832031 0-16 7.167969-16 16v53.332031c0 8.832031 7.167969 16 16 16zm0 0"/><path
                                                        class="path1"
                                                        d="m229.332031 448h53.335938c8.832031 0 16-7.167969 16-16v-53.332031c0-8.832031-7.167969-16-16-16h-53.335938c-8.832031 0-16 7.167969-16 16v53.332031c0 8.832031 7.167969 16 16 16zm0 0"/><path
                                                        class="path1"
                                                        d="m378.667969 320h53.332031c8.832031 0 16-7.167969 16-16v-53.332031c0-8.832031-7.167969-16-16-16h-53.332031c-8.832031 0-16 7.167969-16 16v53.332031c0 8.832031 7.167969 16 16 16zm0 0"/><path
                                                        class="path1"
                                                        d="m448 64h-21.332031v-42.667969c0-11.773437-9.558594-21.332031-21.335938-21.332031h-21.332031c-11.777344 0-21.332031 9.558594-21.332031 21.332031v42.667969h-213.335938v-42.667969c0-11.773437-9.554687-21.332031-21.332031-21.332031h-21.332031c-11.777344 0-21.335938 9.558594-21.335938 21.332031v42.667969h-21.332031c-35.285156 0-64 28.714844-64 64v320c0 35.285156 28.714844 64 64 64h384c35.285156 0 64-28.714844 64-64v-320c0-35.285156-28.714844-64-64-64zm21.332031 384c0 11.753906-9.578125 21.332031-21.332031 21.332031h-384c-11.753906 0-21.332031-9.578125-21.332031-21.332031v-233.8125h426.664062zm0 0"/></svg>
                                   </span> {{wateringTime(userplant.dateWatered)}}
                                                </p>
                                                <p><span class="water"> <svg xmlns="http://www.w3.org/2000/svg"
                                                                             width="39.355" height="62.318"
                                                                             viewBox="0 0 39.355 62.318">
                                            <path id="Pfad_371" data-name="Pfad 371"
                                                  d="M46.867,425.31a19.678,19.678,0,1,1-39.355,0c0-8.9,13.184-33.135,17.968-41.639a1.96,1.96,0,0,1,3.417,0c4.786,8.5,17.97,32.743,17.97,41.639Zm0,0"
                                                  transform="translate(-7.512 -382.671)" fill="#B8E269"/>
                                            </svg>
                                   </span> {{wateringShedule(userplant.wateringCycle)}}
                                                </p>
                                            </div>
                                            <button v-b-modal.modal-center class="col-sm-3 waterMobile"
                                                    @click="water($event, userplant)"> Gießen
                                            </button>

                                        </div>
                                    </div>
                                </router-link>
                            </div>
                            <img :src="'../' + userplant.plant.WindowIcon" class="d-block imgMobile" alt="Window Image of Plant">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

            <div v-if="change === true && garden !== null" class="row changeMobile">
                <div class="col">
                    <div v-for="(userplant, index) in garden">
                        <div v-if="index % 2 == 0 || index == 0" class="row paddingNormalize">
                            <remove-plant-modal v-if="edit" :userplant="userplant"
                                                @newUserplant="newUserplant" @closeModal="editU" ></remove-plant-modal>
                            <router-link :to="'/userplant/' + userplant.id">
                                <div class="container-fluid plantsProfil dropShadow bgWhiteGrey "
                                     v-on:mouseover="replaceImage(userplant.plant.WindowIcon)">
                                    <div class="row">
                                        <div class="col-sm-7 plantInfo">
                                            <p class="text-left gardenPFirst"><b>{{ userplant.name }}</b> ({{
                                                userplant.plant.name }})</p>
                                            <p>{{thirst(userplant.dateWatered)}}</p>
                                            <div class="list"></div>
                                            <p><span class="iconsGarden"> <svg version="1.1" id="Layer_1"
                                                                               xmlns="http://www.w3.org/2000/svg"
                                                                               xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                               x="0px" y="0px"
                                                                               viewBox="0 0 512 512"
                                                                               style="enable-background:new 0 0 512 512;"
                                                                               xml:space="preserve">
                                            <g>
                                                <g>
                                                    <path d="M256,0C153.755,0,70.573,83.182,70.573,185.426c0,126.888,165.939,313.167,173.004,321.035
                                                        c6.636,7.391,18.222,7.378,24.846,0c7.065-7.868,173.004-194.147,173.004-321.035C441.425,83.182,358.244,0,256,0z M256,278.719
                                                        c-51.442,0-93.292-41.851-93.292-93.293S204.559,92.134,256,92.134s93.291,41.851,93.291,93.293S307.441,278.719,256,278.719z"/>
                                                </g>
                                            </g>
                                            </svg>
                                   </span> {{ userplant.location }}
                                            </p>
                                            <p><span class="iconsGarden"> <svg xmlns="http://www.w3.org/2000/svg"
                                                                               xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                               x="0px" y="0px" viewBox="0 0 455.4 455.4"
                                                                               style="enable-background:new 0 0 455.4 455.4;"
                                                                               xml:space="preserve"><path class="path1" d="m80 320h53.332031c8.832031 0 16-7.167969 16-16v-53.332031c0-8.832031-7.167969-16-16-16h-53.332031c-8.832031 0-16 7.167969-16 16v53.332031c0 8.832031 7.167969 16 16 16zm0 0"/><path
                                                    class="path1"
                                                    d="m80 448h53.332031c8.832031 0 16-7.167969 16-16v-53.332031c0-8.832031-7.167969-16-16-16h-53.332031c-8.832031 0-16 7.167969-16 16v53.332031c0 8.832031 7.167969 16 16 16zm0 0"/><path
                                                    class="path1"
                                                    d="m229.332031 320h53.335938c8.832031 0 16-7.167969 16-16v-53.332031c0-8.832031-7.167969-16-16-16h-53.335938c-8.832031 0-16 7.167969-16 16v53.332031c0 8.832031 7.167969 16 16 16zm0 0"/><path
                                                    class="path1"
                                                    d="m229.332031 448h53.335938c8.832031 0 16-7.167969 16-16v-53.332031c0-8.832031-7.167969-16-16-16h-53.335938c-8.832031 0-16 7.167969-16 16v53.332031c0 8.832031 7.167969 16 16 16zm0 0"/><path
                                                    class="path1"
                                                    d="m378.667969 320h53.332031c8.832031 0 16-7.167969 16-16v-53.332031c0-8.832031-7.167969-16-16-16h-53.332031c-8.832031 0-16 7.167969-16 16v53.332031c0 8.832031 7.167969 16 16 16zm0 0"/><path
                                                    class="path1"
                                                    d="m448 64h-21.332031v-42.667969c0-11.773437-9.558594-21.332031-21.335938-21.332031h-21.332031c-11.777344 0-21.332031 9.558594-21.332031 21.332031v42.667969h-213.335938v-42.667969c0-11.773437-9.554687-21.332031-21.332031-21.332031h-21.332031c-11.777344 0-21.335938 9.558594-21.335938 21.332031v42.667969h-21.332031c-35.285156 0-64 28.714844-64 64v320c0 35.285156 28.714844 64 64 64h384c35.285156 0 64-28.714844 64-64v-320c0-35.285156-28.714844-64-64-64zm21.332031 384c0 11.753906-9.578125 21.332031-21.332031 21.332031h-384c-11.753906 0-21.332031-9.578125-21.332031-21.332031v-233.8125h426.664062zm0 0"/></svg>
                                   </span> {{wateringTime(userplant.dateWatered)}}
                                            </p>
                                            <p><span class="water"> <svg xmlns="http://www.w3.org/2000/svg"
                                                                         width="39.355" height="62.318"
                                                                         viewBox="0 0 39.355 62.318">
                                            <path id="Pfad_371" data-name="Pfad 371"
                                                  d="M46.867,425.31a19.678,19.678,0,1,1-39.355,0c0-8.9,13.184-33.135,17.968-41.639a1.96,1.96,0,0,1,3.417,0c4.786,8.5,17.97,32.743,17.97,41.639Zm0,0"
                                                  transform="translate(-7.512 -382.671)" fill="#B8E269"/>
                                            </svg>
                                   </span> {{wateringShedule(userplant.wateringCycle)}}
                                            </p>
                                            <button v-b-modal.modal-center class="buttonDarkGreenSmall"
                                                    @click="water($event, userplant)"> Gießen
                                            </button>
                                        </div>

                                        <img class="col-sm-5 imgTest imgMobile" v-bind:src="'../' + userplant.plant.icon"
                                             alt="Picture of plant" height="230">


                                    </div>
                                </div>
                            </router-link>

                        </div>
                    </div>
                </div>

                <div class="col">
                    <div v-for="(userplant, index) in garden">
                        <div v-if="index % 2 !== 0" class="row paddingNormalize">
                            <remove-plant-modal v-if="edit" :userplant="userplant"
                                                @newUserplant="newUserplant" @closeModal="editU" ></remove-plant-modal>
                            <router-link :to="'/userplant/' + userplant.id">
                                <div class="container-fluid plantsProfil dropShadow bgWhiteGrey "
                                     v-on:mouseover="replaceImage(userplant.plant.WindowIcon)">
                                    <div class="row">
                                        <div class="col-sm-7 plantInfo">
                                            <p class="text-left gardenPFirst"><b>{{ userplant.name }}</b> ({{
                                                userplant.plant.name }})</p>
                                            <p>{{thirst(userplant.dateWatered)}}</p>
                                            <div class="list"></div>
                                            <p><span class="iconsGarden"> <svg version="1.1" id="Layer_1"
                                                                               xmlns="http://www.w3.org/2000/svg"
                                                                               xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                               x="0px" y="0px"
                                                                               viewBox="0 0 512 512"
                                                                               style="enable-background:new 0 0 512 512;"
                                                                               xml:space="preserve">
                                            <g>
                                                <g>
                                                    <path d="M256,0C153.755,0,70.573,83.182,70.573,185.426c0,126.888,165.939,313.167,173.004,321.035
                                                        c6.636,7.391,18.222,7.378,24.846,0c7.065-7.868,173.004-194.147,173.004-321.035C441.425,83.182,358.244,0,256,0z M256,278.719
                                                        c-51.442,0-93.292-41.851-93.292-93.293S204.559,92.134,256,92.134s93.291,41.851,93.291,93.293S307.441,278.719,256,278.719z"/>
                                                </g>
                                            </g>
                                            </svg>
                                   </span> {{ userplant.location }}
                                            </p>
                                            <p><span class="iconsGarden"> <svg xmlns="http://www.w3.org/2000/svg"
                                                                               xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                               x="0px" y="0px" viewBox="0 0 455.4 455.4"
                                                                               style="enable-background:new 0 0 455.4 455.4;"
                                                                               xml:space="preserve"><path class="path1" d="m80 320h53.332031c8.832031 0 16-7.167969 16-16v-53.332031c0-8.832031-7.167969-16-16-16h-53.332031c-8.832031 0-16 7.167969-16 16v53.332031c0 8.832031 7.167969 16 16 16zm0 0"/><path
                                                    class="path1"
                                                    d="m80 448h53.332031c8.832031 0 16-7.167969 16-16v-53.332031c0-8.832031-7.167969-16-16-16h-53.332031c-8.832031 0-16 7.167969-16 16v53.332031c0 8.832031 7.167969 16 16 16zm0 0"/><path
                                                    class="path1"
                                                    d="m229.332031 320h53.335938c8.832031 0 16-7.167969 16-16v-53.332031c0-8.832031-7.167969-16-16-16h-53.335938c-8.832031 0-16 7.167969-16 16v53.332031c0 8.832031 7.167969 16 16 16zm0 0"/><path
                                                    class="path1"
                                                    d="m229.332031 448h53.335938c8.832031 0 16-7.167969 16-16v-53.332031c0-8.832031-7.167969-16-16-16h-53.335938c-8.832031 0-16 7.167969-16 16v53.332031c0 8.832031 7.167969 16 16 16zm0 0"/><path
                                                    class="path1"
                                                    d="m378.667969 320h53.332031c8.832031 0 16-7.167969 16-16v-53.332031c0-8.832031-7.167969-16-16-16h-53.332031c-8.832031 0-16 7.167969-16 16v53.332031c0 8.832031 7.167969 16 16 16zm0 0"/><path
                                                    class="path1"
                                                    d="m448 64h-21.332031v-42.667969c0-11.773437-9.558594-21.332031-21.335938-21.332031h-21.332031c-11.777344 0-21.332031 9.558594-21.332031 21.332031v42.667969h-213.335938v-42.667969c0-11.773437-9.554687-21.332031-21.332031-21.332031h-21.332031c-11.777344 0-21.335938 9.558594-21.335938 21.332031v42.667969h-21.332031c-35.285156 0-64 28.714844-64 64v320c0 35.285156 28.714844 64 64 64h384c35.285156 0 64-28.714844 64-64v-320c0-35.285156-28.714844-64-64-64zm21.332031 384c0 11.753906-9.578125 21.332031-21.332031 21.332031h-384c-11.753906 0-21.332031-9.578125-21.332031-21.332031v-233.8125h426.664062zm0 0"/></svg>
                                   </span> {{wateringTime(userplant.dateWatered)}}
                                            </p>
                                            <p><span class="water"> <svg xmlns="http://www.w3.org/2000/svg"
                                                                         width="39.355" height="62.318"
                                                                         viewBox="0 0 39.355 62.318">
                                            <path id="Pfad_371" data-name="Pfad 371"
                                                  d="M46.867,425.31a19.678,19.678,0,1,1-39.355,0c0-8.9,13.184-33.135,17.968-41.639a1.96,1.96,0,0,1,3.417,0c4.786,8.5,17.97,32.743,17.97,41.639Zm0,0"
                                                  transform="translate(-7.512 -382.671)" fill="#B8E269"/>
                                            </svg>
                                   </span> {{wateringShedule(userplant.wateringCycle)}}
                                            </p>
                                            <button v-b-modal.modal-center class="buttonDarkGreenSmall"
                                                    @click="water($event, userplant)"> Gießen
                                            </button>
                                        </div>

                                        <img class="col-sm-5 imgTest imgMobile" v-bind:src="'../' + userplant.plant.icon"
                                             alt="Picture of plant" height="230">


                                    </div>
                                </div>
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>

            <div v-if="garden === null && add === false" class="text-center mobileNoplants">Wow such empty! Füge Pflanzen zu deinem Garten hinzu.</div>

        </div>

    </div>

</template>

<script>

    import AddUserplantModal from "../modals/addUserplantModal";
    import removePlantModal from "../modals/removePlantModal";

    export default {
        name: "Garden",
        components: {
            'add-userplant-modal': AddUserplantModal,
            'remove-plant-modal': removePlantModal
        },
        data: function () {
            return {
                currentPlantXP: null,
                LevelUp: false,
                garden: null,
                plants: null,
                image: '',
                add: false,
                search: '',
                userplantTemp: null,
                change: false,
                edit: false,
                watered: [],
                i: 0,
                weekday: ["Sonntag", "Montag", "Dienstag", "Mittwoch", "Donnerstag", "Freitag", "Samstag"]
            }
        },
        mounted: function () {
            this.$http.get('/api/garden/' + this.$route.params.id)
                .then(response => {
                    this.garden = response.data;
                });

            this.$http.get('/api/garden/')
                .then(response => {
                    this.plants = response.data;
                })
                .catch(error => {
                    alert(error);
                });
        },

        computed: {

            filteredPlants: function () {
                return this.plants.filter((plant) => {
                    return plant.name.toLowerCase().match(this.search.toLowerCase())
                        || plant.genus.toLowerCase().match(this.search.toLowerCase())
                        || plant.latinName.toLowerCase().match(this.search.toLowerCase())
                    //|| plant.alternativeName.toLowerCase().match(this.search.toLowerCase()) can be null
                });
            },

        },

        methods: {

            replaceImage: function (image) {
                this.image = image;
            },

            newUserplant: function () {
                location.reload(true);
            },

            water: function (e, userplant) {

                e.preventDefault();

                if (userplant.plant.careLevel === 'gering') {
                    this.currentPlantXP = userplant.xp + 5;
                    if (this.currentPlantXP >= (userplant.xp - userplant.xp % 100 + 100)) {
                        this.LevelUp = true;
                    }
                } else if (userplant.plant.careLevel === 'mittel') {
                    this.currentPlantXP = userplant.xp + 10;
                    if (this.currentPlantXP >= (userplant.xp - userplant.xp % 100 + 100)) {
                        this.LevelUp = true;
                    }
                } else if (userplant.plant.careLevel === 'hoch') {
                    this.currentPlantXP = userplant.xp + 15;
                    if (this.currentPlantXP >= (userplant.xp - userplant.xp % 100 + 100)) {
                        this.LevelUp = true;
                    }
                } else {
                    this.currentPlantXP = userplant.xp + 20;
                    if (this.currentPlantXP >= (userplant.xp - userplant.xp % 100 + 100)) {
                        this.LevelUp = true;
                    }
                }

                let today = new Date();

                if (!this.watered.includes(userplant.name)) {

                    today.setDate(today.getDate() + userplant.wateringCycle);
                    today.setMonth(today.getMonth() + 1);
                    let setDate = today.getDate() + '-' + today.getMonth() + '-' + today.getFullYear();

                    userplant.dateWatered['date'] = today.getFullYear() + '-' + today.getMonth() + '-' + today.getDate() + ' ' + today.getHours() + ':' + today.getMinutes() + ':' + today.getSeconds() + '.' + today.getMilliseconds();
                    this.watered[this.i] = userplant.name;
                    this.i++;

                    this.$http.put('/api/garden/setWateringDate/' + userplant.id, setDate)
                        .then(response => {
                            this.userplantTemp = response.data;
                        })
                        .catch(error => {
                            alert(error);
                        });

                    this.$http.put('/api/garden/' + this.$route.params.id + '/setCounterWatered')
                        .then(response => {
                            console.log(response.data)
                        })
                        .catch(error => {
                            alert(error);
                        });
                }

            },

            wateringTime: function (wateringDate) {

                let today = new Date();
                let watering = new Date(wateringDate['date']);

                if (watering.getDate() <= today.getDate() &&
                    watering.getMonth() <= today.getMonth() &&
                    watering.getFullYear() <= today.getFullYear()) {
                    return 'Heute';
                } else {
                    return this.weekday[watering.getDay()];
                }

            },

            wateringShedule: function (wateringCycle) {

                if (wateringCycle < 7 && wateringCycle > 1) {
                    return 'Alle ' + wateringCycle + ' Tage';
                } else if (wateringCycle === 1) {
                    return 'Jeden Tag';
                } else {
                    return 'Jede Woche';
                }

            },

            thirst: function (wateringDate) {

                let today = new Date();
                let watering = new Date(wateringDate['date']);

                if (watering.getDate() <= today.getDate() &&
                    watering.getMonth() <= today.getMonth() &&
                    watering.getFullYear() <= today.getFullYear()) {
                    return 'Ist durstig!';
                } else {
                    return 'Fühlt sich gut!';
                }
            },

            MissingXPs: function (xp) {
                return (xp - xp % 100 + 100) - xp;
            },

            plantLevel: function (xp) {

                return Math.trunc(xp / 100) + 1;
            },

            editU:function() {
                this.edit = false;
            }
        }

    }
</script>

<style scoped>

    a {
        color: inherit;
    }

    .scrollPlants {
        height: 64vh;
        overflow: scroll;
    }

    /*everything but userplants*/

    .windowImage {
        margin: 0;
        padding: 0;
    }

    .plantWindow{
        height: 85vh;
    }

    .all {
        width: 103%;
    }

    .garden {
        padding-bottom: 15px;
    }

    .mygarden {
        margin-top: 50px;
        margin-bottom: 5px;
    }

    .mygarden h1 {
        font-size: 2.5rem;
    }

    .add {
        padding-top: 11px;
    }

    .mobile {
        display: none;
    }

    /*icons*/

    .iconGarden svg { width: 10%; fill: white; }
    .iconGarden svg .path1 { fill: #B8E269; }
    .iconGarden svg:hover .path1 {  fill: #97B753; }
    .iconGarden svg:active { fill: #B8E269; }
    .iconGarden svg:active .path1 { fill: #000000;}
    .iconGarden {padding-top: 11px;}

    .iconsGarden svg {
        width: 10%;
        fill: #B8E269;
    }

    .water svg {
        padding: 0;
        margin: 0;
        width: 7%;
        height: 2%;
    }

    /*userplants*/

    a:link {
        text-decoration: none;
    }

    .plantsProfil {
        margin-bottom: 40px;
        border-radius: 10px;
        padding: 10px 10px 10px 30px;
        width: 90%;
    }

    .plantsProfil:hover {
        background-color: #707070;
        color: white;
    }

    .plantsProfil:active {
        background-color: #DEDEDE;
        color: #707070;
    }

    .plantInfo {
        font-size: 10pt;
        text-align: left;
    }

    .plantInfo p {
        margin-bottom: 2.5%;
    }

    .gardenPFirst {
        font-size: 11.5pt;
    }

    .list {
        margin-top: 25px;
    }

    .plantProfil {
        border-radius: 10px;
        padding: 10px 10px 10px 30px;
        margin-bottom: 30px;
        height: 140px;
        color: #707070;
    }

    .addPlant {
        padding: 50px;
        height: 85vh;
        overflow: auto;
        background: #DEDEDE;

    }

    .searchBar {
        margin-bottom: 10px;
        border-color: #97B753;
        padding: 4%;
        background-color: #DEDEDE;
    }

    .edit {
        font-size: x-small;
    }

    .mygardenmobile {
        padding-left: 2%;
        font-size: 20pt;
        margin: 3%;
    }

    .mobileAdd{
        padding-left: 15%;
    }

    .iconMobile svg { width: 50%; fill: white;}
    .iconMobile svg .path1 { fill: #B8E269; }
    .iconMobile svg:hover .path1 {  fill: #97B753; }
    .iconMobile svg:active { fill: #B8E269; }
    .iconMobile svg:active .path1 { fill: #000000;}
    .iconMobile {padding-top: 11px;}

    .mobileProfile{
        left: 25%;
        right: 25%;
        margin-top: 10%;
    }

    .gardenPFirstMobile {
        font-size: 18pt;
        margin-top: 3%;
        margin-bottom: 2%;
    }

    .thirst {
        font-size: 14pt;
    }

    .plantInfoMobile {
        font-size: 14pt;
        text-align: left;
    }

    .plantProfileAdd {
        border-radius: 10px;
        padding: 10px 10px 10px 30px;
        margin-bottom: 30px;
        height: 140px;
        color: #707070;
    }

    .waterMobile{
        background-color: #97B753;
        color: white;
        border: 2px solid #97B753;
        border-radius: 10px;
        font-size: 130%;
        margin-bottom: 10%;
        margin-top: 10%;
    }

    .changeMobile {
        margin-top: 2%;
        margin-right: 2%;
        margin-left: 2%;
    }

    .mobileNoplants {
        margin-top: 50vh;
        margin-bottom: 50vh;
        width:100%;
    }

    .imgMobile{

        width: 100%;
    }

    @media (max-width: 600px) {

        .mobileProfile{
            left: 5% !important;
            right: 5% !important;
        }

        .gardenPFirstMobile {
            font-size: 11pt !important;
            margin-top: 1% !important;
        }

        .thirst {
            font-size: 10pt !important;
        }

        .plantInfoMobile {
            font-size: 10pt !important;
            margin-bottom: 2% !important;
        }

        .iconsGarden svg{
            width: 5%;
        }

        .water svg {
            width: 5%;
        }

        .waterMobile {
            padding: 1%;
            left: 55%;
            top: 30%;
            width: 20%;
            height:10%;
            position: fixed;
            font-size: 110% !important;
        }

        .imgTest{
            display: none;
        }

    }

    @media (max-width: 768px) {

        .mygardenmobile {
            padding-left: 3%;
            font-size: 16pt;
        }

        .iconMobile svg { width: 70%;}

        .gardenPFirstMobile {
            font-size: 13pt;
            margin-top: 2%;
        }

        .thirst {
            font-size: 11pt;
        }

        .plantInfoMobile {
            font-size: 11pt;
            text-align: left;
            margin-bottom: 3%;
        }

        .mobileProfile{
            left: 15%;
            right: 15%;
        }

        .waterMobile{
            font-size: 90%;
        }

        .plantProfileAdd{
            height: 200px !important;
        }

    }

    @media (max-width: 1270px) and (orientation: landscape){

        .mobile {
            display: unset;
        }

        .windowPlant {
            display: none;
        }

        .garden {
            display: none;
        }

        .plantsProfil {
            padding: 10px 10px 10px 40px;
        }

        .plantProfileAdd{
            height: 200px;
        }

        .imgTest{
            height: 170px;
        }


    }

    @media (max-width: 1270px) and (orientation: portrait){
        .mobile {
            display: unset;
        }

        .windowPlant {
            display: none;
        }

        .garden {
            display: none;
        }

        .plantsProfil {
            padding: 20px 10px 10px 40px;
        }

        .plantProfileAdd{
            height: 200px;
        }

        .imgTest{
            height: 170px;
        }




    }

</style>