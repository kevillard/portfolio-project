<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180221090839 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE category_projects (project_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_EBE937DF166D1F9C (project_id), INDEX IDX_EBE937DF12469DE2 (category_id), PRIMARY KEY(project_id, category_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE technology_projects (project_id INT NOT NULL, technology_id INT NOT NULL, INDEX IDX_7ED0EB58166D1F9C (project_id), INDEX IDX_7ED0EB584235D463 (technology_id), PRIMARY KEY(project_id, technology_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE creator_projects (project_id INT NOT NULL, creator_id INT NOT NULL, INDEX IDX_B759438166D1F9C (project_id), INDEX IDX_B75943861220EA6 (creator_id), PRIMARY KEY(project_id, creator_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE category_projects ADD CONSTRAINT FK_EBE937DF166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)');
        $this->addSql('ALTER TABLE category_projects ADD CONSTRAINT FK_EBE937DF12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE technology_projects ADD CONSTRAINT FK_7ED0EB58166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)');
        $this->addSql('ALTER TABLE technology_projects ADD CONSTRAINT FK_7ED0EB584235D463 FOREIGN KEY (technology_id) REFERENCES technology (id)');
        $this->addSql('ALTER TABLE creator_projects ADD CONSTRAINT FK_B759438166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)');
        $this->addSql('ALTER TABLE creator_projects ADD CONSTRAINT FK_B75943861220EA6 FOREIGN KEY (creator_id) REFERENCES creator (id)');
        $this->addSql('ALTER TABLE project DROP categories, DROP technologies, DROP creators');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE category_projects');
        $this->addSql('DROP TABLE technology_projects');
        $this->addSql('DROP TABLE creator_projects');
        $this->addSql('ALTER TABLE project ADD categories VARCHAR(100) NOT NULL COLLATE utf8_unicode_ci, ADD technologies VARCHAR(100) NOT NULL COLLATE utf8_unicode_ci, ADD creators VARCHAR(100) NOT NULL COLLATE utf8_unicode_ci');
    }
}
