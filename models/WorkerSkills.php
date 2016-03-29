<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "worker_skills".
 *
 * @property integer $worker_id
 * @property integer $skills_id
 *
 * @property Skills $skills
 * @property Worker $worker
 */
class WorkerSkills extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'worker_skills';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
          [['worker_id', 'skills_id'], 'required'],
          [['worker_id', 'skills_id'], 'integer'],
          [
            ['skills_id'],
            'exist',
            'skipOnError' => true,
            'targetClass' => Skills::className(),
            'targetAttribute' => ['skills_id' => 'id']
          ],
          [
            ['worker_id'],
            'exist',
            'skipOnError' => true,
            'targetClass' => Worker::className(),
            'targetAttribute' => ['worker_id' => 'id']
          ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
          'worker_id' => 'Worker ID',
          'skills_id' => 'Skills ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSkills()
    {
        return $this->hasOne(Skills::className(), ['id' => 'skills_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorker()
    {
        return $this->hasOne(Worker::className(), ['id' => 'worker_id']);
    }
}
