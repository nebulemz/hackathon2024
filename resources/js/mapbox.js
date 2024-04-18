import "../../node_modules/mapbox-gl/dist/mapbox-gl.css";
import mapboxgl from "mapbox-gl";

mapboxgl.accessToken = import.meta.env.VITE_MAPBOX_PUBLIC_TOKEN;

window.mapboxgl = mapboxgl;

window.map = new mapboxgl.Map({
    container: "map", // container ID
    style: "mapbox://styles/mapbox/streets-v12", // style URL
    center: [120.97710231764093, 14.58918171014233], // starting position [lng, lat]
    zoom: 14, // starting zoom
});

window.markers = [];

window.addMarker = (lng, lat, saveGlobal = false) => {
    const marker = new mapboxgl.Marker().setLngLat([lng, lat]).addTo(window.map);

    if(saveGlobal) {
        window.markers.push(marker);
    }

    return marker;
};

window.removeMarkers = () => {
    window.markers.forEach((marker) => marker.remove());
    window.markers = [];
};

window.centerMap = (lng, lat) => {
    window.map.flyTo({
        center: [lng, lat],
        essential: true,
    });
};

window.reverseGeocode = async (lngLat) =>  {
    return await fetch(
            `https://api.mapbox.com/geocoding/v5/mapbox.places/${lngLat.lng},${lngLat.lat}.json?access_token=${mapboxgl.accessToken}`)
        .then(response => response.json())
        .catch(error => Promise.reject(error));
}
