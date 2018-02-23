<?php

namespace App\Http\Controllers;

use App\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SettingsController extends Controller
{
    public function index()
    {
        return view('admin.settings.settings')->with('settings', Settings::first());
    }
    public function update()
    {
        $this->validate(request(),[
            'site_name'=>'required',
            'contact_number'=>'required',
            'contact_email'=>'required',
            'address'=>'required',
        ]);
        $settings=Settings::first();

        $settings->site_name=request()->site_name;
        $settings->contact_number=request()->contact_number;
        $settings->contact_email=request()->contact_email;
        $settings->address=request()->address;

        $settings->save();

        Session::flash('success',"Settings Updated");

        return redirect()->back();

    }
}
