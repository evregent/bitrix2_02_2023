<?php


use Bitrix\Main;
$eventManager = Main\EventManager::getInstance();


$eventManager->addEventHandler('main', 'OnUserTypeBuildList', ['lib\UserType\CUserTypeUserId', 'GetUserTypeDescription']);
$eventManager->addEventHandler('main', 'OnUserTypeBuildList', ['lib\UserType\CUserTypeColor', 'GetUserTypeDescription']);
