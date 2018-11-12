<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181112152434 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE utilisation (id INT AUTO_INCREMENT NOT NULL, nature VARCHAR(255) NOT NULL, date_debut_utilisation DATETIME DEFAULT NULL, lieu_reception VARCHAR(255) NOT NULL, destination VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE voiture (immat VARCHAR(25) NOT NULL, marque VARCHAR(25) NOT NULL, km_total INT NOT NULL, descriptif LONGTEXT DEFAULT NULL, reservoir INT NOT NULL, disponibilite TINYINT(1) NOT NULL, PRIMARY KEY(immat)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE utilisation');
        $this->addSql('DROP TABLE voiture');
    }
}
