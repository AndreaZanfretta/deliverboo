<template>
    <footer>
        <div class="container">
            <div class="row">

                <!-- PRIMO BLOCCO -->
                <div class="col col-lg-3 first">
                    <h4>Scopri DeliverBoo</h4>
                    <ul>
                        <li>
                            Chi siamo
                        </li>
                        <li>
                            Ristoranti
                        </li>
                        <li>
                            Altro
                        </li>
                        <li>
                            Design
                        </li>
                        <li>
                            Lavora con noi
                        </li>
                        <li>
                            Diventa partner
                        </li>
                    </ul>
                </div>
                <!-- SECONDO BLOCCO -->
                <div class="col col-lg-3 second">
                    <h4>Note legali</h4>
                    <ul>
                        <li>
                            Termini &#38; Condizioni
                        </li>
                        <li>
                            Informazioni sulla privacy
                        </li>
                        <li>
                            Cookies
                        </li>
                    </ul>
                </div>
                <!-- TERZO BLOCCO -->
                <div class="col col-lg-3 third">
                    <h4>Aiuto</h4>
                    <ul>
                        <li>
                            Contatti
                        </li>
                        <li>
                            FAQ
                        </li>
                        <li>
                            Tipi di cucina
                        </li>
                    </ul>
                </div>
                <!-- QUARTO BLOCCO -->
                <div class="col col-lg-3 fourth">
                    <h4>DeliverBoo ti segue sempre</h4>
                    <img src="/img/logo/appstore.png" alt="Apple Store">
                    <img src="/img/logo/googleplay.png" alt="Google Play Store">
                </div>
            </div>
        </div>
    </footer>
</template>

<script>
export default {
    name: 'AppFooter',
    data(){
        return{

        }
    }
}
</script>

<style scoped lang="scss">
@import '../../sass/variables';
@import '../../sass/general';
    footer {
        background-color: $primary-dark;
        color: $white;
        .col {
            background-color: $primary;
        }
        .fourth {
            img {
                width: 150px;
                padding: 10px 0;
            }
        }
        ul {
        list-style: none;
        padding: 0;
            li {
                cursor: pointer;
            }
        }
    }
</style>