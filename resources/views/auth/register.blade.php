@extends('layouts.main')

@section('content')

    @if(!Request::query('plan'))
        @include('partials.signup')
    @else

    <!-- Subscribe -->
    <div class="g-bg-color--primary-to-blueviolet-ltr">
        <div class="g-container--sm g-text-center--xs g-padding-y-80--xs g-padding-y-125--xsm">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                    <form class="center-block g-width-350--xs g-bg-color--white-opacity-lightest g-box-shadow__blueviolet-v1 g-padding-x-40--xs g-padding-y-60--xs g-radius--4">
                        <div class="g-text-center--xs g-margin-b-40--xs">
                            <h2 class="g-font-size-30--xs g-color--white">Signup</h2>
                            <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--white-opacity g-letter-spacing--2 g-margin-b-25--xs">PLAN = {{ Request::query('plan') }}</p>
                        </div>
                        <div class="g-margin-b-30--xs">
                            <input type="text" class="form-control s-form-v3__input" placeholder="* Name">
                        </div>
                        <div class="g-margin-b-30--xs">
                            <input type="email" class="form-control s-form-v3__input" placeholder="* Email">
                        </div>
                        <div class="g-margin-b-30--xs">
                            <input type="password" class="form-control s-form-v3__input" placeholder="* Password">
                        </div>
                        <div class="g-text-center--xs">
                            <button type="submit" class="text-uppercase btn-block s-btn s-btn--md s-btn--white-bg g-radius--50 g-padding-x-50--xs g-margin-b-20--xs">Signup</button>
                            <!-- <a class="g-color--white g-font-size-13--xs" href="#">Forgot Password?</a> -->
                        </div>
                    </form>
                    <form method='POST' action='https://voguepay.com/pay/'>
                   <input type='hidden' name='v_merchant_id' value='3704-0052968' />
<input type='hidden' name='merchant_ref' value='234-567-890' />
<input type='hidden' name='memo' value='Bulk order from McAckney Web Shop' />

<input type='hidden' name='item_1' value='Face Cap' />
<input type='hidden' name='description_1' value='Blue Zizi facecap' />
<input type='hidden' name='price_1' value='2000' />

<input type='hidden' name='item_2' value='Laban T-shirt' />
<input type='hidden' name='description_2' value='Green XXL' />
<input type='hidden' name='price_2' value='3000' />

<input type='hidden' name='item_3' value='Black Noni Shoe' />
<input type='hidden' name='description_3' value='Size 42' />
<input type='hidden' name='price_3' value='8000' />

<input type='hidden' name='developer_code' value='pq7778ehh9YbZ' />
<input type='hidden' name='store_id' value='25' />

<input type='hidden' name='total' value='13000' />

<input type='image' src='http://voguepay.com/images/buttons/buynow_blue.png' alt='Submit' />

</form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Subscribe -->

    @endif
@stop