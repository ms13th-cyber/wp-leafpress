# WP LeafPress

Contributors: masato shibuya (Image-box Co., Ltd.)
Tags: leaflet, map, openstreetmap, geolocation, marker, clustering, taxonomy, rest-api
Requires at least: 5.0
Tested up to: 6.9.4
Requires PHP: 8.1
Stable tag: 0.1.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Leaflet.js と OpenStreetMap を利用した、軽量かつ拡張性の高い WordPress 地図プラグインです。
カテゴリ管理、クラスタリング、REST API、動的フィルターを備えたモダンなマップシステムを構築できます。

---

## Description

WP LeafPress は、WordPress を柔軟な地図CMSとして活用するための Leaflet ベースのマッピングプラグインです。

単なる地図埋め込みではなく、WordPress のカスタム投稿タイプ・タクソノミー・REST API を活用し、動的で管理しやすいマップシステムを実現します。

軽量な構造を維持しながら、施設検索、観光マップ、店舗一覧、拠点管理など、さまざまな用途に対応できる設計になっています。

---

## 主な特徴

### Leaflet + OpenStreetMap

* Leaflet.js による高速・軽量な地図表示
* OpenStreetMap ベースで API キー不要
* モバイル対応レスポンシブUI

---

### マーカー管理

* カスタム投稿タイプによるマーカー管理
* 管理画面での地図連動編集
* ドラッグ＆ドロップによる座標編集
* 緯度・経度の自動同期

---

### カテゴリ管理

* WordPress taxonomy ベースのカテゴリ構造
* カテゴリごとのカラー設定
* 動的カテゴリフィルター
* フィルターUIを地図上へオーバーレイ表示

---

### 高性能マップ機能

* Marker Clustering 対応
* fitBounds 自動調整
* 大量マーカー対応
* 軽量レンダリング

---

### リッチポップアップ

マーカーポップアップ内に以下を表示可能：

* アイキャッチ画像
* タイトル
* 説明文
* カテゴリ表示
* 外部リンクボタン

---

### REST API

独自REST APIを提供：

```text
/wp-json/leafpress/v1/markers
```

外部アプリケーションやヘッドレス構成にも対応可能です。

---

## Installation

1. プラグインフォルダを以下へアップロードします。

```text
/wp-content/plugins/wp-leafpress
```

2. WordPress管理画面から有効化します。

3. 固定ページまたは投稿へショートコードを追加します。

```text
[leafpress]
```

4. 管理画面からマーカーを登録します。

```text
LeafPress Markers
```

5. カテゴリとカラーを設定します。

```text
Categories
```

---

## Usage

### マーカー追加

管理画面から新規マーカーを追加できます。

登録可能情報：

* タイトル
* 説明文
* 緯度・経度
* カテゴリ
* アイキャッチ画像
* 外部リンク

---

### フィルター

地図右上にカテゴリフィルターを表示します。

```text
☑ Restaurant
☑ Hospital
☑ Park
```

チェックON/OFFに応じてマーカー表示を切り替えます。

---

### クラスタリング

大量マーカー時、自動でクラスタリングを行います。

```text
(23)
```

ズーム時に自動分割されます。

---

## REST API Example

```json
[
  {
    "title": "Tokyo Station",
    "lat": "35.681236",
    "lng": "139.767125",
    "categories": [
      {
        "slug": "station",
        "name": "Station",
        "color": "#3498db"
      }
    ],
    "description": "Major transportation hub in Tokyo.",
    "link": "https://example.com",
    "image": "https://example.com/image.jpg"
  }
]
```

---

## Roadmap

今後追加予定：

* GeoJSON import/export
* CSV import
* Nearby search
* Current location support
* Route rendering
* Overpass API integration
* Heatmap support
* Popup gallery
* Marker animation
* Drawing tools
* Geocoder integration

---

## Technology Stack

* WordPress
* Leaflet.js
* Leaflet.markercluster
* OpenStreetMap
* WordPress REST API

---

## Changelog

### 0.1.0

* 初版リリース
* Leaflet 地図表示
* カスタム投稿タイプ対応
* taxonomyカテゴリ対応
* カテゴリカラー対応
* REST API 実装
* 動的カテゴリフィルター実装
* Marker Clustering 実装
* 管理画面マップエディタ実装
* リッチポップアップ実装

---

## License

This plugin is licensed under the GPLv2 or later.