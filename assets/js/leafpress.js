window.addEventListener('load', async () => {

	const mapElement = document.getElementById('leafpress-map');

	if (!mapElement) return;

	if (mapElement._leaflet_id) {
		mapElement._leaflet_id = null;
		mapElement.innerHTML = '';
	}

	const map = L.map('leafpress-map').setView([35.681236, 139.767125], 5);

	const clusterGroup = leafpressData.enableCluster
		? L.markerClusterGroup()
		: L.layerGroup();

	/**
	 * Base maps
	 */
	const osm = L.tileLayer(
		'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
		{
			attribution: '&copy; OpenStreetMap contributors'
		}
	);
	const esri = L.tileLayer(
		'https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}',
		{
			attribution: 'Tiles &copy; Esri'
		}
	);
	const gsi = L.tileLayer(
		'https://cyberjapandata.gsi.go.jp/xyz/std/{z}/{x}/{y}.png',
		{
			attribution: '&copy; 国土地理院'
		}
	);

	/**
	 * Default layer
	 */
	osm.addTo(map);

	/**
	 * Layer control
	 */
	const baseMaps = {
		'OpenStreetMap': osm,
		'Satellite': esri,
		'GSI': gsi
	};

	L.control.layers(baseMaps, null, {
		position: 'bottomright'
	}).addTo(map);

	try {

		const response = await fetch(leafpressData.restUrl);

		const markers = await response.json();

		const bounds = [];

		const leafletMarkers = [];

		const categoryMap = {};

		/**
		 * Marker create
		 */
		markers.forEach(marker => {

			if (!marker.lat || !marker.lng) return;

			const lat = parseFloat(marker.lat);
			const lng = parseFloat(marker.lng);

			bounds.push([lat, lng]);

			const category = marker.categories?.[0] || null;

			const color = category?.color || '#333';

			const slug = category?.slug || 'default';

			const name = category?.name || 'Other';

			if (!categoryMap[slug]) {

				categoryMap[slug] = {
					name,
					color
				};
			}

			const icon = L.divIcon({
				className: 'leafpress-marker',
				html: `
					<div style="
						background:${color};
						width:18px;
						height:18px;
						border-radius:50%;
						border:3px solid #fff;
						box-shadow:0 0 6px rgba(0,0,0,.3);
					"></div>
				`,
				iconSize: [18, 18],
				iconAnchor: [9, 9]
			});

			const leafletMarker = L.marker([lat, lng], {
				icon: icon
			})
			.bindPopup(`

				<div class="leafpress-popup">

					${
						marker.image
						? `
							<div class="leafpress-popup-image">
								<img src="${marker.image}" alt="">
							</div>
						`
						: ''
					}

					<div class="leafpress-popup-content">

						<div class="leafpress-popup-category">
							${category?.name || 'Other'}
						</div>

						<h3 class="leafpress-popup-title">
							${marker.title}
						</h3>

						<div class="leafpress-popup-description">
							${marker.description || ''}
						</div>

						${
							marker.link
							? `
								<a
									href="${marker.link}"
									class="leafpress-popup-button"
									target="_blank"
									rel="noopener"
								>
									Visit Website
								</a>
							`
							: ''
						}

					</div>

				</div>

			`);

			clusterGroup.addLayer(leafletMarker);

			leafletMarkers.push({
				instance: leafletMarker,
				category: slug
			});

		});

		/**
		 * Add cluster layer
		 */
		map.addLayer(clusterGroup);

		/**
		 * fitBounds
		 */
		if (bounds.length) {
			map.fitBounds(bounds);
		}

		/**
		 * Leaflet filter control
		 */
		const filterControl = L.control({
			position: 'topright'
		});

		filterControl.onAdd = function() {

			const div = L.DomUtil.create('div', 'leafpress-filter-wrap');

			div.innerHTML = '';

			Object.entries(categoryMap).forEach(([slug, data]) => {

				div.innerHTML += `
					<label class="leafpress-filter-item">

						<input
							type="checkbox"
							value="${slug}"
							checked
						>

						<div
							class="leafpress-filter-color"
							style="background:${data.color}"
						></div>

						<span>${data.name}</span>

					</label>
				`;
			});

			return div;
		};

		filterControl.addTo(map);

		const locationControl = L.control({
			position: 'topright'
		});

		locationControl.onAdd = function() {

			const div = L.DomUtil.create(
				'div',
				'leafpress-location-control'
			);

			div.innerHTML = `
				<button type="button">
					📍 Current Location
				</button>
			`;

			div.querySelector('button').addEventListener('click', () => {

				if (!navigator.geolocation) {
					alert('Geolocation is not supported.');
					return;
				}

				navigator.geolocation.getCurrentPosition(

					position => {

						const lat = position.coords.latitude;
						const lng = position.coords.longitude;

						map.flyTo([lat, lng], 15);

						L.marker([lat, lng], {
							icon: L.divIcon({
								className: 'leafpress-current-location',
								html: `
									<div class="leafpress-current-dot"></div>
								`,
								iconSize: [20, 20],
								iconAnchor: [10, 10]
							})
						})
						.addTo(map)
						.bindPopup('Current Location')
						.openPopup();

					},

					error => {

						console.error(error);

						alert('Location access denied.');

					}

				);

			});

			return div;

		};

		locationControl.addTo(map);

		const filterElement = document.querySelector('.leafpress-filter-wrap');

		L.DomEvent.disableClickPropagation(filterElement);

		L.DomEvent.disableScrollPropagation(filterElement);

		/**
		 * Filter event
		 */
		filterElement.addEventListener('change', () => {

			const checked = [
				...filterElement.querySelectorAll('input:checked')
			].map(input => input.value);

			leafletMarkers.forEach(marker => {

				if (checked.includes(marker.category)) {

					clusterGroup.addLayer(marker.instance);

				} else {

					clusterGroup.removeLayer(marker.instance);

				}

			});

		});

		requestAnimationFrame(() => {

			map.invalidateSize();

			setTimeout(() => {
				map.invalidateSize();
			}, 300);

		});

	} catch(error) {

		console.error('LeafPress Error:', error);

	}

});