<?php

declare(strict_types=1);

namespace Tests\Api;

use Tests\TestCase;
use Illuminate\Contracts\Support\Arrayable;

abstract class BrowseApiTestCase extends TestCase
{
    public function browse(string $resourceName, Arrayable $resources): void
    {
        $response = $this->getJson(route("api.{$resourceName}.browse"));
        $response->assertOk();

        $response->assertJsonStructure([
            'data',
            'links',
            'meta',
        ]);

        $data = $response->json('data');
        $this->assertCount(15, $data);
        for ($i = 0; $i < 15; ++$i) {
            $this->assertSame($resources[$i]->uuid, $data[$i]['uuid']);
        }

        $responsePage2 = $this->getJson(route("api.{$resourceName}.browse", ['page' => 2]));
        $responsePage2->assertOk();

        $dataPage2 = $responsePage2->json('data');
        $this->assertCount(5, $dataPage2);
        for ($i = 15; $i < 20; ++$i) {
            $this->assertSame($resources[$i]->uuid, $dataPage2[$i - 15]['uuid']);
        }
    }

    protected function browseWithFilter(string $resourceName, array $expected, array $unexpected, array $filters): void
    {
        $filters = collect($filters)->mapWithKeys(static function ($item, $key) {
            return ["filter[{$key}]" => $item];
        })->toArray();

        $response = $this->getJson(route("api.{$resourceName}.browse", $filters));
        $data = $response->json('data');

        foreach ($expected as $item) {
            $this->assertStringContainsString($item->uuid, $response->content());
        }

        foreach ($unexpected as $item) {
            $this->assertStringNotContainsString($item->uuid, $response->content());
        }
    }
}
