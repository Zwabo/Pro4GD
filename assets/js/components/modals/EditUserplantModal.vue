<template>
    <div>
        <!-- Button trigger modal -->
        <button type="button" class="buttonDarkGreen" data-toggle="modal" data-target="#editUserplant">
            Edit
        </button>

        <!-- Modal -->
        <div class="modal fade" id="editUserplant" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>Edit Plant "{{userplant.name}}"</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form>
                            <div class="form-group">
                                <label for="userplantName">Name</label>
                                <input type="text" class="form-control" id="userplantName" v-model="userplant.name">
                            </div>
                            <div class="form-group">
                                <label for="userplantPlantName">Pflanzengattung</label>
                                <select class="form-control" id="userplantPlantName" v-model="userplant.plant.name">
                                    <option disabled value="">Please select one</option>
                                    <option>Aloe Vera</option>
                                    <option>B</option>
                                    <option>C</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Speichern</button>
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
                countries: ['Austria','Germany','Switzerland','Czech Republic','Italy']
            }
        },
        props:{
            userplant: null
        }
    }
</script>

<style scoped>

</style>