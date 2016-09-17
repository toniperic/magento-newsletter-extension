<?php

$installer = $this;

$connection = $installer->getConnection();

$installer->startSetup();


$connection
    ->addColumn($installer->getTable('newsletter/subscriber'),
        'created_at',
        array(
            'type' => Varien_Db_Ddl_Table::TYPE_TIMESTAMP,
            'nullable' => false,
            'default' => Varien_Db_Ddl_Table::TIMESTAMP_INIT,
            'comment' => 'Created At'
        )
    );

$connection->addColumn($installer->getTable('newsletter/subscriber'),
        'confirmed_at',
        array(
            'type' => Varien_Db_Ddl_Table::TYPE_TIMESTAMP,
            'nullable' => true,
            'default' => null,
            'comment' => 'Confirmed At'
        )
    );

$connection->addColumn($installer->getTable('newsletter/subscriber'),
        'unsubscribed_at',
        array(
            'type' => Varien_Db_Ddl_Table::TYPE_TIMESTAMP,
            'nullable' => true,
            'default' => null,
            'comment' => 'Unsubscribed At'
        )
    );

$installer->endSetup();