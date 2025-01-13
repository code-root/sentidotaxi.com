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
            'service_id' => 'required|date_format:H:i',
            'arrival_date' => 'required|date',
            'landing_time' => 'required|date_format:H:i',
            'flight_number' => 'required|string|max:255',
            'number_of_people' => 'required|integer',
            'vehicle' => 'required|string|max:255',
            'destination_hotel' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mobile_number' => 'required|string|max:255',
            'return_transfer' => 'required|string|max:255',
            'sim_card' => 'required|string|max:255',
            'sim_card_option' => 'required|string|max:255',
            'sim_card_g' => 'required|string|max:255',
            'message' => 'nullable|string',
        ]);

        FormSubmission::create($validatedData);

        return response()->json(['message' => 'Form submitted successfully!']);
    }


}
