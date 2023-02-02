<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230202103541 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE discussion DROP FOREIGN KEY FK_C0B9F90FEC8F01DA');
        $this->addSql('DROP INDEX IDX_C0B9F90FEC8F01DA ON discussion');
        $this->addSql('ALTER TABLE discussion DROP id_demandes_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE discussion ADD id_demandes_id INT NOT NULL');
        $this->addSql('ALTER TABLE discussion ADD CONSTRAINT FK_C0B9F90FEC8F01DA FOREIGN KEY (id_demandes_id) REFERENCES demandes (id)');
        $this->addSql('CREATE INDEX IDX_C0B9F90FEC8F01DA ON discussion (id_demandes_id)');
    }
}
