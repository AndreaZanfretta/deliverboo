<template>
    <div>
        <p>Search</p>
        <ul v-if="restaurants.length > 0">
            <li v-for="(restaurant, index) in restaurants" :key="restaurant.id">
                {{index}} - {{restaurant.name}}
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    name: 'SearchComponent',
    data(){
        return{
            restaurants: [],
        }
    },
    created(){
        axios.get('/api/search')
        .then(res => {
            console.log(res)
            this.restaurants = res.data;
        })
        .catch(err => {
            console.error(err); 
        })
    }
}
</script>

<style scoped lang="scss">

</style>