<?php

namespace tests\unit;

use PHPUnit\Framework\TestCase;
use app\models\LoginForm;
use Yii;


require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

class MyTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Yii::setAlias('@tests', __DIR__);
    }

    public function testValidLogin()
    {
        $model = new LoginForm([
            'login' => 'antony@gmail.com', 
            'password' => '1234567',
        ]);

        $this->assertTrue($model->login(), 'Авторизація повинна пройти успішно для правильних облікових даних.');
    }

    public function testInvalidLogin()
    {
        $model = new LoginForm([
            'login' => 'invalidUser',
            'password' => 'invalidPassword',
        ]);

        $this->assertFalse($model->login(), 'Авторизація повинна бути невдалою для неправильних облікових даних.');
        $this->assertNotEmpty($model->getErrors('password'), 'Помилки мають бути присутні для неправильних облікових даних.');
    }

    public function testEmptyCredentials()
    {
        $model = new LoginForm([
            'login' => '',
            'password' => '',
        ]);

        $this->assertFalse($model->login(), 'Авторизація повинна бути невдалою, якщо облікові дані пусті.');
        $this->assertNotEmpty($model->getErrors('login'), 'Має бути помилка про відсутність логіну.');
        $this->assertNotEmpty($model->getErrors('password'), 'Має бути помилка про відсутність пароля.');
    }
}
