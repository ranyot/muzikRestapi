<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Muzik */

$this->title = 'Create Muzik';
$this->params['breadcrumbs'][] = ['label' => 'Muziks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="muzik-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
