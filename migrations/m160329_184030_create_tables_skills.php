<?php

use yii\db\Migration;

class m160329_184030_create_tables_skills extends Migration
{
    public function up()
    {
        $this->createTable('skills', [
          'id' => $this->primaryKey(),
          'name' => $this->string()->notNull()
        ]);

        $this->createTable('worker_skills', [
          'worker_id' => $this->integer()->notNull(),
          'skills_id' => $this->integer()->notNull()
        ]);

        $this->addPrimaryKey('pk_worker_skills', 'worker_skills', ['worker_id', 'skills_id']);

        $this->addForeignKey('fk_worker_skills_worker', 'worker_skills', 'worker_id', 'worker', 'id', 'CASCADE',
          'RESTRICT');
        $this->addForeignKey('fk_worker_skills_skills', 'worker_skills', 'skills_id', 'skills', 'id', 'CASCADE',
          'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('worker_skills');
        $this->dropTable('skills');
    }
}
