<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spectator\Spectator;
use Tests\TestCase;

class ApiFetchTest extends TestCase
{

    /**
     * /api/sampleのPOSTメソッドのレスポンス200を検証するテスト
     */
    public function test_spec_post_sample_200()
    {
        Spectator::using('openapi.yaml');
        $this->postJson('/api/sample', ['id' => 1])
            ->assertValidRequest()
            ->assertValidResponse(200);
    }
}