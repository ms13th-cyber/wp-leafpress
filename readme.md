# WP LeafPress

A modern Leaflet-powered WordPress mapping plugin built for dynamic location management, category-based filtering, and scalable interactive maps.

動的な位置情報管理、カテゴリフィルター、大規模マップ表示のために設計された、LeafletベースのWordPress地図プラグインです。Leaflet、カスタム投稿タイプ、REST API、タクソノミー連動フィルター、マーカークラスタリングを組み合わせ、WordPressを軽量な地理情報CMSへと変換します。

---

## Key Features

- **Leaflet Integration**: Fast and lightweight OpenStreetMap-powered maps powered by Leaflet.js.
- **Interactive Admin Editor**: Drag-and-drop marker positioning with automatic latitude/longitude synchronization within the WordPress admin panel.
- **Taxonomy-Based Management**: Organize markers using WordPress taxonomies instead of static text fields, with dynamic custom colors assigned directly from the taxonomy editor.
- **Advanced Frontend UI**: Features interactive overlay filters, marker clustering for high-performance large-scale maps, and responsive popup cards (featured images, descriptions, and CTA buttons).
- **API-Driven Architecture**: Marker data is delivered through a custom REST API endpoint, ensuring a modular and modern decoupling of data.
- **Extensible Foundation**: Designed for future expansion including GeoJSON, CSV import, nearby search, and routing support.

## 主な機能（日本語）

- **Leafletによる高速表示**: Leaflet.jsを採用し、OpenStreetMapベースの軽量で高速な地図表示を実現。
- **直感的な管理画面マップエディタ**: ドラッグ＆ドロップで座標を自動同期できる位置調整機能を搭載。
- **柔軟なカテゴリ管理**: WordPress標準のタクソノミーを利用。カテゴリごとにカスタムカラーを設定し、地図上に反映可能です。
- **高度なフロントエンドUI**: 地図上の動的フィルタリング、大量の地点を効率的に表示するクラスタリング、画像・ボタン付きのレスポンシブポップアップに対応。
- **独自REST APIの提供**: 外部連携や拡張を容易にする専用のAPIエンドポイントを介してデータを提供。
- **将来の拡張性**: GeoJSONやCSVインポート、近隣検索、ルート表示など、地理情報システムとしての拡張を見越したモジュール構成。

---

## Features Overview / 機能概要

### Admin Features / 管理画面機能
- Custom Post Type marker management / カスタム投稿タイプによるマーカー管理
- Drag-and-drop coordinate editing / ドラッグによる直感的な座標編集
- Category color management / タクソノミーによるカテゴリカラー管理

### Frontend Features / フロント機能
- Dynamic category filters & Marker clustering / 動的フィルタリングとクラスタリング
- Responsive popup cards / 画像・説明文・外部リンク対応のポップアップ
- Auto fitBounds support / 全地点が収まる自動ズーム調整機能

---

## Installation / インストール

1. Upload the plugin folder to your `/wp-content/plugins/` directory.
   (`wp-content/plugins/` ディレクトリにプラグインフォルダをアップロードします)
2. Activate the plugin through the 'Plugins' menu in WordPress.
   (管理画面の「プラグイン」メニューから有効化してください)
3. Add the shortcode `[leafpress_map]` to any page or post.
   (固定ページや投稿にショートコード `[leafpress_map]` を追加します)
4. Create markers via **LeafPress Markers** and set category colors via **Categories**.
   (「LeafPress Markers」から地点を登録し、「Categories」から色の設定を行ってください)

---

## Technical Details

### REST API Endpoint
`/wp-json/leafpress/v1/markers`

### Technology Stack
- WordPress (Custom Post Types, Taxonomies, REST API)
- Leaflet.js / Leaflet.markercluster
- OpenStreetMap

---

## Roadmap / 今後の予定
- [ ] GeoJSON & CSV Import/Export
- [ ] OpenStreetMap Overpass API integration
- [ ] Nearby search & Current location support
- [ ] Route rendering & Heatmap layers
- [ ] Advanced filter UI & Geocoder integration

## Developer Info / 開発者情報
- **Author**: masato shibuya (Image-box Co., Ltd.)
- **GitHub**: [https://github.com/ms13th-cyber/](https://github.com/ms13th-cyber/)
- **License**: MIT License