@extends('layouts.app')

@section('content')

<div class="banner-slider" style="background-image: url({{ asset('uploads/'.$g_setting->banner_payment) }})">
    <div class="bg"></div>
    <div class="bannder-table">
        <div class="banner-text">
            <h1>{{ PAYMENT }}</h1>
        </div>
    </div>
</div>

<div class="featured-detail country-detail pt_50 pb_80">
    <div class="container wow fadeIn">
        <div class="row">
            <div class="col-md-12 wow fadeIn" data-wow-delay="0.2s">
                <div class="mt_30">

                    <div class="fea-descrip mt_30">
                        <div class="headstyle-two">
                            <h4>{{ BOOKING_DETAIL }}</h4>
                        </div>
                        <div class="descrip-pre">
                            <table class="table table-bordered">
                                <tr>
                                    <th class="w_25_p">{{ PACKAGE_NAME }}</th>
                                    <th class="w_25_p">{{ TOTAL_PRICE_PER_PERSON }}</th>
                                    <th class="w_25_p">{{ TOTAL_PERSONS }}</th>
                                    <th class="w_25_p tar">{{ SUBTOTAL }}</th>
                                </tr>
                                <tr>
                                    <td>{{ session()->get('package_name') }}</td>
                                    <td><i class="{{ $g_setting->currency_sign }}"></i> {{ number_format(session()->get('package_price'),2) }}</td>
                                    <td>{{ session()->get('total_person') }}</td>
                                    <td class="tar">
                                        @php
                                        $final_price = session()->get('package_price') * session()->get('total_person');
                                        @endphp
                                        <i class="{{ $g_setting->currency_sign }}"></i> {{ number_format($final_price,2) }}
                                    </td>
                                </tr>
                                <tr>
                                    <th colspan="3" class="tar">{{ TOTAL }} ({{ $g_setting->currency_name }})</th>
                                    <th class="tar">
                                        <i class="{{ $g_setting->currency_sign }}"></i> {{ number_format($final_price,2) }}
                                    </th>
                                </tr>
                                <tr>
                                    @php
                                    $final_price_in_usd = $final_price/$g_setting->currency_per_usd_value;
                                    @endphp
                                    <th colspan="3" class="tar">{{ TOTAL }} (USD)</th>
                                    <th class="tar">
                                        $ {{ number_format($final_price_in_usd,2) }}
                                    </th>
                                </tr>
                            </table>
                        </div>

                            
                        <div class="headstyle-two">
                            <h4>{{ MAKE_PAYMENT }}</h4>

                            @if(session()->get('traveller_country') == '')
                            <div class="col-md-12">
                                <div class="text-danger">
                                    {{ PROFILE_DATA_UPDATE_WARNING }}
                                    <div class="mt_10">
                                        <a href="{{ route('traveller.profile_change') }}" class="btn btn-primary btn-sm">{{ GO_TO_PROFILE_UPDATE_PAGE }}</a>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="paypal mt_0 payment-method-box">
                                        <h4>{{ PAY_WITH_PAYPAL }}</h4>
                                        <div id="paypal-button"></div>
                                    </div>                                    
                                </div>
                                <div class="col-md-4">
                                    <div class="stripe mt_0 payment-method-box">
                                        <h4>{{ PAY_WITH_STRIPE }}</h4>

                                        @php
                                            $final_price_in_usd = $final_price/$g_setting->currency_per_usd_value;
                                            $final_price_in_usd = round($final_price_in_usd,2);
                                            $cents = $final_price_in_usd*100;
                                        @endphp

                                        @php
                                            $traveller_email = session()->get('traveller_email');
                                        @endphp

                                        <form action="{{ route('traveller.stripe') }}" method="post">
                                            @csrf
                                            <script
                                                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                                data-key="{{ $g_setting->stripe_public_key }}"
                                                data-amount="{{ $cents }}"
                                                data-name="{{ env('APP_NAME') }}"
                                                data-description=""
                                                data-image="{{ asset('images/stripe_icon.png') }}"
                                                data-currency="usd"
                                                data-email="{{ $traveller_email }}"
                                            >
                                            </script>
                                        </form>
                                    </div>
                                </div>

                            </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@php
    $paypal_mode = $g_setting->paypal_environment;
    $client = $g_setting->paypal_client_id;
    $secret = $g_setting->paypal_secret_key;
@endphp

@if($paypal_mode == 'sandbox')
    @php
        $paypal_url = 'https://api.sandbox.paypal.com/v1/';	
        $env_type = 'sandbox';
    @endphp
@elseif($paypal_mode == 'production')
    @php
        $paypal_url = 'https://api.paypal.com/v1/';
        $env_type = 'production';
    @endphp
@endif

<script>
    paypal.Button.render({
        env: '{{ $env_type }}',
        client: {
            sandbox: '{{ $client }}',
            production: '{{ $client }}'
        },
        locale: 'en_US',
        style: {
            size: 'medium',
            color: 'blue',
            shape: 'rect',
        },

        // Set up a payment
        payment: function (data, actions) {
            return actions.payment.create({

                redirect_urls:{
                    return_url: '{{ url("traveller/execute-payment") }}'
                },

                transactions: [{
                    amount: {
                        total: '{{ $final_price_in_usd }}',
                        currency: 'USD'
                    }
                }]
          });
        },

        // Execute the payment
        onAuthorize: function (data, actions) {
            return actions.redirect();
        }
    }, '#paypal-button');
</script>

@endsection