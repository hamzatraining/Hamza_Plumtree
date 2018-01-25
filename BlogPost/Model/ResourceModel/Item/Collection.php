<?php 
/**
 * Copyright © 2016 Magento. All rights reserved.
* See COPYING.txt for license details.
*/
namespace Plumtree\BlogPost\Model\ResourceModel\Item;

use Plumtree\BlogPost\Api\Data\ItemInterface;
use Plumtree\BlogPost\Model\ResourceModel\AbstractCollection;

/**
 * BlogPost Item collection
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
		$this->_init('Plumtree\BlogPost\Model\Item', 'Plumtree\BlogPost\Model\ResourceModel\Item');
	}
}

?>