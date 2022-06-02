<footer>
    <div class="container py-lg-5 py-3">
        <div class="row row-cols-lg-4 row-cols-md-2 row-cols-1">
            <div class="col mb-4 mb-lg-0">
                <h6 class="fs-30 pb-4 text-uppercase"> Contact </h6>
                <ul>
                    <li class="pb-3"> <a href="mailto:info@example.com" class="fs-18 text-white"> <i
                                class="fa-solid fa-envelope"></i> <span class="ps-2">info@example.com</span>
                        </a> </li>
                    <li class="pb-3"> <a href="tel:+011234567890" class="fs-18 text-white"> <i
                                class="fa-solid fa-phone-volume"></i><span class="ps-2">(+01) 123 456
                                7890</span> </a> </li>
                    <li class="pb-3"> <a href="https://maps.google.com/" target="_blank"
                            class="fs-18 text-white d-flex"> <i class="fa-solid fa-location-dot"></i> <span
                                class="ps-2">lorem street 123, ipsum road the ipsum street</span> </a> </li>
                </ul>
            </div>
            <div class="col mb-4 mb-lg-0">
                <h6 class="fs-30 pb-4 text-uppercase">Quick links</h6>
                <ul class="text-uppercase">
                    <li class="pb-3"> <a class="text-white" href="{{ url('/') }}">Home</a> </li>
                    <li class="pb-3"> <a class="text-white" href="{{ route('about') }}">About Us</a>
                    </li>
                    <li class="pb-3"> <a class="text-white" href="{{ route('service') }}">Services </a>
                    </li>
                    <li> <a class="text-white" href="{{ route('testimonial') }}">Testimonials</a> </li>
                </ul>
            </div>
            <div class="col mb-4 mb-lg-0">
                <h6 class="fs-30 pb-4 text-uppercase">other links</h6>
                <ul class="text-uppercase">
                    <li class="pb-3"> <a class="text-white" href="{{ route('howItWorks') }}">How It
                            Works </a>
                    </li>
                    <li class="pb-3"> <a class="text-white" href="{{ route('about') }}"> Customer
                            Reviews </a> </li>
                    <li class="pb-3"> <a class="text-white" href="{{ route('faqs') }}">FAQs </a> </li>
                    <li> <a class="text-white" href="{{ route('insurance') }}"> Insurance</a> </li>
                </ul>
            </div>
            <div class="col mb-4 mb-lg-0">
                <h6 class="fs-30 pb-4 text-uppercase">subscribe to newsletter</h6>
                <form action="{{ route('lead.newsletter') }}" method="post" class="mb-3">
                    @csrf
                    <input type="email"
                        class="w-100 form-control bg-color-secondary border-0 fs-6 text-gray fw-bold px-2 p-lg-3 py-2 fst-italic"
                        placeholder="Enter your email address" value="" name="user" autocomplete="off" required>
                    <button class="btn btn-primary w-100 mt-2 text-uppercase fw-bold fs-30 button-2"> subscribe
                    </button>
                </form>
                <p class="text-center text-lg-start"> <a href="https://www.facebook.com/" target="_blank"
                        class="text-white pe-4"><i class="fa-brands fa-facebook-f"></i></a> <a
                        href="https://www.facebook.com/" target="_blank" class="text-white pe-4"><i
                            class="fa-brands fa-linkedin-in"></i></a> <a href="https://www.facebook.com/"
                        target="_blank" class="text-white pe-4"><i class="fa-brands fa-pinterest-p"></i></a> <a
                        href="https://www.facebook.com/" target="_blank" class="text-white pe-4"><i
                            class="fa-brands fa-twitter"></i></a> <a href="https://www.facebook.com/" target="_blank"
                        class="text-white"><i class="fa-brands fa-instagram"></i></a> </p>
            </div>
        </div>
    </div>
    <div class="border-top py-lg-4 py-3 border-top-color">
        <div class="container ">
            <div class="row row-cols-lg-2 row-cols-1 text-center">
                <div class="col">
                    <p class="fs-14 text-center text-lg-start pb-lg-0 pb-3">© 2022, All Rights Reserved</p>
                </div>
                <div class="col">
                    <p class="text-lg-end text-center"> <img src="{{ asset('/images/cards.png') }}" alt="payment-card"
                            class="img-fluid"> </p>
                </div>
            </div>
        </div>
    </div>
</footer>
