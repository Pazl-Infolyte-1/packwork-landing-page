@extends('layouts.app')
<?php
function toCamelCase($string)
{
    return ucwords(str_replace('_', ' ', $string));
}

?>
<section class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="text-uppercase mb-4">{{ $siteMenuDetails->price }}</h2>
                <ul class="breadcrumb mb-0 justify-content-center">
                    <li class="breadcrumb-item"><a href="/"> {{ $siteMenuDetails->home }}</a></li>
                    <li class="breadcrumb-item active">{{ $siteMenuDetails->price }}</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- START Pricing Section -->
<section class="pricing-section bg-white sp-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="sec-title mb-5">
                    <h3>{{ $siteDetails->price_title }}</h3>
                    <p>{{ $siteDetails->price_description }}</p>
                </div>



            </div>

        </div>
        <div class="row mb-3">
            <div class="col-md-4 col-12"></div>
            <div class="col-md-4 col-12">
                <select class="custom-select custom-select-sm" id="currency">
                    <?php foreach ($globalCurrencyDetails as $globalCurrencyDetail) { ?>
                    <option value="{{ $globalCurrencyDetail->id }}">
                        <?php echo $globalCurrencyDetail->currency_name; ?>(<?php echo $globalCurrencyDetail->currency_symbol; ?>)
                    </option>
                    <?php } ?>

                </select>
            </div>
        </div>
        <div id="price-plan">
            <div class="text-center mb-5">
                <div class="nav price-tabs justify-content-center" role="tablist">
                    <a class="nav-link active" href="#monthly" role="tab" data-toggle="tab">Monthly</a>
                    <a class="nav-link annual_package " href="#yearly" role="tab" data-toggle="tab">Annually</a>
                </div>
            </div>
            <div class="tab-content wow fadeIn">
                <div role="tabpanel" class="tab-pane  active " id="monthly">
                    <div class="container">
                        <div class="price-wrap row no-gutters border-left">
                            <div class="diff-table col-6 col-md-3 border-top border-bottom">
                                <div class="price-top">
                                    <div class="price-top title">
                                        <h3>Pick <br> Your Plan</h3>
                                    </div>
                                    <div class="price-content">

                                        <ul>
                                            <li>
                                                Max Active Employees </li>
                                            <li>
                                                File Storage </li>
                                            <?php foreach($modules as $key=>$value)  { ?>
                                            <li>
                                                {{ toCamelCase(string: $value) }}
                                            </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="all-plans col-6 col-md-9">
                                <div class="row no-gutters flex-nowrap flex-wrap overflow-x-auto row-scroll">
                                    <?php foreach ($packages as $package) {?>
                                    <div class="col-md-3 package-column border-top border-bottom">
                                        <div class="pricing-table price- ">

                                            <div class="price-top">
                                                <div class="price-head text-center">
                                                    <h5 class="mb-0">{{ $package->name }}</h5>
                                                </div>
                                                <div class="rate">
                                                    <h2 class="mb-2">

                                                        <span
                                                            class="font-weight-bolder">{{ $package->currency_symbol }}{{ $package->monthly_price }}</span>

                                                    </h2>
                                                    <p class="mb-0">Billed Monthly</p>
                                                </div>
                                            </div>

                                            <div class="price-content">
                                                <ul>
                                                    <li>
                                                        {{ $package->max_employees }}
                                                    </li>

                                                    <li>
                                                        {{ $package->max_storage_size }}

                                                        MB </li>

                                                    <?php 
                                                    $module_in_package=json_decode($package->module_in_package,true);
                                                    foreach($modules as $key=>$value)  { 

                                                        if(in_array($value,$module_in_package)) { ?>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <?php } else { ?>
                                                    <li>
                                                        <i class="zmdi zmdi-close-circle"></i>
                                                        &nbsp;
                                                    </li>
                                                    <?php }  ?>



                                                    <?php  } ?>


                                                </ul>
                                            </div>



                                        </div>
                                    </div>
                                    <?php } ?>
                                    {{-- <div class="col-md-3 package-column border-top border-bottom">
                                        <div class="pricing-table price- ">
                                            <div class="price-top">
                                                <div class="price-head text-center">
                                                    <h5 class="mb-0">Medium</h5>
                                                </div>
                                                <div class="rate">
                                                    <h2 class="mb-2">

                                                        <span class="font-weight-bolder">$100.00</span>

                                                    </h2>
                                                    <p class="mb-0">Billed Monthly</p>
                                                </div>
                                            </div>
                                            <div class="price-content">
                                                <ul>
                                                    <li>
                                                        100
                                                    </li>

                                                    <li>
                                                        500

                                                        MB </li>

                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                </ul>
                                            </div>



                                        </div>
                                    </div>
                                    <div class="col-md-3 package-column border-top border-bottom">
                                        <div class="pricing-table price- ">
                                            <div class="price-top">
                                                <div class="price-head text-center">
                                                    <h5 class="mb-0">Larger</h5>
                                                </div>
                                                <div class="rate">
                                                    <h2 class="mb-2">

                                                        <span class="font-weight-bolder">$500.00</span>

                                                    </h2>
                                                    <p class="mb-0">Billed Monthly</p>
                                                </div>
                                            </div>
                                            <div class="price-content">
                                                <ul>
                                                    <li>
                                                        500
                                                    </li>

                                                    <li>
                                                        500

                                                        MB </li>

                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                </ul>
                                            </div>



                                        </div>
                                    </div> --}}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane " id="yearly">
                    <div class="container">
                        <div class="price-wrap border-left row no-gutters">
                            <div class="diff-table col-6 col-md-3 border-top border-bottom">
                                <div class="price-top">
                                    <div class="price-top title">
                                        <h3>Pick <br> Your Plan</h3>
                                    </div>
                                    <div class="price-content">

                                        <ul>
                                            <li>
                                                Max Active Employees </li>
                                            <li>
                                                File Storage </li>

                                            <?php foreach($modules as $key=>$value)  { ?>
                                            <li>
                                                {{ toCamelCase(string: $value) }}
                                            </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="all-plans col-6 col-md-9">
                                <div class="row no-gutters flex-nowrap flex-wrap overflow-x-auto row-scroll">
                                    <?php foreach ($packages as $package) {?>
                                    <div class="col-md-3 package-column border-top border-bottom">
                                        <div class="pricing-table price- ">

                                            <div class="price-top">
                                                <div class="price-head text-center">
                                                    <h5 class="mb-0">{{ $package->name }}</h5>
                                                </div>
                                                <div class="rate">
                                                    <h2 class="mb-2">

                                                        <span
                                                            class="font-weight-bolder">{{ $package->currency_symbol }}{{ $package->annual_price }}</span>

                                                    </h2>
                                                    <p class="mb-0">Billed Annually</p>
                                                </div>
                                            </div>

                                            <div class="price-content">
                                                <ul>
                                                    <li>
                                                        {{ $package->max_employees }}
                                                    </li>

                                                    <li>
                                                        {{ $package->max_storage_size }}

                                                        MB </li>

                                                    <?php 
                                                    $module_in_package=json_decode($package->module_in_package,true);
                                                    foreach($modules as $key=>$value)  { 

                                                        if(in_array($value,$module_in_package)) { ?>
                                                    <li>
                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                        &nbsp;
                                                    </li>
                                                    <?php } else { ?>
                                                    <li>
                                                        <i class="zmdi zmdi-close-circle"></i>
                                                        &nbsp;
                                                    </li>
                                                    <?php }  ?>



                                                    <?php  } ?>


                                                </ul>
                                            </div>



                                        </div>
                                    </div>
                                    <?php } ?>
                                    
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END Pricing Section -->

<!-- START Section FAQ -->
<section class="bg-white sp-100-70 pt-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="sec-title mb-60">
                    <h3>{{ $siteDetails->faq_title }}</h3>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div id="accordion" class="theme-accordion">
                    <?php foreach ($faqs as $faq) { ?>
                    <div class="card border-0 mb-30">
                        <div class="card-header border-bottom-0 p-0" id="acc{{$faq->id}}">
                            <h5 class="mb-0">
                                <button class="position-relative text-decoration-none w-100 text-left collapsed"
                                    data-toggle="collapse" data-target="#collapse{{$faq->id}}" aria-controls="collapse{{$faq->id}}">
                                    {{$faq->question}}
                                </button>
                            </h5>
                        </div>

                        <div id="collapse{{$faq->id}}" class="collapse" aria-labelledby="acc{{$faq->id}}" data-parent="#accordion">
                            <div class="card-body ql-editor">
                                <p><span
                                        style="color: rgb(68, 68, 68); font-family: Lato, sans-serif; font-size: 16px;"><?php echo $faq->answer; ?></span></p>
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                    
                    
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END Section FAQ -->
