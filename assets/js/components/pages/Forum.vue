<template>
    <div id="root">
        <div class="threadPosts marginLeftRight marginTopOnSite">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-10"><h1 class="forumH1">Forum</h1></div>
                    <div class="col-lg-2 text-right">
                        <form>
                            <input type="text" placeholder="Suche nach Thread.." class="form-control form-control-sm searchBarDatabase" aria-label="ShreadSearch" v-model="threadSearch">

                            <span class="searchForum"><svg xmlns="http://www.w3.org/2000/svg" width="41.472" height="35.105" viewBox="0 0 41.472 35.105">
                                <g id="Gruppe_730" data-name="Gruppe 730" transform="translate(0.872)">
                                    <g id="Ellipse_28" data-name="Ellipse 28" transform="translate(12.6)" fill="#fff" stroke="#97b753" class="searchStroke" stroke-width="3">
                                        <circle cx="14" cy="14" r="14" stroke="none"/>
                                        <circle cx="14" cy="14" r="12.5" fill="none"/>
                                </g>
                                <line id="Linie_14" data-name="Linie 14" y1="10.93" x2="15.303" transform="translate(0 22.954)" fill="none" stroke="#97b753" class="searchStroke" stroke-width="3"/>
                                </g>
                                </svg>
                            </span>
                        </form>
                        <span v-if="addPlantForm===false" class="addThread addIcon" @click="createThread"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 455.4 455.4" style="enable-background:new 0 0 455.4 455.4;" xml:space="preserve"><path class="darkGreen" d="M405.5,412.8c-69.7,56.9-287.3,56.9-355.6,0c-69.7-56.9-62.6-300.1,0-364.1s293-64,355.6,0S475.2,355.9,405.5,412.8z"/><path class="path2" d="M362.8,227.9c0,14.2-11.4,25.6-25.6,25.6h-85.3v85.3c0,14.2-11.4,25.6-25.6,25.6s-25.6-11.4-25.6-25.6v-85.3
	h-85.3c-14.2,0-25.6-11.4-25.6-25.6s11.4-25.6,25.6-25.6h85.3v-85.3c0-14.2,11.4-25.6,25.6-25.6s25.6,11.4,25.6,25.6v85.3h85.3
	C351.4,202.3,362.8,213.7,362.8,227.9z"/></svg></span>
                        <span v-if="addPlantForm==true" class="addThread addIcon" @click="createThread"><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 455.4 455.4" style="enable-background:new 0 0 455.4 455.4;" xml:space="preserve">
<path class="darkGreen" d="M405.5,412.8c-69.7,56.9-287.3,56.9-355.6,0c-69.7-56.9-62.6-300.1,0-364.1s293-64,355.6,0S475.2,355.9,405.5,412.8z"/>
<path class="st0" d="M362.8,227.9c0,14.2-11.4,25.6-25.6,25.6l-221.8,0c-14.2,0-25.6-11.4-25.6-25.6s11.4-25.6,25.6-25.6h221.8
	C351.4,202.3,362.8,213.7,362.8,227.9z"/>
</svg></span>
                    </div>
                </div>
                <div class="greenLine lineUnderHL"></div>

                <div v-if="addPlantForm === true" class="createThread paddingNormalize">
                    <h5 class="newThread">Neuen Thread erstellen</h5>
                    <thread-form></thread-form>
                </div>

                <div><h3 class="h3Margin">{{ threadHeadline }}</h3></div>
                <div class="greenLine"></div>

            </div>
            <div v-for="(thread, index) in filteredThreads.slice(0,3)" class="container-fluid">
                <router-link :to="'/forum/' + thread.id" class="row thread dropSchadow">
                    <div class="col-lg-11">
                        <div class="row">
                            <h3 class="threadHeadline">{{thread.headline}}</h3>
                        </div>

                        <div class="row">

                            <div class="threadCategory threadStates col-lg-2">
                                <div class="row">
                                    <div class="svgIconCategory col-lg-1 paddingNormalize">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="17.8" height="28.229" viewBox="0 0 17.8 28.229">
                                            <g id="Gruppe_969" data-name="Gruppe 969" transform="translate(0.5 0.5)">
                                                <path id="Pfad_501" data-name="Pfad 501" d="M12.379,19.6H5.415a.8.8,0,0,1-.8-.8,6.71,6.71,0,0,0-1.837-4.6A8.411,8.411,0,0,1,2.934,2.523,8.315,8.315,0,0,1,8.881,0H8.9a8.414,8.414,0,0,1,8.4,8.428,8.407,8.407,0,0,1-2.3,5.8,6.641,6.641,0,0,0-1.817,4.581.8.8,0,0,1-.8.8Zm0,0" transform="translate(-0.497 0)" fill="#97b753" class="svgDarkGreen svgDarkGreenStroke" stroke="#97b753" stroke-width="1"/>
                                                <path id="Pfad_502" data-name="Pfad 502" d="M87.486,388.005H80.731a.8.8,0,0,1,0-1.6h6.755a.8.8,0,0,1,0,1.6Zm0,0" transform="translate(-75.708 -365.86)" fill="#707070" stroke="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke-width="1"/>
                                                <path id="Pfad_503" data-name="Pfad 503" d="M87.486,435.8H80.731a.8.8,0,0,1,0-1.6h6.755a.8.8,0,0,1,0,1.6Zm0,0" transform="translate(-75.708 -411.111)" fill="#707070" stroke="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke-width="1"/>
                                                <path id="Pfad_504" data-name="Pfad 504" d="M108.372,483.6H104.1a.8.8,0,0,1,0-1.6h4.269a.8.8,0,1,1,0,1.6Zm0,0" transform="translate(-97.837 -456.366)" fill="#707070" stroke="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke-width="1"/>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="col-lg-11"><p>{{thread.category.title}}</p></div>
                                </div>
                            </div>

                            <div class="threadStates col-lg-10 paddingNormalize">

                                <div class="row">
                                    <div class="svgIcons">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="27.681" height="24.848" viewBox="0 0 27.681 24.848">
                                            <path id="heart" d="M23.644,2.236A6.906,6.906,0,0,0,18.508,0a6.461,6.461,0,0,0-4.035,1.393,8.256,8.256,0,0,0-1.631,1.7,8.251,8.251,0,0,0-1.632-1.7A6.46,6.46,0,0,0,7.174,0,6.906,6.906,0,0,0,2.038,2.236,8.027,8.027,0,0,0,0,7.718a9.559,9.559,0,0,0,2.547,6.257,54.314,54.314,0,0,0,6.376,5.985c.883.753,1.885,1.606,2.925,2.516a1.508,1.508,0,0,0,1.985,0c1.04-.909,2.042-1.763,2.926-2.517a54.284,54.284,0,0,0,6.376-5.984,9.558,9.558,0,0,0,2.547-6.257,8.026,8.026,0,0,0-2.037-5.482Zm0,0" transform="translate(1 1)" v-bind:fill="[thread.isLiked ? '#B8E269' : '#dedede']" class="svgHeartDarkGrey svgDarkGreyStroke" stroke="#707070" stroke-width="2"/>
                                        </svg>
                                    </div>
                                    <div class="svgIconText">
                                        <p>{{thread.likes}}</p>
                                    </div>

                                    <div class="svgIcons">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="34.556" height="26.57" viewBox="0 0 34.556 26.57">
                                            <g id="Gruppe_971" data-name="Gruppe 971" transform="translate(0.5 0.5)">
                                                <path id="Vereinigungsmenge_2" data-name="Vereinigungsmenge 2" d="M1.774,25.151A1.561,1.561,0,0,1,1.7,22.945l2.251-2.413A10.763,10.763,0,0,1,0,12.486C0,5.59,7.511,0,16.778,0S33.556,5.59,33.556,12.486,26.043,24.971,16.778,24.971A20.649,20.649,0,0,1,6.509,22.361L3.98,25.073a1.56,1.56,0,0,1-2.206.077Z" transform="translate(0)" fill="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke="#707070" stroke-width="1"/>
                                                <g id="Ellipse_3" data-name="Ellipse 3" transform="translate(8.168 10.954)" fill="#fff" stroke="#fff" class="svgWhite svgWhiteStroke" stroke-width="1">
                                                    <ellipse cx="1.69" cy="1.69" rx="1.69" ry="1.69" stroke="none"/>
                                                    <ellipse cx="1.69" cy="1.69" rx="1.19" ry="1.19" fill="none"/>
                                                </g>
                                                <g id="Ellipse_4" data-name="Ellipse 4" transform="translate(14.926 10.954)" fill="#fff" stroke="#fff" class="svgWhite svgWhiteStroke" stroke-width="1">
                                                    <ellipse cx="1.69" cy="1.69" rx="1.69" ry="1.69" stroke="none"/>
                                                    <ellipse cx="1.69" cy="1.69" rx="1.19" ry="1.19" fill="none"/>
                                                </g>
                                                <g id="Ellipse_5" data-name="Ellipse 5" transform="translate(21.684 10.954)" fill="#fff" stroke="#fff" class="svgWhite svgWhiteStroke" stroke-width="1">
                                                    <ellipse cx="1.69" cy="1.69" rx="1.69" ry="1.69" stroke="none"/>
                                                    <ellipse cx="1.69" cy="1.69" rx="1.19" ry="1.19" fill="none"/>
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="svgIconText">
                                        <p>{{thread.postsMade}}</p>
                                    </div>

                                    <div class="svgIcons">
                                        <svg id="calendar" xmlns="http://www.w3.org/2000/svg" width="29" height="29" viewBox="0 0 29 29">
                                            <path id="Pfad_319" data-name="Pfad 319" d="M64.906,239.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906H64.906a.907.907,0,0,0-.906.906V238.6A.907.907,0,0,0,64.906,239.5Zm0,0" transform="translate(-60.375 -221.376)" fill="#707070" class="svgDarkGrey"/>
                                            <path id="Pfad_320" data-name="Pfad 320" d="M64.906,367.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906H64.906a.907.907,0,0,0-.906.906V366.6A.907.907,0,0,0,64.906,367.5Zm0,0" transform="translate(-60.375 -342.126)" fill="#707070" class="svgDarkGrey"/>
                                            <path id="Pfad_321" data-name="Pfad 321" d="M214.238,239.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906h-3.021a.907.907,0,0,0-.906.906V238.6A.907.907,0,0,0,214.238,239.5Zm0,0" transform="translate(-201.249 -221.376)" fill="#707070"class="svgDarkGrey"/>
                                            <path id="Pfad_322" data-name="Pfad 322" d="M214.238,367.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906h-3.021a.907.907,0,0,0-.906.906V366.6A.907.907,0,0,0,214.238,367.5Zm0,0" transform="translate(-201.249 -342.126)" fill="#707070" class="svgDarkGrey"/>
                                            <path id="Pfad_323" data-name="Pfad 323" d="M363.574,239.5H366.6a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906h-3.021a.907.907,0,0,0-.906.906V238.6A.907.907,0,0,0,363.574,239.5Zm0,0" transform="translate(-342.126 -221.376)" fill="#707070"class="svgDarkGrey"/>
                                            <path id="Pfad_324" data-name="Pfad 324" d="M25.375,3.625H24.167V1.208A1.209,1.209,0,0,0,22.958,0H21.75a1.209,1.209,0,0,0-1.208,1.208V3.625H8.458V1.208A1.209,1.209,0,0,0,7.25,0H6.042A1.209,1.209,0,0,0,4.833,1.208V3.625H3.625A3.629,3.629,0,0,0,0,7.25V25.375A3.629,3.629,0,0,0,3.625,29h21.75A3.629,3.629,0,0,0,29,25.375V7.25a3.629,3.629,0,0,0-3.625-3.625Zm1.208,21.75a1.21,1.21,0,0,1-1.208,1.208H3.625a1.21,1.21,0,0,1-1.208-1.208V12.132H26.583Zm0,0" transform="translate(0)" fill="#707070" class="svgDarkGrey"/>
                                        </svg>
                                    </div>
                                    <div class="svgIconText">
                                        <p>{{thread.created}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1 text-center">
                        <img class="forumPics" v-bind:src="thread.userPic">
                    </div>
                </router-link>
            </div>


            <!-- Kategorien zum Einordnenstart -->
            <div class="row sortCategories dropShadow pflegetipps" id="sortCategoriesFirst" @click="showTipsCategories">
                <div class="col-lg-11">
                    <div class="row">
                        <div class="svgSortCategories">
                            <svg xmlns="http://www.w3.org/2000/svg" width="37.2" height="59.672" viewBox="0 0 37.2 59.672">
                                <g id="Gruppe_974" data-name="Gruppe 974" transform="translate(-55.501 -682.877)">
                                    <path id="Pfad_501" data-name="Pfad 501" d="M26.1,42.241h-15a1.719,1.719,0,0,1-1.719-1.719,14.459,14.459,0,0,0-3.958-9.916A18.124,18.124,0,0,1,5.747,5.436,17.917,17.917,0,0,1,18.562,0H18.6A18.131,18.131,0,0,1,36.7,18.16a18.116,18.116,0,0,1-4.963,12.492,14.311,14.311,0,0,0-3.916,9.87A1.719,1.719,0,0,1,26.1,42.241Zm0,0" transform="translate(55.504 683.377)" fill="#fff" stroke="#fff" class="svgWhiteStroke svgWhiteFill" stroke-width="1"/>
                                    <path id="Pfad_502" data-name="Pfad 502" d="M96.208,389.848H81.652a1.719,1.719,0,0,1,0-3.438H96.208a1.719,1.719,0,0,1,0,3.438Zm0,0" transform="translate(-14.829 341.247)" fill="#707070" stroke="#707070" class="svgDarkGreyStroke svgDarkGreyFill" stroke-width="1"/>
                                    <path id="Pfad_503" data-name="Pfad 503" d="M96.208,437.641H81.652a1.719,1.719,0,0,1,0-3.438H96.208a1.719,1.719,0,0,1,0,3.438Zm0,0" transform="translate(-14.829 298.931)" fill="#707070" stroke="#707070" class="svgDarkGreyStroke svgDarkGreyFill" stroke-width="1"/>
                                    <path id="Pfad_504" data-name="Pfad 504" d="M114.223,485.438h-9.2a1.719,1.719,0,1,1,0-3.438h9.2a1.719,1.719,0,1,1,0,3.438Zm0,0" transform="translate(-35.523 256.612)" fill="#707070" stroke="#707070" class="svgDarkGreyStroke svgDarkGreyFill" stroke-width="1"/>
                                </g>
                            </svg>
                        </div>
                        <h3>Pflegetipps</h3>
                    </div>
                </div>
                <div class="col-lg-1 svgSortCategories text-right">
                    <svg class="arrow" id="tipsArrow" xmlns="http://www.w3.org/2000/svg" width="41" height="49" viewBox="0 0 41 49">
                        <g id="Polygon_95" data-name="Polygon 95" transform="translate(41) rotate(90)" fill="#fff" class="svgWhiteFill">
                            <path d="M 41.95000839233398 39.99999618530273 L 7.049990177154541 39.99999618530273 C 5.956009864807129 39.99999618530273 4.980579853057861 39.43193817138672 4.440720081329346 38.48043823242188 C 3.900860071182251 37.52893829345703 3.913579940795898 36.40022659301758 4.47475004196167 35.46112823486328 L 21.92476081848145 6.259088039398193 C 22.47146987915039 5.344167709350586 23.43417930603027 4.797947883605957 24.5 4.797947883605957 C 25.56582069396973 4.797947883605957 26.52853012084961 5.344167709350586 27.07525062561035 6.259088039398193 L 44.52524948120117 35.46113967895508 C 45.08641815185547 36.40022659301758 45.09914016723633 37.52893829345703 44.55928039550781 38.48043823242188 C 44.01942825317383 39.43193817138672 43.04399871826172 39.99999618530273 41.95000839233398 39.99999618530273 Z" stroke="none"/>
                            <path d="M 24.5 5.797946929931641 C 24.15880966186523 5.797946929931641 23.30853080749512 5.892868041992188 22.78317070007324 6.772037506103516 L 5.333160400390625 35.97408676147461 C 4.793918609619141 36.87648773193359 5.137660980224609 37.68236923217773 5.310470581054688 37.98695755004883 C 5.483291625976563 38.29154968261719 5.998741149902344 39 7.049991607666016 39 L 41.95000839233398 39 C 43.00125122070313 39 43.51670074462891 38.29154968261719 43.68952178955078 37.98695755004883 C 43.86233901977539 37.68236923217773 44.20608139038086 36.87649917602539 43.66683959960938 35.97408676147461 L 26.21682929992676 6.772037506103516 C 25.69146919250488 5.892868041992188 24.84119033813477 5.797946929931641 24.5 5.797946929931641 M 24.5 3.797950744628906 C 25.82877731323242 3.797950744628906 27.15755462646484 4.447341918945313 27.93366050720215 5.746128082275391 L 45.38367080688477 34.94817733764648 C 46.97689056396484 37.61438751220703 45.05598068237305 40.99999618530273 41.95000839233398 40.99999618530273 L 7.049991607666016 40.99999618530273 C 3.944019317626953 40.99999618530273 2.023101806640625 37.61438751220703 3.616329193115234 34.94817733764648 L 21.06633949279785 5.746128082275391 C 21.84244537353516 4.447341918945313 23.17122268676758 3.797950744628906 24.5 3.797950744628906 Z" stroke="none" fill="#fff"/>
                        </g>
                    </svg>
                </div>
            </div>

            <div v-if="showTipsCategoriesBool === true" class="pflanzenSubCategories container-fluid paddingNormalize">

                <!-- Threaddisplay -->
                <div v-for="thread in threads">
                    <div v-if="thread.category.title === 'Pflegetipps'">
                        <div class="row threadBackground dropShadow pflanzenSub">
                            <div class="container-fluid">

                                <router-link :to="'/forum/' + thread.id" class="row thread dropSchadow">
                                    <div class="col-lg-11">
                                        <div class="row">
                                            <h3 class="threadHeadline">{{thread.headline}}</h3>
                                        </div>

                                        <div class="row">

                                            <div class="threadCategory threadStates col-lg-2">
                                                <div class="row">
                                                    <div class="svgIconCategory col-lg-1 paddingNormalize">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="17.8" height="28.229" viewBox="0 0 17.8 28.229">
                                                            <g id="Gruppe_969" data-name="Gruppe 969" transform="translate(0.5 0.5)">
                                                                <path id="Pfad_501" data-name="Pfad 501" d="M12.379,19.6H5.415a.8.8,0,0,1-.8-.8,6.71,6.71,0,0,0-1.837-4.6A8.411,8.411,0,0,1,2.934,2.523,8.315,8.315,0,0,1,8.881,0H8.9a8.414,8.414,0,0,1,8.4,8.428,8.407,8.407,0,0,1-2.3,5.8,6.641,6.641,0,0,0-1.817,4.581.8.8,0,0,1-.8.8Zm0,0" transform="translate(-0.497 0)" fill="#97b753" class="svgDarkGreen svgDarkGreenStroke" stroke="#97b753" stroke-width="1"/>
                                                                <path id="Pfad_502" data-name="Pfad 502" d="M87.486,388.005H80.731a.8.8,0,0,1,0-1.6h6.755a.8.8,0,0,1,0,1.6Zm0,0" transform="translate(-75.708 -365.86)" fill="#707070" stroke="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke-width="1"/>
                                                                <path id="Pfad_503" data-name="Pfad 503" d="M87.486,435.8H80.731a.8.8,0,0,1,0-1.6h6.755a.8.8,0,0,1,0,1.6Zm0,0" transform="translate(-75.708 -411.111)" fill="#707070" stroke="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke-width="1"/>
                                                                <path id="Pfad_504" data-name="Pfad 504" d="M108.372,483.6H104.1a.8.8,0,0,1,0-1.6h4.269a.8.8,0,1,1,0,1.6Zm0,0" transform="translate(-97.837 -456.366)" fill="#707070" stroke="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke-width="1"/>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                    <div class="col-lg-11"><p>{{thread.category.title}}</p></div>
                                                </div>
                                            </div>

                                            <div class="threadStates col-lg-10 paddingNormalize">

                                                <div class="row">
                                                    <div class="svgIcons">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="27.681" height="24.848" viewBox="0 0 27.681 24.848">
                                                            <path id="heart" d="M23.644,2.236A6.906,6.906,0,0,0,18.508,0a6.461,6.461,0,0,0-4.035,1.393,8.256,8.256,0,0,0-1.631,1.7,8.251,8.251,0,0,0-1.632-1.7A6.46,6.46,0,0,0,7.174,0,6.906,6.906,0,0,0,2.038,2.236,8.027,8.027,0,0,0,0,7.718a9.559,9.559,0,0,0,2.547,6.257,54.314,54.314,0,0,0,6.376,5.985c.883.753,1.885,1.606,2.925,2.516a1.508,1.508,0,0,0,1.985,0c1.04-.909,2.042-1.763,2.926-2.517a54.284,54.284,0,0,0,6.376-5.984,9.558,9.558,0,0,0,2.547-6.257,8.026,8.026,0,0,0-2.037-5.482Zm0,0" transform="translate(1 1)" v-bind:fill="[thread.isLiked ? '#B8E269' : '#dedede']" class="svgHeartDarkGrey svgDarkGreyStroke" stroke="#707070" stroke-width="2"/>
                                                        </svg>
                                                    </div>
                                                    <div class="svgIconText">
                                                        <p>{{thread.likes}}</p>
                                                    </div>

                                                    <div class="svgIcons">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="34.556" height="26.57" viewBox="0 0 34.556 26.57">
                                                            <g id="Gruppe_971" data-name="Gruppe 971" transform="translate(0.5 0.5)">
                                                                <path id="Vereinigungsmenge_2" data-name="Vereinigungsmenge 2" d="M1.774,25.151A1.561,1.561,0,0,1,1.7,22.945l2.251-2.413A10.763,10.763,0,0,1,0,12.486C0,5.59,7.511,0,16.778,0S33.556,5.59,33.556,12.486,26.043,24.971,16.778,24.971A20.649,20.649,0,0,1,6.509,22.361L3.98,25.073a1.56,1.56,0,0,1-2.206.077Z" transform="translate(0)" fill="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke="#707070" stroke-width="1"/>
                                                                <g id="Ellipse_3" data-name="Ellipse 3" transform="translate(8.168 10.954)" fill="#fff" stroke="#fff" class="svgWhite svgWhiteStroke" stroke-width="1">
                                                                    <ellipse cx="1.69" cy="1.69" rx="1.69" ry="1.69" stroke="none"/>
                                                                    <ellipse cx="1.69" cy="1.69" rx="1.19" ry="1.19" fill="none"/>
                                                                </g>
                                                                <g id="Ellipse_4" data-name="Ellipse 4" transform="translate(14.926 10.954)" fill="#fff" stroke="#fff" class="svgWhite svgWhiteStroke" stroke-width="1">
                                                                    <ellipse cx="1.69" cy="1.69" rx="1.69" ry="1.69" stroke="none"/>
                                                                    <ellipse cx="1.69" cy="1.69" rx="1.19" ry="1.19" fill="none"/>
                                                                </g>
                                                                <g id="Ellipse_5" data-name="Ellipse 5" transform="translate(21.684 10.954)" fill="#fff" stroke="#fff" class="svgWhite svgWhiteStroke" stroke-width="1">
                                                                    <ellipse cx="1.69" cy="1.69" rx="1.69" ry="1.69" stroke="none"/>
                                                                    <ellipse cx="1.69" cy="1.69" rx="1.19" ry="1.19" fill="none"/>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                    <div class="svgIconText">
                                                        <p>{{thread.postsMade}}</p>
                                                    </div>

                                                    <div class="svgIcons">
                                                        <svg id="calendar" xmlns="http://www.w3.org/2000/svg" width="29" height="29" viewBox="0 0 29 29">
                                                            <path id="Pfad_319" data-name="Pfad 319" d="M64.906,239.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906H64.906a.907.907,0,0,0-.906.906V238.6A.907.907,0,0,0,64.906,239.5Zm0,0" transform="translate(-60.375 -221.376)" fill="#707070" class="svgDarkGrey"/>
                                                            <path id="Pfad_320" data-name="Pfad 320" d="M64.906,367.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906H64.906a.907.907,0,0,0-.906.906V366.6A.907.907,0,0,0,64.906,367.5Zm0,0" transform="translate(-60.375 -342.126)" fill="#707070" class="svgDarkGrey"/>
                                                            <path id="Pfad_321" data-name="Pfad 321" d="M214.238,239.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906h-3.021a.907.907,0,0,0-.906.906V238.6A.907.907,0,0,0,214.238,239.5Zm0,0" transform="translate(-201.249 -221.376)" fill="#707070"class="svgDarkGrey"/>
                                                            <path id="Pfad_322" data-name="Pfad 322" d="M214.238,367.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906h-3.021a.907.907,0,0,0-.906.906V366.6A.907.907,0,0,0,214.238,367.5Zm0,0" transform="translate(-201.249 -342.126)" fill="#707070" class="svgDarkGrey"/>
                                                            <path id="Pfad_323" data-name="Pfad 323" d="M363.574,239.5H366.6a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906h-3.021a.907.907,0,0,0-.906.906V238.6A.907.907,0,0,0,363.574,239.5Zm0,0" transform="translate(-342.126 -221.376)" fill="#707070"class="svgDarkGrey"/>
                                                            <path id="Pfad_324" data-name="Pfad 324" d="M25.375,3.625H24.167V1.208A1.209,1.209,0,0,0,22.958,0H21.75a1.209,1.209,0,0,0-1.208,1.208V3.625H8.458V1.208A1.209,1.209,0,0,0,7.25,0H6.042A1.209,1.209,0,0,0,4.833,1.208V3.625H3.625A3.629,3.629,0,0,0,0,7.25V25.375A3.629,3.629,0,0,0,3.625,29h21.75A3.629,3.629,0,0,0,29,25.375V7.25a3.629,3.629,0,0,0-3.625-3.625Zm1.208,21.75a1.21,1.21,0,0,1-1.208,1.208H3.625a1.21,1.21,0,0,1-1.208-1.208V12.132H26.583Zm0,0" transform="translate(0)" fill="#707070" class="svgDarkGrey"/>
                                                        </svg>
                                                    </div>
                                                    <div class="svgIconText">
                                                        <p>{{thread.created}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-1 text-center">
                                        <img class="forumPics" v-bind:src="thread.userPic">
                                    </div>
                                </router-link>
                            </div>

                        </div>
                    </div>
                    <div v-else>
                    </div>
                </div>
            </div>

            <div class="row sortCategories dropShadow neuigkeiten" @click="showNewsCategories">
                <div class="col-lg-11">
                    <div class="row">
                        <div class="svgSortCategories">
                            <svg xmlns="http://www.w3.org/2000/svg" width="41.642" height="49.733" viewBox="0 0 41.642 49.733">
                                <g id="Gruppe_979" data-name="Gruppe 979" transform="translate(-621.542 -1515.167)">
                                    <g id="Gruppe_950" data-name="Gruppe 950" transform="translate(622.058 1515.667)">
                                        <g id="Gruppe_121" data-name="Gruppe 121">
                                            <path id="Pfad_213" data-name="Pfad 213" d="M83.14,41.1l-3.486-5.811a17.262,17.262,0,0,1-2.461-8.882V21.32A14.232,14.232,0,0,0,67.04,7.706V4.061a4.061,4.061,0,1,0-8.122,0V7.706A14.232,14.232,0,0,0,48.765,21.32v5.091a17.273,17.273,0,0,1-2.459,8.88L42.82,41.1a1.017,1.017,0,0,0,.869,1.539h38.58A1.015,1.015,0,0,0,83.14,41.1Z" transform="translate(-42.675)" fill="#fff" stroke="#fff" class="svgWhiteFill svgWhiteStroke" stroke-width="1"/>
                                        </g>
                                    </g>
                                    <g id="Gruppe_951" data-name="Gruppe 951" transform="translate(635.968 1560.339)">
                                        <g id="Gruppe_123" data-name="Gruppe 123">
                                            <path id="Pfad_214" data-name="Pfad 214" d="M188.815,469.333a7.064,7.064,0,0,0,12.788,0Z" transform="translate(-188.815 -469.333)" fill="#707070" class="svgDarkGreyStroke svgDarkGreyFill" stroke="#707070" stroke-width="1"/>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <h3>Neuigkeiten</h3>
                    </div>
                </div>
                <div class="col-lg-1 svgSortCategories text-right">
                    <svg class="arrow" id="newsArrow" xmlns="http://www.w3.org/2000/svg" width="41" height="49" viewBox="0 0 41 49">
                        <g id="Polygon_95" data-name="Polygon 95" transform="translate(41) rotate(90)" fill="#fff" class="svgWhiteFill">
                            <path d="M 41.95000839233398 39.99999618530273 L 7.049990177154541 39.99999618530273 C 5.956009864807129 39.99999618530273 4.980579853057861 39.43193817138672 4.440720081329346 38.48043823242188 C 3.900860071182251 37.52893829345703 3.913579940795898 36.40022659301758 4.47475004196167 35.46112823486328 L 21.92476081848145 6.259088039398193 C 22.47146987915039 5.344167709350586 23.43417930603027 4.797947883605957 24.5 4.797947883605957 C 25.56582069396973 4.797947883605957 26.52853012084961 5.344167709350586 27.07525062561035 6.259088039398193 L 44.52524948120117 35.46113967895508 C 45.08641815185547 36.40022659301758 45.09914016723633 37.52893829345703 44.55928039550781 38.48043823242188 C 44.01942825317383 39.43193817138672 43.04399871826172 39.99999618530273 41.95000839233398 39.99999618530273 Z" stroke="none"/>
                            <path d="M 24.5 5.797946929931641 C 24.15880966186523 5.797946929931641 23.30853080749512 5.892868041992188 22.78317070007324 6.772037506103516 L 5.333160400390625 35.97408676147461 C 4.793918609619141 36.87648773193359 5.137660980224609 37.68236923217773 5.310470581054688 37.98695755004883 C 5.483291625976563 38.29154968261719 5.998741149902344 39 7.049991607666016 39 L 41.95000839233398 39 C 43.00125122070313 39 43.51670074462891 38.29154968261719 43.68952178955078 37.98695755004883 C 43.86233901977539 37.68236923217773 44.20608139038086 36.87649917602539 43.66683959960938 35.97408676147461 L 26.21682929992676 6.772037506103516 C 25.69146919250488 5.892868041992188 24.84119033813477 5.797946929931641 24.5 5.797946929931641 M 24.5 3.797950744628906 C 25.82877731323242 3.797950744628906 27.15755462646484 4.447341918945313 27.93366050720215 5.746128082275391 L 45.38367080688477 34.94817733764648 C 46.97689056396484 37.61438751220703 45.05598068237305 40.99999618530273 41.95000839233398 40.99999618530273 L 7.049991607666016 40.99999618530273 C 3.944019317626953 40.99999618530273 2.023101806640625 37.61438751220703 3.616329193115234 34.94817733764648 L 21.06633949279785 5.746128082275391 C 21.84244537353516 4.447341918945313 23.17122268676758 3.797950744628906 24.5 3.797950744628906 Z" stroke="none" fill="#fff" class="svgWhiteFill"/>
                        </g>
                    </svg>
                </div>
            </div>

            <div v-if="showNewsCategoriesBool === true" class="pflanzenSubCategories container-fluid paddingNormalize">

                <!-- Threaddisplay -->
                <div v-for="thread in threads">
                    <div v-if="thread.category.title === 'Neuigkeiten'">
                        <div class="row threadBackground dropShadow pflanzenSub">
                            <div class="container-fluid">
                                <router-link :to="'/forum/' + thread.id" class="row thread dropSchadow">
                                    <div class="col-lg-11">
                                        <div class="row">
                                            <h3 class="threadHeadline">{{thread.headline}}</h3>
                                        </div>

                                        <div class="row">

                                            <div class="threadCategory threadStates col-lg-2">
                                                <div class="row">
                                                    <div class="svgIconCategory col-lg-1 paddingNormalize">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="17.8" height="28.229" viewBox="0 0 17.8 28.229">
                                                            <g id="Gruppe_969" data-name="Gruppe 969" transform="translate(0.5 0.5)">
                                                                <path id="Pfad_501" data-name="Pfad 501" d="M12.379,19.6H5.415a.8.8,0,0,1-.8-.8,6.71,6.71,0,0,0-1.837-4.6A8.411,8.411,0,0,1,2.934,2.523,8.315,8.315,0,0,1,8.881,0H8.9a8.414,8.414,0,0,1,8.4,8.428,8.407,8.407,0,0,1-2.3,5.8,6.641,6.641,0,0,0-1.817,4.581.8.8,0,0,1-.8.8Zm0,0" transform="translate(-0.497 0)" fill="#97b753" class="svgDarkGreen svgDarkGreenStroke" stroke="#97b753" stroke-width="1"/>
                                                                <path id="Pfad_502" data-name="Pfad 502" d="M87.486,388.005H80.731a.8.8,0,0,1,0-1.6h6.755a.8.8,0,0,1,0,1.6Zm0,0" transform="translate(-75.708 -365.86)" fill="#707070" stroke="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke-width="1"/>
                                                                <path id="Pfad_503" data-name="Pfad 503" d="M87.486,435.8H80.731a.8.8,0,0,1,0-1.6h6.755a.8.8,0,0,1,0,1.6Zm0,0" transform="translate(-75.708 -411.111)" fill="#707070" stroke="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke-width="1"/>
                                                                <path id="Pfad_504" data-name="Pfad 504" d="M108.372,483.6H104.1a.8.8,0,0,1,0-1.6h4.269a.8.8,0,1,1,0,1.6Zm0,0" transform="translate(-97.837 -456.366)" fill="#707070" stroke="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke-width="1"/>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                    <div class="col-lg-11"><p>{{thread.category.title}}</p></div>
                                                </div>
                                            </div>

                                            <div class="threadStates col-lg-10 paddingNormalize">

                                                <div class="row">
                                                    <div class="svgIcons">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="27.681" height="24.848" viewBox="0 0 27.681 24.848">
                                                            <path id="heart" d="M23.644,2.236A6.906,6.906,0,0,0,18.508,0a6.461,6.461,0,0,0-4.035,1.393,8.256,8.256,0,0,0-1.631,1.7,8.251,8.251,0,0,0-1.632-1.7A6.46,6.46,0,0,0,7.174,0,6.906,6.906,0,0,0,2.038,2.236,8.027,8.027,0,0,0,0,7.718a9.559,9.559,0,0,0,2.547,6.257,54.314,54.314,0,0,0,6.376,5.985c.883.753,1.885,1.606,2.925,2.516a1.508,1.508,0,0,0,1.985,0c1.04-.909,2.042-1.763,2.926-2.517a54.284,54.284,0,0,0,6.376-5.984,9.558,9.558,0,0,0,2.547-6.257,8.026,8.026,0,0,0-2.037-5.482Zm0,0" transform="translate(1 1)" v-bind:fill="[thread.isLiked ? '#B8E269' : '#dedede']" class="svgHeartDarkGrey svgDarkGreyStroke" stroke="#707070" stroke-width="2"/>
                                                        </svg>
                                                    </div>
                                                    <div class="svgIconText">
                                                        <p>{{thread.likes}}</p>
                                                    </div>

                                                    <div class="svgIcons">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="34.556" height="26.57" viewBox="0 0 34.556 26.57">
                                                            <g id="Gruppe_971" data-name="Gruppe 971" transform="translate(0.5 0.5)">
                                                                <path id="Vereinigungsmenge_2" data-name="Vereinigungsmenge 2" d="M1.774,25.151A1.561,1.561,0,0,1,1.7,22.945l2.251-2.413A10.763,10.763,0,0,1,0,12.486C0,5.59,7.511,0,16.778,0S33.556,5.59,33.556,12.486,26.043,24.971,16.778,24.971A20.649,20.649,0,0,1,6.509,22.361L3.98,25.073a1.56,1.56,0,0,1-2.206.077Z" transform="translate(0)" fill="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke="#707070" stroke-width="1"/>
                                                                <g id="Ellipse_3" data-name="Ellipse 3" transform="translate(8.168 10.954)" fill="#fff" stroke="#fff" class="svgWhite svgWhiteStroke" stroke-width="1">
                                                                    <ellipse cx="1.69" cy="1.69" rx="1.69" ry="1.69" stroke="none"/>
                                                                    <ellipse cx="1.69" cy="1.69" rx="1.19" ry="1.19" fill="none"/>
                                                                </g>
                                                                <g id="Ellipse_4" data-name="Ellipse 4" transform="translate(14.926 10.954)" fill="#fff" stroke="#fff" class="svgWhite svgWhiteStroke" stroke-width="1">
                                                                    <ellipse cx="1.69" cy="1.69" rx="1.69" ry="1.69" stroke="none"/>
                                                                    <ellipse cx="1.69" cy="1.69" rx="1.19" ry="1.19" fill="none"/>
                                                                </g>
                                                                <g id="Ellipse_5" data-name="Ellipse 5" transform="translate(21.684 10.954)" fill="#fff" stroke="#fff" class="svgWhite svgWhiteStroke" stroke-width="1">
                                                                    <ellipse cx="1.69" cy="1.69" rx="1.69" ry="1.69" stroke="none"/>
                                                                    <ellipse cx="1.69" cy="1.69" rx="1.19" ry="1.19" fill="none"/>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                    <div class="svgIconText">
                                                        <p>{{thread.postsMade}}</p>
                                                    </div>

                                                    <div class="svgIcons">
                                                        <svg id="calendar" xmlns="http://www.w3.org/2000/svg" width="29" height="29" viewBox="0 0 29 29">
                                                            <path id="Pfad_319" data-name="Pfad 319" d="M64.906,239.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906H64.906a.907.907,0,0,0-.906.906V238.6A.907.907,0,0,0,64.906,239.5Zm0,0" transform="translate(-60.375 -221.376)" fill="#707070" class="svgDarkGrey"/>
                                                            <path id="Pfad_320" data-name="Pfad 320" d="M64.906,367.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906H64.906a.907.907,0,0,0-.906.906V366.6A.907.907,0,0,0,64.906,367.5Zm0,0" transform="translate(-60.375 -342.126)" fill="#707070" class="svgDarkGrey"/>
                                                            <path id="Pfad_321" data-name="Pfad 321" d="M214.238,239.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906h-3.021a.907.907,0,0,0-.906.906V238.6A.907.907,0,0,0,214.238,239.5Zm0,0" transform="translate(-201.249 -221.376)" fill="#707070"class="svgDarkGrey"/>
                                                            <path id="Pfad_322" data-name="Pfad 322" d="M214.238,367.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906h-3.021a.907.907,0,0,0-.906.906V366.6A.907.907,0,0,0,214.238,367.5Zm0,0" transform="translate(-201.249 -342.126)" fill="#707070" class="svgDarkGrey"/>
                                                            <path id="Pfad_323" data-name="Pfad 323" d="M363.574,239.5H366.6a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906h-3.021a.907.907,0,0,0-.906.906V238.6A.907.907,0,0,0,363.574,239.5Zm0,0" transform="translate(-342.126 -221.376)" fill="#707070"class="svgDarkGrey"/>
                                                            <path id="Pfad_324" data-name="Pfad 324" d="M25.375,3.625H24.167V1.208A1.209,1.209,0,0,0,22.958,0H21.75a1.209,1.209,0,0,0-1.208,1.208V3.625H8.458V1.208A1.209,1.209,0,0,0,7.25,0H6.042A1.209,1.209,0,0,0,4.833,1.208V3.625H3.625A3.629,3.629,0,0,0,0,7.25V25.375A3.629,3.629,0,0,0,3.625,29h21.75A3.629,3.629,0,0,0,29,25.375V7.25a3.629,3.629,0,0,0-3.625-3.625Zm1.208,21.75a1.21,1.21,0,0,1-1.208,1.208H3.625a1.21,1.21,0,0,1-1.208-1.208V12.132H26.583Zm0,0" transform="translate(0)" fill="#707070" class="svgDarkGrey"/>
                                                        </svg>
                                                    </div>
                                                    <div class="svgIconText">
                                                        <p>{{thread.created}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-1 text-center">
                                        <img class="forumPics" v-bind:src="thread.userPic">
                                    </div>
                                </router-link>
                            </div>

                        </div>
                    </div>
                    <div v-else>
                    </div>
                </div>
            </div>

            <div class="row sortCategories dropShadow" id="pflanzen" @click="showPlantCategories">
                <div class="col-lg-11">
                    <div class="row">
                        <div class="svgSortCategories">
                            <svg xmlns="http://www.w3.org/2000/svg" width="45.711" height="57.738" viewBox="0 0 45.711 57.738">
                                <g id="Gruppe_980" data-name="Gruppe 980" transform="translate(-112.445 -793.803)">
                                    <path id="Pfad_505" data-name="Pfad 505" d="M298.68,45.536c.25.683,3.026,8.813-2.667,18.4-3.458,5.823-8.709,6.208-9.223,6.232-.3-.418-3.265-4.768-.857-11.1C289.9,48.648,297.99,45.765,298.68,45.536Z" transform="translate(-146.494 753.993)" fill="#fff" stroke="#dedede" class="svgWhiteFill svgWhiteGreyStroke" stroke-width="1"/>
                                    <path id="Pfad_506" data-name="Pfad 506" d="M95.883,45.536c-.25.683-3.026,8.813,2.667,18.4,3.458,5.823,8.709,6.208,9.223,6.232.3-.418,3.265-4.768.857-11.1C104.665,48.648,96.573,45.765,95.883,45.536Z" transform="translate(22.532 753.993)" fill="#fff" stroke="#dedede" class="svgWhiteFill svgWhiteGreyStroke" stroke-width="1"/>
                                    <path id="Pfad_507" data-name="Pfad 507" d="M181.442,0c-.848.823-10.646,10.752-9.088,28.791.946,10.957,8.353,15.226,9.088,15.624.735-.4,8.142-4.668,9.088-15.624C192.088,10.752,182.289.823,181.442,0Z" transform="translate(-46.142 794.5)" fill="#fff" stroke="#dedede" class="svgWhiteFill svgWhiteGreyStroke" stroke-width="1"/>
                                    <path id="Pfad_508" data-name="Pfad 508" d="M276.978,151.56a35.5,35.5,0,0,0,1.22-12.226s-3.55,1.582-12.473,7.347c-6.936,4.482-9.081,12.34-9.725,14.458h8.151A13.344,13.344,0,0,0,276.978,151.56Z" transform="translate(-120.699 670.553)" fill="#fff" stroke="#dedede" class="svgWhiteFill svgWhiteGreyStroke" stroke-width="1"/>
                                    <path id="Pfad_509" data-name="Pfad 509" d="M55.39,151.56a35.5,35.5,0,0,1-1.22-12.226s3.55,1.582,12.473,7.347c6.936,4.482,9.081,12.34,9.725,14.458H68.217A13.344,13.344,0,0,1,55.39,151.56Z" transform="translate(58.932 670.553)" fill="#fff" stroke="#dedede" class="svgWhiteFill svgWhiteGreyStroke" stroke-width="1"/>
                                    <path id="Pfad_510" data-name="Pfad 510" d="M142.653,359.8H130.864a6.49,6.49,0,0,1-6.381-5.3L121.956,340.9h29.605l-2.527,13.591A6.49,6.49,0,0,1,142.653,359.8Z" transform="translate(-1.458 491.245)" fill="#707070" stroke="#707070" class="svgDarkGreyStroke svgDarkGreyFill" stroke-width="1"/>
                                    <path id="Pfad_511" data-name="Pfad 511" d="M129.811,332.343H99.174a2.248,2.248,0,0,1-2.248-2.248h0a2.248,2.248,0,0,1,2.248-2.248h30.638a2.248,2.248,0,0,1,2.248,2.248h0A2.248,2.248,0,0,1,129.811,332.343Z" transform="translate(20.808 502.857)" fill="#707070" stroke="#707070" class="svgDarkGreyStroke svgDarkGreyFill"  stroke-width="1"/>
                                </g>
                            </svg>
                        </div>

                        <h3>Pflanzen</h3>
                    </div>
                </div>
                <div class="col-lg-1 svgSortCategories text-right">
                    <svg class="arrow" id="pflanzenArrow" xmlns="http://www.w3.org/2000/svg" width="41" height="49" viewBox="0 0 41 49">
                        <g id="Polygon_95" data-name="Polygon 95" transform="translate(41) rotate(90)" fill="#fff" class="svgWhiteFill">
                            <path d="M 41.95000839233398 39.99999618530273 L 7.049990177154541 39.99999618530273 C 5.956009864807129 39.99999618530273 4.980579853057861 39.43193817138672 4.440720081329346 38.48043823242188 C 3.900860071182251 37.52893829345703 3.913579940795898 36.40022659301758 4.47475004196167 35.46112823486328 L 21.92476081848145 6.259088039398193 C 22.47146987915039 5.344167709350586 23.43417930603027 4.797947883605957 24.5 4.797947883605957 C 25.56582069396973 4.797947883605957 26.52853012084961 5.344167709350586 27.07525062561035 6.259088039398193 L 44.52524948120117 35.46113967895508 C 45.08641815185547 36.40022659301758 45.09914016723633 37.52893829345703 44.55928039550781 38.48043823242188 C 44.01942825317383 39.43193817138672 43.04399871826172 39.99999618530273 41.95000839233398 39.99999618530273 Z" stroke="none"/>
                            <path d="M 24.5 5.797946929931641 C 24.15880966186523 5.797946929931641 23.30853080749512 5.892868041992188 22.78317070007324 6.772037506103516 L 5.333160400390625 35.97408676147461 C 4.793918609619141 36.87648773193359 5.137660980224609 37.68236923217773 5.310470581054688 37.98695755004883 C 5.483291625976563 38.29154968261719 5.998741149902344 39 7.049991607666016 39 L 41.95000839233398 39 C 43.00125122070313 39 43.51670074462891 38.29154968261719 43.68952178955078 37.98695755004883 C 43.86233901977539 37.68236923217773 44.20608139038086 36.87649917602539 43.66683959960938 35.97408676147461 L 26.21682929992676 6.772037506103516 C 25.69146919250488 5.892868041992188 24.84119033813477 5.797946929931641 24.5 5.797946929931641 M 24.5 3.797950744628906 C 25.82877731323242 3.797950744628906 27.15755462646484 4.447341918945313 27.93366050720215 5.746128082275391 L 45.38367080688477 34.94817733764648 C 46.97689056396484 37.61438751220703 45.05598068237305 40.99999618530273 41.95000839233398 40.99999618530273 L 7.049991607666016 40.99999618530273 C 3.944019317626953 40.99999618530273 2.023101806640625 37.61438751220703 3.616329193115234 34.94817733764648 L 21.06633949279785 5.746128082275391 C 21.84244537353516 4.447341918945313 23.17122268676758 3.797950744628906 24.5 3.797950744628906 Z" stroke="none" fill="#fff" class="svgWhiteFill"/>
                        </g>
                    </svg>
                </div>
            </div>

            <!-- Start Subcategorydisplay !-->
            <div v-if="showPlantCategoriesBool === true" class="pflanzenSubCategories container-fluid paddingNormalize" @click="showPalmSubCategories">
                <div class="row subCategories dropShadow pflanzenSub">
                    <div class="col-lg-11">
                        <div class="row">
                            <h4 class="subCategoryHeadline">Palmen</h4>
                        </div>
                    </div>
                    <div class="col-lg-1 svgSortSubCategories text-right">
                        <svg xmlns="http://www.w3.org/2000/svg" width="41" height="49" viewBox="0 0 41 49" id="palmArrow">
                            <g id="Polygon_98" data-name="Polygon 98" transform="translate(41) rotate(90)" fill="#707070" class="svgArrowGreyFill">
                                <path d="M 41.95000839233398 39.99999618530273 L 7.049990177154541 39.99999618530273 C 5.956009864807129 39.99999618530273 4.980579853057861 39.43193817138672 4.440720081329346 38.48043823242188 C 3.900860071182251 37.52893829345703 3.913579940795898 36.40022659301758 4.47475004196167 35.46112823486328 L 21.92476081848145 6.259088039398193 C 22.47146987915039 5.344167709350586 23.43417930603027 4.797947883605957 24.5 4.797947883605957 C 25.56582069396973 4.797947883605957 26.52853012084961 5.344167709350586 27.07525062561035 6.259088039398193 L 44.52524948120117 35.46113967895508 C 45.08641815185547 36.40022659301758 45.09914016723633 37.52893829345703 44.55928039550781 38.48043823242188 C 44.01942825317383 39.43193817138672 43.04399871826172 39.99999618530273 41.95000839233398 39.99999618530273 Z" stroke="none"/>
                                <path d="M 24.5 5.797946929931641 C 24.15880966186523 5.797946929931641 23.30853080749512 5.892868041992188 22.78317070007324 6.772037506103516 L 5.333160400390625 35.97408676147461 C 4.793918609619141 36.87648773193359 5.137660980224609 37.68236923217773 5.310470581054688 37.98695755004883 C 5.483291625976563 38.29154968261719 5.998741149902344 39 7.049991607666016 39 L 41.95000839233398 39 C 43.00125122070313 39 43.51670074462891 38.29154968261719 43.68952178955078 37.98695755004883 C 43.86233901977539 37.68236923217773 44.20608139038086 36.87649917602539 43.66683959960938 35.97408676147461 L 26.21682929992676 6.772037506103516 C 25.69146919250488 5.892868041992188 24.84119033813477 5.797946929931641 24.5 5.797946929931641 M 24.5 3.797950744628906 C 25.82877731323242 3.797950744628906 27.15755462646484 4.447341918945313 27.93366050720215 5.746128082275391 L 45.38367080688477 34.94817733764648 C 46.97689056396484 37.61438751220703 45.05598068237305 40.99999618530273 41.95000839233398 40.99999618530273 L 7.049991607666016 40.99999618530273 C 3.944019317626953 40.99999618530273 2.023101806640625 37.61438751220703 3.616329193115234 34.94817733764648 L 21.06633949279785 5.746128082275391 C 21.84244537353516 4.447341918945313 23.17122268676758 3.797950744628906 24.5 3.797950744628906 Z" stroke="none" fill="#707070" class="svgArrowGreyFill"/>
                            </g>
                        </svg>
                    </div>
                </div>
                <div v-if="showPalmSubCategoryBool === true" class="pflanzenSubCategories container-fluid paddingNormalize">

                    <!-- Threaddisplay -->
                    <div v-for="thread in threads">
                        <div v-if="thread.category.title === 'Palmen'">
                            <div class="row threadBackground dropShadow pflanzenSub">
                                <div class="container-fluid">
                                    <router-link :to="'/forum/' + thread.id" class="row thread dropSchadow">
                                        <div class="col-lg-11">
                                            <div class="row">
                                                <h3 class="threadHeadline">{{thread.headline}}</h3>
                                            </div>

                                            <div class="row">

                                                <div class="threadCategory threadStates col-lg-2">
                                                    <div class="row">
                                                        <div class="svgIconCategory col-lg-1 paddingNormalize">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="17.8" height="28.229" viewBox="0 0 17.8 28.229">
                                                                <g id="Gruppe_969" data-name="Gruppe 969" transform="translate(0.5 0.5)">
                                                                    <path id="Pfad_501" data-name="Pfad 501" d="M12.379,19.6H5.415a.8.8,0,0,1-.8-.8,6.71,6.71,0,0,0-1.837-4.6A8.411,8.411,0,0,1,2.934,2.523,8.315,8.315,0,0,1,8.881,0H8.9a8.414,8.414,0,0,1,8.4,8.428,8.407,8.407,0,0,1-2.3,5.8,6.641,6.641,0,0,0-1.817,4.581.8.8,0,0,1-.8.8Zm0,0" transform="translate(-0.497 0)" fill="#97b753" class="svgDarkGreen svgDarkGreenStroke" stroke="#97b753" stroke-width="1"/>
                                                                    <path id="Pfad_502" data-name="Pfad 502" d="M87.486,388.005H80.731a.8.8,0,0,1,0-1.6h6.755a.8.8,0,0,1,0,1.6Zm0,0" transform="translate(-75.708 -365.86)" fill="#707070" stroke="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke-width="1"/>
                                                                    <path id="Pfad_503" data-name="Pfad 503" d="M87.486,435.8H80.731a.8.8,0,0,1,0-1.6h6.755a.8.8,0,0,1,0,1.6Zm0,0" transform="translate(-75.708 -411.111)" fill="#707070" stroke="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke-width="1"/>
                                                                    <path id="Pfad_504" data-name="Pfad 504" d="M108.372,483.6H104.1a.8.8,0,0,1,0-1.6h4.269a.8.8,0,1,1,0,1.6Zm0,0" transform="translate(-97.837 -456.366)" fill="#707070" stroke="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke-width="1"/>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                        <div class="col-lg-11"><p>{{thread.category.title}}</p></div>
                                                    </div>
                                                </div>
                                                <div class="threadStates col-lg-10 paddingNormalize">
                                                    <div class="row">
                                                        <div class="svgIcons">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="27.681" height="24.848" viewBox="0 0 27.681 24.848">
                                                                <path id="heart" d="M23.644,2.236A6.906,6.906,0,0,0,18.508,0a6.461,6.461,0,0,0-4.035,1.393,8.256,8.256,0,0,0-1.631,1.7,8.251,8.251,0,0,0-1.632-1.7A6.46,6.46,0,0,0,7.174,0,6.906,6.906,0,0,0,2.038,2.236,8.027,8.027,0,0,0,0,7.718a9.559,9.559,0,0,0,2.547,6.257,54.314,54.314,0,0,0,6.376,5.985c.883.753,1.885,1.606,2.925,2.516a1.508,1.508,0,0,0,1.985,0c1.04-.909,2.042-1.763,2.926-2.517a54.284,54.284,0,0,0,6.376-5.984,9.558,9.558,0,0,0,2.547-6.257,8.026,8.026,0,0,0-2.037-5.482Zm0,0" transform="translate(1 1)" v-bind:fill="[thread.isLiked ? '#B8E269' : '#dedede']" class="svgHeartDarkGrey svgDarkGreyStroke" stroke="#707070" stroke-width="2"/>
                                                            </svg>
                                                        </div>
                                                        <div class="svgIconText">
                                                            <p>{{thread.likes}}</p>
                                                        </div>
                                                        <div class="svgIcons">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="34.556" height="26.57" viewBox="0 0 34.556 26.57">
                                                                <g id="Gruppe_971" data-name="Gruppe 971" transform="translate(0.5 0.5)">
                                                                    <path id="Vereinigungsmenge_2" data-name="Vereinigungsmenge 2" d="M1.774,25.151A1.561,1.561,0,0,1,1.7,22.945l2.251-2.413A10.763,10.763,0,0,1,0,12.486C0,5.59,7.511,0,16.778,0S33.556,5.59,33.556,12.486,26.043,24.971,16.778,24.971A20.649,20.649,0,0,1,6.509,22.361L3.98,25.073a1.56,1.56,0,0,1-2.206.077Z" transform="translate(0)" fill="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke="#707070" stroke-width="1"/>
                                                                    <g id="Ellipse_3" data-name="Ellipse 3" transform="translate(8.168 10.954)" fill="#fff" stroke="#fff" class="svgWhite svgWhiteStroke" stroke-width="1">
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.69" ry="1.69" stroke="none"/>
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.19" ry="1.19" fill="none"/>
                                                                    </g>
                                                                    <g id="Ellipse_4" data-name="Ellipse 4" transform="translate(14.926 10.954)" fill="#fff" stroke="#fff" class="svgWhite svgWhiteStroke" stroke-width="1">
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.69" ry="1.69" stroke="none"/>
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.19" ry="1.19" fill="none"/>
                                                                    </g>
                                                                    <g id="Ellipse_5" data-name="Ellipse 5" transform="translate(21.684 10.954)" fill="#fff" stroke="#fff" class="svgWhite svgWhiteStroke" stroke-width="1">
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.69" ry="1.69" stroke="none"/>
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.19" ry="1.19" fill="none"/>
                                                                    </g>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                        <div class="svgIconText">
                                                            <p>{{thread.postsMade}}</p>
                                                        </div>

                                                        <div class="svgIcons">
                                                            <svg id="calendar" xmlns="http://www.w3.org/2000/svg" width="29" height="29" viewBox="0 0 29 29">
                                                                <path id="Pfad_319" data-name="Pfad 319" d="M64.906,239.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906H64.906a.907.907,0,0,0-.906.906V238.6A.907.907,0,0,0,64.906,239.5Zm0,0" transform="translate(-60.375 -221.376)" fill="#707070" class="svgDarkGrey"/>
                                                                <path id="Pfad_320" data-name="Pfad 320" d="M64.906,367.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906H64.906a.907.907,0,0,0-.906.906V366.6A.907.907,0,0,0,64.906,367.5Zm0,0" transform="translate(-60.375 -342.126)" fill="#707070" class="svgDarkGrey"/>
                                                                <path id="Pfad_321" data-name="Pfad 321" d="M214.238,239.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906h-3.021a.907.907,0,0,0-.906.906V238.6A.907.907,0,0,0,214.238,239.5Zm0,0" transform="translate(-201.249 -221.376)" fill="#707070"class="svgDarkGrey"/>
                                                                <path id="Pfad_322" data-name="Pfad 322" d="M214.238,367.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906h-3.021a.907.907,0,0,0-.906.906V366.6A.907.907,0,0,0,214.238,367.5Zm0,0" transform="translate(-201.249 -342.126)" fill="#707070" class="svgDarkGrey"/>
                                                                <path id="Pfad_323" data-name="Pfad 323" d="M363.574,239.5H366.6a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906h-3.021a.907.907,0,0,0-.906.906V238.6A.907.907,0,0,0,363.574,239.5Zm0,0" transform="translate(-342.126 -221.376)" fill="#707070"class="svgDarkGrey"/>
                                                                <path id="Pfad_324" data-name="Pfad 324" d="M25.375,3.625H24.167V1.208A1.209,1.209,0,0,0,22.958,0H21.75a1.209,1.209,0,0,0-1.208,1.208V3.625H8.458V1.208A1.209,1.209,0,0,0,7.25,0H6.042A1.209,1.209,0,0,0,4.833,1.208V3.625H3.625A3.629,3.629,0,0,0,0,7.25V25.375A3.629,3.629,0,0,0,3.625,29h21.75A3.629,3.629,0,0,0,29,25.375V7.25a3.629,3.629,0,0,0-3.625-3.625Zm1.208,21.75a1.21,1.21,0,0,1-1.208,1.208H3.625a1.21,1.21,0,0,1-1.208-1.208V12.132H26.583Zm0,0" transform="translate(0)" fill="#707070" class="svgDarkGrey"/>
                                                            </svg>
                                                        </div>
                                                        <div class="svgIconText">
                                                            <p>{{thread.created}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-1 text-center">
                                            <img class="forumPics" v-bind:src="thread.userPic">
                                        </div>
                                    </router-link>
                                </div>
                            </div>
                        </div>
                        <div v-else>
                        </div>
                    </div>
                </div>

            </div>

            <div v-if="showPlantCategoriesBool === true" class="pflanzenSubCategories container-fluid paddingNormalize" @click="showHerbalSubCategories">
                <div class="row subCategories dropShadow pflanzenSub">
                    <div class="col-lg-11">
                        <div class="row">
                            <h4 class="subCategoryHeadline">Kräuter</h4>
                        </div>
                    </div>
                    <div class="col-lg-1 svgSortSubCategories text-right">
                        <svg xmlns="http://www.w3.org/2000/svg" width="41" height="49" viewBox="0 0 41 49" id="herbalArrow">
                            <g id="Polygon_98" data-name="Polygon 98" transform="translate(41) rotate(90)" fill="#707070" class="svgArrowGreyFill">
                                <path d="M 41.95000839233398 39.99999618530273 L 7.049990177154541 39.99999618530273 C 5.956009864807129 39.99999618530273 4.980579853057861 39.43193817138672 4.440720081329346 38.48043823242188 C 3.900860071182251 37.52893829345703 3.913579940795898 36.40022659301758 4.47475004196167 35.46112823486328 L 21.92476081848145 6.259088039398193 C 22.47146987915039 5.344167709350586 23.43417930603027 4.797947883605957 24.5 4.797947883605957 C 25.56582069396973 4.797947883605957 26.52853012084961 5.344167709350586 27.07525062561035 6.259088039398193 L 44.52524948120117 35.46113967895508 C 45.08641815185547 36.40022659301758 45.09914016723633 37.52893829345703 44.55928039550781 38.48043823242188 C 44.01942825317383 39.43193817138672 43.04399871826172 39.99999618530273 41.95000839233398 39.99999618530273 Z" stroke="none"/>
                                <path d="M 24.5 5.797946929931641 C 24.15880966186523 5.797946929931641 23.30853080749512 5.892868041992188 22.78317070007324 6.772037506103516 L 5.333160400390625 35.97408676147461 C 4.793918609619141 36.87648773193359 5.137660980224609 37.68236923217773 5.310470581054688 37.98695755004883 C 5.483291625976563 38.29154968261719 5.998741149902344 39 7.049991607666016 39 L 41.95000839233398 39 C 43.00125122070313 39 43.51670074462891 38.29154968261719 43.68952178955078 37.98695755004883 C 43.86233901977539 37.68236923217773 44.20608139038086 36.87649917602539 43.66683959960938 35.97408676147461 L 26.21682929992676 6.772037506103516 C 25.69146919250488 5.892868041992188 24.84119033813477 5.797946929931641 24.5 5.797946929931641 M 24.5 3.797950744628906 C 25.82877731323242 3.797950744628906 27.15755462646484 4.447341918945313 27.93366050720215 5.746128082275391 L 45.38367080688477 34.94817733764648 C 46.97689056396484 37.61438751220703 45.05598068237305 40.99999618530273 41.95000839233398 40.99999618530273 L 7.049991607666016 40.99999618530273 C 3.944019317626953 40.99999618530273 2.023101806640625 37.61438751220703 3.616329193115234 34.94817733764648 L 21.06633949279785 5.746128082275391 C 21.84244537353516 4.447341918945313 23.17122268676758 3.797950744628906 24.5 3.797950744628906 Z" stroke="none" fill="#707070" class="svgArrowGreyFill"/>
                            </g>
                        </svg>
                    </div>
                </div>
                <div v-if="showHerbalSubCategoryBool === true" class="pflanzenSubCategories container-fluid paddingNormalize">

                    <!-- Threaddisplay -->
                    <div v-for="thread in threads">
                        <div v-if="thread.category.title === 'Kräuter'">
                            <div class="row threadBackground dropShadow pflanzenSub">
                                <div class="container-fluid">
                                    <router-link :to="'/forum/' + thread.id" class="row thread dropSchadow">
                                        <div class="col-lg-11">
                                            <div class="row">
                                                <h3 class="threadHeadline">{{thread.headline}}</h3>
                                            </div>

                                            <div class="row">

                                                <div class="threadCategory threadStates col-lg-2">
                                                    <div class="row">
                                                        <div class="svgIconCategory col-lg-1 paddingNormalize">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="17.8" height="28.229" viewBox="0 0 17.8 28.229">
                                                                <g id="Gruppe_969" data-name="Gruppe 969" transform="translate(0.5 0.5)">
                                                                    <path id="Pfad_501" data-name="Pfad 501" d="M12.379,19.6H5.415a.8.8,0,0,1-.8-.8,6.71,6.71,0,0,0-1.837-4.6A8.411,8.411,0,0,1,2.934,2.523,8.315,8.315,0,0,1,8.881,0H8.9a8.414,8.414,0,0,1,8.4,8.428,8.407,8.407,0,0,1-2.3,5.8,6.641,6.641,0,0,0-1.817,4.581.8.8,0,0,1-.8.8Zm0,0" transform="translate(-0.497 0)" fill="#97b753" class="svgDarkGreen svgDarkGreenStroke" stroke="#97b753" stroke-width="1"/>
                                                                    <path id="Pfad_502" data-name="Pfad 502" d="M87.486,388.005H80.731a.8.8,0,0,1,0-1.6h6.755a.8.8,0,0,1,0,1.6Zm0,0" transform="translate(-75.708 -365.86)" fill="#707070" stroke="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke-width="1"/>
                                                                    <path id="Pfad_503" data-name="Pfad 503" d="M87.486,435.8H80.731a.8.8,0,0,1,0-1.6h6.755a.8.8,0,0,1,0,1.6Zm0,0" transform="translate(-75.708 -411.111)" fill="#707070" stroke="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke-width="1"/>
                                                                    <path id="Pfad_504" data-name="Pfad 504" d="M108.372,483.6H104.1a.8.8,0,0,1,0-1.6h4.269a.8.8,0,1,1,0,1.6Zm0,0" transform="translate(-97.837 -456.366)" fill="#707070" stroke="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke-width="1"/>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                        <div class="col-lg-11"><p>{{thread.category.title}}</p></div>
                                                    </div>
                                                </div>
                                                <div class="threadStates col-lg-10 paddingNormalize">
                                                    <div class="row">
                                                        <div class="svgIcons">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="27.681" height="24.848" viewBox="0 0 27.681 24.848">
                                                                <path id="heart" d="M23.644,2.236A6.906,6.906,0,0,0,18.508,0a6.461,6.461,0,0,0-4.035,1.393,8.256,8.256,0,0,0-1.631,1.7,8.251,8.251,0,0,0-1.632-1.7A6.46,6.46,0,0,0,7.174,0,6.906,6.906,0,0,0,2.038,2.236,8.027,8.027,0,0,0,0,7.718a9.559,9.559,0,0,0,2.547,6.257,54.314,54.314,0,0,0,6.376,5.985c.883.753,1.885,1.606,2.925,2.516a1.508,1.508,0,0,0,1.985,0c1.04-.909,2.042-1.763,2.926-2.517a54.284,54.284,0,0,0,6.376-5.984,9.558,9.558,0,0,0,2.547-6.257,8.026,8.026,0,0,0-2.037-5.482Zm0,0" transform="translate(1 1)" v-bind:fill="[thread.isLiked ? '#B8E269' : '#dedede']" class="svgHeartDarkGrey svgDarkGreyStroke" stroke="#707070" stroke-width="2"/>
                                                            </svg>
                                                        </div>
                                                        <div class="svgIconText">
                                                            <p>{{thread.likes}}</p>
                                                        </div>
                                                        <div class="svgIcons">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="34.556" height="26.57" viewBox="0 0 34.556 26.57">
                                                                <g id="Gruppe_971" data-name="Gruppe 971" transform="translate(0.5 0.5)">
                                                                    <path id="Vereinigungsmenge_2" data-name="Vereinigungsmenge 2" d="M1.774,25.151A1.561,1.561,0,0,1,1.7,22.945l2.251-2.413A10.763,10.763,0,0,1,0,12.486C0,5.59,7.511,0,16.778,0S33.556,5.59,33.556,12.486,26.043,24.971,16.778,24.971A20.649,20.649,0,0,1,6.509,22.361L3.98,25.073a1.56,1.56,0,0,1-2.206.077Z" transform="translate(0)" fill="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke="#707070" stroke-width="1"/>
                                                                    <g id="Ellipse_3" data-name="Ellipse 3" transform="translate(8.168 10.954)" fill="#fff" stroke="#fff" class="svgWhite svgWhiteStroke" stroke-width="1">
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.69" ry="1.69" stroke="none"/>
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.19" ry="1.19" fill="none"/>
                                                                    </g>
                                                                    <g id="Ellipse_4" data-name="Ellipse 4" transform="translate(14.926 10.954)" fill="#fff" stroke="#fff" class="svgWhite svgWhiteStroke" stroke-width="1">
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.69" ry="1.69" stroke="none"/>
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.19" ry="1.19" fill="none"/>
                                                                    </g>
                                                                    <g id="Ellipse_5" data-name="Ellipse 5" transform="translate(21.684 10.954)" fill="#fff" stroke="#fff" class="svgWhite svgWhiteStroke" stroke-width="1">
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.69" ry="1.69" stroke="none"/>
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.19" ry="1.19" fill="none"/>
                                                                    </g>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                        <div class="svgIconText">
                                                            <p>{{thread.postsMade}}</p>
                                                        </div>

                                                        <div class="svgIcons">
                                                            <svg id="calendar" xmlns="http://www.w3.org/2000/svg" width="29" height="29" viewBox="0 0 29 29">
                                                                <path id="Pfad_319" data-name="Pfad 319" d="M64.906,239.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906H64.906a.907.907,0,0,0-.906.906V238.6A.907.907,0,0,0,64.906,239.5Zm0,0" transform="translate(-60.375 -221.376)" fill="#707070" class="svgDarkGrey"/>
                                                                <path id="Pfad_320" data-name="Pfad 320" d="M64.906,367.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906H64.906a.907.907,0,0,0-.906.906V366.6A.907.907,0,0,0,64.906,367.5Zm0,0" transform="translate(-60.375 -342.126)" fill="#707070" class="svgDarkGrey"/>
                                                                <path id="Pfad_321" data-name="Pfad 321" d="M214.238,239.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906h-3.021a.907.907,0,0,0-.906.906V238.6A.907.907,0,0,0,214.238,239.5Zm0,0" transform="translate(-201.249 -221.376)" fill="#707070"class="svgDarkGrey"/>
                                                                <path id="Pfad_322" data-name="Pfad 322" d="M214.238,367.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906h-3.021a.907.907,0,0,0-.906.906V366.6A.907.907,0,0,0,214.238,367.5Zm0,0" transform="translate(-201.249 -342.126)" fill="#707070" class="svgDarkGrey"/>
                                                                <path id="Pfad_323" data-name="Pfad 323" d="M363.574,239.5H366.6a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906h-3.021a.907.907,0,0,0-.906.906V238.6A.907.907,0,0,0,363.574,239.5Zm0,0" transform="translate(-342.126 -221.376)" fill="#707070"class="svgDarkGrey"/>
                                                                <path id="Pfad_324" data-name="Pfad 324" d="M25.375,3.625H24.167V1.208A1.209,1.209,0,0,0,22.958,0H21.75a1.209,1.209,0,0,0-1.208,1.208V3.625H8.458V1.208A1.209,1.209,0,0,0,7.25,0H6.042A1.209,1.209,0,0,0,4.833,1.208V3.625H3.625A3.629,3.629,0,0,0,0,7.25V25.375A3.629,3.629,0,0,0,3.625,29h21.75A3.629,3.629,0,0,0,29,25.375V7.25a3.629,3.629,0,0,0-3.625-3.625Zm1.208,21.75a1.21,1.21,0,0,1-1.208,1.208H3.625a1.21,1.21,0,0,1-1.208-1.208V12.132H26.583Zm0,0" transform="translate(0)" fill="#707070" class="svgDarkGrey"/>
                                                            </svg>
                                                        </div>
                                                        <div class="svgIconText">
                                                            <p>{{thread.created}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-1 text-center">
                                            <img class="forumPics" v-bind:src="thread.userPic">
                                        </div>
                                    </router-link>
                                </div>
                            </div>
                        </div>
                        <div v-else>
                        </div>
                    </div>
                </div>

            </div>

            <div v-if="showPlantCategoriesBool === true" class="pflanzenSubCategories container-fluid paddingNormalize" @click="showVineSubCategories">
                <div class="row subCategories dropShadow pflanzenSub">
                    <div class="col-lg-11">
                        <div class="row">
                            <h4 class="subCategoryHeadline">Kletterpflanzen</h4>
                        </div>
                    </div>
                    <div class="col-lg-1 svgSortSubCategories text-right">
                        <svg xmlns="http://www.w3.org/2000/svg" width="41" height="49" viewBox="0 0 41 49" id="vineArrow">
                            <g id="Polygon_98" data-name="Polygon 98" transform="translate(41) rotate(90)" fill="#707070" class="svgArrowGreyFill">
                                <path d="M 41.95000839233398 39.99999618530273 L 7.049990177154541 39.99999618530273 C 5.956009864807129 39.99999618530273 4.980579853057861 39.43193817138672 4.440720081329346 38.48043823242188 C 3.900860071182251 37.52893829345703 3.913579940795898 36.40022659301758 4.47475004196167 35.46112823486328 L 21.92476081848145 6.259088039398193 C 22.47146987915039 5.344167709350586 23.43417930603027 4.797947883605957 24.5 4.797947883605957 C 25.56582069396973 4.797947883605957 26.52853012084961 5.344167709350586 27.07525062561035 6.259088039398193 L 44.52524948120117 35.46113967895508 C 45.08641815185547 36.40022659301758 45.09914016723633 37.52893829345703 44.55928039550781 38.48043823242188 C 44.01942825317383 39.43193817138672 43.04399871826172 39.99999618530273 41.95000839233398 39.99999618530273 Z" stroke="none"/>
                                <path d="M 24.5 5.797946929931641 C 24.15880966186523 5.797946929931641 23.30853080749512 5.892868041992188 22.78317070007324 6.772037506103516 L 5.333160400390625 35.97408676147461 C 4.793918609619141 36.87648773193359 5.137660980224609 37.68236923217773 5.310470581054688 37.98695755004883 C 5.483291625976563 38.29154968261719 5.998741149902344 39 7.049991607666016 39 L 41.95000839233398 39 C 43.00125122070313 39 43.51670074462891 38.29154968261719 43.68952178955078 37.98695755004883 C 43.86233901977539 37.68236923217773 44.20608139038086 36.87649917602539 43.66683959960938 35.97408676147461 L 26.21682929992676 6.772037506103516 C 25.69146919250488 5.892868041992188 24.84119033813477 5.797946929931641 24.5 5.797946929931641 M 24.5 3.797950744628906 C 25.82877731323242 3.797950744628906 27.15755462646484 4.447341918945313 27.93366050720215 5.746128082275391 L 45.38367080688477 34.94817733764648 C 46.97689056396484 37.61438751220703 45.05598068237305 40.99999618530273 41.95000839233398 40.99999618530273 L 7.049991607666016 40.99999618530273 C 3.944019317626953 40.99999618530273 2.023101806640625 37.61438751220703 3.616329193115234 34.94817733764648 L 21.06633949279785 5.746128082275391 C 21.84244537353516 4.447341918945313 23.17122268676758 3.797950744628906 24.5 3.797950744628906 Z" stroke="none" fill="#707070" class="svgArrowGreyFill"/>
                            </g>
                        </svg>
                    </div>
                </div>
                <div v-if="showVineSubCategoryBool === true" class="pflanzenSubCategories container-fluid paddingNormalize">

                    <!-- Threaddisplay -->
                    <div v-for="thread in threads">
                        <div v-if="thread.category.title === 'Kletterpflanzen'">
                            <div class="row threadBackground dropShadow pflanzenSub">
                                <div class="container-fluid">
                                    <router-link :to="'/forum/' + thread.id" class="row thread dropSchadow">
                                        <div class="col-lg-11">
                                            <div class="row">
                                                <h3 class="threadHeadline">{{thread.headline}}</h3>
                                            </div>

                                            <div class="row">

                                                <div class="threadCategory threadStates col-lg-2">
                                                    <div class="row">
                                                        <div class="svgIconCategory col-lg-1 paddingNormalize">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="17.8" height="28.229" viewBox="0 0 17.8 28.229">
                                                                <g id="Gruppe_969" data-name="Gruppe 969" transform="translate(0.5 0.5)">
                                                                    <path id="Pfad_501" data-name="Pfad 501" d="M12.379,19.6H5.415a.8.8,0,0,1-.8-.8,6.71,6.71,0,0,0-1.837-4.6A8.411,8.411,0,0,1,2.934,2.523,8.315,8.315,0,0,1,8.881,0H8.9a8.414,8.414,0,0,1,8.4,8.428,8.407,8.407,0,0,1-2.3,5.8,6.641,6.641,0,0,0-1.817,4.581.8.8,0,0,1-.8.8Zm0,0" transform="translate(-0.497 0)" fill="#97b753" class="svgDarkGreen svgDarkGreenStroke" stroke="#97b753" stroke-width="1"/>
                                                                    <path id="Pfad_502" data-name="Pfad 502" d="M87.486,388.005H80.731a.8.8,0,0,1,0-1.6h6.755a.8.8,0,0,1,0,1.6Zm0,0" transform="translate(-75.708 -365.86)" fill="#707070" stroke="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke-width="1"/>
                                                                    <path id="Pfad_503" data-name="Pfad 503" d="M87.486,435.8H80.731a.8.8,0,0,1,0-1.6h6.755a.8.8,0,0,1,0,1.6Zm0,0" transform="translate(-75.708 -411.111)" fill="#707070" stroke="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke-width="1"/>
                                                                    <path id="Pfad_504" data-name="Pfad 504" d="M108.372,483.6H104.1a.8.8,0,0,1,0-1.6h4.269a.8.8,0,1,1,0,1.6Zm0,0" transform="translate(-97.837 -456.366)" fill="#707070" stroke="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke-width="1"/>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                        <div class="col-lg-11"><p>{{thread.category.title}}</p></div>
                                                    </div>
                                                </div>
                                                <div class="threadStates col-lg-10 paddingNormalize">
                                                    <div class="row">
                                                        <div class="svgIcons">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="27.681" height="24.848" viewBox="0 0 27.681 24.848">
                                                                <path id="heart" d="M23.644,2.236A6.906,6.906,0,0,0,18.508,0a6.461,6.461,0,0,0-4.035,1.393,8.256,8.256,0,0,0-1.631,1.7,8.251,8.251,0,0,0-1.632-1.7A6.46,6.46,0,0,0,7.174,0,6.906,6.906,0,0,0,2.038,2.236,8.027,8.027,0,0,0,0,7.718a9.559,9.559,0,0,0,2.547,6.257,54.314,54.314,0,0,0,6.376,5.985c.883.753,1.885,1.606,2.925,2.516a1.508,1.508,0,0,0,1.985,0c1.04-.909,2.042-1.763,2.926-2.517a54.284,54.284,0,0,0,6.376-5.984,9.558,9.558,0,0,0,2.547-6.257,8.026,8.026,0,0,0-2.037-5.482Zm0,0" transform="translate(1 1)" v-bind:fill="[thread.isLiked ? '#B8E269' : '#dedede']" class="svgHeartDarkGrey svgDarkGreyStroke" stroke="#707070" stroke-width="2"/>
                                                            </svg>
                                                        </div>
                                                        <div class="svgIconText">
                                                            <p>{{thread.likes}}</p>
                                                        </div>
                                                        <div class="svgIcons">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="34.556" height="26.57" viewBox="0 0 34.556 26.57">
                                                                <g id="Gruppe_971" data-name="Gruppe 971" transform="translate(0.5 0.5)">
                                                                    <path id="Vereinigungsmenge_2" data-name="Vereinigungsmenge 2" d="M1.774,25.151A1.561,1.561,0,0,1,1.7,22.945l2.251-2.413A10.763,10.763,0,0,1,0,12.486C0,5.59,7.511,0,16.778,0S33.556,5.59,33.556,12.486,26.043,24.971,16.778,24.971A20.649,20.649,0,0,1,6.509,22.361L3.98,25.073a1.56,1.56,0,0,1-2.206.077Z" transform="translate(0)" fill="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke="#707070" stroke-width="1"/>
                                                                    <g id="Ellipse_3" data-name="Ellipse 3" transform="translate(8.168 10.954)" fill="#fff" stroke="#fff" class="svgWhite svgWhiteStroke" stroke-width="1">
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.69" ry="1.69" stroke="none"/>
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.19" ry="1.19" fill="none"/>
                                                                    </g>
                                                                    <g id="Ellipse_4" data-name="Ellipse 4" transform="translate(14.926 10.954)" fill="#fff" stroke="#fff" class="svgWhite svgWhiteStroke" stroke-width="1">
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.69" ry="1.69" stroke="none"/>
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.19" ry="1.19" fill="none"/>
                                                                    </g>
                                                                    <g id="Ellipse_5" data-name="Ellipse 5" transform="translate(21.684 10.954)" fill="#fff" stroke="#fff" class="svgWhite svgWhiteStroke" stroke-width="1">
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.69" ry="1.69" stroke="none"/>
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.19" ry="1.19" fill="none"/>
                                                                    </g>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                        <div class="svgIconText">
                                                            <p>{{thread.postsMade}}</p>
                                                        </div>

                                                        <div class="svgIcons">
                                                            <svg id="calendar" xmlns="http://www.w3.org/2000/svg" width="29" height="29" viewBox="0 0 29 29">
                                                                <path id="Pfad_319" data-name="Pfad 319" d="M64.906,239.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906H64.906a.907.907,0,0,0-.906.906V238.6A.907.907,0,0,0,64.906,239.5Zm0,0" transform="translate(-60.375 -221.376)" fill="#707070" class="svgDarkGrey"/>
                                                                <path id="Pfad_320" data-name="Pfad 320" d="M64.906,367.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906H64.906a.907.907,0,0,0-.906.906V366.6A.907.907,0,0,0,64.906,367.5Zm0,0" transform="translate(-60.375 -342.126)" fill="#707070" class="svgDarkGrey"/>
                                                                <path id="Pfad_321" data-name="Pfad 321" d="M214.238,239.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906h-3.021a.907.907,0,0,0-.906.906V238.6A.907.907,0,0,0,214.238,239.5Zm0,0" transform="translate(-201.249 -221.376)" fill="#707070"class="svgDarkGrey"/>
                                                                <path id="Pfad_322" data-name="Pfad 322" d="M214.238,367.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906h-3.021a.907.907,0,0,0-.906.906V366.6A.907.907,0,0,0,214.238,367.5Zm0,0" transform="translate(-201.249 -342.126)" fill="#707070" class="svgDarkGrey"/>
                                                                <path id="Pfad_323" data-name="Pfad 323" d="M363.574,239.5H366.6a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906h-3.021a.907.907,0,0,0-.906.906V238.6A.907.907,0,0,0,363.574,239.5Zm0,0" transform="translate(-342.126 -221.376)" fill="#707070"class="svgDarkGrey"/>
                                                                <path id="Pfad_324" data-name="Pfad 324" d="M25.375,3.625H24.167V1.208A1.209,1.209,0,0,0,22.958,0H21.75a1.209,1.209,0,0,0-1.208,1.208V3.625H8.458V1.208A1.209,1.209,0,0,0,7.25,0H6.042A1.209,1.209,0,0,0,4.833,1.208V3.625H3.625A3.629,3.629,0,0,0,0,7.25V25.375A3.629,3.629,0,0,0,3.625,29h21.75A3.629,3.629,0,0,0,29,25.375V7.25a3.629,3.629,0,0,0-3.625-3.625Zm1.208,21.75a1.21,1.21,0,0,1-1.208,1.208H3.625a1.21,1.21,0,0,1-1.208-1.208V12.132H26.583Zm0,0" transform="translate(0)" fill="#707070" class="svgDarkGrey"/>
                                                            </svg>
                                                        </div>
                                                        <div class="svgIconText">
                                                            <p>{{thread.created}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-1 text-center">
                                            <img class="forumPics" v-bind:src="thread.userPic">
                                        </div>
                                    </router-link>
                                </div>
                            </div>
                        </div>
                        <div v-else>
                        </div>
                    </div>
                </div>

            </div>

            <div v-if="showPlantCategoriesBool === true" class="pflanzenSubCategories container-fluid paddingNormalize" @click="showBreedSubCategories">
                <div class="row subCategories dropShadow pflanzenSub">
                    <div class="col-lg-11">
                        <div class="row">
                            <h4 class="subCategoryHeadline">Zuchtpflanzen</h4>
                        </div>
                    </div>
                    <div class="col-lg-1 svgSortSubCategories text-right">
                        <svg xmlns="http://www.w3.org/2000/svg" width="41" height="49" viewBox="0 0 41 49" id="breedArrow">
                            <g id="Polygon_98" data-name="Polygon 98" transform="translate(41) rotate(90)" fill="#707070" class="svgArrowGreyFill">
                                <path d="M 41.95000839233398 39.99999618530273 L 7.049990177154541 39.99999618530273 C 5.956009864807129 39.99999618530273 4.980579853057861 39.43193817138672 4.440720081329346 38.48043823242188 C 3.900860071182251 37.52893829345703 3.913579940795898 36.40022659301758 4.47475004196167 35.46112823486328 L 21.92476081848145 6.259088039398193 C 22.47146987915039 5.344167709350586 23.43417930603027 4.797947883605957 24.5 4.797947883605957 C 25.56582069396973 4.797947883605957 26.52853012084961 5.344167709350586 27.07525062561035 6.259088039398193 L 44.52524948120117 35.46113967895508 C 45.08641815185547 36.40022659301758 45.09914016723633 37.52893829345703 44.55928039550781 38.48043823242188 C 44.01942825317383 39.43193817138672 43.04399871826172 39.99999618530273 41.95000839233398 39.99999618530273 Z" stroke="none"/>
                                <path d="M 24.5 5.797946929931641 C 24.15880966186523 5.797946929931641 23.30853080749512 5.892868041992188 22.78317070007324 6.772037506103516 L 5.333160400390625 35.97408676147461 C 4.793918609619141 36.87648773193359 5.137660980224609 37.68236923217773 5.310470581054688 37.98695755004883 C 5.483291625976563 38.29154968261719 5.998741149902344 39 7.049991607666016 39 L 41.95000839233398 39 C 43.00125122070313 39 43.51670074462891 38.29154968261719 43.68952178955078 37.98695755004883 C 43.86233901977539 37.68236923217773 44.20608139038086 36.87649917602539 43.66683959960938 35.97408676147461 L 26.21682929992676 6.772037506103516 C 25.69146919250488 5.892868041992188 24.84119033813477 5.797946929931641 24.5 5.797946929931641 M 24.5 3.797950744628906 C 25.82877731323242 3.797950744628906 27.15755462646484 4.447341918945313 27.93366050720215 5.746128082275391 L 45.38367080688477 34.94817733764648 C 46.97689056396484 37.61438751220703 45.05598068237305 40.99999618530273 41.95000839233398 40.99999618530273 L 7.049991607666016 40.99999618530273 C 3.944019317626953 40.99999618530273 2.023101806640625 37.61438751220703 3.616329193115234 34.94817733764648 L 21.06633949279785 5.746128082275391 C 21.84244537353516 4.447341918945313 23.17122268676758 3.797950744628906 24.5 3.797950744628906 Z" stroke="none" fill="#707070" class="svgArrowGreyFill"/>
                            </g>
                        </svg>
                    </div>
                </div>
                <div v-if="showBreedSubCategoryBool === true" class="pflanzenSubCategories container-fluid paddingNormalize">

                    <!-- Threaddisplay -->
                    <div v-for="thread in threads">
                        <div v-if="thread.category.title === 'Zuchtpflanzen'">
                            <div class="row threadBackground dropShadow pflanzenSub">
                                <div class="container-fluid">
                                    <router-link :to="'/forum/' + thread.id" class="row thread dropSchadow">
                                        <div class="col-lg-11">
                                            <div class="row">
                                                <h3 class="threadHeadline">{{thread.headline}}</h3>
                                            </div>

                                            <div class="row">

                                                <div class="threadCategory threadStates col-lg-2">
                                                    <div class="row">
                                                        <div class="svgIconCategory col-lg-1 paddingNormalize">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="17.8" height="28.229" viewBox="0 0 17.8 28.229">
                                                                <g id="Gruppe_969" data-name="Gruppe 969" transform="translate(0.5 0.5)">
                                                                    <path id="Pfad_501" data-name="Pfad 501" d="M12.379,19.6H5.415a.8.8,0,0,1-.8-.8,6.71,6.71,0,0,0-1.837-4.6A8.411,8.411,0,0,1,2.934,2.523,8.315,8.315,0,0,1,8.881,0H8.9a8.414,8.414,0,0,1,8.4,8.428,8.407,8.407,0,0,1-2.3,5.8,6.641,6.641,0,0,0-1.817,4.581.8.8,0,0,1-.8.8Zm0,0" transform="translate(-0.497 0)" fill="#97b753" class="svgDarkGreen svgDarkGreenStroke" stroke="#97b753" stroke-width="1"/>
                                                                    <path id="Pfad_502" data-name="Pfad 502" d="M87.486,388.005H80.731a.8.8,0,0,1,0-1.6h6.755a.8.8,0,0,1,0,1.6Zm0,0" transform="translate(-75.708 -365.86)" fill="#707070" stroke="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke-width="1"/>
                                                                    <path id="Pfad_503" data-name="Pfad 503" d="M87.486,435.8H80.731a.8.8,0,0,1,0-1.6h6.755a.8.8,0,0,1,0,1.6Zm0,0" transform="translate(-75.708 -411.111)" fill="#707070" stroke="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke-width="1"/>
                                                                    <path id="Pfad_504" data-name="Pfad 504" d="M108.372,483.6H104.1a.8.8,0,0,1,0-1.6h4.269a.8.8,0,1,1,0,1.6Zm0,0" transform="translate(-97.837 -456.366)" fill="#707070" stroke="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke-width="1"/>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                        <div class="col-lg-11"><p>{{thread.category.title}}</p></div>
                                                    </div>
                                                </div>
                                                <div class="threadStates col-lg-10 paddingNormalize">
                                                    <div class="row">
                                                        <div class="svgIcons">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="27.681" height="24.848" viewBox="0 0 27.681 24.848">
                                                                <path id="heart" d="M23.644,2.236A6.906,6.906,0,0,0,18.508,0a6.461,6.461,0,0,0-4.035,1.393,8.256,8.256,0,0,0-1.631,1.7,8.251,8.251,0,0,0-1.632-1.7A6.46,6.46,0,0,0,7.174,0,6.906,6.906,0,0,0,2.038,2.236,8.027,8.027,0,0,0,0,7.718a9.559,9.559,0,0,0,2.547,6.257,54.314,54.314,0,0,0,6.376,5.985c.883.753,1.885,1.606,2.925,2.516a1.508,1.508,0,0,0,1.985,0c1.04-.909,2.042-1.763,2.926-2.517a54.284,54.284,0,0,0,6.376-5.984,9.558,9.558,0,0,0,2.547-6.257,8.026,8.026,0,0,0-2.037-5.482Zm0,0" transform="translate(1 1)" v-bind:fill="[thread.isLiked ? '#B8E269' : '#dedede']" class="svgHeartDarkGrey svgDarkGreyStroke" stroke="#707070" stroke-width="2"/>
                                                            </svg>
                                                        </div>
                                                        <div class="svgIconText">
                                                            <p>{{thread.likes}}</p>
                                                        </div>
                                                        <div class="svgIcons">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="34.556" height="26.57" viewBox="0 0 34.556 26.57">
                                                                <g id="Gruppe_971" data-name="Gruppe 971" transform="translate(0.5 0.5)">
                                                                    <path id="Vereinigungsmenge_2" data-name="Vereinigungsmenge 2" d="M1.774,25.151A1.561,1.561,0,0,1,1.7,22.945l2.251-2.413A10.763,10.763,0,0,1,0,12.486C0,5.59,7.511,0,16.778,0S33.556,5.59,33.556,12.486,26.043,24.971,16.778,24.971A20.649,20.649,0,0,1,6.509,22.361L3.98,25.073a1.56,1.56,0,0,1-2.206.077Z" transform="translate(0)" fill="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke="#707070" stroke-width="1"/>
                                                                    <g id="Ellipse_3" data-name="Ellipse 3" transform="translate(8.168 10.954)" fill="#fff" stroke="#fff" class="svgWhite svgWhiteStroke" stroke-width="1">
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.69" ry="1.69" stroke="none"/>
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.19" ry="1.19" fill="none"/>
                                                                    </g>
                                                                    <g id="Ellipse_4" data-name="Ellipse 4" transform="translate(14.926 10.954)" fill="#fff" stroke="#fff" class="svgWhite svgWhiteStroke" stroke-width="1">
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.69" ry="1.69" stroke="none"/>
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.19" ry="1.19" fill="none"/>
                                                                    </g>
                                                                    <g id="Ellipse_5" data-name="Ellipse 5" transform="translate(21.684 10.954)" fill="#fff" stroke="#fff" class="svgWhite svgWhiteStroke" stroke-width="1">
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.69" ry="1.69" stroke="none"/>
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.19" ry="1.19" fill="none"/>
                                                                    </g>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                        <div class="svgIconText">
                                                            <p>{{thread.postsMade}}</p>
                                                        </div>

                                                        <div class="svgIcons">
                                                            <svg id="calendar" xmlns="http://www.w3.org/2000/svg" width="29" height="29" viewBox="0 0 29 29">
                                                                <path id="Pfad_319" data-name="Pfad 319" d="M64.906,239.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906H64.906a.907.907,0,0,0-.906.906V238.6A.907.907,0,0,0,64.906,239.5Zm0,0" transform="translate(-60.375 -221.376)" fill="#707070" class="svgDarkGrey"/>
                                                                <path id="Pfad_320" data-name="Pfad 320" d="M64.906,367.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906H64.906a.907.907,0,0,0-.906.906V366.6A.907.907,0,0,0,64.906,367.5Zm0,0" transform="translate(-60.375 -342.126)" fill="#707070" class="svgDarkGrey"/>
                                                                <path id="Pfad_321" data-name="Pfad 321" d="M214.238,239.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906h-3.021a.907.907,0,0,0-.906.906V238.6A.907.907,0,0,0,214.238,239.5Zm0,0" transform="translate(-201.249 -221.376)" fill="#707070"class="svgDarkGrey"/>
                                                                <path id="Pfad_322" data-name="Pfad 322" d="M214.238,367.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906h-3.021a.907.907,0,0,0-.906.906V366.6A.907.907,0,0,0,214.238,367.5Zm0,0" transform="translate(-201.249 -342.126)" fill="#707070" class="svgDarkGrey"/>
                                                                <path id="Pfad_323" data-name="Pfad 323" d="M363.574,239.5H366.6a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906h-3.021a.907.907,0,0,0-.906.906V238.6A.907.907,0,0,0,363.574,239.5Zm0,0" transform="translate(-342.126 -221.376)" fill="#707070"class="svgDarkGrey"/>
                                                                <path id="Pfad_324" data-name="Pfad 324" d="M25.375,3.625H24.167V1.208A1.209,1.209,0,0,0,22.958,0H21.75a1.209,1.209,0,0,0-1.208,1.208V3.625H8.458V1.208A1.209,1.209,0,0,0,7.25,0H6.042A1.209,1.209,0,0,0,4.833,1.208V3.625H3.625A3.629,3.629,0,0,0,0,7.25V25.375A3.629,3.629,0,0,0,3.625,29h21.75A3.629,3.629,0,0,0,29,25.375V7.25a3.629,3.629,0,0,0-3.625-3.625Zm1.208,21.75a1.21,1.21,0,0,1-1.208,1.208H3.625a1.21,1.21,0,0,1-1.208-1.208V12.132H26.583Zm0,0" transform="translate(0)" fill="#707070" class="svgDarkGrey"/>
                                                            </svg>
                                                        </div>
                                                        <div class="svgIconText">
                                                            <p>{{thread.created}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-1 text-center">
                                            <img class="forumPics" v-bind:src="thread.userPic">
                                        </div>
                                    </router-link>
                                </div>
                            </div>
                        </div>
                        <div v-else>
                        </div>
                    </div>
                </div>

            </div>

            <div v-if="showPlantCategoriesBool === true" class="pflanzenSubCategories container-fluid paddingNormalize" @click="showWildSubCategories">
                <div class="row subCategories dropShadow pflanzenSub">
                    <div class="col-lg-11">
                        <div class="row">
                            <h4 class="subCategoryHeadline">Wildpflanzen</h4>
                        </div>
                    </div>
                    <div class="col-lg-1 svgSortSubCategories text-right">
                        <svg xmlns="http://www.w3.org/2000/svg" width="41" height="49" viewBox="0 0 41 49" id="wildArrow">
                            <g id="Polygon_98" data-name="Polygon 98" transform="translate(41) rotate(90)" fill="#707070" class="svgArrowGreyFill">
                                <path d="M 41.95000839233398 39.99999618530273 L 7.049990177154541 39.99999618530273 C 5.956009864807129 39.99999618530273 4.980579853057861 39.43193817138672 4.440720081329346 38.48043823242188 C 3.900860071182251 37.52893829345703 3.913579940795898 36.40022659301758 4.47475004196167 35.46112823486328 L 21.92476081848145 6.259088039398193 C 22.47146987915039 5.344167709350586 23.43417930603027 4.797947883605957 24.5 4.797947883605957 C 25.56582069396973 4.797947883605957 26.52853012084961 5.344167709350586 27.07525062561035 6.259088039398193 L 44.52524948120117 35.46113967895508 C 45.08641815185547 36.40022659301758 45.09914016723633 37.52893829345703 44.55928039550781 38.48043823242188 C 44.01942825317383 39.43193817138672 43.04399871826172 39.99999618530273 41.95000839233398 39.99999618530273 Z" stroke="none"/>
                                <path d="M 24.5 5.797946929931641 C 24.15880966186523 5.797946929931641 23.30853080749512 5.892868041992188 22.78317070007324 6.772037506103516 L 5.333160400390625 35.97408676147461 C 4.793918609619141 36.87648773193359 5.137660980224609 37.68236923217773 5.310470581054688 37.98695755004883 C 5.483291625976563 38.29154968261719 5.998741149902344 39 7.049991607666016 39 L 41.95000839233398 39 C 43.00125122070313 39 43.51670074462891 38.29154968261719 43.68952178955078 37.98695755004883 C 43.86233901977539 37.68236923217773 44.20608139038086 36.87649917602539 43.66683959960938 35.97408676147461 L 26.21682929992676 6.772037506103516 C 25.69146919250488 5.892868041992188 24.84119033813477 5.797946929931641 24.5 5.797946929931641 M 24.5 3.797950744628906 C 25.82877731323242 3.797950744628906 27.15755462646484 4.447341918945313 27.93366050720215 5.746128082275391 L 45.38367080688477 34.94817733764648 C 46.97689056396484 37.61438751220703 45.05598068237305 40.99999618530273 41.95000839233398 40.99999618530273 L 7.049991607666016 40.99999618530273 C 3.944019317626953 40.99999618530273 2.023101806640625 37.61438751220703 3.616329193115234 34.94817733764648 L 21.06633949279785 5.746128082275391 C 21.84244537353516 4.447341918945313 23.17122268676758 3.797950744628906 24.5 3.797950744628906 Z" stroke="none" fill="#707070" class="svgArrowGreyFill"/>
                            </g>
                        </svg>
                    </div>
                </div>
                <div v-if="showWildSubCategoryBool === true" class="pflanzenSubCategories container-fluid paddingNormalize">

                    <!-- Threaddisplay -->
                    <div v-for="thread in threads">
                        <div v-if="thread.category.title === 'Wildpflanzen'">
                            <div class="row threadBackground dropShadow pflanzenSub">
                                <div class="container-fluid">
                                    <router-link :to="'/forum/' + thread.id" class="row thread dropSchadow">
                                        <div class="col-lg-11">
                                            <div class="row">
                                                <h3 class="threadHeadline">{{thread.headline}}</h3>
                                            </div>

                                            <div class="row">

                                                <div class="threadCategory threadStates col-lg-2">
                                                    <div class="row">
                                                        <div class="svgIconCategory col-lg-1 paddingNormalize">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="17.8" height="28.229" viewBox="0 0 17.8 28.229">
                                                                <g id="Gruppe_969" data-name="Gruppe 969" transform="translate(0.5 0.5)">
                                                                    <path id="Pfad_501" data-name="Pfad 501" d="M12.379,19.6H5.415a.8.8,0,0,1-.8-.8,6.71,6.71,0,0,0-1.837-4.6A8.411,8.411,0,0,1,2.934,2.523,8.315,8.315,0,0,1,8.881,0H8.9a8.414,8.414,0,0,1,8.4,8.428,8.407,8.407,0,0,1-2.3,5.8,6.641,6.641,0,0,0-1.817,4.581.8.8,0,0,1-.8.8Zm0,0" transform="translate(-0.497 0)" fill="#97b753" class="svgDarkGreen svgDarkGreenStroke" stroke="#97b753" stroke-width="1"/>
                                                                    <path id="Pfad_502" data-name="Pfad 502" d="M87.486,388.005H80.731a.8.8,0,0,1,0-1.6h6.755a.8.8,0,0,1,0,1.6Zm0,0" transform="translate(-75.708 -365.86)" fill="#707070" stroke="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke-width="1"/>
                                                                    <path id="Pfad_503" data-name="Pfad 503" d="M87.486,435.8H80.731a.8.8,0,0,1,0-1.6h6.755a.8.8,0,0,1,0,1.6Zm0,0" transform="translate(-75.708 -411.111)" fill="#707070" stroke="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke-width="1"/>
                                                                    <path id="Pfad_504" data-name="Pfad 504" d="M108.372,483.6H104.1a.8.8,0,0,1,0-1.6h4.269a.8.8,0,1,1,0,1.6Zm0,0" transform="translate(-97.837 -456.366)" fill="#707070" stroke="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke-width="1"/>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                        <div class="col-lg-11"><p>{{thread.category.title}}</p></div>
                                                    </div>
                                                </div>
                                                <div class="threadStates col-lg-10 paddingNormalize">
                                                    <div class="row">
                                                        <div class="svgIcons">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="27.681" height="24.848" viewBox="0 0 27.681 24.848">
                                                                <path id="heart" d="M23.644,2.236A6.906,6.906,0,0,0,18.508,0a6.461,6.461,0,0,0-4.035,1.393,8.256,8.256,0,0,0-1.631,1.7,8.251,8.251,0,0,0-1.632-1.7A6.46,6.46,0,0,0,7.174,0,6.906,6.906,0,0,0,2.038,2.236,8.027,8.027,0,0,0,0,7.718a9.559,9.559,0,0,0,2.547,6.257,54.314,54.314,0,0,0,6.376,5.985c.883.753,1.885,1.606,2.925,2.516a1.508,1.508,0,0,0,1.985,0c1.04-.909,2.042-1.763,2.926-2.517a54.284,54.284,0,0,0,6.376-5.984,9.558,9.558,0,0,0,2.547-6.257,8.026,8.026,0,0,0-2.037-5.482Zm0,0" transform="translate(1 1)" v-bind:fill="[thread.isLiked ? '#B8E269' : '#dedede']" class="svgHeartDarkGrey svgDarkGreyStroke" stroke="#707070" stroke-width="2"/>
                                                            </svg>
                                                        </div>
                                                        <div class="svgIconText">
                                                            <p>{{thread.likes}}</p>
                                                        </div>
                                                        <div class="svgIcons">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="34.556" height="26.57" viewBox="0 0 34.556 26.57">
                                                                <g id="Gruppe_971" data-name="Gruppe 971" transform="translate(0.5 0.5)">
                                                                    <path id="Vereinigungsmenge_2" data-name="Vereinigungsmenge 2" d="M1.774,25.151A1.561,1.561,0,0,1,1.7,22.945l2.251-2.413A10.763,10.763,0,0,1,0,12.486C0,5.59,7.511,0,16.778,0S33.556,5.59,33.556,12.486,26.043,24.971,16.778,24.971A20.649,20.649,0,0,1,6.509,22.361L3.98,25.073a1.56,1.56,0,0,1-2.206.077Z" transform="translate(0)" fill="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke="#707070" stroke-width="1"/>
                                                                    <g id="Ellipse_3" data-name="Ellipse 3" transform="translate(8.168 10.954)" fill="#fff" stroke="#fff" class="svgWhite svgWhiteStroke" stroke-width="1">
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.69" ry="1.69" stroke="none"/>
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.19" ry="1.19" fill="none"/>
                                                                    </g>
                                                                    <g id="Ellipse_4" data-name="Ellipse 4" transform="translate(14.926 10.954)" fill="#fff" stroke="#fff" class="svgWhite svgWhiteStroke" stroke-width="1">
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.69" ry="1.69" stroke="none"/>
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.19" ry="1.19" fill="none"/>
                                                                    </g>
                                                                    <g id="Ellipse_5" data-name="Ellipse 5" transform="translate(21.684 10.954)" fill="#fff" stroke="#fff" class="svgWhite svgWhiteStroke" stroke-width="1">
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.69" ry="1.69" stroke="none"/>
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.19" ry="1.19" fill="none"/>
                                                                    </g>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                        <div class="svgIconText">
                                                            <p>{{thread.postsMade}}</p>
                                                        </div>

                                                        <div class="svgIcons">
                                                            <svg id="calendar" xmlns="http://www.w3.org/2000/svg" width="29" height="29" viewBox="0 0 29 29">
                                                                <path id="Pfad_319" data-name="Pfad 319" d="M64.906,239.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906H64.906a.907.907,0,0,0-.906.906V238.6A.907.907,0,0,0,64.906,239.5Zm0,0" transform="translate(-60.375 -221.376)" fill="#707070" class="svgDarkGrey"/>
                                                                <path id="Pfad_320" data-name="Pfad 320" d="M64.906,367.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906H64.906a.907.907,0,0,0-.906.906V366.6A.907.907,0,0,0,64.906,367.5Zm0,0" transform="translate(-60.375 -342.126)" fill="#707070" class="svgDarkGrey"/>
                                                                <path id="Pfad_321" data-name="Pfad 321" d="M214.238,239.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906h-3.021a.907.907,0,0,0-.906.906V238.6A.907.907,0,0,0,214.238,239.5Zm0,0" transform="translate(-201.249 -221.376)" fill="#707070"class="svgDarkGrey"/>
                                                                <path id="Pfad_322" data-name="Pfad 322" d="M214.238,367.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906h-3.021a.907.907,0,0,0-.906.906V366.6A.907.907,0,0,0,214.238,367.5Zm0,0" transform="translate(-201.249 -342.126)" fill="#707070" class="svgDarkGrey"/>
                                                                <path id="Pfad_323" data-name="Pfad 323" d="M363.574,239.5H366.6a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906h-3.021a.907.907,0,0,0-.906.906V238.6A.907.907,0,0,0,363.574,239.5Zm0,0" transform="translate(-342.126 -221.376)" fill="#707070"class="svgDarkGrey"/>
                                                                <path id="Pfad_324" data-name="Pfad 324" d="M25.375,3.625H24.167V1.208A1.209,1.209,0,0,0,22.958,0H21.75a1.209,1.209,0,0,0-1.208,1.208V3.625H8.458V1.208A1.209,1.209,0,0,0,7.25,0H6.042A1.209,1.209,0,0,0,4.833,1.208V3.625H3.625A3.629,3.629,0,0,0,0,7.25V25.375A3.629,3.629,0,0,0,3.625,29h21.75A3.629,3.629,0,0,0,29,25.375V7.25a3.629,3.629,0,0,0-3.625-3.625Zm1.208,21.75a1.21,1.21,0,0,1-1.208,1.208H3.625a1.21,1.21,0,0,1-1.208-1.208V12.132H26.583Zm0,0" transform="translate(0)" fill="#707070" class="svgDarkGrey"/>
                                                            </svg>
                                                        </div>
                                                        <div class="svgIconText">
                                                            <p>{{thread.created}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-1 text-center">
                                            <img class="forumPics" v-bind:src="thread.userPic">
                                        </div>
                                    </router-link>
                                </div>
                            </div>
                        </div>
                        <div v-else>
                        </div>
                    </div>
                </div>

            </div>

            <div v-if="showPlantCategoriesBool === true" class="pflanzenSubCategories container-fluid paddingNormalize" @click="showHealSubCategories">
                <div class="row subCategories dropShadow pflanzenSub">
                    <div class="col-lg-11">
                        <div class="row">
                            <h4 class="subCategoryHeadline">Heilpflanzen</h4>
                        </div>
                    </div>
                    <div class="col-lg-1 svgSortSubCategories text-right">
                        <svg xmlns="http://www.w3.org/2000/svg" width="41" height="49" viewBox="0 0 41 49" id="healArrow">
                            <g id="Polygon_98" data-name="Polygon 98" transform="translate(41) rotate(90)" fill="#707070" class="svgArrowGreyFill">
                                <path d="M 41.95000839233398 39.99999618530273 L 7.049990177154541 39.99999618530273 C 5.956009864807129 39.99999618530273 4.980579853057861 39.43193817138672 4.440720081329346 38.48043823242188 C 3.900860071182251 37.52893829345703 3.913579940795898 36.40022659301758 4.47475004196167 35.46112823486328 L 21.92476081848145 6.259088039398193 C 22.47146987915039 5.344167709350586 23.43417930603027 4.797947883605957 24.5 4.797947883605957 C 25.56582069396973 4.797947883605957 26.52853012084961 5.344167709350586 27.07525062561035 6.259088039398193 L 44.52524948120117 35.46113967895508 C 45.08641815185547 36.40022659301758 45.09914016723633 37.52893829345703 44.55928039550781 38.48043823242188 C 44.01942825317383 39.43193817138672 43.04399871826172 39.99999618530273 41.95000839233398 39.99999618530273 Z" stroke="none"/>
                                <path d="M 24.5 5.797946929931641 C 24.15880966186523 5.797946929931641 23.30853080749512 5.892868041992188 22.78317070007324 6.772037506103516 L 5.333160400390625 35.97408676147461 C 4.793918609619141 36.87648773193359 5.137660980224609 37.68236923217773 5.310470581054688 37.98695755004883 C 5.483291625976563 38.29154968261719 5.998741149902344 39 7.049991607666016 39 L 41.95000839233398 39 C 43.00125122070313 39 43.51670074462891 38.29154968261719 43.68952178955078 37.98695755004883 C 43.86233901977539 37.68236923217773 44.20608139038086 36.87649917602539 43.66683959960938 35.97408676147461 L 26.21682929992676 6.772037506103516 C 25.69146919250488 5.892868041992188 24.84119033813477 5.797946929931641 24.5 5.797946929931641 M 24.5 3.797950744628906 C 25.82877731323242 3.797950744628906 27.15755462646484 4.447341918945313 27.93366050720215 5.746128082275391 L 45.38367080688477 34.94817733764648 C 46.97689056396484 37.61438751220703 45.05598068237305 40.99999618530273 41.95000839233398 40.99999618530273 L 7.049991607666016 40.99999618530273 C 3.944019317626953 40.99999618530273 2.023101806640625 37.61438751220703 3.616329193115234 34.94817733764648 L 21.06633949279785 5.746128082275391 C 21.84244537353516 4.447341918945313 23.17122268676758 3.797950744628906 24.5 3.797950744628906 Z" stroke="none" fill="#707070" class="svgArrowGreyFill"/>
                            </g>
                        </svg>
                    </div>
                </div>
                <div v-if="showHealSubCategoryBool === true" class="pflanzenSubCategories container-fluid paddingNormalize">

                    <!-- Threaddisplay -->
                    <div v-for="thread in threads">
                        <div v-if="thread.category.title === 'Heilpflanzen'">
                            <div class="row threadBackground dropShadow pflanzenSub">
                                <div class="container-fluid">
                                    <router-link :to="'/forum/' + thread.id" class="row thread dropSchadow">
                                        <div class="col-lg-11">
                                            <div class="row">
                                                <h3 class="threadHeadline">{{thread.headline}}</h3>
                                            </div>

                                            <div class="row">

                                                <div class="threadCategory threadStates col-lg-2">
                                                    <div class="row">
                                                        <div class="svgIconCategory col-lg-1 paddingNormalize">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="17.8" height="28.229" viewBox="0 0 17.8 28.229">
                                                                <g id="Gruppe_969" data-name="Gruppe 969" transform="translate(0.5 0.5)">
                                                                    <path id="Pfad_501" data-name="Pfad 501" d="M12.379,19.6H5.415a.8.8,0,0,1-.8-.8,6.71,6.71,0,0,0-1.837-4.6A8.411,8.411,0,0,1,2.934,2.523,8.315,8.315,0,0,1,8.881,0H8.9a8.414,8.414,0,0,1,8.4,8.428,8.407,8.407,0,0,1-2.3,5.8,6.641,6.641,0,0,0-1.817,4.581.8.8,0,0,1-.8.8Zm0,0" transform="translate(-0.497 0)" fill="#97b753" class="svgDarkGreen svgDarkGreenStroke" stroke="#97b753" stroke-width="1"/>
                                                                    <path id="Pfad_502" data-name="Pfad 502" d="M87.486,388.005H80.731a.8.8,0,0,1,0-1.6h6.755a.8.8,0,0,1,0,1.6Zm0,0" transform="translate(-75.708 -365.86)" fill="#707070" stroke="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke-width="1"/>
                                                                    <path id="Pfad_503" data-name="Pfad 503" d="M87.486,435.8H80.731a.8.8,0,0,1,0-1.6h6.755a.8.8,0,0,1,0,1.6Zm0,0" transform="translate(-75.708 -411.111)" fill="#707070" stroke="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke-width="1"/>
                                                                    <path id="Pfad_504" data-name="Pfad 504" d="M108.372,483.6H104.1a.8.8,0,0,1,0-1.6h4.269a.8.8,0,1,1,0,1.6Zm0,0" transform="translate(-97.837 -456.366)" fill="#707070" stroke="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke-width="1"/>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                        <div class="col-lg-11"><p>{{thread.category.title}}</p></div>
                                                    </div>
                                                </div>
                                                <div class="threadStates col-lg-10 paddingNormalize">
                                                    <div class="row">
                                                        <div class="svgIcons">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="27.681" height="24.848" viewBox="0 0 27.681 24.848">
                                                                <path id="heart" d="M23.644,2.236A6.906,6.906,0,0,0,18.508,0a6.461,6.461,0,0,0-4.035,1.393,8.256,8.256,0,0,0-1.631,1.7,8.251,8.251,0,0,0-1.632-1.7A6.46,6.46,0,0,0,7.174,0,6.906,6.906,0,0,0,2.038,2.236,8.027,8.027,0,0,0,0,7.718a9.559,9.559,0,0,0,2.547,6.257,54.314,54.314,0,0,0,6.376,5.985c.883.753,1.885,1.606,2.925,2.516a1.508,1.508,0,0,0,1.985,0c1.04-.909,2.042-1.763,2.926-2.517a54.284,54.284,0,0,0,6.376-5.984,9.558,9.558,0,0,0,2.547-6.257,8.026,8.026,0,0,0-2.037-5.482Zm0,0" transform="translate(1 1)" v-bind:fill="[thread.isLiked ? '#B8E269' : '#dedede']" class="svgHeartDarkGrey svgDarkGreyStroke" stroke="#707070" stroke-width="2"/>
                                                            </svg>
                                                        </div>
                                                        <div class="svgIconText">
                                                            <p>{{thread.likes}}</p>
                                                        </div>
                                                        <div class="svgIcons">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="34.556" height="26.57" viewBox="0 0 34.556 26.57">
                                                                <g id="Gruppe_971" data-name="Gruppe 971" transform="translate(0.5 0.5)">
                                                                    <path id="Vereinigungsmenge_2" data-name="Vereinigungsmenge 2" d="M1.774,25.151A1.561,1.561,0,0,1,1.7,22.945l2.251-2.413A10.763,10.763,0,0,1,0,12.486C0,5.59,7.511,0,16.778,0S33.556,5.59,33.556,12.486,26.043,24.971,16.778,24.971A20.649,20.649,0,0,1,6.509,22.361L3.98,25.073a1.56,1.56,0,0,1-2.206.077Z" transform="translate(0)" fill="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke="#707070" stroke-width="1"/>
                                                                    <g id="Ellipse_3" data-name="Ellipse 3" transform="translate(8.168 10.954)" fill="#fff" stroke="#fff" class="svgWhite svgWhiteStroke" stroke-width="1">
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.69" ry="1.69" stroke="none"/>
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.19" ry="1.19" fill="none"/>
                                                                    </g>
                                                                    <g id="Ellipse_4" data-name="Ellipse 4" transform="translate(14.926 10.954)" fill="#fff" stroke="#fff" class="svgWhite svgWhiteStroke" stroke-width="1">
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.69" ry="1.69" stroke="none"/>
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.19" ry="1.19" fill="none"/>
                                                                    </g>
                                                                    <g id="Ellipse_5" data-name="Ellipse 5" transform="translate(21.684 10.954)" fill="#fff" stroke="#fff" class="svgWhite svgWhiteStroke" stroke-width="1">
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.69" ry="1.69" stroke="none"/>
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.19" ry="1.19" fill="none"/>
                                                                    </g>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                        <div class="svgIconText">
                                                            <p>{{thread.postsMade}}</p>
                                                        </div>

                                                        <div class="svgIcons">
                                                            <svg id="calendar" xmlns="http://www.w3.org/2000/svg" width="29" height="29" viewBox="0 0 29 29">
                                                                <path id="Pfad_319" data-name="Pfad 319" d="M64.906,239.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906H64.906a.907.907,0,0,0-.906.906V238.6A.907.907,0,0,0,64.906,239.5Zm0,0" transform="translate(-60.375 -221.376)" fill="#707070" class="svgDarkGrey"/>
                                                                <path id="Pfad_320" data-name="Pfad 320" d="M64.906,367.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906H64.906a.907.907,0,0,0-.906.906V366.6A.907.907,0,0,0,64.906,367.5Zm0,0" transform="translate(-60.375 -342.126)" fill="#707070" class="svgDarkGrey"/>
                                                                <path id="Pfad_321" data-name="Pfad 321" d="M214.238,239.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906h-3.021a.907.907,0,0,0-.906.906V238.6A.907.907,0,0,0,214.238,239.5Zm0,0" transform="translate(-201.249 -221.376)" fill="#707070"class="svgDarkGrey"/>
                                                                <path id="Pfad_322" data-name="Pfad 322" d="M214.238,367.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906h-3.021a.907.907,0,0,0-.906.906V366.6A.907.907,0,0,0,214.238,367.5Zm0,0" transform="translate(-201.249 -342.126)" fill="#707070" class="svgDarkGrey"/>
                                                                <path id="Pfad_323" data-name="Pfad 323" d="M363.574,239.5H366.6a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906h-3.021a.907.907,0,0,0-.906.906V238.6A.907.907,0,0,0,363.574,239.5Zm0,0" transform="translate(-342.126 -221.376)" fill="#707070"class="svgDarkGrey"/>
                                                                <path id="Pfad_324" data-name="Pfad 324" d="M25.375,3.625H24.167V1.208A1.209,1.209,0,0,0,22.958,0H21.75a1.209,1.209,0,0,0-1.208,1.208V3.625H8.458V1.208A1.209,1.209,0,0,0,7.25,0H6.042A1.209,1.209,0,0,0,4.833,1.208V3.625H3.625A3.629,3.629,0,0,0,0,7.25V25.375A3.629,3.629,0,0,0,3.625,29h21.75A3.629,3.629,0,0,0,29,25.375V7.25a3.629,3.629,0,0,0-3.625-3.625Zm1.208,21.75a1.21,1.21,0,0,1-1.208,1.208H3.625a1.21,1.21,0,0,1-1.208-1.208V12.132H26.583Zm0,0" transform="translate(0)" fill="#707070" class="svgDarkGrey"/>
                                                            </svg>
                                                        </div>
                                                        <div class="svgIconText">
                                                            <p>{{thread.created}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-1 text-center">
                                            <img class="forumPics" v-bind:src="thread.userPic">
                                        </div>
                                    </router-link>
                                </div>
                            </div>
                        </div>
                        <div v-else>
                        </div>
                    </div>
                </div>

            </div>

            <div v-if="showPlantCategoriesBool === true" class="pflanzenSubCategories container-fluid paddingNormalize" @click="showFleshEatingSubCategories">
                <div class="row subCategories dropShadow pflanzenSub">
                    <div class="col-lg-11">
                        <div class="row">
                            <h4 class="subCategoryHeadline">Fleischfressende Pflanzen</h4>
                        </div>
                    </div>
                    <div class="col-lg-1 svgSortSubCategories text-right">
                        <svg xmlns="http://www.w3.org/2000/svg" width="41" height="49" viewBox="0 0 41 49" id="fleshArrow">
                            <g id="Polygon_98" data-name="Polygon 98" transform="translate(41) rotate(90)" fill="#707070" class="svgArrowGreyFill">
                                <path d="M 41.95000839233398 39.99999618530273 L 7.049990177154541 39.99999618530273 C 5.956009864807129 39.99999618530273 4.980579853057861 39.43193817138672 4.440720081329346 38.48043823242188 C 3.900860071182251 37.52893829345703 3.913579940795898 36.40022659301758 4.47475004196167 35.46112823486328 L 21.92476081848145 6.259088039398193 C 22.47146987915039 5.344167709350586 23.43417930603027 4.797947883605957 24.5 4.797947883605957 C 25.56582069396973 4.797947883605957 26.52853012084961 5.344167709350586 27.07525062561035 6.259088039398193 L 44.52524948120117 35.46113967895508 C 45.08641815185547 36.40022659301758 45.09914016723633 37.52893829345703 44.55928039550781 38.48043823242188 C 44.01942825317383 39.43193817138672 43.04399871826172 39.99999618530273 41.95000839233398 39.99999618530273 Z" stroke="none"/>
                                <path d="M 24.5 5.797946929931641 C 24.15880966186523 5.797946929931641 23.30853080749512 5.892868041992188 22.78317070007324 6.772037506103516 L 5.333160400390625 35.97408676147461 C 4.793918609619141 36.87648773193359 5.137660980224609 37.68236923217773 5.310470581054688 37.98695755004883 C 5.483291625976563 38.29154968261719 5.998741149902344 39 7.049991607666016 39 L 41.95000839233398 39 C 43.00125122070313 39 43.51670074462891 38.29154968261719 43.68952178955078 37.98695755004883 C 43.86233901977539 37.68236923217773 44.20608139038086 36.87649917602539 43.66683959960938 35.97408676147461 L 26.21682929992676 6.772037506103516 C 25.69146919250488 5.892868041992188 24.84119033813477 5.797946929931641 24.5 5.797946929931641 M 24.5 3.797950744628906 C 25.82877731323242 3.797950744628906 27.15755462646484 4.447341918945313 27.93366050720215 5.746128082275391 L 45.38367080688477 34.94817733764648 C 46.97689056396484 37.61438751220703 45.05598068237305 40.99999618530273 41.95000839233398 40.99999618530273 L 7.049991607666016 40.99999618530273 C 3.944019317626953 40.99999618530273 2.023101806640625 37.61438751220703 3.616329193115234 34.94817733764648 L 21.06633949279785 5.746128082275391 C 21.84244537353516 4.447341918945313 23.17122268676758 3.797950744628906 24.5 3.797950744628906 Z" stroke="none" fill="#707070" class="svgArrowGreyFill"/>
                            </g>
                        </svg>
                    </div>
                </div>
                <div v-if="showFleshEatingSubCategoryBool === true" class="pflanzenSubCategories container-fluid paddingNormalize">

                    <!-- Threaddisplay -->
                    <div v-for="thread in threads">
                        <div v-if="thread.category.title === 'Fleischfressende Pflanzen'">
                            <div class="row threadBackground dropShadow pflanzenSub">
                                <div class="container-fluid">
                                    <router-link :to="'/forum/' + thread.id" class="row thread dropSchadow">
                                        <div class="col-lg-11">
                                            <div class="row">
                                                <h3 class="threadHeadline">{{thread.headline}}</h3>
                                            </div>

                                            <div class="row">

                                                <div class="threadCategory threadStates col-lg-2">
                                                    <div class="row">
                                                        <div class="svgIconCategory col-lg-1 paddingNormalize">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="17.8" height="28.229" viewBox="0 0 17.8 28.229">
                                                                <g id="Gruppe_969" data-name="Gruppe 969" transform="translate(0.5 0.5)">
                                                                    <path id="Pfad_501" data-name="Pfad 501" d="M12.379,19.6H5.415a.8.8,0,0,1-.8-.8,6.71,6.71,0,0,0-1.837-4.6A8.411,8.411,0,0,1,2.934,2.523,8.315,8.315,0,0,1,8.881,0H8.9a8.414,8.414,0,0,1,8.4,8.428,8.407,8.407,0,0,1-2.3,5.8,6.641,6.641,0,0,0-1.817,4.581.8.8,0,0,1-.8.8Zm0,0" transform="translate(-0.497 0)" fill="#97b753" class="svgDarkGreen svgDarkGreenStroke" stroke="#97b753" stroke-width="1"/>
                                                                    <path id="Pfad_502" data-name="Pfad 502" d="M87.486,388.005H80.731a.8.8,0,0,1,0-1.6h6.755a.8.8,0,0,1,0,1.6Zm0,0" transform="translate(-75.708 -365.86)" fill="#707070" stroke="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke-width="1"/>
                                                                    <path id="Pfad_503" data-name="Pfad 503" d="M87.486,435.8H80.731a.8.8,0,0,1,0-1.6h6.755a.8.8,0,0,1,0,1.6Zm0,0" transform="translate(-75.708 -411.111)" fill="#707070" stroke="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke-width="1"/>
                                                                    <path id="Pfad_504" data-name="Pfad 504" d="M108.372,483.6H104.1a.8.8,0,0,1,0-1.6h4.269a.8.8,0,1,1,0,1.6Zm0,0" transform="translate(-97.837 -456.366)" fill="#707070" stroke="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke-width="1"/>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                        <div class="col-lg-11"><p>{{thread.category.title}}</p></div>
                                                    </div>
                                                </div>
                                                <div class="threadStates col-lg-10 paddingNormalize">
                                                    <div class="row">
                                                        <div class="svgIcons">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="27.681" height="24.848" viewBox="0 0 27.681 24.848">
                                                                <path id="heart" d="M23.644,2.236A6.906,6.906,0,0,0,18.508,0a6.461,6.461,0,0,0-4.035,1.393,8.256,8.256,0,0,0-1.631,1.7,8.251,8.251,0,0,0-1.632-1.7A6.46,6.46,0,0,0,7.174,0,6.906,6.906,0,0,0,2.038,2.236,8.027,8.027,0,0,0,0,7.718a9.559,9.559,0,0,0,2.547,6.257,54.314,54.314,0,0,0,6.376,5.985c.883.753,1.885,1.606,2.925,2.516a1.508,1.508,0,0,0,1.985,0c1.04-.909,2.042-1.763,2.926-2.517a54.284,54.284,0,0,0,6.376-5.984,9.558,9.558,0,0,0,2.547-6.257,8.026,8.026,0,0,0-2.037-5.482Zm0,0" transform="translate(1 1)" v-bind:fill="[thread.isLiked ? '#B8E269' : '#dedede']" class="svgHeartDarkGrey svgDarkGreyStroke" stroke="#707070" stroke-width="2"/>
                                                            </svg>
                                                        </div>
                                                        <div class="svgIconText">
                                                            <p>{{thread.likes}}</p>
                                                        </div>
                                                        <div class="svgIcons">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="34.556" height="26.57" viewBox="0 0 34.556 26.57">
                                                                <g id="Gruppe_971" data-name="Gruppe 971" transform="translate(0.5 0.5)">
                                                                    <path id="Vereinigungsmenge_2" data-name="Vereinigungsmenge 2" d="M1.774,25.151A1.561,1.561,0,0,1,1.7,22.945l2.251-2.413A10.763,10.763,0,0,1,0,12.486C0,5.59,7.511,0,16.778,0S33.556,5.59,33.556,12.486,26.043,24.971,16.778,24.971A20.649,20.649,0,0,1,6.509,22.361L3.98,25.073a1.56,1.56,0,0,1-2.206.077Z" transform="translate(0)" fill="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke="#707070" stroke-width="1"/>
                                                                    <g id="Ellipse_3" data-name="Ellipse 3" transform="translate(8.168 10.954)" fill="#fff" stroke="#fff" class="svgWhite svgWhiteStroke" stroke-width="1">
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.69" ry="1.69" stroke="none"/>
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.19" ry="1.19" fill="none"/>
                                                                    </g>
                                                                    <g id="Ellipse_4" data-name="Ellipse 4" transform="translate(14.926 10.954)" fill="#fff" stroke="#fff" class="svgWhite svgWhiteStroke" stroke-width="1">
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.69" ry="1.69" stroke="none"/>
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.19" ry="1.19" fill="none"/>
                                                                    </g>
                                                                    <g id="Ellipse_5" data-name="Ellipse 5" transform="translate(21.684 10.954)" fill="#fff" stroke="#fff" class="svgWhite svgWhiteStroke" stroke-width="1">
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.69" ry="1.69" stroke="none"/>
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.19" ry="1.19" fill="none"/>
                                                                    </g>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                        <div class="svgIconText">
                                                            <p>{{thread.postsMade}}</p>
                                                        </div>

                                                        <div class="svgIcons">
                                                            <svg id="calendar" xmlns="http://www.w3.org/2000/svg" width="29" height="29" viewBox="0 0 29 29">
                                                                <path id="Pfad_319" data-name="Pfad 319" d="M64.906,239.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906H64.906a.907.907,0,0,0-.906.906V238.6A.907.907,0,0,0,64.906,239.5Zm0,0" transform="translate(-60.375 -221.376)" fill="#707070" class="svgDarkGrey"/>
                                                                <path id="Pfad_320" data-name="Pfad 320" d="M64.906,367.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906H64.906a.907.907,0,0,0-.906.906V366.6A.907.907,0,0,0,64.906,367.5Zm0,0" transform="translate(-60.375 -342.126)" fill="#707070" class="svgDarkGrey"/>
                                                                <path id="Pfad_321" data-name="Pfad 321" d="M214.238,239.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906h-3.021a.907.907,0,0,0-.906.906V238.6A.907.907,0,0,0,214.238,239.5Zm0,0" transform="translate(-201.249 -221.376)" fill="#707070"class="svgDarkGrey"/>
                                                                <path id="Pfad_322" data-name="Pfad 322" d="M214.238,367.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906h-3.021a.907.907,0,0,0-.906.906V366.6A.907.907,0,0,0,214.238,367.5Zm0,0" transform="translate(-201.249 -342.126)" fill="#707070" class="svgDarkGrey"/>
                                                                <path id="Pfad_323" data-name="Pfad 323" d="M363.574,239.5H366.6a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906h-3.021a.907.907,0,0,0-.906.906V238.6A.907.907,0,0,0,363.574,239.5Zm0,0" transform="translate(-342.126 -221.376)" fill="#707070"class="svgDarkGrey"/>
                                                                <path id="Pfad_324" data-name="Pfad 324" d="M25.375,3.625H24.167V1.208A1.209,1.209,0,0,0,22.958,0H21.75a1.209,1.209,0,0,0-1.208,1.208V3.625H8.458V1.208A1.209,1.209,0,0,0,7.25,0H6.042A1.209,1.209,0,0,0,4.833,1.208V3.625H3.625A3.629,3.629,0,0,0,0,7.25V25.375A3.629,3.629,0,0,0,3.625,29h21.75A3.629,3.629,0,0,0,29,25.375V7.25a3.629,3.629,0,0,0-3.625-3.625Zm1.208,21.75a1.21,1.21,0,0,1-1.208,1.208H3.625a1.21,1.21,0,0,1-1.208-1.208V12.132H26.583Zm0,0" transform="translate(0)" fill="#707070" class="svgDarkGrey"/>
                                                            </svg>
                                                        </div>
                                                        <div class="svgIconText">
                                                            <p>{{thread.created}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-1 text-center">
                                            <img class="forumPics" v-bind:src="thread.userPic">
                                        </div>
                                    </router-link>
                                </div>
                            </div>
                        </div>
                        <div v-else>
                        </div>
                    </div>
                </div>

            </div>

            <div v-if="showPlantCategoriesBool === true" class="pflanzenSubCategories container-fluid paddingNormalize" @click="showRoomSubCategories">
                <div class="row subCategories dropShadow pflanzenSub">
                    <div class="col-lg-11">
                        <div class="row">
                            <h4 class="subCategoryHeadline">Zimmerpflanzen</h4>
                        </div>
                    </div>
                    <div class="col-lg-1 svgSortSubCategories text-right">
                        <svg xmlns="http://www.w3.org/2000/svg" width="41" height="49" viewBox="0 0 41 49" id="roomArrow">
                            <g id="Polygon_98" data-name="Polygon 98" transform="translate(41) rotate(90)" fill="#707070" class="svgArrowGreyFill">
                                <path d="M 41.95000839233398 39.99999618530273 L 7.049990177154541 39.99999618530273 C 5.956009864807129 39.99999618530273 4.980579853057861 39.43193817138672 4.440720081329346 38.48043823242188 C 3.900860071182251 37.52893829345703 3.913579940795898 36.40022659301758 4.47475004196167 35.46112823486328 L 21.92476081848145 6.259088039398193 C 22.47146987915039 5.344167709350586 23.43417930603027 4.797947883605957 24.5 4.797947883605957 C 25.56582069396973 4.797947883605957 26.52853012084961 5.344167709350586 27.07525062561035 6.259088039398193 L 44.52524948120117 35.46113967895508 C 45.08641815185547 36.40022659301758 45.09914016723633 37.52893829345703 44.55928039550781 38.48043823242188 C 44.01942825317383 39.43193817138672 43.04399871826172 39.99999618530273 41.95000839233398 39.99999618530273 Z" stroke="none"/>
                                <path d="M 24.5 5.797946929931641 C 24.15880966186523 5.797946929931641 23.30853080749512 5.892868041992188 22.78317070007324 6.772037506103516 L 5.333160400390625 35.97408676147461 C 4.793918609619141 36.87648773193359 5.137660980224609 37.68236923217773 5.310470581054688 37.98695755004883 C 5.483291625976563 38.29154968261719 5.998741149902344 39 7.049991607666016 39 L 41.95000839233398 39 C 43.00125122070313 39 43.51670074462891 38.29154968261719 43.68952178955078 37.98695755004883 C 43.86233901977539 37.68236923217773 44.20608139038086 36.87649917602539 43.66683959960938 35.97408676147461 L 26.21682929992676 6.772037506103516 C 25.69146919250488 5.892868041992188 24.84119033813477 5.797946929931641 24.5 5.797946929931641 M 24.5 3.797950744628906 C 25.82877731323242 3.797950744628906 27.15755462646484 4.447341918945313 27.93366050720215 5.746128082275391 L 45.38367080688477 34.94817733764648 C 46.97689056396484 37.61438751220703 45.05598068237305 40.99999618530273 41.95000839233398 40.99999618530273 L 7.049991607666016 40.99999618530273 C 3.944019317626953 40.99999618530273 2.023101806640625 37.61438751220703 3.616329193115234 34.94817733764648 L 21.06633949279785 5.746128082275391 C 21.84244537353516 4.447341918945313 23.17122268676758 3.797950744628906 24.5 3.797950744628906 Z" stroke="none" fill="#707070" class="svgArrowGreyFill"/>
                            </g>
                        </svg>
                    </div>
                </div>
                <div v-if="showRoomSubCategoryBool === true" class="pflanzenSubCategories container-fluid paddingNormalize">

                    <!-- Threaddisplay -->
                    <div v-for="thread in threads">
                        <div v-if="thread.category.title === 'Zimmerpflanzen'">
                            <div class="row threadBackground dropShadow pflanzenSub">
                                <div class="container-fluid">
                                    <router-link :to="'/forum/' + thread.id" class="row thread dropSchadow">
                                        <div class="col-lg-11">
                                            <div class="row">
                                                <h3 class="threadHeadline">{{thread.headline}}</h3>
                                            </div>

                                            <div class="row">

                                                <div class="threadCategory threadStates col-lg-2">
                                                    <div class="row">
                                                        <div class="svgIconCategory col-lg-1 paddingNormalize">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="17.8" height="28.229" viewBox="0 0 17.8 28.229">
                                                                <g id="Gruppe_969" data-name="Gruppe 969" transform="translate(0.5 0.5)">
                                                                    <path id="Pfad_501" data-name="Pfad 501" d="M12.379,19.6H5.415a.8.8,0,0,1-.8-.8,6.71,6.71,0,0,0-1.837-4.6A8.411,8.411,0,0,1,2.934,2.523,8.315,8.315,0,0,1,8.881,0H8.9a8.414,8.414,0,0,1,8.4,8.428,8.407,8.407,0,0,1-2.3,5.8,6.641,6.641,0,0,0-1.817,4.581.8.8,0,0,1-.8.8Zm0,0" transform="translate(-0.497 0)" fill="#97b753" class="svgDarkGreen svgDarkGreenStroke" stroke="#97b753" stroke-width="1"/>
                                                                    <path id="Pfad_502" data-name="Pfad 502" d="M87.486,388.005H80.731a.8.8,0,0,1,0-1.6h6.755a.8.8,0,0,1,0,1.6Zm0,0" transform="translate(-75.708 -365.86)" fill="#707070" stroke="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke-width="1"/>
                                                                    <path id="Pfad_503" data-name="Pfad 503" d="M87.486,435.8H80.731a.8.8,0,0,1,0-1.6h6.755a.8.8,0,0,1,0,1.6Zm0,0" transform="translate(-75.708 -411.111)" fill="#707070" stroke="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke-width="1"/>
                                                                    <path id="Pfad_504" data-name="Pfad 504" d="M108.372,483.6H104.1a.8.8,0,0,1,0-1.6h4.269a.8.8,0,1,1,0,1.6Zm0,0" transform="translate(-97.837 -456.366)" fill="#707070" stroke="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke-width="1"/>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                        <div class="col-lg-11"><p>{{thread.category.title}}</p></div>
                                                    </div>
                                                </div>
                                                <div class="threadStates col-lg-10 paddingNormalize">
                                                    <div class="row">
                                                        <div class="svgIcons">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="27.681" height="24.848" viewBox="0 0 27.681 24.848">
                                                                <path id="heart" d="M23.644,2.236A6.906,6.906,0,0,0,18.508,0a6.461,6.461,0,0,0-4.035,1.393,8.256,8.256,0,0,0-1.631,1.7,8.251,8.251,0,0,0-1.632-1.7A6.46,6.46,0,0,0,7.174,0,6.906,6.906,0,0,0,2.038,2.236,8.027,8.027,0,0,0,0,7.718a9.559,9.559,0,0,0,2.547,6.257,54.314,54.314,0,0,0,6.376,5.985c.883.753,1.885,1.606,2.925,2.516a1.508,1.508,0,0,0,1.985,0c1.04-.909,2.042-1.763,2.926-2.517a54.284,54.284,0,0,0,6.376-5.984,9.558,9.558,0,0,0,2.547-6.257,8.026,8.026,0,0,0-2.037-5.482Zm0,0" transform="translate(1 1)" v-bind:fill="[thread.isLiked ? '#B8E269' : '#dedede']" class="svgHeartDarkGrey svgDarkGreyStroke" stroke="#707070" stroke-width="2"/>
                                                            </svg>
                                                        </div>
                                                        <div class="svgIconText">
                                                            <p>{{thread.likes}}</p>
                                                        </div>
                                                        <div class="svgIcons">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="34.556" height="26.57" viewBox="0 0 34.556 26.57">
                                                                <g id="Gruppe_971" data-name="Gruppe 971" transform="translate(0.5 0.5)">
                                                                    <path id="Vereinigungsmenge_2" data-name="Vereinigungsmenge 2" d="M1.774,25.151A1.561,1.561,0,0,1,1.7,22.945l2.251-2.413A10.763,10.763,0,0,1,0,12.486C0,5.59,7.511,0,16.778,0S33.556,5.59,33.556,12.486,26.043,24.971,16.778,24.971A20.649,20.649,0,0,1,6.509,22.361L3.98,25.073a1.56,1.56,0,0,1-2.206.077Z" transform="translate(0)" fill="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke="#707070" stroke-width="1"/>
                                                                    <g id="Ellipse_3" data-name="Ellipse 3" transform="translate(8.168 10.954)" fill="#fff" stroke="#fff" class="svgWhite svgWhiteStroke" stroke-width="1">
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.69" ry="1.69" stroke="none"/>
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.19" ry="1.19" fill="none"/>
                                                                    </g>
                                                                    <g id="Ellipse_4" data-name="Ellipse 4" transform="translate(14.926 10.954)" fill="#fff" stroke="#fff" class="svgWhite svgWhiteStroke" stroke-width="1">
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.69" ry="1.69" stroke="none"/>
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.19" ry="1.19" fill="none"/>
                                                                    </g>
                                                                    <g id="Ellipse_5" data-name="Ellipse 5" transform="translate(21.684 10.954)" fill="#fff" stroke="#fff" class="svgWhite svgWhiteStroke" stroke-width="1">
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.69" ry="1.69" stroke="none"/>
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.19" ry="1.19" fill="none"/>
                                                                    </g>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                        <div class="svgIconText">
                                                            <p>{{thread.postsMade}}</p>
                                                        </div>

                                                        <div class="svgIcons">
                                                            <svg id="calendar" xmlns="http://www.w3.org/2000/svg" width="29" height="29" viewBox="0 0 29 29">
                                                                <path id="Pfad_319" data-name="Pfad 319" d="M64.906,239.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906H64.906a.907.907,0,0,0-.906.906V238.6A.907.907,0,0,0,64.906,239.5Zm0,0" transform="translate(-60.375 -221.376)" fill="#707070" class="svgDarkGrey"/>
                                                                <path id="Pfad_320" data-name="Pfad 320" d="M64.906,367.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906H64.906a.907.907,0,0,0-.906.906V366.6A.907.907,0,0,0,64.906,367.5Zm0,0" transform="translate(-60.375 -342.126)" fill="#707070" class="svgDarkGrey"/>
                                                                <path id="Pfad_321" data-name="Pfad 321" d="M214.238,239.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906h-3.021a.907.907,0,0,0-.906.906V238.6A.907.907,0,0,0,214.238,239.5Zm0,0" transform="translate(-201.249 -221.376)" fill="#707070"class="svgDarkGrey"/>
                                                                <path id="Pfad_322" data-name="Pfad 322" d="M214.238,367.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906h-3.021a.907.907,0,0,0-.906.906V366.6A.907.907,0,0,0,214.238,367.5Zm0,0" transform="translate(-201.249 -342.126)" fill="#707070" class="svgDarkGrey"/>
                                                                <path id="Pfad_323" data-name="Pfad 323" d="M363.574,239.5H366.6a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906h-3.021a.907.907,0,0,0-.906.906V238.6A.907.907,0,0,0,363.574,239.5Zm0,0" transform="translate(-342.126 -221.376)" fill="#707070"class="svgDarkGrey"/>
                                                                <path id="Pfad_324" data-name="Pfad 324" d="M25.375,3.625H24.167V1.208A1.209,1.209,0,0,0,22.958,0H21.75a1.209,1.209,0,0,0-1.208,1.208V3.625H8.458V1.208A1.209,1.209,0,0,0,7.25,0H6.042A1.209,1.209,0,0,0,4.833,1.208V3.625H3.625A3.629,3.629,0,0,0,0,7.25V25.375A3.629,3.629,0,0,0,3.625,29h21.75A3.629,3.629,0,0,0,29,25.375V7.25a3.629,3.629,0,0,0-3.625-3.625Zm1.208,21.75a1.21,1.21,0,0,1-1.208,1.208H3.625a1.21,1.21,0,0,1-1.208-1.208V12.132H26.583Zm0,0" transform="translate(0)" fill="#707070" class="svgDarkGrey"/>
                                                            </svg>
                                                        </div>
                                                        <div class="svgIconText">
                                                            <p>{{thread.created}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-1 text-center">
                                            <img class="forumPics" v-bind:src="thread.userPic">
                                        </div>
                                    </router-link>
                                </div>
                            </div>
                        </div>
                        <div v-else>
                        </div>
                    </div>
                </div>

            </div>

            <div v-if="showPlantCategoriesBool === true" class="pflanzenSubCategories container-fluid paddingNormalize" @click="showSunSubCategories">
                <div class="row subCategories dropShadow pflanzenSub">
                    <div class="col-lg-11">
                        <div class="row">
                            <h4 class="subCategoryHeadline">Sonnenpflanzen</h4>
                        </div>
                    </div>
                    <div class="col-lg-1 svgSortSubCategories text-right">
                        <svg xmlns="http://www.w3.org/2000/svg" width="41" height="49" viewBox="0 0 41 49" id="sunArrow">
                            <g id="Polygon_98" data-name="Polygon 98" transform="translate(41) rotate(90)" fill="#707070" class="svgArrowGreyFill">
                                <path d="M 41.95000839233398 39.99999618530273 L 7.049990177154541 39.99999618530273 C 5.956009864807129 39.99999618530273 4.980579853057861 39.43193817138672 4.440720081329346 38.48043823242188 C 3.900860071182251 37.52893829345703 3.913579940795898 36.40022659301758 4.47475004196167 35.46112823486328 L 21.92476081848145 6.259088039398193 C 22.47146987915039 5.344167709350586 23.43417930603027 4.797947883605957 24.5 4.797947883605957 C 25.56582069396973 4.797947883605957 26.52853012084961 5.344167709350586 27.07525062561035 6.259088039398193 L 44.52524948120117 35.46113967895508 C 45.08641815185547 36.40022659301758 45.09914016723633 37.52893829345703 44.55928039550781 38.48043823242188 C 44.01942825317383 39.43193817138672 43.04399871826172 39.99999618530273 41.95000839233398 39.99999618530273 Z" stroke="none"/>
                                <path d="M 24.5 5.797946929931641 C 24.15880966186523 5.797946929931641 23.30853080749512 5.892868041992188 22.78317070007324 6.772037506103516 L 5.333160400390625 35.97408676147461 C 4.793918609619141 36.87648773193359 5.137660980224609 37.68236923217773 5.310470581054688 37.98695755004883 C 5.483291625976563 38.29154968261719 5.998741149902344 39 7.049991607666016 39 L 41.95000839233398 39 C 43.00125122070313 39 43.51670074462891 38.29154968261719 43.68952178955078 37.98695755004883 C 43.86233901977539 37.68236923217773 44.20608139038086 36.87649917602539 43.66683959960938 35.97408676147461 L 26.21682929992676 6.772037506103516 C 25.69146919250488 5.892868041992188 24.84119033813477 5.797946929931641 24.5 5.797946929931641 M 24.5 3.797950744628906 C 25.82877731323242 3.797950744628906 27.15755462646484 4.447341918945313 27.93366050720215 5.746128082275391 L 45.38367080688477 34.94817733764648 C 46.97689056396484 37.61438751220703 45.05598068237305 40.99999618530273 41.95000839233398 40.99999618530273 L 7.049991607666016 40.99999618530273 C 3.944019317626953 40.99999618530273 2.023101806640625 37.61438751220703 3.616329193115234 34.94817733764648 L 21.06633949279785 5.746128082275391 C 21.84244537353516 4.447341918945313 23.17122268676758 3.797950744628906 24.5 3.797950744628906 Z" stroke="none" fill="#707070" class="svgArrowGreyFill"/>
                            </g>
                        </svg>
                    </div>
                </div>
                <div v-if="showSunSubCategoryBool === true" class="pflanzenSubCategories container-fluid paddingNormalize">

                    <!-- Threaddisplay -->
                    <div v-for="thread in threads">
                        <div v-if="thread.category.title === 'Sonnenpflanzen'">
                            <div class="row threadBackground dropShadow pflanzenSub">
                                <div class="container-fluid">
                                    <router-link :to="'/forum/' + thread.id" class="row thread dropSchadow">
                                        <div class="col-lg-11">
                                            <div class="row">
                                                <h3 class="threadHeadline">{{thread.headline}}</h3>
                                            </div>

                                            <div class="row">

                                                <div class="threadCategory threadStates col-lg-2">
                                                    <div class="row">
                                                        <div class="svgIconCategory col-lg-1 paddingNormalize">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="17.8" height="28.229" viewBox="0 0 17.8 28.229">
                                                                <g id="Gruppe_969" data-name="Gruppe 969" transform="translate(0.5 0.5)">
                                                                    <path id="Pfad_501" data-name="Pfad 501" d="M12.379,19.6H5.415a.8.8,0,0,1-.8-.8,6.71,6.71,0,0,0-1.837-4.6A8.411,8.411,0,0,1,2.934,2.523,8.315,8.315,0,0,1,8.881,0H8.9a8.414,8.414,0,0,1,8.4,8.428,8.407,8.407,0,0,1-2.3,5.8,6.641,6.641,0,0,0-1.817,4.581.8.8,0,0,1-.8.8Zm0,0" transform="translate(-0.497 0)" fill="#97b753" class="svgDarkGreen svgDarkGreenStroke" stroke="#97b753" stroke-width="1"/>
                                                                    <path id="Pfad_502" data-name="Pfad 502" d="M87.486,388.005H80.731a.8.8,0,0,1,0-1.6h6.755a.8.8,0,0,1,0,1.6Zm0,0" transform="translate(-75.708 -365.86)" fill="#707070" stroke="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke-width="1"/>
                                                                    <path id="Pfad_503" data-name="Pfad 503" d="M87.486,435.8H80.731a.8.8,0,0,1,0-1.6h6.755a.8.8,0,0,1,0,1.6Zm0,0" transform="translate(-75.708 -411.111)" fill="#707070" stroke="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke-width="1"/>
                                                                    <path id="Pfad_504" data-name="Pfad 504" d="M108.372,483.6H104.1a.8.8,0,0,1,0-1.6h4.269a.8.8,0,1,1,0,1.6Zm0,0" transform="translate(-97.837 -456.366)" fill="#707070" stroke="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke-width="1"/>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                        <div class="col-lg-11"><p>{{thread.category.title}}</p></div>
                                                    </div>
                                                </div>
                                                <div class="threadStates col-lg-10 paddingNormalize">
                                                    <div class="row">
                                                        <div class="svgIcons">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="27.681" height="24.848" viewBox="0 0 27.681 24.848">
                                                                <path id="heart" d="M23.644,2.236A6.906,6.906,0,0,0,18.508,0a6.461,6.461,0,0,0-4.035,1.393,8.256,8.256,0,0,0-1.631,1.7,8.251,8.251,0,0,0-1.632-1.7A6.46,6.46,0,0,0,7.174,0,6.906,6.906,0,0,0,2.038,2.236,8.027,8.027,0,0,0,0,7.718a9.559,9.559,0,0,0,2.547,6.257,54.314,54.314,0,0,0,6.376,5.985c.883.753,1.885,1.606,2.925,2.516a1.508,1.508,0,0,0,1.985,0c1.04-.909,2.042-1.763,2.926-2.517a54.284,54.284,0,0,0,6.376-5.984,9.558,9.558,0,0,0,2.547-6.257,8.026,8.026,0,0,0-2.037-5.482Zm0,0" transform="translate(1 1)" v-bind:fill="[thread.isLiked ? '#B8E269' : '#dedede']" class="svgHeartDarkGrey svgDarkGreyStroke" stroke="#707070" stroke-width="2"/>
                                                            </svg>
                                                        </div>
                                                        <div class="svgIconText">
                                                            <p>{{thread.likes}}</p>
                                                        </div>
                                                        <div class="svgIcons">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="34.556" height="26.57" viewBox="0 0 34.556 26.57">
                                                                <g id="Gruppe_971" data-name="Gruppe 971" transform="translate(0.5 0.5)">
                                                                    <path id="Vereinigungsmenge_2" data-name="Vereinigungsmenge 2" d="M1.774,25.151A1.561,1.561,0,0,1,1.7,22.945l2.251-2.413A10.763,10.763,0,0,1,0,12.486C0,5.59,7.511,0,16.778,0S33.556,5.59,33.556,12.486,26.043,24.971,16.778,24.971A20.649,20.649,0,0,1,6.509,22.361L3.98,25.073a1.56,1.56,0,0,1-2.206.077Z" transform="translate(0)" fill="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke="#707070" stroke-width="1"/>
                                                                    <g id="Ellipse_3" data-name="Ellipse 3" transform="translate(8.168 10.954)" fill="#fff" stroke="#fff" class="svgWhite svgWhiteStroke" stroke-width="1">
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.69" ry="1.69" stroke="none"/>
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.19" ry="1.19" fill="none"/>
                                                                    </g>
                                                                    <g id="Ellipse_4" data-name="Ellipse 4" transform="translate(14.926 10.954)" fill="#fff" stroke="#fff" class="svgWhite svgWhiteStroke" stroke-width="1">
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.69" ry="1.69" stroke="none"/>
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.19" ry="1.19" fill="none"/>
                                                                    </g>
                                                                    <g id="Ellipse_5" data-name="Ellipse 5" transform="translate(21.684 10.954)" fill="#fff" stroke="#fff" class="svgWhite svgWhiteStroke" stroke-width="1">
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.69" ry="1.69" stroke="none"/>
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.19" ry="1.19" fill="none"/>
                                                                    </g>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                        <div class="svgIconText">
                                                            <p>{{thread.postsMade}}</p>
                                                        </div>

                                                        <div class="svgIcons">
                                                            <svg id="calendar" xmlns="http://www.w3.org/2000/svg" width="29" height="29" viewBox="0 0 29 29">
                                                                <path id="Pfad_319" data-name="Pfad 319" d="M64.906,239.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906H64.906a.907.907,0,0,0-.906.906V238.6A.907.907,0,0,0,64.906,239.5Zm0,0" transform="translate(-60.375 -221.376)" fill="#707070" class="svgDarkGrey"/>
                                                                <path id="Pfad_320" data-name="Pfad 320" d="M64.906,367.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906H64.906a.907.907,0,0,0-.906.906V366.6A.907.907,0,0,0,64.906,367.5Zm0,0" transform="translate(-60.375 -342.126)" fill="#707070" class="svgDarkGrey"/>
                                                                <path id="Pfad_321" data-name="Pfad 321" d="M214.238,239.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906h-3.021a.907.907,0,0,0-.906.906V238.6A.907.907,0,0,0,214.238,239.5Zm0,0" transform="translate(-201.249 -221.376)" fill="#707070"class="svgDarkGrey"/>
                                                                <path id="Pfad_322" data-name="Pfad 322" d="M214.238,367.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906h-3.021a.907.907,0,0,0-.906.906V366.6A.907.907,0,0,0,214.238,367.5Zm0,0" transform="translate(-201.249 -342.126)" fill="#707070" class="svgDarkGrey"/>
                                                                <path id="Pfad_323" data-name="Pfad 323" d="M363.574,239.5H366.6a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906h-3.021a.907.907,0,0,0-.906.906V238.6A.907.907,0,0,0,363.574,239.5Zm0,0" transform="translate(-342.126 -221.376)" fill="#707070"class="svgDarkGrey"/>
                                                                <path id="Pfad_324" data-name="Pfad 324" d="M25.375,3.625H24.167V1.208A1.209,1.209,0,0,0,22.958,0H21.75a1.209,1.209,0,0,0-1.208,1.208V3.625H8.458V1.208A1.209,1.209,0,0,0,7.25,0H6.042A1.209,1.209,0,0,0,4.833,1.208V3.625H3.625A3.629,3.629,0,0,0,0,7.25V25.375A3.629,3.629,0,0,0,3.625,29h21.75A3.629,3.629,0,0,0,29,25.375V7.25a3.629,3.629,0,0,0-3.625-3.625Zm1.208,21.75a1.21,1.21,0,0,1-1.208,1.208H3.625a1.21,1.21,0,0,1-1.208-1.208V12.132H26.583Zm0,0" transform="translate(0)" fill="#707070" class="svgDarkGrey"/>
                                                            </svg>
                                                        </div>
                                                        <div class="svgIconText">
                                                            <p>{{thread.created}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-1 text-center">
                                            <img class="forumPics" v-bind:src="thread.userPic">
                                        </div>
                                    </router-link>
                                </div>
                            </div>
                        </div>
                        <div v-else>
                        </div>
                    </div>
                </div>

            </div>

            <div v-if="showPlantCategoriesBool === true" class="pflanzenSubCategories container-fluid paddingNormalize" @click="showSpringSubCategories">
                <div class="row subCategories dropShadow pflanzenSub">
                    <div class="col-lg-11">
                        <div class="row">
                            <h4 class="subCategoryHeadline">Frühlingsblüher</h4>
                        </div>
                    </div>
                    <div class="col-lg-1 svgSortSubCategories text-right">
                        <svg xmlns="http://www.w3.org/2000/svg" width="41" height="49" viewBox="0 0 41 49" id="springArrow">
                            <g id="Polygon_98" data-name="Polygon 98" transform="translate(41) rotate(90)" fill="#707070" class="svgArrowGreyFill">
                                <path d="M 41.95000839233398 39.99999618530273 L 7.049990177154541 39.99999618530273 C 5.956009864807129 39.99999618530273 4.980579853057861 39.43193817138672 4.440720081329346 38.48043823242188 C 3.900860071182251 37.52893829345703 3.913579940795898 36.40022659301758 4.47475004196167 35.46112823486328 L 21.92476081848145 6.259088039398193 C 22.47146987915039 5.344167709350586 23.43417930603027 4.797947883605957 24.5 4.797947883605957 C 25.56582069396973 4.797947883605957 26.52853012084961 5.344167709350586 27.07525062561035 6.259088039398193 L 44.52524948120117 35.46113967895508 C 45.08641815185547 36.40022659301758 45.09914016723633 37.52893829345703 44.55928039550781 38.48043823242188 C 44.01942825317383 39.43193817138672 43.04399871826172 39.99999618530273 41.95000839233398 39.99999618530273 Z" stroke="none"/>
                                <path d="M 24.5 5.797946929931641 C 24.15880966186523 5.797946929931641 23.30853080749512 5.892868041992188 22.78317070007324 6.772037506103516 L 5.333160400390625 35.97408676147461 C 4.793918609619141 36.87648773193359 5.137660980224609 37.68236923217773 5.310470581054688 37.98695755004883 C 5.483291625976563 38.29154968261719 5.998741149902344 39 7.049991607666016 39 L 41.95000839233398 39 C 43.00125122070313 39 43.51670074462891 38.29154968261719 43.68952178955078 37.98695755004883 C 43.86233901977539 37.68236923217773 44.20608139038086 36.87649917602539 43.66683959960938 35.97408676147461 L 26.21682929992676 6.772037506103516 C 25.69146919250488 5.892868041992188 24.84119033813477 5.797946929931641 24.5 5.797946929931641 M 24.5 3.797950744628906 C 25.82877731323242 3.797950744628906 27.15755462646484 4.447341918945313 27.93366050720215 5.746128082275391 L 45.38367080688477 34.94817733764648 C 46.97689056396484 37.61438751220703 45.05598068237305 40.99999618530273 41.95000839233398 40.99999618530273 L 7.049991607666016 40.99999618530273 C 3.944019317626953 40.99999618530273 2.023101806640625 37.61438751220703 3.616329193115234 34.94817733764648 L 21.06633949279785 5.746128082275391 C 21.84244537353516 4.447341918945313 23.17122268676758 3.797950744628906 24.5 3.797950744628906 Z" stroke="none" fill="#707070" class="svgArrowGreyFill"/>
                            </g>
                        </svg>
                    </div>
                </div>
                <div v-if="showSpringSubCategoryBool === true" class="pflanzenSubCategories container-fluid paddingNormalize">

                    <!-- Threaddisplay -->
                    <div v-for="thread in threads">
                        <div v-if="thread.category.title === 'Frühlingsblüher'">
                            <div class="row threadBackground dropShadow pflanzenSub">
                                <div class="container-fluid">
                                    <router-link :to="'/forum/' + thread.id" class="row thread dropSchadow">
                                        <div class="col-lg-11">
                                            <div class="row">
                                                <h3 class="threadHeadline">{{thread.headline}}</h3>
                                            </div>

                                            <div class="row">

                                                <div class="threadCategory threadStates col-lg-2">
                                                    <div class="row">
                                                        <div class="svgIconCategory col-lg-1 paddingNormalize">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="17.8" height="28.229" viewBox="0 0 17.8 28.229">
                                                                <g id="Gruppe_969" data-name="Gruppe 969" transform="translate(0.5 0.5)">
                                                                    <path id="Pfad_501" data-name="Pfad 501" d="M12.379,19.6H5.415a.8.8,0,0,1-.8-.8,6.71,6.71,0,0,0-1.837-4.6A8.411,8.411,0,0,1,2.934,2.523,8.315,8.315,0,0,1,8.881,0H8.9a8.414,8.414,0,0,1,8.4,8.428,8.407,8.407,0,0,1-2.3,5.8,6.641,6.641,0,0,0-1.817,4.581.8.8,0,0,1-.8.8Zm0,0" transform="translate(-0.497 0)" fill="#97b753" class="svgDarkGreen svgDarkGreenStroke" stroke="#97b753" stroke-width="1"/>
                                                                    <path id="Pfad_502" data-name="Pfad 502" d="M87.486,388.005H80.731a.8.8,0,0,1,0-1.6h6.755a.8.8,0,0,1,0,1.6Zm0,0" transform="translate(-75.708 -365.86)" fill="#707070" stroke="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke-width="1"/>
                                                                    <path id="Pfad_503" data-name="Pfad 503" d="M87.486,435.8H80.731a.8.8,0,0,1,0-1.6h6.755a.8.8,0,0,1,0,1.6Zm0,0" transform="translate(-75.708 -411.111)" fill="#707070" stroke="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke-width="1"/>
                                                                    <path id="Pfad_504" data-name="Pfad 504" d="M108.372,483.6H104.1a.8.8,0,0,1,0-1.6h4.269a.8.8,0,1,1,0,1.6Zm0,0" transform="translate(-97.837 -456.366)" fill="#707070" stroke="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke-width="1"/>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                        <div class="col-lg-11"><p>{{thread.category.title}}</p></div>
                                                    </div>
                                                </div>
                                                <div class="threadStates col-lg-10 paddingNormalize">
                                                    <div class="row">
                                                        <div class="svgIcons">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="27.681" height="24.848" viewBox="0 0 27.681 24.848">
                                                                <path id="heart" d="M23.644,2.236A6.906,6.906,0,0,0,18.508,0a6.461,6.461,0,0,0-4.035,1.393,8.256,8.256,0,0,0-1.631,1.7,8.251,8.251,0,0,0-1.632-1.7A6.46,6.46,0,0,0,7.174,0,6.906,6.906,0,0,0,2.038,2.236,8.027,8.027,0,0,0,0,7.718a9.559,9.559,0,0,0,2.547,6.257,54.314,54.314,0,0,0,6.376,5.985c.883.753,1.885,1.606,2.925,2.516a1.508,1.508,0,0,0,1.985,0c1.04-.909,2.042-1.763,2.926-2.517a54.284,54.284,0,0,0,6.376-5.984,9.558,9.558,0,0,0,2.547-6.257,8.026,8.026,0,0,0-2.037-5.482Zm0,0" transform="translate(1 1)" v-bind:fill="[thread.isLiked ? '#B8E269' : '#dedede']" class="svgHeartDarkGrey svgDarkGreyStroke" stroke="#707070" stroke-width="2"/>
                                                            </svg>
                                                        </div>
                                                        <div class="svgIconText">
                                                            <p>{{thread.likes}}</p>
                                                        </div>
                                                        <div class="svgIcons">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="34.556" height="26.57" viewBox="0 0 34.556 26.57">
                                                                <g id="Gruppe_971" data-name="Gruppe 971" transform="translate(0.5 0.5)">
                                                                    <path id="Vereinigungsmenge_2" data-name="Vereinigungsmenge 2" d="M1.774,25.151A1.561,1.561,0,0,1,1.7,22.945l2.251-2.413A10.763,10.763,0,0,1,0,12.486C0,5.59,7.511,0,16.778,0S33.556,5.59,33.556,12.486,26.043,24.971,16.778,24.971A20.649,20.649,0,0,1,6.509,22.361L3.98,25.073a1.56,1.56,0,0,1-2.206.077Z" transform="translate(0)" fill="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke="#707070" stroke-width="1"/>
                                                                    <g id="Ellipse_3" data-name="Ellipse 3" transform="translate(8.168 10.954)" fill="#fff" stroke="#fff" class="svgWhite svgWhiteStroke" stroke-width="1">
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.69" ry="1.69" stroke="none"/>
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.19" ry="1.19" fill="none"/>
                                                                    </g>
                                                                    <g id="Ellipse_4" data-name="Ellipse 4" transform="translate(14.926 10.954)" fill="#fff" stroke="#fff" class="svgWhite svgWhiteStroke" stroke-width="1">
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.69" ry="1.69" stroke="none"/>
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.19" ry="1.19" fill="none"/>
                                                                    </g>
                                                                    <g id="Ellipse_5" data-name="Ellipse 5" transform="translate(21.684 10.954)" fill="#fff" stroke="#fff" class="svgWhite svgWhiteStroke" stroke-width="1">
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.69" ry="1.69" stroke="none"/>
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.19" ry="1.19" fill="none"/>
                                                                    </g>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                        <div class="svgIconText">
                                                            <p>{{thread.postsMade}}</p>
                                                        </div>

                                                        <div class="svgIcons">
                                                            <svg id="calendar" xmlns="http://www.w3.org/2000/svg" width="29" height="29" viewBox="0 0 29 29">
                                                                <path id="Pfad_319" data-name="Pfad 319" d="M64.906,239.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906H64.906a.907.907,0,0,0-.906.906V238.6A.907.907,0,0,0,64.906,239.5Zm0,0" transform="translate(-60.375 -221.376)" fill="#707070" class="svgDarkGrey"/>
                                                                <path id="Pfad_320" data-name="Pfad 320" d="M64.906,367.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906H64.906a.907.907,0,0,0-.906.906V366.6A.907.907,0,0,0,64.906,367.5Zm0,0" transform="translate(-60.375 -342.126)" fill="#707070" class="svgDarkGrey"/>
                                                                <path id="Pfad_321" data-name="Pfad 321" d="M214.238,239.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906h-3.021a.907.907,0,0,0-.906.906V238.6A.907.907,0,0,0,214.238,239.5Zm0,0" transform="translate(-201.249 -221.376)" fill="#707070"class="svgDarkGrey"/>
                                                                <path id="Pfad_322" data-name="Pfad 322" d="M214.238,367.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906h-3.021a.907.907,0,0,0-.906.906V366.6A.907.907,0,0,0,214.238,367.5Zm0,0" transform="translate(-201.249 -342.126)" fill="#707070" class="svgDarkGrey"/>
                                                                <path id="Pfad_323" data-name="Pfad 323" d="M363.574,239.5H366.6a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906h-3.021a.907.907,0,0,0-.906.906V238.6A.907.907,0,0,0,363.574,239.5Zm0,0" transform="translate(-342.126 -221.376)" fill="#707070"class="svgDarkGrey"/>
                                                                <path id="Pfad_324" data-name="Pfad 324" d="M25.375,3.625H24.167V1.208A1.209,1.209,0,0,0,22.958,0H21.75a1.209,1.209,0,0,0-1.208,1.208V3.625H8.458V1.208A1.209,1.209,0,0,0,7.25,0H6.042A1.209,1.209,0,0,0,4.833,1.208V3.625H3.625A3.629,3.629,0,0,0,0,7.25V25.375A3.629,3.629,0,0,0,3.625,29h21.75A3.629,3.629,0,0,0,29,25.375V7.25a3.629,3.629,0,0,0-3.625-3.625Zm1.208,21.75a1.21,1.21,0,0,1-1.208,1.208H3.625a1.21,1.21,0,0,1-1.208-1.208V12.132H26.583Zm0,0" transform="translate(0)" fill="#707070" class="svgDarkGrey"/>
                                                            </svg>
                                                        </div>
                                                        <div class="svgIconText">
                                                            <p>{{thread.created}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-1 text-center">
                                            <img class="forumPics" v-bind:src="thread.userPic">
                                        </div>
                                    </router-link>
                                </div>
                            </div>
                        </div>
                        <div v-else>
                        </div>
                    </div>
                </div>

            </div>

            <div v-if="showPlantCategoriesBool === true" class="pflanzenSubCategories container-fluid paddingNormalize" @click="showSummerSubCategories">
                <div class="row subCategories dropShadow pflanzenSub">
                    <div class="col-lg-11">
                        <div class="row">
                            <h4 class="subCategoryHeadline">Sommerblüher</h4>
                        </div>
                    </div>
                    <div class="col-lg-1 svgSortSubCategories text-right">
                        <svg xmlns="http://www.w3.org/2000/svg" width="41" height="49" viewBox="0 0 41 49" id="summerArrow">
                            <g id="Polygon_98" data-name="Polygon 98" transform="translate(41) rotate(90)" fill="#707070" class="svgArrowGreyFill">
                                <path d="M 41.95000839233398 39.99999618530273 L 7.049990177154541 39.99999618530273 C 5.956009864807129 39.99999618530273 4.980579853057861 39.43193817138672 4.440720081329346 38.48043823242188 C 3.900860071182251 37.52893829345703 3.913579940795898 36.40022659301758 4.47475004196167 35.46112823486328 L 21.92476081848145 6.259088039398193 C 22.47146987915039 5.344167709350586 23.43417930603027 4.797947883605957 24.5 4.797947883605957 C 25.56582069396973 4.797947883605957 26.52853012084961 5.344167709350586 27.07525062561035 6.259088039398193 L 44.52524948120117 35.46113967895508 C 45.08641815185547 36.40022659301758 45.09914016723633 37.52893829345703 44.55928039550781 38.48043823242188 C 44.01942825317383 39.43193817138672 43.04399871826172 39.99999618530273 41.95000839233398 39.99999618530273 Z" stroke="none"/>
                                <path d="M 24.5 5.797946929931641 C 24.15880966186523 5.797946929931641 23.30853080749512 5.892868041992188 22.78317070007324 6.772037506103516 L 5.333160400390625 35.97408676147461 C 4.793918609619141 36.87648773193359 5.137660980224609 37.68236923217773 5.310470581054688 37.98695755004883 C 5.483291625976563 38.29154968261719 5.998741149902344 39 7.049991607666016 39 L 41.95000839233398 39 C 43.00125122070313 39 43.51670074462891 38.29154968261719 43.68952178955078 37.98695755004883 C 43.86233901977539 37.68236923217773 44.20608139038086 36.87649917602539 43.66683959960938 35.97408676147461 L 26.21682929992676 6.772037506103516 C 25.69146919250488 5.892868041992188 24.84119033813477 5.797946929931641 24.5 5.797946929931641 M 24.5 3.797950744628906 C 25.82877731323242 3.797950744628906 27.15755462646484 4.447341918945313 27.93366050720215 5.746128082275391 L 45.38367080688477 34.94817733764648 C 46.97689056396484 37.61438751220703 45.05598068237305 40.99999618530273 41.95000839233398 40.99999618530273 L 7.049991607666016 40.99999618530273 C 3.944019317626953 40.99999618530273 2.023101806640625 37.61438751220703 3.616329193115234 34.94817733764648 L 21.06633949279785 5.746128082275391 C 21.84244537353516 4.447341918945313 23.17122268676758 3.797950744628906 24.5 3.797950744628906 Z" stroke="none" fill="#707070" class="svgArrowGreyFill"/>
                            </g>
                        </svg>
                    </div>
                </div>
                <div v-if="showSummerSubCategoryBool === true" class="pflanzenSubCategories container-fluid paddingNormalize">

                    <!-- Threaddisplay -->
                    <div v-for="thread in threads">
                        <div v-if="thread.category.title === 'Sommerblüher'">
                            <div class="row threadBackground dropShadow pflanzenSub">
                                <div class="container-fluid">
                                    <router-link :to="'/forum/' + thread.id" class="row thread dropSchadow">
                                        <div class="col-lg-11">
                                            <div class="row">
                                                <h3 class="threadHeadline">{{thread.headline}}</h3>
                                            </div>

                                            <div class="row">

                                                <div class="threadCategory threadStates col-lg-2">
                                                    <div class="row">
                                                        <div class="svgIconCategory col-lg-1 paddingNormalize">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="17.8" height="28.229" viewBox="0 0 17.8 28.229">
                                                                <g id="Gruppe_969" data-name="Gruppe 969" transform="translate(0.5 0.5)">
                                                                    <path id="Pfad_501" data-name="Pfad 501" d="M12.379,19.6H5.415a.8.8,0,0,1-.8-.8,6.71,6.71,0,0,0-1.837-4.6A8.411,8.411,0,0,1,2.934,2.523,8.315,8.315,0,0,1,8.881,0H8.9a8.414,8.414,0,0,1,8.4,8.428,8.407,8.407,0,0,1-2.3,5.8,6.641,6.641,0,0,0-1.817,4.581.8.8,0,0,1-.8.8Zm0,0" transform="translate(-0.497 0)" fill="#97b753" class="svgDarkGreen svgDarkGreenStroke" stroke="#97b753" stroke-width="1"/>
                                                                    <path id="Pfad_502" data-name="Pfad 502" d="M87.486,388.005H80.731a.8.8,0,0,1,0-1.6h6.755a.8.8,0,0,1,0,1.6Zm0,0" transform="translate(-75.708 -365.86)" fill="#707070" stroke="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke-width="1"/>
                                                                    <path id="Pfad_503" data-name="Pfad 503" d="M87.486,435.8H80.731a.8.8,0,0,1,0-1.6h6.755a.8.8,0,0,1,0,1.6Zm0,0" transform="translate(-75.708 -411.111)" fill="#707070" stroke="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke-width="1"/>
                                                                    <path id="Pfad_504" data-name="Pfad 504" d="M108.372,483.6H104.1a.8.8,0,0,1,0-1.6h4.269a.8.8,0,1,1,0,1.6Zm0,0" transform="translate(-97.837 -456.366)" fill="#707070" stroke="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke-width="1"/>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                        <div class="col-lg-11"><p>{{thread.category.title}}</p></div>
                                                    </div>
                                                </div>
                                                <div class="threadStates col-lg-10 paddingNormalize">
                                                    <div class="row">
                                                        <div class="svgIcons">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="27.681" height="24.848" viewBox="0 0 27.681 24.848">
                                                                <path id="heart" d="M23.644,2.236A6.906,6.906,0,0,0,18.508,0a6.461,6.461,0,0,0-4.035,1.393,8.256,8.256,0,0,0-1.631,1.7,8.251,8.251,0,0,0-1.632-1.7A6.46,6.46,0,0,0,7.174,0,6.906,6.906,0,0,0,2.038,2.236,8.027,8.027,0,0,0,0,7.718a9.559,9.559,0,0,0,2.547,6.257,54.314,54.314,0,0,0,6.376,5.985c.883.753,1.885,1.606,2.925,2.516a1.508,1.508,0,0,0,1.985,0c1.04-.909,2.042-1.763,2.926-2.517a54.284,54.284,0,0,0,6.376-5.984,9.558,9.558,0,0,0,2.547-6.257,8.026,8.026,0,0,0-2.037-5.482Zm0,0" transform="translate(1 1)" v-bind:fill="[thread.isLiked ? '#B8E269' : '#dedede']" class="svgHeartDarkGrey svgDarkGreyStroke" stroke="#707070" stroke-width="2"/>
                                                            </svg>
                                                        </div>
                                                        <div class="svgIconText">
                                                            <p>{{thread.likes}}</p>
                                                        </div>
                                                        <div class="svgIcons">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="34.556" height="26.57" viewBox="0 0 34.556 26.57">
                                                                <g id="Gruppe_971" data-name="Gruppe 971" transform="translate(0.5 0.5)">
                                                                    <path id="Vereinigungsmenge_2" data-name="Vereinigungsmenge 2" d="M1.774,25.151A1.561,1.561,0,0,1,1.7,22.945l2.251-2.413A10.763,10.763,0,0,1,0,12.486C0,5.59,7.511,0,16.778,0S33.556,5.59,33.556,12.486,26.043,24.971,16.778,24.971A20.649,20.649,0,0,1,6.509,22.361L3.98,25.073a1.56,1.56,0,0,1-2.206.077Z" transform="translate(0)" fill="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke="#707070" stroke-width="1"/>
                                                                    <g id="Ellipse_3" data-name="Ellipse 3" transform="translate(8.168 10.954)" fill="#fff" stroke="#fff" class="svgWhite svgWhiteStroke" stroke-width="1">
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.69" ry="1.69" stroke="none"/>
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.19" ry="1.19" fill="none"/>
                                                                    </g>
                                                                    <g id="Ellipse_4" data-name="Ellipse 4" transform="translate(14.926 10.954)" fill="#fff" stroke="#fff" class="svgWhite svgWhiteStroke" stroke-width="1">
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.69" ry="1.69" stroke="none"/>
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.19" ry="1.19" fill="none"/>
                                                                    </g>
                                                                    <g id="Ellipse_5" data-name="Ellipse 5" transform="translate(21.684 10.954)" fill="#fff" stroke="#fff" class="svgWhite svgWhiteStroke" stroke-width="1">
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.69" ry="1.69" stroke="none"/>
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.19" ry="1.19" fill="none"/>
                                                                    </g>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                        <div class="svgIconText">
                                                            <p>{{thread.postsMade}}</p>
                                                        </div>

                                                        <div class="svgIcons">
                                                            <svg id="calendar" xmlns="http://www.w3.org/2000/svg" width="29" height="29" viewBox="0 0 29 29">
                                                                <path id="Pfad_319" data-name="Pfad 319" d="M64.906,239.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906H64.906a.907.907,0,0,0-.906.906V238.6A.907.907,0,0,0,64.906,239.5Zm0,0" transform="translate(-60.375 -221.376)" fill="#707070" class="svgDarkGrey"/>
                                                                <path id="Pfad_320" data-name="Pfad 320" d="M64.906,367.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906H64.906a.907.907,0,0,0-.906.906V366.6A.907.907,0,0,0,64.906,367.5Zm0,0" transform="translate(-60.375 -342.126)" fill="#707070" class="svgDarkGrey"/>
                                                                <path id="Pfad_321" data-name="Pfad 321" d="M214.238,239.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906h-3.021a.907.907,0,0,0-.906.906V238.6A.907.907,0,0,0,214.238,239.5Zm0,0" transform="translate(-201.249 -221.376)" fill="#707070"class="svgDarkGrey"/>
                                                                <path id="Pfad_322" data-name="Pfad 322" d="M214.238,367.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906h-3.021a.907.907,0,0,0-.906.906V366.6A.907.907,0,0,0,214.238,367.5Zm0,0" transform="translate(-201.249 -342.126)" fill="#707070" class="svgDarkGrey"/>
                                                                <path id="Pfad_323" data-name="Pfad 323" d="M363.574,239.5H366.6a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906h-3.021a.907.907,0,0,0-.906.906V238.6A.907.907,0,0,0,363.574,239.5Zm0,0" transform="translate(-342.126 -221.376)" fill="#707070"class="svgDarkGrey"/>
                                                                <path id="Pfad_324" data-name="Pfad 324" d="M25.375,3.625H24.167V1.208A1.209,1.209,0,0,0,22.958,0H21.75a1.209,1.209,0,0,0-1.208,1.208V3.625H8.458V1.208A1.209,1.209,0,0,0,7.25,0H6.042A1.209,1.209,0,0,0,4.833,1.208V3.625H3.625A3.629,3.629,0,0,0,0,7.25V25.375A3.629,3.629,0,0,0,3.625,29h21.75A3.629,3.629,0,0,0,29,25.375V7.25a3.629,3.629,0,0,0-3.625-3.625Zm1.208,21.75a1.21,1.21,0,0,1-1.208,1.208H3.625a1.21,1.21,0,0,1-1.208-1.208V12.132H26.583Zm0,0" transform="translate(0)" fill="#707070" class="svgDarkGrey"/>
                                                            </svg>
                                                        </div>
                                                        <div class="svgIconText">
                                                            <p>{{thread.created}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-1 text-center">
                                            <img class="forumPics" v-bind:src="thread.userPic">
                                        </div>
                                    </router-link>
                                </div>
                            </div>
                        </div>
                        <div v-else>
                        </div>
                    </div>
                </div>

            </div>

            <div v-if="showPlantCategoriesBool === true" class="pflanzenSubCategories container-fluid paddingNormalize" @click="showFallSubCategories">
                <div class="row subCategories dropShadow pflanzenSub">
                    <div class="col-lg-11">
                        <div class="row">
                            <h4 class="subCategoryHeadline">Herbstblüher</h4>
                        </div>
                    </div>
                    <div class="col-lg-1 svgSortSubCategories text-right">
                        <svg xmlns="http://www.w3.org/2000/svg" width="41" height="49" viewBox="0 0 41 49" id="fallArrow">
                            <g id="Polygon_98" data-name="Polygon 98" transform="translate(41) rotate(90)" fill="#707070" class="svgArrowGreyFill">
                                <path d="M 41.95000839233398 39.99999618530273 L 7.049990177154541 39.99999618530273 C 5.956009864807129 39.99999618530273 4.980579853057861 39.43193817138672 4.440720081329346 38.48043823242188 C 3.900860071182251 37.52893829345703 3.913579940795898 36.40022659301758 4.47475004196167 35.46112823486328 L 21.92476081848145 6.259088039398193 C 22.47146987915039 5.344167709350586 23.43417930603027 4.797947883605957 24.5 4.797947883605957 C 25.56582069396973 4.797947883605957 26.52853012084961 5.344167709350586 27.07525062561035 6.259088039398193 L 44.52524948120117 35.46113967895508 C 45.08641815185547 36.40022659301758 45.09914016723633 37.52893829345703 44.55928039550781 38.48043823242188 C 44.01942825317383 39.43193817138672 43.04399871826172 39.99999618530273 41.95000839233398 39.99999618530273 Z" stroke="none"/>
                                <path d="M 24.5 5.797946929931641 C 24.15880966186523 5.797946929931641 23.30853080749512 5.892868041992188 22.78317070007324 6.772037506103516 L 5.333160400390625 35.97408676147461 C 4.793918609619141 36.87648773193359 5.137660980224609 37.68236923217773 5.310470581054688 37.98695755004883 C 5.483291625976563 38.29154968261719 5.998741149902344 39 7.049991607666016 39 L 41.95000839233398 39 C 43.00125122070313 39 43.51670074462891 38.29154968261719 43.68952178955078 37.98695755004883 C 43.86233901977539 37.68236923217773 44.20608139038086 36.87649917602539 43.66683959960938 35.97408676147461 L 26.21682929992676 6.772037506103516 C 25.69146919250488 5.892868041992188 24.84119033813477 5.797946929931641 24.5 5.797946929931641 M 24.5 3.797950744628906 C 25.82877731323242 3.797950744628906 27.15755462646484 4.447341918945313 27.93366050720215 5.746128082275391 L 45.38367080688477 34.94817733764648 C 46.97689056396484 37.61438751220703 45.05598068237305 40.99999618530273 41.95000839233398 40.99999618530273 L 7.049991607666016 40.99999618530273 C 3.944019317626953 40.99999618530273 2.023101806640625 37.61438751220703 3.616329193115234 34.94817733764648 L 21.06633949279785 5.746128082275391 C 21.84244537353516 4.447341918945313 23.17122268676758 3.797950744628906 24.5 3.797950744628906 Z" stroke="none" fill="#707070" class="svgArrowGreyFill"/>
                            </g>
                        </svg>
                    </div>
                </div>
                <div v-if="showFallSubCategoryBool === true" class="pflanzenSubCategories container-fluid paddingNormalize">

                    <!-- Threaddisplay -->
                    <div v-for="thread in threads">
                        <div v-if="thread.category.title === 'Herbstblüher'">
                            <div class="row threadBackground dropShadow pflanzenSub">
                                <div class="container-fluid">
                                    <router-link :to="'/forum/' + thread.id" class="row thread dropSchadow">
                                        <div class="col-lg-11">
                                            <div class="row">
                                                <h3 class="threadHeadline">{{thread.headline}}</h3>
                                            </div>

                                            <div class="row">

                                                <div class="threadCategory threadStates col-lg-2">
                                                    <div class="row">
                                                        <div class="svgIconCategory col-lg-1 paddingNormalize">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="17.8" height="28.229" viewBox="0 0 17.8 28.229">
                                                                <g id="Gruppe_969" data-name="Gruppe 969" transform="translate(0.5 0.5)">
                                                                    <path id="Pfad_501" data-name="Pfad 501" d="M12.379,19.6H5.415a.8.8,0,0,1-.8-.8,6.71,6.71,0,0,0-1.837-4.6A8.411,8.411,0,0,1,2.934,2.523,8.315,8.315,0,0,1,8.881,0H8.9a8.414,8.414,0,0,1,8.4,8.428,8.407,8.407,0,0,1-2.3,5.8,6.641,6.641,0,0,0-1.817,4.581.8.8,0,0,1-.8.8Zm0,0" transform="translate(-0.497 0)" fill="#97b753" class="svgDarkGreen svgDarkGreenStroke" stroke="#97b753" stroke-width="1"/>
                                                                    <path id="Pfad_502" data-name="Pfad 502" d="M87.486,388.005H80.731a.8.8,0,0,1,0-1.6h6.755a.8.8,0,0,1,0,1.6Zm0,0" transform="translate(-75.708 -365.86)" fill="#707070" stroke="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke-width="1"/>
                                                                    <path id="Pfad_503" data-name="Pfad 503" d="M87.486,435.8H80.731a.8.8,0,0,1,0-1.6h6.755a.8.8,0,0,1,0,1.6Zm0,0" transform="translate(-75.708 -411.111)" fill="#707070" stroke="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke-width="1"/>
                                                                    <path id="Pfad_504" data-name="Pfad 504" d="M108.372,483.6H104.1a.8.8,0,0,1,0-1.6h4.269a.8.8,0,1,1,0,1.6Zm0,0" transform="translate(-97.837 -456.366)" fill="#707070" stroke="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke-width="1"/>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                        <div class="col-lg-11"><p>{{thread.category.title}}</p></div>
                                                    </div>
                                                </div>
                                                <div class="threadStates col-lg-10 paddingNormalize">
                                                    <div class="row">
                                                        <div class="svgIcons">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="27.681" height="24.848" viewBox="0 0 27.681 24.848">
                                                                <path id="heart" d="M23.644,2.236A6.906,6.906,0,0,0,18.508,0a6.461,6.461,0,0,0-4.035,1.393,8.256,8.256,0,0,0-1.631,1.7,8.251,8.251,0,0,0-1.632-1.7A6.46,6.46,0,0,0,7.174,0,6.906,6.906,0,0,0,2.038,2.236,8.027,8.027,0,0,0,0,7.718a9.559,9.559,0,0,0,2.547,6.257,54.314,54.314,0,0,0,6.376,5.985c.883.753,1.885,1.606,2.925,2.516a1.508,1.508,0,0,0,1.985,0c1.04-.909,2.042-1.763,2.926-2.517a54.284,54.284,0,0,0,6.376-5.984,9.558,9.558,0,0,0,2.547-6.257,8.026,8.026,0,0,0-2.037-5.482Zm0,0" transform="translate(1 1)" v-bind:fill="[thread.isLiked ? '#B8E269' : '#dedede']" class="svgHeartDarkGrey svgDarkGreyStroke" stroke="#707070" stroke-width="2"/>
                                                            </svg>
                                                        </div>
                                                        <div class="svgIconText">
                                                            <p>{{thread.likes}}</p>
                                                        </div>
                                                        <div class="svgIcons">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="34.556" height="26.57" viewBox="0 0 34.556 26.57">
                                                                <g id="Gruppe_971" data-name="Gruppe 971" transform="translate(0.5 0.5)">
                                                                    <path id="Vereinigungsmenge_2" data-name="Vereinigungsmenge 2" d="M1.774,25.151A1.561,1.561,0,0,1,1.7,22.945l2.251-2.413A10.763,10.763,0,0,1,0,12.486C0,5.59,7.511,0,16.778,0S33.556,5.59,33.556,12.486,26.043,24.971,16.778,24.971A20.649,20.649,0,0,1,6.509,22.361L3.98,25.073a1.56,1.56,0,0,1-2.206.077Z" transform="translate(0)" fill="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke="#707070" stroke-width="1"/>
                                                                    <g id="Ellipse_3" data-name="Ellipse 3" transform="translate(8.168 10.954)" fill="#fff" stroke="#fff" class="svgWhite svgWhiteStroke" stroke-width="1">
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.69" ry="1.69" stroke="none"/>
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.19" ry="1.19" fill="none"/>
                                                                    </g>
                                                                    <g id="Ellipse_4" data-name="Ellipse 4" transform="translate(14.926 10.954)" fill="#fff" stroke="#fff" class="svgWhite svgWhiteStroke" stroke-width="1">
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.69" ry="1.69" stroke="none"/>
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.19" ry="1.19" fill="none"/>
                                                                    </g>
                                                                    <g id="Ellipse_5" data-name="Ellipse 5" transform="translate(21.684 10.954)" fill="#fff" stroke="#fff" class="svgWhite svgWhiteStroke" stroke-width="1">
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.69" ry="1.69" stroke="none"/>
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.19" ry="1.19" fill="none"/>
                                                                    </g>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                        <div class="svgIconText">
                                                            <p>{{thread.postsMade}}</p>
                                                        </div>

                                                        <div class="svgIcons">
                                                            <svg id="calendar" xmlns="http://www.w3.org/2000/svg" width="29" height="29" viewBox="0 0 29 29">
                                                                <path id="Pfad_319" data-name="Pfad 319" d="M64.906,239.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906H64.906a.907.907,0,0,0-.906.906V238.6A.907.907,0,0,0,64.906,239.5Zm0,0" transform="translate(-60.375 -221.376)" fill="#707070" class="svgDarkGrey"/>
                                                                <path id="Pfad_320" data-name="Pfad 320" d="M64.906,367.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906H64.906a.907.907,0,0,0-.906.906V366.6A.907.907,0,0,0,64.906,367.5Zm0,0" transform="translate(-60.375 -342.126)" fill="#707070" class="svgDarkGrey"/>
                                                                <path id="Pfad_321" data-name="Pfad 321" d="M214.238,239.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906h-3.021a.907.907,0,0,0-.906.906V238.6A.907.907,0,0,0,214.238,239.5Zm0,0" transform="translate(-201.249 -221.376)" fill="#707070"class="svgDarkGrey"/>
                                                                <path id="Pfad_322" data-name="Pfad 322" d="M214.238,367.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906h-3.021a.907.907,0,0,0-.906.906V366.6A.907.907,0,0,0,214.238,367.5Zm0,0" transform="translate(-201.249 -342.126)" fill="#707070" class="svgDarkGrey"/>
                                                                <path id="Pfad_323" data-name="Pfad 323" d="M363.574,239.5H366.6a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906h-3.021a.907.907,0,0,0-.906.906V238.6A.907.907,0,0,0,363.574,239.5Zm0,0" transform="translate(-342.126 -221.376)" fill="#707070"class="svgDarkGrey"/>
                                                                <path id="Pfad_324" data-name="Pfad 324" d="M25.375,3.625H24.167V1.208A1.209,1.209,0,0,0,22.958,0H21.75a1.209,1.209,0,0,0-1.208,1.208V3.625H8.458V1.208A1.209,1.209,0,0,0,7.25,0H6.042A1.209,1.209,0,0,0,4.833,1.208V3.625H3.625A3.629,3.629,0,0,0,0,7.25V25.375A3.629,3.629,0,0,0,3.625,29h21.75A3.629,3.629,0,0,0,29,25.375V7.25a3.629,3.629,0,0,0-3.625-3.625Zm1.208,21.75a1.21,1.21,0,0,1-1.208,1.208H3.625a1.21,1.21,0,0,1-1.208-1.208V12.132H26.583Zm0,0" transform="translate(0)" fill="#707070" class="svgDarkGrey"/>
                                                            </svg>
                                                        </div>
                                                        <div class="svgIconText">
                                                            <p>{{thread.created}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-1 text-center">
                                            <img class="forumPics" v-bind:src="thread.userPic">
                                        </div>
                                    </router-link>
                                </div>
                            </div>
                        </div>
                        <div v-else>
                        </div>
                    </div>
                </div>

            </div>

            <div v-if="showPlantCategoriesBool === true" class="pflanzenSubCategories container-fluid paddingNormalize" @click="showWinterSubCategories">
                <div class="row subCategories dropShadow pflanzenSub">
                    <div class="col-lg-11">
                        <div class="row">
                            <h4 class="subCategoryHeadline">Winterblüher</h4>
                        </div>
                    </div>
                    <div class="col-lg-1 svgSortSubCategories text-right">
                        <svg xmlns="http://www.w3.org/2000/svg" width="41" height="49" viewBox="0 0 41 49" id="winterArrow">
                            <g id="Polygon_98" data-name="Polygon 98" transform="translate(41) rotate(90)" fill="#707070" class="svgArrowGreyFill">
                                <path d="M 41.95000839233398 39.99999618530273 L 7.049990177154541 39.99999618530273 C 5.956009864807129 39.99999618530273 4.980579853057861 39.43193817138672 4.440720081329346 38.48043823242188 C 3.900860071182251 37.52893829345703 3.913579940795898 36.40022659301758 4.47475004196167 35.46112823486328 L 21.92476081848145 6.259088039398193 C 22.47146987915039 5.344167709350586 23.43417930603027 4.797947883605957 24.5 4.797947883605957 C 25.56582069396973 4.797947883605957 26.52853012084961 5.344167709350586 27.07525062561035 6.259088039398193 L 44.52524948120117 35.46113967895508 C 45.08641815185547 36.40022659301758 45.09914016723633 37.52893829345703 44.55928039550781 38.48043823242188 C 44.01942825317383 39.43193817138672 43.04399871826172 39.99999618530273 41.95000839233398 39.99999618530273 Z" stroke="none"/>
                                <path d="M 24.5 5.797946929931641 C 24.15880966186523 5.797946929931641 23.30853080749512 5.892868041992188 22.78317070007324 6.772037506103516 L 5.333160400390625 35.97408676147461 C 4.793918609619141 36.87648773193359 5.137660980224609 37.68236923217773 5.310470581054688 37.98695755004883 C 5.483291625976563 38.29154968261719 5.998741149902344 39 7.049991607666016 39 L 41.95000839233398 39 C 43.00125122070313 39 43.51670074462891 38.29154968261719 43.68952178955078 37.98695755004883 C 43.86233901977539 37.68236923217773 44.20608139038086 36.87649917602539 43.66683959960938 35.97408676147461 L 26.21682929992676 6.772037506103516 C 25.69146919250488 5.892868041992188 24.84119033813477 5.797946929931641 24.5 5.797946929931641 M 24.5 3.797950744628906 C 25.82877731323242 3.797950744628906 27.15755462646484 4.447341918945313 27.93366050720215 5.746128082275391 L 45.38367080688477 34.94817733764648 C 46.97689056396484 37.61438751220703 45.05598068237305 40.99999618530273 41.95000839233398 40.99999618530273 L 7.049991607666016 40.99999618530273 C 3.944019317626953 40.99999618530273 2.023101806640625 37.61438751220703 3.616329193115234 34.94817733764648 L 21.06633949279785 5.746128082275391 C 21.84244537353516 4.447341918945313 23.17122268676758 3.797950744628906 24.5 3.797950744628906 Z" stroke="none" fill="#707070" class="svgArrowGreyFill"/>
                            </g>
                        </svg>
                    </div>
                </div>
                <div v-if="showWinterSubCategoryBool === true" class="pflanzenSubCategories container-fluid paddingNormalize">

                    <!-- Threaddisplay -->
                    <div v-for="thread in threads">
                        <div v-if="thread.category.title === 'Winterblüher'">
                            <div class="row threadBackground dropShadow pflanzenSub">
                                <div class="container-fluid">
                                    <router-link :to="'/forum/' + thread.id" class="row thread dropSchadow">
                                        <div class="col-lg-11">
                                            <div class="row">
                                                <h3 class="threadHeadline">{{thread.headline}}</h3>
                                            </div>

                                            <div class="row">

                                                <div class="threadCategory threadStates col-lg-2">
                                                    <div class="row">
                                                        <div class="svgIconCategory col-lg-1 paddingNormalize">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="17.8" height="28.229" viewBox="0 0 17.8 28.229">
                                                                <g id="Gruppe_969" data-name="Gruppe 969" transform="translate(0.5 0.5)">
                                                                    <path id="Pfad_501" data-name="Pfad 501" d="M12.379,19.6H5.415a.8.8,0,0,1-.8-.8,6.71,6.71,0,0,0-1.837-4.6A8.411,8.411,0,0,1,2.934,2.523,8.315,8.315,0,0,1,8.881,0H8.9a8.414,8.414,0,0,1,8.4,8.428,8.407,8.407,0,0,1-2.3,5.8,6.641,6.641,0,0,0-1.817,4.581.8.8,0,0,1-.8.8Zm0,0" transform="translate(-0.497 0)" fill="#97b753" class="svgDarkGreen svgDarkGreenStroke" stroke="#97b753" stroke-width="1"/>
                                                                    <path id="Pfad_502" data-name="Pfad 502" d="M87.486,388.005H80.731a.8.8,0,0,1,0-1.6h6.755a.8.8,0,0,1,0,1.6Zm0,0" transform="translate(-75.708 -365.86)" fill="#707070" stroke="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke-width="1"/>
                                                                    <path id="Pfad_503" data-name="Pfad 503" d="M87.486,435.8H80.731a.8.8,0,0,1,0-1.6h6.755a.8.8,0,0,1,0,1.6Zm0,0" transform="translate(-75.708 -411.111)" fill="#707070" stroke="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke-width="1"/>
                                                                    <path id="Pfad_504" data-name="Pfad 504" d="M108.372,483.6H104.1a.8.8,0,0,1,0-1.6h4.269a.8.8,0,1,1,0,1.6Zm0,0" transform="translate(-97.837 -456.366)" fill="#707070" stroke="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke-width="1"/>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                        <div class="col-lg-11"><p>{{thread.category.title}}</p></div>
                                                    </div>
                                                </div>
                                                <div class="threadStates col-lg-10 paddingNormalize">
                                                    <div class="row">
                                                        <div class="svgIcons">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="27.681" height="24.848" viewBox="0 0 27.681 24.848">
                                                                <path id="heart" d="M23.644,2.236A6.906,6.906,0,0,0,18.508,0a6.461,6.461,0,0,0-4.035,1.393,8.256,8.256,0,0,0-1.631,1.7,8.251,8.251,0,0,0-1.632-1.7A6.46,6.46,0,0,0,7.174,0,6.906,6.906,0,0,0,2.038,2.236,8.027,8.027,0,0,0,0,7.718a9.559,9.559,0,0,0,2.547,6.257,54.314,54.314,0,0,0,6.376,5.985c.883.753,1.885,1.606,2.925,2.516a1.508,1.508,0,0,0,1.985,0c1.04-.909,2.042-1.763,2.926-2.517a54.284,54.284,0,0,0,6.376-5.984,9.558,9.558,0,0,0,2.547-6.257,8.026,8.026,0,0,0-2.037-5.482Zm0,0" transform="translate(1 1)" v-bind:fill="[thread.isLiked ? '#B8E269' : '#dedede']" class="svgHeartDarkGrey svgDarkGreyStroke" stroke="#707070" stroke-width="2"/>
                                                            </svg>
                                                        </div>
                                                        <div class="svgIconText">
                                                            <p>{{thread.likes}}</p>
                                                        </div>
                                                        <div class="svgIcons">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="34.556" height="26.57" viewBox="0 0 34.556 26.57">
                                                                <g id="Gruppe_971" data-name="Gruppe 971" transform="translate(0.5 0.5)">
                                                                    <path id="Vereinigungsmenge_2" data-name="Vereinigungsmenge 2" d="M1.774,25.151A1.561,1.561,0,0,1,1.7,22.945l2.251-2.413A10.763,10.763,0,0,1,0,12.486C0,5.59,7.511,0,16.778,0S33.556,5.59,33.556,12.486,26.043,24.971,16.778,24.971A20.649,20.649,0,0,1,6.509,22.361L3.98,25.073a1.56,1.56,0,0,1-2.206.077Z" transform="translate(0)" fill="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke="#707070" stroke-width="1"/>
                                                                    <g id="Ellipse_3" data-name="Ellipse 3" transform="translate(8.168 10.954)" fill="#fff" stroke="#fff" class="svgWhite svgWhiteStroke" stroke-width="1">
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.69" ry="1.69" stroke="none"/>
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.19" ry="1.19" fill="none"/>
                                                                    </g>
                                                                    <g id="Ellipse_4" data-name="Ellipse 4" transform="translate(14.926 10.954)" fill="#fff" stroke="#fff" class="svgWhite svgWhiteStroke" stroke-width="1">
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.69" ry="1.69" stroke="none"/>
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.19" ry="1.19" fill="none"/>
                                                                    </g>
                                                                    <g id="Ellipse_5" data-name="Ellipse 5" transform="translate(21.684 10.954)" fill="#fff" stroke="#fff" class="svgWhite svgWhiteStroke" stroke-width="1">
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.69" ry="1.69" stroke="none"/>
                                                                        <ellipse cx="1.69" cy="1.69" rx="1.19" ry="1.19" fill="none"/>
                                                                    </g>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                        <div class="svgIconText">
                                                            <p>{{thread.postsMade}}</p>
                                                        </div>

                                                        <div class="svgIcons">
                                                            <svg id="calendar" xmlns="http://www.w3.org/2000/svg" width="29" height="29" viewBox="0 0 29 29">
                                                                <path id="Pfad_319" data-name="Pfad 319" d="M64.906,239.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906H64.906a.907.907,0,0,0-.906.906V238.6A.907.907,0,0,0,64.906,239.5Zm0,0" transform="translate(-60.375 -221.376)" fill="#707070" class="svgDarkGrey"/>
                                                                <path id="Pfad_320" data-name="Pfad 320" d="M64.906,367.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906H64.906a.907.907,0,0,0-.906.906V366.6A.907.907,0,0,0,64.906,367.5Zm0,0" transform="translate(-60.375 -342.126)" fill="#707070" class="svgDarkGrey"/>
                                                                <path id="Pfad_321" data-name="Pfad 321" d="M214.238,239.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906h-3.021a.907.907,0,0,0-.906.906V238.6A.907.907,0,0,0,214.238,239.5Zm0,0" transform="translate(-201.249 -221.376)" fill="#707070"class="svgDarkGrey"/>
                                                                <path id="Pfad_322" data-name="Pfad 322" d="M214.238,367.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906h-3.021a.907.907,0,0,0-.906.906V366.6A.907.907,0,0,0,214.238,367.5Zm0,0" transform="translate(-201.249 -342.126)" fill="#707070" class="svgDarkGrey"/>
                                                                <path id="Pfad_323" data-name="Pfad 323" d="M363.574,239.5H366.6a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906h-3.021a.907.907,0,0,0-.906.906V238.6A.907.907,0,0,0,363.574,239.5Zm0,0" transform="translate(-342.126 -221.376)" fill="#707070"class="svgDarkGrey"/>
                                                                <path id="Pfad_324" data-name="Pfad 324" d="M25.375,3.625H24.167V1.208A1.209,1.209,0,0,0,22.958,0H21.75a1.209,1.209,0,0,0-1.208,1.208V3.625H8.458V1.208A1.209,1.209,0,0,0,7.25,0H6.042A1.209,1.209,0,0,0,4.833,1.208V3.625H3.625A3.629,3.629,0,0,0,0,7.25V25.375A3.629,3.629,0,0,0,3.625,29h21.75A3.629,3.629,0,0,0,29,25.375V7.25a3.629,3.629,0,0,0-3.625-3.625Zm1.208,21.75a1.21,1.21,0,0,1-1.208,1.208H3.625a1.21,1.21,0,0,1-1.208-1.208V12.132H26.583Zm0,0" transform="translate(0)" fill="#707070" class="svgDarkGrey"/>
                                                            </svg>
                                                        </div>
                                                        <div class="svgIconText">
                                                            <p>{{thread.created}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-1 text-center">
                                            <img class="forumPics" v-bind:src="thread.userPic">
                                        </div>
                                    </router-link>
                                </div>
                            </div>
                        </div>
                        <div v-else>
                        </div>
                    </div>
                </div>

            </div>

            <!-- End Subcategorydisplay!-->

        <div v-if="showPlantCategoriesBool === true" class="pflanzenSubCategories container-fluid paddingNormalize">

                <!-- Threaddisplay -->
                <div v-for="thread in threads">
                    <div v-if="thread.category.title === 'Pflanzen'">
                        <div class="row threadBackground dropShadow pflanzenSub">
                            <div class="container-fluid">
                                <router-link :to="'/forum/' + thread.id" class="row thread dropSchadow">
                                    <div class="col-lg-11">
                                        <div class="row">
                                            <h3 class="threadHeadline">{{thread.headline}}</h3>
                                        </div>

                                        <div class="row">

                                            <div class="threadCategory threadStates col-lg-2">
                                                <div class="row">
                                                    <div class="svgIconCategory col-lg-1 paddingNormalize">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="17.8" height="28.229" viewBox="0 0 17.8 28.229">
                                                            <g id="Gruppe_969" data-name="Gruppe 969" transform="translate(0.5 0.5)">
                                                                <path id="Pfad_501" data-name="Pfad 501" d="M12.379,19.6H5.415a.8.8,0,0,1-.8-.8,6.71,6.71,0,0,0-1.837-4.6A8.411,8.411,0,0,1,2.934,2.523,8.315,8.315,0,0,1,8.881,0H8.9a8.414,8.414,0,0,1,8.4,8.428,8.407,8.407,0,0,1-2.3,5.8,6.641,6.641,0,0,0-1.817,4.581.8.8,0,0,1-.8.8Zm0,0" transform="translate(-0.497 0)" fill="#97b753" class="svgDarkGreen svgDarkGreenStroke" stroke="#97b753" stroke-width="1"/>
                                                                <path id="Pfad_502" data-name="Pfad 502" d="M87.486,388.005H80.731a.8.8,0,0,1,0-1.6h6.755a.8.8,0,0,1,0,1.6Zm0,0" transform="translate(-75.708 -365.86)" fill="#707070" stroke="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke-width="1"/>
                                                                <path id="Pfad_503" data-name="Pfad 503" d="M87.486,435.8H80.731a.8.8,0,0,1,0-1.6h6.755a.8.8,0,0,1,0,1.6Zm0,0" transform="translate(-75.708 -411.111)" fill="#707070" stroke="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke-width="1"/>
                                                                <path id="Pfad_504" data-name="Pfad 504" d="M108.372,483.6H104.1a.8.8,0,0,1,0-1.6h4.269a.8.8,0,1,1,0,1.6Zm0,0" transform="translate(-97.837 -456.366)" fill="#707070" stroke="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke-width="1"/>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                    <div class="col-lg-11"><p>{{thread.category.title}}</p></div>
                                                </div>
                                            </div>
                                            <div class="threadStates col-lg-10 paddingNormalize">
                                                <div class="row">
                                                    <div class="svgIcons">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="27.681" height="24.848" viewBox="0 0 27.681 24.848">
                                                            <path id="heart" d="M23.644,2.236A6.906,6.906,0,0,0,18.508,0a6.461,6.461,0,0,0-4.035,1.393,8.256,8.256,0,0,0-1.631,1.7,8.251,8.251,0,0,0-1.632-1.7A6.46,6.46,0,0,0,7.174,0,6.906,6.906,0,0,0,2.038,2.236,8.027,8.027,0,0,0,0,7.718a9.559,9.559,0,0,0,2.547,6.257,54.314,54.314,0,0,0,6.376,5.985c.883.753,1.885,1.606,2.925,2.516a1.508,1.508,0,0,0,1.985,0c1.04-.909,2.042-1.763,2.926-2.517a54.284,54.284,0,0,0,6.376-5.984,9.558,9.558,0,0,0,2.547-6.257,8.026,8.026,0,0,0-2.037-5.482Zm0,0" transform="translate(1 1)" v-bind:fill="[thread.isLiked ? '#B8E269' : '#dedede']" class="svgHeartDarkGrey svgDarkGreyStroke" stroke="#707070" stroke-width="2"/>
                                                        </svg>
                                                    </div>
                                                    <div class="svgIconText">
                                                        <p>{{thread.likes}}</p>
                                                    </div>
                                                    <div class="svgIcons">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="34.556" height="26.57" viewBox="0 0 34.556 26.57">
                                                            <g id="Gruppe_971" data-name="Gruppe 971" transform="translate(0.5 0.5)">
                                                                <path id="Vereinigungsmenge_2" data-name="Vereinigungsmenge 2" d="M1.774,25.151A1.561,1.561,0,0,1,1.7,22.945l2.251-2.413A10.763,10.763,0,0,1,0,12.486C0,5.59,7.511,0,16.778,0S33.556,5.59,33.556,12.486,26.043,24.971,16.778,24.971A20.649,20.649,0,0,1,6.509,22.361L3.98,25.073a1.56,1.56,0,0,1-2.206.077Z" transform="translate(0)" fill="#707070" class="svgDarkGrey svgDarkGreyStroke" stroke="#707070" stroke-width="1"/>
                                                                <g id="Ellipse_3" data-name="Ellipse 3" transform="translate(8.168 10.954)" fill="#fff" stroke="#fff" class="svgWhite svgWhiteStroke" stroke-width="1">
                                                                    <ellipse cx="1.69" cy="1.69" rx="1.69" ry="1.69" stroke="none"/>
                                                                    <ellipse cx="1.69" cy="1.69" rx="1.19" ry="1.19" fill="none"/>
                                                                </g>
                                                                <g id="Ellipse_4" data-name="Ellipse 4" transform="translate(14.926 10.954)" fill="#fff" stroke="#fff" class="svgWhite svgWhiteStroke" stroke-width="1">
                                                                    <ellipse cx="1.69" cy="1.69" rx="1.69" ry="1.69" stroke="none"/>
                                                                    <ellipse cx="1.69" cy="1.69" rx="1.19" ry="1.19" fill="none"/>
                                                                </g>
                                                                <g id="Ellipse_5" data-name="Ellipse 5" transform="translate(21.684 10.954)" fill="#fff" stroke="#fff" class="svgWhite svgWhiteStroke" stroke-width="1">
                                                                    <ellipse cx="1.69" cy="1.69" rx="1.69" ry="1.69" stroke="none"/>
                                                                    <ellipse cx="1.69" cy="1.69" rx="1.19" ry="1.19" fill="none"/>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                    <div class="svgIconText">
                                                        <p>{{thread.postsMade}}</p>
                                                    </div>

                                                    <div class="svgIcons">
                                                        <svg id="calendar" xmlns="http://www.w3.org/2000/svg" width="29" height="29" viewBox="0 0 29 29">
                                                            <path id="Pfad_319" data-name="Pfad 319" d="M64.906,239.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906H64.906a.907.907,0,0,0-.906.906V238.6A.907.907,0,0,0,64.906,239.5Zm0,0" transform="translate(-60.375 -221.376)" fill="#707070" class="svgDarkGrey"/>
                                                            <path id="Pfad_320" data-name="Pfad 320" d="M64.906,367.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906H64.906a.907.907,0,0,0-.906.906V366.6A.907.907,0,0,0,64.906,367.5Zm0,0" transform="translate(-60.375 -342.126)" fill="#707070" class="svgDarkGrey"/>
                                                            <path id="Pfad_321" data-name="Pfad 321" d="M214.238,239.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906h-3.021a.907.907,0,0,0-.906.906V238.6A.907.907,0,0,0,214.238,239.5Zm0,0" transform="translate(-201.249 -221.376)" fill="#707070"class="svgDarkGrey"/>
                                                            <path id="Pfad_322" data-name="Pfad 322" d="M214.238,367.5h3.021a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906h-3.021a.907.907,0,0,0-.906.906V366.6A.907.907,0,0,0,214.238,367.5Zm0,0" transform="translate(-201.249 -342.126)" fill="#707070" class="svgDarkGrey"/>
                                                            <path id="Pfad_323" data-name="Pfad 323" d="M363.574,239.5H366.6a.907.907,0,0,0,.906-.906v-3.021a.907.907,0,0,0-.906-.906h-3.021a.907.907,0,0,0-.906.906V238.6A.907.907,0,0,0,363.574,239.5Zm0,0" transform="translate(-342.126 -221.376)" fill="#707070"class="svgDarkGrey"/>
                                                            <path id="Pfad_324" data-name="Pfad 324" d="M25.375,3.625H24.167V1.208A1.209,1.209,0,0,0,22.958,0H21.75a1.209,1.209,0,0,0-1.208,1.208V3.625H8.458V1.208A1.209,1.209,0,0,0,7.25,0H6.042A1.209,1.209,0,0,0,4.833,1.208V3.625H3.625A3.629,3.629,0,0,0,0,7.25V25.375A3.629,3.629,0,0,0,3.625,29h21.75A3.629,3.629,0,0,0,29,25.375V7.25a3.629,3.629,0,0,0-3.625-3.625Zm1.208,21.75a1.21,1.21,0,0,1-1.208,1.208H3.625a1.21,1.21,0,0,1-1.208-1.208V12.132H26.583Zm0,0" transform="translate(0)" fill="#707070" class="svgDarkGrey"/>
                                                        </svg>
                                                    </div>
                                                    <div class="svgIconText">
                                                        <p>{{thread.created}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-1 text-center">
                                        <img class="forumPics" v-bind:src="thread.userPic">
                                    </div>
                                </router-link>
                            </div>
                        </div>
                    </div>
                    <div v-else>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import ThreadForm from "../forms/ThreadForm.vue";

    export default {
        components: {ThreadForm},
        name: "Forum",

        data: function() {
            return{
                isLoading: false,
                errorIndex: '',
                threads: null,
                addPlantForm: false,
                threadSearch: '',
                threadHeadline: 'Neuste Threads',

                showPlantCategoriesBool: false,
                showNewsCategoriesBool: false,
                showTipsCategoriesBool: false,

                showPalmSubCategoryBool: false,
                showHerbalSubCategoryBool: false,
                showVineSubCategoryBool: false,
                showBreedSubCategoryBool: false,
                showWildSubCategoryBool: false,
                showHealSubCategoryBool: false,
                showFleshEatingSubCategoryBool: false,
                showRoomSubCategoryBool: false,
                showSunSubCategoryBool: false,
                showSpringSubCategoryBool: false,
                showSummerSubCategoryBool: false,
                showFallSubCategoryBool: false,
                showWinterSubCategoryBool: false,
            }
        },

        created: function(){
            this.loggedUser = JSON.parse(localStorage.getItem('user'));

            //Retrieve user item from local storage in case of login
            this.$root.$on('loggedIn', () => {
                this.loggedUser = JSON.parse(localStorage.getItem('user'));
            });
            if(this.loggedUser === null){
                this.$router.push('/login');
            }
        },

        mounted: function() {
            console.log(this.loggedUser);

            this.$http.post('/api/threads', {
                userId: this.loggedUser.id,
            }).then(response => {
                this.threads = response.data;
                console.log(this.threads);
            }).catch(error => {
                alert(error);
            });
        },

        computed: {

            filteredThreads: function () {
                if (this.threads == null){
                    return null;
                }
                if (this.threadSearch === ""){
                    return this.threads.reverse();
                }
                return this.threads.filter((thread) => {
                    this.threadHeadline = "Suchergebnisse";
                    return (thread.headline.toLowerCase().match(this.threadSearch.toLowerCase()));
                });
            },

        },

        methods: {
            createThread: function() {
                if (this.addPlantForm === false) {
                    this.addPlantForm = true;
                } else {
                    this.addPlantForm = false;
                }

            },
            showPlantCategories: function() {

                let arrow = document.getElementById("pflanzenArrow");
                console.log(arrow);


                if(this.showPlantCategoriesBool === false) {
                    this.showPlantCategoriesBool = true;
                    document.getElementById("pflanzenArrow").setAttribute("transform", "rotate(90)");
                } else {
                    this.showPlantCategoriesBool = false;
                    document.getElementById("pflanzenArrow").setAttribute("transform", "rotate(0)");
                }
            },
            showNewsCategories: function() {
                let arrow = document.getElementById("newsArrow");
                console.log(arrow);

                if(this.showNewsCategoriesBool === false) {
                    this.showNewsCategoriesBool = true;
                    document.getElementById("newsArrow").setAttribute("transform", "rotate(90)");
                } else {
                    this.showNewsCategoriesBool = false;
                    document.getElementById("newsArrow").setAttribute("transform", "rotate(0)");
                }
            },
            showTipsCategories: function() {
                let arrow = document.getElementById("tipsArrow");
                console.log(arrow);

                if(this.showTipsCategoriesBool === false) {
                    this.showTipsCategoriesBool = true;
                    document.getElementById("tipsArrow").setAttribute("transform", "rotate(90)");
                } else {
                    this.showTipsCategoriesBool = false;
                    document.getElementById("tipsArrow").setAttribute("transform", "rotate(0)");
                }
            },
            showPalmSubCategories: function() {
                let arrow = document.getElementById("palmArrow");
                console.log(arrow);

                if(this.showPalmSubCategoryBool === false) {
                    this.showPalmSubCategoryBool = true;
                    document.getElementById("palmArrow").setAttribute("transform", "rotate(90)");
                } else {
                    this.showPalmSubCategoryBool = false;
                    document.getElementById("palmArrow").setAttribute("transform", "rotate(0)");
                }
            },
            showHerbalSubCategories: function() {
                let arrow = document.getElementById("herbalArrow");
                console.log(arrow);

                if(this.showHerbalSubCategoryBool === false) {
                    this.showHerbalSubCategoryBool = true;
                    document.getElementById("herbalArrow").setAttribute("transform", "rotate(90)");
                } else {
                    this.showHerbalSubCategoryBool = false;
                    document.getElementById("herbalArrow").setAttribute("transform", "rotate(0)");
                }
            },
            showVineSubCategories: function() {
                let arrow = document.getElementById("vineArrow");
                console.log(arrow);

                if(this.showVineSubCategoryBool === false) {
                    this.showVineSubCategoryBool = true;
                    document.getElementById("vineArrow").setAttribute("transform", "rotate(90)");
                } else {
                    this.showVineSubCategoryBool = false;
                    document.getElementById("vineArrow").setAttribute("transform", "rotate(0)");
                }
            },
            showBreedSubCategories: function() {
                let arrow = document.getElementById("breedArrow");
                console.log(arrow);

                if(this.showBreedSubCategoryBool === false) {
                    this.showBreedSubCategoryBool = true;
                    document.getElementById("breedArrow").setAttribute("transform", "rotate(90)");
                } else {
                    this.showBreedSubCategoryBool = false;
                    document.getElementById("breedArrow").setAttribute("transform", "rotate(0)");
                }
            },
            showWildSubCategories: function() {
                let arrow = document.getElementById("wildArrow");
                console.log(arrow);

                if(this.showWildSubCategoryBool === false) {
                    this.showWildSubCategoryBool = true;
                    document.getElementById("wildArrow").setAttribute("transform", "rotate(90)");
                } else {
                    this.showWildSubCategoryBool = false;
                    document.getElementById("wildArrow").setAttribute("transform", "rotate(0)");
                }
            },
            showHealSubCategories: function() {
                let arrow = document.getElementById("healArrow");
                console.log(arrow);

                if(this.showHealSubCategoryBool === false) {
                    this.showHealSubCategoryBool = true;
                    document.getElementById("healArrow").setAttribute("transform", "rotate(90)");
                } else {
                    this.showHealSubCategoryBool = false;
                    document.getElementById("healArrow").setAttribute("transform", "rotate(0)");
                }
            },
            showFleshEatingSubCategories: function() {
                let arrow = document.getElementById("fleshArrow");
                console.log(arrow);

                if(this.showFleshEatingSubCategoryBool === false) {
                    this.showFleshEatingSubCategoryBool = true;
                    document.getElementById("fleshArrow").setAttribute("transform", "rotate(90)");
                } else {
                    this.showFleshEatingSubCategoryBool = false;
                    document.getElementById("fleshArrow").setAttribute("transform", "rotate(0)");
                }
            },
            showSunSubCategories: function() {
                let arrow = document.getElementById("sunArrow");
                console.log(arrow);

                if(this.showSunSubCategoryBool === false) {
                    this.showSunSubCategoryBool = true;
                    document.getElementById("sunArrow").setAttribute("transform", "rotate(90)");
                } else {
                    this.showSunSubCategoryBool = false;
                    document.getElementById("sunArrow").setAttribute("transform", "rotate(0)");
                }
            },
            showRoomSubCategories: function() {
                let arrow = document.getElementById("roomArrow");
                console.log(arrow);

                if(this.showRoomSubCategoryBool === false) {
                    this.showRoomSubCategoryBool = true;
                    document.getElementById("roomArrow").setAttribute("transform", "rotate(90)");
                } else {
                    this.showRoomSubCategoryBool = false;
                    document.getElementById("roomArrow").setAttribute("transform", "rotate(0)");
                }
            },
            showSpringSubCategories: function() {
                let arrow = document.getElementById("springArrow");
                console.log(arrow);

                if(this.showSpringSubCategoryBool === false) {
                    this.showSpringSubCategoryBool = true;
                    document.getElementById("springArrow").setAttribute("transform", "rotate(90)");
                } else {
                    this.showSpringSubCategoryBool = false;
                    document.getElementById("springArrow").setAttribute("transform", "rotate(0)");
                }
            },
            showSummerSubCategories: function() {
                let arrow = document.getElementById("summerArrow");
                console.log(arrow);

                if(this.showSummerSubCategoryBool === false) {
                    this.showSummerSubCategoryBool = true;
                    document.getElementById("summerArrow").setAttribute("transform", "rotate(90)");
                } else {
                    this.showSummerSubCategoryBool = false;
                    document.getElementById("summerArrow").setAttribute("transform", "rotate(0)");
                }
            },
            showFallSubCategories: function() {
                let arrow = document.getElementById("fallArrow");
                console.log(arrow);

                if(this.showFallSubCategoryBool === false) {
                    this.showFallSubCategoryBool = true;
                    document.getElementById("fallArrow").setAttribute("transform", "rotate(90)");
                } else {
                    this.showFallSubCategoryBool = false;
                    document.getElementById("fallArrow").setAttribute("transform", "rotate(0)");
                }
            },
            showWinterSubCategories: function() {
                let arrow = document.getElementById("winterArrow");
                console.log(arrow);

                if(this.showWinterSubCategoryBool === false) {
                    this.showWinterSubCategoryBool = true;
                    document.getElementById("winterArrow").setAttribute("transform", "rotate(90)");
                } else {
                    this.showWinterSubCategoryBool = false;
                    document.getElementById("winterArrow").setAttribute("transform", "rotate(0)");
                }
            }

        }
    }
</script>

<style scoped>
    .thread {
        margin-bottom: 2%;
        border-radius: 10px;
        color: #707070;
        background-color: #F5F5F5;
        padding: 1%;
    }
    .thread:hover {
        color: white;
        background-color: #707070;
    }
    .thread:active {
        color: #707070;
        background-color: #DEDEDE;
    }
    .forumPics {
        max-width: 80px;
        min-width: 50px;
        width: 80%;
        border-radius: 100px;
    }
    .newThread { margin-bottom: 3%; }

    .thread:hover svg .svgDarkGreen { fill: white; }
    .thread:hover svg .svgDarkGreenStroke { stroke: white; }
    .thread:hover svg .svgDarkGrey { fill: #B8E269; }
    .thread:hover svg .svgDarkGreyStroke { stroke: #B8E269; }
    .thread:hover svg .svgWhite { fill: #707070; }
    .thread:hover svg .svgWhiteStroke { stroke: #707070; }

    .thread:active svg .svgDarkGreen { fill: #97B753; }
    .thread:active svg .svgDarkGreenStroke { stroke: #97B753; }
    .thread:active svg .svgDarkGrey { fill: #707070; }
    .thread:active svg .svgHeartDarkGrey { fill: #707070; }
    .thread:active svg .svgDarkGreyStroke { stroke: #707070; }
    .thread:active svg .svgWhite { fill: white; }
    .thread:active svg .svgWhiteStroke { stroke: white; }

    .threadHeadline {
        font-weight: normal;
        font-size: 100%;
    }
    .svgIcons svg { height: 50%; }
    .svgIcons { margin-right: 1%; }
    .svgIconText { margin-right: 3%; }

    .addIcon svg { width: 20%; fill: white; margin-bottom: 2%; }
    .addIcon svg .darkGreen { fill: #97B753; }
    .addIcon svg:hover .darkGreen {  fill: #B8E269; }
    .addIcon svg:active { fill: #B8E269; }
    .addIcon svg:active .darkGreen { fill: #707070;}

    .searchForum svg:hover .searchStroke { stroke: #B8E269; }
    .searchForum svg:active .searchStroke { stroke: #707070; }

    .forumH1 { font-weight: normal; font-size: 150%; }
    .lineUnderHL { margin-top: 1%; margin-bottom: 5%; }

    .sortCategories {
        border-radius: 10px;
        padding: 1%;
        color: white;
        height: 3.5em;
        background-color: #97B753;
        margin-bottom: 2%;
    }
    .sortCategories:hover { background-color: #B8E269; color: #707070; }
    .sortCategories:active { background-color: #707070; color: white; }
    .sortCategories:active .svgSortCategories .svgDarkGreyStroke { stroke: #B8E269; }
    .sortCategories:active .svgSortCategories .svgDarkGreyFill { fill: #B8E269; }

    #sortCategoriesFirst { margin-top: 8%; }
    .svgSortCategories svg { height: 55%; }

    .subCategories {
        border-radius: 10px;
        padding: 1%;
        color: #707070;
        background-color: #dedede;
        margin-bottom: 1%;
        margin-right: 0.5%;
        margin-left: 0.5%;
        height: 3em;
    }

    .threadBackground {
        border-radius: 10px;
        padding: 1%;
        color: #707070;
        background-color: #dedede;
        height: 7em;
        margin-bottom: 1%;
        margin-right: 1%;
        margin-left: 1%;
    }
    
    .subCategoryHeadline {margin-top: 0px}
    .subCategories:hover { background-color: #707070; color: white; }
    .subCategories:hover .svgSortSubCategories svg  .svgArrowGreyFill { fill: white; }
    .subCategories:active { background-color: #B8E269; color: #707070; }
    .subCategories:active .svgSortSubCategories svg .svgArrowGreyFill { fill: #707070; }

    .subCategories svg { height: 50%; }
</style>