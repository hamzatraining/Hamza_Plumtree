<?php
namespace Plumtree\SocialConnect\Controller\Adminhtml\Item;

use Magento\Framework\App\Filesystem\DirectoryList;
//use Plumtree\Bannerslider\Model\ImageUploader;

class Save extends \Magento\Backend\App\Action
{

	//private $imageFields = array("title_image", "image_desktop", "image_mobile");
	
	const DS = DIRECTORY_SEPARATOR;
	
	/**
	 * @var \Plumtree\Bannerslider\Model\ImageUploader
	 */
	//protected $_imageUploader;
	
	protected $directory_list;
	
	/**
	 * @param Action\Context $context
	 */
	public function __construct(\Magento\Backend\App\Action\Context $context,/* ImageUploader $_imageUploader,*/ DirectoryList $directory_list)
	{
		parent::__construct($context);
		/*$this->_imageUploader = $_imageUploader;*/
		$this->directory_list = $directory_list;
	}

	/**
	 * {@inheritdoc}
	 */
	protected function _isAllowed()
	{
		return $this->_authorization->isAllowed("Plumtree_SocialConnect::item_save");
	}

	/**
	 * Save action
	 *
	 * @return \Magento\Framework\Controller\ResultInterface
	 */
	public function execute()
	{
		$data = $this->getRequest()->getPostValue();
		/** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
		$resultRedirect = $this->resultRedirectFactory->create();
		if ($data) {
			/** @var \Plumtree\Bannerslider\Model\Item $model */
			$model = $this->_objectManager->create("Plumtree\SocialConnect\Model\Item");
		
			$id = $this->getRequest()->getParam("id");
			if ($id) {
				$model->load($id);
			}
				
			if (empty($data['item_id'])) {
				$data['item_id'] = null;
			}
			
			$model->setData($data);
			
				
			$this->_eventManager->dispatch("socialconnect_item_data_prepare_save", [
					"item" => $model,
					"request" => $this->getRequest()
			]);
				
		//	echo "123";
		//	exit;

			try {
				$model->save();
				$this->messageManager->addSuccess(__("Item was successfully saved."));
				$this->_objectManager->get("Magento\Backend\Model\Session")->setFormData(false);
				if ($this->getRequest()->getParam("back")) {
					return $resultRedirect->setPath("*/*/edit", ["id" => $model->getId(), "_current" => true]);
				}
				return $resultRedirect->setPath("*/*/");
			} catch (\Magento\Framework\Exception\LocalizedException $e) {
				$this->messageManager->addError($e->getMessage());
			} catch (\RuntimeException $e) {
				$this->messageManager->addError($e->getMessage());
			} catch (\Exception $e) {
				$this->messageManager->addException($e, __("Something went wrong while saving the item."));
			}
		
			$this->_getSession()->setFormData($data);
			return $resultRedirect->setPath("*/*/edit", ["id" => $this->getRequest()->getParam("item_id")]);
		}
		return $resultRedirect->setPath("*/*/");
	}
	
}
?>
