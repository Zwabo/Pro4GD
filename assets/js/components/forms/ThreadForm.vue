<template>
    <form method="post" @submit="submitForm" id="threadForm">
        <div class="container-fluid paddingNormalize">

            <div class="row formRow paddingNormalize">
                <div class="col-lg-2">
                    <label for="headline">Titel</label>
                </div>
                <div class="col-lg-10">
                    <input v-model="headline"  placeholder="Titel des Trheads" type="text" value="" name="headline"
                           id="headline" class="form-control inputPlantForm" required autofocus>
                </div>
            </div>

            <div class="row formRow paddingNormalize">
                <div class="col-lg-2">
                    <label for="text">Beschreibung</label>
                </div>
                <div class="col-lg-10">
                    <textarea v-model="text"  type="text" name="text" id="text" class="form-control inputPlantForm description"
                              placeholder="Beschreibung Sie den Inhalt ihres Threads"required></textarea>
                </div>
            </div>

            <div class="row formRow paddingNormalize">
                <div class="col-lg-2">
                    <label>Kategorie</label>
                </div>
                <div class="col-lg-10">
                    <select v-model="categorySelect" class="form-control-sm searchBarDatabase DropdownFont
                                            selectBoxes inputPlantForm" id="plantCategory" > <!-- multiple-->
                        <option v-model="categorySelectOptions" disabled selected >Kategorie wählen</option>
                        <option v-for="(category, index) in categorySelectOptions"
                                v-bind:key="index" required>{{category.text}}</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="text-right container-fluid">
                    <button class="btn btn-lg btn-primary buttonDarkGreen" type="submit">
                        Thread erstellen
                    </button>
                </div>
            </div>
        </div>


    </form>
</template>

<script>
    export default {
        name: "ThreadForm",
        mounted: function(){
            //Get user from local storage
          this.user = JSON.parse(localStorage.getItem('user'));
        },
        data: function(){
            return{
                headline: "",
                text: "",
                isLoading: false,
                error: '',

                categorySelect: null,                 // category in plant database
                categorySelectOptions: [
                    {text: 'Meet and Greet'},
                    {text: 'Neuigkeiten'},
                    {text: 'Pflegetipps'},
                    {text: 'Pflanzen: Kletterpflanzen'},
                    {text: 'Pflanzen: Kräuter'},
                    {text: 'Pflanzen: Palmen'},
                    {text: 'Pflanzen: Zierpflanzen'},
                    {text: 'Pflanzen: Zimmerpflanzen'},
                    {text: 'Pflanzen: Zuchtpflanzen'},
                    {text: 'Pflanzenneulinge'},
                    {text: 'Tipps und Tricks'},
                ],
            }
        },
        methods:{
            submitForm: function(e){
                e.preventDefault();

                this.isLoading = true;
                this.error = '';

                this.$http
                    .post('/forum/addthread', {
                        userId: this.user.id,
                        headline: this.headline,
                        category: this.categorySelect,
                        text: this.text,
                        user: this.user,

                    })
                    .then(response => {
                        console.log(response.data);
                    }).catch(error => {
                    if(error.response.data){
                        this.error = error.response.data.error;
                    }
                    console.log(error.response.data);
                }).finally(() => {
                    this.isLoading = false;
                    this.$router.go();
                });
            }
        }
    }
</script>

<style scoped>

    .description { height: 20em; }
    .formRow { margin-bottom: 1%; }

</style>