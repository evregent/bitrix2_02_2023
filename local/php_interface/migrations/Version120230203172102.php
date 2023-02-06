<?php

namespace Sprint\Migration;


class Version120230203172102 extends Version
{
    protected $description = "";

    protected $moduleVersion = "4.2.4";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();
        $hlblockId = $helper->Hlblock()->saveHlblock(array (
  'NAME' => 'Orders',
  'TABLE_NAME' => 'orders',
  'LANG' => 
  array (
    'ru' => 
    array (
      'NAME' => 'Заказы',
    ),
    'en' => 
    array (
      'NAME' => 'Orders',
    ),
  ),
));
    }

    public function down()
    {
        //your code ...
    }
}
