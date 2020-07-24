<template>
    <div id="root">
        <div v-if="plantData != null" class="marginLeftRight">
            <!-------------HL---------------->
            <div class="container-fluid">
                <div class="row hlBig">
                    <h1 id="plantDataH1">{{ plantData.name }}</h1>
                </div>

                <!---------------------Plant Picture & Eckdaten------------------------>
                <div class="row" id="baseInfo">

                    <div class="col-lg-3 paddingNormalize" id="plantImgCol">
                        <div id="plantDataImg" class="container-fluid">
                            <div><img :src="'../' + plantData.icon" :tilte="plantData.name" v-b-tooltip.hover :alt="plantData.name" /></div>
                        </div>
                    </div>
                    <div class="hlSmall"><h1 id="plantDataH1">{{ plantData.name }}</h1></div>

                    <div class="col-lg-9 selfAlignCenter" id="baseInfoCnt">
                        <div class="row">
                            <div class="col-lg-4 baseInfoHL"><h5 class="plantDataH5">Lateinischer Name</h5></div>
                            <div class="col-lg-8 baseInfoText"><p class="plantDataPTop">{{ plantData.latinName}}</p></div>
                        </div>
                        <div v-if="plantData.alternativeName != null" class="row">
                            <div class="col-lg-4 baseInfoHL"><h5 class="plantDataH5">Alternative Namen</h5></div>
                            <div class="col-lg-8 baseInfoText"><p class="plantDataPTop">{{ plantData.alternativeName }}</p></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 baseInfoHL"><h5 class="plantDataH5">Gattung</h5></div>
                            <div class="col-lg-8 baseInfoText"><p class="plantDataPTop">{{ plantData.genus }}</p></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 baseInfoHL"><h5 class="plantDataH5">Kategorie</h5></div>
                            <div class="col-lg-8 baseInfoText"><p class="plantDataPTop">{{ plantData.categorySelect }}</p></div>
                        </div>
                        <div v-if="plantData.specialFeatureIcon != null" class="row">
                            <div class="col-lg-4 baseInfoHL"><h5 class="plantDataH5">Besonderheit</h5></div>
                            <div class="col-lg-8 baseInfoText"><p class="plantDataPTop">{{ plantData.specialFeatureIcon }}</p></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 baseInfoHL"><h5 class="plantDataH5">Pflegeaufwand</h5></div>
                            <div class="col-lg-8 baseInfoText"><p class="plantDataPTop">{{ plantData.careLevel }}</p></div>
                        </div>
                    </div>
                </div>

                <div class="row" id="plantDataEckdaten">
                    <div class="col-lg-6" id="plantDataEckdantenLeft">
                        <div class="row">
                            <div class="col-lg-1 plantDataEckdatenIcons">
                                <svg><use href="#locationIcon"></use></svg>
                            </div>
                            <div class="col-lg-11 selfAlignCenter plantDataEckdatenText">{{ plantData.locationIcon }}</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-1 plantDataEckdatenIcons">
                                <svg><use href="#substratIcon"></use></svg>
                            </div>
                            <div class="col-lg-11 selfAlignCenter plantDataEckdatenText">{{ plantData.substrateIcon }}</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-1 plantDataEckdatenIcons">
                                <svg><use href="#wateringAmountIcon"></use></svg>
                            </div>
                            <div class="col-lg-11 selfAlignCenter plantDataEckdatenText">{{ plantData.wateringAmount }}</div>
                        </div>
                        <div v-if="plantData.flowerColor != null" class="row">
                            <div class="col-lg-1 plantDataEckdatenIcons">
                                <svg><use href="#flowerColorIcon "></use></svg>
                            </div>
                            <div class="col-lg-11 selfAlignCenter plantDataEckdatenText">{{ plantData.flowerColor }}</div>
                        </div>
                    </div>
                    <div class="col-lg-6" id="plantDataEckdatenRight">
                        <div class="row">
                            <div class="col-lg-1 plantDataEckdatenIcons selfAlignCenter">
                                <svg><use href="#temperatureIcon"></use></svg>
                            </div>
                            <div class="col-lg-11 selfAlignCenter plantDataEckdatenText">
                                {{ plantData.temperatureIcon }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-1 plantDataEckdatenIcons selfAlignCenter">
                                <svg><use href="#fertiliserIcon"></use></svg>
                            </div>
                            <div class="col-lg-11 selfAlignCenter plantDataEckdatenText">
                                {{ plantData.fertiliserIcon }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-1 plantDataEckdatenIcons selfAlignCenter">
                                <svg><use href="#heightIcon"></use></svg>
                            </div>
                            <div class="col-lg-11 selfAlignCenter plantDataEckdatenText">
                                {{ plantData.heightIcon }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" id="plantDataDetails">
                    <div class="container-fluid">
                        <h3 class="h3Margin">Kurzbeschreibung</h3>
                        <div class="greenLine"></div>
                        <p>{{ plantData.shortDescription }}</p>
                    </div>

                    <div class="container-fluid">
                        <h3 class="h3Margin">Pflegetipps</h3>
                        <div class="greenLine"></div>
                        <p>{{ plantData.careTips }}</p>
                    </div>

                    <div v-if="plantData.specialFeturesAddinfo != null" class="container-flulid">
                        <h3 class="h3Margin">Besonderheiten</h3>
                        <div class="greenLine"></div>
                        <p>{{ plantData.specialFeturesAddinfo }}</p>
                    </div>

                    <div v-if="plantData.locationAddinfo != null" class="container-fluid">
                        <h3 class="h3Margin">Idealer Standort</h3>
                        <div class="greenLine"></div>
                        <p>{{ plantData.locationAddinfo}}</p>
                    </div>

                    <div v-if="plantData.temperatureAddInfo != null" class="container-fluid">
                        <h3 class="h3Margin">Temperatur</h3>
                        <div class="greenLine"></div>
                        <p>{{ plantData.temperatureAddInfo }}</p>
                    </div>

                    <div v-if="plantData.pot != null" class="container-fluid">
                        <h3 class="h3Margin">Topf</h3>
                        <div class="greenLine"></div>
                        <p>{{ plantData.pot }}</p>
                    </div>

                    <div v-if="plantData.wateringAmountAddinfo != null" class="container-fluid">
                        <h3 class="h3Margin">Wasserbedarf</h3>
                        <div class="greenLine"></div>
                        <p>{{ plantData.wateringAmountAddinfo }}</p>
                    </div>

                    <div v-if="plantData.substrateAddinfo != null" class="container-fluid">
                        <h3 class="h3Margin">Erde</h3>
                        <div class="greenLine"></div>
                        <p>{{ plantData.substrateAddinfo }}</p>
                    </div>

                    <div v-if="plantData.fertiliserAddinfo != null" class="container-fluid">
                        <h3 class="h3Margin">Dünger</h3>
                        <div class="greenLine"></div>
                        <p>{{ plantData.fertiliserAddinfo }}</p>
                    </div>

                    <div v-if="plantData.heydayAddinfo != null" class="container-fluid">
                        <h3 class="h3Margin">Blütezeit</h3>
                        <div class="greenLine"></div>
                        <p>{{ plantData.heydayAddinfo }}</p>
                    </div>
                </div>

            </div>

            <div style="display:none;">
                <svg xmlns="http://www.w3.org/2000/svg">
                    <symbol viewBox="0 0 512 512" id="locationIcon">
<path d="M507.8,301.6l-54.8-48.3l52.8-50.4c1.9-1.9,2.7-4.6,2.1-7.2c-0.6-2.6-2.6-4.7-5.2-5.4L432.5,170l26-68.1
	c1-2.5,0.5-5.3-1.2-7.4c-1.7-2.1-4.4-3.1-7-2.7l-72.3,11.7L372.1,31c-0.2-2.7-1.8-5-4.3-6.2c-2.4-1.1-5.3-0.9-7.5,0.6L300,66.8
	l-36.6-63c-1.3-2.3-3.8-3.7-6.5-3.7s-5.2,1.4-6.5,3.7l-42,72.4l-72.7-42c-2.3-1.3-5.2-1.3-7.5,0c-2.3,1.3-3.8,3.8-3.8,6.5l-0.2,72.8
	l-73-6c-2.7-0.2-5.3,1-6.8,3.2c-1.5,2.2-1.8,5-0.6,7.5L75,183.9L6.5,209.6c-2.5,0.9-4.3,3.2-4.8,5.8c-0.4,2.6,0.6,5.3,2.7,7
	L61,268.5l-50.8,52.4c-1.9,1.9-2.6,4.7-1.8,7.3c0.7,2.6,2.8,4.5,5.4,5.2l71.1,17.6l-23.3,69c-0.9,2.5-0.3,5.3,1.5,7.3
	c1.8,2,4.5,2.9,7.1,2.4l71.8-14.4l8.7,72.3c0.3,2.7,2,4.9,4.5,6c2.5,1.1,5.3,0.7,7.5-0.9l58.6-43.6l39.1,59.6
	c1.4,2.2,3.8,3.5,6.4,3.5c0.1,0,0.2,0,0.3,0c2.7-0.1,5.1-1.6,6.4-4l34.1-62.4l61.8,39c2.3,1.4,5.1,1.5,7.5,0.3
	c2.4-1.2,3.9-3.6,4-6.3l3-72.7l72.7,8.8c2.7,0.3,5.3-0.8,6.9-2.9c1.6-2.1,2-5,0.9-7.4l-28.6-67l69.5-23c2.6-0.8,4.5-3,5-5.6
	C510.8,306.1,509.8,303.4,507.8,301.6z M254.4,409.6c-85.6,0-155.1-69.4-155.1-154.9S168.7,99.7,254.4,99.7s155.1,69.4,155.1,154.9
	S340,409.6,254.4,409.6z"/>
                    </symbol>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg">
                    <symbol viewBox="0 0 512 512" id="flowerColorIcon">
                    <g>
                        <path d="M487.7,369.8l-1.1-12.6c-2.9-32.6-31.5-69.1-72.9-93c-3-1.7-6.1-3-9.1-4.5L371,229.7l-65-0.1l-25.8,29.9
                            c-2.9,3-5.7,6.1-7.9,9.7c-22,37.9,22.4,99.5,66.4,125c34,19.6,82.4,32.6,116.9,16.6l11.4-5.3l-7.5-28.2L487.7,369.8z"/>
                        <path d="M256,278.7c-43.8,0-75,69.2-75,120c0,46.2,16.5,86.7,44.1,106.1l10.3,7.3l20.6-20.6l20.6,20.6l10.3-7.3
                            c27.6-19.4,44.1-59.8,44.1-106.1C331,331.4,298.1,278.7,256,278.7L256,278.7z"/>
                        <path d="M239.7,269.3c-21.8-37.8-97.2-30.5-141.4-5c-41.4,23.9-70,60.4-72.9,93l-1.1,12.6l28.2,7.5l-7.5,28.2l11.4,5.3
                            c34.7,16.1,83.3,2.8,116.9-16.6C231.5,360.6,260.7,305.7,239.7,269.3L239.7,269.3z"/>
                        <path d="M173.3,125.5C131.9,101.6,86,95.1,56.3,108.8l-11.4,5.3l7.5,28.2l-28.2,7.6l1.1,12.6c2.9,32.6,31.5,69.1,72.9,92.9
                            c45.4,26.2,116.1,39,141.4-4.9C261.6,212.6,217.3,150.9,173.3,125.5L173.3,125.5z"/>
                        <path d="M286.9,7.3L276.6,0L256,20.6L235.4,0l-10.3,7.3C198.7,25.8,181,72.2,181,121c0,67.3,32.9,120,75,120c43.7,0,75-69,75-120
                            C331,72.2,313.3,25.8,286.9,7.3z"/>
                        <path d="M404.7,259.8c3-1.5,6.3-2.8,9.1-4.4c41.4-23.9,70-60.4,72.9-92.9l1.1-12.6l-28.2-7.6l7.5-28.2l-11.4-5.3
                            c-29.6-13.8-75.5-7.3-116.9,16.6c-45.5,26.3-91.8,81-66.4,124.9c2,3.6,5,6.3,7.9,9.1C304.7,234.6,355.1,234.4,404.7,259.8
                            L404.7,259.8z"/>
                    </g>
                    </symbol>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" >
                    <symbol  viewBox="0 0 512 512" id="fertiliserIcon">
                    <g id="Fertilizer">
                        <g id="Glyph">
                            <path d="M259,1c-37.8,0-103.3,55.9-144.9,98.4c-3.1,3.2-3,8.2,0.1,11.3c1.5,1.5,3.5,2.3,5.6,2.3h277.8c4.4,0,8-3.6,8-8
                                c0-2.1-0.8-4.2-2.3-5.7C361,56.9,294.1,1,259,1z M187,97c-4.4,0-8-3.6-8-8s3.6-8,8-8s8,3.6,8,8S191.4,97,187,97z M219,65
                                c-4.4,0-8-3.6-8-8s3.6-8,8-8s8,3.6,8,8S223.4,65,219,65z M235,97c-4.4,0-8-3.6-8-8s3.6-8,8-8s8,3.6,8,8S239.4,97,235,97z M243,33
                                c-4.4,0-8-3.6-8-8s3.6-8,8-8s8,3.6,8,8S247.4,33,243,33z M259,57c-4.4,0-8-3.6-8-8s3.6-8,8-8s8,3.6,8,8S263.4,57,259,57z M275,97
                                c-4.4,0-8-3.6-8-8s3.6-8,8-8s8,3.6,8,8S279.4,97,275,97z M283,41c-4.4,0-8-3.6-8-8s3.6-8,8-8s8,3.6,8,8S287.4,41,283,41z M299,73
                                c-4.4,0-8-3.6-8-8s3.6-8,8-8s8,3.6,8,8S303.4,73,299,73z M331,97c-4.4,0-8-3.6-8-8s3.6-8,8-8s8,3.6,8,8S335.4,97,331,97z"/>
                            <path d="M475,313c0-20.6-7.1-66.5-13.6-104.1c13.2-1.3,22.8-13,21.5-26.2c-0.5-5.1-2.6-9.9-6-13.7c4.2-4.7,6.4-10.9,6.1-17.2
                                c-0.6-12.9-11.6-22.8-24.5-22.8H51c-8.8,0-16,7.2-16,16l0,0c0,8.8,7.2,16,16,16h264c4.4,0,8,3.6,8,8l0,0c0,4.4-3.6,8-8,8H43
                                c-4.4,0-8,3.6-8,8c0,12.3,9.4,22.7,21.6,23.9C50.1,246.5,43,292.4,43,313c0,83.1,5.1,116.1,7.4,126.5c-2,3.7-15.4,21.1-15.4,25.5
                                c0,19,19.8,31.3,37.4,24.4c133.8,29,225,32.1,373.1,0c17.4,6.9,37.4-5.3,37.4-24.4c0-4.4-13.3-21.8-15.4-25.5
                                C469.9,429.1,475,396.1,475,313z M426.7,177H363c-4.4,0-8-3.6-8-8l0,0c0-4.4,3.6-8,8-8h64c4.4,0,8,3.6,8,8c0,0.2,0,0.4,0,0.5
                                C434.6,173.8,431,177.1,426.7,177z"/>
                        </g>
                    </g>
                    </symbol>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg">
                    <symbol viewBox="0 0 512 388" id="substratIcon">
                    <g>
                        <g id="Glyph">
                            <path d="M298.2,207c22.3-12,36.5-44.7,37.1-46.1c1.7-4.1-0.3-8.9-4.4-10.6c-0.5-0.2-1-0.4-1.5-0.5c-1.5-0.3-36.6-6.5-58.9,5.4
                                c-6,3.2-11.1,7.7-14.9,13.3c-3.8-5.6-8.9-10.1-14.9-13.3c-22.3-12-57.4-5.7-58.9-5.4c-4.4,0.9-7.2,5.1-6.4,9.5
                                c0.1,0.5,0.3,1,0.5,1.5c0.6,1.4,14.8,34.1,37.1,46.1c12.3,6.6,24.5,6.1,35,2.5v19c-20.4,3.2-36.6,19.1-40.1,39.5H192
                                c-4.3-0.1-7.9,3.4-8,7.7c-0.1,4.3,3.4,7.9,7.7,8c0.1,0,0.2,0,0.3,0h128c4.3,0.1,7.9-3.4,8-7.7c0.1-4.3-3.4-7.9-7.7-8
                                c-0.1,0-0.2,0-0.3,0h-17.4c-3.4-19.8-18.8-35.5-38.6-39.2v-19.2C274.4,212.6,287.4,212.8,298.2,207z"/>
                            <path d="M472,188c0-20.6-7.1-66.5-13.6-104.1c13.2-1.3,22.8-13,21.5-26.2c-0.5-5.1-2.6-9.9-6-13.7c4.2-4.7,6.4-10.9,6.1-17.2
                                C479.4,14,468.4,4,455.5,4H48c-8.8,0-16,7.2-16,16l0,0c0,8.8,7.2,16,16,16h264c4.4,0,8,3.6,8,8l0,0c0,4.4-3.6,8-8,8H40
                                c-4.4,0-8,3.6-8,8c0,12.3,9.4,22.7,21.6,23.9C47.1,121.5,40,167.4,40,188c0,83.1,5.1,116.1,7.4,126.5c-2,3.7-15.4,21.1-15.4,25.5
                                c0,19,19.8,31.3,37.4,24.4c133.8,29,225,32.1,373.1,0c17.4,6.9,37.4-5.3,37.4-24.4c0-4.4-13.3-21.8-15.4-25.5
                                C466.9,304.1,472,271.1,472,188z M292,324h-72c-59.6,0-108-48.4-108-108s48.4-108,108-108h72c59.6,0,108,48.4,108,108
                                S351.6,324,292,324z M423.7,52H360c-4.4,0-8-3.6-8-8l0,0c0-4.4,3.6-8,8-8h64c4.4,0,8,3.6,8,8c0,0.2,0,0.4,0,0.5
                                C431.6,48.8,428,52.1,423.7,52z"/>
                        </g>
                    </g>
                    </symbol>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg">
                    <symbol viewBox="0 0 277 512" id="temperatureIcon">
                    <path d="M93.1,114.2v215.5c-28.3,10.5-47.2,37.6-47.2,67.9c0,40,32.5,72.5,72.5,72.5c40,0,72.5-32.5,72.5-72.5
                        c0-30.4-18.9-57.4-47.2-67.9V114.2H93.1z"/>
                    <path d="M262.3,167.4h-43.5c-4.1,0-7.5,3.4-7.5,7.5s3.4,7.5,7.5,7.5h43.5c4.1,0,7.5-3.4,7.5-7.5S266.4,167.4,262.3,167.4z"/>
                    <path d="M218.8,121.7h19.8c4.1,0,7.5-3.4,7.5-7.5c0-4.1-3.4-7.5-7.5-7.5h-19.8c-4.1,0-7.5,3.4-7.5,7.5
                        C211.3,118.3,214.6,121.7,218.8,121.7z"/>
                    <path d="M218.8,60.9h26.8c4.1,0,7.5-3.4,7.5-7.5c0-4.1-3.4-7.5-7.5-7.5h-26.8c-4.1,0-7.5,3.4-7.5,7.5
                        C211.3,57.5,214.6,60.9,218.8,60.9z"/>
                    <path d="M245.5,289h-26.8c-4.1,0-7.5,3.4-7.5,7.5c0,4.1,3.4,7.5,7.5,7.5h26.8c4.1,0,7.5-3.4,7.5-7.5C253,292.4,249.7,289,245.5,289z
                        "/>
                    <path d="M218.8,243.2h19.8c4.1,0,7.5-3.4,7.5-7.5c0-4.1-3.4-7.5-7.5-7.5h-19.8c-4.1,0-7.5,3.4-7.5,7.5
                        C211.3,239.9,214.6,243.2,218.8,243.2z"/>
                    <path d="M186.2,309.8v-242c0-37.4-30.4-67.8-67.8-67.8C81,0,50.6,30.4,50.6,67.8v242c-28,21.2-44.6,54.5-44.6,89.7
                        c0,62,50.5,112.5,112.5,112.5c62,0,112.5-50.5,112.5-112.5C230.9,364.3,214.3,331,186.2,309.8z M118.4,497
                        c-53.7,0-97.5-43.7-97.5-97.5c0-31.7,15.5-61.5,41.5-79.8c2-1.4,3.2-3.7,3.2-6.1V67.8c0-29.1,23.7-52.8,52.8-52.8
                        c29.1,0,52.8,23.7,52.8,52.8v245.8c0,2.4,1.2,4.7,3.2,6.1c26,18.3,41.5,48.1,41.5,79.8C215.9,453.3,172.1,497,118.4,497z"/>
                    <path d="M151.2,324.7V67.8c0-18.1-14.7-32.8-32.8-32.8c-18.1,0-32.8,14.7-32.8,32.8v192.6c0,4.1,3.4,7.5,7.5,7.5s7.5-3.4,7.5-7.5
                        V121.7h35.7v208c0,3.1,1.9,5.9,4.9,7c25.3,9.4,42.3,33.9,42.3,60.9c0,35.8-29.2,65-65,65c-35.8,0-65-29.2-65-65
                        c0-27,17-51.5,42.3-60.9c2.9-1.1,4.9-3.9,4.9-7v-39.2c0-4.1-3.4-7.5-7.5-7.5s-7.5,3.4-7.5,7.5v34.2c-28.4,12.8-47.2,41.5-47.2,72.9
                        c0,44.1,35.9,80,80,80c44.1,0,80-35.9,80-80C198.4,366.2,179.6,337.5,151.2,324.7z M100.6,106.7V67.8c0-9.8,8-17.8,17.8-17.8
                        c9.8,0,17.8,8,17.8,17.8v38.8H100.6z"/>
                    </symbol>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg">
                    <symbol viewBox="0 0 63.465 63.465" id="heightIcon">
                    <path id="king-size" d="M51.831,15.016,41.56,25.287h7.03a2.479,2.479,0,1,1,0,4.958h-9.3a6.2,6.2,0,0,1-6.2-6.2v-9.3a2.479,2.479,0,1,1,4.958,0v7.03l10.27-10.27a2.479,2.479,0,0,1,3.507,3.506ZM28.014,50.821a2.479,2.479,0,0,0,2.479-2.479v-9.3a6.2,6.2,0,0,0-6.2-6.2H15a2.479,2.479,0,1,0,0,4.958h7.03L11.758,48.077a2.479,2.479,0,0,0,3.507,3.506l10.27-10.27v7.03a2.479,2.479,0,0,0,2.479,2.479Zm32.972-7.189a2.479,2.479,0,0,0,2.479-2.479V9.916A9.927,9.927,0,0,0,53.548,0H9.916A9.927,9.927,0,0,0,0,9.916V53.548a9.927,9.927,0,0,0,9.916,9.916H53.548a9.927,9.927,0,0,0,9.916-9.916,2.479,2.479,0,1,0-4.958,0,4.964,4.964,0,0,1-4.958,4.958H9.916a4.964,4.964,0,0,1-4.958-4.958V9.916A4.964,4.964,0,0,1,9.916,4.958H53.548a4.964,4.964,0,0,1,4.958,4.958V41.153A2.479,2.479,0,0,0,60.986,43.632Zm0,0" fill="#97b753"/>
                    </symbol>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" >
                    <symbol viewBox="0 0 39.355 62.318" id="wateringAmountIcon">
                    <path id="Pfad_371" data-name="Pfad 371" d="M46.867,425.31a19.678,19.678,0,1,1-39.355,0c0-8.9,13.184-33.135,17.968-41.639a1.96,1.96,0,0,1,3.417,0c4.786,8.5,17.97,32.743,17.97,41.639Zm0,0" transform="translate(-7.512 -382.671)" fill="#97b753"/>
                    </symbol>
                </svg>

            </div>

        </div>
    </div>
</template>

<script>
    export default {
        name: "Plant",

        data: function() {
            return {
                plantData: null
            }
        },

        mounted: function(){
            //plant
            this.$http.get('/api/plant/' + this.$route.params.linkname)
                .then(response => {
                        this.plantData = response.data;
                        console.log(response.data);
                })
                .catch(error => {
                    //alert(error);
                    this.getError(error);
                });

        },

        methods: {
            getError(error) {
                console.log(error);

                let element = document.getElementById("root");
                let div = document.createElement("div");
                div.setAttribute('class', 'text-center errorMsg');

                let p1 = document.createElement("p");
                p1.textContent = "Ups. An error occured.";
                let p2 = document.createElement("p");
                p2.textContent = error;

                element.appendChild(div);
                div.appendChild(p1);
                div.appendChild(p2);
            }
        }
    }


</script>

<style scoped>
    .h3Margin {
        margin-top: 0.5em;
    }
    .hlSmall { display: none; }

    /*Pflanzennamen*/
    #plantDataH1 {
        color: #707070;
        font-size: 130%;
        font-weight: normal;
        text-transform: uppercase;
        margin-top: 4em;
        margin-bottom: 0.5em;
        padding-left: 0.6em;
    }

    /*allgemein*/
    .plantDataH5 {
        font-size: 100%;
        color: #97B753;
        margin: 0 0 4% 0;
        padding: 0;
    }
    .plantDataPTop {
        margin: 0;
        padding: 0;
    }

    /*plantimage*/
    #plantDataImg div {
        display: inline-block;
        border: 1px solid #707070;
        border-radius: 10px;
        width: 10em;
        text-align: center;
    }
    #plantDataImg img {
        height: 10em;
        padding: 4%;
    }

    /*icondaten*/
    #plantDataEckdaten, #plantDataDetails {
        margin-top: 2em;
    }

    #plantDataDetails div {
        margin-bottom: 1em;
        padding-left: 0px;
    }
    #plantDataEckdaten .row {
        margin-bottom: 1em;
    }
    .plantDataEckdatenIcons svg {
        width: 2em;
        height: 2em;
        fill: #97B753;
    }

    /*---------------------------------------Media Queries-----------------------------------------------*/
    /*Large devices (desktops, less than 1200px)*/
    @media (max-width: 1199.98px) {

    }

    /* Medium devices (tablets, less than 992px)*/
    @media (max-width: 991.98px) {
        #plantImgCol { width: 30%; }
        #baseInfoCnt { width: 70%; }

        .baseInfoHL { width: 40%; }
        .baseInfoText { width: 60%; }

        .plantDataEckdatenIcons { width: 7%; }
        .plantDataEckdatenText { width: 93%; }
    }

    /*Small devices (landscape phones, less than 768px)*/
    @media (max-width: 767.98px) {
        /*plantimage*/
        #plantDataImg div { width: 7em; }
        #plantDataImg img { height: 7em; }

        #plantImgCol { width: 25%; }
        #baseInfoCnt { width: 75%; }

        .baseInfoHL {
            width: 45%;
            font-size: 90%;
        }
        .baseInfoText {
            width: 55%;
            font-size: 90%;
        }
    }

    /* Extra small devices (portrait phones, less than 576px)*/
    @media (max-width: 575.98px) {
        .hlSmall {
            display: block;
            margin-top: 7em;
        }
        .hlBig { display: none; }

        #plantImgCol {
            width: 45%;
            margin-top: 4em;
            margin-bottom: 2em;
        }
        #baseInfoCnt { width: 100%; }

        #plantDataImg div { width: 10em; }
        #plantDataImg img { height: 10em; }
        #plantDataImg { margin-bottom: 4%; }

        .baseInfoHL {
            width: 45%;
            font-size: 110%;
            margin-bottom: 1%;
        }
        .baseInfoText {
            width: 55%;
            font-size: 110%;
        }
        .plantDataEckdatenIcons { width: 10%; }
        .plantDataEckdatenText { width: 90%; }

        #plantDataDetails {
            padding-left: 3%;
            padding-right: 3%;
        }
    }

    @media (max-width: 400px) {
        .hlSmall { display: none; }
        .hlBig { display: block; }

        #plantImgCol {
            width: 100%;
            margin-top: 0;
        }

        .baseInfoHL { width: 100%; }
        .baseInfoHL .plantDataH5 { margin-bottom: 0; }
        .baseInfoText {
            width: 100%;
            margin-bottom: 1%;
        }
        .baseInfoText .plantDataPTop { margin-bottom: 4%; }
    }

</style>