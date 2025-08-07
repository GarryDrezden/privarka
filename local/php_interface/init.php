<?php
use Bitrix\Main\EventManager;

EventManager::getInstance()->addEventHandler('main', 'OnEndBufferContent', function (&$content) {
    $scripts = [
        '/jquery-3.2.1.min.js',
        '@popperjs/core@2.11.8/dist/umd/popper.js',
        'jquery.maskedinput@1.4.1/src/jquery.maskedinput.min.js',
        'bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js',
        '/bitrix/js/main/core/core.min.js',
        '/bitrix/cache/js/s1/privarka2023/kernel_main/kernel_main_v1.js',
        '/bitrix/js/ui/dexie/dist/dexie3.bundle.min.js',
        '/bitrix/js/main/core/core_ls.min.js',
        '/bitrix/js/main/core/core_frame_cache.min.js',
        '/bitrix/js/pull/protobuf/protobuf.min.js',
        '/bitrix/js/pull/protobuf/model.min.js',
        '/bitrix/js/rest/client/rest.client.min.js',
        '/bitrix/js/pull/client/pull.client.min.js',
        '/bitrix/js/main/popup/dist/main.popup.bundle.min.js',
        '/bitrix/js/currency/currency-core/dist/currency-core.bundle.min.js',
        '/bitrix/js/currency/core_currency.min.js',
    ];

    foreach ($scripts as $srcPart) {
        $content = preg_replace(
            '#<script(?![^>]*\bdefer\b)(?![^>]*\basync\b)([^>]*?src=["\'][^"\']*' . preg_quote($srcPart, '#') . '[^"\']*["\'][^>]*?)>#i',
            '<script$1 defer>',
            $content
        );
    }
});
