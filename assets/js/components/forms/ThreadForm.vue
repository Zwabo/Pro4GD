<template>
    <form method="post" @submit="submitForm" id="threadForm">
        <div class="container-fluid paddingNormalize">

            <div class="row formRow paddingNormalize">
                <div class="col-lg-2">
                    <label for="headline">Titel</label>
                </div>
                <div class="col-lg-10">
                    <input v-model="headline"  placeholder="Titel des Threads" type="text" value="" name="headline"
                           id="headline" class="form-control inputPlantForm" required autofocus>
                </div>
            </div>

            <div class="row formRow paddingNormalize">
                <div class="col-lg-2">
                    <label for="text">Beschreibung</label>
                </div>
                <div class="col-lg-10">
                    <textarea v-model="text"  type="text" name="text" id="text" class="form-control inputPlantForm description"
                              placeholder="Beschreiben Sie den Inhalt ihres Threads"required></textarea>
                </div>
            </div>

            <div class="row formRow paddingNormalize">
                <div class="col-lg-2">
                    <label>Kategorie</label>
                </div>
                <div class="col-lg-10">
                    <select v-model="categorySelect" class="form-control-sm searchBarDatabase DropdownFont
                                            selectBoxes inputPlantForm" id="plantCategory" > <!-- multiple-->
                        <option v-model="categories" disabled selected >Kategorie wählen</option>
                        <option v-for="category in categories"
                                v-bind:value="{ id: category.id}" required>{{category.title}}</option>
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
            this.$http.get('/api/forum/categories')
                .then(response => {
                    this.categories = response.data;
                    let i = this.categories.length
                    while (i--) {
                        if (this.categories[i].title === 'Pflanzen') {
                            this.categories.splice(i, 1);
                        }
                    }
                })
                .catch(error => {
                    alert(error);
                });
            //Get user from local storage
            this.user = JSON.parse(localStorage.getItem('user'));
        },
        data: function(){
            return{
                headline: "",
                text: "",
                isLoading: false,
                error: '',
                user: null,
                categorySelect: null,                 // category in plant database
                categories: null,
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
                        categoryId: this.categorySelect.id,
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