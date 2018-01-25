<?php
namespace Plumtree\SocialConnect\Ui\Component\Item\Listing\Columns;

use Magento\Framework\Data\OptionSourceInterface;
use Plumtree\SocialConnect\Model\Item as Options;

class Status implements OptionSourceInterface
{
	protected $options;

	public function __construct(Options $options){
		$this->options = $options;
	}

	public function toOptionArray(){
		$options = $this->options->getAvailableStatuses();
		$optionArray = array();
		foreach ($options as $key => $value){
			$optionArray[] = ["label" => $value, "value" => $key];
		}
		return $optionArray;
	}
}
?>
