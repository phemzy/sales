<template>
 <div class="cart-collaterals col-md-6 col-sm-6 col-xs-12">
    <div class="coupon">
        <h4>Got A Coupon</h4>
        <div class="input-group">
            <input type="text" class="form-control" id="coupon" placeholder="Coupon code">
            <span class="input-group-btn">
                <button class="btn btn-default" type="button" id="submitCoupon" onclick="sendTo()">Apply Coupon</button>
            </span>
        </div>
    </div>  
</div>
</script>
<script>
    export default {
        mounted(){
            console.log('mounted')
        }
    }
</script>