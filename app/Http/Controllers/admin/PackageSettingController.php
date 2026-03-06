<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\PageSetting;
use Illuminate\Http\Request;
use Session;

class PackageSettingController extends Controller
{
    /**
     * Show the form for editing the upgrade package settings (single package shown to company users).
     */
    public function index()
    {
        $settings = PageSetting::where('parent_slug', 'package')->get()->keyBy('key');
        $get = function ($key, $default) use ($settings) {
            $row = $settings->get($key);
            return $row ? $row->value : $default;
        };
        $package_amount = $get('package_amount', '99');
        $package_employees = $get('package_employees', '20');
        $package_clients = $get('package_clients', '10');
        $package_name = $get('package_name', 'Resource Upgrade Package');
        return view('admin.package_setting.index', compact('package_amount', 'package_employees', 'package_clients', 'package_name'));
    }

    /**
     * Update package settings.
     */
    public function update(Request $request)
    {
        $request->validate([
            'package_amount'    => 'required|numeric|min:0',
            'package_employees' => 'required|integer|min:1',
            'package_clients'   => 'required|integer|min:0',
            'package_name'      => 'nullable|string|max:255',
        ]);

        $keys = ['package_amount', 'package_employees', 'package_clients', 'package_name'];
        foreach ($keys as $key) {
            $value = $key === 'package_name' ? ($request->input($key) ?: 'Resource Upgrade Package') : $request->input($key);
            $row = PageSetting::where('parent_slug', 'package')->where('key', $key)->first();
            if ($row) {
                $row->value = (string) $value;
                $row->save();
            } else {
                PageSetting::create([
                    'parent_slug' => 'package',
                    'key'         => $key,
                    'value'       => (string) $value,
                ]);
            }
        }

        Session::flash('message', 'Package settings updated successfully.');
        return redirect()->route('admin.package_setting.index');
    }
}
