<?php

use yii\db\Migration;

class m160329_183946_create_tables_group extends Migration
{
    public function up()
    {
        $this->createTable('group', [
          'id' => $this->primaryKey(),
          'name' => $this->string()->notNull()
        ]);

        $this->createTable('worker_group', [
          'worker_id' => $this->integer()->notNull(),
          'group_id' => $this->integer()->notNull()
        ]);

        $this->addPrimaryKey('pk_worker_group', 'worker_group', ['worker_id', 'group_id']);

        $this->addForeignKey('fk_worker_group_worker', 'worker_group', 'worker_id', 'worker', 'id', 'CASCADE',
          'RESTRICT');
        $this->addForeignKey('fk_worker_group_group', 'worker_group', 'group_id', 'group', 'id', 'CASCADE', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('worker_group');
        $this->dropTable('group');
    }
}
