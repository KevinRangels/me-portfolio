import Vue from 'vue';
import Router from 'vue-router'

Vue.use(Router)

export default new Router({
	routes: [
		{
			path: '/home',
			name: 'home',
			component: require('./views/home').default
		},
		{
			path: '/lenguajes',
			name: 'lenguajes',
			component: require('./views/lenguajes').default
		}
	],
	mode: 'history'
})