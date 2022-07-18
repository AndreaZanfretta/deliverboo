<template>
    <div>
        <h2>Home</h2>
        <!-- <button><router-link :to="{ name: 'home', params: { slug: 'vegano' } }">Vegano</router-link></button> -->
        <button>
            <router-link :to="{ name: 'search', params: { slug: 'tutti'  } }">Tutti</router-link>
        </button>
        <button v-for="(type) in types" :key="type.id">
            <router-link :to="{ name: 'search', params: { slug: type.slug  } }">{{type.name}}</router-link>
        </button>
    </div>
</template>

<script>
export default {
    name: 'HomeComponent',
    data(){
        return{
            types: [],
        }
    },
    created(){
        axios.get('/api').then((response)=>{
            this.types = response.data;
            
        }
        )
        .catch(err => {
            console.error(err); 
        })
    }
}
</script>

<style scoped lang="scss">

</style>