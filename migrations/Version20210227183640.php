<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210227183640 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE seller (id INT AUTO_INCREMENT NOT NULL, seller_id VARCHAR(255) NOT NULL, is_confidential TINYINT(1) DEFAULT \'0\' NOT NULL, seller_type VARCHAR(100) NOT NULL, is_passthrough TINYINT(1) DEFAULT \'0\' NOT NULL, name VARCHAR(255) DEFAULT NULL, domain VARCHAR(100) DEFAULT NULL, comment VARCHAR(255) DEFAULT NULL, ext VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE seller');
    }
}
