<?php

namespace Esgi\Storelocator\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * @codeCoverageIgnore
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @throws \Zend_Db_Exception
     */

    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        /**
         * Create table 'esgi_stores'
         */

        if (!$setup->getConnection()->isTableExists($setup->getTable('esgi_stores'))) {
            $table = $setup->getConnection()
                ->newTable($setup->getTable('esgi_stores'))
                ->addColumn(
                    'id',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    null,
                    [
                        'identity' => true, 
                        'unsigned' => true, 
                        'nullable' => false, 
                        'primary' => true
                    ],
                    'Stores ID'
                )
                ->addColumn(
                    'name',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    100,
                    [
                        'nullable' => false, 
                        'default' => 'simple'
                    ],
                    'Name'
                )
                ->addColumn(
                    'email',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    100,
                    [
                        'nullable' => false, 
                        'default' => 'simple'
                    ],
                    'Email'
                )
                ->setComment('Esgi Stores Table')
                ->setOption('type', 'InnoDB')
                ->setOption('charset', 'utf8');

            $setup->getConnection()->createTable($table);
        }
        $setup->endSetup();
    }
}