<?php 
namespace Plumtree\SocialConnect\Controller\Adminhtml\Item;

class Delete extends \Magento\Backend\App\Action {
	
	/**
	 * {@inheritdoc}
	 */
	protected function _isAllowed()
	{
		return $this->_authorization->isAllowed("Plumtree_SocialConnect::item_delete");
	}
	
	/**
	 * Delete action
	 *
	 * @return \Magento\Framework\Controller\ResultInterface
	 */
	public function execute()
	{
		$id = $this->getRequest()->getParam("id");
		/** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
		$resultRedirect = $this->resultRedirectFactory->create();
		if ($id) {
			try {
				$model = $this->_objectManager->create("Plumtree\SocialConnect\Model\Item");
				$model->load($id);
				$model->delete();
				$this->messageManager->addSuccess(__("The Item has been deleted."));
				return $resultRedirect->setPath("*/*/");
			} catch (\Exception $e) {
				$this->messageManager->addError($e->getMessage());
				return $resultRedirect->setPath("*/*/edit", ["id" => $id]);
			}
		}
		$this->messageManager->addError(__("We can't find the item to delete."));
		return $resultRedirect->setPath("*/*/");
	}
}
?>