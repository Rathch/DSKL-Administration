<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220517074138 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE api_user (id INT AUTO_INCREMENT NOT NULL, api_token VARCHAR(255) DEFAULT NULL, roles LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', password VARCHAR(255) DEFAULT NULL, username VARCHAR(255) DEFAULT NULL, salt VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_AC64A0BA7BA2F5EB (api_token), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE document (id INT AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', modified_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', category ENUM(\'Accessories\', \'Brochure\', \'PriceList\', \'Service\', \'Special model\', \'Voucher\') NOT NULL, file_name VARCHAR(255) NOT NULL, brand ENUM(\'Dacia\', \'Renault\') NOT NULL, display_name VARCHAR(255) NOT NULL, salesforce_code VARCHAR(255) DEFAULT NULL, flag ENUM(\'Active\', \'Inactive\', \'Deleted\') NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sonata_user__user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, username_canonical VARCHAR(180) NOT NULL, email VARCHAR(180) NOT NULL, email_canonical VARCHAR(180) NOT NULL, enabled TINYINT(1) NOT NULL, salt VARCHAR(255) DEFAULT NULL, password VARCHAR(255) NOT NULL, last_login DATETIME DEFAULT NULL, confirmation_token VARCHAR(180) DEFAULT NULL, password_requested_at DATETIME DEFAULT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_4F797D592FC23A8 (username_canonical), UNIQUE INDEX UNIQ_4F797D5A0D96FBF (email_canonical), UNIQUE INDEX UNIQ_4F797D5C05FB297 (confirmation_token), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE thumbnail (id INT AUTO_INCREMENT NOT NULL, vehicle_id INT DEFAULT NULL, document_id INT DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', modified_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', category ENUM(\'Vehicle\', \'Brochure\') NOT NULL, file_name VARCHAR(255) NOT NULL, flag ENUM(\'Active\', \'Inactive\', \'Deleted\') NOT NULL, INDEX IDX_C35726E6545317D1 (vehicle_id), INDEX IDX_C35726E6C33F7837 (document_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicle (id INT AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', modified_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', brand ENUM(\'Dacia\', \'Renault\') NOT NULL, name VARCHAR(255) NOT NULL, technically_name VARCHAR(255) NOT NULL, consumption LONGTEXT NOT NULL, consumption_range LONGTEXT NOT NULL, category ENUM(\'PKW\', \'Dacia\', \'Elektrofahrzeuge\', \'Hybridmodelle\', \'Initiale Paris\', \'Nutzfahrzeuge\', \'Sport\') NOT NULL, flag ENUM(\'Active\', \'Inactive\', \'Deleted\') NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE thumbnail ADD CONSTRAINT FK_C35726E6545317D1 FOREIGN KEY (vehicle_id) REFERENCES vehicle (id)');
        $this->addSql('ALTER TABLE thumbnail ADD CONSTRAINT FK_C35726E6C33F7837 FOREIGN KEY (document_id) REFERENCES document (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE thumbnail DROP FOREIGN KEY FK_C35726E6C33F7837');
        $this->addSql('ALTER TABLE thumbnail DROP FOREIGN KEY FK_C35726E6545317D1');
        $this->addSql('DROP TABLE api_user');
        $this->addSql('DROP TABLE document');
        $this->addSql('DROP TABLE sonata_user__user');
        $this->addSql('DROP TABLE thumbnail');
        $this->addSql('DROP TABLE vehicle');
    }
}
