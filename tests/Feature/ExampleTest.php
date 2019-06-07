<?php

declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * @testf
     *
     * @test
     */
    public function it_can_call_the_front_page(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
