<?php
/**
 * Description of Observer
 *
 * @author herve
 */
class Hhennes_LoginAs_Model_Observer {
 
 
    /**
     * Ajout d'une nouvelle colonne dans le Grid Client de Magento
     * @param Varien_Event_Observer $observer 
     */
    public function addCustomerLoginAsColumn( Varien_Event_Observer $observer ) {
         
        $block = $observer->getBlock();
 
		//Si le block est la grid des clients on fait notre action
        if ( $block instanceof Mage_Adminhtml_Block_Customer_Grid ) {
            
            echo 'Observer fonctionnel';
 
            //On reprends le contenu de la colonne action de base et on rajoute l'option pour s'identifer
            $block->addColumn('action',
            array(
                'header'    =>  Mage::helper('customer')->__('Action'),
                'width'     => '100',
                'type'      => 'action',
                'getter'    => 'getId',
                'actions'   => array(
                    array(
                        'caption'   => Mage::helper('customer')->__('Edit'),
                        'url'       => array('base'=> '*/*/edit'),
                        'field'     => 'id'
                    ),
					//Notre nouvelle action
                    array(
                        'caption'   => Mage::helper('hhennes_loginas')->__('Login As'),
                        'url'       => array('base'=> 'hhennes_loginas/login'), // Redirection vers le controller Front Office
                        'field'     => 'id'
                    )
                ),
                'filter'    => false,
                'sortable'  => false,
                'index'     => 'stores',
                'is_system' => true,
        ));
 
        }
 
    }
 
}

