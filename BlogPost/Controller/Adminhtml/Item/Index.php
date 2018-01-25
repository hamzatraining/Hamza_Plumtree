<?php 
namespace Plumtree\BlogPost\Controller\Adminhtml\Item;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Backend\App\Action
{
	/**
	 * Authorization level of a basic admin session
	 *
	 * @see _isAllowed()
	 */
	const ADMIN_RESOURCE = "Plumtree_BlogPost::item";
	
	/**
	 * @var PageFactory
	 */
	protected $resultPageFactory;
	
	/**
	 * @param Context $context
	 * @param PageFactory $resultPageFactory
	 */
	public function __construct(
		Context $context,
		PageFactory $resultPageFactory
	){
		parent::__construct($context);
		$this->resultPageFactory = $resultPageFactory;
	}
	
	public function execute()
	{
		/** @var \Magento\Backend\Model\View\Result\Page $resultPage */
		$resultPage = $this->resultPageFactory->create();
		$resultPage->setActiveMenu("Plumtree_BlogPost::item");
		$resultPage->addBreadcrumb(__("Item"), __("Item"));
		$resultPage->addBreadcrumb(__("Manage Item"), __("Manage Item"));
		$resultPage->getConfig()->getTitle()->prepend(__("Item"));
		
		$dataPersistor = $this->_objectManager->get("Magento\Framework\App\Request\DataPersistorInterface");
		$dataPersistor->clear("item");
		
		return $resultPage;
	}
} 
?>