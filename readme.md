# WP LeafPress

A modern Leaflet-powered WordPress mapping plugin built for dynamic location management, category-based filtering, and scalable interactive maps.

動的な位置情報管理、カテゴリフィルター、大規模マップ表示のために設計された、LeafletベースのWordPress地図プラグインです。

WP LeafPress transforms WordPress into a lightweight geographic CMS by combining Leaflet, Custom Post Types, REST API, taxonomy-driven filtering, and marker clustering into a flexible mapping platform.

Leaflet、カスタム投稿タイプ、REST API、タクソノミー連動フィルター、マーカークラスタリングを組み合わせ、WordPressを軽量な地理情報CMSへ変換します。

---

# Key Features / 主な機能

- **Leaflet Integration**
  Fast and lightweight OpenStreetMap-powered maps powered by Leaflet.js.
  Leaflet.js による高速・軽量なOpenStreetMapベースの地図表示。

- **Custom Marker Management**
  Create and manage map markers directly from the WordPress admin panel.
  WordPress管理画面からマーカーを作成・管理可能。

- **Interactive Admin Map Editor**
  Drag-and-drop marker positioning with automatic latitude/longitude synchronization.
  ドラッグ＆ドロップで位置調整できる管理画面マップエディタ。

- **Taxonomy-Based Categories**
  Organize markers using WordPress taxonomies instead of static text fields.
  WordPressタクソノミーによる柔軟なカテゴリ管理。

- **Dynamic Category Colors**
  Assign custom colors to categories directly from the taxonomy editor.
  カテゴリごとに色を設定可能。

- **Frontend Category Filters**
  Interactive overlay filters displayed directly on the map UI.
  地図上に重ねて表示されるカテゴリフィルターUI。

- **Marker Clustering**
  Automatically groups nearby markers for high-performance large-scale maps.
  大量マーカー対応のクラスタリング機能。

- **REST API Powered**
  Marker data is delivered through a custom REST API endpoint.
  独自REST API経由でマーカーデータを提供。

- **Rich Marker Popups**
  - Featured image support
  - Description support
  - Category display
  - External CTA button support

  リッチなポップアップ表示：
  - アイキャッチ画像
  - 説明文
  - カテゴリ表示
  - 外部リンクボタン

- **Responsive UI**
  Mobile-friendly map and popup layout.
  モバイル対応レスポンシブUI。

- **Extensible Architecture**
  Designed for future expansion including GeoJSON, CSV import, nearby search, and routing support.
  GeoJSON、CSV、近隣検索、ルート表示など将来的な拡張を想定した構造。

---

# Features Overview / 機能概要

## Admin Features / 管理画面機能

- Custom Post Type marker management
  カスタム投稿タイプによるマーカー管理

- Drag-and-drop coordinate editing
  ドラッグによる座標編集

- Interactive admin Leaflet map
  管理画面Leafletマップ

- Category color management
  カテゴリカラー管理

- Taxonomy-based marker organization
  タクソノミーによる分類管理

---

## Frontend Features / フロント機能

- Interactive Leaflet map
  インタラクティブ地図表示

- Dynamic category filters
  動的カテゴリフィルター

- Marker clustering
  マーカークラスタリング

- Responsive popup cards
  レスポンシブポップアップ

- Category color synchronization
  カテゴリ色同期

- Auto fitBounds support
  自動fitBounds対応

---

## Developer Features / 開発者向け機能

- Custom REST API endpoint
  独自REST API

- Modular architecture
  モジュール構成

- Extensible taxonomy metadata system
  拡張可能なtaxonomy meta

- Lightweight frontend rendering
  軽量フロント描画

- OpenStreetMap ecosystem ready
  OpenStreetMap系拡張に対応

---

# Installation / インストール

1. Upload the plugin folder to:

/wp-content/plugins/
プラグインフォルダをアップロード。

2. Activate the plugin through the WordPress admin panel.

WordPress管理画面から有効化。

3. Add the shortcode to any page or post:
[leafpress]

ショートコードを固定ページや投稿へ追加。

4. Create markers from: LeafPress Markers

管理画面からマーカーを登録。

5.Add categories and colors from:Categories

カテゴリとカラーを設定。

# REST API Endpoint
/wp-json/leafpress/v1/markers

Example response / レスポンス例:

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

# Roadmap / 今後の予定
GeoJSON import/export
CSV import
OpenStreetMap Overpass API integration
Nearby search
Current location support
Route rendering
Marker drawing tools
Heatmap layers
Popup gallery support
Marker animations
Advanced filter UI
Geocoder integration
Technology Stack / 使用技術
WordPress
Leaflet.js
Leaflet.markercluster
OpenStreetMap
WordPress REST API
License / ライセンス

# MIT License

Developer / 開発者
Author: masato shibuya (Image-box Co., Ltd.)
GitHub: ms13th-cyber GitHub