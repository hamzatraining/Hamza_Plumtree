<?php

namespace Plumtree\SocialConnect\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Customer\Model\Session;

class Data extends AbstractHelper
{
    protected $_storeManager;

	const XML_PATH_ENABLED = "socialconnect/general/plumtree_socialconnect";
	const XML_PATH_EMAIL   = "socialconnect/general/email";
	

    /**
     * Data constructor.
     * @param StoreManagerInterface $storeManager
     * @param \Magento\Framework\App\Helper\Context $context
     */

    public function __construct(
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\App\Helper\Context $context
    ) {
        parent::__construct($context);
        $this->_storeManager = $storeManager;
    }

    /**
    * Method to find press module is enabled
    *
    * @return boolean
    */
    
	public function getGridEnableStatus()
	
	{
		return $this->scopeConfig->getValue(self::XML_PATH_ENABLED, \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $this->_storeManager->getStore()->getId());
	}

	public function getEmail()
	{
		return $this->scopeConfig->getValue(self::XML_PATH_EMAIL, \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $this->_storeManager->getStore()->getId());
	}

}