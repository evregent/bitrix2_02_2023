<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';
?>

<?php
$APPLICATION->IncludeComponent(
    'ylab:element.list',
    '',
    [
        'CALC_TOTAL' => 'Y'
    ]
);

$APPLICATION->IncludeComponent(
    'ylab:element.list.companies',
    '',
);
?>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'; ?>
