<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180212192011 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE technology (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE project ADD logo VARCHAR(100) NOT NULL, ADD fullpagepsd1 VARCHAR(100) NOT NULL, ADD fullpagepsd2 VARCHAR(100) NOT NULL, ADD createurs VARCHAR(100) NOT NULL, ADD image_desktop VARCHAR(100) NOT NULL, ADD image_tablet VARCHAR(100) NOT NULL, ADD categories VARCHAR(100) NOT NULL, ADD technologies VARCHAR(100) NOT NULL, ADD creators VARCHAR(100) NOT NULL, ADD image_smartphone VARCHAR(100) NOT NULL');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE technology');
        $this->addSql('ALTER TABLE project DROP logo, DROP fullpagepsd1, DROP fullpagepsd2, DROP createurs, DROP image_desktop, DROP image_tablet, DROP categories, DROP technologies, DROP creators, DROP image_smartphone');
    }
}
