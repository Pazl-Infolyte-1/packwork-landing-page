@extends('layouts.app')

<?php

// echo '<pre>';
// print_R($clientDetails);
// exit();
?>


<section class="section-hero">
    <div class="banner position-relative">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-12 text-lg-left text-center">
                    <div class="banner-text mr-0 mr-lg-5 mb-2">
                        <h3 class="mb-3 mb-md-4 font-weight-bold"> {{ $siteDetails->header_title }}</h3>
                        <div class="ql-editor">{{ $siteDetails->header_description }}</div>
                        <?php if(isset($siteMenuDetails->get_start) && !empty($siteMenuDetails->get_start)){ ?>
                        <a href="{{ route('signup') }}" style="margin-bottom: 46px;"
                            class="btn btn-lg btn-custom mt-4 btn-outline">{{ $siteMenuDetails->get_start }}</a>
                        <?php } ?>

                    </div>
                </div>
                <div class="col-lg-6 col-12 d-lg-block wow zoomIn" data-wow-delay="0.2s">
                    <?php if(isset($siteDetails->image) && !empty($siteDetails->image)){ ?>
                    <div class="banner-img shadow1">
                        <img src="{{ $siteDetails->image }}" alt="business" class="shadow1">
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="clients bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 mb-30 text-center">
                <p class="c-blue mb-2">{{ $siteDetails->client_title }}</p>
                <h4>{{ $siteDetails->client_detail }}</h4>

            </div>
            <div class="col-12">
                <div class="client-slider" id="client-slider">
                    <?php if(count($clientDetails) > 0) { ?>
                    <?php foreach ($clientDetails as $clientDetail) { ?>
                    <div class="client-img">
                        <div class="img-holder">
                            <img src="{{ $clientDetail->image ?? 'https://demo-saas.worksuite.biz/saas/img/home/client-1.png' }}"
                                alt="{{ $clientDetail->title }}">
                        </div>
                    </div>
                    <?php } ?>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</div>


<!-- START Saas Features -->
<?php if(count($feature1) > 0) {?>
<?php foreach($feature1 as $feature) {?>
<section class="saas-features overflow-hidden">
    <div class="container">
        <div class="sp-100">
            <div class="row align-items-center">
                <div class="col-lg-6 pr-lg-5">
                    <h3>{{ $feature->title }}</h3>
                    <p><?php echo $feature->description; ?></p>
                </div>
                <?php if(isset($feature->image) && !empty($feature->image)) { ?>
                <div class="col-lg-6 wow fadeIn  d-lg-block" data-wow-delay="0.2s">
                    <div class="mock-img">
                        <img src="{{ $feature->image }}" alt="mockup">
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<?php } } ?>


<!-- END Saas Features -->
<!-- START Features -->
<section class="features bg-light sp-100-70">
    <div class="container">

        <div class="row">
            <div class="col-12">
                <div class="sec-title mb-60">
                    <h3>{{ $siteDetails->feature_title }}</h3>
                    <p>{{ $siteDetails->feature_description }}</p>
                </div>
            </div>
        </div>

        <div class="row">
            <?php if(count($feature2) > 0 ) {?>
            <?php foreach($feature2 AS $feature2s) {?>

            <div class="col-lg-4 col-md-6 col-12 mb-30 wow fadeIn" data-wow-delay="0.2s">
                <div class="feature-box bg-white br-5 text-center">
                    <span class="align-items-center d-inline-flex icon justify-content-center mx-auto">
                        <i class="<?php echo $feature2s->icon; ?>"></i>
                    </span>
                    <h5>{{ $feature2s->title }}</h5>
                    <p><?php echo $feature2s->description; ?></p>
                </div>
            </div>

            <?php } } ?>

        </div>
    </div>
</section>
<!-- END Features -->


<section class="section-testimonial bg-white sp-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="sec-title mb-5">
                    <h3>{{ $siteDetails->testimonial_title }}</h3>
                    <p>{{ $siteDetails->testimonial_detail }}</p>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div id="testimonial-slider" class="testimonial-slider mb-0 text-center">

                    <?php if(count($testimonials) > 0 ) { ?>
                    <?php foreach ($testimonials as $testimonial) { ?>
                    <div class="testimonial-item">
                        <div class="client-info">
                            <p class="mb-4">{{ $testimonial->comment }}</p>
                            <h5 class="mb-1">{{ $testimonial->name }}</h5>
                        </div>
                        <div class="rating text-warning">
                            <?php if(round($testimonial->rating) > 0) { ?>
                                <?php for($i = 1; $i <= round($testimonial->rating); $i++) { ?>
                                    <i class="zmdi zmdi-star"></i>
                                <?php } ?>
                            <?php } ?>
                        </div>
                        
                    </div>
                    <?php } } ?>

                </div>
            </div>
        </div>
    </div>
</section>
