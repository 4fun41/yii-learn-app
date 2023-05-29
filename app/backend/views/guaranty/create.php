<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Guaranty $model */

$this->title = 'Create Guaranty';
$this->params['breadcrumbs'][] = ['label' => 'Guaranties', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guaranty-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
