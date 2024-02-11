<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240211155541 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categorie_prod ADD id_categorie INT NOT NULL');
        $this->addSql('ALTER TABLE evenement ADD id_evenement INT NOT NULL');
        $this->addSql('ALTER TABLE fiche_patient ADD id_fiche VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE medecin DROP FOREIGN KEY FK_1BDA53C69FBD3195');
        $this->addSql('DROP INDEX IDX_1BDA53C69FBD3195 ON medecin');
        $this->addSql('ALTER TABLE medecin CHANGE id_specialite_id id_medcin_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE medecin ADD CONSTRAINT FK_1BDA53C67459FC89 FOREIGN KEY (id_medcin_id) REFERENCES specialite (id)');
        $this->addSql('CREATE INDEX IDX_1BDA53C67459FC89 ON medecin (id_medcin_id)');
        $this->addSql('ALTER TABLE patient ADD id_patient VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE produit ADD id_prod INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categorie_prod DROP id_categorie');
        $this->addSql('ALTER TABLE evenement DROP id_evenement');
        $this->addSql('ALTER TABLE fiche_patient DROP id_fiche');
        $this->addSql('ALTER TABLE medecin DROP FOREIGN KEY FK_1BDA53C67459FC89');
        $this->addSql('DROP INDEX IDX_1BDA53C67459FC89 ON medecin');
        $this->addSql('ALTER TABLE medecin CHANGE id_medcin_id id_specialite_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE medecin ADD CONSTRAINT FK_1BDA53C69FBD3195 FOREIGN KEY (id_specialite_id) REFERENCES specialite (id)');
        $this->addSql('CREATE INDEX IDX_1BDA53C69FBD3195 ON medecin (id_specialite_id)');
        $this->addSql('ALTER TABLE patient DROP id_patient');
        $this->addSql('ALTER TABLE produit DROP id_prod');
    }
}
