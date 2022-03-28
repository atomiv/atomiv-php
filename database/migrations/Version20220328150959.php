<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;
use LaravelDoctrine\Migrations\Schema\Table;
use LaravelDoctrine\Migrations\Schema\Builder;

class Version20220328150959 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema): void
    {
        (new Builder($schema))->create('order_items', function (Table $table) {
            $table->increments('id');
            $table->unsignedInteger('order_id');
            $table->unsignedInteger('product_id');
            $table->string('product_code',32);
            $table->decimal('product_price',12,2);
            $table->integer('quantity');
            $table->foreign('orders','order_id');
            $table->foreign('products','product_id');
        });
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema): void
    {
        (new Builder($schema))->drop('order_items');
    }
}
