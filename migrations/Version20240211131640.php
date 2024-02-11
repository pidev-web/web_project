<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240211131640 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie_evenement (id INT AUTO_INCREMENT NOT NULL, id_cat_evenement INT NOT NULL, nom_categorie VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE categorie_prod (id INT AUTO_INCREMENT NOT NULL, id_categorie INT NOT NULL, nom_categorie VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE evenement (id INT AUTO_INCREMENT NOT NULL, id_evenement INT NOT NULL, titre_evenement VARCHAR(255) NOT NULL, type_evenement VARCHAR(255) NOT NULL, lieu_evenement VARCHAR(255) NOT NULL, date_evenement DATE NOT NULL, desc_evenement VARCHAR(255) NOT NULL, id_cat_evenement_id INT DEFAULT NULL, INDEX IDX_B26681E4D418E9C (id_cat_evenement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE fiche_patient (id INT AUTO_INCREMENT NOT NULL, id_fiche VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, date_naissance DATE NOT NULL, poids DOUBLE PRECISION NOT NULL, taille DOUBLE PRECISION NOT NULL, relation_id INT DEFAULT NULL, INDEX IDX_2DB8C313256915B (relation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE para_pharmacie (id INT AUTO_INCREMENT NOT NULL, id_para INT NOT NULL, nom_para VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, nbr_pharmaciens INT NOT NULL, n°tel INT NOT NULL, etat_para VARCHAR(255) NOT NULL, ville_id INT DEFAULT NULL, INDEX IDX_404DC295A73F0036 (ville_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE patient (id INT AUTO_INCREMENT NOT NULL, id_patient VARCHAR(255) NOT NULL, nom_p VARCHAR(255) NOT NULL, prenom_p VARCHAR(255) NOT NULL, email_p VARCHAR(255) NOT NULL, num_tel_p INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, id_prod INT NOT NULL, nom_prod VARCHAR(255) NOT NULL, prix_prod DOUBLE PRECISION NOT NULL, stock_prod INT NOT NULL, id_c_id INT NOT NULL, INDEX IDX_29A5EC271AF787D1 (id_c_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE zone (id INT AUTO_INCREMENT NOT NULL, id_zone INT NOT NULL, ville VARCHAR(255) NOT NULL, num_rue INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE evenement ADD CONSTRAINT FK_B26681E4D418E9C FOREIGN KEY (id_cat_evenement_id) REFERENCES categorie_evenement (id)');
        $this->addSql('ALTER TABLE fiche_patient ADD CONSTRAINT FK_2DB8C313256915B FOREIGN KEY (relation_id) REFERENCES patient (id)');
        $this->addSql('ALTER TABLE para_pharmacie ADD CONSTRAINT FK_404DC295A73F0036 FOREIGN KEY (ville_id) REFERENCES zone (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC271AF787D1 FOREIGN KEY (id_c_id) REFERENCES categorie_prod (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE evenement DROP FOREIGN KEY FK_B26681E4D418E9C');
        $this->addSql('ALTER TABLE fiche_patient DROP FOREIGN KEY FK_2DB8C313256915B');
        $this->addSql('ALTER TABLE para_pharmacie DROP FOREIGN KEY FK_404DC295A73F0036');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC271AF787D1');
        $this->addSql('DROP TABLE categorie_evenement');
        $this->addSql('DROP TABLE categorie_prod');
        $this->addSql('DROP TABLE evenement');
        $this->addSql('DROP TABLE fiche_patient');
        $this->addSql('DROP TABLE para_pharmacie');
        $this->addSql('DROP TABLE patient');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE zone');
    }
}
