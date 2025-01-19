<?php

namespace App\Http\Controllers\Site;
use App\Http\Controllers\Controller;

use App\Models\site\Page;
use App\Models\Language;
use App\Models\Setting;
use App\Models\site\Faq;
use App\Models\site\Slider;
use App\Models\site\SuccessPartner;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{

    public function setLocale($locale)
    {
        $availableLocales = Language::where('is_active', 1)->pluck('code')->toArray();
        if (in_array($locale, $availableLocales)) {
            session(['locale' => $locale]);
            App::setLocale($locale);
        }

        return redirect()->back();
    }
    public function home()
    {
        $locale = session('locale', 'ar');
        $settings = Setting::where('type', $locale)->pluck('value', 'slug')->toArray();
        $sliders = Slider::where('status', 1)->get();

        $faqs = Faq::all();
        $partners = SuccessPartner::get();
        $pages = Page::where('status', 'site')->get();
        return view('site.home', compact('settings', 'sliders', 'faqs', 'partners', 'pages'));
    }


    public function showPage($id)
    {
        $page = Page::where('id', $id)->first();
        if (!$page) {
            return abort(404, 'Page not found');
        }
        return view('site.pages.index', compact('page'));
    }


}
