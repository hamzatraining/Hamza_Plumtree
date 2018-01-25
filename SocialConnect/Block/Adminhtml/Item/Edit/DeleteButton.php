<?php
/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Plumtree\SocialConnect\Block\Adminhtml\Item\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * Class DeleteButton
 */
class DeleteButton extends GenericButton implements ButtonProviderInterface
{

    /**
     * @return array
     */
    public function getButtonData()
    {
        $data = [];
        if( $this->getItemId() ){
        	$data = [
        		'label' => __('Delete Item'),
        		'class' => 'delete',
        		'on_click' => 'deleteConfirm(\'' . __(
        				'Are you sure you want to do this?'
        			) . '\', \'' . $this->getDeleteUrl() . '\')',
        		'sort_order' => 20,
        	];
        }
        
        return $data;
    }

    /**
     * @return string
     */
    public function getDeleteUrl()
    {
        return $this->getUrl('*/*/delete', ['id' => $this->getItemId()]);
    }
}
