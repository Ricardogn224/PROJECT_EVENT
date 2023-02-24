<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230222110001 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE accreditation_pro (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, en_attente TINYINT(1) NOT NULL, est_accepte TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_3CC3D893A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE demandes (id INT AUTO_INCREMENT NOT NULL, service_id INT DEFAULT NULL, user_id INT NOT NULL, statut VARCHAR(255) NOT NULL, planed_date DATE NOT NULL, debut_time TIME NOT NULL, end_time TIME NOT NULL, INDEX IDX_BD940CBBED5CA9E6 (service_id), INDEX IDX_BD940CBBA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE discussion (id INT AUTO_INCREMENT NOT NULL, date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE disponibilite (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, date DATE DEFAULT NULL, statut VARCHAR(255) NOT NULL, INDEX IDX_2CBACE2FA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE evenement (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE evenement_service (evenement_id INT NOT NULL, service_id INT NOT NULL, INDEX IDX_E2988D0EFD02F13 (evenement_id), INDEX IDX_E2988D0EED5CA9E6 (service_id), PRIMARY KEY(evenement_id, service_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, message VARCHAR(255) NOT NULL, date DATETIME NOT NULL, id_demande INT NOT NULL, id_emmeteur INT NOT NULL, id_destinataire INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE paiement (id INT AUTO_INCREMENT NOT NULL, montant DOUBLE PRECISION NOT NULL, statut VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, description VARCHAR(2555) NOT NULL, prix DOUBLE PRECISION NOT NULL, localisation VARCHAR(255) NOT NULL, image_name VARCHAR(255) DEFAULT NULL, caracteristique VARCHAR(255) DEFAULT NULL, updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_E19D9AD2A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, is_verified TINYINT(1) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, image_name VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur_service (utilisateur_id INT NOT NULL, service_id INT NOT NULL, INDEX IDX_9B966D40FB88E14F (utilisateur_id), INDEX IDX_9B966D40ED5CA9E6 (service_id), PRIMARY KEY(utilisateur_id, service_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE accreditation_pro ADD CONSTRAINT FK_3CC3D893A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE demandes ADD CONSTRAINT FK_BD940CBBED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id)');
        $this->addSql('ALTER TABLE demandes ADD CONSTRAINT FK_BD940CBBA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE disponibilite ADD CONSTRAINT FK_2CBACE2FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE evenement_service ADD CONSTRAINT FK_E2988D0EFD02F13 FOREIGN KEY (evenement_id) REFERENCES evenement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE evenement_service ADD CONSTRAINT FK_E2988D0EED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE service ADD CONSTRAINT FK_E19D9AD2A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE utilisateur_service ADD CONSTRAINT FK_9B966D40FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE utilisateur_service ADD CONSTRAINT FK_9B966D40ED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE accreditation_pro DROP FOREIGN KEY FK_3CC3D893A76ED395');
        $this->addSql('ALTER TABLE demandes DROP FOREIGN KEY FK_BD940CBBED5CA9E6');
        $this->addSql('ALTER TABLE demandes DROP FOREIGN KEY FK_BD940CBBA76ED395');
        $this->addSql('ALTER TABLE disponibilite DROP FOREIGN KEY FK_2CBACE2FA76ED395');
        $this->addSql('ALTER TABLE evenement_service DROP FOREIGN KEY FK_E2988D0EFD02F13');
        $this->addSql('ALTER TABLE evenement_service DROP FOREIGN KEY FK_E2988D0EED5CA9E6');
        $this->addSql('ALTER TABLE service DROP FOREIGN KEY FK_E19D9AD2A76ED395');
        $this->addSql('ALTER TABLE utilisateur_service DROP FOREIGN KEY FK_9B966D40FB88E14F');
        $this->addSql('ALTER TABLE utilisateur_service DROP FOREIGN KEY FK_9B966D40ED5CA9E6');
        $this->addSql('DROP TABLE accreditation_pro');
        $this->addSql('DROP TABLE demandes');
        $this->addSql('DROP TABLE discussion');
        $this->addSql('DROP TABLE disponibilite');
        $this->addSql('DROP TABLE evenement');
        $this->addSql('DROP TABLE evenement_service');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE paiement');
        $this->addSql('DROP TABLE service');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP TABLE utilisateur_service');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
