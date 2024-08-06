<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class PlannedEntryLabelsTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $this->table('planned_entry_labels', ['id' => false, 'primary_key' => ['planned_entry_id', 'labels_id']])
            ->addColumn('planned_entry_id', 'integer', ['null' => false])
            ->addColumn('labels_id', 'integer', ['null' => false])
            ->addColumn('created_at', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('updated_at', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('date_time', 'datetime')
            ->create();
    }
}