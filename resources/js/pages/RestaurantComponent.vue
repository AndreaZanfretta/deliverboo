<template>
    <div>
        <p>restaurant</p>
        <div v-if="user">
             <h2>{{user.name}}</h2>
             <div v-if="user.products">
                <ul v-for="product in user.products" :key="product.id">
                    <li>{{product.name}}</li>
                </ul>
            </div>
        </div>
        
       
    </div>
</template>

<script>
export default {
    name: 'RestaurantComponent',
    data(){
        return{
            user: null,
        }
    },
    created(){
        const slug = this.$route.params.slug;
        axios.get(`/api/menu/${slug}`).then((response)=>{
            this.user = response.data[0];
            console.log(this.user.products)
            
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