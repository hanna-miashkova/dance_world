<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200424234045 extends AbstractMigration
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
        $this->addSql('ALTER TABLE szkola ADD miasto_szkoly_id INT NOT NULL, ADD opis_krotki LONGTEXT NOT NULL, DROP miasto_szkoly, DROP krotki_opis');
        $this->addSql('ALTER TABLE szkola ADD CONSTRAINT FK_D347AFD85371302 FOREIGN KEY (miasto_szkoly_id) REFERENCES miasto (id)');
        $this->addSql('CREATE INDEX IDX_D347AFD85371302 ON szkola (miasto_szkoly_id)');
        $this->addSql('ALTER TABLE uzytkownik CHANGE roles roles JSON NOT NULL, CHANGE info info VARCHAR(1000) DEFAULT NULL, CHANGE zdjecie zdjecie VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE szkola DROP FOREIGN KEY FK_D347AFD85371302');
        $this->addSql('DROP TABLE miasto');
        $this->addSql('DROP INDEX IDX_D347AFD85371302 ON szkola');
        $this->addSql('ALTER TABLE szkola ADD miasto_szkoly VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD krotki_opis VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, DROP miasto_szkoly_id, DROP opis_krotki');
        $this->addSql('ALTER TABLE uzytkownik CHANGE roles roles LONGTEXT NOT NULL COLLATE utf8mb4_bin, CHANGE info info VARCHAR(1000) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE zdjecie zdjecie VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
    }
}
