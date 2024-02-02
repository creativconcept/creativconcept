<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Creativ_Concept_Werbeagentur
 */

get_header();
?>

	<div id="primary" class="container content-area">
		<main id="main" class="site-main">

			<header class="archive-header">
				<h1>Unser Portfolio</h1>
				<h3>So vielfältig wie unsere Kunden</h3>
			</header><!-- .page-header -->

			<div id="description_anchors">
					<div id="description">
						<?php echo "<p>Wir verfügen über 30 Jahre Erfahrung in der Konzeption und Realisierung 
						zielgruppen- und marktgerechter Kommunikation, die strategisch durchdacht, kundenorientiert 
						und immer am Puls der Zeit ist. Dabei setzen wir auf frische Ideen, individuellen Service 
						und eine langfristige Zusammenarbeit. Aber machen Sie sich am besten selbst ein Bild von 
						unserer Arbeit und werfen Sie einen Blick auf unsere facettenreichen Referenzen, die Sie 
						ganz einfach nach Branchen sortieren können.</p>"; ?>
					</div> <!-- #description -->
					<div id="anchors">
					</div> <!-- #anchors -->
			</div> <!-- #description_anchor -->

			<div id="arbeiten">
				<span class="filter_button" v-on:click="showBranchen()" style="margin-right: 2rem;">Branchen</span>
				<span class="filter_button" v-on:click="showLeistungen()">Leistungen</span>
				<div class="filters" v-if="!hideBranchen">
					<span class="filter" :class="{ active: selectedBranchen === '' }" v-on:click="setBranche('')">ALLE</span>
					<span class="filter" v-bind:id="branche.id" :class="{ active: selectedBranchen === branche.id }" v-on:click="setBranche(branche.id)" v-for="branche in branchen">{{ branche.name }}</span>
				</div>
				<div class="filters" v-if="!hideLeistungen">
					<span class="filter" :class="{ active: selectedLeistungen.length === 0 }" v-on:click="clearLeistung()">ALLE</span>
					<span class="filter" v-bind:id="leistung.id" :class="{ active: selectedLeistungen['0'] === leistung.id }" v-on:click="setLeistung(leistung.id)" v-for="leistung in leistungen">{{ leistung.name }}</span>
				</div>

				<div v-if="!loaded">
					<p>Lädt gerade... </p>
				</div>

				<transition-group id="archive" class="arbeiten" name="arbeiten" >
					<div v-if="( selectedBranchen === arbeit.branchen['0'] || selectedBranchen === '' ) && ( arbeit.leistung.some(n => selectedLeistungen.some(h=> h===n)) === true || selectedLeistungen.length === 0 )" v-bind:key="arbeit.name" v-for="arbeit in arbeiten">
						<a v-bind:href="arbeit.link"><img v-bind:src="arbeit.image"></a>
						<a v-bind:href="arbeit.link"><h4 v-html="arbeit.kunde"></h4></a>
						<p class="smaller" v-html="arbeit.name"></p>
					</div>
				</transition-group>
			</div>

			<br><br><br>
			<div id="bottom_links">
				<a href="<?php echo get_home_url().'/leistungen/'; ?>">Leistungen ›</a>
				<a href="<?php echo get_home_url().'/referenzen/'; ?>">Kunden ›</a>
			</div>

			<script src="<?php echo get_template_directory_uri().'/libs/vuejs.js'; ?>"></script>
			<script>

				new Vue({
					el: '#arbeiten',
					data: {
						branchen: [],
						selectedBranchen: '',
						paramBranchen: '',
						leistungen: [],
						selectedLeistungen: [],
						paramLeistungen: '',
						queryParameter: '',
						arbeiten: [],
						loaded: false,
						hideBranchen: true,
						hideLeistungen: true,
					},
					mounted() {
						fetch("https://creativconcept.de/wp-json/wp/v2/branchen?per_page=100")
							.then(response => response.json())
							.then((data) => {
								this.branchen = data;
							})
						fetch("https://creativconcept.de/wp-json/wp/v2/leistung?per_page=100")
							.then(response => response.json())
							.then((data) => {
								this.leistungen = data;
							})
						fetch("https://creativconcept.de/wp-json/creativconcept/v1/arbeiten/asc")
							.then(response => response.json())
							.then((data => {
								this.arbeiten = data;
								this.loaded = true;
							}))

						// Get params from url and save to variables
						this.queryParameter = new URLSearchParams(window.location.search);

						this.paramBranchen = parseInt(this.queryParameter.get('branche'), 10); // convert string to int using parsint decimal
						this.paramLeistungen = this.queryParameter.get('leistungen');

						if(this.paramLeistungen && this.paramLeistungen !== '') {
							this.paramLeistungen = this.paramLeistungen.split(','); // convert string to array
							for( let i = 0; i < this.paramLeistungen.length; i++ ) { // convert string array to int array
								this.paramLeistungen[i] = parseInt(this.paramLeistungen[i], 10);
							}
						}

					},
					watch: {
						loaded: function(val) {
							if(val == true) {
								if(this.paramBranchen) { // check if there is a parameter
									this.selectedBranchen = this.paramBranchen; // set value
								}
								if(this.paramLeistungen) { // check if there is a parameter
									for( let i = 0; i < this.paramLeistungen.length; i++ ) {
										this.selectedLeistungen.push(this.paramLeistungen[i]);
									}
								}
							}
						},
					},
					methods: {
						showBranchen: function () {
							this.hideBranchen = false;
							this.hideLeistungen = true;
						},
						setBranche: function (filter) {
							this.selectedBranchen = filter;
							this.selectedLeistungen = [];
							this.updateBranche(filter);
						},
						updateBranche: function (filter) {
							let qp = new URLSearchParams();
							// set url parameters when changing values
							qp.set('branche', filter);
							history.replaceState(null, null, "?"+qp.toString());
						},
						showLeistungen: function () {
							this.hideLeistungen = false;
							this.hideBranchen = true;
						},
						setLeistung: function (filter) {
							this.selectedLeistungen = [];
							this.selectedLeistungen.push(filter);
							this.selectedBranchen = '';
							this.updateLeistung(filter);
						},
						clearLeistung: function () {
							this.selectedLeistungen = [];
						},
						updateLeistung: function (filter) {
							let qp = new URLSearchParams();
							// set url parameters when changing values
							qp.set('leistungen', filter);
							history.replaceState(null, null, "?"+qp.toString());
						},
					}
				});

			</script>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
