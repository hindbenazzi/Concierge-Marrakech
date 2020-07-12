<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200711192519 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE private_residence (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, adress LONGTEXT NOT NULL, size INT DEFAULT NULL, description LONGTEXT DEFAULT NULL, facilities LONGTEXT DEFAULT NULL, main_image_url VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE field_images CHANGE fields_id fields_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE requete CHANGE service_id service_id INT DEFAULT NULL, CHANGE starting_on starting_on DATETIME DEFAULT NULL, CHANGE finishing_on finishing_on DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE service CHANGE fields_id fields_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE private_residence');
        $this->addSql('ALTER TABLE field_images CHANGE fields_id fields_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE requete CHANGE service_id service_id INT DEFAULT NULL, CHANGE starting_on starting_on DATETIME DEFAULT \'NULL\', CHANGE finishing_on finishing_on DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE service CHANGE fields_id fields_id INT DEFAULT NULL');
    }
}
