@extends('layouts.main')

@section('content')

    @if(!Request::query('plan'))
        @include('partials.signup')
    @else
    <!-- Subscribe -->
    <div class="g-bg-color--primary-to-blueviolet-ltr">
        <div class="g-container--sm g-text-center--xs g-padding-y-80--xs g-padding-y-125--xsm">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 col-xs-12">
                    <form class="g-bg-color--white-opacity-lightest g-box-shadow__blueviolet-v1 g-padding-x-40--xs g-padding-y-60--xs g-radius--4" method="post" action="{{ route('sale.user.register') }}" id="form">
                        {{ csrf_field() }}
                        <div class="g-text-center--xs g-margin-b-40--xs">
                            <h3 class="text-uppercase g-font-size-30--xs g-color--white">{{ Request::query('plan') }}</h3>
                            <p class=" g-font-size-14--xs g-font-weight--700 g-color--white-opacity g-letter-spacing--2 g-margin-b-25--xs"> Amount = &#8358;{{ number_format($plan->price, 2) }} </p>
                        </div>
                        <div class="g-margin-b-30--xs{{ $errors->has('name') ? ' has-error' : '' }}">
                            <input type="text" class="form-control s-form-v3__input" name="name" placeholder="* Name" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="g-margin-b-30--xs{{ $errors->has('email') ? ' has-error' : '' }}">
                            <input type="email" class="form-control s-form-v3__input" name="email" placeholder="* Email" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="g-margin-b-30--xs{{ $errors->has('password') ? ' has-error' : '' }}">
                            <input type="password" class="form-control s-form-v3__input" name="password" placeholder="* Password">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <input type="hidden" name="plan" value="{{ $plan->id }}">
                        <div class="g-text-center--xs">
                            <button type="button" data-toggle="modal" data-target="#card" class="text-uppercase btn-block s-btn s-btn--md s-btn--white-bg g-radius--50 g-padding-x-50--xs g-margin-b-20--xs">Signup</button>
                        </div>
                        <div id="card" class="modal fade" role="dialog">
                          <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2">Please review the following:</p>
                              </div>
                              <div class="modal-body" style="text-align: left;">
                                    <p class="g-font-size-20--xs g-margin-b-0--xs">1. Over 3,000 items across different categories are up for grabs. Registering now gives you the access to the cryptocurrency trade fair and to preorder the items before then.</p><br>
                                   <p class="g-font-size-20--xs g-margin-b-0--xs">2. Before your registration can be completed, you are to pay your registration fee either through direct bank transfer or through online payment with your credit card. You have 24hrs to do this or your registration will expire.</p><br>
                                   <p class="g-font-size-20--xs g-margin-b-0--xs">3. The only acceptable cryptocurrencies are The Billion Coin (TBC), Greycoin (GRC) and Bitcoin (BTC)</p><br>
                                   
                              </div>
                              <div class="modal-footer">
                                <button type="submit" class="s-btn s-btn--md btn-primary g-radius--50 g-padding-x-50--xs g-margin-b-20--xs pull-right">Sign Up</button>
                              </div>
                            </div>

                          </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Subscribe -->

    @endif
@stop
{{-- <div class="modal-body" style="text-align: left;">
                                    <p class="g-font-size-20--xs g-margin-b-0--xs">1. Over 10,000 items across different categories are up for grabs. Registering now gives you the access to the cryptocurrency trade fair and to preorder the items before then.</p><br>
                                   <p class="g-font-size-20--xs g-margin-b-0--xs">2. </p><br>
                                   <p class="g-font-size-20--xs g-margin-b-0--xs">3. </p><br>
                                   <p class="g-font-size-20--xs g-margin-b-0--xs">4. Also, you will be provided with a printable payment invoice which serves as your entry tag on the sales day.</p><br>
                                   <p class="g-font-size-20--xs g-margin-b-0--xs">5. </p><br>
                                   <p class="g-font-size-20--xs g-margin-b-0--xs">6. </p><br>
                                   <p class="g-font-size-20--xs g-margin-b-0--xs">7. The only acceptable cryptocurrencies are The Billion Coin (TBC), Greycoin (GRC) and Bitcoin (BTC)</p><br>
                                   
                              </div> --}}