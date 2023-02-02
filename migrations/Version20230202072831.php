<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230202072831 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE demandes ADD id_service_id INT NOT NULL');
        $this->addSql('ALTER TABLE demandes ADD CONSTRAINT FK_BD940CBB48D62931 FOREIGN KEY (id_service_id) REFERENCES service (id)');
        $this->addSql('CREATE INDEX IDX_BD940CBB48D62931 ON demandes (id_service_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE demandes DROP FOREIGN KEY FK_BD940CBB48D62931');
        $this->addSql('DROP INDEX IDX_BD940CBB48D62931 ON demandes');
        $this->addSql('ALTER TABLE demandes DROP id_service_id');
    }
}
