<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200509235336 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE szkola_umiejetnosci (szkola_id INT NOT NULL, umiejetnosci_id INT NOT NULL, INDEX IDX_EEAD390624FCD57E (szkola_id), INDEX IDX_EEAD3906FCD79891 (umiejetnosci_id), PRIMARY KEY(szkola_id, umiejetnosci_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE szkola_umiejetnosci ADD CONSTRAINT FK_EEAD390624FCD57E FOREIGN KEY (szkola_id) REFERENCES szkola (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE szkola_umiejetnosci ADD CONSTRAINT FK_EEAD3906FCD79891 FOREIGN KEY (umiejetnosci_id) REFERENCES umiejetnosci (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE szkola ADD zdjecie VARCHAR(50) NOT NULL, ADD wideo VARCHAR(50) DEFAULT NULL, ADD kontakt VARCHAR(30) DEFAULT NULL, ADD godziny_kontakt VARCHAR(50) DEFAULT NULL, ADD adres VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE uzytkownik CHANGE roles roles JSON NOT NULL, CHANGE info info VARCHAR(1000) DEFAULT NULL, CHANGE zdjecie zdjecie VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE szkola_umiejetnosci');
        $this->addSql('ALTER TABLE szkola DROP zdjecie, DROP wideo, DROP kontakt, DROP godziny_kontakt, DROP adres');
        $this->addSql('ALTER TABLE uzytkownik CHANGE roles roles LONGTEXT NOT NULL COLLATE utf8mb4_bin, CHANGE info info VARCHAR(1000) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE zdjecie zdjecie VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
    }
}
