=== WP LeafPress ===
Contributors: masato shibuya (Image-box Co., Ltd.)
Tags: leaflet, map, openstreetmap, geolocation, marker, clustering, taxonomy, rest-api
Requires at least: 5.0
Tested up to: 6.9.4
Requires PHP: 8.3.23
Stable tag: 0.3.1
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Leaflet.js と OpenStreetMap を利用した、軽量かつ拡張性の高い WordPress 地図プラグインです。カテゴリ管理、クラスタリング、REST API、動的フィルターを備えたモダンなマップシステムを構築できます。

== Description ==

WP LeafPress は、WordPress を柔軟な地図CMSとして活用するための Leaflet ベースのマッピングプラグインです。

単なる地図埋め込みではなく、WordPress のカスタム投稿タイプ・タクソノミー・REST API を活用し、動的で管理しやすいマップシステムを実現します。

軽量な構造を維持しながら、施設検索、観光マップ、店舗一覧、拠点管理など、さまざまな用途に対応できる設計になっています。

主な特徴：

* **Leaflet + OpenStreetMap**: Leaflet.js による高速・軽量な表示。OpenStreetMap ベースで API キー不要。
* **複数地図レイヤー対応**: OpenStreetMap / 国土地理院 / 航空写真 の切り替えに対応。
* **直感的なマーカー管理**: カスタム投稿タイプを採用。管理画面のマップエディタからドラッグ＆ドロップで座標を自動同期できます。
* **高度なカテゴリ管理**: Taxonomy ベースのカテゴリ構造。カテゴリごとのカラー設定が可能で、地図上に動的フィルターをオーバーレイ表示します。
* **高性能マップ機能**: Marker Clustering 対応により大量のマーカーも快適に動作。Spiderfy による重なりマーカー展開にも対応。
* **現在地取得機能**: ワンクリックで現在地を取得し、地図上へ移動可能です。
* **ショートコード拡張**: 高さ・カテゴリ・ズーム・初期座標・タイル種類・クラスタリング有無をショートコードから柔軟に制御できます。
* **リッチポップアップ**: アイキャッチ画像、説明文、カテゴリ、外部リンクボタンを内包したレスポンシブなポップアップを表示可能です。
* **独自REST API**: 専用エンドポイント（/wp-json/leafpress/v1/markers）を提供。外部アプリやヘッドレス構成にも対応可能です。

== Installation ==

1. プラグインフォルダを以下へアップロードします。
   `/wp-content/plugins/wp-leafpress`

2. WordPress管理画面の「プラグイン」から有効化します。

3. 固定ページまたは投稿へショートコードを追加します。
   `[leafpress_map]`

4. 管理画面からマーカーを登録します。
   `LeafPress Markers`

5. カテゴリとカラーを設定します。
   `Categories`

== Usage ==

このプラグインは、地点情報を登録し、ショートコードを配置することで機能します。

* **マーカー追加**: 管理画面から「LeafPress Markers」を新規作成し、タイトル、説明、座標、カテゴリ、アイキャッチ画像を登録してください。
* **フィルター**: 地図右上にカテゴリフィルターが表示されます。チェックのON/OFFに応じてリアルタイムに表示が切り替わります。
* **クラスタリング**: 地点が密集している場合、自動で数字のバブルに集約されます。ズームすることで個別のマーカーに分割されます。
* **現在地取得**: 地図右上の「Current Location」ボタンから現在地へ移動できます。
* **レイヤー切替**: 地図右下から OpenStreetMap / 国土地理院 / 航空写真 を切り替えできます。

== Shortcode ==

基本：

[leafpress_map]

カテゴリ絞り込み：

[leafpress_map category="station"]

高さ指定：

[leafpress_map height="600"]

クラスタリング無効化：

[leafpress_map cluster="false"]

初期ズーム指定：

[leafpress_map zoom="10"]

初期座標指定：

[leafpress_map lat="35.681236" lng="139.767125"]

航空写真表示：

[leafpress_map tiles="satellite"]

国土地理院表示：

[leafpress_map tiles="gsi"]

== Changelog ==

= 0.3.1 =

* Spiderfy 対応を追加。
* ショートコード attrs に対応。
* タイルレイヤー切り替え機能を追加。
* OpenStreetMap / 国土地理院 / 航空写真の切り替えに対応。

= 0.3.0 =

* マーカーのクラスター表示を切り替えられるように修正。
* 現在地取得の実装。

= 0.2.2 =

* ショートコードの取り扱いに関して修正。

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
