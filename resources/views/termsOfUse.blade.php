@extends('layouts.app')
<?php

$appMenuDetails = DB::table('global_settings')->where('id', 1)->select('global_app_name', 'logo')->first();

?>

<section class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="text-uppercase mb-4">Terms of use</h2>
                <ul class="breadcrumb mb-0 justify-content-center">
                    <li class="breadcrumb-item"><a href="/"> {{ $siteMenuDetails->home }}</a></li>
                    <li class="breadcrumb-item active">Terms of use</li>
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
            <span class="ql-editor">
                <?php echo $footerMenuDetails->description; ?>
            </span>
        </div>
    </div>
</section>
