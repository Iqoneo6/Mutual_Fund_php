<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setting;

class SettingController extends Controller
{
    public function index()
    {
        $logo = Setting::where('key', 'site_logo')->first();
        $site_title = Setting::where('key', 'site_title')->first();

        return view('websetting.index', compact('logo', 'site_title'));
    }

    public function update(Request $request)
    {
        if ($request->hasFile('site_logo')) {
            $file = $request->file('site_logo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/logo'), $filename);

            Setting::updateOrCreate(
                ['key' => 'site_logo'],
                ['value' => 'uploads/logo/' . $filename]
            );
        }

        return redirect()->back()->with('success', 'Logo updated successfully.');
    }
}
