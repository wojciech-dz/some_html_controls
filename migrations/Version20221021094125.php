<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221021094125 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE clients (id INT AUTO_INCREMENT NOT NULL, nip VARCHAR(10) NOT NULL, regon VARCHAR(9) NOT NULL, name VARCHAR(255) NOT NULL, vat TINYINT(1) NOT NULL, street VARCHAR(100) NOT NULL, house_no VARCHAR(10) DEFAULT NULL, flat_no VARCHAR(10) DEFAULT NULL, first_contact_date DATETIME NOT NULL, comments LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE delegations (id INT AUTO_INCREMENT NOT NULL, employee_id INT NOT NULL, date_from DATETIME NOT NULL, date_to DATETIME NOT NULL, start VARCHAR(100) NOT NULL, finish VARCHAR(100) NOT NULL, INDEX IDX_2824FDAD8C03F15C (employee_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employees (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, surname VARCHAR(100) NOT NULL, position VARCHAR(100) NOT NULL, start_date DATETIME NOT NULL, holiday INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE delegations ADD CONSTRAINT FK_2824FDAD8C03F15C FOREIGN KEY (employee_id) REFERENCES employees (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE delegations DROP FOREIGN KEY FK_2824FDAD8C03F15C');
        $this->addSql('DROP TABLE clients');
        $this->addSql('DROP TABLE delegations');
        $this->addSql('DROP TABLE employees');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
