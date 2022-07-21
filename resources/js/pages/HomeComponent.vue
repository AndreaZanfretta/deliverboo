<template>
    <div>
        <h2>Home</h2>
        <button v-on:click="filter">
            <router-link :to="{ name: 'homeSlug', params: { slug: 'tutti'  } }">Tutti</router-link>
        </button>
        <div v-for="(type) in allTypes" :key="type.id">
            
            <input class="filterCheckboxes" type="checkbox" :id="type.name" name="typeCheckbox" :value="type.slug" v-on:click="filter">
            
            <label :for="type.name"> {{type.name}}</label>
        </div>
        <ul>
            <li v-for="restaurant in restaurantsList" :key="restaurant.id">
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
    mounted(){
        this.getFullRestaurants();
    },
    methods:{
        filter(){
            this.restaurantsList = [];
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
                        console.log(value)
                        console.log(this.restaurantsList)
                        
                        if(this.restaurantsList.filter(e => e.slug === value.slug).length > 0) {
                            console.log("già presente")
                            console.log(value)
                        }
                        else {
                            this.restaurantsList.push(value)
                            console.log("aggiunto")
                            console.log(value)
                            
                        }
                    })
                    



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
                console.log(this.restaurantsList)
            })
            .catch(err => {
                console.error(err); 
            })
        }
    }
}
</script>

<style scoped lang="scss">

</style>