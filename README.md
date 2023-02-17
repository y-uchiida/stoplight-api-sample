# stoplight-api-sample-back

Stoplight Editor を用いて API 仕様書を共有する手順を確認しました。  
Stoplight Editor で作成した API 仕様書を、このリポジトリ上で管理します。  
他のリポジトリから API 仕様書を参照してスタブサーバを起動したり、クラスファイルを生成します。  
また、API 仕様書の活用例として、Laravel のテストで API 仕様書に沿った入出力になっているかを確認します。

## Laravel のテストスイートと Open API 仕様書の連携

テストコード内で使われているリクエストパラメータや、レスポンスボディに含まれる項目が、  
OpenAPI 仕様書の `responses`, `requestBody` が指定するフォーマットに一致するかをテストします。  
これにより、フォーマットの差異によるシステム間連携時のエラーを抑制できます。

拡張テストパッケージとして、`hotmeteor/spectator` を利用します。

## spectator 利用の際の注意点

### API 仕様書とルーティングの記述を完全に一致させる必要がある

`api/` プリフィクスの指定も、パスパラメータの変数名も、API 仕様書に完全に一致させる必要があります。  
API 仕様書で `{userId}` となっているところを、 `api.php` でのルーティングでは `{user_id}` と書いていて 500 エラーが発生してしまいました。  
エラーの位置も理由も表示されないので、原因の特定にかなり時間がかかりました。

### フォーマットチェックは、api ミドルウェアを通す必要がある

`web.php` にルーティング設定を書いていると、API 仕様書のフォーマットとのバリーデージョンが効きません（全部 OK になる）  
`api.php` に設定を書くか、api ミドルウェアを追加する必要がありました。

# 参考情報

-   OpenAPI の定義を Stoplight Studio で書く  
    https://www.gaji.jp/blog/2021/10/18/8307/
-   Laravel で OpenAPI/Swagger を用いた Feature テストを行う  
    https://zenn.dev/yumemi_inc/articles/5423cb62f118ba
-   OpenAPI × Laravel で API 開発を格段に便利にする方法  
    https://fortee.jp/phpcon-2021/proposal/5a58e077-6de6-453a-abff-adbe24cc3156
-   Laravel で API 仕様書(OAS)と実装の乖離を簡単に防ぐなら Spectator がおすすめ！  
    https://qiita.com/TsukasaGR/items/6e4b67784f02241b8a1c
