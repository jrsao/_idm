<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20150707123530 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE clients (id INT AUTO_INCREMENT NOT NULL, person_id INT DEFAULT NULL, registerDate DATETIME NOT NULL, UNIQUE INDEX UNIQ_C82E74217BBB47 (person_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE persons (id INT AUTO_INCREMENT NOT NULL, firstName VARCHAR(255) NOT NULL, lastName VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicules (id INT AUTO_INCREMENT NOT NULL, parking_id INT DEFAULT NULL, color VARCHAR(255) NOT NULL, brand VARCHAR(255) NOT NULL, immatriculation VARCHAR(255) NOT NULL, kind VARCHAR(255) NOT NULL, INDEX IDX_78218C2DF17B2DD (parking_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE parking_types (id INT AUTO_INCREMENT NOT NULL, description VARCHAR(255) NOT NULL, suggestedPrice NUMERIC(10, 0) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE parking_type_sites (parking_type_id INT NOT NULL, site_id INT NOT NULL, INDEX IDX_AEA8FD2F4BA67449 (parking_type_id), INDEX IDX_AEA8FD2FF6BD1646 (site_id), PRIMARY KEY(parking_type_id, site_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE unit_types (id INT AUTO_INCREMENT NOT NULL, width INT NOT NULL, height INT NOT NULL, description VARCHAR(255) DEFAULT NULL, suggestedPrice NUMERIC(10, 0) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE unit_types_sites (unit_type_id INT NOT NULL, site_id INT NOT NULL, INDEX IDX_8695140991058251 (unit_type_id), INDEX IDX_86951409F6BD1646 (site_id), PRIMARY KEY(unit_type_id, site_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sites (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE parkings (id INT AUTO_INCREMENT NOT NULL, site_id INT DEFAULT NULL, parking_type_id INT DEFAULT NULL, no VARCHAR(255) NOT NULL, INDEX IDX_AB6C607BF6BD1646 (site_id), INDEX IDX_AB6C607B4BA67449 (parking_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE units (id INT AUTO_INCREMENT NOT NULL, building_id INT DEFAULT NULL, unit_type_id INT DEFAULT NULL, no VARCHAR(255) NOT NULL, INDEX IDX_E9B074494D2A7E12 (building_id), INDEX IDX_E9B0744991058251 (unit_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE buildings (id INT AUTO_INCREMENT NOT NULL, site_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_9A51B6A7F6BD1646 (site_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cities (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, code INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE countries (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, iso VARCHAR(15) DEFAULT NULL, code INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE address (id INT AUTO_INCREMENT NOT NULL, state_id INT DEFAULT NULL, city_id INT DEFAULT NULL, country_id INT DEFAULT NULL, person_id INT DEFAULT NULL, site_id INT DEFAULT NULL, streetNumber INT NOT NULL, street VARCHAR(255) NOT NULL, zipCode VARCHAR(15) DEFAULT NULL, INDEX IDX_D4E6F815D83CC1 (state_id), INDEX IDX_D4E6F818BAC62AF (city_id), INDEX IDX_D4E6F81F92F3E70 (country_id), INDEX IDX_D4E6F81217BBB47 (person_id), INDEX IDX_D4E6F81F6BD1646 (site_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE phone_numbers (id INT AUTO_INCREMENT NOT NULL, person_id INT DEFAULT NULL, site_id INT DEFAULT NULL, contact VARCHAR(255) NOT NULL, type VARCHAR(255) DEFAULT NULL, phone_number VARCHAR(255) NOT NULL, INDEX IDX_E7DC46CB217BBB47 (person_id), INDEX IDX_E7DC46CBF6BD1646 (site_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE states (id INT AUTO_INCREMENT NOT NULL, country_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, code VARCHAR(15) DEFAULT NULL, INDEX IDX_31C2774DF92F3E70 (country_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contract (id INT AUTO_INCREMENT NOT NULL, client_id INT NOT NULL, unit_id INT DEFAULT NULL, parking_id INT DEFAULT NULL, dateEntry DATETIME NOT NULL, dateLeaving DATETIME NOT NULL, price NUMERIC(10, 0) NOT NULL, INDEX IDX_E98F285919EB6921 (client_id), INDEX IDX_E98F2859F8BD700D (unit_id), INDEX IDX_E98F2859F17B2DD (parking_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE clients ADD CONSTRAINT FK_C82E74217BBB47 FOREIGN KEY (person_id) REFERENCES persons (id)');
        $this->addSql('ALTER TABLE vehicules ADD CONSTRAINT FK_78218C2DF17B2DD FOREIGN KEY (parking_id) REFERENCES parkings (id)');
        $this->addSql('ALTER TABLE parking_type_sites ADD CONSTRAINT FK_AEA8FD2F4BA67449 FOREIGN KEY (parking_type_id) REFERENCES parking_types (id)');
        $this->addSql('ALTER TABLE parking_type_sites ADD CONSTRAINT FK_AEA8FD2FF6BD1646 FOREIGN KEY (site_id) REFERENCES sites (id)');
        $this->addSql('ALTER TABLE unit_types_sites ADD CONSTRAINT FK_8695140991058251 FOREIGN KEY (unit_type_id) REFERENCES unit_types (id)');
        $this->addSql('ALTER TABLE unit_types_sites ADD CONSTRAINT FK_86951409F6BD1646 FOREIGN KEY (site_id) REFERENCES sites (id)');
        $this->addSql('ALTER TABLE parkings ADD CONSTRAINT FK_AB6C607BF6BD1646 FOREIGN KEY (site_id) REFERENCES sites (id)');
        $this->addSql('ALTER TABLE parkings ADD CONSTRAINT FK_AB6C607B4BA67449 FOREIGN KEY (parking_type_id) REFERENCES parking_types (id)');
        $this->addSql('ALTER TABLE units ADD CONSTRAINT FK_E9B074494D2A7E12 FOREIGN KEY (building_id) REFERENCES buildings (id)');
        $this->addSql('ALTER TABLE units ADD CONSTRAINT FK_E9B0744991058251 FOREIGN KEY (unit_type_id) REFERENCES unit_types (id)');
        $this->addSql('ALTER TABLE buildings ADD CONSTRAINT FK_9A51B6A7F6BD1646 FOREIGN KEY (site_id) REFERENCES sites (id)');
        $this->addSql('ALTER TABLE address ADD CONSTRAINT FK_D4E6F815D83CC1 FOREIGN KEY (state_id) REFERENCES states (id)');
        $this->addSql('ALTER TABLE address ADD CONSTRAINT FK_D4E6F818BAC62AF FOREIGN KEY (city_id) REFERENCES cities (id)');
        $this->addSql('ALTER TABLE address ADD CONSTRAINT FK_D4E6F81F92F3E70 FOREIGN KEY (country_id) REFERENCES countries (id)');
        $this->addSql('ALTER TABLE address ADD CONSTRAINT FK_D4E6F81217BBB47 FOREIGN KEY (person_id) REFERENCES persons (id)');
        $this->addSql('ALTER TABLE address ADD CONSTRAINT FK_D4E6F81F6BD1646 FOREIGN KEY (site_id) REFERENCES sites (id)');
        $this->addSql('ALTER TABLE phone_numbers ADD CONSTRAINT FK_E7DC46CB217BBB47 FOREIGN KEY (person_id) REFERENCES persons (id)');
        $this->addSql('ALTER TABLE phone_numbers ADD CONSTRAINT FK_E7DC46CBF6BD1646 FOREIGN KEY (site_id) REFERENCES sites (id)');
        $this->addSql('ALTER TABLE states ADD CONSTRAINT FK_31C2774DF92F3E70 FOREIGN KEY (country_id) REFERENCES countries (id)');
        $this->addSql('ALTER TABLE contract ADD CONSTRAINT FK_E98F285919EB6921 FOREIGN KEY (client_id) REFERENCES clients (id)');
        $this->addSql('ALTER TABLE contract ADD CONSTRAINT FK_E98F2859F8BD700D FOREIGN KEY (unit_id) REFERENCES units (id)');
        $this->addSql('ALTER TABLE contract ADD CONSTRAINT FK_E98F2859F17B2DD FOREIGN KEY (parking_id) REFERENCES parkings (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE contract DROP FOREIGN KEY FK_E98F285919EB6921');
        $this->addSql('ALTER TABLE clients DROP FOREIGN KEY FK_C82E74217BBB47');
        $this->addSql('ALTER TABLE address DROP FOREIGN KEY FK_D4E6F81217BBB47');
        $this->addSql('ALTER TABLE phone_numbers DROP FOREIGN KEY FK_E7DC46CB217BBB47');
        $this->addSql('ALTER TABLE parking_type_sites DROP FOREIGN KEY FK_AEA8FD2F4BA67449');
        $this->addSql('ALTER TABLE parkings DROP FOREIGN KEY FK_AB6C607B4BA67449');
        $this->addSql('ALTER TABLE unit_types_sites DROP FOREIGN KEY FK_8695140991058251');
        $this->addSql('ALTER TABLE units DROP FOREIGN KEY FK_E9B0744991058251');
        $this->addSql('ALTER TABLE parking_type_sites DROP FOREIGN KEY FK_AEA8FD2FF6BD1646');
        $this->addSql('ALTER TABLE unit_types_sites DROP FOREIGN KEY FK_86951409F6BD1646');
        $this->addSql('ALTER TABLE parkings DROP FOREIGN KEY FK_AB6C607BF6BD1646');
        $this->addSql('ALTER TABLE buildings DROP FOREIGN KEY FK_9A51B6A7F6BD1646');
        $this->addSql('ALTER TABLE address DROP FOREIGN KEY FK_D4E6F81F6BD1646');
        $this->addSql('ALTER TABLE phone_numbers DROP FOREIGN KEY FK_E7DC46CBF6BD1646');
        $this->addSql('ALTER TABLE vehicules DROP FOREIGN KEY FK_78218C2DF17B2DD');
        $this->addSql('ALTER TABLE contract DROP FOREIGN KEY FK_E98F2859F17B2DD');
        $this->addSql('ALTER TABLE contract DROP FOREIGN KEY FK_E98F2859F8BD700D');
        $this->addSql('ALTER TABLE units DROP FOREIGN KEY FK_E9B074494D2A7E12');
        $this->addSql('ALTER TABLE address DROP FOREIGN KEY FK_D4E6F818BAC62AF');
        $this->addSql('ALTER TABLE address DROP FOREIGN KEY FK_D4E6F81F92F3E70');
        $this->addSql('ALTER TABLE states DROP FOREIGN KEY FK_31C2774DF92F3E70');
        $this->addSql('ALTER TABLE address DROP FOREIGN KEY FK_D4E6F815D83CC1');
        $this->addSql('DROP TABLE clients');
        $this->addSql('DROP TABLE persons');
        $this->addSql('DROP TABLE vehicules');
        $this->addSql('DROP TABLE parking_types');
        $this->addSql('DROP TABLE parking_type_sites');
        $this->addSql('DROP TABLE unit_types');
        $this->addSql('DROP TABLE unit_types_sites');
        $this->addSql('DROP TABLE sites');
        $this->addSql('DROP TABLE parkings');
        $this->addSql('DROP TABLE units');
        $this->addSql('DROP TABLE buildings');
        $this->addSql('DROP TABLE cities');
        $this->addSql('DROP TABLE countries');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE phone_numbers');
        $this->addSql('DROP TABLE states');
        $this->addSql('DROP TABLE contract');
    }
}
