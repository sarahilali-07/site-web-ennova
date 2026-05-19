<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::pluck('value', 'key')->toArray();

        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'whatsapp_number' => ['required', 'string', 'max:20', 'regex:/^[1-9][0-9]+$/'],
            'phone_number' => ['required', 'string', 'max:30'],
        ]);

        $whatsapp = preg_replace('/[^0-9]/', '', $request->whatsapp_number);

        Setting::updateOrCreate(
            ['key' => 'whatsapp_number'],
            ['value' => $whatsapp]
        );

        Setting::updateOrCreate(
            ['key' => 'phone_number'],
            ['value' => $request->phone_number]
        );

        return redirect()->route('admin.settings.index')
            ->with('success', 'Paramètres mis à jour avec succès.');
    }
}
