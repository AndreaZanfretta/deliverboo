<template>
    <div>
        <h2>Home</h2>
        <!-- <button><router-link :to="{ name: 'home', params: { slug: 'vegano' } }">Vegano</router-link></button> -->
        <!-- ALL BUTTON -->
        <button v-on:click="filter">
            <router-link :to="{ name: 'homeSlug', params: { slug: 'tutti'  } }">Tutti</router-link>
        </button>

        <!-- TYPES BUTTONS -->
        <!-- <button v-for="(type) in allTypes" :key="type.id" v-on:click="filter">
            <router-link :to="{ name: 'homeSlug', params: { slug: type.slug  } }">{{type.name}}</router-link>
        </button> -->

        <!-- <div v-for="(type) in allTypes" :key="type.id">
            <router-link :to="{ name: 'homeSlug', params: { slug: type.slug  } }">
                <input class="filterCheckboxes" type="checkbox" :id="type.name" name="typeCheckbox" :value="type.slug" v-on:click="filter">
            </router-link>
            <label :for="type.name"> {{type.name}}</label>
        </div> -->
        <div v-for="(type) in allTypes" :key="type.id">
            
            <input class="filterCheckboxes" type="checkbox" :id="type.name" name="typeCheckbox" :value="type.slug" v-on:click="filter">
            
            <label :for="type.name"> {{type.name}}</label>
        </div>

        <!-- LISTA RISTORANTI -->
        <!-- <ul v-if="filteredTypes.length > 0">
            <li v-for="type in filteredTypes" :key="type.id">
                {{type.id}} - {{type.name}}
                <ul v-for="restaurant in type.users" :key="restaurant.id">
                    <li >
                        <router-link :to="{ name: 'menu', params: { slug: restaurant.slug  } }">{{restaurant.name}}</router-link>
                    </li>
                </ul>
            </li>
        </ul> -->
        <ul v-for="restaurant in restaurantsList" :key="restaurant.id">
            <li >
                <router-link :to="{ name: 'menu', params: { slug: restaurant.slug  } }">{{restaurant.name}}</router-link>
            </li>
        </ul>
    </div>
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
    /* mounted(){
        const slug = this.$route.params.slug;
        console.log(slug)
        axios.get(`/api/search/${slug}`).then((response)=>{
            
            this.filteredTypes.push(response.data);
            console.log("new mounted")
            console.log(this.filteredTypes)

        })
        .catch((error) => {
            // handle error
            console.log(error);
            // this.$router.push({name: 'page-404'});
        })
    }, */
    methods:{
        filter(){
            var array = [];
            var checkboxes = document.querySelectorAll('input[type=checkbox]:checked');
            for (let i = 0; i < checkboxes.length; i++ ){
                array.push(checkboxes[i].value)
            }
            //console.log(array)
            //console.log(checkboxes)

            array.forEach(value => {
                    const slug = value;
                    axios.get(`/api/search/${slug}`).then((response)=>{
                    this.filteredTypes = response.data;
                    console.log(this.filteredTypes)
                    let users = this.filteredTypes[0].users;
                    users.forEach(value => {
                        console.log(value)
                        //console.log(this.restaurantsList)

                        if(this.restaurantsList.indexOf(value) === -1){
                            this.restaurantsList.push(value)
                            //console.log("aggiunto")
                            //console.log(value)

                        }
                        else {
                            
                            console.log("già presente")
                            console.log(value)
                        }
                    })
                    



                })
                .catch((error) => {
                    // handle error
                    console.log(error);
                    /* this.$router.push({name: 'page-404'}); */
                })
            })


/*             const slug = this.$route.params.slug;
            this.filteredSlugs.push(slug);
            axios.get(`/api/search/${slug}`).then((response)=>{
                this.filteredTypes = response.data;
            })
            .catch((error) => {
                // handle error
                console.log(error);
                // this.$router.push({name: 'page-404'}); 
            }) */
        },
        makeRestaurants(types){

            //console.log(value[0].users)
            var users = types[0].users;
            //console.log(users)

            this.restaurantsA = users;
            //console.log("RESTAURANTS A")
            //console.log(this.restaurantsA)
            this.restaurantsA.forEach(value =>{
                //console.log(value);
                //console.log(this.restaurantsList);
                this.restaurantsList
                if(this.restaurantsList.indexOf(value) === -1){
                    this.restaurantsList.push(value)
                    console.log("aggiunto")
                    console.log(value)

                }
                else {
                    
                    console.log("già presente")
                    console.log(value)
                }
                
            })
            console.log(this.restaurantsList);
            //console.log("LISTA")
            //console.log(this.restaurantsList)


        }
    }
}
</script>

<style scoped lang="scss">

</style>