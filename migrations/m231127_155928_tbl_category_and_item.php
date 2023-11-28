<?php

use yii\db\Migration;

/**
 * Class m231127_155928_tbl_category_and_item
 */
class m231127_155928_tbl_category_and_item extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('category', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer(),
            'name' => $this->string(255)->notNull(),
        ]);

        $this->addForeignKey(
            'category_parent',
            'category',
            'parent_id',
            'category',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->createTable('product', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'description' => $this->text()->notNull(),
        ]);

        $this->createTable('product_category', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->notNull(),
            'category_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'product_category_product',
            'product_category',
            'product_id',
            'product',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            'product_category_category',
            'product_category',
            'category_id',
            'category',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->createIndex(
            'product_category_unique2',
            'product_category',
            'product_id, category_id',
            true
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('product_category');
        $this->dropTable('category');
        $this->dropTable('product');
    }
}
