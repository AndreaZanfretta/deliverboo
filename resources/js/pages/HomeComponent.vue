<template>
    <main>
        <!-- BANNER -->
        <div class="bannerContainer">
            <div class="filter">
                <div class="textContainer">
                    <h2>Tutto quello che vuoi dove vuoi, per una fame da paura!</h2>
                    <p>Ordina comodamente online da casa tua, i tuoi ristoranti preferiti ti aspettano</p>
                </div>
            </div>
            <!-- <img class="banner" src="/img/banner/home-banner.jpg"> -->
            
        </div>

        <!-- CHECKBOXES -->

        <div class="filterContainer container">
            <!-- POSSIBILE FUTURO CAROUSEL SE ABBIAMO TEMPO -->
            <div class="checkboxesContainer row">
                <div class="checkbox col-lg-2 col-sm-4 col-6" v-for="(type, index) in allTypes" :key="type.id">
            
                    <input class="filterCheckboxes" type="checkbox" :id="type.name" name="typeCheckbox" :value="type.slug" v-on:click="filter">
                    <label :for="type.name"> <img class="banner" :src="`/img/types/${images[index].name}`"></label>

                </div>
            </div>
            <div class="restaurantsContainer row">
                <div class="restaurant col-lg-2 col-sm-4 col-6" v-for="restaurant in restaurantsList" :key="restaurant.id">
                    <router-link :to="{ name: 'menu', params: { slug: restaurant.slug  } }" >
                        <img :src="`/storage/${restaurant.image}`" onerror="this.src='/img/placeholders/placeholder-banner.jpeg';" :alt="restaurant.slug">
                        <h3>{{restaurant.name}}</h3>
                        <span>Consegna gratuita</span>
                        <span>voto: {{votes[restaurant.vote].name}}</span>
                    </router-link>

                </div>
            </div>
            <!-- <ul>
                <li v-for="restaurant in restaurantsList" :key="restaurant.id">
                    <router-link :to="{ name: 'menu', params: { slug: restaurant.slug  } }">{{restaurant.name}}</router-link>
                </li>
            </ul> -->
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

            checkedFilters: [],
            images: [
                {name: 'ristorante-italiano.jpg'},
                {name: 'pizzeria.jpg'},
                {name: 'kebab.jpg'},
                {name: 'fastfood.jpg'},
                {name: 'ristorante-giapponese.jpg'},
                {name: 'ristorante-cinese.jpg'},
                {name: 'sushi.jpg'},
                {name: 'vegetariano.jpg'},
                {name: 'vegano.jpg'},
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
                    



                })
                .catch((error) => {
                    // handle error
                    console.log(error);
                    /* this.$router.push({name: 'page-404'}); */
                })
            })}

        },
        getFullRestaurants(){
            axios.get('/api/menu')
            .then(res => {
                this.restaurantsList = res.data;
                for(let i=0; i<this.restaurantsList.length; i++){
                    let vote = this.randomNum()
                    this.restaurantsList[i].vote = vote;
                    
                }
                console.log(this.restaurantsVote)
                //console.log(this.restaurantsList)
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
            margin-bottom: 50px;
            width: 30%;
            h2 {
                color: rgb(140, 31, 243);
                padding: 25px 50px;
            }  
        }
        }
        
    }   
    
    .filterContainer {
        padding-top: 50px;
        .checkboxesContainer {
            
            .checkbox {
                label {
                    border: 3px solid transparent;
                    border-radius: 20px;
                    
                    img {
                    width: 150px;
                    height: 100px;
                    padding: 5px;
                    border-radius: 20px;
                }
                }
                input {
                    display: none;
                }
                :checked + label {
                    border: 3px solid rgb(161, 27, 250);
                }
            }
        }

        .restaurantsContainer {
            min-height: 300px;
            .restaurant {
                border-radius: 5px;
                img {
                    width: 100%;
                    height: 100px;
                    border-radius: 5px 5px 0 0;

                }
            }
            a {
                color: black;
            }
            a:hover {
                text-decoration: none;
            }
        }
    }
</style>