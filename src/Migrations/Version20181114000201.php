<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181114000201 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, role VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role_personne (role_id INT NOT NULL, personne_id INT NOT NULL, INDEX IDX_251D2FDED60322AC (role_id), INDEX IDX_251D2FDEA21BD112 (personne_id), PRIMARY KEY(role_id, personne_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE role_personne ADD CONSTRAINT FK_251D2FDED60322AC FOREIGN KEY (role_id) REFERENCES role (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE role_personne ADD CONSTRAINT FK_251D2FDEA21BD112 FOREIGN KEY (personne_id) REFERENCES personne (id) ON DELETE CASCADE');
        $this->addSql('INSERT INTO `role` (`id`, `name`, `role`) VALUES (NULL, \'admin\', \'ROLE_ADMIN\')');
        $this->addSql('INSERT INTO `role` (`id`, `name`, `role`) VALUES (NULL, \'user\', \'ROLE_USER\')');
        $this->addSql('INSERT INTO `personne` (`id`, `nom`, `prenom`, `email`, `mdp`) VALUES (NULL, \'Loustau\', \'Quentin\', \'qloustau@gmail.com\', \'$2y$12$/P8sgVVU9c5q1D/vyfm.k.QuVpRW3yOqXNnWgf61sMkNZJ0HYxcQO\')');
        $this->addSql('INSERT INTO `personne` (`id`, `nom`, `prenom`, `email`, `mdp`) VALUES (NULL, \'Robert\', \'Mathias\', \'mathias@azumadesign.fr\', \'$2y$12$/P8sgVVU9c5q1D/vyfm.k.QuVpRW3yOqXNnWgf61sMkNZJ0HYxcQO\')');
        $this->addSql('INSERT INTO `role_personne` (`role_id`, `personne_id`) VALUES (\'1\', \'1\')');
        $this->addSql('INSERT INTO `role_personne` (`role_id`, `personne_id`) VALUES (\'1\', \'2\')');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE role_personne');
    }
}
