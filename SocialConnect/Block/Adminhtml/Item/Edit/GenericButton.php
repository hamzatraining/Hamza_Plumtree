<?php
/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Plumtree\SocialConnect\Block\Adminhtml\Item\Edit;

use Magento\Backend\Block\Widget\Context;
use Plumtree\SocialConnect\Api\ItemRepositoryInterface;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Class GenericButton
 */
class GenericButton
{
    /**
     * @var Context
     */
    protected $context;

    /**
     * @var ItemRepositoryInterface
     */
    protected $itemRepositoryInterface;

    /**
     * @param Context $context
     * @param ItemRepositoryInterface $itemRepositoryInterface
     */
    public function __construct(
        Context $context,
    	ItemRepositoryInterface $itemRepositoryInterface
    ){
        $this->context = $context;
        $this->itemRepositoryInterface = $itemRepositoryInterface;
    }

    /**
     * Return SocialConnect ID
     *
     * @return int|null
     */
    public function getItemId()
    {
        return $this->context->getRequest()->getParam('id', null);
    }

    /**
     * Generate url by route and parameters
     *
     * @param   string $route
     * @param   array $params
     * @return  string
     */
    public function getUrl($route = '', $params = [])
    {
        return $this->context->getUrlBuilder()->getUrl($route, $params);
    }
}
