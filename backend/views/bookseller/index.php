<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\BooksellerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '书商管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bookseller-index">

    <p>
        <?= Html::a('新增书商', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => ['class' => 'table-responsive'],
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'id',
                'headerOptions' => array('style'=>'width:10%;'),
            ],
            'title',
            'address',
            'contact',
            'mobile',

            [
                'attribute' => 'discount',
                'headerOptions' => array('style'=>'width:10%;'),
            ],
            //'library_id',
            //'user_id',
            //'created_at',
            //'updated_at',
            //'status',
            [
                'class' => 'yii\grid\ActionColumn',
                'headerOptions' => array('style'=>'width:10%;'),
            ],
        ],
    ]); ?>


</div>
