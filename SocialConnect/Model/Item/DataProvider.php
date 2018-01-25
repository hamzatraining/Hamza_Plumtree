<?php
/**
 * Copyright © 2016 Magento. All rights reserved.
* See COPYING.txt for license details.
*/
namespace Plumtree\SocialConnect\Model\Item;

use Plumtree\SocialConnect\Model\ResourceModel\Item\CollectionFactory;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\View\Asset\Repository as AssetRepository;

/**
 * Class DataProvider
 */
class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
	/**
	 * @var \Magento\Cms\Model\ResourceModel\Page\Collection
	 */
	protected $collection;

	/**
	 * @var DataPersistorInterface
	 */
	protected $dataPersistor;

	/**
	 * @var array
	 */
	protected $loadedData;
	
	/**
	 * @var array
	 */
	protected $storeManagerInterface;
	
	/**
	 * @var \Magento\Framework\View\Asset\Repository
	 */
	protected $_assetRepo;

	/**
	 * @param string $name
	 * @param string $primaryFieldName
	 * @param string $requestFieldName
	 * @param CollectionFactory $pageCollectionFactory
	 * @param DataPersistorInterface $dataPersistor
	 * @param array $meta
	 * @param array $data
	 */
	public function __construct(
		$name,
		$primaryFieldName,
		$requestFieldName,
		CollectionFactory $pageCollectionFactory,
		DataPersistorInterface $dataPersistor,
		StoreManagerInterface $storeManagerInterface,
		AssetRepository $assetRepo,
		array $meta = [],
		array $data = []
	) {
		$this->collection = $pageCollectionFactory->create();
		$this->dataPersistor = $dataPersistor;
		parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
		$this->meta = $this->prepareMeta($this->meta);
		$this->storeManagerInterface = $storeManagerInterface;
		$this->_assetRepo = $assetRepo;
	}

	/**
	 * Prepares Meta
	 *
	 * @param array $meta
	 * @return array
	 */
	public function prepareMeta(array $meta)
	{
		return $meta;
	}

	/**
	 * Get data
	 *
	 * @return array
	 */
	public function getData()
	{
		if (isset($this->loadedData)) {
			return $this->loadedData;
		}
		$items = $this->collection->getItems();
		/** @var $page \Magento\Cms\Model\Page */
		foreach ($items as $page) {
			$data = $page->getData();
			$mediaUrl = $this->storeManagerInterface->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
			if( $page->getData("title_image") != null){
				$name = ltrim(strrchr($page->getData("title_image"), "/"), "/");
				$title_image[0]['name'] = $name;
				$title_image[0]['url'] = $mediaUrl . $page->getData("title_image");
				$data["title_image"] = $title_image;
				
				
			}
			
			if( $page->getData("image_desktop") != null){
				$name = ltrim(strrchr($page->getData("image_desktop"), "/"), "/");
				$image_desktop[0]['name'] = $name;
				$image_desktop[0]['url'] = $mediaUrl . $page->getData("image_desktop");
				$data["image_desktop"] = $image_desktop;
			}
			
			if( $page->getData("image_mobile") != null){
				$name = ltrim(strrchr($page->getData("image_mobile"), "/"), "/");
				$image_mobile[0]['name'] = $name;
				$image_mobile[0]['url'] = $mediaUrl . $page->getData("image_mobile");
				$data["image_mobile"] = $image_mobile;
			}
			$this->loadedData[$page->getId()] = $data;
		}
		$data = $this->dataPersistor->get('socialconnect_item');
		if (!empty($data)) {
			$page = $this->collection->getNewEmptyItem();
			$page->setData($data);
			$this->loadedData[$page->getId()] = $page->getData();
			$this->dataPersistor->clear('socialconnect_item');
		}
		
		return $this->loadedData;
	}
}
