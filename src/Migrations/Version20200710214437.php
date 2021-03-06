<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200710214437 extends AbstractMigration
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
        $this->addSql('ALTER TABLE partners ADD image_url VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE requete CHANGE service_id service_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE service CHANGE fields_id fields_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE field_images CHANGE fields_id fields_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE partners DROP image_url');
        $this->addSql('ALTER TABLE requete CHANGE service_id service_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE service CHANGE fields_id fields_id INT DEFAULT NULL');
    }
}
