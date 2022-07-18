<template>
    <div>
        <p>Search</p>
        <ul v-if="types.length > 0">
            <li v-for="(type) in types" :key="type.id">
                {{type.id}} - {{type.name}}
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    name: 'SearchComponent',
    data(){
        return{
            types: [],
        }
    },
    /* created(){
        axios.get('/api/search')
        .then(res => {
            console.log(res)
            this.restaurants = res.data;
        })
        .catch(err => {
            console.error(err); 
        })
    } */
    mounted(){
        const slug = this.$route.params.slug;
        console.log(slug)
        axios.get('/api/search/${slug}').then((response)=>{
            console.log(response.data)
            this.types = response.data;
            
        })
        .catch((error) => {
            // handle error
            console.log(error);
            /* this.$router.push({name: 'page-404'}); */
        })
    }
}
</script>

<style scoped lang="scss">

</style>