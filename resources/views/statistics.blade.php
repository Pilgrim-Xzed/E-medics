@extends('layouts.master')

@section('content')
                        
<div id="page">
		
	<header class="header_in map_view">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-3 col-12">
					<div id="logo">
						<a href="index.html">
							<img src="img/logo_sticky.svg" width="165" height="35" alt="" class="logo_sticky">
						</a>
					</div>
				</div>
				<div class="col-lg-9 col-12">

					<!-- /top_menu -->
					<a href="#menu" class="btn_mobile">
						<div class="hamburger hamburger--spin" id="hamburger">
							<div class="hamburger-box">
								<div class="hamburger-inner"></div>
							</div>
						</div>
					</a>
					<nav id="menu" class="main-menu">
                        <ul>
                            <li><span><a href="#0">Home</a></span></li>
                            <li><span><a href="#0">About</a></span></li>
							<li><span><a href="#0">Contact us</a></span></li>
                        </ul>
                    </nav>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->		
	</header>
	<!-- /header -->
	
	<main>
		<div class="container-fluid full-height">
		<div class="row row-height">
			<div class="col-lg-5 content-left order-md-last order-sm-last order-last">
			<div id="results_map_view">
		   <div class="container-fluid">
			   <div class="row">
				   <div class="col-10">
					   <h4><strong>145</strong> result for All listing</h4>
				   </div>
				   <div class="col-2">
					   <a href="#0" class="search_mob btn_search_mobile map_view"></a> <!-- /open search panel -->
						
				   </div>
			   </div>
			   <!-- /row -->
				<div class="search_mob_wp">
					<div class="custom-search-input-2 map_view">
						<div class="form-group">
							<input class="form-control" type="text" placeholder="What are you looking for...">
							<i class="icon_search"></i>
						</div>
						<div class="form-group">
							<input class="form-control" type="text" placeholder="Where">
							<i class="icon_pin_alt"></i>
						</div>
						<select class="wide">
							<option>All Facilities</option>	
							<option>Shops</option>
							<option>Hotels</option>
							<option>Restaurants</option>
							<option>Bars</option>
							<option>Events</option>
							<option>Fitness</option>
						</select>
						<input type="submit" value="Search">
					</div>
				</div>
				<!-- /search_mobile -->
		   </div>
		   <!-- /container -->
	   </div>
	   <!-- /results -->
		

	
				
				<div class="strip map_view add_top_20">
						
							<div class="col-8">
								<div class="wrapper">
									<a href="#0" class="wish_bt"></a>
									<h3><a href="detail-restaurant.html">Da Alfredo</a></h3>
									<small>27 Old Gloucester St</small>
									<p><a href="#0" onclick="onHtmlClick('Marker',1)" class="address">View on Map</a></p>
								</div>
								<ul>
									<li><span class="loc_open">Now Open</span></li>
									<li><div class="score"><span>Superb<em>350 Reviews</em></span><strong>8.9</strong></div></li>
								</ul>
							</div>
						</div>
					</div>
					
				
				
			</div>
			<!-- /content-left-->

			<div class="col-lg-7 map-right">
                    <div id='map' style='width: 1400px; height: 700px;'></div>
				<!-- map-->
			</div>
			<!-- /map-right-->
		</div>
		<!-- /row-->
	</div>
	<!-- /container-fluid -->
	</main>
	<!--/main-->
	</div>
	<!-- page -->
	

    
	<script>

		mapboxgl.accessToken = 'pk.eyJ1Ijoic2FpZHUiLCJhIjoiY2pveTNrM3ZvMTdpajNyb2R0Nmg1cG5hMCJ9.dDu8jfgjcQheDRsucflg3g';
		var map = new mapboxgl.Map({
			container: 'map',
			style: 'mapbox://styles/mapbox/streets-v9',
			center: [7.4490,10.5432],
			zoom: 4
		});
		let dataset;
		let url = "https://api.grid-nigeria.org/schools/?size=10&page=1&sort_by=global_id&fields=&cql=state_name+IN+%28%27Kaduna%27%2C+%27Kaduna%27%29"
		fetch(url)
		.then((res)=> res.json())
		.then((data)=>{
			dataset = data;
			console.log(dataset)
		})
		
		map.on('style.load', function () {

map.addSource("markers", {
	"type": "geojson",
	"data": `${dataset}`
});

map.addLayer({
	"id": "markers",
	"type": "symbol",
	"source": "markers",
	"layout": {
		"icon-image": "{marker-symbol}-15",
		"text-field": "{title}",
		"text-font": ["Open Sans Semibold", "Arial Unicode MS Bold"],
		"text-offset": [0, 0.6],
		"text-anchor": "top"
	}
});
});

				</script>
@endsection
