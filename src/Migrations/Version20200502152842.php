<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200502152842 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE miasto (id INT AUTO_INCREMENT NOT NULL, nazwa_miasta VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE szkola (id INT AUTO_INCREMENT NOT NULL, miasto_szkoly_id INT NOT NULL, nazwa_szkoly VARCHAR(255) NOT NULL, opis_krotki LONGTEXT NOT NULL, pelny_opis LONGTEXT DEFAULT NULL, strona VARCHAR(255) NOT NULL, INDEX IDX_D347AFD85371302 (miasto_szkoly_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE umiejetnosci (id INT AUTO_INCREMENT NOT NULL, nazwa_umiejetnosci VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE uzytkownik (id INT AUTO_INCREMENT NOT NULL, nazwa_uzytkownika VARCHAR(180) NOT NULL, roles JSON NOT NULL, haslo VARCHAR(64) NOT NULL, info VARCHAR(1000) DEFAULT NULL, zdjecie VARCHAR(255) DEFAULT NULL, imie VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, plec VARCHAR(10) NOT NULL, UNIQUE INDEX UNIQ_9EF018561EDA31DC (nazwa_uzytkownika), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE uzytkownik_umiejetnosci (uzytkownik_id INT NOT NULL, umiejetnosci_id INT NOT NULL, INDEX IDX_A9A347DA31D6FDE9 (uzytkownik_id), INDEX IDX_A9A347DAFCD79891 (umiejetnosci_id), PRIMARY KEY(uzytkownik_id, umiejetnosci_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE szkola ADD CONSTRAINT FK_D347AFD85371302 FOREIGN KEY (miasto_szkoly_id) REFERENCES miasto (id)');
        $this->addSql('ALTER TABLE uzytkownik_umiejetnosci ADD CONSTRAINT FK_A9A347DA31D6FDE9 FOREIGN KEY (uzytkownik_id) REFERENCES uzytkownik (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE uzytkownik_umiejetnosci ADD CONSTRAINT FK_A9A347DAFCD79891 FOREIGN KEY (umiejetnosci_id) REFERENCES umiejetnosci (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE szkola DROP FOREIGN KEY FK_D347AFD85371302');
        $this->addSql('ALTER TABLE uzytkownik_umiejetnosci DROP FOREIGN KEY FK_A9A347DAFCD79891');
        $this->addSql('ALTER TABLE uzytkownik_umiejetnosci DROP FOREIGN KEY FK_A9A347DA31D6FDE9');
        $this->addSql('DROP TABLE miasto');
        $this->addSql('DROP TABLE szkola');
        $this->addSql('DROP TABLE umiejetnosci');
        $this->addSql('DROP TABLE uzytkownik');
        $this->addSql('DROP TABLE uzytkownik_umiejetnosci');
    }
}
