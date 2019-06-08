<?php

declare(strict_types=1);

namespace Tests\Api;

use Tests\TestCase;
use Illuminate\Database\Eloquent\Model;

abstract class ReadApiTestCase extends TestCase
{
    protected function read(string $resourceName, Model $model): void
    {
        $response = $this->getJson(route("api.{$resourceName}.read", $model->getKey()));
        $response->assertOk();

        $response->assertJsonStructure(['data']);
        $this->assertSame($model->getKey(), $response->json('data.uuid'));
    }

    protected function readUnauthenticated(string $resourceName, Model $model): void
    {
        $this->getJson(route("api.{$resourceName}.read", $model->getKey()))
            ->assertStatus(401);
    }
}
