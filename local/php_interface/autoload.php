<?php


use Bitrix\Main\Loader;

//Автозагрузка наших классов
Loader::registerAutoLoadClasses(null, [
    'lib\UserType\CUserTypeUserId' => APP_CLASS_FOLDER . 'UserType/CUserTypeUserId.php',
    'lib\UserType\CUserTypeColor' => APP_CLASS_FOLDER . 'UserType/CUserTypeColor.php',
]);