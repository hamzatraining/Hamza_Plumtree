<?php 
/**
 * Copyright © 2016 Magento. All rights reserved.
* See COPYING.txt for license details.
*/
namespace Plumtree\SocialConnect\Model\ResourceModel\Item;

use Plumtree\SocialConnect\Api\Data\ItemInterface;
use Plumtree\SocialConnect\Model\ResourceModel\AbstractCollection;

/**
 * SocialConnect Item collection
 */
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	/**
	 * @var string
	 */
	protected $_idFieldName = 'item_id';

	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('Plumtree\SocialConnect\Model\Item', 'Plumtree\SocialConnect\Model\ResourceModel\Item');
	}
}

?>

