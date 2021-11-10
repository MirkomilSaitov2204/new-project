<?php

if (!function_exists('registerRoutes')) {
    function registerRoutes($directory, $is_directory = false): void
    {
        $directory = $is_directory ? $directory . '\..' : base_path($directory);

        collect(scandir($directory))->each(function ($domain) use ($directory) {
            if ($domain !== '.' && $domain !== '..') {
                $path = $directory . '/' . $domain;
                $file = $path . '/api_routes.php';
                if (is_dir($path) && file_exists($file)) {
                    require_once($file);
                }
            }
        });
    }
}

