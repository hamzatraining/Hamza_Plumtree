<?php
/**
 * Copyright © 2016 Magento. All rights reserved.
* See COPYING.txt for license details.
*/
namespace Plumtree\SocialConnect\Model;

use Plumtree\SocialConnect\Api\Data;
use Plumtree\SocialConnect\Api\ItemRepositoryInterface;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Plumtree\SocialConnect\Model\ResourceModel\Item as ResourceItem;
use Plumtree\SocialConnect\Model\ResourceModel\Item\CollectionFactory as ItemCollectionFactory;
use Magento\Store\Model\StoreManagerInterface;

/**
 * Class ItemRepository
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class ItemRepository implements ItemRepositoryInterface
{
	/**
	 * @var ResourceItem
	 */
	protected $resource;

	/**
	 * @var ItemFactory
	 */
	protected $itemFactory;

	/**
	 * @var ItemCollectionFactory
	 */
	protected $itemCollectionFactory;

	/**
	 * @var DataObjectHelper
	 */
	protected $dataObjectHelper;

	/**
	 * @var DataObjectProcessor
	 */
	protected $dataObjectProcessor;

	/**
	 * @var \Plumtree\SocialConnect\Api\Data\ItemInterfaceFactory
	 */
	protected $dataItemFactory;

	/**
	 * @var \Magento\Store\Model\StoreManagerInterface
	 */
	private $storeManager;

	/**
	 * @param ResourcePage $resource
	 * @param PageFactory $pageFactory
	 * @param Data\PageInterfaceFactory $dataPageFactory
	 * @param PageCollectionFactory $pageCollectionFactory
	 * @param Data\PageSearchResultsInterfaceFactory $searchResultsFactory
	 * @param DataObjectHelper $dataObjectHelper
	 * @param DataObjectProcessor $dataObjectProcessor
	 * @param StoreManagerInterface $storeManager
	 */
	public function __construct(
		ResourceItem $resource,
		ItemFactory $itemFactory,
		Data\ItemInterfaceFactory $dataItemFactory,
		ItemCollectionFactory $itemCollectionFactory,
		DataObjectHelper $dataObjectHelper,
		DataObjectProcessor $dataObjectProcessor,
		StoreManagerInterface $storeManager
	){
		$this->resource = $resource;
		$this->itemFactory = $itemFactory;
		$this->itemCollectionFactory = $itemCollectionFactory;
		$this->dataObjectHelper = $dataObjectHelper;
		$this->dataItemFactory = $dataItemFactory;
		$this->dataObjectProcessor = $dataObjectProcessor;
		$this->storeManager = $storeManager;
	}

	/**
	 * Save Item Data
	 *
	 * @param \Plumtree\SocialConnect\Api\Data\ItemInterface $item
	 * @return Page
	 * @throws CouldNotSaveException
	 */
	public function save(\Plumtree\SocialConnect\Api\Data\ItemInterface $item)
	{
		return $item;
	}

//echo "1234";
//exit;

	/**
	 * Load Page data by given Page Identity
	 *
	 * @param string $pageId
	 * @return Page
	 * @throws \Magento\Framework\Exception\NoSuchEntityException
	 */
	public function getById($itemId)
	{
		$item = $this->itemFactory->create();
		$this->resource->load($item, $itemId);
		if (!$item->getId()) {
			throw new NoSuchEntityException(__('Item with id "%1" does not exist.', $itemId));
		}
		return $item;
	}

	/**
	 * Load Page data collection by given search criteria
	 *
	 * @SuppressWarnings(PHPMD.CyclomaticComplexity)
	 * @SuppressWarnings(PHPMD.NPathComplexity)
	 * @param \Magento\Framework\Api\SearchCriteriaInterface $criteria
	 * @return \Magento\Cms\Model\ResourceModel\Page\Collection
	 */
	public function getList(\Magento\Framework\Api\SearchCriteriaInterface $criteria)
	{
		return $searchResults;
	}

	/**
	 * Delete Item
	 *
	 * @param \Plumtree\SocialConnect\Api\Data\ItemInterface $item
	 * @return bool
	 * @throws CouldNotDeleteException
	 */
	public function delete(\Plumtree\SocialConnect\Api\Data\ItemInterface $item)
	{
		return true;
	}

	/**
	 * Delete Item by given Id
	 *
	 * @param string $item_id
	 * @return bool
	 * @throws CouldNotDeleteException
	 * @throws NoSuchEntityException
	 */
	public function deleteById($item)
	{
		return $this->delete($this->getById($item));
	}
}
