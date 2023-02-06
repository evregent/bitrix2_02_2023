<?php

namespace Sprint\Migration;


class HL_ORDERS20230204143755 extends Version
{
    protected $description = "HL-блок Заказы";

    protected $moduleVersion = "4.2.4";

    /**
     * @return bool|void
     * @throws Exceptions\HelperException
     */
    public function up()
    {
        $helper = $this->getHelperManager();
        $hlblockId = $helper->Hlblock()->saveHlblock(array(
            'NAME' => 'Orders',
            'TABLE_NAME' => 'orders',
            'LANG' =>
                array(
                    'ru' =>
                        array(
                            'NAME' => 'Заказы',
                        ),
                    'en' =>
                        array(
                            'NAME' => 'Orders',
                        ),
                ),
        ));
        $helper->Hlblock()->saveField($hlblockId, array(
            'FIELD_NAME' => 'UF_CODE',
            'USER_TYPE_ID' => 'string',
            'XML_ID' => '',
            'SORT' => '100',
            'MULTIPLE' => 'N',
            'MANDATORY' => 'N',
            'SHOW_FILTER' => 'N',
            'SHOW_IN_LIST' => 'Y',
            'EDIT_IN_LIST' => 'Y',
            'IS_SEARCHABLE' => 'N',
            'SETTINGS' =>
                array(
                    'SIZE' => 20,
                    'ROWS' => 1,
                    'REGEXP' => '',
                    'MIN_LENGTH' => 0,
                    'MAX_LENGTH' => 0,
                    'DEFAULT_VALUE' => '',
                ),
            'EDIT_FORM_LABEL' =>
                array(
                    'en' => 'Code',
                    'ru' => 'Код заказа',
                ),
            'LIST_COLUMN_LABEL' =>
                array(
                    'en' => 'Code',
                    'ru' => 'Код заказа',
                ),
            'LIST_FILTER_LABEL' =>
                array(
                    'en' => 'Code',
                    'ru' => 'Код заказа',
                ),
            'ERROR_MESSAGE' =>
                array(
                    'en' => '',
                    'ru' => '',
                ),
            'HELP_MESSAGE' =>
                array(
                    'en' => 'Code',
                    'ru' => 'Код заказа',
                ),
        ));
        $helper->Hlblock()->saveField($hlblockId, array(
            'FIELD_NAME' => 'UF_SUM',
            'USER_TYPE_ID' => 'double',
            'XML_ID' => '',
            'SORT' => '100',
            'MULTIPLE' => 'N',
            'MANDATORY' => 'N',
            'SHOW_FILTER' => 'N',
            'SHOW_IN_LIST' => 'Y',
            'EDIT_IN_LIST' => 'Y',
            'IS_SEARCHABLE' => 'N',
            'SETTINGS' =>
                array(
                    'PRECISION' => 4,
                    'SIZE' => 20,
                    'MIN_VALUE' => 0.0,
                    'MAX_VALUE' => 0.0,
                    'DEFAULT_VALUE' => NULL,
                ),
            'EDIT_FORM_LABEL' =>
                array(
                    'en' => 'Sum',
                    'ru' => 'Сумма заказа',
                ),
            'LIST_COLUMN_LABEL' =>
                array(
                    'en' => 'Sum',
                    'ru' => 'Сумма заказа',
                ),
            'LIST_FILTER_LABEL' =>
                array(
                    'en' => 'Sum',
                    'ru' => 'Сумма заказа',
                ),
            'ERROR_MESSAGE' =>
                array(
                    'en' => '',
                    'ru' => '',
                ),
            'HELP_MESSAGE' =>
                array(
                    'en' => 'Sum',
                    'ru' => 'Сумма заказа',
                ),
        ));
        $helper->Hlblock()->saveField($hlblockId, array(
            'FIELD_NAME' => 'UF_XML_ID',
            'USER_TYPE_ID' => 'integer',
            'XML_ID' => '',
            'SORT' => '100',
            'MULTIPLE' => 'N',
            'MANDATORY' => 'N',
            'SHOW_FILTER' => 'N',
            'SHOW_IN_LIST' => 'Y',
            'EDIT_IN_LIST' => 'Y',
            'IS_SEARCHABLE' => 'N',
            'SETTINGS' =>
                array(
                    'SIZE' => 20,
                    'MIN_VALUE' => 0,
                    'MAX_VALUE' => 0,
                    'DEFAULT_VALUE' => NULL,
                ),
            'EDIT_FORM_LABEL' =>
                array(
                    'en' => '',
                    'ru' => '',
                ),
            'LIST_COLUMN_LABEL' =>
                array(
                    'en' => '',
                    'ru' => '',
                ),
            'LIST_FILTER_LABEL' =>
                array(
                    'en' => '',
                    'ru' => '',
                ),
            'ERROR_MESSAGE' =>
                array(
                    'en' => '',
                    'ru' => '',
                ),
            'HELP_MESSAGE' =>
                array(
                    'en' => '',
                    'ru' => '',
                ),
        ));
    }

    public function down()
    {
        //your code ...
    }
}
