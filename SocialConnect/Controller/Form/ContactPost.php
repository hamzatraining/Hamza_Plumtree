<?php
namespace Plumtree\SocialConnect\Controller\Form;

use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Context;

class ContactPost extends \Magento\Framework\App\Action\Action
{
    /**
     * Contact action
     *
     * @return void
     */

    protected $pageFactory;
    public function __construct(Context $context, PageFactory $pageFactory)
    {
        $this->pageFactory = $pageFactory;
        return parent::__construct($context);
    }

    public function execute()
    {       
        $post = $this->getRequest()->getPost();

        if ($post) {
            // Retrieve your form data
            $title          = $post['title'];
            $description    = $post['description'];
            

            $item = $this->_objectManager->create('Plumtree\SocialConnect\Model\Item');
            $item->settitle($title);
            $item->setdescription($description);

            $item->save();
//echo "1234";
//exit;
            // Display the succes form validation message
            $this->messageManager->addSuccess('Subbmit Sucessfull !');

            // Redirect to your form page (or anywhere you want...)
            
        }
        return $this->_redirect("socialconnect/form/contact");
    } 
}