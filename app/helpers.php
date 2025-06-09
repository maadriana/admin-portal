<?php

use App\Models\Content;

if (!function_exists('getContent')) {
    function getContent($key, $default = '')
    {
        return Content::where('key', $key)->value('value') ?? $default;
    }
}
