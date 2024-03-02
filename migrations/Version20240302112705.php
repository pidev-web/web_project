<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240302112705 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE evenement DROP FOREIGN KEY FK_B26681E4D418E9C');
        $this->addSql('ALTER TABLE para_pharmacie DROP FOREIGN KEY FK_404DC295A73F0036');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC271AF787D1');
        $this->addSql('DROP TABLE categorie_evenement');
        $this->addSql('DROP TABLE categorie_prod');
        $this->addSql('DROP TABLE evenement');
        $this->addSql('DROP TABLE para_pharmacie');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE zone');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie_evenement (id INT AUTO_INCREMENT NOT NULL, id_cat_evenement INT NOT NULL, nom_categorie VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE categorie_prod (id INT AUTO_INCREMENT NOT NULL, id_categorie INT NOT NULL, nom_categorie VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE evenement (id INT AUTO_INCREMENT NOT NULL, id_evenement INT NOT NULL, titre_evenement VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, type_evenement VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, lieu_evenement VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, date_evenement DATE NOT NULL, desc_evenement VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, status VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, id_cat_evenement_id INT DEFAULT NULL, INDEX IDX_B26681E4D418E9C (id_cat_evenement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE para_pharmacie (id INT AUTO_INCREMENT NOT NULL, nom_para VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, nbr_pharmaciens INT NOT NULL, numtel INT NOT NULL, etat_para VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, id_para INT NOT NULL, ville_id INT DEFAULT NULL, INDEX IDX_404DC295A73F0036 (ville_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, id_prod INT NOT NULL, nom_prod VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, prix_prod DOUBLE PRECISION NOT NULL, stock_prod INT NOT NULL, id_c_id INT NOT NULL, INDEX IDX_29A5EC271AF787D1 (id_c_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE zone (id INT AUTO_INCREMENT NOT NULL, ville VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, num_rue INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE evenement ADD CONSTRAINT FK_B26681E4D418E9C FOREIGN KEY (id_cat_evenement_id) REFERENCES categorie_evenement (id)');
        $this->addSql('ALTER TABLE para_pharmacie ADD CONSTRAINT FK_404DC295A73F0036 FOREIGN KEY (ville_id) REFERENCES zone (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC271AF787D1 FOREIGN KEY (id_c_id) REFERENCES categorie_prod (id)');
    }
}
