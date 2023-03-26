<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Fruit table
 */
final class Version20230326172509 extends AbstractMigration
{
    /**
     * Returns the description
     *
     * @return string
     */
    public function getDescription(): string
    {
        return 'Fruit table';
    }

    /**
     * Applies changes
     *
     * @param Schema $schema
     *
     * @return void
     */
    public function up(Schema $schema): void
    {
        $this->addSql('
            CREATE TABLE fruit (
                id            INT AUTO_INCREMENT NOT NULL, 
                external_id   INT DEFAULT NULL, 
                name          VARCHAR(255) NOT NULL, 
                family        VARCHAR(255) NOT NULL, 
                genus         VARCHAR(255) NOT NULL, 
                `order`       VARCHAR(255) NOT NULL, 
                carbohydrates DOUBLE PRECISION DEFAULT NULL, 
                protein       DOUBLE PRECISION DEFAULT NULL, 
                fat           DOUBLE PRECISION DEFAULT NULL, 
                calories      DOUBLE PRECISION DEFAULT NULL, 
                sugar         DOUBLE PRECISION DEFAULT NULL, 
                PRIMARY KEY(id)
           ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        ');
    }

    /**
     * Rolls back changes
     *
     * @param Schema $schema
     *
     * @return void
     */
    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE fruit');
    }
}
