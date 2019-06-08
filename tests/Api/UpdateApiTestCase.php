<?php

declare(strict_types=1);

namespace Tests\Api;

use Tests\TestCase;
use Illuminate\Database\Eloquent\Model;

abstract class UpdateApiTestCase extends TestCase
{
    protected function update(string $resourceName, Model $model, array $validData): void
    {
        $response = $this->patchJson(route("api.{$resourceName}.update", $model->getKey()), $validData);
        $response->assertOk();

        $model->refresh();
        foreach ($validData as $key => $value) {
            $this->assertSame($value, $model->{$key});
        }

        $response->assertJsonStructure(['message', 'data']);
        $this->assertSame($model->uuid, $response->json('data.uuid'));
    }

    protected function updateWithValidation(string $resourceName, Model $model, array $validData, array $changes): void
    {
        $data = array_merge($validData, $changes);
        $response = $this->patchJson(
            route("api.{$resourceName}.update", $model->getKey()),
            $data
        );
        $response->assertJsonValidationErrors(array_keys($changes));

        $model->refresh();
        foreach ($data as $key => $value) {
            $this->assertNotSame($value, $model->{$key});
        }

        $response->assertJsonStructure(['message', 'errors']);
    }

    protected function updateUnauthenticated(string $resourceName, Model $model, array $validData): void
    {
        $this->patchJson(route("api.{$resourceName}.update", $model->getKey()), $validData)
            ->assertStatus(401);
    }

    protected function updateUnauthorized(string $resourceName, Model $model, array $validData): void
    {
        $this->patchJson(route("api.{$resourceName}.update", $model->getKey()), $validData)
            ->assertStatus(403);
    }
}
