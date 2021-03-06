<?php
/**
 * Copyright © 2016 Magento. All rights reserved.
* See COPYING.txt for license details.
*/
namespace Plumtree\BlogPost\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

/**
 * BlogPost item CRUD interface.
 * @api
 */
interface ItemRepositoryInterface
{
	/**
	 * Save Item.
	 *
	 * @param \Plumtree\BlogPost\Api\Data\ItemInterface $item
	 * @return \Plumtree\BlogPost\Api\Data\ItemInterface
	 * @throws \Magento\Framework\Exception\LocalizedException
	 */
	public function save(\Plumtree\BlogPost\Api\Data\ItemInterface $item);

	/**
	 * Retrieve item
	 *
	 * @param int $item_id
	 * @return \Plumtree\BlogPost\Api\Data\ItemInterface
	 * @throws \Magento\Framework\Exception\LocalizedException
	 */
	public function getById($item_id);

	/**
	 * Retrieve Item matching the specified criteria.
	 *
	 * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
	 * @return \Plumtree\BlogPost\Api\Data\PageSearchResultsInterface
	 * @throws \Magento\Framework\Exception\LocalizedException
	 */
	public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

	/**
	 * Delete Item
	 *
	 * @param \Plumtree\BlogPost\Api\Data\ItemInterface $item
	 * @return bool true on success
	 * @throws \Magento\Framework\Exception\LocalizedException
	 */
	public function delete(\Plumtree\BlogPost\Api\Data\ItemInterface $item);

	/**
	 * Delete Item by id
	 *
	 * @param int $item_id
	 * @return bool true on success
	 * @throws \Magento\Framework\Exception\NoSuchEntityException
	 * @throws \Magento\Framework\Exception\LocalizedException
	 */
	public function deleteById($item_id);
}
