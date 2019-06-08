<?php

declare(strict_types=1);

namespace Tests\Feature\Users\Api;

use Tests\Api\CreateApiTestCase;
use App\Domain\Users\Models\User;

class CreateUsersTest extends CreateApiTestCase
{
    /** @test */
    public function it_can_create_a_new_user(): void
    {
        $this->create('users', User::class, $this->validData());
    }

    /**
     * @test
     * @dataProvider inputProvider
     */
    public function it_validates_the_input(string $message, string $field, string $value): void
    {
        $this->createWithValidation(
            'users',
            User::class,
            $this->validData(),
            [$field => $value]
        );
    }

    public function inputProvider(): array
    {
        return [
            ['name is required', 'name', ''],
            ['name must be at least 3 characters', 'name', 'ab'],
            ['name must be at most 250 characters', 'name', str_repeat('a', 251)],
            ['email is required', 'email', ''],
            ['email must be valid', 'email', 'invalid email'],
            ['password is required', 'password', ''],
            ['password must be at least 8 characters', 'password', '1234567'],
            ['password must be at most 250 characters', 'password', str_repeat('a', 251)],
        ];
    }

    private function validData(): array
    {
        return [
            'name'     => 'John Doe',
            'email'    => 'john@example.com',
            'password' => 'newpassword',
        ];
    }
}
