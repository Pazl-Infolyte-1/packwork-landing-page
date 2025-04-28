@extends('layouts.app')
<?php
$firstThree = $feature1->slice(0, 3);
$lastThree = $feature1->slice(-3);

?>
<section class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="text-uppercase mb-4">{{ $siteMenuDetails->feature }}</h2>
                <ul class="breadcrumb mb-0 justify-content-center">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"> {{ $siteMenuDetails->home }}</a></li>
                    <li class="breadcrumb-item active">{{ $siteMenuDetails->feature }}</li>
                </ul>
            </div>
        </div>
    </div>
</section>


<!-- START Saas Features -->
<section class="border-bottom bg-white sp-100 pb-3 overflow-hidden">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="sec-title mb-60">
                    <h3>{{$siteDetails->task_management_title}}</h3>
                    <p>{{$siteDetails->task_management_detail}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php if(count($feature) > 1) { ?>
                <?php foreach ($feature as $featur) {?>
            <div class="col-md-4 col-sm-6 col-12 mb-60">
                <div class="saas-f-box">
                    <div class="align-items-center icon justify-content-center">
                        <i class="{{$featur->icon}}"></i>
                    </div>
                    <h5>{{$featur->title}}</h5>
                    <p class="mb-0"><?php echo $featur->description; ?> </p>
                </div>

            </div>
            <?php } } ?>
            
        </div>
    </div>
</section>
<!-- START Saas Features -->
<section class="border-bottom bg-white sp-100 pb-3 overflow-hidden">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="sec-title mb-60">
                    <h3>{{$siteDetails->manage_bills_title}}</h3>
                    <p>{{$siteDetails->manage_bills_detail}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php if (count($firstThree) > 1) {?>
                <?php foreach ($firstThree as $firstThre) { ?>
            <div class="col-md-4 col-sm-6 col-12 mb-60">
                <div class="saas-f-box">
                    <div class="align-items-center icon justify-content-center">
                        <i class="{{$firstThre->icon}}"></i>
                    </div>
                    <h5>{{$firstThre->title}}</h5>
                    <p class="mb-0">{{$firstThre->description}} </p>
                </div>

            </div>
            <?php } } ?>
            
        </div>
    </div>
</section>
<!-- START Saas Features -->
<section class="border-bottom bg-white sp-100 pb-3 overflow-hidden">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="sec-title mb-60">
                    <h3></h3>
                    <p></p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php if (count($lastThree) > 1) {?>
                <?php foreach ($lastThree as $lastThre) { ?>
            <div class="col-md-4 col-sm-6 col-12 mb-60">
                <div class="saas-f-box">
                    <div class="align-items-center icon justify-content-center">
                        <i class="{{$lastThre->icon}}"></i>
                    </div>
                    <h5>{{$lastThre->title}}</h5>
                    <p class="mb-0">{{$lastThre->description}}</p>
                </div>

            </div>
            <?php } } ?>
            
        </div>
    </div>
</section>


<!-- START Clients Section -->
<div class="clients bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 mb-30 text-center">
                <p class="c-blue mb-2">{{$siteDetails->client_title}}</p>
                <h4>{{$siteDetails->client_detail}}</h4>

            </div>
            <div class="col-12">
                <div class="client-slider" id="client-slider">
                    <?php if (count($clientDetails) > 1 ) {?>
                        <?php foreach ($clientDetails as $clientDetail) { ?>
                    <div class="client-img">
                        <div class="img-holder">
                            <img src="{{$clientDetail->image}}" alt="partner">
                        </div>
                    </div>
                    <?php } } ?>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<!-- END Clients Section -->

<!-- START Integration Section -->
<section class="sp-100-70 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="sec-title mb-60">
                    <h3>{{$siteDetails->favourite_apps_title}}</h3>
                    <p>{{$siteDetails->favourite_apps_detail}}</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <?php if(count($feature3) > 1) { ?>
                <?php foreach ($feature3 as $feature3s) {?>
            <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-30 wow fadeIn" data-wow-delay="0.4s">
                <div class="integrate-box shadow">
                    <img style="height: 55px" src="{{$feature3s->image}}"
                        alt="{{$feature3s->title}}">
                    <h5 class="mb-0">{{$feature3s->title}} </h5>
                   
                </div>
            </div>
            <?php }} ?>
            
        </div>
    </div>
</section>
<!-- END Integration Section -->
