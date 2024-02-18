<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240216170224 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(30) NOT NULL, message LONGTEXT NOT NULL, stars INT NOT NULL, is_valid TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, last_name VARCHAR(20) NOT NULL, first_name VARCHAR(20) NOT NULL, email VARCHAR(50) NOT NULL, phone VARCHAR(255) NOT NULL, message LONGTEXT NOT NULL, aboutvehicle VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image_gallery (id INT AUTO_INCREMENT NOT NULL, vehicle_id_id INT NOT NULL, image_name VARCHAR(255) DEFAULT NULL, image_size INT DEFAULT NULL, updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_D23B2FE61DEB1EBB (vehicle_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE legal_notice (id INT AUTO_INCREMENT NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE open_day (id INT AUTO_INCREMENT NOT NULL, monday_am_begin TIME DEFAULT NULL, monday_am_finish TIME DEFAULT NULL, monday_pm_begin TIME DEFAULT NULL, monday_pm_finish TIME DEFAULT NULL, tuesday_am_begin TIME DEFAULT NULL, tuesday_am_finish TIME DEFAULT NULL, tuesday_pm_begin TIME DEFAULT NULL, tuesday_pm_finish TIME DEFAULT NULL, wednesday_am_begin TIME DEFAULT NULL, wednesday_am_finish TIME DEFAULT NULL, wednesday_pm_begin TIME DEFAULT NULL, wednesday_pm_finish TIME DEFAULT NULL, thursday_am_begin TIME DEFAULT NULL, thursday_am_finish TIME DEFAULT NULL, thursday_pm_begin TIME DEFAULT NULL, thursday_pm_finish TIME DEFAULT NULL, friday_am_begin TIME DEFAULT NULL, friday_am_finish TIME DEFAULT NULL, friday_pm_begin TIME DEFAULT NULL, friday_pm_finish TIME DEFAULT NULL, saturday_am_begin TIME DEFAULT NULL, saturday_am_finish TIME DEFAULT NULL, saturday_pm_begin TIME DEFAULT NULL, saturday_pm_finish TIME DEFAULT NULL, sunday_am_begin TIME DEFAULT NULL, sunday_am_finish TIME DEFAULT NULL, sunday_pm_begin TIME DEFAULT NULL, sunday_pm_finish TIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE options (id INT AUTO_INCREMENT NOT NULL, vehicle_id_id INT NOT NULL, options VARCHAR(100) NOT NULL, INDEX IDX_D035FA871DEB1EBB (vehicle_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE privacy_policy (id INT AUTO_INCREMENT NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE services (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, price INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicles (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, price INT NOT NULL, years DATE NOT NULL, mileage INT NOT NULL, fuel VARCHAR(15) DEFAULT NULL, gearbox VARCHAR(20) DEFAULT NULL, image_name VARCHAR(255) DEFAULT NULL, image_size INT DEFAULT NULL, updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE image_gallery ADD CONSTRAINT FK_D23B2FE61DEB1EBB FOREIGN KEY (vehicle_id_id) REFERENCES vehicles (id)');
        $this->addSql('ALTER TABLE options ADD CONSTRAINT FK_D035FA871DEB1EBB FOREIGN KEY (vehicle_id_id) REFERENCES vehicles (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE image_gallery DROP FOREIGN KEY FK_D23B2FE61DEB1EBB');
        $this->addSql('ALTER TABLE options DROP FOREIGN KEY FK_D035FA871DEB1EBB');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE image_gallery');
        $this->addSql('DROP TABLE legal_notice');
        $this->addSql('DROP TABLE open_day');
        $this->addSql('DROP TABLE options');
        $this->addSql('DROP TABLE privacy_policy');
        $this->addSql('DROP TABLE services');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE vehicles');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
