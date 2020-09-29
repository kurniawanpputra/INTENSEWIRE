<?php

namespace App\Http\Controllers;

use Session;
use App\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function __construct() {
        $this->middleware('admin');
    }

    public function edit() {
        $setting = Setting::first();

        return view('admin.settings.setting', compact('setting'));
    }

    public function update() {
        $setting = Setting::first();

        $this->validate(request(), [
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required|email'
        ]);

        $setting->site_name = request()->name;
        $setting->address = request()->address;
        $setting->contact_number = request()->phone;
        $setting->contact_email = request()->email;

        $setting->save();

        Session::flash('success', 'Settings saved successfully');

        return redirect()->back();
    }
}
