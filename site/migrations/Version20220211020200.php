<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220211020200 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE auteur (id INT AUTO_INCREMENT NOT NULL, nomoupseudo VARCHAR(255) NOT NULL, prenom VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE edition (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, siteweb VARCHAR(255) DEFAULT NULL, info VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lieu (id INT AUTO_INCREMENT NOT NULL, oeuvres_id INT DEFAULT NULL, adresse VARCHAR(255) NOT NULL, latitude DOUBLE PRECISION DEFAULT NULL, longitude DOUBLE PRECISION DEFAULT NULL, INDEX IDX_2F577D594928CE22 (oeuvres_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE oeuvre (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, photo VARCHAR(255) DEFAULT NULL, annee INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE oeuvre_auteur (oeuvre_id INT NOT NULL, auteur_id INT NOT NULL, INDEX IDX_C57F95AE88194DE8 (oeuvre_id), INDEX IDX_C57F95AE60BB6FE6 (auteur_id), PRIMARY KEY(oeuvre_id, auteur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE oeuvre_edition (oeuvre_id INT NOT NULL, edition_id INT NOT NULL, INDEX IDX_EFE3F24488194DE8 (oeuvre_id), INDEX IDX_EFE3F24474281A5E (edition_id), PRIMARY KEY(oeuvre_id, edition_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE serie (id INT AUTO_INCREMENT NOT NULL, oeuvres_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, nbtomes INT NOT NULL, info VARCHAR(255) NOT NULL, INDEX IDX_AA3A93344928CE22 (oeuvres_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_auteur (id INT AUTO_INCREMENT NOT NULL, auteurs_id INT DEFAULT NULL, type VARCHAR(255) NOT NULL, INDEX IDX_268DDA78AE784107 (auteurs_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_oeuvre (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lieu ADD CONSTRAINT FK_2F577D594928CE22 FOREIGN KEY (oeuvres_id) REFERENCES oeuvre (id)');
        $this->addSql('ALTER TABLE oeuvre_auteur ADD CONSTRAINT FK_C57F95AE88194DE8 FOREIGN KEY (oeuvre_id) REFERENCES oeuvre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE oeuvre_auteur ADD CONSTRAINT FK_C57F95AE60BB6FE6 FOREIGN KEY (auteur_id) REFERENCES auteur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE oeuvre_edition ADD CONSTRAINT FK_EFE3F24488194DE8 FOREIGN KEY (oeuvre_id) REFERENCES oeuvre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE oeuvre_edition ADD CONSTRAINT FK_EFE3F24474281A5E FOREIGN KEY (edition_id) REFERENCES edition (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE serie ADD CONSTRAINT FK_AA3A93344928CE22 FOREIGN KEY (oeuvres_id) REFERENCES oeuvre (id)');
        $this->addSql('ALTER TABLE type_auteur ADD CONSTRAINT FK_268DDA78AE784107 FOREIGN KEY (auteurs_id) REFERENCES auteur (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE oeuvre_auteur DROP FOREIGN KEY FK_C57F95AE60BB6FE6');
        $this->addSql('ALTER TABLE type_auteur DROP FOREIGN KEY FK_268DDA78AE784107');
        $this->addSql('ALTER TABLE oeuvre_edition DROP FOREIGN KEY FK_EFE3F24474281A5E');
        $this->addSql('ALTER TABLE lieu DROP FOREIGN KEY FK_2F577D594928CE22');
        $this->addSql('ALTER TABLE oeuvre_auteur DROP FOREIGN KEY FK_C57F95AE88194DE8');
        $this->addSql('ALTER TABLE oeuvre_edition DROP FOREIGN KEY FK_EFE3F24488194DE8');
        $this->addSql('ALTER TABLE serie DROP FOREIGN KEY FK_AA3A93344928CE22');
        $this->addSql('DROP TABLE auteur');
        $this->addSql('DROP TABLE edition');
        $this->addSql('DROP TABLE lieu');
        $this->addSql('DROP TABLE oeuvre');
        $this->addSql('DROP TABLE oeuvre_auteur');
        $this->addSql('DROP TABLE oeuvre_edition');
        $this->addSql('DROP TABLE serie');
        $this->addSql('DROP TABLE type_auteur');
        $this->addSql('DROP TABLE type_oeuvre');
    }
}
