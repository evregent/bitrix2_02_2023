<?php

namespace YLab\Components;

use \Bitrix\Main\Localization\Loc;
use \Bitrix\Main\Loader;
use \CBitrixComponent;
use \CIBlockElement;
use \Exception;
use Ylab\Helpers\HlBlockHelpers;
use Ylab\Helpers\IBlockHelpers;

/**
 * Class ElementListComponent
 * @package YLab\Components
 * Компонент отображения списка элементов нашего ИБ
 */
class ElementListComponent extends CBitrixComponent
{
    /** @var int $idIBlock ID информационого блока */
    private $idIBlock;

    /** @var string $hlTemplateName Имя шаблона для отображения HL */
    private $hlTemplateName = 'hl';

    /**
     * Метод executeComponent
     *
     * @return mixed|void
     * @throws Exception
     */
    public function executeComponent()
    {
        Loader::includeModule('iblock');

        $this->idIBlock = IBlockHelpers::getIdIBlock('positions');

        if ($this->getTemplateName() == $this->hlTemplateName) {
            $this->arResult['ITEMS'] = $this->getDataFromHl();
        } else {
            $this->arResult['ITEMS'] = $this->getElements();
        }

        $this->includeComponentTemplate();
    }

    /**
     * Получим элементы ИБ
     * @return array
     */
    public function getElements(): array
    {
        $result = [];

        $arFilter = [
            'IBLOCK_ID' => $this->idIBlock
        ];

        $arCurSort = ['ID' => 'DESC'];

        $elements = CIBlockElement::GetList(
            $arCurSort,
            $arFilter,
            false,
            false,
            ['ID', 'IBLOCK_ID', 'NAME', 'PROPERTY_PRICE', 'PROPERTY_PERCENT', 'PROPERTY_STATUS',
                'PROPERTY_WEIGHT', 'PROPERTY_NOMENCLATURE']
        );

        while ($element = $elements->GetNext()) {
            $total = $this->calcTotal($element);

            $orderXmlIds = $this->getOrdersIds($element['ID']);

            $orders = $this->getOrders($orderXmlIds);

            $result[] = [
                'ID' => $element['ID'],
                'NAME' => $element['NAME'],
                'PRICE' => $element['PROPERTY_PRICE_VALUE'],
                'PERCENT' => $element['PROPERTY_PERCENT_VALUE'],
                'TOTAL' => $total,
                'STATUS' => $element['PROPERTY_STATUS_VALUE'],
                'WEIGHT' => $element['PROPERTY_WEIGHT_VALUE'],
                'NOMENCLATURE' => $element['PROPERTY_NOMENCLATURE_VALUE'],
                'ORDER' => $orders,
            ];
        }

        return $result;
    }

    /**
     * Определим итоговую цену
     * @param array $element
     * @return string
     */
    private function calcTotal(array $element): string
    {
        $result = Loc::getMessage('YLAB.ELEMENT.LIST.CLASS.NO_TOTAL');

        if ($this->arParams['CALC_TOTAL'] === 'Y') {
            $result = round(((int)$element['PROPERTY_PRICE_VALUE'] * (int)$element['PROPERTY_PERCENT_VALUE']) / 100) . Loc::getMessage('YLAB.ELEMENT.LIST.CLASS.RUB');
        }

        return $result;
    }

    /**
     * получаем индексы заказов по ID позиции
     * @param string $elementId
     * @return array
     */
    private function getOrdersIds($elementId): array
    {
        $props = CIBlockElement::GetList(
            [], ['IBLOCK_ID' => $this->idIBlock, 'ID' => $elementId], false, false, []
        );

        if ($obEl = $props->GetNextElement()) {
            $orderXmlIds = $obEl->GetProperties();
        }
        $orderXmlIds = $orderXmlIds['ORDER']['VALUE'];

        return $orderXmlIds;
    }

    /**
     * получаем массив значений заказов по массиву индексов
     * @param array $arrIds
     * @return array
     */
    private function getOrders($arrIds): array
    {
        $entityClass = HlBlockHelpers::getHlEntityClass('Orders');
        $ordersList = $entityClass::getList([
            'select' => ['*'],
            'filter' => ['UF_XML_ID' => $arrIds],
        ]);
        $orders = $ordersList->fetchAll();

        return $orders;
    }

    /**
     * Получим список заказов
     * @return array
     * @throws \Bitrix\Main\ArgumentException
     * @throws \Bitrix\Main\LoaderException
     * @throws \Bitrix\Main\ObjectPropertyException
     * @throws \Bitrix\Main\SystemException
     */
    private function getDataFromHl(): array
    {
        $entityClass = HlBlockHelpers::getHlEntityClass('Orders');

        $ordersList = $entityClass::getList([
            'select' => ['*'],
            'filter' => [],
            'order' => ['UF_SUM'],
        ]);

        $orders = $ordersList->fetchAll();

        return is_array($orders) ? $orders : [];
    }
}
