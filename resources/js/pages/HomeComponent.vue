<template>
    <div>
        <h2>Home</h2>
        <!-- <button><router-link :to="{ name: 'home', params: { slug: 'vegano' } }">Vegano</router-link></button> -->
        <!-- ALL BUTTON -->
        <button v-on:click="filter">
            <router-link :to="{ name: 'homeSlug', params: { slug: 'tutti'  } }">Tutti</router-link>
        </button>

        <!-- TYPES BUTTONS -->
        <button v-for="(type) in allTypes" :key="type.id" v-on:click="filter">
            <router-link :to="{ name: 'homeSlug', params: { slug: type.slug  } }">{{type.name}}</router-link>
        </button>

        <!-- LISTA RISTORANTI -->
        <ul v-if="types.length > 0">
            <li v-for="type in types" :key="type.id">
                {{type.id}} - {{type.name}}
                <ul v-for="restaurant in type.users" :key="restaurant.id">
                    <li >
                        <router-link :to="{ name: 'menu', params: { slug: restaurant.slug  } }">{{restaurant.name}}</router-link>
                    </li>
                </ul>
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
            types: [],
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
        const slug = this.$route.params.slug;
        console.log(slug)
        axios.get(`/api/search/${slug}`).then((response)=>{
            console.log(response.data)
            this.types = response.data;
            console.log("new mounted")

        })
        .catch((error) => {
            // handle error
            console.log(error);
            /* this.$router.push({name: 'page-404'}); */
        })
    },
    methods:{
        filter(){
            const slug = this.$route.params.slug;
            console.log(slug)
            axios.get(`/api/search/${slug}`).then((response)=>{
                console.log(response.data)
                this.types = response.data;
                console.log("new mounted")

            })
            .catch((error) => {
                // handle error
                console.log(error);
                /* this.$router.push({name: 'page-404'}); */
            })
        }
    }
}
</script>

<style scoped lang="scss">

</style>