<?php

declare(strict_types=1);

namespace Tests\Api;

use Tests\TestCase;

class CreateApiTestCase extends TestCase
{
    public function create(string $resourceName, string $class, array $params): void
    {
        $before = $class::count();

        $response = $this->postJson(route("api.{$resourceName}.store"), $params);

        $response->assertOk();
        $response->assertJsonStructure([
            'message',
            'data',
        ]);

        $this->assertCount($before + 1, $class::all());
    }

    public function createWithValidation(string $resourceName, string $class, array $valid, array $changes): void
    {
        $before = $class::count();

        $response = $this->postJson(route("api.{$resourceName}.store"), array_merge($valid, $changes));
        $response->assertJsonValidationErrors(array_keys($changes));

        $this->assertCount($before, $class::all());
        $response->assertJsonStructure([
            'message',
            'errors',
        ]);
    }

    protected function createUnauthenticated(string $resourceName, string $class, array $data): void
    {
        $before = $class::count();

        $this->postJson(route("api.{$resourceName}.store"), $data)
            ->assertStatus(401);

        $this->assertCount($before, $class::all());
    }

    protected function createUnauthorized(string $resourceName, string $class, array $data): void
    {
        $before = $class::count();

        $this->postJson(route("api.{$resourceName}.store"), $data)
            ->assertStatus(403);

        $this->assertCount($before, $class::all());
    }
}
