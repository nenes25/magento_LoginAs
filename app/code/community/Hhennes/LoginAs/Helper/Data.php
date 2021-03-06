<?php
/**
 * hhennes_loginAs Helper
 *
 * @category    Hhennes
 * @package     Hhennes_LoginAs
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @author herve - <contact@h-hennes.fr>
 * @copyright Copyright (c) hhennes 2015 (http://www.h-hennes.fr)
 */
class Hhennes_LoginAs_Helper_Data extends Mage_Core_Helper_Abstract {
    
    /**
     * Clé de sécurité pour l'authentification
     * Basique car basé sur la date courante (valide max 1h )
     * @return string
     */
    public function getSecureKey(){
        return md5(date('YmdH'));
    }

}
