@extends('layouts.main')

@section('content')
<!--========== PROMO BLOCK ==========-->
    <div class="s-promo-block-v1 g-bg-color--primary-to-blueviolet-ltr g-fullheight--md">
        <div class="container g-ver-center--md g-padding-y-100--xs">
            <div class="row g-hor-centered-row--md g-margin-t-30--xs g-margin-t-20--sm">

                <div class="col-lg-6 col-lg-offset-3 col-sm-6 g-hor-centered-row__col g-text-center--xs g-text-left--md g-margin-b-60--xs g-margin-b-0--md text-center">
                    <div class="s-promo-block-v1__square-effect g-margin-b-60--xs text-center">
                    @if(Auth::user()->payments()->where('status', '!=', 'successful')->first())
                        <h1 class="g-font-size-32--xs g-font-size-45--sm g-font-size-50--lg g-color--white"> Your payment is waiting confirmation.. </h1>
                    @else
                        <h1 class="g-font-size-32--xs g-font-size-45--sm g-font-size-50--lg g-color--white">Hello,<br>{{ Auth::user()->fullname() }}</h1>
                        @if(Auth::user()->hasPaid())
                            <p class="g-font-size-20--xs g-font-size-26--md g-color--white g-margin-b-0--xs">Welcome to your dashboard.</p>
                        @else
                            <p class="g-font-size-20--xs g-font-size-26--md g-color--white g-margin-b-0--xs">Now let's complete your registration for you...</p>
                        @endif
                    @endif
                    </div>
                    @if(Auth::user()->hasPaid())
                        <span class="g-display-block--xs g-display-inline-block--lg g-margin-b-10--xs g-margin-b-10--lg">
                            <a href="/store" class="s-btn s-btn--xs s-btn--white-brd g-padding-x-30--xs g-radius--50">
                                <span class="s-btn__element--left">
                                    <i class="g-font-size-32--xs ti-mobile"></i>
                                </span>
                                <span class="s-btn__element--right g-padding-x-10--xs">
                                    <span class="g-display-block--xs g-font-size-11--xs">Go to</span>
                                    <span class="g-font-size-16--xs">Store</span>
                                </span>
                            </a>                        
                        </span>
                    @else
                    <p class="g-font-size-20--xs g-font-size-26--md g-color--white g-margin-b-0--xs">Kindly choose a payment method below:</p><br>

                    <span class="g-display-block--xs g-display-inline-block--lg g-margin-b-10--xs g-margin-b-10--lg">
                        <a href="" data-toggle="modal" data-target="#bank" class="s-btn s-btn--xs s-btn--white-brd g-padding-x-30--xs g-radius--50">
                            <span class="s-btn__element--left">
                                <i class="g-font-size-32--xs ti-mobile"></i>
                            </span>
                            <span class="s-btn__element--right g-padding-x-10--xs">
                                <span class="g-display-block--xs g-font-size-11--xs">Direct Bank</span>
                                <span class="g-font-size-16--xs">Transfer</span>
                            </span>
                        </a>                        
                    </span>
                    <span class="g-padding-x-0--xs g-padding-x-10--lg">
                        <a href="" data-toggle="modal" data-target="#card" class="s-btn s-btn--xs s-btn--white-brd g-padding-x-30--xs g-radius--50">
                            <span class="s-btn__element--left">
                                <i class="g-font-size-32--xs ti-credit-card"></i>
                            </span>
                            <span class="s-btn__element--right g-padding-x-10--xs">
                                <span class="g-display-block--xs g-font-size-11--xs">Or pay with your</span>
                                <span class="g-font-size-16--xs">Credit Card</span>
                            </span>
                        </a>
                    </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!--========== END PROMO BLOCK ==========-->
    <div id="bank" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
                <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2">PLAN: {{ Auth::user()->plans->name }}</p>
          </div>
          <div class="modal-body">
                @if(Auth::user()->payments()->where('status', '!=', 'successful')->first())
                    <p>Your payment is awaiting confirmation! Kindly wait some few moments for this.</p>
                @else
                <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2">Make Payment To:</p>
                <h2 class="g-font-size-32--xs g-font-size-36--sm g-margin-b-25--xs">MEGA MINDS LTD</h2>
                <p class="g-font-size-18--sm">
                    Account Number : <b>0023098765</b>
                </p>
                <p>
                    Bank : Zenith Bank
                </p>
                <p>
                    Amount : &#8358;{{ number_format(Auth::user()->plans->price, 2) }}
                </p>

                <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-25--xs">Next:</p>
                
                <p class="g-font-size-18--sm">
                    <form method="post" action="{{ route('proof.upload') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="plan" value="{{ Auth::user()->plans->id }}">
                        <div class="form-group">
                            <label for="image">Upload Your Proof of Payment here:</label>
                            <input type="file" class="form-control" name="image">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="s-btn s-btn--xs btn-primary g-padding-x-30--xs g-radius--50">Upload</button>
                        </div>
                    </form>
                </p>

                <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-25--xs">Then:</p>

                <p class="g-font-size-18--sm">
                    Send a mail to <span class="g-color--primary g-letter-spacing--2 g-margin-b-25--xs">flashsales@crypto2naira.com</span> with your details for payment confirmation.
                </p>

                <p>
                    You will receive a confirmation email within one hour and you can proceed to preorder your items!
                </p>

                <p style="color: red;">
                    You have 24hrs to complete your registration before it expires
                </p>
                @endif
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>
    <div id="card" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2">PLAN: {{ Auth::user()->plans->name }}</p>
          </div>
          <div class="modal-body text-center">
                <form method='POST' action='https://voguepay.com/pay/'>

                <input type='hidden' name='v_merchant_id' value='3704-0052968' />
                <input type='hidden' name='memo' value='July Flash Sales Registration Fee' />

                <input type='hidden' name='item_1' value='Registration Fee' />
                <input type='hidden' name='description_1' value='{{Auth::user()->plans->name}} Plan Registration Payment' />
                <input type='hidden' name='price_1' value='{{ Auth::user()->plans->price }}' />

                <input type='hidden' name='total' value='{{ Auth::user()->plans->price }}' />
                 <button class="s-btn s-btn--xs btn-lg btn-primary g-padding-x-30--xs g-radius--50">Click here to proceed</button>
                </form>
               
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>
    <!--========== PAGE CONTENT ==========-->
    <!-- Mockup -->
    <div id="js__scroll-to-section" class="container g-padding-y-80--xs g-padding-y-125--xsm">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
            <h3 class="text-center">Payment History</h3>
                <table class="table">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Proof</th>
                      </tr>
                    </thead>
                    <tbody>
                        @if(count(Auth::user()->payments))
                        @foreach(Auth::user()->payments as $p)      
                          <tr class="{{ $p->status == 'successful' ? 'success' : 'danger'}}">
                            <td>{{ $p->transaction_id }}</td>
                            <td>{{ $p->amount }}</td>
                            <td>{{ $p->status }}</td>
                            <td> <a href="{{ Storage::url($p->payment_proof) }}" class="btn btn-primary">View Proof</a> </td>
                          </tr>
                        @endforeach
                        @else
                            <h3 class="text-center">
                                Empty
                            </h3>
                        @endif
                    </tbody>
                  </table>
            </div>
        </div>
        <br>
        <hr>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
            <h3 class="text-center">Preordered Items</h3>
                <table class="table">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Product</th>
                        <th>Status</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach(Auth::user()->orders as $order)     
                        @if(count(Auth::user()->orders)) 
                          <tr class="{{ $order->status == 'confirmed' ? 'success' : 'danger'}}">
                            <td>{{ $order->order_number }}</td>
                            <td>{{ $order->product->name }}</td>
                            <td>{{ $order->status }}</td>
                            <td>&#8358; {{ $order->total }}</td>
                            {{-- <td> <a href="{{ Storage::url($p->payment_proof) }}" class="btn btn-primary">View Proof</a> </td> --}}
                          </tr>
                          @else
                            <h3 class="text-center">Empty</h3>
                          @endif
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
        <br>
        <hr>
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center">
                <h3>
                    Your referral link
                </h3>
                <p class="g-font-size-14--xs g-font-weight--700">
                    Share this link and get &#8358;1,000.00 free voucher for every user that registers for the trade fair.
                </p>
                @if(Auth::user()->plans->name == 'basic')
                    <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2">
                        Your plan does not qualify you.
                    </p>
                @else
                    @if(Auth::user()->hasPaid())
                    <input type="text" class="form-control" disabled="" name="" value="{{ url('register') . '?ref=' . Auth::user()->affiliate_id }}">
                    @else
                    <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2">
                        When your payment is confirmed, you will get your referral link here.
                    </p>
                    @endif
                @endif
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h3 class="text-center">Your referrals</h3>
                <table class="table">
                    <thead>
                        <th>
                            Name
                        </th>
                        <th>Registration Fee</th>
                        <th>Voucher</th>
                    </thead>
                    <tbody>
                        @if(Auth::user()->plans->name == 'basic')
                            <tr>
                                 <td class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2">
                                    Your plan does not qualify you.
                                </td>
                            </tr>
                           
                        @else
                            @if(Auth::user()->hasPaid())
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->fullname() }}</td>
                                        <td>{{ $user->hasPaid() ? 'Paid' : 'Not Paid'}}</td>
                                        <td>{{ $user->hasPaid() ? 'Qualified' : 'Not qualified yet.' }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr><td>
                                    <td class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2">
                                    When your payment is confirmed, Your referrals will appear here.
                                </td>
                                </td></tr>
                            @endif
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        <br>
        <br>
        <hr>
@stop

