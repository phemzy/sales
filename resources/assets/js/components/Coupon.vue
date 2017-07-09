<template>
<div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="cart_totals">
            <h4>Shiping</h4>
            <div class="cart_totals_table">
                <table>
                    <tbody>
                        <tr class="shipping">
                            <th colspan="2">
                                <div class="form-group"><input type="checkbox" checked=""><label>Free Shipping</label></div>
                                <div class="form-group"><input type="checkbox" checked=""><label>Pickup (Free)</label></div>
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="totals">
                <h3>Total</h3>
                <h4>&#8358;0</h4>
            </div>
            <div class="totals">
                <h3>Order Total</h3>
                <h4>&#8358;{{ total }}</h4>
            </div>                              
        </div>
    </div>
    <div class="cart-collaterals col-md-6 col-sm-6 col-xs-12">
    <div class="coupon">
        <h4>Got A Coupon</h4>
        <div class="input-group">
            <input type="text" class="form-control" id="coupon" v-model="coupon" placeholder="Coupon code">
            <span class="input-group-btn">
                <button class="btn btn-default" type="button" @click="submit">Apply Coupon <i :class="{'fa fa-spin fa-spinner': submitted}"></i></button>
            </span>
        </div>
         <p>{{ message }}</p>
    </div>  
</div>
</div>
 
</template>
<script>
    export default {
        mounted(){
            axios.get('/order/gettotal').then((resp)=>{
                this.total = resp.data
            })
        },

        data(){
            return {
                coupon: '',
                submitted: '',
                message: '',
                total: '',
            }
        },

        methods: {
            submit(){
                this.submitted = true
                axios.get('/coupon/check/' + this.coupon).then( (resp)=>{
                    console.log(resp)
                    this.total = resp.data.order_total
                    this.message = resp.data.message

                    this.submitted = false
                })
            }
        }
    }
</script>