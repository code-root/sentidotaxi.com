<?php

namespace App\Providers;

use App\Models\site\Page;
use App\Models\site\Slider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Setting;
use App\Models\Language;
use App\Models\Section;
use App\Models\Service;
use App\Models\Blog;
use App\Models\site\Category;
use App\Models\Testimonial;
use Illuminate\Support\Facades\App;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */



    public function boot(): void
    {
        $locale = session('locale', config('app.locale'));
        App::setLocale($locale);
        Schema::defaultStringLength(191);

        // توفير اللغة في جميع الصفحات
        view()->composer('*', function ($view) {
            $locale = session('locale', 'en');
            $settings = Setting::where('type', $locale)->pluck('value', 'slug')->toArray();
            $basicFields = Setting::where('type', 'basic')->pluck('value', 'slug')->toArray();
            $languages = Language::get();
            $pages = Page::get();
            $sections = Section::get();

            $categories = Category::with('services')->get();
            $view->with('categories', $categories);
            $view->with('web_logo', Setting::getLogoSettings());
            $view->with('basicFields', $basicFields);
            $view->with('settings', $settings);
            $view->with('languages', $languages);
            $view->with('locale', $locale);
            $view->with('sections', $sections);
            $view->with('pages', $pages);
        });

        view()->composer('dashboard.layouts.navbar', function ($view) {
            $view->with('loginUser', Auth::user());
        });

        view()->composer('site.components.sliders', function ($view) {
            $view->with('testimonials', Slider::all());
        });

        view()->composer('site.components.testimonials', function ($view) {
            $view->with('testimonials', Testimonial::all());
        });

        view()->composer('site.pages.testimonial-all', function ($view) {
            $view->with('testimonials', Testimonial::all());
        });

        view()->composer('site.components.blog', function ($view) {
            $blogs = Blog::latest()->take(10)->get();
            $view->with('blogs', $blogs);
        });

        view()->composer('site.components.service', function ($view) {
            $services = Service::with('orders', 'views')->get();
            $view->with('services', $services);
        });

        $this->shareSettingsAndBasicFields('dashboard.layouts.navbar');
    }

    private function shareSettingsAndBasicFields(string $viewName)
    {
        view()->composer($viewName, function ($view) {
            $locale = session('locale', 'ar');
            $settings = Setting::where('type', $locale)->pluck('value', 'slug')->toArray();
            $basicFields = Setting::where('type', null)->pluck('value', 'slug')->toArray();
            $languages = Language::all();
            $sections = Section::get();
            $category = Category::get();
            $view->with('basicFields', $basicFields);
            $view->with('settings', $settings);
            $view->with('languages', $languages);
            $view->with('locale', $locale);
            $view->with('sections', $sections);
            $view->with('category', $category);
        });
    }
}
