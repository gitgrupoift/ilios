<?php

namespace Ilios\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Adds app and school configuration tables to the schema.
 */
class Version20170202184636 extends AbstractMigration
{
    /**
     * @inheritdoc
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE application_config (session_id INT AUTO_INCREMENT NOT NULL, name VARCHAR(200) NOT NULL, value LONGTEXT NOT NULL, UNIQUE INDEX unique_name (name), PRIMARY KEY(session_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE school_config (session_id INT AUTO_INCREMENT NOT NULL, school_id INT DEFAULT NULL, name VARCHAR(200) NOT NULL, value LONGTEXT NOT NULL, INDEX IDX_29362CB0C32A47EE (school_id), UNIQUE INDEX unique_name (school_id, name), PRIMARY KEY(session_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE school_config ADD CONSTRAINT FK_29362CB0C32A47EE FOREIGN KEY (school_id) REFERENCES school (school_id)');
    }

    /**
     * @inheritdoc
     */
    public function down(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE application_config');
        $this->addSql('DROP TABLE school_config');
    }
}