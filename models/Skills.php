<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "skills".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Worker[] $workers
 */
class Skills extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'skills';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
          [['name'], 'required'],
          [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
          'id' => 'ID',
          'name' => 'Name',
        ];
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorkers()
    {
        return $this->hasMany(Worker::className(), ['id' => 'worker_id'])->viaTable('worker_skills',
          ['skills_id' => 'id']);
    }
}
