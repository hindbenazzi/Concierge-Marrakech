<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200711022812 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE field_images (id INT AUTO_INCREMENT NOT NULL, fields_id INT DEFAULT NULL, image_url VARCHAR(255) NOT NULL, INDEX IDX_CA5B32682C5439AE (fields_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fields (id INT AUTO_INCREMENT NOT NULL, field_name VARCHAR(255) NOT NULL, field_picture_url VARCHAR(255) NOT NULL, field_form_image_url VARCHAR(255) NOT NULL, contenue LONGTEXT NOT NULL, field_desc LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lux (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE luxury_cars (id INT AUTO_INCREMENT NOT NULL, cars_img LONGBLOB NOT NULL, cars_desc LONGTEXT NOT NULL, title VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE partners (id INT AUTO_INCREMENT NOT NULL, partner_name VARCHAR(255) NOT NULL, partner_image LONGBLOB NOT NULL, website VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE private_palace (id INT AUTO_INCREMENT NOT NULL, photo LONGBLOB NOT NULL, title VARCHAR(255) NOT NULL, price VARCHAR(255) NOT NULL, area VARCHAR(255) NOT NULL, number_of_pieces LONGTEXT NOT NULL, other_characteristics LONGTEXT NOT NULL, address LONGTEXT NOT NULL, img_url VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE requete (id INT AUTO_INCREMENT NOT NULL, service_id INT DEFAULT NULL, full_name VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, message LONGTEXT NOT NULL, INDEX IDX_1E6639AAED5CA9E6 (service_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ruequete (id INT AUTO_INCREMENT NOT NULL, full_name VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, message LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service (id INT AUTO_INCREMENT NOT NULL, fields_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, INDEX IDX_E19D9AD22C5439AE (fields_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tea (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE testimonials (id INT AUTO_INCREMENT NOT NULL, client VARCHAR(255) NOT NULL, client_position VARCHAR(255) NOT NULL, testimonial LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE field_images ADD CONSTRAINT FK_CA5B32682C5439AE FOREIGN KEY (fields_id) REFERENCES fields (id)');
        $this->addSql('ALTER TABLE requete ADD CONSTRAINT FK_1E6639AAED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id)');
        $this->addSql('ALTER TABLE service ADD CONSTRAINT FK_E19D9AD22C5439AE FOREIGN KEY (fields_id) REFERENCES fields (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE field_images DROP FOREIGN KEY FK_CA5B32682C5439AE');
        $this->addSql('ALTER TABLE service DROP FOREIGN KEY FK_E19D9AD22C5439AE');
        $this->addSql('ALTER TABLE requete DROP FOREIGN KEY FK_1E6639AAED5CA9E6');
        $this->addSql('DROP TABLE field_images');
        $this->addSql('DROP TABLE fields');
        $this->addSql('DROP TABLE lux');
        $this->addSql('DROP TABLE luxury_cars');
        $this->addSql('DROP TABLE partners');
        $this->addSql('DROP TABLE private_palace');
        $this->addSql('DROP TABLE requete');
        $this->addSql('DROP TABLE ruequete');
        $this->addSql('DROP TABLE service');
        $this->addSql('DROP TABLE tea');
        $this->addSql('DROP TABLE testimonials');
    }
}
