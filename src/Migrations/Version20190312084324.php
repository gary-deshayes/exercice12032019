<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190312084324 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE candidature ADD id_offer_id INT NOT NULL');
        $this->addSql('ALTER TABLE candidature ADD CONSTRAINT FK_E33BD3B831D987B FOREIGN KEY (id_offer_id) REFERENCES offer (id)');
        $this->addSql('CREATE INDEX IDX_E33BD3B831D987B ON candidature (id_offer_id)');
        $this->addSql('ALTER TABLE offer ADD id_job_id INT NOT NULL, ADD id_contract_id INT NOT NULL');
        $this->addSql('ALTER TABLE offer ADD CONSTRAINT FK_29D6873E2DD7FB44 FOREIGN KEY (id_job_id) REFERENCES job (id)');
        $this->addSql('ALTER TABLE offer ADD CONSTRAINT FK_29D6873E3D642D0A FOREIGN KEY (id_contract_id) REFERENCES contract (id)');
        $this->addSql('CREATE INDEX IDX_29D6873E2DD7FB44 ON offer (id_job_id)');
        $this->addSql('CREATE INDEX IDX_29D6873E3D642D0A ON offer (id_contract_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE candidature DROP FOREIGN KEY FK_E33BD3B831D987B');
        $this->addSql('DROP INDEX IDX_E33BD3B831D987B ON candidature');
        $this->addSql('ALTER TABLE candidature DROP id_offer_id');
        $this->addSql('ALTER TABLE offer DROP FOREIGN KEY FK_29D6873E2DD7FB44');
        $this->addSql('ALTER TABLE offer DROP FOREIGN KEY FK_29D6873E3D642D0A');
        $this->addSql('DROP INDEX IDX_29D6873E2DD7FB44 ON offer');
        $this->addSql('DROP INDEX IDX_29D6873E3D642D0A ON offer');
        $this->addSql('ALTER TABLE offer DROP id_job_id, DROP id_contract_id');
    }
}
