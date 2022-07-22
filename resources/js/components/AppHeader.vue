<template>
    
    <header >
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="#">
                    <!-- <img src="/img/logo/deliberboo-delivery-logo.png" class="d-inline-block align-top" alt="Logo" width="30" height="30">
                    DeliverBoo -->
                    <img src="/img/logo/deliberboo-delivery-nero.png" class="d-inline-block align-top" alt="Logo" width="150" height="50">
                    
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/login">Area ristoratori</a>
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
    header {
        width: 100%;
        position: absolute;
        a {
            color: white;
            font-weight: bolder;
        }
    }
</style>