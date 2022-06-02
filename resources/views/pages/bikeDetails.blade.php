@extends('layouts.app')

@section('content')

    <main class="faq bike">
        <section class="inner-banner text-center text-uppercase ">
            <div class="container">
                <div class="row pt-12 align-items-center justify-content-center">
                    <div class="col">
                        <h1 class="fs-1 fw-bold">The tour of a lifetime starts here.</h1>
                    </div>
                </div>
            </div>
        </section>


        <section class="pt-10">
            <div class="container">
                <div class="row row-cols-1 row-cols-lg-2">
                    <div class="col">
                        <img src="{{ asset('storage/' . $bike->fea_image) }}" class="img-fluid w-100"
                            style="height: 593px" alt="product">
                    </div>
                    <div class="col">
                        <div class="productDetail px-lg-5">
                            <p class="brd fw-600 fs-48 position-relative text-white">Specifications</p>
                            <ul class="pt-5">
                                <li class="row justify-content-between border-bottom align-items-center py-3">
                                    <div class="col-lg-5">
                                        <span class="fw-600 fs-5">Type: </span>
                                        @if ($bike->bike_type != null)
                                            {{ $bike->bike_type->name }}
                                        @endif
                                    </div>
                                    {{-- <div class="col-lg-7">
                                        <span class="fw-600 fs-5">Weight: </span> {{ $bike->weight }} kg
                                        ({{ $bike->weight * 2.2 }} lbs.)
                                    </div> --}}
                                </li>
                                <li class="row justify-content-between border-bottom align-items-center py-3">
                                    <div class="">
                                        <span class="fw-600 fs-5">Availability: </span>
                                        @if ($bike->bike_country != null)
                                            {{ $bike->bike_country->name }}, {{ $bike->bike_country->sortname }}
                                        @endif
                                    </div>
                                    {{-- <div class="col-lg-7">
                                        <span class="fw-600 fs-5">Seat Height: </span> {{ $bike->seat_height }} mm
                                        ({{ round($bike->seat_height / 25.4, 3) }}”)
                                    </div> --}}
                                </li>

                                <li class="row justify-content-between border-bottom align-items-center py-3">
                                    <div class="col-lg-5">
                                        <span class="fw-600 fs-5">Brand: </span> {{ $bike->bike_brand->name }}
                                    </div>
                                    {{-- <div class="col-lg-7">
                                        <span class="fw-600 fs-5">Lugagge: </span>
                                        @if (isset($bike->lugaggeR))
                                            Right Side Case
                                        @else
                                            N.A.
                                            @endif / @if (isset($bike->lugaggeL))
                                                Left Side Case
                                            @else
                                                N.A.
                                                @endif / @if (isset($bike->lugaggeT))
                                                    Top Side Case
                                                @else
                                                    N.A.
                                                @endif
                                    </div> --}}
                                </li>


                                <li class="row justify-content-between border-bottom align-items-center py-3">
                                    <div class="col-lg-5">
                                        <span class="fw-600 fs-5">CC: </span> {{ $bike->cc }}
                                    </div>
                                    {{-- <div class="col-lg-7">
                                        <span class="fw-600 fs-5">Lugagge Capacity: </span>
                                        @if (isset($bike->lugaggeR))
                                            {{ $bike->lugaggeR }} L ({{ round($bike->lugaggeR * 0.264172, 2) }} gal)
                                        @else
                                            N.A.
                                            @endif / @if (isset($bike->lugaggeL))
                                                {{ $bike->lugaggeL }} L ({{ round($bike->lugaggeL * 0.264172, 2) }}
                                                gal)
                                            @else
                                                N.A.
                                            @endif /
                                            @if (isset($bike->lugaggeT))
                                                {{ $bike->lugaggeT }} L ({{ round($bike->lugaggeT * 0.264172, 2) }}
                                                gal)
                                            @else
                                                N.A.
                                            @endif
                                    </div> --}}
                                </li>


                                <li class="row justify-content-between border-bottom align-items-center py-3">
                                    <div class="col-lg-5">
                                        <span class="fw-600 fs-5">HP: </span> {{ $bike->hp }}
                                    </div>
                                    {{-- <div class="col-lg-7">
                                        <span class="fw-600 fs-5">HP: </span> {{ $bike->hp }}
                                    </div> --}}
                                </li>
                            </ul>

                            <p class="mb-0 py-3">
                                <!--{!! $bike->description !!}-->
                                Requirements: Minimum 28 years old. 3 years old "A" Driving License. Young Driver Surcharge
                                applicable over 25 y.o.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-darke pt-10 pb-lg-5 pb-3">
            <div class="container">
                <div class="row justify-content-center mx-auto">
                    <div class="col-lg-8">
                        <p class="text-white fs-48 fw-600 text-center mb-4">Start Your Adventure</p>

                        <form action="{{ route('lead.bike') }}" id="checkoutform" data-cc-on-file="false"
                            data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" method="post"
                            class="row require-validation adventure">
                            @csrf
                            <input type="hidden" name="bike_id" value="{{ $bike->id }}">
                            <input type="hidden" name="rent" value="{{ $bike->rentPerDay }}">
                            <input type="hidden" name="stripeToken" id="mycompletestripetoken" />
                            <div class="col-md-6">
                                <div class="floating">
                                    <i class="fa-solid fa-location-dot"></i>
                                    <input id="input__username" class="floating__input form-control mb-3" name="pickup_loc"
                                        required type="text" placeholder="Pickup Location" value="{{ $bike->pickup_loc }}"/>
                                    <label for="input__username" class="floating__label" data-content="Pickup Location">
                                        <span class="hidden--visually">
                                            Pickup Location</span></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="floating">
                                    <i class="fa-solid fa-location-dot"></i>
                                    <input id="input__username" class="floating__input form-control mb-3" name="dropoff_loc"
                                        required type="text" placeholder="Dropoff Location" value="{{ $bike->pickup_loc }}"/>
                                    <label for="input__username" class="floating__label " data-content="Dropoff Location">
                                        <span class="hidden--visually ">
                                            Dropoff Location</span></label>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <!--<div class="floating">-->
                                <!--    <i class="fa-solid fa-calendar-days"></i>-->
                                <!--    <input -->
                                <!--        class="floating__input form-control mb-3 date_time border-raduis-0" id="datepicker"-->
                                <!--        name="pickup_date" type="text" placeholder="Pickup Date/Time" required  autocomplete="off" />-->
                                <!--    <label for="input__username" class="floating__label " data-content="Pickup Date/Time">-->
                                <!--        <span class="hidden--visually ">-->
                                <!--            Pickup Date/Time</span></label>-->
                                <!--</div>-->
                                <!--<div class="floating">-->
                                <!--    <i class="fa-solid fa-clock"></i>-->
                                <!--    <input id="input__username"-->
                                <!--        class="floating__input form-control mb-3 date_time border-raduis-0"-->
                                <!--        name="pickup_time" type="time" placeholder="" required/>-->
                                <!--</div>-->
                                <input type="text" name="datetimes" placeholder="Choose Pickup And Dropoff Date/Time" autocomplete="off" class="form-control" required>
                                <!--<input type="text" class="form-control datepicker" placeholder="Date" name="date">-->
                            </div>
                            <!--<div class="col d-flex">-->
                            <!--    <div class="floating">-->
                            <!--        <i class="fa-solid fa-calendar-days"></i>-->
                            <!--        <input -->
                            <!--            class="floating__input form-control mb-3 date_time border-raduis-0" id="dropdatepicker"-->
                            <!--            name="dropoff_date" type="text" placeholder="Pickup Date/Time" required  autocomplete="off"/>-->
                            <!--        <label for="input__username" class="floating__label " data-content="Dropoff Date/Time">-->
                            <!--            <span class="hidden--visually ">-->
                            <!--                Dropoff Date/Time</span></label>-->
                            <!--    </div>-->
                            <!--    <div class="floating">-->
                            <!--        <i class="fa-solid fa-clock"></i>-->
                            <!--        <input id="input__username"-->
                            <!--            class="floating__input form-control mb-3 date_time border-raduis-0"-->
                            <!--            name="dropoff_time" type="time" placeholder="" required/>-->
                            <!--    </div>-->
                            <!--</div>-->
                            {{-- <div class="col">
                                <div class="icon">
                                    <i class="fa-solid fa-motorcycle text-darke"></i>
                                    <select name="bike_select" class="ps-4 form-select mb-3"
                                        aria-label="Default select example">
                                        <option selected disabled>Select Motorcycle</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div> --}}
                            <div class="w-100">
                                @if (Auth::check())
                                    @if (auth()->user()->role == 'buyer')
                                        @if (auth()->user()->buyer != null)
                                            <button type="button" class="btn button-2 btn-primary fs-4 fw-600 w-100 mb-3"
                                                data-bs-toggle="modal" data-bs-target="#payMentModal">Rent Now</button>
                                        @else
                                            <a class="btn button-2 btn-primary fs-4 fw-600 w-100 mb-3"
                                                href="{{ route('buyer.create') }}">Please Complete Your Profile First</a>
                                        @endif
                                    @elseif (auth()->user()->role == 'admin' || auth()->user()->role == 'seller')
                                        <a class="btn button-2 btn-primary fs-4 fw-600 w-100 mb-3"
                                            href="{{ route('logout') }}"
                                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">Please
                                            Login As A Renter</a>
                                    @endif
                                @else
                                    <a class="btn button-2 btn-primary fs-4 fw-600 w-100 mb-3"
                                        href="{{ route('login') }}">Rent Now
                                    </a>
                                @endif
                            </div>
                            <!-- start payment modal -->
                            <div class="modal fade" id="payMentModal" tabindex="-1" aria-labelledby="payMentModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header border-0">
                                            <button type="button" class="btn-close btn-close-paypal" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body pt-3">
                                            
                                                <div class="row">
                                                    <div class="col-12 mb-3 form-group">
                                                        <label for="email" class="control-label text-dark">Email</label>
                                                        <input type="email" id="email" name="stripe_email" class="form-control"  placeholder="example@mail.com">
                                                    </div>
                                                    <div class="col-md-5 mb-3 form-group">
                                                        <!--<input type="text" name="stripe_cardNo" class="form-control card-number" id="credit-card"  placeholder="xxxx xxxx xxxx xxxx">-->
                                                        <label for="cc-number" class="control-label text-dark">CARD NUMBER</label>
                                                        <input id="cc-number" name="stripe_cardNo" type="tel" class="input-lg form-control card-number cc-number" autocomplete="cc-number" placeholder="•••• •••• •••• ••••" required>
                                                    </div>
                                                    <div class="col-md-2 mb-3 form-group">
                                                        <!--<input type="text" name="stripe_expiryMonth" class="form-control card-expiry-month" placeholder="Month">-->
                                                        <label for="cc-exp" class="control-label text-dark">CARD EXPIRY</label>
                                                        <input id="cc-exp" type="tel" name="stripe_expiryMonth" class="input-lg form-control cc-exp stripe_expiryMonth" autocomplete="cc-exp" placeholder="•• / ••" required>
                                                    </div>
                                                    <!--<div class="col-md-2 mb-3">-->
                                                    <!--    <input type="text" name="stripe_expiryYear" class="form-control card-expiry-year" placeholder="Year">-->
                                                    <!--</div>-->
                                                    <div class="col-md-3 mb-3 form-group">
                                                        <!--<input type="text" name="stripe_secNo" class="form-control card-cvc"  placeholder="xxx">-->
                                                        <label for="cc-cvc" class="control-label text-dark">CARD CVC</label>
                                                        <input id="cc-cvc" name="stripe_secNo" type="tel" class="input-lg form-control cc-cvc card-cvc" autocomplete="off" placeholder="••••" required>
                                                    </div>

                                                    <div class="col-12 text-center form-group">
                                                        <button type="button" onClick="stripeclick()" class="btn btn-paynow w-100"><i
                                                                class="fa-solid fa-credit-card me-2"></i>Pay Now</button>
                                                    </div>
                                                </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end payment modal -->
                            <!-- start confirmation modal -->
                            
                            @if(Session::has('success'))
                                <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header border-0">
                                                <button type="button" class="btn-close btn-close-paypal" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="p-4">
                                                <div class="text-center mb-3">
                                                    <img src="https://check.hostingladz.com/webapp/CobraRider/public/images/cobraLogo01.png" style="width: 50px; height: 50px;">
                                                </div>
                                               <h3 class="text-dark text-center fs-18 mb-3">
                                                   Your booking has been confirmed.
                                               </h3>
                                               <div class="text-center">
                                                    <i class="fa-solid fa-circle-check" style="color: green; font-size: 34px;"></i>
                                               </div>
                                            </div>
                                        </div>
                                        <!--    </div>-->
                                        <!--</div>-->
                                    </div>
                                </div>
                                
                            @endif
                            
                           
                            <!-- end confirmation modal -->
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </main>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script src="{{ asset('/js/jquery-3.6.0.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.payment/3.0.0/jquery.payment.min.js"></script>
    
    @if(Session::has('success'))
        
        
        <script type="text/javascript">
                                    $(window).on('load', function() {
                                        $('#confirmationModal').modal('show');
                                    });
                                </script>
    
    @endif
    
    

    <script type="text/javascript">
        // hiding selected dates
        var js_json_obt = @json($all_dates ?? '');
        // console.log(js_json_obt);

        $(function() {
            $('input[name="datetimes"]').daterangepicker({
                timePicker: true,
                startDate: moment().startOf('hour'),
                endDate: moment().startOf('hour').add(32, 'hour'),
                // maxDate: new Date(),
                locale: {
                    format: 'MM/DD/YYYY hh:mm A'
                },
                isInvalidDate: function(date) {
                    if (js_json_obt.includes(date.format('YYYY-MM-DD'))) {
                        return true;
                    }
                }
            });
             $('input[name="datetimes"]').val('');
             $('input[name="datetimes"]').attr("placeholder","Choose Pickup And Dropoff Date/Time");
        });
           
        // card number spacing
        input_credit_card = function(jQinp) {
            var format_and_pos = function(input, char, backspace) {
                var start = 0;
                var end = 0;
                var pos = 0;
                var value = input.value;

                if (char !== false) {
                    start = input.selectionStart;
                    end = input.selectionEnd;

                    if (backspace && start > 0) // handle backspace onkeydown
                    {
                        start--;

                        if (value[start] == " ") {
                            start--;
                        }
                    }
                    // To be able to replace the selection if there is one
                    value = value.substring(0, start) + char + value.substring(end);

                    pos = start + char.length; // caret position
                }

                var d = 0; // digit count
                var dd = 0; // total
                var gi = 0; // group index
                var newV = "";
                var groups = /^\D*3[47]/.test(value) ? // check for American Express
                    [4, 6, 5] : [4, 4, 4, 4];

                for (var i = 0; i < value.length; i++) {
                    if (/\D/.test(value[i])) {
                        if (start > i) {
                            pos--;
                        }
                    } else {
                        if (d === groups[gi]) {
                            newV += " ";
                            d = 0;
                            gi++;

                            if (start >= i) {
                                pos++;
                            }
                        }
                        newV += value[i];
                        d++;
                        dd++;
                    }
                    if (d === groups[gi] && groups.length === gi + 1) // max length
                    {
                        break;
                    }
                }
                input.value = newV;

                if (char !== false) {
                    input.setSelectionRange(pos, pos);
                }
            };

            jQinp.keypress(function(e) {
                var code = e.charCode || e.keyCode || e.which;

                // Check for tab and arrow keys (needed in Firefox)
                if (code !== 9 && (code < 37 || code > 40) &&
                    // and CTRL+C / CTRL+V
                    !(e.ctrlKey && (code === 99 || code === 118))) {
                    e.preventDefault();

                    var char = String.fromCharCode(code);

                    // if the character is non-digit
                    // -> return false (the character is not inserted)

                    if (/\D/.test(char)) {
                        return false;
                    }

                    format_and_pos(this, char);
                }
            }).
            keydown(function(e) // backspace doesn't fire the keypress event
                {
                    if (e.keyCode === 8 || e.keyCode === 46) // backspace or delete
                    {
                        e.preventDefault();
                        format_and_pos(this, '', this.selectionStart === this.selectionEnd);
                    }
                }).
            on('paste', function() {
                // A timeout is needed to get the new value pasted
                setTimeout(function() {
                    format_and_pos(jQinp[0], '');
                }, 50);
            }).
            blur(function() // reformat onblur just in case (optional)
                {
                    format_and_pos(this, false);
                });
        };

        input_credit_card($('#credit-card'));

        function stripeclick(){

            // e.preventDefault();

            var $form = $(".require-validation");
            
            var mystr = $('.stripe_expiryMonth').val();
            var myarr = mystr.split("/");
            var month = myarr[0];
            var year = myarr[1];
            // console.log(month);
            // console.log(year);


                // stripe token
            if (!$form.data('cc-on-file')) {
                // e.preventDefault();
                Stripe.setPublishableKey('{{ env('STRIPE_KEY') }}');
                var striperesponse = Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: month.slice(0, -1),
                    exp_year: year.slice(1)
                }, stripeResponseHandler);
                // console.log(striperesponse);
            }

            function stripeResponseHandler(status, response) {
                if (response.error) {

                    // console.log(response.error);
                    // $('.error')
                    // .removeClass('show')
                    // .find('.alert')
                    // .text(response.error.message);

                } else {
                    / token contains id, last4, and card type /
                    var token = response['id'];
                    document.getElementById("mycompletestripetoken").value = token;

                    document.getElementById('checkoutform').submit();
                }
            }
	   
				
			   
        }
        
    </script>
   
   <script>
        $(function($) {
            $('[data-numeric]').payment('restrictNumeric');
            $('.cc-number').payment('formatCardNumber');
            $('.cc-exp').payment('formatCardExpiry');
            $('.cc-cvc').payment('formatCardCVC');
            $.fn.toggleInputError = function(erred) {
                this.parent('.form-group').toggleClass('has-error', erred);
                return this;
            };
            $.payment.validateCardCVC('123');
            $('form').submit(function(e) {
                e.preventDefault();
                var cardType = $.payment.cardType($('.cc-number').val());
                $('.cc-number').toggleInputError(!$.payment.validateCardNumber($('.cc-number').val()));
                $('.cc-exp').toggleInputError(!$.payment.validateCardExpiry($('.cc-exp').payment('cardExpiryVal')));
                $('.cc-cvc').toggleInputError(!$.payment.validateCardCVC($('.cc-cvc').val(), cardType));
                $('.cc-brand').text(cardType);
                $('.validation').removeClass('text-danger text-success');
                $('.validation').addClass($('.has-error').length ? 'text-danger' : 'text-success');
            });
        });
    </script>

@endsection
