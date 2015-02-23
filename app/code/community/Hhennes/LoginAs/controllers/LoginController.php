<?php

/**
 * Front End controller
 *
 * @category    Hhennes
 * @package     Hhennes_LoginAs
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @author herve - <contact@h-hennes.fr>
 * @copyright Copyright (c) hhennes 2015 (http://www.h-hennes.fr)
 */
class Hhennes_LoginAs_LoginController extends Mage_Core_Controller_Front_Action {

    /**
     * Allow you to be identified as the customer you want on the frontEnd
     */
    public function indexAction() {

        $customerSession = Mage::getSingleton('customer/session');

        if ($customerSession->isLoggedIn()) {
            $customerSession->logout();
        }

        $customerId = $this->getRequest()->getParam('id');
        $customerSession->loginById($customerId);

        Mage::getSingleton('customer/session')->addSuccess($this->__('You are now identified as the choiced customer'));
        $this->_redirect('customer/account/');
    }

}
