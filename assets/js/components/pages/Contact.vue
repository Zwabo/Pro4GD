<template>
    <div id="root" style="margin: 0;">
        <div class="firstAfterHeader"></div>
        <div class="container-fluid paddingLeftRight">
            <div class="contact container-fluid paddingNormalize ">
                <h1>Kontakt</h1>

                <h3 class="h3Margin">Anschrift</h3>
                <div class="greenLine"></div>
                <h4>PlantBase</h4>
                <p>Softwarepark 11 <br>
                4232 Hagenberg im Mühlkreis<br>
                Österreich</p>
                <p>EMail: <a href="mailto:lyraheart77@gmail.com">plantbase@gmail.com</a></p>
            </div>


            <div class="container-fluid paddingNormalize">

                <h3 class="h3Margin">Kontaktieren Sie uns</h3>

                <div class="greenLine"></div>

                <form class="container-fluid contactForm" method="post" @submit.prevent="sendEmail">
                    <div v-if="sent == true" class="paddingNormalize">Ihre Nachricht wurde vesendet.</div>
                    <div type="hidden" name="contactNr"></div>
                    <div class="row">
                        <div class="col-lg-2 paddingNormalize left"><label for="firstname">Vorname</label></div>
                        <div class="col-lg-10 paddingNormalize right"><input class="inputFields" type="text" id="firstname" name="firstname" placeholder="Vorname" required></div>
                    </div>

                    <div class="row">
                        <div class="col-lg-2 paddingNormalize left"><label for="lastname">Nachname</label></div>
                        <div class="col-lg-10 paddingNormalize right"><input class="inputFields" type="text" id="lastname" name="lastname" placeholder="Nachname" required></div>
                    </div>

                    <div class="row">
                        <div class="col-lg-2 paddingNormalize left"><label for="email">EMail</label></div>
                        <div class="col-lg-10 paddingNormalize right"><input class="inputFields" type="email" id="email" name="email" placeholder="EMail" required></div>
                    </div>

                    <div class="row">
                        <div class="col-lg-2 paddingNormalize left"><label for="country">Land</label></div>
                        <div class="col-lg-10 paddingNormalize right">
                            <select id="country" class="dropDowns" name="country">
                                <option value="---">---</option>
                                <option value="Österreich">Österreich</option>
                                <option value="Deutschland">Deutschland</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-2 paddingNormalize left"><label for="subject">Betreff</label></div>
                        <div class="col-lg-10 paddingNormalize right">
                            <select id="subject" class="dropDowns" name="subject">
                                <option value="---">---</option>
                                <option value="Probleme beim Einloggen">Probleme beim Einloggen</option>
                                <option value="Probleme mit Usergarten">Probleme mit Usergarten</option>
                                <option vlaue="Auffälligen User melden">Auffälligen User melden</option>
                                <option value="Impulsbewerbung">Impulsbewerbung</option>
                            </select>
                        </div>
                    </div>

                    <div class="row"><label for="message" class="labelMailMessage">Nachricht</label></div>
                    <div class="row "><textarea required id="message" class="mailMessage" name="message" placeholder="Nachricht schreiben"></textarea></div>

                    <div class="row float-right">
                        <div class="submitDiv">
                            <input id="submit" type="submit" value="Senden" class="buttonDarkGreen">
                        </div>
                        <!--<button type="submit">Senden</button>-->
                    </div>

                </form>
            </div>

        </div>
        <div class="lastBeforeFooter clearfix"></div>
    </div>
</template>



<script>
   import emailjs from 'emailjs-com';

    export default {
        name: "Contact",

        data: function() {
            return {
                sent: false,
            }
        },

        mounted: function() {
            emailjs.init('user_hzAepBzYXcOMXgVUtkM6J');
        },

        methods: {
            sendEmail: function (e) {
                console.log("in sendEmail");
                emailjs.sendForm('plantbase', 'plantbase_contactform', e.target, 'user_hzAepBzYXcOMXgVUtkM6J')
                    .then((result) => {
                        console.log('SUCCESS!', result.status, result.text);
                        this.sent = true;

                        let country = e.target.country;
                        console.log(country);

                        e.target.firstname.value = "";
                        e.target.lastname.value = "";
                        e.target.email.value = "";

                        e.target.country[0].selected = true;
                        e.target.subject[0].selected = true;

                    }, (error) => {
                        console.log('FAILED...', error);
                    });
            },

            reloadRoute: function() {
            }
        },
    }
</script>

<style scoped>
    .mailMessage {
        width: 100%;
        height: 20em;
        border: 1px solid #97B753;
        border-radius: 4px;
        padding: 0.5%;
        margin-bottom: 2%;
    }
    .labelMailMessage {
        margin-top: 2%;
        margin-bottom: 1%;
    }

    .inputFields {
        width: 40%;
        border: 1px solid #97B753;
        border-radius: 4px;
        padding: 0.5%;
        margin-bottom: 2%;
    }

    .dropDowns {
        width: 30%;
        border: 1px solid #97B753;
        border-radius: 4px;
        padding: 0.5%;
        margin-bottom: 2%;
        background-color: #F5F5F5;
    }

    .right input, .right select { padding: 1% 2%; }
    .right input { width: 60%; }
    .right select { width: 60%; }

    /*---------------------------------------Media Queries-----------------------------------------------*/
    /*Large devices (desktops, less than 1200px)*/
    @media (max-width: 1199.98px) {
        .left { width: 30%; }
        .right { width: 70%; }
        .right input { width: 80%; }
        .right select { width: 80%; }
    }

    /* Medium devices (tablets, less than 992px)*/
    @media (max-width: 991.98px) {

    }

    /*Small devices (landscape phones, less than 768px)*/
    @media (max-width: 767.98px) {

    }

    /* Extra small devices (portrait phones, less than 576px)*/
    @media (max-width: 575.98px) {

    }
</style>