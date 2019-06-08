<?php

declare(strict_types=1);

namespace Tests\Feature\Users\Api;

use Tests\Api\UpdateApiTestCase;
use App\Domain\Users\Models\User;

class UpdateUsersTest extends UpdateApiTestCase
{
    /** @test */
    public function it_can_update_specific_users(): void
    {
        $this->signInApi();
        $this->update('users', factory(User::class)->create(), $this->validData());
    }

    /**
     * @test
     * @dataProvider inputProvider
     */
    public function it_validates_the_input(string $message, string $field, ?string $value): void
    {
        $this->signInApi();
        $user = factory(User::class)->create();

        $this->updateWithValidation(
            'users',
            $user,
            $this->validData(),
            [$field => $value]
        );
    }

    /** @test */
    public function it_requires_an_authenticated_user(): void
    {
        $this->updateUnauthenticated('users', factory(User::class)->create(), $this->validData());
    }

    /** @test */
    public function it_prevents_normal_users_from_updating_other_users(): void
    {
        $this->signInApi(factory(User::class)->create());
        $user = factory(User::class)->create();

        $this->updateUnauthorized('users', $user, $this->validData());
    }

    /** @test */
    public function it_allows_administrators_to_update_all_users(): void
    {
        $this->signInApi();
        $user = factory(User::class)->create();
        $this->update('users', $user, $this->validData());
    }

    /** @test */
    public function it_allows_users_to_update_themself(): void
    {
        $user = factory(User::class)->create();
        $this->signInApi($user);
        $this->update('users', $user, $this->validData());
    }

    public function inputProvider(): array
    {
        return [
            ['name must be at least 3 characters', 'name', 'ab'],
            ['name must be at most 250 characters', 'name', str_repeat('a', 251)],
            ['email must be valid', 'email', 'invalid email'],
        ];
    }

    private function validData(): array
    {
        return [
            'name'  => 'Queen Bob',
            'email' => 'queen123@example.com',
        ];
    }
}
