<!DOCTYPE html>
<html lang="en">

<head>
	<title>Travel Partner</title>

	<!-- Meta Tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Webestica.com">
	<meta name="description" content="Booking - Multipurpose Online Booking Theme">

	<!-- Dark mode -->
	<script>
		const storedTheme = localStorage.getItem('theme')

		const getPreferredTheme = () => {
			if (storedTheme) {
				return storedTheme
			}
			return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'
		}

		const setTheme = function (theme) {
			if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) {
				document.documentElement.setAttribute('data-bs-theme', 'dark')
			} else {
				document.documentElement.setAttribute('data-bs-theme', theme)
			}
		}

		setTheme(getPreferredTheme())

		window.addEventListener('DOMContentLoaded', () => {
			var el = document.querySelector('.theme-icon-active');
			if (el != 'undefined' && el != null) {
				const showActiveTheme = theme => {
					const activeThemeIcon = document.querySelector('.theme-icon-active use')
					const btnToActive = document.querySelector(`[data-bs-theme-value="${theme}"]`)
					const svgOfActiveBtn = btnToActive.querySelector('.mode-switch use').getAttribute('href')

					document.querySelectorAll('[data-bs-theme-value]').forEach(element => {
						element.classList.remove('active')
					})

					btnToActive.classList.add('active')
					activeThemeIcon.setAttribute('href', svgOfActiveBtn)
				}

				window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
					if (storedTheme !== 'light' || storedTheme !== 'dark') {
						setTheme(getPreferredTheme())
					}
				})

				showActiveTheme(getPreferredTheme())

				document.querySelectorAll('[data-bs-theme-value]')
					.forEach(toggle => {
						toggle.addEventListener('click', () => {
							const theme = toggle.getAttribute('data-bs-theme-value')
							localStorage.setItem('theme', theme)
							setTheme(theme)
							showActiveTheme(theme)
						})
					})

			}
		})

	</script>

	<!-- Favicon -->
	<link rel="shortcut icon" href="assets/images/logo.png">

	<!-- Google Font -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="stylesheet"
		href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Poppins:wght@400;500;700&display=swap">

	<!-- Plugins CSS -->
	<link rel="stylesheet" type="text/css" href="assets/vendor/font-awesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/tiny-slider/tiny-slider.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/glightbox/css/glightbox.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


	<!-- Theme CSS -->
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">



</head>

<body>

	<!-- Add this updated preloader at the beginning of the body -->
	<div id="preloader">
		<div class="loader">
			<img src="assets/images/logo.png" alt="Loading...">
		</div>
	</div>

	<!-- Header START -->
	<header class="navbar-light py-3">
		<!-- Logo Nav START -->
		<nav class="navbar navbar-expand-lg">
			<div class="container d-block">
				<div class="row align-items-center">
					<div class="col-4">
						<!-- Logo START -->
						<a class="navbar-brand" href="index.php">
							<img class="light-mode-item navbar-brand-item d-inline h-70px h-md-90px"
								src="assets/images/logo.png" alt="logo">
							<img class="dark-mode-item navbar-brand-item d-inline h-70px h-md-90px"
								src="assets/images/logo.png" alt="logo">
						</a>
						<!-- Logo END -->
					</div>

					<div class="col-8">
						<!-- Navbar top Right-->


						<!-- Toggler button and stay button -->
						<div class="d-flex align-items-center justify-content-end">


							<!-- Dark mode option START -->
							<div class="nav-item dropdown ms-2 me-3"> <!-- Added me-3 class for right margin -->
								<button class="btn btn-link text-warning lh-3 p-0 mb-0" id="bd-theme" type="button"
									aria-expanded="false" data-bs-toggle="dropdown" data-bs-display="static">
									<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
										class="bi bi-circle-half theme-icon-active fa-fw" viewBox="0 0 16 16">
										<path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z" />
										<use href="#"></use>
									</svg>
								</button>

								<ul class="dropdown-menu min-w-auto dropdown-menu-end" aria-labelledby="bd-theme">
									<li class="mb-1">
										<button type="button" class="dropdown-item d-flex align-items-center"
											data-bs-theme-value="light">
											<svg width="16" height="16" fill="currentColor"
												class="bi bi-brightness-high-fill fa-fw mode-switch me-1"
												viewBox="0 0 16 16">
												<path
													d="M12 8a4 4 0 1 1-8 0 4 4 0 0 1 8 0zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
												<use href="#"></use>
											</svg>Light
										</button>
									</li>
									<li class="mb-1">
										<button type="button" class="dropdown-item d-flex align-items-center"
											data-bs-theme-value="dark">
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
												fill="currentColor" class="bi bi-moon-stars-fill fa-fw mode-switch me-1"
												viewBox="0 0 16 16">
												<path
													d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
												<path
													d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM3.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L3.863.1z" />
												<use href="#"></use>
											</svg>Dark
										</button>
									</li>
									<li>
										<button type="button" class="dropdown-item d-flex align-items-center active"
											data-bs-theme-value="auto">
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
												fill="currentColor" class="bi bi-circle-half fa-fw mode-switch me-1"
												viewBox="0 0 16 16">
												<path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z" />
												<use href="#"></use>
											</svg>Auto
										</button>
									</li>
								</ul>
							</div>
							<!-- Dark mode option END -->


						</div>

					</div>

				</div>
			</div>
			</div>
		</nav>
		<!-- Logo Nav END -->
	</header>
	<!-- Header END -->

	<!-- **************** MAIN CONTENT START **************** -->
	<main>

		<!-- =======================
Main Banner START -->
		<section class="py-0">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-11 mx-auto">
						<!-- Slider START -->
						<div class="tiny-slider arrow-round arrow-blur arrow-hover rounded-3 overflow-hidden">
							<div class="tiny-slider-inner" data-gutter="0" data-arrow="true" data-dots="false"
								data-items="1">
								<!-- NEW Card item START -->
								<div class="card overflow-hidden h-400px h-sm-600px rounded-0"
									style="background-color: #ffffff;">
									<!-- Card image overlay -->
									<div class="card-img-overlay d-flex align-items-center">
										<div class="container">
											<div class="row align-items-center">
												<div class="col-12 col-lg-6 order-2 order-lg-1">
													<h6 class="text-dark fw-normal mb-0">👋 Welcome to</h6>
													<!-- Title -->
													<h1 class="text-dark display-6">Travel Partner</h1>
													<p class="text-dark">Your trusted companion for all travel needs in Thekkady</p>
													<button href="#" class="btn btn-primary mb-0" data-bs-toggle="modal" data-bs-target="#bookingModal">
														<i class="fas fa-phone me-2"></i>Contact Us
													</button>
												</div>
												<div class="col-12 col-lg-6 order-1 order-lg-2 text-center">
													<img src="assets/images/logo.png" alt="Travel Partner Logo" 
														 style="max-height: 400px; width: auto; object-fit: contain;">
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- NEW Card item END -->

								<!-- Card item START -->
								<div class="card overflow-hidden h-400px h-sm-600px rounded-0"
									style="background-image:url(assets/images/services/cab_service.jpg); background-position: center; background-size: cover;">
									<!-- Background dark overlay -->
									<div class="bg-overlay bg-dark opacity-3"></div>
									<!-- Card image overlay -->
									<div class="card-img-overlay d-flex align-items-center">
										<div class="container">
											<div class="row">
												<div class="col-11 col-lg-7">
													<h6 class="text-white fw-normal mb-0">🚕 Travel with Comfort</h6>
													<!-- Title -->
													<h1 class="text-white display-6">24/7 Cab Service Available</h1>
													<button href="#" class="btn btn-primary mb-0" data-bs-toggle="modal"
													data-bs-target="#bookingModal">
														<i class="fas fa-taxi me-2"></i>Book a Ride
													</button>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- Card item END -->

								<!-- Card item START -->
								<div class="card overflow-hidden h-400px h-sm-600px rounded-0"
									style="background-image:url(assets/images/services/south_indian_package_trips.field.jpg); background-position: center; background-size: cover;">
									<!-- Background dark overlay -->
									<div class="bg-overlay bg-dark opacity-3"></div>
									<!-- Card image overlay -->
									<div class="card-img-overlay d-flex align-items-center">
										<div class="container">
											<div class="row">
												<div class="col-11 col-lg-7">
													<h6 class="text-white fw-normal mb-0">🌴 Explore South India</h6>
													<!-- Title -->
													<h1 class="text-white display-6">Unforgettable Package Trips</h1>
													<button href="#" class="btn btn-primary mb-0" data-bs-toggle="modal"
													data-bs-target="#bookingModal">
														<i class="fas fa-map-marked-alt me-2"></i>Plan Your Trip
													</button>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- Card item END -->

								<!-- Add more card items for other services like Jeep Safari, House Boat, and Room Booking -->

							</div>
						</div>
						<!-- Slider END -->
					</div>
				</div>
			</div>
		</section>
		<!-- =======================
Main Banner END -->

		<!-- =======================
Special offer START -->
		<section id="services" class="pb-0">
			<div class="container">
				<!-- Title -->
				<div class="row mb-4">
					<div class="col-12 text-center">
						<h3 class="mb-0">Our Services</h3>
					</div>
				</div>

				<!-- Cards grid START -->
				<div class="row g-4">
					<!-- Card 1 -->
					<div class="col-sm-6 col-lg-3">
						<div class="card h-100">
							<img src="assets/images/services/cab_service.jpg" class="card-img-top" alt="">
							<div class="card-body text-center">
								<h6 class="card-title"><a href="/cab">Cab Service</a></h6>
								<small>Available 24/7</small>
								<div class="mt-2"><button class="btn btn-sm btn-dark book-now" data-bs-toggle="modal"
										data-bs-target="#bookingModal">Book Now</button></div>
							</div>
						</div>
					</div>

					<!-- Card 2 -->
					<div class="col-sm-6 col-lg-3">
						<div class="card h-100">
							<img src="assets/images/services/south_indian_package_trips.field.jpg" class="card-img-top"
								alt="">
							<div class="card-body text-center">
								<h6 class="card-title"><a href="/trips">South Indian Package Trips</a></h6>
								<small>Available 24/7</small>
								<div class="mt-2"><button class="btn btn-sm btn-dark book-now" data-bs-toggle="modal"
										data-bs-target="#bookingModal">Book Now</button></div>
							</div>
						</div>
					</div>

					<!-- Card 3 -->
					<div class="col-sm-6 col-lg-3">
						<div class="card h-100">
							<img src="assets/images/services/jeep_safari.jpg" class="card-img-top" alt="">
							<div class="card-body text-center">
								<h6 class="card-title"><a href="/safari">Jeep Safari</a></h6>
								<small>Available 24/7</small>
								<div class="mt-2"><button class="btn btn-sm btn-dark book-now" data-bs-toggle="modal"
										data-bs-target="#bookingModal">Book Now</button></div>
							</div>
						</div>
					</div>

					<!-- Card 4 -->
					<div class="col-sm-6 col-lg-3">
						<div class="card h-100">
							<img src="assets/images/services/house_boat.jpg" class="card-img-top" alt="">
							<div class="card-body text-center">
								<h6 class="card-title"><a href="/houseboat">House Boat</a></h6>
								<small>Available 24/7</small>
								<div class="mt-2"><button class="btn btn-sm btn-dark book-now" data-bs-toggle="modal"
										data-bs-target="#bookingModal">Book Now</button></div>
							</div>
						</div>
					</div>

					<!-- Card 5 -->
					<div class="col-sm-6 col-lg-3">
						<div class="card h-100">
							<img src="assets/images/services/room_booking.avif" class="card-img-top" alt="">
							<div class="card-body text-center">
								<h6 class="card-title"><a href="/rooms">Room Booking</a></h6>
								<small>Available 24/7</small>
								<div class="mt-2"><button class="btn btn-sm btn-dark book-now" data-bs-toggle="modal"
										data-bs-target="#bookingModal">Book Now</button></div>
							</div>
						</div>
					</div>
				</div>
				<!-- Cards grid END -->
			</div>
		</section>
		<!-- =======================
Special offer END -->

		<!-- =======================

		<!-- =======================
Gallery START -->
		<section id="gallery">
			<div class="container-fluid">
				<!-- Title -->
				<div class="row mb-md-4">
					<div class="col-12 mx-auto text-center mb-4">
						<h2 class="mb-0">Our Precious Moments</h2>
					</div>
				</div>

				<!-- Slider START -->
				<div class="tiny-slider arrow-round arrow-blur arrow-hover rounded-3 overflow-hidden">
					<div class="tiny-slider-inner d-flex align-items-end" data-autoplay="true" data-edge="2"
						data-arrow="true" data-dots="false" data-items="6" data-items-lg="4" data-items-sm="2">
						<?php
						// Database connection
						require_once 'includes/db_connect.php';
						
						try {
							// Fetch 10 most recent images from gallery_photos
							$stmt = $pdo->prepare("SELECT * FROM gallery_photos ORDER BY created_at DESC LIMIT 10");
							$stmt->execute();
							$images = $stmt->fetchAll(PDO::FETCH_ASSOC);

							// Loop through images and create slider items
							foreach ($images as $image) {
								$imagePath = "assets/images/gallery/" . $image['filename'];
								?>
								<!-- Slider item -->
								<div>
									<a data-glightbox="" data-gallery="gallery" href="<?php echo htmlspecialchars($imagePath); ?>">
										<div class="card card-element-hover card-overlay-hover overflow-hidden">
											<!-- Image -->
											<img src="<?php echo htmlspecialchars($imagePath); ?>" class="rounded-3" alt="">
											<!-- Full screen button -->
											<div class="hover-element w-100 h-100">
												<i class="bi bi-fullscreen fs-6 text-white position-absolute top-50 start-50 translate-middle bg-dark rounded-1 p-2 lh-1"></i>
											</div>
										</div>
									</a>
								</div>
								<?php
							}
						} catch (PDOException $e) {
							// Log error and show fallback content
							error_log("Gallery fetch error: " . $e->getMessage());
						}
						?>

						<!-- Additional static items to ensure continuous scrolling -->
						<div>
							<a data-glightbox="" data-gallery="gallery" href="assets/images/category/hotel/gallery/03.jpg">
								<div class="card card-element-hover card-overlay-hover overflow-hidden">
									<img src="assets/images/category/hotel/gallery/03.jpg" class="rounded-3" alt="">
									<div class="hover-element w-100 h-100">
										<i class="bi bi-fullscreen fs-6 text-white position-absolute top-50 start-50 translate-middle bg-dark rounded-1 p-2 lh-1"></i>
									</div>
								</div>
							</a>
						</div>

						<div>
							<a data-glightbox="" data-gallery="gallery" href="assets/images/category/hotel/gallery/05.jpg">
								<div class="card card-element-hover card-overlay-hover overflow-hidden">
									<img src="assets/images/category/hotel/gallery/05.jpg" class="rounded-3" alt="">
									<div class="hover-element w-100 h-100">
										<i class="bi bi-fullscreen fs-6 text-white position-absolute top-50 start-50 translate-middle bg-dark rounded-1 p-2 lh-1"></i>
									</div>
								</div>
							</a>
						</div>

						<div>
							<a data-glightbox="" data-gallery="gallery" href="assets/images/category/hotel/gallery/08.jpg">
								<div class="card card-element-hover card-overlay-hover overflow-hidden">
									<img src="assets/images/category/hotel/gallery/08.jpg" class="rounded-3" alt="">
									<div class="hover-element w-100 h-100">
										<i class="bi bi-fullscreen fs-6 text-white position-absolute top-50 start-50 translate-middle bg-dark rounded-1 p-2 lh-1"></i>
									</div>
								</div>
							</a>
						</div>

						<div>
							<a data-glightbox="" data-gallery="gallery" href="https://www.youtube.com/embed/tXHviS-4ygo">
								<div class="card card-element-hover card-overlay-hover overflow-hidden">
									<img src="assets/images/category/hotel/gallery/04.jpg" class="rounded-3" alt="">
									<div class="hover-element w-100 h-100">
										<span class="btn text-danger btn-round btn-white position-absolute top-50 start-50 translate-middle mb-0">
											<i class="fas fa-play"></i>
										</span>
									</div>
								</div>
							</a>
						</div>

						<div>
							<a data-glightbox="" data-gallery="gallery" href="assets/images/category/hotel/gallery/06.jpg">
								<div class="card card-element-hover card-overlay-hover overflow-hidden">
									<img src="assets/images/category/hotel/gallery/06.jpg" class="rounded-3" alt="">
									<div class="hover-element w-100 h-100">
										<i class="bi bi-fullscreen fs-6 text-white position-absolute top-50 start-50 translate-middle bg-dark rounded-1 p-2 lh-1"></i>
									</div>
								</div>
							</a>
						</div>
					</div>
				</div>
				<!-- Slider END -->
			</div>
		</section>
		<!-- =======================
Gallery END -->

	</main>
	<!-- **************** MAIN CONTENT END **************** -->

	<!-- =======================
Footer START -->
	<footer class="bg-dark">
		<div class="container">
			<div class="row py-4">
				<!-- Contact Information -->
				<div class="col-lg-4 mb-3 mb-lg-0">
					<h5 class="text-white mb-3">Contact Us</h5>
					<ul class="list-unstyled text-body-secondary">
						<li><i class="fas fa-map-marker-alt me-2"></i>Thekkady, Idukki, Kerala, India</li>
						<li><a href="tel:+917012131346" target="_blank" class="text-body-secondary"><i class="fas fa-phone me-2"></i>+91 70121 31346 (Main)</a></li>
						<li><a href="tel:+919207322397" class="text-body-secondary"><i class="fas fa-phone me-2"></i>+91 9207322397 (Secondary)</a></li>
						<li><a href="tel:+918848760756" class="text-body-secondary"><i class="fas fa-phone me-2"></i>+91 8848760756 (Secondary)</a></li>
					</ul>
				</div>

				<!-- Quick Links -->
				<div class="col-lg-4 mb-3 mb-lg-0">
					<h5 class="text-white mb-3">Quick Links</h5>
					<ul class="list-unstyled text-body-secondary">
						<li><a href="#" class="text-body-secondary">Home</a></li>
						<li><a href="#services" class="text-body-secondary">Our Services</a></li>
						<li><a href="#gallery" class="text-body-secondary">Gallery</a></li>
					</ul>
				</div>

				<!-- Social Media -->
				<div class="col-lg-4">
					<h5 class="text-white mb-3">Follow Us</h5>
					<ul class="list-inline text-body-secondary">
						<li class="list-inline-item"><a href="https://www.facebook.com/profile.php?id=61564957317620"
								target="_blank" class="text-body-secondary"><i class="fab fa-facebook-f"></i></a></li>
						<li class="list-inline-item"><a href="https://www.instagram.com/travelpartner__tkdy/"
								target="_blank" class="text-body-secondary"><i class="fab fa-instagram"></i></a></li>
					</ul>
				</div>
			</div>

			<hr class="mt-4 mb-0 border-top border-secondary">

			<div class="d-lg-flex justify-content-between align-items-center py-3 text-center text-lg-start">
				<!-- copyright text -->
				<div class="text-body-secondary text-primary-hover"> Copyrights ©2024 Travel Partner. All rights
					reserved. </div>
				<!-- copyright links-->
				<div class="nav mt-2 mt-lg-0">
					<ul class="list-inline text-primary-hover mx-auto mb-0">
						<li class="list-inline-item me-0"><a class="nav-link text-body-secondary py-1" href="#">Privacy
								policy</a></li>
						<li class="list-inline-item me-0"><a class="nav-link text-body-secondary py-1" href="#">Terms
								and conditions</a></li>
						<li class="list-inline-item me-0"><a class="nav-link text-body-secondary py-1 pe-0"
								href="#">Refund policy</a></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<!-- =======================
Footer END -->
<!-- Modal -->
<div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title text-white id="bookingModalLabel">Contact Us</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <h6 class="fw-bold"><i class="fas fa-map-marker-alt me-2"></i>Address</h6>
                        <p>Thekkady, Idukki, Kerala, India</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <h6 class="fw-bold"><i class="fas fa-phone me-2"></i>Main Contact</h6>
                        <p><a href="tel:+917012131346" target="_blank" class="text-decoration-none">+91 70121 31346</a></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <h6 class="fw-bold"><i class="fas fa-phone me-2"></i>Secondary Numbers</h6>
                        <p>
                            <a href="tel:+919207322397" class="text-decoration-none me-3">+91 9207322397</a>
                            <a href="tel:+918848760756" class="text-decoration-none">+91 8848760756</a>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <h6 class="fw-bold"><i class="fas fa-envelope me-2"></i>Email</h6>
                        <p><a href="mailto:travelpartnertkdy@gmail.com" class="text-decoration-none">travelpartnertkdy@gmail.com</a></p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <h6 class="fw-bold"><i class="fas fa-clock me-2"></i>Business Hours</h6>
                        <p>Monday - Sunday: 24/7</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="https://wa.me/917012131346" target="_blank" class="btn btn-success"><i class="fab fa-whatsapp me-2"></i>WhatsApp Us</a>
            </div>
        </div>
    </div>
</div>


	<!-- Back to top -->
	<div class="back-top"></div>

	<!-- Bootstrap JS -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

	<!-- Vendors -->
	<script src="assets/vendor/tiny-slider/tiny-slider.js"></script>
	<script src="assets/vendor/glightbox/js/glightbox.js"></script>

	<!-- ThemeFunctions -->
	<script src="assets/js/functions.js"></script>

	<!-- Add this script just before the closing body tag -->
	<script>
		// Function to check and apply the current theme to the preloader
		function applyThemeToPreloader() {
			const theme = document.documentElement.getAttribute('data-bs-theme');
			document.getElementById('preloader').setAttribute('data-bs-theme', theme);
		}

		// Apply theme immediately when the script runs
		applyThemeToPreloader();

		// Also apply theme when it changes
		const observer = new MutationObserver(applyThemeToPreloader);
		observer.observe(document.documentElement, { attributes: true, attributeFilter: ['data-bs-theme'] });

		const minDisplayTime = 2000; // 2 seconds
		const startTime = new Date().getTime();

		window.addEventListener('load', function () {
			const currentTime = new Date().getTime();
			const elapsedTime = currentTime - startTime;

			if (elapsedTime < minDisplayTime) {
				setTimeout(hidePreloader, minDisplayTime - elapsedTime);
			} else {
				hidePreloader();
			}
		});

		function hidePreloader() {
			var preloader = document.getElementById('preloader');
			preloader.style.display = 'none';
			// Disconnect the observer when the preloader is hidden
			observer.disconnect();
		}
	</script>

</body>

</html>