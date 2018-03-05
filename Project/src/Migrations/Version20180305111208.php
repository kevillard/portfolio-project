<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180305111208 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE competence (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE me ADD competences_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE me ADD CONSTRAINT FK_AC5292C2A660B158 FOREIGN KEY (competences_id) REFERENCES competence (id)');
        $this->addSql('CREATE INDEX IDX_AC5292C2A660B158 ON me (competences_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE me DROP FOREIGN KEY FK_AC5292C2A660B158');
        $this->addSql('DROP TABLE competence');
        $this->addSql('DROP INDEX IDX_AC5292C2A660B158 ON me');
        $this->addSql('ALTER TABLE me DROP competences_id');
    }
}
