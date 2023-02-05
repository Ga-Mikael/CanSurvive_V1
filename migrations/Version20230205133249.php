<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230205133249 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE resident ADD bunker_host_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE resident ADD CONSTRAINT FK_1D03DA064E0C9848 FOREIGN KEY (bunker_host_id) REFERENCES bunker (id)');
        $this->addSql('CREATE INDEX IDX_1D03DA064E0C9848 ON resident (bunker_host_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE resident DROP FOREIGN KEY FK_1D03DA064E0C9848');
        $this->addSql('DROP INDEX IDX_1D03DA064E0C9848 ON resident');
        $this->addSql('ALTER TABLE resident DROP bunker_host_id');
    }
}
