<?

namespace lib\usertype;

use \Bitrix\Main,
    \Bitrix\Main\Localization\Loc,
    \Bitrix\Main\UserField;

class CUserTypeUserId
{

    /**
     * Метод возвращает массив описания собственного типа свойств
     * @return array
     */
    public function GetUserTypeDescription()
    {
        return array(
            "USER_TYPE_ID" => 'userid',
            "CLASS_NAME" => __CLASS__,
            "DESCRIPTION" => 'Привязка к пользователю',
            "BASE_TYPE" => \CUserTypeManager::BASE_TYPE_INT,
        );
    }

    /**
     * @param $arUserField
     * @return string
     */
    function GetDBColumnType($arUserField)
    {
        global $DB;
        switch(strtolower($DB->type))
        {
            case "mysql":
                return "int(18)";
            case "oracle":
                return "number(18)";
            case "mssql":
                return "int";
        }
        return "int";
    }
    /**
     * Получаем список значений
     * @param $arUserField
     * @return array|bool|\CDBResult
     */
    public function GetList($arUserField)
    {
        $rsEnum = [];
        $dbResultList = \CUser::GetList(($by='id'), ($order='asc'), ['GROUPS_ID'=>[1, 5]]);
        while ($arResult = $dbResultList->Fetch()){
            $rsEnum[] = [
                'ID' => $arResult['ID'],
                'VALUE' => $arResult['NAME'] . ' ' . $arResult['LAST_NAME'] . ' (' . $arResult['EMAIL'] . ')'
            ];
        }

        return $rsEnum;
    }
}
