<?php

$settings = json_decode(file_get_contents(__DIR__ . '/db.json'));

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=' . $settings->db,
    'username' => $settings->user,
    'password' => $settings->password,
    'charset' => 'utf8',
    // 'enableSchemaCache' => YII_DEBUG ? false : true
    'enableSchemaCache' => true
];