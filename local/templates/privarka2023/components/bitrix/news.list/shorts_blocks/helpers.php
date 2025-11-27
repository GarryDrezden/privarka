<?php
if (!function_exists('shortsNormalizePath')) {
    function shortsNormalizePath(string $uri): string
    {
        $path = (string)parse_url($uri, PHP_URL_PATH);
        $decoded = rawurldecode($path ?: '/');
        $normalized = rtrim($decoded, '/');

        return $normalized === '' ? '/' : $normalized;
    }
}
