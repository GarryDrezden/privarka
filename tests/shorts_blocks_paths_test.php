<?php
require_once __DIR__ . '/../local/templates/privarka2023/components/bitrix/news.list/shorts_blocks/helpers.php';

function assertEqual($expected, $actual, string $message): void
{
    if ($expected !== $actual) {
        throw new RuntimeException($message . "\nExpected: " . var_export($expected, true) . "\nActual:   " . var_export($actual, true));
    }
}

// Basic trailing slash normalization
assertEqual('/krepezh/privarnoy_krepyezh', shortsNormalizePath('/krepezh/privarnoy_krepyezh/'), 'Trailing slash should be removed');

// Query strings are ignored for path matching
assertEqual('/krepezh/privarnoy_krepyezh', shortsNormalizePath('/krepezh/privarnoy_krepyezh/?param=1'), 'Query string should not change path');

// Encoded characters are decoded before comparison
assertEqual('/foo/тест', shortsNormalizePath('/foo/%D1%82%D0%B5%D1%81%D1%82/'), 'Encoded characters should be decoded');

// Empty values fall back to root
assertEqual('/', shortsNormalizePath(''), 'Empty URI should resolve to root');

// Paths without trailing slash are preserved
assertEqual('/krepezh/zapressovochnyy_krepyezh', shortsNormalizePath('/krepezh/zapressovochnyy_krepyezh'), 'Path without trailing slash should stay the same');

echo "All shorts_blocks path normalization tests passed\n";
