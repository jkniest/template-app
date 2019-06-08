<?php

declare(strict_types=1);

namespace Tests\Api;

use Tests\TestCase;
use Laravel\Scout\Builder;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Database\Eloquent\Collection;

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
        $response->assertOk();

        foreach ($expected as $item) {
            $this->assertStringContainsString($item->uuid, $response->content());
        }

        foreach ($unexpected as $item) {
            $this->assertStringNotContainsString($item->uuid, $response->content());
        }
    }

    protected function browseWithSearch(string $resourceName, array $expected, array $unexpected): void
    {
        $builder = $this->prophesize(Builder::class);
        $this->app->bind(Builder::class, static function () use ($builder) {
            return $builder->reveal();
        });
        $builder->get()->willReturn(new Collection($expected));

        $response = $this->getJson(route("api.{$resourceName}.browse", ['search' => 'Something']));
        $response->assertOk();

        foreach ($expected as $item) {
            $this->assertStringContainsString($item->uuid, $response->content());
        }

        foreach ($unexpected as $item) {
            $this->assertStringNotContainsString($item->uuid, $response->content());
        }
    }

    protected function browseUnauthenticated(string $resourceName): void
    {
        $this->getJson(route("api.{$resourceName}.browse"))->assertStatus(401);
    }
}
