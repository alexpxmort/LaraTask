<?php

namespace Tests\Unit;

use App\Domain\Entity\UserEntity;
use PHPUnit\Framework\TestCase;

class UserEntityTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_should_instanciate_class_user_entity()
    {
        $user = new UserEntity([
            'name'=> 'test',
            'email' => 'test@gmail.com',
            'password' => '123456'
        ]);

        $this->assertInstanceOf(UserEntity::class,$user);
        $this->assertTrue($user->getName() === 'test');
        $this->assertTrue($user->getEmail() === 'test@gmail.com');
        $this->assertTrue($user->getPassword() === '123456');
    }
}
