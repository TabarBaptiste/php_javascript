<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240326092004 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE roue_vehicule (roue_id INT NOT NULL, vehicule_id INT NOT NULL, INDEX IDX_D647E362BBF3D75F (roue_id), INDEX IDX_D647E3624A4A3511 (vehicule_id), PRIMARY KEY(roue_id, vehicule_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE roue_vehicule ADD CONSTRAINT FK_D647E362BBF3D75F FOREIGN KEY (roue_id) REFERENCES roue (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE roue_vehicule ADD CONSTRAINT FK_D647E3624A4A3511 FOREIGN KEY (vehicule_id) REFERENCES vehicule (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE roue_vehicule DROP FOREIGN KEY FK_D647E362BBF3D75F');
        $this->addSql('ALTER TABLE roue_vehicule DROP FOREIGN KEY FK_D647E3624A4A3511');
        $this->addSql('DROP TABLE roue_vehicule');
    }
}
