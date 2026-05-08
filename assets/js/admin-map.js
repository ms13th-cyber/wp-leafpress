window.addEventListener('load', () => {

	const mapElement = document.getElementById('leafpress-admin-map');

	if (!mapElement) return;

	const latInput = document.querySelector('[name="leafpress_latitude"]');
	const lngInput = document.querySelector('[name="leafpress_longitude"]');

	const defaultLat = parseFloat(latInput.value) || 35.681236;
	const defaultLng = parseFloat(lngInput.value) || 139.767125;

	const map = L.map('leafpress-admin-map').setView([defaultLat, defaultLng], 13);

	L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		attribution: '&copy; OpenStreetMap contributors'
	}).addTo(map);

	let marker = L.marker([defaultLat, defaultLng], {
		draggable: true
	}).addTo(map);

	function updateInputs(latlng) {

		latInput.value = latlng.lat.toFixed(6);
		lngInput.value = latlng.lng.toFixed(6);
	}

	map.on('click', (e) => {

		marker.setLatLng(e.latlng);

		updateInputs(e.latlng);

	});

	marker.on('dragend', () => {

		updateInputs(marker.getLatLng());

	});

});