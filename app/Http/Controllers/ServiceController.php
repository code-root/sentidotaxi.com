<?php

namespace App\Http\Controllers;

use App\Models\FormSubmission;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('site.pages.service-all', compact('services'));
    }



    public function showServiceDetails($id) {
        $service = Service::with('orders', 'views')->findOrFail($id);
        // تسجيل المشاهدة
        $ipAddress = request()->ip();
        $service->views()->create(['ip_address' => $ipAddress]);
        return view('site.pages.service-details', compact('service'));
    }

        public function orderPage($id)
    {
        $service = Service::findOrFail($id);
        return view('site.pages.orders', compact('service'));
    }

    public function subscribe(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'anreise_datum' => 'required|date',
            'landezeit' => 'required|date_format:H:i',
            'flugnr' => 'required|string|max:255',
            'anzahl_personen' => 'required|integer',
            'fahrzeug' => 'required|string|max:255',
            'zielort_hotel' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mobil_nr' => 'required|string|max:255',
            'rucktransfer' => 'required|string|max:255',
            'sim_karte' => 'required|string|max:255',
            'sim_karte_option' => 'required|string|max:255',
            'sim_karte_g' => 'required|string|max:255',
            'message' => 'nullable|string',
        ]);

        FormSubmission::create($validatedData);

        return response()->json(['message' => 'Form submitted successfully!']);
    }

}
