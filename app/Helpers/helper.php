<?php
// No namespace declaration here
use App\Models\PageSetting;

function globalData()
{
    // Get header settings
    $header_settings = PageSetting::where('parent_slug', 'header')->get(['key', 'value']);
    $home_page_data = [];
    
    // Add header settings
    foreach ($header_settings as $setting) {
        $home_page_data[$setting->key] = $setting->value;
    }
    
    // Get other global settings if needed
    $other_settings = PageSetting::whereNotIn('parent_slug', ['header'])->get(['parent_slug', 'key', 'value']);
    foreach ($other_settings as $setting) {
        // Prefix other settings with their parent_slug to avoid key collisions
        if (!isset($home_page_data[$setting->key])) {
            $home_page_data[$setting->key] = $setting->value;
        }
    }
    
    return $home_page_data;
}

/**
 * Get upgrade package settings (amount, employees, clients) from admin-configured PageSetting.
 *
 * @return array{amount: float, employees: int, clients: int, name: string}
 */
function getPackageSettings()
{
    $settings = \App\Models\PageSetting::where('parent_slug', 'package')->get()->keyBy('key');
    $get = function ($key, $default) use ($settings) {
        $row = $settings->get($key);
        return $row ? $row->value : $default;
    };
    return [
        'amount'    => (float) ($get('package_amount', 99)),
        'employees' => (int) ($get('package_employees', 20)),
        'clients'   => (int) ($get('package_clients', 10)),
        'name'      => (string) ($get('package_name', 'Resource Upgrade Package')),
    ];
}

if (!function_exists('_t')) {
    /**
     * Translate the given message dynamically.
     *
     * @param  string|null  $key
     * @param  array  $replace
     * @param  string|null  $locale
     * @return string|array
     */
    function _t($key = null, $replace = [], $locale = null)
    {
        return app('translator')->translateDynamic($key, $replace, $locale);
    }
}



