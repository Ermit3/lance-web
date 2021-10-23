<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211023084221 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product_type DROP FOREIGN KEY FK_1367588BE6903FD');
        $this->addSql('DROP INDEX IDX_1367588BE6903FD ON product_type');
        $this->addSql('ALTER TABLE product_type DROP product_category_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product_type ADD product_category_id INT NOT NULL');
        $this->addSql('ALTER TABLE product_type ADD CONSTRAINT FK_1367588BE6903FD FOREIGN KEY (product_category_id) REFERENCES product_category (id)');
        $this->addSql('CREATE INDEX IDX_1367588BE6903FD ON product_type (product_category_id)');
    }
}
