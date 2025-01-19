<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\site\Page;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Language;
use App\Models\site\Contact;
use App\Models\site\Slider;
use App\Models\Testimonial;
use App\Models\Translation;
use Illuminate\Http\Request;

class APIController extends Controller
{

    public function home(Request $request) {
        
        $languageCode = $request->header('Accept-Language', 'ar'); // Default to Arabic if not specified
        $settings = Setting::where('type', $languageCode)->pluck('value', 'slug')->toArray();
        $basicFields = Setting::where('type', 'basic')->pluck('value', 'slug')->toArray();
        $languages = Language::get();

        return response()->json([
            'settings' => $settings,
            'basicFields' => $basicFields,
            'languages' => $languages,
            'web_logo' => Setting::getLogoSettings(),
        ]);
    }

        // Fetch a specific blog by ID with translations
    public function getBlogId(Request $request)
    {
        $blog = Blog::where('id', $request->blog_id)->first();

        if ($blog) {
            $blog->lang = $this->getTranslations($request, $blog->token); // Add translations to the blog
        }

        return ['blog' => $blog ?? 'Blog not found'];
    }

    // Fetch all sliders with translations
    public function getSliders(Request $request)
    {
        $sliders = Slider::all();

        foreach ($sliders as $slider) {
            $slider->lang = $this->getTranslations($request, $slider->token); // Add translations to each slider
        }

        return ['sliders' => $sliders];
    }

    // Fetch all testimonials with translations
    public function getTestimonials(Request $request)
    {
        $testimonials = Testimonial::all();

        foreach ($testimonials as $testimonial) {
            $testimonial->lang = $this->getTranslations($request, $testimonial->token); // Add translations to each testimonial
        }

        return ['testimonials' => $testimonials];
    }

    // Fetch all blogs with translations
    public function getBlogs(Request $request)
    {
        $blogs = Blog::all();

        foreach ($blogs as $blog) {
            $blog->lang = $this->getTranslations($request, $blog->token); // Add translations to each blog
        }

        return ['blogs' => $blogs];
    }

    // Fetch all services with translations
    public function getServices(Request $request)
    {
        $services = Service::all();

        foreach ($services as $service) {
            $service->lang = $this->getTranslations($request, $service->token); // Add translations to each service
        }

        return ['services' => $services];
    }

    // Fetch all pages with translations
    public function getPages(Request $request)
    {
        $pages = Page::all();

        foreach ($pages as $page) {
            $page->lang = $this->getTranslations($request, $page->token); // Add translations to each page
        }

        return ['pages' => $pages];
    }


       // Fetch all pages with translations
       public function getPageId(Request $request)
       {
           $pages = Page::where('id', $request->page_id)->get();

           foreach ($pages as $page) {
               $page->lang = $this->getTranslations($request, $page->token); // Add translations to each page
           }

           return ['pages' => $pages];
       }


       private function getTranslations(Request $request, $token)
    {
        $languageCode = $request->header('Accept-Language', 'ar'); // Default to Arabic if not specified
        $languageId = Language::where('code', $languageCode)->first()->id ?? 2; // Default to ID 2 if not found

        return Translation::select('value')
            ->where('token', $token)
            ->where('language_id', $languageId)
            ->pluck('value')
            ->first() ?? 'Translation not found';
    }


    public function ContactStore(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'contact-name' => 'required|string|max:255',
                'contact-email' => 'required|email|max:255',
                'contact-phone' => 'nullable|string|max:20',
                'contact-message' => 'required|string',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        }

        Contact::create([
            'name' => $validatedData['contact-name'],
            'email' => $validatedData['contact-email'],
            'phone' => $validatedData['contact-phone'],
            'message' => $validatedData['contact-message'],
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Your message has been sent successfully.'
        ]);
    }
}
