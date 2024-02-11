<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240211132916 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE medecin DROP FOREIGN KEY FK_1BDA53C67459FC89');
        $this->addSql('DROP INDEX IDX_1BDA53C67459FC89 ON medecin');
        $this->addSql('ALTER TABLE medecin CHANGE id_specialite id_specialite_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE medecin ADD CONSTRAINT FK_1BDA53C69FBD3195 FOREIGN KEY (id_specialite_id) REFERENCES specialite (id)');
        $this->addSql('CREATE INDEX IDX_1BDA53C69FBD3195 ON medecin (id_specialite_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE medecin DROP FOREIGN KEY FK_1BDA53C69FBD3195');
        $this->addSql('DROP INDEX IDX_1BDA53C69FBD3195 ON medecin');
        $this->addSql('ALTER TABLE medecin CHANGE id_specialite_id id_specialite INT DEFAULT NULL');
        $this->addSql('ALTER TABLE medecin ADD CONSTRAINT FK_1BDA53C67459FC89 FOREIGN KEY (id_specialite) REFERENCES specialite (id)');
        $this->addSql('CREATE INDEX IDX_1BDA53C67459FC89 ON medecin (id_specialite)');
    }
}
