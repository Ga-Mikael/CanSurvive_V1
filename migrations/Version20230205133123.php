<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230205133123 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE can ADD bunker_stock_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE can ADD CONSTRAINT FK_633CBAD2E8496B54 FOREIGN KEY (bunker_stock_id) REFERENCES bunker (id)');
        $this->addSql('CREATE INDEX IDX_633CBAD2E8496B54 ON can (bunker_stock_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE can DROP FOREIGN KEY FK_633CBAD2E8496B54');
        $this->addSql('DROP INDEX IDX_633CBAD2E8496B54 ON can');
        $this->addSql('ALTER TABLE can DROP bunker_stock_id');
    }
}
