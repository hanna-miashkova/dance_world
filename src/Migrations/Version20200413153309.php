<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200413153309 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE uzytkownik ADD imie VARCHAR(255) NOT NULL, ADD nazwisko VARCHAR(255) NOT NULL, ADD email VARCHAR(255) NOT NULL, ADD plec VARCHAR(10) NOT NULL, CHANGE roles roles JSON NOT NULL, CHANGE info info VARCHAR(1000) DEFAULT NULL, CHANGE zdjecie zdjecie VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE uzytkownik DROP imie, DROP nazwisko, DROP email, DROP plec, CHANGE roles roles LONGTEXT NOT NULL COLLATE utf8mb4_bin, CHANGE info info VARCHAR(1000) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE zdjecie zdjecie VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
    }
}
