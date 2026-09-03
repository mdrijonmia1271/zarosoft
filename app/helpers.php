<?php

use App\Models\Setting;

if (!function_exists('setting')) {
    /**
     * Read a site setting managed from Admin -> Settings.
     * Values are cached forever and busted on save, so this is cheap to call
     * from layouts that render on every request.
     */
    function setting(string $key, $default = null)
    {
        try {
            $value = Setting::get($key, $default);
        } catch (\Throwable $e) {
            // Settings table missing (fresh install, migrations not run yet).
            return $default;
        }

        return ($value === null || $value === '') ? $default : $value;
    }
}
