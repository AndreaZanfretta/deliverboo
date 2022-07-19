<template>
    <div>
        <p>restaurant</p>
        <div v-if="user">
             <h2>{{user.name}}</h2>
             <div v-if="user.products">
                <ul>
                    <li v-for="product in products" :key="product.id" v-bind:class="{isVisible: !product.visible}">
                        {{product.visible}} - {{product.name}} - {{product.price}}&euro; - {{product.description}}
                    </li>
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
            products: null,
        }
    },
    created(){
        const slug = this.$route.params.slug;
        axios.get(`/api/menu/${slug}`).then((response)=>{
            this.user = response.data[0];
            this.products = this.user.products
            //console.log(this.products)
            
        }
        )
        .catch(err => {
            console.error(err); 
        })
    },
    computed: {
        classVisible: function (){
            console.log(this)
            return {
                
                isVisible: this.visible,
                

            }
        }
    }
}
</script>

<style scoped lang="scss">
.isVisible {
    text-decoration: line-through;
}
</style>