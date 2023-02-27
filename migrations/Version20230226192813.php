<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230226192813 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE utilisateur_service (utilisateur_id INT NOT NULL, service_id INT NOT NULL, INDEX IDX_9B966D40FB88E14F (utilisateur_id), INDEX IDX_9B966D40ED5CA9E6 (service_id), PRIMARY KEY(utilisateur_id, service_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE utilisateur_service ADD CONSTRAINT FK_9B966D40FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE utilisateur_service ADD CONSTRAINT FK_9B966D40ED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE accreditation_pro ADD CONSTRAINT FK_3CC3D893A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE demandes ADD CONSTRAINT FK_BD940CBBED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id)');
        $this->addSql('ALTER TABLE demandes ADD CONSTRAINT FK_BD940CBBA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE disponibilite ADD CONSTRAINT FK_2CBACE2FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE evenement_service ADD CONSTRAINT FK_E2988D0EFD02F13 FOREIGN KEY (evenement_id) REFERENCES evenement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE evenement_service ADD CONSTRAINT FK_E2988D0EED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE service ADD CONSTRAINT FK_E19D9AD2A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE utilisateur_service DROP FOREIGN KEY FK_9B966D40FB88E14F');
        $this->addSql('ALTER TABLE utilisateur_service DROP FOREIGN KEY FK_9B966D40ED5CA9E6');
        $this->addSql('DROP TABLE utilisateur_service');
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('ALTER TABLE accreditation_pro DROP FOREIGN KEY FK_3CC3D893A76ED395');
        $this->addSql('ALTER TABLE demandes DROP FOREIGN KEY FK_BD940CBBED5CA9E6');
        $this->addSql('ALTER TABLE demandes DROP FOREIGN KEY FK_BD940CBBA76ED395');
        $this->addSql('ALTER TABLE disponibilite DROP FOREIGN KEY FK_2CBACE2FA76ED395');
        $this->addSql('ALTER TABLE evenement_service DROP FOREIGN KEY FK_E2988D0EFD02F13');
        $this->addSql('ALTER TABLE evenement_service DROP FOREIGN KEY FK_E2988D0EED5CA9E6');
        $this->addSql('ALTER TABLE service DROP FOREIGN KEY FK_E19D9AD2A76ED395');
    }
}
