<?php


	$pages = $page->site()->children()->filter(function($item) {
		return $item->isVisible();
	});

?>

<nav role="navigation" class="navigation">
	<section class="navigation__actions-container">
		<ul class="navigation__items col col--no-gutter m-5">
			<?php foreach($pages as $p): ?>
				<li class="navigation__item"><a class="navigation__link btn <?php ecco($p->is($page), 'btn--inverse', '') ?>" href="<?php echo $p->url() ?>"><?php echo $p->title() ?></a></li>
			<?php endforeach ?>
		</ul>
		<section class="navigation__search col col--no-gutter m-7">
			<input type="text" placeholder="Search..."></input>
		</section>
	</section>
	<div class="xs-12 navigation__map-container" gyunu-map>
		<div class="navigation__map col xs-12 m-9" gyunu-map-container rv-class-loading="state | state 'loading'" rv-class-loaded="state | state 'loaded'">
			<div class="loading" rv-show="state | state 'loading'"><span class="loading__icon  ion ion-load-d"></span></div>
		</div>
		<div class="map__detail-container col xs-12 m-3" rv-class-loading="state | state 'loading'" rv-class-loaded="state | state 'loaded'">
			<div class="loading" rv-show="state | state 'loading'"><span class="loading__icon  ion ion-load-d"></span></div>
			<div class="map__detail">
				<div rv-each-country="data">
					<div rv-each-city="country.data">
						<div rv-if="city.content.type | = 'current'">
							<h3 rv-if="city.content.type | = 'current'">Current Location</h3>
							<h2 class="map__country-label">{city.content.city}, {city.content.country}</h2>
							<p rv-html="city.content.summary"></p>
							<p rv-html="city.content.address"></p>
							<button class="btn btn--blue" rv-lat="city.content.lat" rv-lon="city.content.lon" rv-on-click="events.flyTo"><span class="ion ion-eye"></span>Show Me</button>
						</div>
					</div>
				</div>
			</div>
			<section class="map__places">
				<h3>Places I've been to</h3>
				<div class="map__places-container">
					<div rv-each-country="data" class="map__country-container">
						<h3 class="map__country-label" rv-on-click="events.showCities">{country.name} <span class="ion ion-chevron-right"></span></h3>
						<div class="map__city-container">
							<h4 rv-each-city="country.data" rv-country="country.name" rv-city="city.content.city" class="map__city-label" rv-lat="city.content.lat" rv-lon="city.content.lon" rv-on-click="events.flyTo">{city.content.city}</h4>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>

	<section class="map__images-container" gyunu-map-carousel>
		<span class="map__images-button map__images-button--prev ion ion-chevron-left"></span>
		<span class="map__images-button map__images-button--next ion ion-chevron-right"></span>
		<div class="map__images" rv-show="data | hasLength">
			<img class="map__image carousel__image" rv-each-image="data" rv-src="image.resized.small"></img>
		</div>
	</section>
</nav>

<button class="navigation__button"><span class="ion ion-navicon"></span></button>
