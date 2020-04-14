<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200413182504 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE plant CHANGE location_addinfo location_addinfo VARCHAR(500) DEFAULT NULL, CHANGE temperature_addinfo temperature_addinfo VARCHAR(500) DEFAULT NULL, CHANGE pot pot VARCHAR(500) DEFAULT NULL, CHANGE watering_amount_addinfo watering_amount_addinfo VARCHAR(500) DEFAULT NULL, CHANGE substrate_addinfo substrate_addinfo VARCHAR(500) DEFAULT NULL, CHANGE fertiliser_addinfo fertiliser_addinfo VARCHAR(500) DEFAULT NULL, CHANGE flower_color flower_color VARCHAR(500) DEFAULT NULL, CHANGE heyday_addinfo heyday_addinfo VARCHAR(500) DEFAULT NULL, CHANGE care_tips care_tips VARCHAR(500) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE plant CHANGE location_addinfo location_addinfo VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE temperature_addinfo temperature_addinfo VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE pot pot VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE watering_amount_addinfo watering_amount_addinfo VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE substrate_addinfo substrate_addinfo VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE fertiliser_addinfo fertiliser_addinfo VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE flower_color flower_color VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE heyday_addinfo heyday_addinfo VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE care_tips care_tips VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
