<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220601114209 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE brochure CHANGE flag flag ENUM(\'Active\', \'Inactive\', \'Deleted\') NOT NULL');
        $this->addSql('ALTER TABLE document CHANGE category category ENUM(\'Accessories\', \'Brochure\', \'PriceList\', \'Service\', \'Special model\', \'Voucher\') NOT NULL, CHANGE brand brand ENUM(\'Dacia\', \'Renault\') NOT NULL, CHANGE flag flag ENUM(\'Active\', \'Inactive\', \'Deleted\') NOT NULL');
        $this->addSql('ALTER TABLE test_drive CHANGE flag flag ENUM(\'Active\', \'Inactive\', \'Deleted\') NOT NULL');
        $this->addSql('ALTER TABLE vehicle CHANGE brand brand ENUM(\'Dacia\', \'Renault\') NOT NULL, CHANGE category category ENUM(\'PKW\', \'Dacia\', \'Elektrofahrzeuge\', \'Hybridmodelle\', \'Initiale Paris\', \'Nutzfahrzeuge\', \'Sport\') NOT NULL, CHANGE flag flag ENUM(\'Active\', \'Inactive\', \'Deleted\') NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE brochure CHANGE flag flag VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE document CHANGE category category VARCHAR(255) NOT NULL, CHANGE brand brand VARCHAR(255) NOT NULL, CHANGE flag flag VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE test_drive CHANGE flag flag VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE vehicle CHANGE brand brand VARCHAR(255) NOT NULL, CHANGE category category VARCHAR(255) NOT NULL, CHANGE flag flag VARCHAR(255) NOT NULL');
    }
}
