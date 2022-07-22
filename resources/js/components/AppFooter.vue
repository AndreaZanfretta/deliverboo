<template>
    <footer>
        <div class="container">
            <div class="row g-3">
                <!-- PRIMO BLOCCO -->
                <div class="col-12 col-sm-6 col-lg-3 listContainer first">
                    <div class="content">
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
                </div>
                <!-- SECONDO BLOCCO -->
                <div class="col-12 col-sm-6 col-lg-3 listContainer second">
                    
                    <div class="content">
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
                    
                </div>
                <!-- TERZO BLOCCO -->
                <div class="col-12 col-sm-6 col-lg-3 listContainer third">
                    <div class="content">
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
                </div>
                <!-- QUARTO BLOCCO -->
                <div class="col-12 col-sm-6 col-lg-3 listContainer fourth">
                    <div class="content">
                        <h4>DeliverBoo ti segue sempre</h4>
                        <img src="/img/logo/appstore.png" alt="Apple Store">
                        <img src="/img/logo/googleplay.png" alt="Google Play Store">
                    </div>
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
            .listContainer {
                padding: 50px 0;
                .content   {
                    background-color: $primary;
                    margin: 10px;
                    padding: 25px;
                    min-height: 250px;
                    border-radius: 5px;
                    ul {
                    
                    list-style: none;
                    li {
                        cursor: pointer;
                    }
                    li:hover {
                        color: $secondary;
                    }
                }
                }  
            }
        }
        .fourth {
            img {
                width: 150px;
                padding: 10px 0;
            }
        }
</style>