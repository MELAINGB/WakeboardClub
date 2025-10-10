<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251010204510 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE session (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, date_start DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', date_end VARCHAR(255) NOT NULL, place VARCHAR(255) NOT NULL, capacity INT NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE session_coach (session_id INT NOT NULL, coach_id INT NOT NULL, INDEX IDX_E424D51A613FECDF (session_id), INDEX IDX_E424D51A3C105691 (coach_id), PRIMARY KEY(session_id, coach_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE session_coach ADD CONSTRAINT FK_E424D51A613FECDF FOREIGN KEY (session_id) REFERENCES session (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE session_coach ADD CONSTRAINT FK_E424D51A3C105691 FOREIGN KEY (coach_id) REFERENCES coach (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE session_coach DROP FOREIGN KEY FK_E424D51A613FECDF');
        $this->addSql('ALTER TABLE session_coach DROP FOREIGN KEY FK_E424D51A3C105691');
        $this->addSql('DROP TABLE session');
        $this->addSql('DROP TABLE session_coach');
    }
}
