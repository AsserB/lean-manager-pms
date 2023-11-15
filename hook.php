<?php

require_once 'vendor/autoload.php';

use Telegram\Bot\Api;

$botApiKey = '6726490085:AAFj2y39Ca4Y5meUiTJH7Z5hbjzXYC0z938';
$botUsername = '@leanMbot';

$telegram = new Api($botApiKey);

$update = $telegram->getWebhookUpdates();

$chatId = $update->getMessage()->getChat()->getId();
$text = $update->getMessage()->getText();
$username = $update->getMessage()->getFrom()->getUsername();

//Создаем папку logs
if (!file_exists('logs')) {
    mkdir('logs', 0755, true);
}

//Логирование путем нейминга и с датой
$logFileName = sprintf('logs/%s_telegram_bot_user_messages.log', date('Y_m'));

//Записываем лог с информацией об обращении
$logMessage = sprintf(
    "[%s] User: %s (ID: %d) sent message: %s\n",
    date('Y-m-d H:i:s'),
    $username,
    $chatId,
    $text
);

error_log($logMessage, 3, $logFileName);

switch ($text) {
    case '/start':
        $response = 'Добро пожаловать ' . $username . ' в наш телеграм-бот: ' .  $botUsername;
        break;
    case '/validate':
        $response = 'Для использование бота необходимо пройти регистрацию, введите в ответ сгенерированный код в вашем аккаунте в разделе "настройки профиля"';
        break;
    default:
        $response = 'Такой команды не существует';
        break;
}

$telegram->sendMessage([
    'chat_id' => $chatId,
    'text' => $response
]);
