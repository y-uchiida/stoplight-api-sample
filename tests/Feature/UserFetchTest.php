<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spectator\Spectator;
use Tests\TestCase;

class UserFetchTest extends TestCase
{
    /** @test */
    public function ユーザー一覧を取得するエンドポイントから、ユーザー一覧が取得できる() {
        // Spectator に、検証に利用するAPI 仕様書のファイルを読み込みさせる
        // ファイルパスの指定は、config/spectator.php で行っている
        Spectator::using('sample.yaml');

        $response = $this->getJson('/api/users');
        $response->assertValidResponse(200);
    }

    /** @test */
    public function 特定のユーザーを取得するエンドポイントから、ユーザー情報が取得できる() {
        // Spectator に、検証に利用するAPI 仕様書のファイルを読み込みさせる
        // ファイルパスの指定は、config/spectator.php で行っている
        Spectator::using('sample.yaml');

        $response = $this->getJson('api/users/1');
        $response->assertValidResponse(200);
    }
}