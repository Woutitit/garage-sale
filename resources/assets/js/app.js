
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
	el: '#app',
	data: function() {
		return {
			isFavourite: false
		}
	},
	methods: {
		toggleFavourite: function(item_id) {
    		axios.post('/items/' + item_id + '/toggleFavourite').then((response) => {
    			if(response.data === 'added') {
    				console.log("LOL");
    				$( "#itemDetails .glyphicon-heart-empty").removeClass('glyphicon-heart-empty').addClass('glyphicon-heart');
    				$( "#itemDetails #btnFavourite").removeClass('btn-default').addClass('btn-success');
    				$( "#itemDetails #btnFavourite").html('<span class="glyphicon glyphicon-heart"></span> Favourited!');
    			} else {
    				console.log("LEL");
    				$( "#itemDetails .glyphicon-heart").removeClass('glyphicon-heart').addClass('glyphicon-heart-empty');
    				$( "#itemDetails #btnFavourite").removeClass('btn-success').addClass('btn-default');
    				$( "#itemDetails #btnFavourite").html('<span class="glyphicon glyphicon-heart"></span> Favourite');
    			}
    		})
    	}
    }
});
