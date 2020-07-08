<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200708145637 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE service (id INT AUTO_INCREMENT NOT NULL, field_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, INDEX IDX_E19D9AD2443707B0 (field_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE service ADD CONSTRAINT FK_E19D9AD2443707B0 FOREIGN KEY (field_id) REFERENCES Fields (id)');
        $this->addSql('ALTER TABLE fields ADD field_form_image LONGBLOB DEFAULT NULL');
        $this->addSql('ALTER TABLE luxury_cars CHANGE id id INT AUTO_INCREMENT NOT NULL, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE partners ADD website VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE service');
        $this->addSql('ALTER TABLE Fields DROP field_form_image');
        $this->addSql('ALTER TABLE luxury_cars MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE luxury_cars DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE luxury_cars CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE partners DROP website');
    }
}
