<template>
    <div id="root" style="margin: 0;">
        <div class="container-fluid marginLeftRight">
            <div class="contact container-fluid paddingNormalize">
                <h1 class="marginTopOnSite">Kontakt</h1>

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

                <form class="container-fluid">

                    <div class="row">
                        <div class="col-lg-1 paddingNormalize"><label for="firstname">Vorname</label></div>
                        <div class="col-lg-11 paddingNormalize"><input type="text" id="firstname" name="firstname" placeholder="Vorname"></div>
                    </div>

                    <div class="row">
                        <div class="col-lg-1 paddingNormalize"><label for="lastname">Nachname</label></div>
                        <div class="col-lg-11 paddingNormalize"><input type="text" id="lastname" name="lastname" placeholder="Nachname"></div>
                    </div>

                    <div class="row">
                        <div class="col-lg-1 paddingNormalize"><label for="country">Land</label></div>
                        <div class="col-lg-11 paddingNormalize">
                            <select id="country" name="country">
                                <option value="austria">Österreich</option>
                                <option value="germany">Deutschland</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-1 paddingNormalize"><label for="subject">Betreff</label></div>
                        <div class="col-lg-11 paddingNormalize">
                            <select id="subject" name="subject">
                                <option value="login">Probleme beim Einloggen</option>
                                <option value="garten">Probleme mit Usergarten</option>
                                <option vlaue="badUser">Auffälligen User melden</option>
                                <option value="bewerbung">Impulsbewerbung</option>
                            </select>
                        </div>
                    </div>

                    <div class="row"><label for="message">Nachricht</label></div>
                    <div class="row" style="width: 100%;"><textarea id="message" name="message" placeholder="Nachricht schreiben"></textarea></div>

                    <div class="row">
                        <input type="submit" value="Senden">
                    </div>

                </form>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        name: "Contact"
    }
</script>

<style scoped>

</style>