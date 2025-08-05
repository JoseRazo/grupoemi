<?php

if (!function_exists('format_phone')) {
    function format_phone($number)
    {
        $digits = preg_replace('/\D+/', '', $number);
        return preg_replace('/(\d{3})(\d{3})(\d{4})/', '$1 $2 $3', $digits);
    }
}

if (!function_exists('whatsapp_href')) {
    function whatsapp_href($number)
    {
        $digits = preg_replace('/\D+/', '', $number);

        // Asegurar que tenga 10 dígitos antes de anteponer 52
        if (strlen($digits) === 10) {
            return 'https://wa.me/52' . $digits;
        }

        return 'https://wa.me/' . $digits;
    }

}

if (!function_exists('phone_href')) {
    function phone_href($number)
    {
        $digits = preg_replace('/\D+/', '', $number);

        // Asegurar que tenga 10 dígitos antes de anteponer 52
        if (strlen($digits) === 10) {
            return 'tel:' . $digits;
        }

        return 'tel:' . $digits;
    }
}