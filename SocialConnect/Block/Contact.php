<?php

namespace Plumtree\SocialConnect\Block;

class Contact extends \Magento\Framework\View\Element\Template
{
    /**
     * Construct
     *
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param array $data
     */
    protected function _prepareLayout()
    {

        $this->setMessage('Personal Information');

    }
    public function getFormAction()
    {
            // compagnymodule is given in routes.xml
            // controller_name is folder name inside controller folder
            // action is php file name inside above controller_name folder

        return '/socialconnect/form/contact';
    }
    
}