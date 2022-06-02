@extends('layouts.app')

@section('content')
    <main class="faq">
        <section class="inner-banner text-center text-uppercase ">
            <div class="container">
                <div class="row pt-12 pt-sm-12 align-items-center justify-content-center">
                    <div class="col">
                        <h1 class="fs-1 fw-bold">contact</h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="pt-10 pb-5 contact">
            <div class="container">
                <div class="row  justify-content-center">
                    <div class="col-lg-6">
                        <h2 class="fs-4 text-uppercase">
                            If you have any unanswered questions, <br> please let us know.
                        </h2>
                        <ul class="detail pt-lg-4 pt-3">
                            <li class="d-flex py-3">
                                <img src="{{ asset('/images/email.png') }}" alt="-icon" width="58" height="58"
                                    class="">
                                <div class="ps-4">
                                    <p class="text-white text-uppercase fw-bold">Email Us</p>
                                    <a href="mailto:email@youremail.com" class="text-white">email@youremail.com</a>
                                </div>

                            </li>
                            <li class="d-flex py-3">
                                <img src="{{ asset('/images/phone.png') }}" width="58" height="58" alt="-icon"
                                    class="">
                                <div class="ps-4">
                                    <p class="text-white text-uppercase fw-bold">Contact Us</p>
                                    <p> <a href="tel:4702072358" class="text-white">(470) 207-2358</a></p>
                                    <a href="fax:4702002005" class="text-white">Fax : (470) 200-2005</a>
                                </div>

                            </li>
                            <li class="d-flex py-3">
                                <img src="{{ asset('/images/pin.png') }}" width="58" height="58" alt="-icon" class="">
                                <div class="ps-4">
                                    <p class="text-white text-uppercase fw-bold">Visit Us:</p>
                                    <a href="https://maps.google.com/" class="text-white" target="_blank">2925 Lorem Dr.
                                        Ste A <br> Ipsum, GA 30024</a>
                                </div>

                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <h2 class="fs-4 text-uppercase">
                            By appointment only. Please email or call us beforehand.
                        </h2>
                        <form method="post" action="{{ route('lead.contact') }}" class="row row-cols-1 g-3 pt-lg-4 pt-3 ">
                            @csrf
                            <div class="col">
                                <input type="text" placeholder="Name*" name="name"
                                    class="form-control bg-transparent rounded-0 py-3 w-100 text-white" id="">
                            </div>
                            <div class="col">
                                <input type="tel" placeholder="Phone*" name="phone"
                                    class="form-control bg-transparent rounded-0 py-3 w-100 text-white" id="">
                            </div>
                            <div class="col">
                                <input type="email" placeholder="Email*" name="email"
                                    class="form-control bg-transparent rounded-0 py-3 w-100 text-white" id="">
                            </div>
                            <div class="col">
                                <input type="text" placeholder="Best time to call" name="time"
                                    class="form-control bg-transparent rounded-0 py-3 w-100 text-white" id="">
                            </div>
                            <div class="col">
                                <textarea type="text" placeholder="Write Your Meassage*" name="message"
                                    class="form-control bg-transparent rounded-0 py-3 w-100 text-white" rows="8"
                                    id=""></textarea>
                            </div>

                            <div class="col-lg-4">
                                <button type="submit"
                                    class="btn btn-primary button-2 w-100 fw-normal py-2 fs-5 text-uppercase fw-600">Submit
                                    Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
