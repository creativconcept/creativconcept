new Vue({
	el: '#arbeiten',
	data: {
		currentFilter: '',
		branchen: [],
		arbeiten: [],
		isHidden: true,
	},
	mounted() {
		fetch("https://creativconcept.de/wp-json/wp/v2/branchen")
			.then(response => response.json())
			.then((data) => {
				this.branchen = data;
			})
		fetch("https://creativconcept.de/wp-json/wp/v2/arbeiten?per_page=100&_embed=wp:term,wp:featuredmedia")
			.then(response => response.json())
			.then((data => {
				this.arbeiten = data;
			}))
	},

	methods: {
		setFilter: function (filter) {
			this.currentFilter = filter;
		}
	}
});