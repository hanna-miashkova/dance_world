<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200411113614 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE umiejetnosci (id INT AUTO_INCREMENT NOT NULL, nazwa_umiejetnosci VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE uzytkownik_umiejetnosci (uzytkownik_id INT NOT NULL, umiejetnosci_id INT NOT NULL, INDEX IDX_A9A347DA31D6FDE9 (uzytkownik_id), INDEX IDX_A9A347DAFCD79891 (umiejetnosci_id), PRIMARY KEY(uzytkownik_id, umiejetnosci_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE uzytkownik_umiejetnosci ADD CONSTRAINT FK_A9A347DA31D6FDE9 FOREIGN KEY (uzytkownik_id) REFERENCES uzytkownik (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE uzytkownik_umiejetnosci ADD CONSTRAINT FK_A9A347DAFCD79891 FOREIGN KEY (umiejetnosci_id) REFERENCES umiejetnosci (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE uzytkownik ADD info VARCHAR(1000) DEFAULT NULL, CHANGE roles roles JSON NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE uzytkownik_umiejetnosci DROP FOREIGN KEY FK_A9A347DAFCD79891');
        $this->addSql('DROP TABLE umiejetnosci');
        $this->addSql('DROP TABLE uzytkownik_umiejetnosci');
        $this->addSql('ALTER TABLE uzytkownik DROP info, CHANGE roles roles LONGTEXT NOT NULL COLLATE utf8mb4_bin');
    }
}
