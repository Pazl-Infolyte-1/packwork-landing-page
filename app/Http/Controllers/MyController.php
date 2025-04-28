<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

class MyController extends Controller
{
    public function showHome()
    {

        // $seoDetails = DB::table('front_menu_buttons')->where('id', 1)->first();
        $siteMenuDetails = DB::table('front_menu_buttons')->where('id', 1)->first();
        $siteDetails = DB::table('tr_front_details')->where('id', 1)->first();
        $clientDetails = DB::table('front_clients')->get();
        $feature1 = DB::table('features')->where('type', 'image')->get();
        $feature2 = DB::table('features')->where('type', 'icon')->get();
        $testimonials = DB::table('testimonials')->get();

        // echo"<pre>";print_R( $clientDetails);exit;
        return view('home', ['siteDetails' => $siteDetails, 'siteMenuDetails' => $siteMenuDetails, 'clientDetails' => $clientDetails, 'feature1' => $feature1, 'feature2' => $feature2, 'testimonials' => $testimonials]);
    }

    public function showFeature()
    {
        $siteMenuDetails = DB::table('front_menu_buttons')->where('id', 1)->first();
        $siteDetails = DB::table('tr_front_details')->where('id', 1)->first();
        $feature = DB::table('features')->where('type', 'task')->select('title', 'description', 'icon')->get();
        $feature1 = DB::table('features')->where('type', 'bills')->select('title', 'description', 'icon')->get();
        $feature3 = DB::table('features')->where('type', 'apps')->select('title', 'description', 'image')->get();
        $clientDetails = DB::table('front_clients')->get();
        return view('feature', ['siteMenuDetails' => $siteMenuDetails, 'siteDetails' => $siteDetails, 'feature' => $feature, 'feature1' => $feature1, 'clientDetails' => $clientDetails, 'feature3' => $feature3]);
    }

    public function showPricing()
    {
        $siteMenuDetails = DB::table('front_menu_buttons')->where('id', 1)->first();
        $siteDetails = DB::table('tr_front_details')->where('id', 1)->first();
        $faqs = DB::table('front_faqs')->get();

        $packageCurrencyIds = DB::table('packages')
            ->select('currency_id')
            ->distinct()
            ->pluck('currency_id');

        $globalCurrencyDetails = DB::table('global_currencies')
            ->where('status', 'enable')
            ->whereIn('id', $packageCurrencyIds)
            ->select('id', 'currency_name', 'currency_symbol')
            ->get();

        $modules = DB::table('modules')
            ->where('status', 'active')
            ->where('is_superadmin', '0')
            ->orderBy('order_by', 'asc')
            ->pluck('module_name');

        $packages = DB::table('packages')
            ->join('global_currencies', 'packages.currency_id', '=', 'global_currencies.id')
            ->where('packages.status', 'active')
            ->where('packages.default', 'no')
            ->where('global_currencies.status', 'enable')
            ->orderBy('packages.sort', 'asc')
            ->select(
                'packages.module_in_package',
                'packages.name',
                'packages.max_storage_size',
                'packages.max_file_size',
                'packages.max_employees',
                'packages.annual_price',
                'packages.monthly_price',
                'packages.currency_id',
                'packages.id',
                'packages.is_recommended',
                'global_currencies.currency_name',
                'global_currencies.currency_symbol'
            )
            ->get();
        // echo "<pre>";
        // print_r($packages);
        // exit;

        return view('pricing', ['siteMenuDetails' => $siteMenuDetails, 'siteDetails' => $siteDetails, 'globalCurrencyDetails' => $globalCurrencyDetails, 'modules' => $modules, 'packages' => $packages, 'faqs' => $faqs]);
    }

    public function showContact()
    {
        $siteMenuDetails = DB::table('front_menu_buttons')->where('id', 1)->first();
        $socialLInksDetailsss = DB::table('front_details')->where('id', 1)->select('social_links', 'address', 'phone', 'email')->first();
        return view('contact', ['siteMenuDetails' => $siteMenuDetails, 'socialLInksDetailsss' => $socialLInksDetailsss]);
    }

    public function termsOfUse()
    {
        $siteMenuDetails = DB::table('front_menu_buttons')->where('id', 1)->first();
        $footerMenuDetails = DB::table('footer_menu')->where('slug', 'terms-of-use')->first();
        return view('termsOfUse', ['siteMenuDetails' => $siteMenuDetails, 'footerMenuDetails' => $footerMenuDetails]);
    }

    public function privacyPolicy()
    {
        $siteMenuDetails = DB::table('front_menu_buttons')->where('id', 1)->first();
        $footerMenuDetails = DB::table('footer_menu')->where('slug', 'privacy-policy')->first();
        return view('privacyPolicy', ['siteMenuDetails' => $siteMenuDetails, 'footerMenuDetails' => $footerMenuDetails]);
    }

    public function signup()
    {
        $siteMenuDetails = DB::table('front_menu_buttons')->where('id', 1)->first();
        return view('signup', ['siteMenuDetails' => $siteMenuDetails]);
    }
}
