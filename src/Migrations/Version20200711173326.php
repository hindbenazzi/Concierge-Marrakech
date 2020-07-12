<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200711173326 extends AbstractMigration
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
        $this->addSql('ALTER TABLE requete ADD starting_on DATETIME DEFAULT NULL, ADD finishing_on DATETIME DEFAULT NULL, CHANGE service_id service_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE service CHANGE fields_id fields_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE field_images CHANGE fields_id fields_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE requete DROP starting_on, DROP finishing_on, CHANGE service_id service_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE service CHANGE fields_id fields_id INT DEFAULT NULL');
    }
}
