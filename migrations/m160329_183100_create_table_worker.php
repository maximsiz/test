<?php

use yii\db\Migration;

class m160329_183100_create_table_worker extends Migration
{
    public function up()
    {
        $this->createTable('worker', [
          'id' => $this->primaryKey(),
          'first_name' => $this->string(),
          'last_name' => $this->string()->notNull(),
          'is_present' => $this->boolean(),
        ]);
    }

    public function down()
    {
        $this->dropTable('worker');
    }
}
