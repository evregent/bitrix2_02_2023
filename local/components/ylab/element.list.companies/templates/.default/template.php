<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Main\Localization\Loc;

?>
<h1>Компании</h1>
<div class="list">
    <?php foreach ($arResult['ITEMS'] as $arItem) { ?>
        <div>
            <p><?= Loc::getMessage('YLAB.ELEMENT.LIST.UF_NAME') ?> <?= $arItem['UF_NAME'] ?></p>
            <p><?= Loc::getMessage('YLAB.ELEMENT.LIST.UF_DESCRIPTION') ?> <?= $arItem['UF_DESCRIPTION'] ?></p>
            <p><?= Loc::getMessage('YLAB.ELEMENT.LIST.UF_INN') ?> <?= $arItem['UF_INN'] ?></p>
        </div>
        <hr>
    <?php } ?>
</div>