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

/**
 * Get individual (Friends/Family) upgrade package settings. Limit after upgrade = 10 (5 + 5 more).
 *
 * @return array{amount: float, name: string, friends_family: int}
 */
function getIndividualPackageSettings()
{
    return [
        'amount' => (float) config('individual.package.amount', 50),
        'name' => (string) config('individual.package.name', 'Friends/Family Upgrade Package'),
        'friends_family' => (int) config('individual.package.friends_family', 10),
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

function getDestinationName($code)
{
    return [
        "r14" => "Alaska",
        "r8" => "Asia",
        "r2" => "Atlantic Seaboard",
        "r15" => "Australia/New Zealand",
        "r16" => "Bermuda",
        "r1" => "Caribbean",
        "r6" => "Europe",
        "r17" => "Hawaii and South Pacific",
        "r7" => "Mediterranean",
        "r12" => "Mexico",
        "r19" => "North American Waterways",
        "r3" => "Pacific Seaboard",
        "r4" => "Panama Canal",
        "r18" => "Polar Regions",
        "r13" => "Repositioning",
        "r10" => "River Cruises",
        "r5" => "South America",
        "r9" => "Trans-Ocean",
        "s33" => "Africa - Middle East - India",
        "s8" => "Alaska",
        "s44" => "Alaska - Inside Passage",
        "s43" => "Alaska - Northbound",
        "s45" => "Alaska - Southbound",
        "s16" => "Amazon River",
        "s17" => "Antarctica",
        "s66" => "Arctic",
        "s31" => "Australia",
        "s1" => "Bahamas",
        "s21" => "Baltic Sea",
        "s6" => "Bermuda",
        "s26" => "Black Sea",
        "s20" => "British Isles",
        "s46" => "Canada - New England",
        "s59" => "Canary Islands",
        "s47" => "Caribbean",
        "s2" => "Caribbean - Eastern",
        "s50" => "Caribbean - Extended",
        "s4" => "Caribbean - Southern",
        "s3" => "Caribbean - Western",
        "s19" => "Central America",
        "s29" => "China - Japan - Korea",
        "s38" => "Chinese Rivers",
        "s5" => "Eastern Canada",
        "s23" => "European Coast",
        "s37" => "European Rivers",
        "s18" => "Galapagos Islands",
        "s9" => "Hawaiian Islands",
        "s27" => "Holy Lands",
        "s51" => "Mediterranean",
        "s25" => "Mediterranean - Eastern",
        "s24" => "Mediterranean - Western",
        "s54" => "Mexico",
        "s55" => "Mexico - Baja",
        "s56" => "Mexico - Round Trip",
        "s61" => "New Zealand",
        "s53" => "North Europe",
        "s22" => "Norwegian Fjords",
        "s52" => "Panama Canal",
        "s60" => "Russian Coast",
        "s40" => "Russian Rivers",
        "s15" => "South American Coast",
        "s32" => "South Pacific",
        "s30" => "Southeast Asia",
        "s28" => "Suez Canal",
        "s63" => "Tahiti",
        "s49" => "Trans-Atlantic",
        "s36" => "Trans-Pacific",
        "s7" => "U.S. East Coast",
        "s39" => "U.S. Rivers",
        "s10" => "U.S. West Coast",
        "s41" => "World Cruise (Exotic)",
    ][$code] ?? '-';
}


function getDurationName($code)
{
    return [
        "1_2" => "1-2 Nights",
        "3_5" => "3-5 Nights",
        "6_9" => "6-9 Nights",
        "10_14" => "10-14 Nights",
        "15" => "15+ Nights",
        "cruise" => "Cruise",
    ][$code] ?? '-';
}

function getCountryName($code)
{
    return [
        "" => "Select a country",
        "276" => "Antigua and Barbuda",
        "257" => "Aruba",
        "12" => "Bahamas, The",
        "15" => "Barbados",
        "18" => "Belize",
        "24" => "Brazil",
        "225" => "British Virgin Islands",
        "26" => "Bulgaria",
        "31" => "Canada",
        "37" => "Colombia",
        "41" => "Costa Rica",
        "281" => "Curacao",
        "50" => "Dominican Republic",
        "60" => "France",
        "66" => "Greece",
        "67" => "Grenada",
        "253" => "Guadeloupe",
        "82" => "Italy",
        "83" => "Jamaica",
        "106" => "Maldives",
        "254" => "Martinique",
        "112" => "Mexico",
        "280" => "Montenegro",
        "132" => "Panama",
        "138" => "Portugal",
        "235" => "Puerto Rico",
        "144" => "Saint Lucia",
        "145" => "Saint Vincent and the Grenadines",
        "160" => "Spain",
        "275" => "St. Martin",
        "166" => "Switzerland",
        "233" => "Turks and Caicos Islands",
        "246" => "U.S. Virgin Islands",
        "183" => "United States",
    ][$code] ?? '-';
}
function getAmenityName($code)
{
    return [
        "adults_only" => "Adults Only",
        "beach_access" => "Beach Access",
        "casino" => "Casino",
        "child_facilities" => "Family Friendly",
        "couples_only" => "Couples Only",
        "fitness_center" => "Fitness Center",
        "golf" => "Golf",
        "gratuities_included" => "Gratuities Included",
        "handicap_accessible" => "Accessible",
        "parking_included" => "Parking Included",
        "pets" => "Pets Allowed",
        "pickleball" => "Pickleball",
        "scuba" => "Scuba Available",
        "skiing" => "Ski",
        "spa" => "Spa Available",
        "tennis" => "Tennis",
        "waterpark" => "Water Park",
        "wifi" => "Wifi Included",
    ][$code] ?? '-';
}

function getBudgetName($code)
{
    return [
        "contemporary" => "Contemporary ($)",
        "premium" => "Premium ($$)",
        "luxury" => "Luxury ($$$)",
        "ultra_luxury" => "Ultra Luxury ($$$$)",
    ][$code] ?? '-';
}
