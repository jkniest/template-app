<?php

declare(strict_types=1);

namespace Tests\Unit\Models;

use Tests\TestCase;
use Ramsey\Uuid\Uuid;
use App\Domain\Users\Models\User;
use Illuminate\Database\Eloquent\Collection;

class HasUuidTest extends TestCase
{
    /** @test */
    public function it_changes_the_keyname_to_uuid(): void
    {
        $this->assertSame('uuid', (new User())->getKeyName());
    }

    /** @test */
    public function it_disables_incrementing_of_the_id(): void
    {
        $this->assertFalse((new User())->getIncrementing());
    }

    /** @test */
    public function it_generates_a_uuid_when_creating_a_model(): void
    {
        /** @var Collection $users */
        $users = factory(User::class, 100)->create();

        $uuids = $users->pluck('uuid');
        $unique = $uuids->unique();

        $this->assertCount($uuids->count(), $unique);

        // Validate, that the uuid is valid
        Uuid::fromString($uuids[0]);
    }
}
