<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240228113651 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE reservation_rdv (id INT AUTO_INCREMENT NOT NULL, date_rdv DATE NOT NULL, statut VARCHAR(255) NOT NULL, motif VARCHAR(255) NOT NULL, remarques VARCHAR(255) NOT NULL, patient_id INT DEFAULT NULL, medecin_id INT DEFAULT NULL, INDEX IDX_45C132596B899279 (patient_id), INDEX IDX_45C132594F31A84 (medecin_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE reservation_rdv ADD CONSTRAINT FK_45C132596B899279 FOREIGN KEY (patient_id) REFERENCES patient (id)');
        $this->addSql('ALTER TABLE reservation_rdv ADD CONSTRAINT FK_45C132594F31A84 FOREIGN KEY (medecin_id) REFERENCES medecin (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation_rdv DROP FOREIGN KEY FK_45C132596B899279');
        $this->addSql('ALTER TABLE reservation_rdv DROP FOREIGN KEY FK_45C132594F31A84');
        $this->addSql('DROP TABLE reservation_rdv');
    }
}
