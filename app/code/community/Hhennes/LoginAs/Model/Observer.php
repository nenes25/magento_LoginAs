<?php

/**
 *  Hhennes LoginAs Model Observer
 *
 * @category    Hhennes
 * @package     Hhennes_LoginAs
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @author herve - <contact@h-hennes.fr>
 * @copyright Copyright (c) hhennes 2015 (http://www.h-hennes.fr)
 */
class Hhennes_LoginAs_Model_Observer {

    /**
     * Ajout d'une nouvelle colonne dans le Grid Client de Magento
	 * Add a new option "login as" on the column "action" of the Mage_Adminhtml_Block_Customer_Grid
     * @param Varien_Event_Observer $observer 
     */
    public function addCustomerLoginAsColumn(Varien_Event_Observer $observer) {

        $block = $observer->getBlock();

        if ($block instanceof Mage_Adminhtml_Block_Customer_Grid) {

            $block->addColumn('action', array(
                'header' => Mage::helper('customer')->__('Action'),
                'width' => '100',
                'type' => 'action',
                'getter' => 'getId',
                'actions' => array(
                    array(
                        'caption' => Mage::helper('customer')->__('Edit'),
                        'url' => array('base' => '*/*/edit'),
                        'field' => 'id'
                    ),
                    //New Action
                    array(
                        'caption' => Mage::helper('hhennes_loginas')->__('Login As'),
                        'url' => array('base' => 'hhennes_loginas/login', 'params' => array('secure_key' => Mage::helper('hhennes_loginas')->getSecureKey())), // Redirection to front office controller
                        'field' => 'id'
                    )
                ),
                'filter' => false,
                'sortable' => false,
                'index' => 'stores',
                'is_system' => true,
            ));
        }
    }

}
