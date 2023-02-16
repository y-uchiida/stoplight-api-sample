<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spectator\Spectator;
use Tests\TestCase;

class PostFetchTest extends TestCase
{
    /** @test */
    public function 投稿データを取得するエンドポイントから、データが取得できる() {
        // Spectator に、検証に利用するAPI 仕様書のファイルを読み込みさせる
        // ファイルパスの指定は、config/spectator.php で行っている
        Spectator::using('sample.yaml');

        $response = $this->getJson('/posts');
        $response->assertValidResponse(200);
    }

    /** @test */
    public function 特定の投稿データを取得するエンドポイントから、データが取得できる() {
        // Spectator に、検証に利用するAPI 仕様書のファイルを読み込みさせる
        // ファイルパスの指定は、config/spectator.php で行っている
        Spectator::using('sample.yaml');

        $response = $this->getJson('/api/posts/1');
        dump('user_1', $response->json());
        $response->assertValidResponse(200);
    }
}