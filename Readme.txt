=== WP LeafPress ===
Contributors: masato shibuya (Image-box Co., Ltd.)
Tags: leaflet, map, openstreetmap, geolocation, marker, clustering, taxonomy, rest-api
Requires at least: 5.0
Tested up to: 6.9.4
Requires PHP: 8.3.23
Stable tag: 0.2.1
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Leaflet.js と OpenStreetMap を利用した、軽量かつ拡張性の高い WordPress 地図プラグインです。カテゴリ管理、クラスタリング、REST API、動的フィルターを備えたモダンなマップシステムを構築できます。

== Description ==

WP LeafPress は、WordPress を柔軟な地図CMSとして活用するための Leaflet ベースのマッピングプラグインです。

単なる地図埋め込みではなく、WordPress のカスタム投稿タイプ・タクソノミー・REST API を活用し、動的で管理しやすいマップシステムを実現します。

軽量な構造を維持しながら、施設検索、観光マップ、店舗一覧、拠点管理など、さまざまな用途に対応できる設計になっています。

主な特徴：

* **Leaflet + OpenStreetMap**: Leaflet.js による高速・軽量な表示。OpenStreetMap ベースで API キー不要。
* **直感的なマーカー管理**: カスタム投稿タイプを採用。管理画面のマップエディタからドラッグ＆ドロップで座標を自動同期できます。
* **高度なカテゴリ管理**: Taxonomy ベースのカテゴリ構造。カテゴリごとのカラー設定が可能で、地図上に動的フィルターをオーバーレイ表示します。
* **高性能マップ機能**: Marker Clustering 対応により大量のマーカーも快適に動作。fitBounds による自動ズーム調整も備えています。
* **リッチポップアップ**: アイキャッチ画像、説明文、カテゴリ、外部リンクボタンを内包したレスポンシブなポップアップを表示可能です。
* **独自REST API**: 専用エンドポイント（/wp-json/leafpress/v1/markers）を提供。外部アプリやヘッドレス構成にも対応可能です。

== Installation ==

1. プラグインフォルダを以下へアップロードします。
   `/wp-content/plugins/wp-leafpress`

2. WordPress管理画面の「プラグイン」から有効化します。

3. 固定ページまたは投稿へショートコードを追加します。
   `[leafpress]`

4. 管理画面からマーカーを登録します。
   `LeafPressマーカー`

5. カテゴリとカラーを設定します。
   `カテゴリ一覧`

== Usage ==

このプラグインは、地点情報を登録し、ショートコードを配置することで機能します。

* **マーカー追加**: 管理画面から「LeafPress Markers」を新規作成し、タイトル、説明、座標、カテゴリ、アイキャッチ画像を登録してください。
* **フィルター**: 地図右上にカテゴリフィルターが表示されます。チェックのON/OFFに応じてリアルタイムに表示が切り替わります。
* **クラスタリング**: 地点が密集している場合、自動で数字のバブルに集約されます。ズームすることで個別のマーカーに分割されます。

== Changelog ==

= 0.2.1 =
* 地図をOSM／国土地理院／航空写真から切り替えられるように修正。

= 0.2.0 =
* 地図の表示高さを設定から変更できるように修正。

= 0.1.1 =
* 軽微なテキスト修正。

= 0.1.0 =
* 初版リリース。
* Leaflet 地図表示および OpenStreetMap 連携の実装。
* マーカー管理用のカスタム投稿タイプおよび Taxonomy カテゴリの実装。
* カテゴリカラー設定および動的フロントエンドフィルターの実装。
* Marker Clustering による大量マーカー表示の最適化。
* 管理画面用ドラッグ＆ドロップ・マップエディタの実装。
* 独自 REST API エンドポイントの実装。
* アイキャッチ画像・外部リンク対応のリッチポップアップ実装。

== License ==

This plugin is licensed under the GPLv2 or later.