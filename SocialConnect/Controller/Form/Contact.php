<?php
namespace Plumtree\SocialConnect\Controller\Form;

use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Context;

class Contact extends \Magento\Framework\App\Action\Action
{
    /**
     * Contact action
     *
     * @return void
     */

    protected $_resultPageFactory;
	
    public function __construct(Context $context, PageFactory $pageFactory)
    {
        $this->pageFactory = $pageFactory;
        return parent::__construct($context);
    }

    public function execute()
    {       
        $page_object = $this->pageFactory->create();
		//$resultPage->getConfig()->getTitle()->set(__("CONTACT MODULE"));
        return $page_object;
    } 
}