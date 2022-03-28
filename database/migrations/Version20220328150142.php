<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;
use LaravelDoctrine\Migrations\Schema\Table;
use LaravelDoctrine\Migrations\Schema\Builder;

class Version20220328150142 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema): void
    {
        (new Builder($schema))->create('customers', function (Table $table) {
            $table->increments('id');
            $table->string('first_name',32);
            $table->string('last_name',32);
            $table->timestamps();
        });
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema): void
    {
        (new Builder($schema))->drop('customers');
    }
}
