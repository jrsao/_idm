<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20150707145256 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE payment (id INT AUTO_INCREMENT NOT NULL, contract_id INT NOT NULL, datePayment DATETIME NOT NULL, amount NUMERIC(10, 0) NOT NULL, INDEX IDX_6D28840D2576E0FD (contract_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE taxe (id INT AUTO_INCREMENT NOT NULL, taxe_type_id INT NOT NULL, changingDate DATETIME NOT NULL, rate DOUBLE PRECISION NOT NULL, INDEX IDX_56322FE9EA8F861C (taxe_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE taxe_type (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(10) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE payment ADD CONSTRAINT FK_6D28840D2576E0FD FOREIGN KEY (contract_id) REFERENCES clients (id)');
        $this->addSql('ALTER TABLE taxe ADD CONSTRAINT FK_56322FE9EA8F861C FOREIGN KEY (taxe_type_id) REFERENCES taxe_type (id)');
       
        $this->addSql('INSERT INTO taxe_type (type) VALUES ("TPS")');
        $this->addSql('INSERT INTO taxe_type (type) VALUES ("TVQ")');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE taxe DROP FOREIGN KEY FK_56322FE9EA8F861C');
        $this->addSql('DROP TABLE payment');
        $this->addSql('DROP TABLE taxe');
        $this->addSql('DROP TABLE taxe_type');
    }
}
