<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220517080637 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE document ADD thumbnail_id INT DEFAULT NULL, CHANGE category category ENUM(\'Accessories\', \'Brochure\', \'PriceList\', \'Service\', \'Special model\', \'Voucher\') NOT NULL, CHANGE brand brand ENUM(\'Dacia\', \'Renault\') NOT NULL, CHANGE flag flag ENUM(\'Active\', \'Inactive\', \'Deleted\') NOT NULL');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A76FDFF2E92 FOREIGN KEY (thumbnail_id) REFERENCES thumbnail (id)');
        $this->addSql('CREATE INDEX IDX_D8698A76FDFF2E92 ON document (thumbnail_id)');
        $this->addSql('ALTER TABLE thumbnail CHANGE category category ENUM(\'Vehicle\', \'Brochure\') NOT NULL, CHANGE flag flag ENUM(\'Active\', \'Inactive\', \'Deleted\') NOT NULL');
        $this->addSql('ALTER TABLE vehicle ADD thumbnail_id INT DEFAULT NULL, CHANGE brand brand ENUM(\'Dacia\', \'Renault\') NOT NULL, CHANGE category category ENUM(\'PKW\', \'Dacia\', \'Elektrofahrzeuge\', \'Hybridmodelle\', \'Initiale Paris\', \'Nutzfahrzeuge\', \'Sport\') NOT NULL, CHANGE flag flag ENUM(\'Active\', \'Inactive\', \'Deleted\') NOT NULL');
        $this->addSql('ALTER TABLE vehicle ADD CONSTRAINT FK_1B80E486FDFF2E92 FOREIGN KEY (thumbnail_id) REFERENCES thumbnail (id)');
        $this->addSql('CREATE INDEX IDX_1B80E486FDFF2E92 ON vehicle (thumbnail_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE document DROP FOREIGN KEY FK_D8698A76FDFF2E92');
        $this->addSql('DROP INDEX IDX_D8698A76FDFF2E92 ON document');
        $this->addSql('ALTER TABLE document DROP thumbnail_id, CHANGE category category VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE brand brand VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE flag flag VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE thumbnail CHANGE category category VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE flag flag VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE vehicle DROP FOREIGN KEY FK_1B80E486FDFF2E92');
        $this->addSql('DROP INDEX IDX_1B80E486FDFF2E92 ON vehicle');
        $this->addSql('ALTER TABLE vehicle DROP thumbnail_id, CHANGE brand brand VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE category category VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE flag flag VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
