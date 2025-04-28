@extends('layouts.app')

<section class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="text-uppercase mb-4">Privacy Policy</h2>
                <ul class="breadcrumb mb-0 justify-content-center">
                    <li class="breadcrumb-item"><a href="/"> {{ $siteMenuDetails->home }}</a></li>
                    <li class="breadcrumb-item active">Privacy Policy</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<style>
    .video-box {
        width: 75%;
        height: 400px;
    }
</style>

<!-- START Pricing Section -->
<section class="pricing-section bg-white sp-100-40">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p>
                </p>
            </div>
            <div class="container">
                <div class="login-box mt-5 shadow bg-white form-section ">
                    <h4 class="mb-0 text-uppercase">
                        Sign up </h4>
                    <form method="POST" id="register" autocomplete="off">
                        <input type="search" class="autocomplete-password" style="opacity: 0;position: absolute;">
                        <input type="password" class="autocomplete-password" style="opacity: 0;position: absolute;">
                        <input type="email" name="f_email" class="autocomplete-password" readonly=""
                            style="opacity: 0;position: absolute;">
                        <input type="text" name="f_slack_username" class="autocomplete-password" readonly=""
                            style="opacity: 0;position: absolute;">



                        <input type="hidden" id="redirect_url" name="redirect_url" value="">

                        <input type="hidden" name="_token" value="riMVNDmqDiU3NICyUZOI1Gxr0jOFrvnysDnAU8Bi"
                            autocomplete="off">

                        <div class="row">
                            <div class="col-12">
                                <div id="alert"></div>
                            </div>
                        </div>
                        <div id="form-box">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group mb-4">
                                        <label for="company_name">Company Name <sup class="f-14 mr-1">*</sup></label>
                                        <input type="text" name="company_name" id="company_name"
                                            placeholder="Company Name" class="form-control">
                                    </div>
                                </div>

                                <div class=" col-sm-12">
                                    <div class="form-group mb-4">
                                        <label for="email">Your Name <sup class="f-14 mr-1">*</sup></label>
                                        <input type="text" name="name" id="name" placeholder="e.g. John Doe"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group mb-4">
                                        <label for="email">Your Email <sup class="f-14 mr-1">*</sup></label>
                                        <input type="email" name="email" id="email"
                                            placeholder="e.g. johndoe@example.com" class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mb-4">
                                        <label for="password">Password <sup class="f-14 mr-1">*</sup></label>
                                        <input type="password" class="form-control " id="password" name="password"
                                            placeholder="Password">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mb-4">
                                        <label for="password_confirmation">Confirm Password <sup
                                                class="f-14 mr-1">*</sup></label>
                                        <input type="password" class="form-control" id="password_confirmation"
                                            name="password_confirmation" placeholder="Confirm Password">
                                    </div>
                                </div>

                                <div class="col-12">
                                </div>


                                <div class="col-12 mb-5">
                                    <button type="button"
                                        class="btn btn-custom btn-rounded text-uppercase waves-effect waves-light"
                                        id="submit-form">
                                        Sign up </button>
                                </div>
                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
