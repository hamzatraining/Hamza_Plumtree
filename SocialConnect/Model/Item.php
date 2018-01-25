<?php
namespace Plumtree\SocialConnect\Model;

use Magento\Framework\Model\AbstractModel;
use Magento\Framework\DataObject\IdentityInterface;
use Plumtree\SocialConnect\Api\Data\ItemInterface;

class Item extends AbstractModel implements IdentityInterface, ItemInterface
{
	/**
	 * No route item id
	 */
	const NOROUTE_PAGE_ID = 'no-route';

	/**#@+
	 * Items's Statuses
	 */
	const STATUS_ENABLED = 1;
	const STATUS_DISABLED = 0;

	/**
	 * SocialConnect Items cache tag
	 */
	const CACHE_TAG = 'plumtree_socialconnect_item';

	/**
	 * @var string
	 */
	protected $_cacheTag = 'plumtree_socialconnect_item';

	/**
	 * Prefix of model events names
	 *
	 * @var string
	 */
	protected $_eventPrefix = 'plumtree_socialconnect_item';

	/**
	 * Name of object id field
	 *
	 * @var string
	 */
	protected $_idFieldName = 'item_id';

	/**
	 * @var ScopeConfigInterface
	 */
	private $scopeConfig;

	/**
	 * @var \Magento\Framework\Stdlib\DateTime\DateTime
	 */
	protected $date;

	public function __construct(
		\Magento\Framework\Model\Context $context,
		\Magento\Framework\Registry $registry,
		\Magento\Framework\Stdlib\DateTime\DateTime $date,
		array $data = []

	){
		$this->date = $date;
		parent::__construct($context, $registry);
	}

	/**
	 * Initialize resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('Plumtree\SocialConnect\Model\ResourceModel\Item');
	}



	/**
	 * Load object data
	 *
	 * @param int|null $id
	 * @param string $field
	 * @return $this
	 */
	public function load($id, $field = null)
	{
		if ($id === null) {
			return $this->noRoutePage();
		}
		return parent::load($id, $field);
	}

	/**
	 * Load No-Route Page
	 *
	 * @return \Plumtree\SocialConnect\Model\Item
	 */
	public function noRoutePage()
	{
		return $this->load(self::NOROUTE_PAGE_ID, $this->getIdFieldName());
	}

	/**
	 * Prepare Item's statuses.
	 * Available event socialconnect_item_get_available_statuses to customize statuses.
	 *
	 * @return array
	 */
	public function getAvailableStatuses()
	{
		return [self::STATUS_ENABLED => __('Yes'), self::STATUS_DISABLED => __('No')];
	}


	/**
	 * Get identities
	 *
	 * @return array
	 */
	public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}


	public function setId($id)
	{
		return $this->setData(self::ITEM_ID, $id);
	}

	public function setTitle($title)
	{
		return $this->setData(self::TITLE, $title);
	}

	public function setDescription($description)
	{
		return $this->setData(self::DESCRIPTION, $description);
	}

	public function setStatus($status)
	{
		return $this->setData(self::STATUS, $status);
	}

	public function setCreatedAt($created_at)
	{
		return $this->setData(self::CREATED_AT, $created_at);
	}


	public function setUpdatedAt($updated_at)
	{
		return $this->setData(self::UPDATED_AT, $updated_at);
	}
	


	public function getId()
	{
		return $this->getData(self::ITEM_ID);
	}

	public function getTitle()
	{
		return $this->getData(self::TITLE);
	}

	public function getDescription()
	{
		return $this->getData(self::DESCRIPTION);
	}

	public function getStatus()
	{
		return $this->getData(self::STATUS);
	}

	public function getCreatedAt()
	{
		return $this->getData(self::CREATED_AT);
	}

	public function getUpdatedAt()
	{
		return $this->getData(self::UPDATED_AT);
	}

	/**
	 * Processing object before save data
	 *
	 * @return $this
	 */
	public function beforeSave(){
		$date = $this->date->gmtDate();
		if( $this->isObjectNew() ){
			$this->setCreatedAt($date);
		}
		$this->setUpdatedAt($date);
		parent::beforeSave();
	}
}


//echo "1234";
//exit;