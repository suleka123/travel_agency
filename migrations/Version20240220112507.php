<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240220112507 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE post_post (post_source INT NOT NULL, post_target INT NOT NULL, INDEX IDX_93DF0B866FA89B16 (post_source), INDEX IDX_93DF0B86764DCB99 (post_target), PRIMARY KEY(post_source, post_target)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE post_post ADD CONSTRAINT FK_93DF0B866FA89B16 FOREIGN KEY (post_source) REFERENCES post (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE post_post ADD CONSTRAINT FK_93DF0B86764DCB99 FOREIGN KEY (post_target) REFERENCES post (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE post_category');
        $this->addSql('ALTER TABLE post ADD description VARCHAR(255) NOT NULL, ADD price VARCHAR(255) NOT NULL, ADD category VARCHAR(255) NOT NULL, DROP content');
        $this->addSql('ALTER TABLE messenger_messages CHANGE created_at created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE available_at available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE delivered_at delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_0900_ai_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('CREATE TABLE post_category (post_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_B9A1906012469DE2 (category_id), INDEX IDX_B9A190604B89032C (post_id), PRIMARY KEY(post_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_0900_ai_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('ALTER TABLE post_post DROP FOREIGN KEY FK_93DF0B866FA89B16');
        $this->addSql('ALTER TABLE post_post DROP FOREIGN KEY FK_93DF0B86764DCB99');
        $this->addSql('DROP TABLE post_post');
        $this->addSql('ALTER TABLE messenger_messages CHANGE created_at created_at DATETIME NOT NULL, CHANGE available_at available_at DATETIME NOT NULL, CHANGE delivered_at delivered_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE post ADD content LONGTEXT NOT NULL, DROP description, DROP price, DROP category');
    }
}
