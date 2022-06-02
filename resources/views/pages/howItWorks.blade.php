@extends('layouts.app')

@section('content')
    <main class="faq">
        <section class="inner-banner text-center text-uppercase ">
            <div class="container">
                <div class="row pt-12 pt-sm-12 align-items-center justify-content-center">
                    <div class="col">
                        <h1 class="fs-1 fw-bold">how it works</h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="pt-10 pb-5">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-12 text-center pb-lg-5 pb-3">
                        <h2 class="fs-48">
                            How It Works
                        </h2>
                        <p>
                            Explore the world's largest car sharing marketplace
                        </p>
                    </div>
                    <div class="col-lg-8">
                        <div class="accordion accordion-flush" id="faq">
                            @foreach($how as $row)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseOne{{ $row->id }}" aria-expanded="false"
                                        aria-controls="flush-collapseOne{{ $row->id }}">
                                        <i class="fa-solid fa-circle-question"></i> <span class="ps-2">{{ $row->question }}</span>
                                    </button>
                                </h2>
                                <div id="flush-collapseOne{{ $row->id }}" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingOne" data-bs-parent="#faq">
                                    <div class="accordion-body">
                                        <p>{{ $row->answer }}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            {{-- <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                        aria-controls="flush-collapseTwo">
                                        <i class="fa-solid fa-circle-question"></i> <span class="ps-2"> Lorem
                                            Ipsum is simply dummy text of the printing and typesettin</span>
                                    </button>
                                </h2>
                                <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingTwo" data-bs-parent="#faq">
                                    <div class="accordion-body">
                                        <p>
                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                            Ipsum has been the industry's standard dummy text ever since the 1500s, Lorem
                                            Ipsum is simply dummy
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseThree" aria-expanded="false"
                                        aria-controls="flush-collapseThree">
                                        <i class="fa-solid fa-circle-question"></i> <span class="ps-2"> Lorem
                                            Ipsum is simply dummy text of the printing and typesettin</span>
                                    </button>
                                </h2>
                                <div id="flush-collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingThree" data-bs-parent="#faq">
                                    <div class="accordion-body">
                                        <p>
                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                            Ipsum has been the industry's standard dummy text ever since the 1500s, Lorem
                                            Ipsum is simply dummy
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseFour" aria-expanded="false"
                                        aria-controls="flush-collapseFour">
                                        <i class="fa-solid fa-circle-question"></i> <span class="ps-2"> Lorem
                                            Ipsum is simply dummy text of the printing and typesettin</span>
                                    </button>
                                </h2>
                                <div id="flush-collapseFour" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingFour" data-bs-parent="#faq">
                                    <div class="accordion-body">
                                        <p>
                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                            Ipsum has been the industry's standard dummy text ever since the 1500s, Lorem
                                            Ipsum is simply dummy
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingFive">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseFive" aria-expanded="false"
                                        aria-controls="flush-collapseFive">
                                        <i class="fa-solid fa-circle-question"></i> <span class="ps-2"> Lorem
                                            Ipsum is simply dummy text of the printing and typesettin</span>
                                    </button>
                                </h2>
                                <div id="flush-collapseFive" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingFive" data-bs-parent="#faq">
                                    <div class="accordion-body">
                                        <p>
                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                            Ipsum has been the industry's standard dummy text ever since the 1500s, Lorem
                                            Ipsum is simply dummy
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingSix">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseSix" aria-expanded="false"
                                        aria-controls="flush-collapseSix">
                                        <i class="fa-solid fa-circle-question"></i> <span class="ps-2"> Lorem
                                            Ipsum is simply dummy text of the printing and typesettin</span>
                                    </button>
                                </h2>
                                <div id="flush-collapseSix" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingSix" data-bs-parent="#faq">
                                    <div class="accordion-body">
                                        <p>
                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                            Ipsum has been the industry's standard dummy text ever since the 1500s, Lorem
                                            Ipsum is simply dummy
                                        </p>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
