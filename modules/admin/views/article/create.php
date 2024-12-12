<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Article */
/* @var $topics array */ // Додаємо це, щоб вказати, що ми очікуємо змінну $topics

$this->title = 'Створити Статтю';
$this->params['breadcrumbs'][] = ['label' => 'Статті', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
    // Якщо у вас форма знаходиться прямо в цьому файлі, переконайтеся, що ви використовуєте змінну $topics
    $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'date')->input('date') ?>

    <?= $form->field($model, 'image')->fileInput() ?>

    <?= $form->field($model, 'tag')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'topic_id')->dropDownList($topics, ['prompt' => 'Виберіть тему']) ?>

    <!-- Поле user_id автоматично заповнюється -->

    <div class="form-group">
        <?= Html::submitButton('Зберегти', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
