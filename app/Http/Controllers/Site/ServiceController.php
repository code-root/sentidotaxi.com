<?php

namespace App\Http\Controllers\Site;
use App\Http\Controllers\Controller;

use App\Models\FormSubmission;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\App\DeviceUser;
use Browser;

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
        // التحقق من صحة البيانات
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'service_id' => 'required|integer|exists:services,id', // التحقق من وجود الخدمة
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

        // الحصول على بيانات الجهاز
        $deviceData = $this->getDeviceData($request);
        $deviceId = $this->getDeviceToken($deviceData);

        // إذا لم يكن الجهاز موجودًا، قم بإنشائه
        if (!$deviceId) {
            $device = DeviceUser::create($deviceData);
            $deviceId = $device->id;
        }

        // إنشاء رمز الجهاز
        $deviceToken = sha1(json_encode($deviceData));

        try {
            // إنشاء الطلب
            $order = FormSubmission::create($validatedData);

            // تحديث الجهاز برقم الطلب
            DeviceUser::where('id', $deviceId)->update(['order_id' => $order->id]);

            // إرجاع رسالة نجاح
            return response()->json(['message' => 'Subscription successful.']);
        } catch (\Exception $e) {
            // إرجاع رسالة خطأ في حالة فشل العملية
            return response()->json(['error' => 'Failed to process subscription.', 'details' => $e->getMessage()], 500);
        }
    }

    public static function getDeviceData($request)
    {
        return [
            'service_id' => $request->service_id,
            'subscription_duration' => $request->subscription_duration,
            'order_id' => 0,
            'device_type' => Browser::deviceType(),
            'device_name' => Browser::deviceModel(),
            'device_os' => Browser::platformName(),
            'device_version' => Browser::platformVersion(),
            'device_browser' => Browser::browserName(),
            'device_browser_version' => Browser::browserVersion(),
            'device_ip' => $request->ip(),
            'is_mobile' => Browser::isMobile(),
            'is_tablet' => Browser::isTablet(),
            'is_desktop' => Browser::isDesktop(),
            'is_bot' => Browser::isBot(),
        ];
    }


    public function storeToken(Request $request) {

        $deviceData = $this->getDeviceData($request);
        $deviceId = $this->getDeviceToken($deviceData);
        if (!$deviceId) {
            $device = DeviceUser::create($deviceData);

            $deviceId = $device->id;
        }
    }


    public function getDeviceToken(array $deviceData) {
        $deviceToken = sha1(json_encode($deviceData));
        $device = DeviceUser::where('device_token', $deviceToken)->first();
        if ($device) {
        return $device->id;
        }
        return null;
    }


}
