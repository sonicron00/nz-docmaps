<template>
<div style="height: 1000px; width: 100%">

<l-map
    v-if="showMap"
    :zoom="zoom"
    :center="center"
    :options="mapOptions"
    style="height: 80%"
    @update:center="centerUpdate"
    @update:zoom="zoomUpdate"
>
  <l-marker
      v-for="item in markers"
      :key="item.id"
      :lat-lng="item.position"
      :visible="item.visible"
      @click="alert(item.name)"
  />

  <l-tile-layer
      :url="url"
      :attribution="attribution"
  />

</l-map>
</div>
</template>

<script>
import { latLng } from "leaflet";
import { LMap, LTileLayer, LMarker, LPopup, LTooltip } from "vue2-leaflet";

export default {
  name: "Example",
  components: {
    LMap,
    LTileLayer,
    LMarker,
    LPopup,
    LTooltip
  },
  mounted() {
    this.fetchData();
  },
  data() {
    return {
      zoom: 7,
      center: latLng(-41.2728, 173.2993),
      url: 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
      attribution:
          '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
      currentZoom: 7,
      currentCenter: latLng(-41.2728, 173.2993),
      showParagraph: false,
      mapOptions: {
        zoomSnap: 0.5
      },
      showMap: true,
      markers: []
 /**     markers: [
        {
          id: "100035123",
          name: "Old Basins Hut",
          position: { lat: -43.10, lng: 171.48 },
          visible: true
        },
        {
          id: "100035121",
          name: "Lagoon Saddle",
          position: { lat: -43.05, lng: 171.60 },
          visible: true
        },
      ] */
    };
  },

  methods: {
    fetchData() {
      axios.get('/api/hut-points').then(response => {
        console.log(response.data);
        this.markers = response.data;
      });
    },
    zoomUpdate(zoom) {
      this.currentZoom = zoom;
    },
    centerUpdate(center) {
      this.currentCenter = center;
    },
    showLongText() {
      this.showParagraph = !this.showParagraph;
    },
    alert(name) {
      alert(name);
    }
  }
};
</script>