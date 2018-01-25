<?php
namespace Plumtree\SocialConnect\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface {
	public function install (
		SchemaSetupInterface $setup,
		ModuleContextInterface $context
	){
		$installer = $setup;
		$installer->startSetup();
		if(!$installer->tableExists("plumtree_socialconnect_item"))
		{
			$table = $installer->getConnection()->newTable(
				$installer->getTable("plumtree_socialconnect_item")
				)->addColumn(
					"item_id",
					\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
					null,
					[
						"idntity"  =>true,
						"nullable" =>false,
						"primary"  =>true,
						"unsigned" =>true,
					],
					'Primary key'

				)->addColumn(
                'title',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                [
                    "nullable" => true, 
                    "default"  => null
                ],
                "Title"

            )->addColumn(
                'description',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                [    "nullable" => true, 
                     "default"  => null
                ],
                "Description"

            )->addColumn(
                "status",
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                1,
                [ 
                    "default" => 0 
                ],
                "Status"

            )->addColumn(
                "sort_order",
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                1,
                [ 
                    "required" => true,
                    "class"    => 'validate-number'
                ],
                "sort_order"    

            )->addColumn(
                "created_at",
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                null,
                [],
                "Created Date"

            )->addColumn(
                "updated_at",
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                null,
                [],
                "Updated Date"

            )->SetComment("SocialConnect Table");
            $installer->getConnection()->createTable($table);		}
		$installer->endSetup();
	}
}