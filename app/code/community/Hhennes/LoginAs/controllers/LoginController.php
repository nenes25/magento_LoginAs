<?php
/**
 * Description of LoginController
 *
 * @author herve
 */
class Hhennes_LoginAs_LoginController extends Mage_Core_Controller_Front_Action {
 
 
    /**
     * Permet de s'identifer comme le client de son choix
     */
    public function indexAction(){
 
        //Récupération des informations de session
        $customerSession = Mage::getSingleton('customer/session');
 
        //Déconnexion si un client est déjà identifié
        if ( $customerSession->isLoggedIn() ) {
            $customerSession->logout();
        }
 
        //Récupération de l'id du client
        $customerId = $this->getRequest()->getParam('id');
 
        //Identification en tant que client
        $customerSession->loginById($customerId);
 
        //Message de confirmation de l'identification
        Mage::getSingleton('customer/session')->addSuccess($this->__('You are now identified as the choiced customer'));
 
       //Redirection vers l'accueil du compte client 
       $this->_redirect('customer/account/');
    }
 
}