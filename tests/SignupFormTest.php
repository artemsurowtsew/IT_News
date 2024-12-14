<?php
namespace tests\unit;

use PHPUnit\Framework\TestCase;
use app\models\SignupForm;
use app\models\User;

class SignupFormTest extends TestCase
{
    public function testSuccessfulSignup()
    {
        $model = new SignupForm();
        $model->attributes = [
            'name' => 'Test User',
            'login' => 'test@example.com',
            'password' => 'testpassword',
        ];

    
        $this->assertTrue($model->validate(), 'Модель повинна пройти валідацію.');

   
        $user = $model->signup();

       
        $this->assertNotNull($user, 'Користувач повинен бути створений.');
        $this->assertInstanceOf(User::class, $user, 'Повернене значення повинно бути об\'єктом User.');
        $this->assertEquals('Test User', $user->name, 'Ім\'я користувача повинно збігатися.');
        $this->assertEquals('test@example.com', $user->login, 'Логін користувача повинен збігатися.');
    }

    public function testSignupValidationFails()
    {
     
        $model = new SignupForm();
        $model->attributes = [
            'name' => '',
            'login' => 'invalid-email',
            'password' => 'short',
        ];


        $this->assertFalse($model->validate(), 'Модель не повинна пройти валідацію.');
        $this->assertArrayHasKey('name', $model->errors, 'Поле name повинно мати помилку.');
        $this->assertArrayHasKey('login', $model->errors, 'Поле login повинно мати помилку.');
        $this->assertArrayHasKey('password', $model->errors, 'Поле password повинно мати помилку.');
    }
}
