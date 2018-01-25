<?php
namespace Plumtree\SocialConnect\Block;
class Listing extends \Magento\Framework\View\Element\Template
{
     protected $_ItemFactory; 
     public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Plumtree\SocialConnect\Model\ItemFactory $ItemFactory,
        array $data = []
     ) {

        $this->_ItemFactory = $ItemFactory->create();
        parent::__construct($context, $data);
    }

    public function getSocialConnectItemsList()
    {
        //SELECT * FROM MYTABLE WHERE STATUS = 1 ORDER BY 
        //collection

        //SELECT * FROM MYTABLE
        $collection = $this->_ItemFactory->getCollection();
        $collection->addFieldToFilter("status", 1);
        $collection->setOrder("Sort_Order", 'DESC');
        //$collection->getSelect() use print query
       return ($collection->count()) ? $collection : null;
    }
}
?>

