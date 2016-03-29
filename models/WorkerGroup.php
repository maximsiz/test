<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "worker_group".
 *
 * @property integer $worker_id
 * @property integer $group_id
 *
 * @property Group $group
 * @property Worker $worker
 */
class WorkerGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'worker_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
          [['worker_id', 'group_id'], 'required'],
          [['worker_id', 'group_id'], 'integer'],
          [
            ['group_id'],
            'exist',
            'skipOnError' => true,
            'targetClass' => Group::className(),
            'targetAttribute' => ['group_id' => 'id']
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
          'group_id' => 'Group ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(Group::className(), ['id' => 'group_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorker()
    {
        return $this->hasOne(Worker::className(), ['id' => 'worker_id']);
    }
}
