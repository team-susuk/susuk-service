<?php

if (!function_exists('guide')) {
    function guide() : mixed
    {
        return session(config('services.session-guide-prefix'));
    }
}

if (!function_exists('merchant')) {
    function merchant() : mixed
    {
        return session(config('services.session-merchant-prefix'));
    }
}