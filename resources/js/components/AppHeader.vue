<template>
    
    <header >
        <div class="container myContainer">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="#">
                    <!-- <img src="/img/logo/deliberboo-delivery-logo.png" class="d-inline-block align-top" alt="Logo" width="30" height="30">
                    DeliverBoo -->
                    <img src="/img/logo/logo-viola.png" class="d-inline-block align-top" alt="Logo" width="150" height="50">
                    
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link login" href="/login">Area ristoratori</a>
                        </li>
                    </ul>
                </div>
            </nav>     
        </div>
    </header>
</template>


<script>


export default {
    name: 'AppHeader',
    data(){
        return{

        }
    },
/*     methods: {
        register() {
            axios.post('/')
                .finally( err => {
                    window.location.href = '/register';
                })
        },
    } */
}

</script>

<style scoped lang="scss">
@import '../../sass/variables';
@import '../../sass/general';
    header {
        width: 100%;
        position: absolute;
    .myContainer {
        padding-top: 10px;
    }
        a {
            color: white;
            font-weight: bolder;
        }
        .login {
            font-size: 1.5em;
        }
    }
</style>