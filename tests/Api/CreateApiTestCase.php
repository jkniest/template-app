<?php

declare(strict_types=1);

namespace Tests\Api;

use Tests\TestCase;

class CreateApiTestCase extends TestCase
{
    public function create(string $resourceName, string $class, array $params): void
    {
        $response = $this->postJson(route("api.{$resourceName}.store"), $params);

        $response->assertOk();
        $response->assertJsonStructure([
            'message',
            'data',
        ]);

        $this->assertCount(1, $class::all());

        $data = $response->json('data');
        $this->assertSame($class::first()->uuid, $data['uuid']);
    }

    public function createWithValidation(string $resourceName, string $class, array $valid, array $changes): void
    {
        $response = $this->postJson(route("api.{$resourceName}.store"), array_merge($valid, $changes));
        $response->assertJsonValidationErrors(array_keys($changes));

        $this->assertCount(0, $class::all());
        $response->assertJsonStructure([
            'message',
            'errors',
        ]);
    }
}
