<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200713110621 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE field_images CHANGE fields_id fields_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE private_residence CHANGE size size DOUBLE PRECISION DEFAULT NULL, CHANGE price price DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE requete CHANGE service_id service_id INT DEFAULT NULL, CHANGE starting_on starting_on DATETIME DEFAULT NULL, CHANGE finishing_on finishing_on DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE requete_personalisable CHANGE residence_id_id residence_id_id INT DEFAULT NULL, CHANGE starting_on starting_on DATETIME DEFAULT NULL, CHANGE finishing_on finishing_on DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE residence_images CHANGE residence_id_id residence_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE service CHANGE fields_id fields_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE field_images CHANGE fields_id fields_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE private_residence CHANGE size size INT DEFAULT NULL, CHANGE price price DOUBLE PRECISION DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE requete CHANGE service_id service_id INT DEFAULT NULL, CHANGE starting_on starting_on DATETIME DEFAULT \'NULL\', CHANGE finishing_on finishing_on DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE requete_personalisable CHANGE residence_id_id residence_id_id INT DEFAULT NULL, CHANGE starting_on starting_on DATETIME DEFAULT \'NULL\', CHANGE finishing_on finishing_on DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE residence_images CHANGE residence_id_id residence_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE service CHANGE fields_id fields_id INT DEFAULT NULL');
    }
}
