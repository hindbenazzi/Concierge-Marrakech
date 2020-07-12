<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200711214347 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE residence_images (id INT AUTO_INCREMENT NOT NULL, residence_id_id INT DEFAULT NULL, image_url VARCHAR(255) NOT NULL, INDEX IDX_66F0AC884384A887 (residence_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE residence_images ADD CONSTRAINT FK_66F0AC884384A887 FOREIGN KEY (residence_id_id) REFERENCES private_residence (id)');
        $this->addSql('ALTER TABLE field_images CHANGE fields_id fields_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE private_residence CHANGE size size INT DEFAULT NULL, CHANGE price price DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE requete CHANGE service_id service_id INT DEFAULT NULL, CHANGE starting_on starting_on DATETIME DEFAULT NULL, CHANGE finishing_on finishing_on DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE service CHANGE fields_id fields_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE residence_images');
        $this->addSql('ALTER TABLE field_images CHANGE fields_id fields_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE private_residence CHANGE size size INT DEFAULT NULL, CHANGE price price DOUBLE PRECISION DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE requete CHANGE service_id service_id INT DEFAULT NULL, CHANGE starting_on starting_on DATETIME DEFAULT \'NULL\', CHANGE finishing_on finishing_on DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE service CHANGE fields_id fields_id INT DEFAULT NULL');
    }
}
