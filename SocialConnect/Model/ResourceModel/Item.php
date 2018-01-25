<?php
namespace Plumtree\SocialConnect\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\ResourceModel\Db\Context;
use Magento\Framework\Stdlib\DateTime;
use Magento\Framework\EntityManager\EntityManager;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\EntityManager\MetadataPool;
use Plumtree\SocialConnect\Api\Data\ItemInterface;
use Magento\Framework\Model\AbstractModel;

class Item extends AbstractDb
{	
	/**
	 * Store manager
	 *
	 * @var StoreManagerInterface
	 */
	protected $_storeManager;
	
	/**
	 * @var DateTime
	 */
	protected $dateTime;
	
	/**
	 * @var EntityManager
	 */
	protected $entityManager;
	
	/**
	 * @var MetadataPool
	 */
	protected $metadataPool;
	
	/**
	 * Item's Store table name
	 *
	 * @var string
	 */
	protected $_itemStoreTable;
	
	/**
	 * @param Context $context
	 * @param StoreManagerInterface $storeManager
	 * @param DateTime $dateTime
	 * @param EntityManager $entityManager
	 * @param MetadataPool $metadataPool
	 * @param string $connectionName
	 */
	public function __construct(
		Context $context,
		StoreManagerInterface $storeManager,
		DateTime $dateTime,
		EntityManager $entityManager,
		MetadataPool $metadataPool,
		$connectionName = null
	) {
		parent::__construct($context, $connectionName);
	}
	
	/**
	 * Initialize resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('plumtree_socialconnect_item', 'item_id');
	}
}
?>