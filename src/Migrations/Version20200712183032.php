<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200712183032 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE private_palace (id INT AUTO_INCREMENT NOT NULL, photo LONGBLOB NOT NULL, title VARCHAR(255) NOT NULL, price VARCHAR(255) NOT NULL, area VARCHAR(255) NOT NULL, number_of_pieces LONGTEXT NOT NULL, other_characteristics LONGTEXT NOT NULL, address LONGTEXT NOT NULL, img_url VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE field_images CHANGE fields_id fields_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE luxury_cars ADD img_url VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE private_residence CHANGE size size INT DEFAULT NULL, CHANGE price price DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE requete CHANGE service_id service_id INT DEFAULT NULL, CHANGE starting_on starting_on DATETIME DEFAULT NULL, CHANGE finishing_on finishing_on DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE requete_personalisable CHANGE residence_id_id residence_id_id INT DEFAULT NULL, CHANGE starting_on starting_on DATETIME DEFAULT NULL, CHANGE finishing_on finishing_on DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE residence_images CHANGE residence_id_id residence_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE service CHANGE fields_id fields_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE private_palace');
        $this->addSql('ALTER TABLE field_images CHANGE fields_id fields_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE luxury_cars DROP img_url');
        $this->addSql('ALTER TABLE private_residence CHANGE size size INT DEFAULT NULL, CHANGE price price DOUBLE PRECISION DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE requete CHANGE service_id service_id INT DEFAULT NULL, CHANGE starting_on starting_on DATETIME DEFAULT \'NULL\', CHANGE finishing_on finishing_on DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE requete_personalisable CHANGE residence_id_id residence_id_id INT DEFAULT NULL, CHANGE starting_on starting_on DATETIME DEFAULT \'NULL\', CHANGE finishing_on finishing_on DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE residence_images CHANGE residence_id_id residence_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE service CHANGE fields_id fields_id INT DEFAULT NULL');
    }
}
