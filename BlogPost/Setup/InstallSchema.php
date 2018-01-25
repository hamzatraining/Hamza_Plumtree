<?php
namespace Plumtree\BlogPost\Setup;

use \Magento\Framework\Setup\InstallSchemaInterface;
use \Magento\Framework\Setup\ModuleContextInterface;
use \Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface {
    public function install(
        SchemaSetupInterface $setup,
        ModuleContextInterface $context
    ){
        $installer = $setup;
        $installer->startSetup();
        if( !$installer->tableExists("plumtree_blogpost_item") )
        {
            $table = $installer->getConnection()->newTable(
                $installer->getTable("plumtree_blogpost_item")
            )->addColumn(
                "item_id",
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                [
                    "identity"  => true,
                    "nullable"  => false,
                    "primary"   => true,
                    "unsigned"  => true
                ],
                'BlogPost Primary Key'
            )->addColumn(
                'title',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ["nullable" => true, "default" => null],
                "BlogPost Title"
            )->addColumn(
                'description',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                ["nullable" => true, "default" => null],
                "BlogPost Description"
            )->addColumn(
                "status",
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                1,
                [ "default" => 0 ],
                "BlogPost Status"
            )->addColumn(
                "created_at",
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                null,
                [],
                "BlogPost Created Date"
            )->addColumn(
                "updated_at",
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                null,
                [],
                "BlogPost Updated Date"
            )->setComment("BlogPost Table");
            $installer->getConnection()->createTable($table);
        }
        $installer->endSetup();
    }
}
