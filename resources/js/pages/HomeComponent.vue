<template>
    <main>
        <!-- BANNER -->
        <div class="bannerContainer">
            <div class="filter">
                <div class="textContainer">
                    <h2>Tutto quello che vuoi dove vuoi, per una fame da paura!</h2>
                    <p>Ordina comodamente online da casa tua, i tuoi ristoranti preferiti ti aspettano</p>
                    <a href="#restaurantList"><button>Vai ai ristoranti</button></a>
                    
                </div>
            </div>
            
        </div>

        <!-- CHECKBOXES  AND RESTAURANTS-->

        <div class="filterContainer container">
            <h2>Cosa ti va oggi?</h2>
            <!-- POSSIBILE FUTURO CAROUSEL CHECKBOX SE ABBIAMO TEMPO -->
            <div class="checkboxesContainer row">
                <div class="checkbox col-lg-2 col-sm-4 col-6" v-for="(type, index) in allTypes" :key="type.id">
            
                    <input class="filterCheckboxes" type="checkbox" :id="type.name" name="typeCheckbox" :value="type.slug" v-on:click="filter">
                    <label :for="type.name"> 
                        <img class="banner" :src="`/img/types/${images[index].src}`">
                        <span>{{images[index].name}}</span>
                    </label>

                </div>
            </div>
            <!-- RISTORANTI -->
            <h2>Scegli tra i nostri migliori ristoranti!</h2>
            <div class="restaurantsContainer row align-items-start">
                <div id="restaurantList" class="restaurant col-lg col-sm-4 col-6" v-for="restaurant in restaurantsList" :key="restaurant.id">
                    <router-link :to="{ name: 'menu', params: { slug: restaurant.slug  } }" >
                        <div class="content">
                            <img :src="`/storage/${restaurant.image}`" onerror="this.src='/img/placeholders/placeholder-banner.jpeg';" :alt="restaurant.slug">
                            <h3>{{restaurant.name}}</h3>
                            <span>Consegna gratuita</span>
                            <span>Voto: {{restaurant.vote}}/5 - {{votes[restaurant.vote].name}}</span>
                        </div>
                    </router-link>
                    
                    
                </div>
                <div class="noRestaurants" v-if="isEmpty">
                        <img src="/img/placeholders/sad-ghost.png" alt="Fantasma triste">
                        <h3>Ci dispiace! Non sembra esserci nessun ristorante disponibile!</h3>
                </div>
                <span class="loader" v-if="loading"></span>
            </div>
            
        </div>
    </main>
</template>

<script>
export default {
    name: 'HomeComponent',
    data(){
        return{
            allTypes: [],
            filteredTypes: [],
            filteredSlugs: [],
            restaurantsList: [],
            loading: false,
            isEmpty: true,
            checkedFilters: [],
            images: [
                {
                    src: 'ristorante-italiano.jpg',
                    name: 'Italiano'
                },
                {
                    src: 'pizzeria.jpg',
                    name: 'Pizzeria'
                    },
                {
                    src: 'kebab.jpg',
                    name: 'Kebab'
                },
                {
                    src: 'fastfood.jpg',
                    name: 'Fast Food'
                },
                {
                    src: 'ristorante-giapponese.jpg',
                    name: 'Giapponese'
                },
                {
                    src: 'ristorante-cinese.jpg',
                    name: 'Cinese'
                },
                {
                    src: 'sushi.jpg',
                    name: 'Sushi'
                },
                {
                    src: 'vegetariano.jpg',
                    name: 'Vegetariano'
                },
                {
                    src: 'vegano.jpg',
                    name: 'Vegano'
                },
            ],
            votes: [
                {
                    name: 'Nessuna recensione',
                    value: '0'
                },
                {
                    name: 'boo',
                    value: '1'
                },
                {
                    name: 'infestabile',
                    value: '2'
                },
                {
                    name: 'spettrabile',
                    value: '3'
                },
                {
                    name: 'fantasmagorico',
                    value: '4'
                },  
                {
                    name: 'ectorgasmico',
                    value: '5'
                },


                

            ],
            restaurantsVote: [],
            
        }
    },
    created(){
        axios.get('/api').then((response)=>{
            this.allTypes = response.data;
            
        }
        )
        .catch(err => {
            console.error(err); 
        })
    },
    mounted(){
        this.getFullRestaurants();
    },
    methods:{
        filter(){
            this.loading = true;
            this.restaurantsList = [];
            this.restaurantsVote = [];
            var array = [];
            var checkboxes = document.querySelectorAll('input[type=checkbox]:checked');
            if(checkboxes.length < 1){
                this.getFullRestaurants();
            }else{
            for (let i = 0; i < checkboxes.length; i++ ){
                array.push(checkboxes[i].value)
            }
            //console.log(array)
            array.forEach(value => {
                    const slug = value;
                    axios.get(`/api/search/${slug}`).then((response)=>{
                    this.filteredTypes = response.data;
                    //console.log(this.filteredTypes)
                    let users = this.filteredTypes[0].users;
                    users.forEach(value => {
                        //console.log(value)
                        //console.log(this.restaurantsList)
                        
                        if(this.restaurantsList.filter(e => e.slug === value.slug).length > 0) {
                            //console.log("già presente")
                            //console.log(value)
                        }
                        else {
                            this.restaurantsList.push(value)
                            let vote = this.randomNum()
                            this.restaurantsVote.push(vote)
                            //console.log(this.restaurantsVote)
                            //console.log("aggiunto")
                            //console.log(value)
                            
                        }
                    })
                    this.assignVotes();
                    if(this.restaurantsList.length == 0){
                        this.isEmpty = true;
                    }
                    else {
                        this.isEmpty = false;
                    }
                    this.loading = false;



                })
                .catch((error) => {
                    // handle error
                    console.log(error);
                    /* this.$router.push({name: 'page-404'}); */
                })
            })}
            
        },
        getFullRestaurants(){
            this.loading = true;
            axios.get('/api/menu')
            .then(res => {
                this.restaurantsList = res.data;
                for(let i=0; i<this.restaurantsList.length; i++){
                    let vote = this.randomNum()
                    this.restaurantsList[i].vote = vote;
                    
                }
                console.log(this.restaurantsVote)
                //console.log(this.restaurantsList)
                this.loading = false;
                if(this.restaurantsList.length == 0){
                        this.isEmpty = true;
                    }
                    else {
                        this.isEmpty = false;
                    }
            })
            
            .catch(err => {
                console.error(err); 
            })
            
        },
        randomNum(){
            return Math.floor(Math.random() * 5 + 1);
        },
        assignVotes(){
            for (let i= 0; i<this.restaurantsList.length; i++){
                console.log(this.restaurantsList)
                this.restaurantsList[i].vote = (this.restaurantsVote[i])
            }
            console.log(this.restaurantsList)
        }
    }
}
</script>

<style scoped lang="scss">
@import '../../sass/variables';
@import '../../sass/general';
    
    .bannerContainer{
        height: 600px;
        width: 100%;
        
        text-align: center;
        object-fit: contain;
        background-image: url("/img/banner/home-banner.jpg");
        
        
          
        .filter {
            display: flex;
            justify-content: center;
            align-items: flex-end;
            width: 100%;
            height: 100%;
            background: linear-gradient(to top, transparent, rgba(0, 0, 0, 0.678));
        .textContainer {
            display: flex;
            flex-flow: column nowrap;
            justify-content: center;
            align-items: center;
            background-color: white;
            border-radius: 15px;
            width: 30%;
            margin-bottom: -50px;
            box-shadow: 0 2px 8px 0 rgb(0 0 0 / 36%), -2px -2px 4px 0 rgb(0 0 0 / 14%);
            
            h2 {
                color: $primary;
                padding: 25px 50px;
                font-weight: bolder;
                font-size: 2.5em;
            } 
            p {
                font-weight: bolder;
                font-size: 1em;
                color: $black;
                padding-bottom: 15px;
                color: $light-gray;
            }
            button {
                background-color: $secondary;
                border: none;
                font-size: 1.5em;
                padding: 7px 25px;
                border-radius: 25px;
                margin-bottom: 20px;
                color: $white;
            } 
        }
        }
        
    }   
    
    .filterContainer {
        padding-top: 150px;
        
        .checkboxesContainer {
            padding-bottom: 50px;
            .checkbox {
                label {
                    border-radius: 20px;
                    display: flex;
                    flex-flow: column nowrap;
                    align-items: center;
                    margin: 10px;
                    cursor: pointer;
                    box-shadow: 0 2px 4px 0 rgb(0 0 0 / 10%);
                    
                    img {
                    width: 100%;
                    height: 120px;
                    border-radius: 20px 20px 0 0;                   
                    }
                    span {
                        margin: 5px 0;
                    }
                }
                label:hover{
                    box-shadow: 0 2px 8px 0 rgb(0 0 0 / 36%), -2px -2px 4px 0 rgb(0 0 0 / 14%);
                }
                input {
                    display: none;
                }
                :checked + label {
                    outline: 3px solid $primary;
                    outline-offset: 5px;
                    box-shadow: 0 2px 8px 0 rgb(0 0 0 / 36%), -2px -2px 4px 0 rgb(0 0 0 / 14%);
                }
            }
        }

        .restaurantsContainer {
            min-height: 300px;
            position: relative;
            
            .restaurant {
                border-radius: 15px;
                margin: 10px;
                max-width: 200px;
                box-shadow: 0 2px 4px 0 rgb(0 0 0 / 10%);
                

                
                .content {
                    display: flex;
                    flex-flow: column nowrap;
                    
                    img {
                        width: 100%;
                        height: 120px;
                        border-radius: 15px 15px 0 0;

                    }
                    h3 {
                        text-transform: capitalize;
                        padding: 3px 0 3px 5px;
                    }
                    span{
                        padding: 1px 0 0px 5px;
                    }
                }
                
            }
            .restaurant:hover {
                box-shadow: 0 2px 8px 0 rgb(0 0 0 / 36%), -2px -2px 4px 0 rgb(0 0 0 / 14%);
            }
            a {
                color: $black;
            }
            a:hover {
                text-decoration: none;
            }
            .noRestaurants {
                width: 100%;
                display: flex;
                justify-content: space-around;
                align-items: center;
                img{
                    width: 200px;
                }
            }
        }
        .loader {
            position: absolute;
            top: 25%;
            left: 50%;
            width: 48px;
            height: 48px;
            border-radius: 50%;
            display: inline-block;
            border-top: 4px solid $primary;
            border-right: 4px solid transparent;
            box-sizing: border-box;
            animation: rotation 1s linear infinite;
        }
        .loader::after {
        content: '';  
        box-sizing: border-box;
        position: absolute;
        left: 0;
        top: 0;
        width: 48px;
        height: 48px;
        border-radius: 50%;
        border-left: 4px solid $secondary;
        border-bottom: 4px solid transparent;
        animation: rotation 0.5s linear infinite reverse;
        }
        @keyframes rotation {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
        } 
            
        
    }
</style>