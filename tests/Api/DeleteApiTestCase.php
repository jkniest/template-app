<?php

declare(strict_types=1);

namespace Tests\Api;

use Tests\TestCase;
use Illuminate\Database\Eloquent\Model;

class DeleteApiTestCase extends TestCase
{
    public function destroy(Model $model, string $resourceName): void
    {
        $response = $this->deleteJson(route("api.{$resourceName}.destroy", $model->getKey()));
        $response->assertOk();

        $this->assertNull($model->fresh());
        $response->assertJsonStructure(['message']);
    }
}
