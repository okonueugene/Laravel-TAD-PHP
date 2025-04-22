@extends('layout.admin.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> </span>{{ $title }}</h4>
        <div class="row">
            <!-- User Profile card -->
            <div class="mb-4 col-lg-5 col-12">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-7">
                            <div class="card-body text-nowrap">
                                <h5 class="card-title mb-0">Welcome User 🎉</h5>
                                <br>
                                <p id="date-time"></p>
                                <a href="javascript:;" class="btn btn-primary">View Profile</a>
                            </div>
                        </div>
                        <div class="col-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img src="{{ asset('assets/img/illustrations/card-advance-sale.png') }}" height="205"
                                    alt="view sales">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- User Profile card -->

            <!-- Site Analytics -->
            <div class="col-lg-7 mb-4">
                <div class="swiper-container swiper-container-horizontal swiper swiper-card-advance-bg"
                    id="swiper-with-pagination-cards">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="text-white mb-0 mt-2">Employee  Analytics</h5>
                                    <small>Total number personel in site</small>
                                </div>
                                <div class="row">
                                    <div class="col-lg-7 col-md-9 col-12 order-2 order-md-1">
                                        <h6 class="text-white mt-0 mt-md-3 mb-3">Summary</h6>
                                        <div class="row">
                                            <div class="col-6">
                                                <ul class="list-unstyled mb-0">
                                                    <li class="d-flex mb-4 align-items-center">
                                                        <p class="mb-0 me-2">People </p>
                                                        <p class="mb-0 fw-semibold  website-analytics-text-bg">
                                                        </p>

                                                    </li>
                                                    <li class="d-flex align-items-center mb-2">
                                                        <p class="mb-0 me-2">First Aiders</p>
                                                        <p class="mb-0 fw-semibold website-analytics-text-bg">
                                                        </p>

                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-6">
                                                <ul class="list-unstyled mb-0">
                                                    <li class="d-flex mb-4 align-items-center">
                                                        <p class="mb-0 me-2">Fire Marshalls</p>
                                                        <p class="mb-0 fw-semibold website-analytics-text-bg">

                                                    </li>
                                                    <li class="d-flex align-items-center mb-2">
                                                        <p class="mb-0 me-2">Safety Executives</p>
                                                        <p class="mb-0 fw-semibold website-analytics-text-bg">
                                                        </p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-3 col-12 order-1 order-md-2 my-4 my-md-0 text-center">
                                        <img src="{{ asset('assets/img/illustrations/card-website-analytics-1.png') }}"
                                            alt="Website Analytics" width="170" class="card-website-analytics-img">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
        <!--/ Content -->
    @endsection
    <script>
        window.addEventListener("load", () => {
            console.log("loaded");
            clock();

            function clock() {
                let value = new Date();
                let date = value.toLocaleString("en-us", {
                    weekday: "short",
                    month: "short",
                    day: "2-digit",
                });

                let time = value.toLocaleString("en-US", {
                    hour: "numeric",
                    minute: "numeric",
                    second: "numeric",
                    hour12: true,

                });

                document.getElementById("date-time").innerHTML = `Time: ${time}`;

                setTimeout(clock, 1000);

            }

        });
    </script>


