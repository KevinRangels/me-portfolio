<template>
	<div>
		<h1>App</h1>
		<router-link :to="{name: 'home'}">inicio</router-link>
		<router-link :to="{name: 'lenguajes'}">Lenguajes</router-link>

		<router-view></router-view>
	</div>

</template>