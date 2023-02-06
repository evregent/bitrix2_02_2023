<?php

namespace Ylab\Helpers;

use Bitrix\Main\Loader;
use CIBlock;

/**
 * Набор методов хелперов для работы с инфоблоками
 */
class IBlockHelpers
{
    /**
     * Метод для получения ID инфоблока по символьному коду
     * @param string $sIBlockCode
     * @return integer
     * @throws \Bitrix\Main\ArgumentException
     * @throws \Bitrix\Main\LoaderException
     * @throws \Bitrix\Main\ObjectPropertyException
     * @throws \Bitrix\Main\SystemException
     */
    public static function getIdIBlock(string $sIBlockCode)
    {
        Loader::includeModule('iblock');

        $arrFilter = ["CODE" => $sIBlockCode];

        $res = CIBlock::GetList([], $arrFilter, false);

        $IBlockId = null;
        if ($ar_res = $res->Fetch()) {
            $IBlockId = $ar_res["ID"];
        }

        return $IBlockId;
    }
}