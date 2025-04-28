<?php
use Illuminate\Support\Facades\DB;
$siteMenuDetails = DB::table('front_menu_buttons')->where('id', 1)->first();

$appMenuDetails = DB::table('global_settings')->where('id', 1)->select('global_app_name', 'logo')->first();

$seoButtonDetails = DB::table('seo_details')->get();
// echo "<pe>";print_R($seoButtonDetails);exit;
$siteDetails = DB::table('tr_front_details')->where('id', 1)->first();
$socialLInksDetailsss = DB::table('front_details')->where('id', 1)->select('social_links', 'address', 'phone', 'email')->first();
$socialLInksDetail = [];
if (isset($socialLInksDetailsss->social_links) && !empty($socialLInksDetailsss->social_links)) {
    $socialLInksDetails = json_decode($socialLInksDetailsss->social_links, true);
    $socialLInksDetail = (array) $socialLInksDetails;
}
// echo '<pre>';
// print_R($seoButtonDetails);
// exit();
function getIndexSeoDetails($array, $articleIdToFind)
{
    $array = json_decode(json_encode($array), true); // Convert stdClass to array
    $filtered = array_values(
        array_filter($array, function ($item) use ($articleIdToFind) {
            return $item['page_name'] == $articleIdToFind;
        }),
    );

    if (!empty($filtered)) {
        $filtered = json_decode(json_encode($filtered)); // Convert stdClass to array
        return $filtered[0]; // return the value directly
    }

    return null; // if not found
}

$seoDetails = getIndexSeoDetails($seoButtonDetails, Route::currentRouteName());

$termsseoDetails = getIndexSeoDetails($seoButtonDetails, 'terms-of-use');
$privyPolcyseoDetails = getIndexSeoDetails($seoButtonDetails, 'privacy-policy');
$contacseoDetails = getIndexSeoDetails($seoButtonDetails, 'contact');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <title> {{ $seoDetails->seo_title ?? 'Home' }}
        | {{ $appMenuDetails->name ?? 'Packworkz' }}</title>

    <meta name="description" content="{{ $seoDetails->seo_description || 'Packworkz' }}">
    <meta name="author" content="{{ $seoDetails->seo_author || 'Packworkz' }}">
    <meta name="keywords" content="{{ $seoDetails->seo_keywords || 'Packworkz' }}">

    <meta property="og:title" content="{{ $seoDetails->seo_title ?? 'Home' }}">
    <meta property="og:type" content="website" />
    <!-- <meta property="og:url" content="https://demo-saas.worksuite.biz"> -->
    <meta property="og:site_name" content="{{ $appMenuDetails->name ?? 'Packworkz' }}" />
    <meta property="og:description" content="{{ $seoDetails->seo_keywords || 'Packworkz' }}" />
    <meta property="og:image" content="{{ $seoDetails->og_image || 'https://demo-saas.worksuite.biz/favicon.png' }}" />

    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ $seoDetails->og_image || 'https://demo-saas.worksuite.biz/favicon.png' }}">
    <meta name="msapplication-TileImage"
        content="{{ $seoDetails->og_image || 'https://demo-saas.worksuite.biz/favicon.png' }}">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/material-design-iconic-font@2.2.0/dist/css/material-design-iconic-font.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link type="text/css" rel="stylesheet" media="all" href="{{ asset('css/bootstrap.min.css') }}">
    <link type="text/css" rel="stylesheet" media="all" href="{{ asset('css/animate.min.css') }}">
    <link type="text/css" rel="stylesheet" media="all" href="{{ asset('css/slick.css') }}">
    <link type="text/css" rel="stylesheet" media="all" href="{{ asset('css/slick-theme.css') }}">
    <link type="text/css" rel="stylesheet" media="all" href="{{ asset('css/flaticon.css') }}">
    <link href="css/all.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.css') }}">
    <!-- Template CSS -->
    <link type="text/css" rel="stylesheet" media="all" href="{{ asset('css/main.css') }}">
    <!-- Template Font Family  -->

    <link type="text/css" rel="stylesheet" media="all"
        href="{{ asset('css/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cookieconsent.css') }}" media="print" onload="this.media='all'">
    <link type="text/css" rel="stylesheet" media="all" href="{{ asset('css/quill.snow.css') }}">
    <link type="text/css" rel="stylesheet" media="all" href="{{ asset('css/saas-rtl.css') }}">
    <script src="{{ asset('js/api.js') }}"></script>
    <style>
        :root {
            --main-color: #453130;
            --main-home-background: #CDDCDC;
        }

        /*To be removed to next 3.6.8 update. Added so as cached main.css to show background image on load*/
        .section-hero .banner::after {
            position: absolute;
            content: '';
            left: 0;
            top: 0;
            z-index: -1;
            width: 100%;
            height: 100%;
            background-color: #CDDCDC;
            background-image: radial-gradient(at 50% 100%, rgba(255, 255, 255, 0.50) 0%, rgba(0, 0, 0, 0.50) 100%), linear-gradient(to bottom, rgba(255, 255, 255, 0.25) 0%, rgba(0, 0, 0, 0.25) 100%);
            background-blend-mode: screen, overlay;
            opacity: 0.95;
            padding-bottom: 400px;
        }

        .help-block {
            color: #8a1f11 !important;
        }

        .login-box h5 {
            padding: 35px 40px 15px;
            font-size: 21px;
            text-align: center;
            font-weight: 600;
        }

        @media (max-width: 767px) {
            .login-box form {
                padding: 10px;
            }

            .input-group-text {
                font-size: 13px;
            }

            .login-box h5 {
                padding: 35px 15px 15px;
                font-size: 21px;
                text-align: center;
                font-weight: 600;
            }
        }

        .form-group label sup {
            color: #fd0202;
            top: 0px;
        }

        .f-14 {
            font-size: 14px !important;
        }
    </style>




</head>

<body id="home" class="">

    <!-- START Header -->
    <header class="header position-relative">
        <!-- START Navigation -->
        <div class="navigation-bar" id="affix">
            <div class="container">
                <nav class="navbar navbar-expand-lg p-0">
                    <?php  if(isset($appMenuDetails->logo) && !empty($appMenuDetails->logo)) {?>
                    <a class="logo" href="{{ url()->current() }}">
                        <div class="d-flex align-items-center">
                            <img class="mr-2 rounded logo-default" style="max-height: 32px;"
                                src="{{ $appMenuDetails->logo }}" alt="Logo" />
                        </div>
                    </a>
                    <?php } ?>
                    <button class="navbar-toggler border-0 p-0" type="button" data-toggle="collapse"
                        data-target="#theme-navbar" aria-controls="theme-navbar" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-lines"></span>
                    </button>

                    <div class="collapse navbar-collapse gap-3" id="theme-navbar">
                        <ul class="navbar-nav ml-auto">
                            <?php if(isset($siteMenuDetails->home) && !empty($siteMenuDetails->home)){ ?>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}">{{ $siteMenuDetails->home }}</a>
                            </li>
                            <?php } ?>
                            <?php if(isset($siteMenuDetails->feature) && !empty($siteMenuDetails->feature)){ ?>

                            <li class="nav-item">
                                <a class="nav-link"
                                    href="{{ route('feature') }}">{{ $siteMenuDetails->feature }}</a>
                            </li>
                            <?php } ?>
                            <?php if(isset($siteMenuDetails->price) && !empty($siteMenuDetails->price)){ ?>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('pricing') }}">{{ $siteMenuDetails->price }}</a>
                            </li>
                            <?php } ?>
                            <?php if(isset($siteMenuDetails->contact) && !empty($siteMenuDetails->contact)){ ?>
                            <li class="nav-item">
                                <a class="nav-link"
                                    href="{{ route('contact') }}">{{ $siteMenuDetails->contact }}</a>
                            </li>
                            <?php } ?>


                        </ul>
                        <div class="my-3 my-lg-0">
                            <?php if(isset($siteMenuDetails->login) && !empty($siteMenuDetails->login)){ ?>

                            <a href="{{ env('FRONT_END_LOGIN_URL', 'DefaultApp') }}"
                                class="btn btn-border shadow-none">{{ $siteMenuDetails->login }}</a>
                            <?php } ?>
                            <?php if(isset($siteMenuDetails->get_start) && !empty($siteMenuDetails->get_start)){ ?>

                            <a href="{{ route('signup') }}"
                                class="btn btn-menu-signup shadow-none ml-2">{{ $siteMenuDetails->get_start }}</a>
                            <?php } ?>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- END Navigation -->
    </header>
    <!-- END Header -->
    <main style="padding: 20px;">
        @yield('content')
    </main>



    <section class="cta-section position-relative">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 col-12 mb-30">
                    <h3 class="mb-4">{{ $siteDetails->cta_title }}</h3>
                    <p class="mr-lg-5 pr-lg-5 mb-0">{{ $siteDetails->cta_detail }}</p>
                </div>
                <div class="col-lg-3 offset-lg-1 text-lg-right col-12 mb-30">
                    <a href="{{ route('signup') }}" class="btn btn-custom btn-lg wow pulse" data-wow-delay="0.4s">
                        {{ $siteMenuDetails->get_start }}</a>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-white footer">
        <div class="container border-bottom">
            <div class="footer__widgets">
                <div class="row">

                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="widget footer__about-us">
                            <?php  if(isset($appMenuDetails->logo) && !empty($appMenuDetails->logo)) {?>
                            <a href="./" class="hover-logo d-inline-block">
                                <img src="{{ $appMenuDetails->logo }}" class="logo" style="max-height:35px">

                            </a>
                            <?php } ?>

                            <div class="socials mt-4">
                                <?php if(count($socialLInksDetail) > 0 ) {?>
                                <?php foreach ($socialLInksDetail as $socialLInksDeta) { 
                                        $link=$socialLInksDeta['link'];
                                        $name=$socialLInksDeta['name'];
                                        ?>
                                <a href="{{ $link }}" class="zmdi zmdi-{{ $name }}"
                                    target="_blank">
                                </a>

                                <?php } } ?>

                            </div>

                        </div>
                    </div> <!-- end about us -->

                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="widget widget-links">
                            <h5 class="widget-title">Main</h5>
                            <ul class="list-no-dividers">
                                <ul class="navbar-nav">
                                    <?php if(isset($siteMenuDetails->get_start) && !empty($siteMenuDetails->get_start)){ ?>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href="{{ route('signup') }}">{{ $siteMenuDetails->get_start }}</a>
                                    </li>
                                    <?php } ?>

                                    <?php if(isset($siteMenuDetails->feature) && !empty($siteMenuDetails->feature)){ ?>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href="{{ route('feature') }}">{{ $siteMenuDetails->feature }}</a>
                                    </li>
                                    <?php } ?>

                                    <?php if(isset($siteMenuDetails->price) && !empty($siteMenuDetails->price)){ ?>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href="{{ route('pricing') }}">{{ $siteMenuDetails->price }}</a>
                                    </li>
                                    <?php } ?>

                                    <?php if(isset($siteMenuDetails->login) && !empty($siteMenuDetails->login)){ ?>
                                    <li class="nav-item">
                                        <a href="{{ env('FRONT_END_LOGIN_URL', 'https://packworkx.pazl.info/login') }}"
                                            class="nav-link">{{ $siteMenuDetails->login }}</a>
                                    </li>
                                    <?php } ?>


                                </ul>

                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="widget widget-links">
                            <h5 class="widget-title">Others</h5>
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item active"><a class="nav-link"
                                        href="{{ route('terms-of-use') }}">{{ $termsseoDetails->seo_title }}</a>
                                </li>
                                <li class="nav-item active"><a class="nav-link"
                                        href="{{ route('privacy-policy') }} ">{{ $privyPolcyseoDetails->seo_title }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link"
                                        href="{{ route('contact') }}">{{ $contacseoDetails->seo_title }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="widget widget-links">
                            <h5 class="widget-title">{{ $contacseoDetails->seo_title }}</h5>

                            <div class="socials mt-40">

                                <div class="f-contact-detail mt-20">
                                    <i class="flaticon-email"></i>
                                    <p class="mb-0">{{ $socialLInksDetailsss->email }}</p>
                                </div>
                                <div class="f-contact-detail mt-20">
                                    <i class="flaticon-call"></i>
                                    <p class="mb-0">{{ $socialLInksDetailsss->phone }}</p>
                                </div>

                                <div class="f-contact-detail mt-20">
                                    <i class="flaticon-placeholder"></i>
                                    <p class="mb-0">{{ $socialLInksDetailsss->address }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div> <!-- end container -->

        <div class="footer__bottom top-divider">
            <div class="container text-center ">
                <span class="copyright mr-3">
                    {{ $siteDetails->footer_copyright_text }}
                </span>
            </div>
        </div> <!-- end footer bottom -->

    </footer>

    <!-- Scripts -->
    <script src="https://demo-saas.worksuite.biz/saas/vendor/jquery/jquery.min.js"></script>
    <script src="https://demo-saas.worksuite.biz/saas/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://demo-saas.worksuite.biz/saas/vendor/slick/slick.min.js"></script>
    <script src="https://demo-saas.worksuite.biz/saas/vendor/wowjs/wow.min.js"></script>
    <script src="https://demo-saas.worksuite.biz/saas/js/main.js"></script>
    <script src="https://demo-saas.worksuite.biz/front/plugin/froiden-helper/helper.js"></script>

    <!-- Global Required JS -->

    <script>
        $(document).ready(function() {
            const maxHeight = Math.max(...$('.planNameHead').map(function() {
                return $(this).height();
            }));

            $('.planNameHead').height(Math.round(maxHeight)).next('.planNameTitle').height(Math.round(maxHeight -
                28));
        });

        function planShow(type) {
            $('#monthlyPlan').toggle(type === 'monthly');
            $('#annualPlan').toggle(type !== 'monthly');
        }
    </script>


    <script defer src="https://demo-saas.worksuite.biz/saas/js/cookieconsent.js"></script>
    <script>
        window.addEventListener('load', function() {

            // obtain plugin
            var cc = initCookieConsent();

            // run plugin with your configuration
            cc.run({
                current_lang: 'en',
                autoclear_cookies: true,

                // mode: 'opt-in'                          // default: 'opt-in'; value: 'opt-in' or 'opt-out'
                // delay: 0,                               // default: 0
                // auto_language: '',                      // default: null; could also be 'browser' or 'document'
                // autorun: true,                          // default: true
                // force_consent: false,                   // default: false
                // hide_from_bots: true,                   // default: true
                remove_cookie_tables: true, // default: false
                cookie_name: "worksuite_cc_cookie", // default: 'cc_cookie'
                // cookie_expiration: 182,                 // default: 182 (days)
                // cookie_necessary_only_expiration: 182   // default: disabled
                // cookie_domain: location.hostname,       // default: current domain
                // cookie_path: '/',                       // default: root
                // cookie_same_site: 'Lax',                // default: 'Lax'
                // use_rfc_cookie: false,                  // default: false
                // revision: 0,                            // default: 0// default: false
                page_scripts: true, // default: false
                gui_options: {
                    consent_modal: {
                        layout: 'box', // box/cloud/bar
                        position: 'bottom right', // bottom/middle/top + left/right/center
                        transition: 'slide', // zoom/slide
                        swap_buttons: true // enable to invert buttons
                    },
                    settings_modal: {
                        layout: 'box', // box/bar
                        position: 'right', // left/right
                        transition: 'zoom' // zoom/slide
                    }
                },
                languages: {
                    'en': {
                        consent_modal: {
                            title: "We use cookies!",
                            description: 'Hi, this website uses essential cookies to ensure its proper operation and tracking cookies to understand how you interact with it. The latter will be set only after consent. <button type="button" data-cc="c-settings" class="cc-link">Let me choose</button>',
                            primary_btn: {
                                text: "Accept all",
                                role: 'accept_all' // 'accept_selected' or 'accept_all'
                            },
                            secondary_btn: {
                                text: "Accept Necessary",
                                role: 'accept_necessary' // 'settings' or 'accept_necessary'
                            }
                        },
                        settings_modal: {
                            title: "Cookie preferences",
                            save_settings_btn: "Save settings",
                            accept_all_btn: "Accept all",
                            reject_all_btn: "Accept Necessary",
                            close_btn_label: "Close",
                            cookie_table_headers: [{
                                    col1: 'Name'
                                },
                                {
                                    col2: 'Domain'
                                },
                                {
                                    col3: 'Expiration'
                                },
                                {
                                    col4: 'Description'
                                }
                            ],
                            blocks: [{
                                title: 'Cookie usage 📢',
                                description: 'I use cookies to ensure the basic functionalities of the website and to enhance your online experience. You can choose for each category to opt-in/out whenever you want. For more details relative to cookies and other sensitive data.'
                            }, {
                                title: 'Strictly necessary cookies',
                                description: 'These cookies are essential for the proper functioning of my website. Without these cookies, the website would not work properly',
                                toggle: {
                                    value: 'necessary',
                                    enabled: true,
                                    readonly: true // cookie categories with readonly=true are all treated as "necessary cookies"
                                }
                            }, {
                                title: 'Performance and Analytics cookies',
                                description: 'These cookies allow the website to remember the choices you have made in the past',
                                toggle: {
                                    value: 'analytics', // your cookie category
                                    enabled: false,
                                    readonly: false
                                },
                                cookie_table: [ // list of all expected cookies
                                    {
                                        col1: '^_ga', // match all cookies starting with "_ga"
                                        col2: 'google.com',
                                        col3: '2 years',
                                        col4: 'description ...',
                                        is_regex: true
                                    },
                                    {
                                        col1: '_gid',
                                        col2: 'google.com',
                                        col3: '1 day',
                                        col4: 'description ...',
                                    }
                                ]
                            }, {
                                title: 'Advertisement and Targeting cookies',
                                description: 'These cookies collect information about how you use the website, which pages you visited and which links you clicked on. All of the data is anonymized and cannot be used to identify you',
                                toggle: {
                                    value: 'targeting',
                                    enabled: false,
                                    readonly: false
                                }
                            }, {
                                title: 'More information',
                                description: 'For any queries in relation to our policy on cookies and your choices, please <a class="cc-link" href="https://demo-saas.worksuite.biz/contact">Contact</a>.',
                            }]
                        }
                    }
                }
            });
        });
    </script>
</body>

</html>
