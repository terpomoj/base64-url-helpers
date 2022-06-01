<?php

declare(strict_types=1);

if (!function_exists('base64_url_encode')) {
    /**
     * Encode data with URL-safe Base64.
     *
     * @param string $string
     * @param bool $removePadding
     * @return string
     */
    function base64_url_encode(string $string, bool $removePadding = true): string
    {
        return str_replace(['+', '/', '='], ['-', '_', $removePadding ? '' : '='], base64_encode($string));
    }
}

if (!function_exists('base64_url_decode')) {
    /**
     * Decodes data encoded with URL-safe base64.
     *
     * @param string $string
     * @param bool $strict
     * @return string|bool
     */
    function base64_url_decode(string $string, bool $strict = false): string|bool
    {
        return base64_decode(str_replace(['-', '_'], ['+', '/'], $string), $strict);
    }
}
