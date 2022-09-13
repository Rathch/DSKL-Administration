<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220601113619 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE brochure_document');
        $this->addSql('ALTER TABLE brochure CHANGE flag flag ENUM(\'Active\', \'Inactive\', \'Deleted\') NOT NULL');
        $this->addSql('ALTER TABLE document ADD brochure_id INT NOT NULL, ADD display_name VARCHAR(255) NOT NULL, CHANGE category category ENUM(\'Accessories\', \'Brochure\', \'PriceList\', \'Service\', \'Special model\', \'Voucher\') NOT NULL, CHANGE brand brand ENUM(\'Dacia\', \'Renault\') NOT NULL, CHANGE flag flag ENUM(\'Active\', \'Inactive\', \'Deleted\') NOT NULL');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A76B96114D1 FOREIGN KEY (brochure_id) REFERENCES brochure (id)');
        $this->addSql('CREATE INDEX IDX_D8698A76B96114D1 ON document (brochure_id)');
        $this->addSql('ALTER TABLE test_drive CHANGE flag flag ENUM(\'Active\', \'Inactive\', \'Deleted\') NOT NULL');
        $this->addSql('ALTER TABLE vehicle CHANGE brand brand ENUM(\'Dacia\', \'Renault\') NOT NULL, CHANGE category category ENUM(\'PKW\', \'Dacia\', \'Elektrofahrzeuge\', \'Hybridmodelle\', \'Initiale Paris\', \'Nutzfahrzeuge\', \'Sport\') NOT NULL, CHANGE flag flag ENUM(\'Active\', \'Inactive\', \'Deleted\') NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE brochure_document (brochure_id INT NOT NULL, document_id INT NOT NULL, INDEX IDX_B9C38CEBC33F7837 (document_id), INDEX IDX_B9C38CEBB96114D1 (brochure_id), PRIMARY KEY(brochure_id, document_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE brochure_document ADD CONSTRAINT FK_B9C38CEBC33F7837 FOREIGN KEY (document_id) REFERENCES document (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE brochure_document ADD CONSTRAINT FK_B9C38CEBB96114D1 FOREIGN KEY (brochure_id) REFERENCES brochure (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE brochure CHANGE flag flag VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE document DROP FOREIGN KEY FK_D8698A76B96114D1');
        $this->addSql('DROP INDEX IDX_D8698A76B96114D1 ON document');
        $this->addSql('ALTER TABLE document DROP brochure_id, DROP display_name, CHANGE category category VARCHAR(255) NOT NULL, CHANGE brand brand VARCHAR(255) NOT NULL, CHANGE flag flag VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE test_drive CHANGE flag flag VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE vehicle CHANGE brand brand VARCHAR(255) NOT NULL, CHANGE category category VARCHAR(255) NOT NULL, CHANGE flag flag VARCHAR(255) NOT NULL');
    }
}
