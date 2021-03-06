<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\BorrowingRules;
use common\models\BorrowReturnBooks;

/* @var $this yii\web\View */
/* @var $model common\models\BorrowReturnBooks */

// $this->title = $model->id;
$this->title = '借还书信息';
$this->params['breadcrumbs'][] = ['label' => '借还书管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="borrow-return-books-view">

    <p>
        <?= Html::a('<i class="fa fa-edit"></i> 修改', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<i class="fa fa-trash-o"></i> 删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '删除本条记录，确定?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            //'reader_id',
            'card_number',
            'bar_code',
            [
                'label' => '操作',
                'value' => BorrowReturnBooks::getOperation($model),
            ],
            'library_id',
            'user_id',
            'created_at:datetime',
            'updated_at:datetime',
            //'status',
        ],
    ]) ?>

</div>
