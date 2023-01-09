<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230109100909 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE domaine_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE topic_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE domaine (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE domaine_topic (domaine_id INT NOT NULL, topic_id INT NOT NULL, PRIMARY KEY(domaine_id, topic_id))');
        $this->addSql('CREATE INDEX IDX_7408C4524272FC9F ON domaine_topic (domaine_id)');
        $this->addSql('CREATE INDEX IDX_7408C4521F55203D ON domaine_topic (topic_id)');
        $this->addSql('CREATE TABLE topic (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE domaine_topic ADD CONSTRAINT FK_7408C4524272FC9F FOREIGN KEY (domaine_id) REFERENCES domaine (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE domaine_topic ADD CONSTRAINT FK_7408C4521F55203D FOREIGN KEY (topic_id) REFERENCES topic (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE domaine_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE topic_id_seq CASCADE');
        $this->addSql('ALTER TABLE domaine_topic DROP CONSTRAINT FK_7408C4524272FC9F');
        $this->addSql('ALTER TABLE domaine_topic DROP CONSTRAINT FK_7408C4521F55203D');
        $this->addSql('DROP TABLE domaine');
        $this->addSql('DROP TABLE domaine_topic');
        $this->addSql('DROP TABLE topic');
    }
}
