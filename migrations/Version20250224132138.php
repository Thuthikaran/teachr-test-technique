<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20250224132138 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create categorie and produit tables with PostgreSQL-compatible syntax';
    }

    public function up(Schema $schema): void
    {
        // Updated SQL for PostgreSQL:
        $this->addSql('CREATE TABLE categorie (id SERIAL PRIMARY KEY, nom VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE produit (id SERIAL PRIMARY KEY, categorie_id INTEGER NOT NULL, nom VARCHAR(255) NOT NULL, description TEXT NOT NULL, prix DOUBLE PRECISION NOT NULL, date_creation TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, CONSTRAINT FK_29A5EC27BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_29A5EC27BCF5E72D ON produit (categorie_id)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE categorie');
    }
}
