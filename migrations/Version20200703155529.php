<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200703155529 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE field_image ADD fields_id INT NOT NULL');
        $this->addSql('ALTER TABLE field_image ADD CONSTRAINT FK_EE9A92A42C5439AE FOREIGN KEY (fields_id) REFERENCES Fields (id)');
        $this->addSql('CREATE INDEX IDX_EE9A92A42C5439AE ON field_image (fields_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE field_image DROP FOREIGN KEY FK_EE9A92A42C5439AE');
        $this->addSql('DROP INDEX IDX_EE9A92A42C5439AE ON field_image');
        $this->addSql('ALTER TABLE field_image DROP fields_id');
    }
}
