<?php
namespace Plumtree\SocialConnect\Controller\Contact;

use \Magento\Framework\Controller\ResultFactory;
use \Magento\Framework\Controller\ResultRedirect;
use \Plumtree\SocialConnect\Helper\Data;


class Listing extends \Magento\Framework\App\Action\Action
{

   protected $resultPageFactory;
   protected $helperData;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        Data $helperData)
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->helperData = $helperData;
        parent::__construct($context);

    }

   public function execute()
    {
        
       if(!$this->helperData->getGridEnableStatus())
        {
            $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
            $resultRedirect->setUrl('/no-route');
            return $resultRedirect;            
        }
        $test=$this->helperData->getEmail();        
        
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $resultPage->getConfig()->getTitle()->set(__('Custom Form Listing'));
        return $this->resultPageFactory->create();  
    }
}
?>