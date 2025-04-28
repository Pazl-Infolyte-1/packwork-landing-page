@extends('layouts.app')

<section class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="text-uppercase mb-4">{{ $siteMenuDetails->contact }}</h2>
                <ul class="breadcrumb mb-0 justify-content-center">
                    <li class="breadcrumb-item"><a href="/"> {{ $siteMenuDetails->home }}</a></li>
                    <li class="breadcrumb-item active">{{ $siteMenuDetails->contact }}</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- START Contact Section -->
<section class="contact-section bg-white sp-100-70">
    <div class="container">

        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="contact-info row">
                            <div class="mobile-device col-md-4 col-lg-6"><span
                                    class="fa fa-home fa-fw style"></span><span class="heading-info">Address</span>
                                <div class="address-content">{{ $socialLInksDetailsss->address }}</div>
                            </div>
                            <div class="mobile-device col-md-4 col-lg-3"><span
                                    class="fa fa-envelope fa-fw style"></span><span class="heading-info">Email</span>
                                <div class="address-content">{{ $socialLInksDetailsss->email }}</div>
                            </div>
                            <div class="mobile-device col-md-4 col-lg-3"><span
                                    class="fa fa-phone fa-fw style"></span><span class="heading-info">Phone</span>
                                <div class="address-content">{{ $socialLInksDetailsss->phone }}</div>
                            </div>
                        </div>

                    </div>
                </div>
                <form class="" method="POST" id="contactUs">
                    <input type="hidden" name="_token" value="Kpcnhr9QOwp8cZ24arxWPiFNajkmeTlAycrNGLyO"
                        autocomplete="off">
                    <div class="row mb-3">
                        <div id="alert" class="col-sm-12"></div>
                    </div>
                    <div class="row" id="contactUsBox">
                        <div class="form-group mb-4 col-lg-6 col-12">
                            <input type="text" name="name" class="form-control" placeholder="Your Name"
                                id="name">
                        </div>
                        <div class="form-group mb-4 col-lg-6 col-12">
                            <input type="email" class="form-control" placeholder="Your Email" name="email"
                                id="email">
                        </div>
                        <div class="form-group mb-4 col-12">
                            <textarea rows="6" name="message" class="form-control" placeholder="Message" id="message"></textarea>
                        </div>


                        <div class="col-12" style="margin-top: 12px;">
                            <button type="button" class="btn btn-lg btn-custom mt-1" id="contact-submit">
                                Submit Enquiry
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</section>
<!-- END Contact Section -->
