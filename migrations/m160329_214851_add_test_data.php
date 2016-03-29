<?php

use yii\db\Migration;

class m160329_214851_add_test_data extends Migration
{
    public function up()
    {
        $this->execute("
            INSERT INTO `group` (`id`, `name`) VALUES
            (1, '1'),
            (2, '2'),
            (3, '3'),
            (4, '4');

            INSERT INTO `skills` (`id`, `name`) VALUES
            (1, 'a'),
            (2, 'b'),
            (3, 'c');

            INSERT INTO `worker` (`id`, `first_name`, `last_name`, `is_present`) VALUES
            (1, 'Иван', 'Иванов', 1),
            (2, 'Иван ', 'Сидоров', 0),
            (3, 'Иван', 'Петров', 1),
            (4, 'Петр', 'Александров', 0);

            INSERT INTO `worker_group` (`worker_id`, `group_id`) VALUES
            (1, 1),
            (2, 1),
            (4, 2),
            (3, 3),
            (3, 4);

            INSERT INTO `worker_skills` (`worker_id`, `skills_id`) VALUES
            (1, 1),
            (2, 2),
            (3, 3),
            (4, 3);
        ");
    }

    public function down()
    {
        $this->execute("
            TRUNCATE TABLE `worker_group`;
            TRUNCATE TABLE `worker_skills`;
            TRUNCATE TABLE `group`;
            TRUNCATE TABLE `skills`;
            TRUNCATE TABLE `worker`;
        ");
    }

}