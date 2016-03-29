<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "worker".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property integer $is_present
 *
 * @property Group[] $groups
 * @property Skills[] $skills
 */
class Worker extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'worker';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
          [['last_name'], 'required'],
          [['is_present'], 'integer'],
          [['first_name', 'last_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
          'id' => 'ID',
          'first_name' => 'Имя',
          'last_name' => 'Фамилия',
          'is_present' => 'На месте',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorkerGroups()
    {
        return $this->hasMany(WorkerGroup::className(), ['worker_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroups()
    {
        return $this->hasMany(Group::className(), ['id' => 'group_id'])->viaTable('worker_group',
          ['worker_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorkerSkills()
    {
        return $this->hasMany(WorkerSkills::className(), ['worker_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSkills()
    {
        return $this->hasMany(Skills::className(), ['id' => 'skills_id'])->viaTable('worker_skills',
          ['worker_id' => 'id']);
    }
}
