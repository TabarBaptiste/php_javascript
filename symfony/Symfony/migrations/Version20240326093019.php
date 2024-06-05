<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240326093019 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE couleur (id INT AUTO_INCREMENT NOT NULL, couleur VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE couleur_vehicule (couleur_id INT NOT NULL, vehicule_id INT NOT NULL, INDEX IDX_3CDF540CC31BA576 (couleur_id), INDEX IDX_3CDF540C4A4A3511 (vehicule_id), PRIMARY KEY(couleur_id, vehicule_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE couleur_vehicule ADD CONSTRAINT FK_3CDF540CC31BA576 FOREIGN KEY (couleur_id) REFERENCES couleur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE couleur_vehicule ADD CONSTRAINT FK_3CDF540C4A4A3511 FOREIGN KEY (vehicule_id) REFERENCES vehicule (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE couleur_vehicule DROP FOREIGN KEY FK_3CDF540CC31BA576');
        $this->addSql('ALTER TABLE couleur_vehicule DROP FOREIGN KEY FK_3CDF540C4A4A3511');
        $this->addSql('DROP TABLE couleur');
        $this->addSql('DROP TABLE couleur_vehicule');
    }
}
