<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LocationController extends Controller
{

    // public function provinces(Request $request) {
    //     $province = DB::table('province')->get();
    //     return response()->json($province);
    // }

    public function districts(Request $request) {
        $district = DB::table('district')->where('_province_id', $request->id)->get();
        return response()->json($district);
    }

    public function wards(Request $request) {
        $ward = DB::table('ward')->where('_district_id', $request->id)->get();
        return response()->json($ward);
    }

    public function streets(Request $request) {
        $street = DB::table('street')->where('_ward_id', $request->id)->get();
        return response()->json($street);
    }
}
