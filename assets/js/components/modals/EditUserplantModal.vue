<template>
    <div>
        <!-- Button trigger modal -->
        <button type="button" class="buttonDarkGreen" data-toggle="modal" data-backdrop="static" data-target="#editUserplant" @click="modalOpen = true">
            Edit
        </button>

        <!-- Modal -->
        <div class="modal fade" id="editUserplant" tabindex="-1" role="dialog" aria-hidden="true" v-if="modalOpen == true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>Pflanze "{{userplant.name}}" bearbeiten</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="modalOpen = false">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form v-on:submit.prevent="updateUserplant">
                            <div class="form-group">
                                <label for="userplantName">Name</label>
                                <input type="text" class="form-control" id="userplantName" v-model="userPlantNameTemp">
                            </div>
                            <div class="form-group">
                                <label for="userplantPlantName">Pflanzengattung</label>
                                <select class="form-control" id="userplantPlantName" v-model="plantNameTemp">
                                    <option disabled value="">Bitte auswählen</option>
                                    <option v-for="plantName in plantNames">{{plantName}}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="userplantWateringCycle">Gießintervall</label>
                                <select  class="form-control" id="userplantWateringCycle" v-model="cycle" required>
                                    <option v-for="val in cycleVals" v-bind:value="val">
                                        <span v-if="val == 1">Jeden Tag</span>
                                        <span v-if="val > 1  && val < 7">Alle </span>
                                        <span v-if="val == 7">Einmal pro Woche</span>
                                        <span v-if="val != 1 && val != 7">{{val}}</span>
                                        <span v-if="val > 1 && val < 7"> Tage</span>
                                    </option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary" @click="updateUserplant" data-dismiss="modal">Speichern</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "EditUserplantModal",
        data: function(){
            return{
                modalOpen: false,
                plantNames: [],
                plantNameTemp : this.userplant.plant.name,
                userPlantNameTemp: this.userplant.name,
                userplantTemp: null,
                cycle: this.userplant.wateringCycle,
                cycleVals: [1, 2, 3, 4, 5, 6, 7],
            }
        },
        props:{
            userplant: null
        },
        mounted: function(){
            this.$http.get('/api/userPlants/names')
                .then(response => {
                    console.log(response.data);
                    this.plantNames = response.data;
                })
                .catch(error => {
                    alert(error);
                });
        },
        methods:{
            updateUserplant: function(){
                this.userplant.plant.name = this.plantNameTemp;
                this.userplant.name = this.userPlantNameTemp;

                //SET PLANT-TYPE
                this.$http.put('/api/userplant/setPlant/' + this.userplant.id, this.userplant.plant.name)
                    .then(response => {
                        this.userplantTemp = response.data;
                    })
                    .catch(error => {
                        alert(error);
                    });

                //SET NAME
                this.$http.put('/api/userplant/setName/' + this.userplant.id, this.userplant.name)
                    .then(response => {
                        this.userplantTemp = response.data;
                        this.$emit('updatedUserplant', this.userplantTemp);
                    })
                    .catch(error => {
                        alert(error);
                    });

                //SET WATERING CYCLE
                this.$http.put('/api/userplant/setWateringCycle/' + this.userplant.id, this.cycle)
                    .then(response => {
                        this.userplantTemp = response.data;
                        this.$emit('updatedUserplant', this.userplantTemp);
                    })
                    .catch(error => {
                        alert(error);
                    });
            }
        }
    }
</script>

<style scoped>

</style>