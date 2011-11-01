<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20111101141042 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $this->addSql("INSERT INTO Thing (value) VALUES ('Hello World')");
    }

    public function down(Schema $schema)
    {
        $this->addSql("DELETE FROM Thing WHERE value = 'Hello World')");
    }
}
