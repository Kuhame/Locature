<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211103121551 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE facture ADD id_voiture_id INT NOT NULL, ADD id_utilisateur_id INT NOT NULL, ADD nb_commandes INT NOT NULL, DROP id_voiture, DROP nb_commande, DROP id_utilisateur, CHANGE prix prix BIGINT NOT NULL');
        $this->addSql('ALTER TABLE facture ADD CONSTRAINT FK_FE866410A40B286D FOREIGN KEY (id_voiture_id) REFERENCES voiture (id)');
        $this->addSql('ALTER TABLE facture ADD CONSTRAINT FK_FE866410C6EE5C49 FOREIGN KEY (id_utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_FE866410A40B286D ON facture (id_voiture_id)');
        $this->addSql('CREATE INDEX IDX_FE866410C6EE5C49 ON facture (id_utilisateur_id)');
        $this->addSql('ALTER TABLE voiture ADD id_loueur_id INT NOT NULL, ADD nb_voitures INT NOT NULL, DROP id_loueur, DROP nb_voiture, CHANGE caracteristique caracteristiques VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE voiture ADD CONSTRAINT FK_E9E2810F5ACD12C1 FOREIGN KEY (id_loueur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_E9E2810F5ACD12C1 ON voiture (id_loueur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE facture DROP FOREIGN KEY FK_FE866410A40B286D');
        $this->addSql('ALTER TABLE facture DROP FOREIGN KEY FK_FE866410C6EE5C49');
        $this->addSql('DROP INDEX IDX_FE866410A40B286D ON facture');
        $this->addSql('DROP INDEX IDX_FE866410C6EE5C49 ON facture');
        $this->addSql('ALTER TABLE facture ADD id_voiture INT NOT NULL, ADD nb_commande INT NOT NULL, ADD id_utilisateur INT NOT NULL, DROP id_voiture_id, DROP id_utilisateur_id, DROP nb_commandes, CHANGE prix prix DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE voiture DROP FOREIGN KEY FK_E9E2810F5ACD12C1');
        $this->addSql('DROP INDEX IDX_E9E2810F5ACD12C1 ON voiture');
        $this->addSql('ALTER TABLE voiture ADD id_loueur INT NOT NULL, ADD nb_voiture INT NOT NULL, DROP id_loueur_id, DROP nb_voitures, CHANGE caracteristiques caracteristique VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
