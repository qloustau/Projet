<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181113112951 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, personne_id INT NOT NULL, voiture_id INT NOT NULL, commentaire LONGTEXT NOT NULL, type VARCHAR(255) NOT NULL, INDEX IDX_67F068BCA21BD112 (personne_id), INDEX IDX_67F068BC181A8BA (voiture_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personne (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, icone VARCHAR(255) DEFAULT NULL, mdp VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_FCEC9EFE7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plein (id INT AUTO_INCREMENT NOT NULL, voiture_id INT NOT NULL, utilisation_id INT NOT NULL, prix NUMERIC(5, 2) NOT NULL, km_du_plein INT NOT NULL, INDEX IDX_1E29CA13181A8BA (voiture_id), INDEX IDX_1E29CA13BCD54630 (utilisation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisation (id INT AUTO_INCREMENT NOT NULL, personne_id INT NOT NULL, voiture_id INT NOT NULL, nature VARCHAR(255) NOT NULL, date_debut_utilisation DATETIME DEFAULT NULL, date_fin_utilisation DATETIME DEFAULT NULL, lieu_reception VARCHAR(255) NOT NULL, destination VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, INDEX IDX_B02A3C43A21BD112 (personne_id), INDEX IDX_B02A3C43181A8BA (voiture_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE voiture (id INT AUTO_INCREMENT NOT NULL, immat VARCHAR(25) NOT NULL, marque VARCHAR(25) NOT NULL, km_total INT NOT NULL, descriptif LONGTEXT DEFAULT NULL, reservoir INT NOT NULL, disponibilite TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_E9E2810FF0CD7A4F (immat), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCA21BD112 FOREIGN KEY (personne_id) REFERENCES personne (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC181A8BA FOREIGN KEY (voiture_id) REFERENCES voiture (id)');
        $this->addSql('ALTER TABLE plein ADD CONSTRAINT FK_1E29CA13181A8BA FOREIGN KEY (voiture_id) REFERENCES voiture (id)');
        $this->addSql('ALTER TABLE plein ADD CONSTRAINT FK_1E29CA13BCD54630 FOREIGN KEY (utilisation_id) REFERENCES utilisation (id)');
        $this->addSql('ALTER TABLE utilisation ADD CONSTRAINT FK_B02A3C43A21BD112 FOREIGN KEY (personne_id) REFERENCES personne (id)');
        $this->addSql('ALTER TABLE utilisation ADD CONSTRAINT FK_B02A3C43181A8BA FOREIGN KEY (voiture_id) REFERENCES voiture (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCA21BD112');
        $this->addSql('ALTER TABLE utilisation DROP FOREIGN KEY FK_B02A3C43A21BD112');
        $this->addSql('ALTER TABLE plein DROP FOREIGN KEY FK_1E29CA13BCD54630');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC181A8BA');
        $this->addSql('ALTER TABLE plein DROP FOREIGN KEY FK_1E29CA13181A8BA');
        $this->addSql('ALTER TABLE utilisation DROP FOREIGN KEY FK_B02A3C43181A8BA');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE personne');
        $this->addSql('DROP TABLE plein');
        $this->addSql('DROP TABLE utilisation');
        $this->addSql('DROP TABLE voiture');
    }
}
