@extends('layouts.master')

@section('content')

	<div id="page">

		@include('layouts.partials.header')

	<main>
		<section class="hero_single version_2">
				<div class="wrapper">
					<div class="container">
						<h3>Locate Medical Facility!</h3>
						<p>Discover medical facilities in Kaduna</p>
					</div>
				</div>
			</section>
		<div class="container margin_60_35">
			<div class="row justify-content-center">

				<div class="col-xl-5 col-lg-6 pr-xl-5">
					<div class="main_title_3">
						<span></span>
						<h2>Submit Complaint</h2>
						<p>And we'll make sure someone looks into it</p>
					</div>
					<div id="message-contact"></div>
					<form method="post" action="assets/contact.php" id="contactform" autocomplete="off">
						<div class="form-group">
							<label>Name</label>
							<input class="form-control" type="text" id="name_contact" name="name_contact">
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Email</label>
									<input class="form-control" type="email" id="email_contact" name="email_contact">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Telephone</label>
									<input class="form-control" type="text" id="phone_contact" name="phone_contact">
								</div>
							</div>
						</div>
						<!-- /row -->
						<div class="form-group">
							<label>Message</label>
							<textarea class="form-control" id="message_contact" name="message_contact" style="height:120px;"></textarea>
						</div>
						<p class="add_top_30"><input type="submit" value="Submit" class="btn_1" id="submit-contact"></p>
					</form>
				</div>
				<div class="col-xl-5 col-lg-6 pl-xl-5">
					<div class="box_contacts">
						<i class="ti-support"></i>
						<h2>Need Help?</h2>
						<a href="#0">08030303030</a> - <a href="#0">help@sprout.com</a>
					</div>
					<div class="box_contacts">
						<i class="ti-home"></i>
						<h2>Address</h2>
						<a href="#0">KADICT Hub, Kanta Road, Kaduna</a>
					</div>
				</div>
			</div>
		</div>
		<!-- /container -->
	</main>
	<!--/main-->

	@include('layouts.partials.footer')
	<!--/footer-->
	</div>
	<!-- page -->
	<!-- /Sign In Popup -->

	<div id="toTop"></div><!-- Back to top button -->

@endsection