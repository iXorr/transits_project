<?php

namespace App\Http\Controllers;

use Exception;

use App\Models\Shipping;
use App\Models\ReceiptStatus;
use App\Models\DeliveryStatus;
use App\Models\Vehicle;
use App\Models\VehicleType;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Address;

class DashboardController extends Controller
{
    public function index() {
        $user = Auth::user();

        return view('dashboard', [
            "user" => $user,
            "page" => "default"
        ]);
    }

    public function getUserShippings() {
        $user = Auth::user();

        return view('dashboard', [
            "user" => $user,
            "page" => "my-shippings"
        ]);
    }

    public function getActiveShippings() {
        $user = Auth::user();
        $waiting_delivery_status_id = DeliveryStatus::where("title", "waiting")->first()->id;
        $active_shippings = Shipping::where("delivery_status_id", $waiting_delivery_status_id)->get();

        return view('dashboard', [
            "user" => $user,
            "active_shippings" => $active_shippings,
            "page" => "check-shippings"
        ]);
    }

    public function getFormCreateShipping() {
        $user = Auth::user();

        return view('dashboard', [
            "user" => $user,
            "page" => "create-shipping"
        ]);
    }

    public function createShipping(Request $request) {
        try {
            $from_address = Address::create([
                "city" => $request->from_city,
                "street" => $request->from_street,
                "building" => $request->from_building,
                "apartment" => $request->from_apartment
            ]);

            $to_address = Address::create([
                "city" => $request->to_city,
                "street" => $request->to_street,
                "building" => $request->to_building,
                "apartment" => $request->to_apartment
            ]);

            $shipping = Shipping::create([
                "user_id" => Auth::user()->id,
                "sender_address_id" => $from_address->id,
                "delivery_address_id" => $to_address->id,
                "receipt_status_id" => ReceiptStatus::where("title", "not_received")->first()->id,
                "delivery_status_id" => DeliveryStatus::where("title", "waiting")->first()->id
            ]);

            
            return redirect()->back()->with("msg", "Заявка создана");
        }
        
        catch (Exception $e) {
            return redirect()->back()->withErrors([
                "error_db" => "Произошла ошибка при записи в БД"
            ]);
        }
    }

    public function getFormEditShipping(Request $request, $shipping_id) {
        $user = Auth::user();

        return view('dashboard', [
            "user" => $user,
            "shipping" => Shipping::find($shipping_id),
            "receipt_statuses" => ReceiptStatus::all(),
            "delivery_statuses" => DeliveryStatus::all(),
            "page" => "edit-shipping"
        ]);
    }

    public function editShipping(Request $request, $shipping_id) {
        try {
            $shipping = null;

            if (isset($request->updated_receipt_status)) {
                $shipping = Shipping::find($shipping_id);
                $shipping->receipt_status_id = ReceiptStatus::where("title", $request->updated_receipt_status)->first()->id;
            }
            
            if (isset($request->updated_delivery_status)) {
                $shipping = Shipping::find($shipping_id);
                $shipping->delivery_status_id = DeliveryStatus::where("title", $request->updated_delivery_status)->first()->id;
            }
            
            $shipping->save();
            return redirect()->back()->with("msg", "Статус изменён");            
        } catch (Exception $e) {
            return redirect()->back()->withErrors([
                "error_db" => "Произошла ошибка при изменении записи в БД"
            ]);
        }
    }

    public function deleteShipping(Request $request, $shipping_id) {
        try {
            Shipping::find($shipping_id)->delete();

            return redirect()->back()->with("msg", "Поставка удалена");
        } catch (Exception $e) {
            return redirect()->back()->withErrors([
                "error_db" => "Произошла ошибка при удалении из БД"
            ]);
        }
    }

    public function getFormCreateVehicle(Request $request) {
        $user = Auth::user();
        $vehicle_types = VehicleType::all();

        return view('dashboard', [
            "user" => $user,
            "vehicle_types" => $vehicle_types,
            "page" => "create-vehicle",
        ]);
    }

    public function createVehicle(Request $request) {
        $user = Auth::user();

        try {
            $vehicle = Vehicle::create([            
                "vehicle_type_id" => $request->vehicle_type_id,
                "driver_id" => $user->id,
                "capacity" => $request->capacity,
                "brand" => $request->brand,
                "model" => $request->model,
                "factory_number" => $request->factory_number
            ]);

            return redirect()->back()->with("msg", "Транспорт добавлен");
        }
        
        catch (Exception $e) {
            return redirect()->back()->withErrors([
                "error_db" => "Произошла ошибка при записи в БД"
            ]);
        }   
    }

    public function getUserVehicles(Request $request) {
        $user = Auth::user();
        $vehicles = Vehicle::where("driver_id", $user->id)->get();

        return view('dashboard', [
            "user" => $user,
            "vehicles" => $vehicles,
            "page" => "my-vehicles",
        ]);
    }

    public function deleteVehicle(Request $request, $vehicle_id) {
        try {
            Vehicle::find($vehicle_id)->delete();
            return redirect()->back()->with("msg", "Транспорт удалён");
        } catch (Exception $e) {
            return redirect()->back()->withErrors([
                "error_db" => "Произошла ошибка при удалении из БД"
            ]);
        }
    }

    public function getFormRegShipping(Request $request, $shipping_id) {
        $user = Auth::user();
        $vehicles = Vehicle::where("driver_id", $user->id)->get();
        $shipping = Shipping::find($shipping_id);

        return view('dashboard', [
            "user" => $user,
            "shipping" => $shipping,
            "vehicles" => $vehicles,
            "page" => "reg-shipping",
        ]);
    }

    public function regShipping(Request $request, $shipping_id) {
        try {
            $transit_delivery_status_id = DeliveryStatus::where("title", "transit")->first()->id;

            $shipping = Shipping::find($shipping_id);
            $shipping->vehicle_id = $request->vehicle_id;
            $shipping->delivery_status_id = $transit_delivery_status_id;
            $shipping->save();

            return redirect()->back()->with("msg", "Поставка взята");
        } catch (Exception $e) {
            return redirect()->back()->withErrors([
                "error_db" => "Произошла ошибка при изменении записи из БД"
            ]);
        }
    }
}
