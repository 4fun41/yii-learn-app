<?php

use common\models\Client;
use common\models\OrderType;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Order $model */
/** @var yii\widgets\ActiveForm $form */

// todo client_id Реализовать создание пользователя на этой же странице.
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'order_type_id')->dropDownList(OrderType::getList()) ?>

    <?= $form->field($model, 'client_id')->dropDownList(Client::getList()) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'guaranty')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
