<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanySettingsController extends Controller
{
    public function getSettings()
    {
        $settings = DB::table('company_settings')->first();
        if (!$settings) {
            return response()->json([], 200);
        }
        return response()->json($settings);
    }

    public function updateSettings(Request $request)
    {
        $data = $request->validate([
            'official_email' => 'nullable|email',
            'phone' => 'nullable|string',
            'alt_phone' => 'nullable|string',
            'address_street' => 'nullable|string',
            'address_city' => 'nullable|string',
            'address_state' => 'nullable|string',
            'address_country' => 'nullable|string',
            'address_zip' => 'nullable|string',
        ]);

        $settings = DB::table('company_settings')->first();

        if ($settings) {
            DB::table('company_settings')->where('id', $settings->id)->update(array_merge($data, ['updated_at' => now()]));
        } else {
            DB::table('company_settings')->insert(array_merge($data, ['created_at' => now(), 'updated_at' => now()]));
        }

        return response()->json(['message' => 'Company settings updated successfully']);
    }
}
