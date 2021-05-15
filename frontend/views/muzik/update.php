<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Muzik */

$this->title = 'Update Muzik: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Muziks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="muzik-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
