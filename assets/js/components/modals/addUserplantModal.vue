<template>
    <div>
        <!-- Button trigger modal -->
        <button type="button" class="buttonDarkGreenSmall" data-toggle="modal" data-backdrop="static" data-target="#addUserplant" @click="modalOpen = true" >
            Hinzufügen
        </button>

        <!-- Modal -->
        <div class="modal fade" id="addUserplant" tabindex="-1" role="dialog" aria-hidden="true" v-if="modalOpen == true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5>Füge eine neue Pflanze hinzu: </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="modalOpen = false">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form v-on:submit="addUserplant">
                            <p><b>{{plant.name}}</b> ({{plant.genus}})</p>
                            <div class="form-group">
                                <label for="userplantName">Name</label>
                                <input type="text" class="form-control" id="userplantName" v-model="name" required>
                            </div>
                            <div class="form-group">
                                <label for="userplantLocation">Standort</label>
                                <input type="text" class="form-control" id="userplantLocation" v-model="location" required>
                            </div>
                            <div class="form-group">
                                <label for="userplantWateringCycle">Gießintervall</label>
                                <select  class="form-control" id="userplantWateringCycle" v-model="cycle" required>
                                    <option value="1">jeden Tag</option>
                                    <option value="2">alle 2 Tage</option>
                                    <option value="3">alle 3 Tage</option>
                                    <option value="4">alle 4 Tage</option>
                                    <option value="5">alle 5 Tage</option>
                                    <option value="6">alle 6 Tage</option>
                                    <option value="7">einmal pro Woche</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="userplantNotes">Notizen</label>
                                <textarea name="Notes" cols="40" rows="5" class="form-control" id="userplantNotes" v-model="notes"></textarea>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Speichern">
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        name: "addUserplantModal",
        data: function(){
            return{
                modalOpen: false,
                plantId: this.plant.id,
                name: '',
                location: '',
                cycle: '',
                notes: '',
                error: '',
                userId: this.user
            }
        },
        props:{
            plant: null,
            user: null
        },
        methods:{
            addUserplant: function(e){

                this.$http.post('/api/garden/createUserplant/'+ this.plantId, {
                    userId: this.userId,
                    name: this.name,
                    location: this.location,
                    cycle: this.cycle,
                    notes: this.notes,
                })
                    .catch(error => {
                        if(error.response.data){
                            this.error = error.response.data;
                        }
                    });
                this.$emit('newUserplant');

                e.preventDefault();
            }
        }
    }
</script>

<style scoped>

</style>