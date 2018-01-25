<?php
/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Plumtree\SocialConnect\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class UpgradeSchema  implements UpgradeSchemaInterface

{
   public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
   {
   		if (version_compare($context->getVersion(), '0.0.1', '<')){
   			$installer = $setup;
            $installer->startSetup();
            $tableName = $setup->getTable('plumtree_socialconnect_item');
            if ($setup->getConnection()->isTableExists($tableName) == true)
            {
                $column = [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    'length' => 11,
                    'nullable' => false,
                    'after' => 'description',
                    'comment' => 'Sort Order',
                    'type' => 'number',
                    'class'    => 'validate-number',
                    'default' => 0
                ];
                $installer->getConnection()->addColumn($tableName, 'sort_order', $column);
            }
            $installer->endSetup();
   		}
   }

}