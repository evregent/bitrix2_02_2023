<?php

namespace Sprint\Migration;


class HL_COMPANIES20230204152446 extends Version
{
    protected $description = "HL-блок Компании";

    protected $moduleVersion = "4.2.4";

    /**
     * @return bool|void
     * @throws Exceptions\HelperException
     */
    public function up()
    {
        $helper = $this->getHelperManager();
        $hlblockId = $helper->Hlblock()->saveHlblock(array(
            'NAME' => 'Companies',
            'TABLE_NAME' => 'companies',
            'LANG' =>
                array(
                    'ru' =>
                        array(
                            'NAME' => 'Компании',
                        ),
                    'en' =>
                        array(
                            'NAME' => 'Companies',
                        ),
                ),
        ));
        $helper->Hlblock()->saveField($hlblockId, array(
            'FIELD_NAME' => 'UF_NAME',
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
                    'en' => 'Name',
                    'ru' => 'Название',
                ),
            'LIST_COLUMN_LABEL' =>
                array(
                    'en' => 'Name',
                    'ru' => 'Название',
                ),
            'LIST_FILTER_LABEL' =>
                array(
                    'en' => 'Name',
                    'ru' => 'Название',
                ),
            'ERROR_MESSAGE' =>
                array(
                    'en' => '',
                    'ru' => '',
                ),
            'HELP_MESSAGE' =>
                array(
                    'en' => 'Name',
                    'ru' => 'Название',
                ),
        ));
        $helper->Hlblock()->saveField($hlblockId, array(
            'FIELD_NAME' => 'UF_DESCRIPTION',
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
                    'en' => 'Description',
                    'ru' => 'Описание',
                ),
            'LIST_COLUMN_LABEL' =>
                array(
                    'en' => 'Description',
                    'ru' => 'Описание',
                ),
            'LIST_FILTER_LABEL' =>
                array(
                    'en' => 'Description',
                    'ru' => 'Описание',
                ),
            'ERROR_MESSAGE' =>
                array(
                    'en' => '',
                    'ru' => '',
                ),
            'HELP_MESSAGE' =>
                array(
                    'en' => 'Description',
                    'ru' => 'Описание',
                ),
        ));
        $helper->Hlblock()->saveField($hlblockId, array(
            'FIELD_NAME' => 'UF_INN',
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
                    'en' => 'INN',
                    'ru' => 'ИНН',
                ),
            'LIST_COLUMN_LABEL' =>
                array(
                    'en' => 'INN',
                    'ru' => 'ИНН',
                ),
            'LIST_FILTER_LABEL' =>
                array(
                    'en' => 'INN',
                    'ru' => 'ИНН',
                ),
            'ERROR_MESSAGE' =>
                array(
                    'en' => '',
                    'ru' => '',
                ),
            'HELP_MESSAGE' =>
                array(
                    'en' => 'INN',
                    'ru' => 'ИНН',
                ),
        ));
    }

    public function down()
    {
        //your code ...
    }
}
