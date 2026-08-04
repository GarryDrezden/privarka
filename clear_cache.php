<?php
/**
 * Скрипт очистки кеша Bitrix
 * Очищает папку /bitrix/cache/s1/bitrix
 */

// Устанавливаем кодировку
header('Content-Type: text/html; charset=utf-8');

// Путь к папке кеша
$cachePath = $_SERVER["DOCUMENT_ROOT"] . "/bitrix/cache/s1/bitrix";

// Функция для рекурсивного удаления содержимого директории (сама папка остается)
function clearDirectoryContents($dir) {
    if (!file_exists($dir) || !is_dir($dir)) {
        return false;
    }
    
    $files = array_diff(scandir($dir), array('.', '..'));
    
    if (empty($files)) {
        return true; // Папка уже пустая
    }
    
    $success = true;
    
    foreach ($files as $file) {
        $path = $dir . DIRECTORY_SEPARATOR . $file;
        if (is_dir($path)) {
            // Рекурсивно удаляем подпапку полностью
            if (!clearDirectoryContents($path)) {
                $success = false;
            }
            if (!rmdir($path)) {
                $success = false;
            }
        } else {
            if (!unlink($path)) {
                $success = false;
            }
        }
    }
    
    return $success;
}

// Проверяем существование папки
if (!file_exists($cachePath)) {
    ?>
    <!DOCTYPE html>
    <html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Очистка кеша</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
                margin: 0;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            }
            .notification {
                background: white;
                padding: 30px;
                border-radius: 10px;
                box-shadow: 0 10px 30px rgba(0,0,0,0.3);
                text-align: center;
                max-width: 500px;
            }
            .icon {
                font-size: 64px;
                margin-bottom: 20px;
            }
            .message {
                font-size: 18px;
                color: #333;
                margin-bottom: 10px;
            }
            .path {
                font-size: 14px;
                color: #666;
                font-family: monospace;
                background: #f5f5f5;
                padding: 10px;
                border-radius: 5px;
                margin-top: 15px;
            }
        </style>
    </head>
    <body>
        <div class="notification">
            <div class="icon">⚠️</div>
            <div class="message">Папка кеша не найдена</div>
            <div class="path"><?php echo htmlspecialchars($cachePath); ?></div>
        </div>
    </body>
    </html>
    <?php
    exit;
}

// Подсчитываем количество файлов перед удалением
$fileCount = 0;
$dirCount = 0;

function countFiles($dir, &$fileCount, &$dirCount) {
    if (!is_dir($dir)) {
        return;
    }
    
    $files = array_diff(scandir($dir), array('.', '..'));
    
    foreach ($files as $file) {
        $path = $dir . DIRECTORY_SEPARATOR . $file;
        if (is_dir($path)) {
            $dirCount++;
            countFiles($path, $fileCount, $dirCount);
        } else {
            $fileCount++;
        }
    }
}

countFiles($cachePath, $fileCount, $dirCount);

// Выполняем очистку содержимого папки (сама папка остается)
$success = clearDirectoryContents($cachePath);

// Выводим результат
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Очистка кеша</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .notification {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            text-align: center;
            max-width: 600px;
        }
        .icon {
            font-size: 80px;
            margin-bottom: 20px;
            animation: scaleIn 0.5s ease-out;
        }
        @keyframes scaleIn {
            from {
                transform: scale(0);
            }
            to {
                transform: scale(1);
            }
        }
        .title {
            font-size: 28px;
            color: #333;
            margin-bottom: 15px;
            font-weight: bold;
        }
        .message {
            font-size: 18px;
            color: #4CAF50;
            margin-bottom: 20px;
        }
        .stats {
            background: #f5f5f5;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
            font-size: 14px;
            color: #666;
        }
        .stats-item {
            margin: 8px 0;
        }
        .path {
            font-size: 12px;
            color: #999;
            font-family: monospace;
            background: #f9f9f9;
            padding: 8px;
            border-radius: 5px;
            margin-top: 15px;
            word-break: break-all;
        }
        .timestamp {
            font-size: 12px;
            color: #999;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="notification">
        <?php if ($success): ?>
            <div class="icon">✅</div>
            <div class="title">Кеш успешно очищен!</div>
            <div class="message">Содержимое папки кеша было полностью удалено</div>
            <div class="stats">
                <div class="stats-item"><strong>Удалено файлов:</strong> <?php echo $fileCount; ?></div>
                <div class="stats-item"><strong>Удалено папок:</strong> <?php echo $dirCount; ?></div>
            </div>
        <?php else: ?>
            <div class="icon">❌</div>
            <div class="title">Ошибка при очистке кеша</div>
            <div class="message" style="color: #f44336;">Не удалось полностью очистить папку кеша</div>
        <?php endif; ?>
        <div class="path"><?php echo htmlspecialchars($cachePath); ?></div>
        <div class="timestamp">Время выполнения: <?php echo date('d.m.Y H:i:s'); ?></div>
    </div>
</body>
</html>
