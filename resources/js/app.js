require('./bootstrap');

window.Vue = require('vue');
import Toaster from 'v-toaster'
 
// You need a specific loader for CSS files like https://github.com/webpack/css-loader
import 'v-toaster/dist/v-toaster.css'
 
// optional set default imeout, the default is 10000 (10 seconds).
Vue.use(Toaster, {timeout: 5000})
import Vue from 'vue'
import VueGeolocation from 'vue-browser-geolocation';
import * as VueGoogleMaps from 'vue2-google-maps'
Vue.use(VueGeolocation)
Vue.use(VueGoogleMaps, {
  load: {
    key: 'AIzaSyDwwFgz7dCIYU4jZ8TOSD0VNQK-xz2iY9o',
    // key: 'AIzaSyDwwFgz7dCIYU4jZ8TOSD0VNQK',
    libraries: 'places', // This is required if you use the Autocomplete plugin
    // OR: libraries: 'places,drawing'
    // OR: libraries: 'places,drawing,visualization'
    // (as you require)
 
    //// If you want to set the version, you can do so:
    // v: '3.26',
  },
 
  //// If you intend to programmatically custom event listener code
  //// (e.g. `this.$refs.gmap.$on('zoom_changed', someFunc)`)
  //// instead of going through Vue templates (e.g. `<GmapMap @zoom_changed="someFunc">`)
  //// you might need to turn this on.
  // autobindAllEvents: false,
 
  //// If you want to manually install components, e.g.
  //// import {GmapMarker} from 'vue2-google-maps/src/components/marker'
  //// Vue.component('GmapMarker', GmapMarker)
  //// then disable the following:
  // installComponents: true,
})

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('map-component', require('./components/MapComponent.vue').default);
Vue.component('user-map', require('./components/UserMap.vue').default);
Vue.component('place-map', require('./components/PlaceMap.vue').default);
Vue.component('hotel-map', require('./components/HotelMap.vue').default);
Vue.component('restaurant-map', require('./components/RestaurantMap.vue').default);
Vue.component('counter-map', require('./components/CounterMap.vue').default);
Vue.component('guide-map', require('./components/Guide.vue').default);

Vue.component('pagination', require('laravel-vue-pagination'));

const app = new Vue({
    el: '#app',
    data:{
		  place: { },
      days: 1,
	},
  props: ['cost'],
	methods:{
		
	},
  watch:{
    days(){
      alert(this.cost);
    },
  },
});
