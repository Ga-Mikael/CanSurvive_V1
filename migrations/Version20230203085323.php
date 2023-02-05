<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230203085323 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD bunker_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649C0726651 FOREIGN KEY (bunker_id) REFERENCES bunker (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649C0726651 ON user (bunker_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649C0726651');
        $this->addSql('DROP INDEX UNIQ_8D93D649C0726651 ON user');
        $this->addSql('ALTER TABLE user DROP bunker_id');
    }
}
