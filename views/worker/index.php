<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Worker;
use app\models\Group;
use app\models\Skills;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\WorkerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Сотрудники';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="worker-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
      'dataProvider' => $dataProvider,
      'filterModel' => $searchModel,
      'columns' => [
        'last_name',
        [
          'label' => 'Группы',
          'attribute' => 'group_id',
          'filter' => Group::find()->select(['name', 'id'])->indexBy('id')->column(),
          'value' => function (Worker $worker) {
              return implode(', ', ArrayHelper::map($worker->groups, 'id', 'name'));
          },
        ],
        [
          'label' => 'Навыки',
          'attribute' => 'skills_id',
          'filter' => Skills::find()->select(['name', 'id'])->indexBy('id')->column(),
          'value' => function (Worker $worker) {
              return implode(', ', ArrayHelper::map($worker->skills, 'id', 'name'));
          },
        ],
        [
          'attribute' => 'is_present',
          'filter' => [1 => 'Да', 0 => 'Нет'],
          'format' => 'boolean'
        ]
      ],
    ]); ?>
</div>
