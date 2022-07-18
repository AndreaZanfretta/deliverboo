<template>
    <div>
        <h2>Home</h2>
        <ul v-if="restaurants.length > 0">
            <li v-for="(restaurant, index) in restaurants" :key="restaurant.id">
                {{index}} - {{restaurant.name}}
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    name: 'HomeComponent',
    data(){
        return{
            restaurants: [],
        }
    },
    created(){
        axios.get('/api/home').then((response)=>{
            console.log("responde" )
            console.log(response.data);
            this.restaurants = response.data;
            console.log("Restaurant" )
            console.log(this.restaurants)
        }
        )
    }
}
</script>

<style scoped lang="scss">

</style>