<template>
    
    <a title="Add To Cart" href="" class="button product_type_simple add_to_cart_button"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Add to cart</a>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },

        props: ['product'],

        methods: {
            addToCart(){
                
            }
        }
    }
</script>
