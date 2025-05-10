<?php
include 'database.php';  // Your database connection
session_start();
?>

<?php
 include 'header.php';
?>

<style>
	.doctor-img img {
    width: 200px; /* Fixed width */
    height: 300px; /* Fixed height */
    object-fit: cover; /* Crop the image to maintain aspect ratio */
    border-radius: 8px; /* Optional: rounded corners */
    display: block;
    margin: 0 auto; /* Centers the image */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Optional: Adds a light shadow */
}
</style>

<section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">All Doctors</span>
          <h1 class="text-capitalize mb-5 text-lg">Specalized doctors</h1>

          <!-- <ul class="list-inline breadcumb-nav">
            <li class="list-inline-item"><a href="index.php" class="text-white">Home</a></li>
            <li class="list-inline-item"><span class="text-white">/</span></li>
            <li class="list-inline-item"><a href="#" class="text-white-50">All Doctors</a></li>
          </ul> -->
        </div>
      </div>
    </div>
  </div>
</section>


<!-- portfolio -->
<section class="section doctors">
  <div class="container">
  	  <div class="row justify-content-center">
             <div class="col-lg-6 text-center">
                <div class="section-title">
                    <h2>Doctors</h2>
                    <div class="divider mx-auto my-4"></div>
                </div>
            </div>
        </div>

     
    <div class="row shuffle-wrapper portfolio-gallery">
		<?php
			$query = "SELECT * FROM doctor";
			$result = mysqli_query($conn, $query);
			while ($row = mysqli_fetch_assoc($result)) {
				echo '
				<div class="col-lg-3 col-sm-6 col-md-6 mb-4 shuffle-item" data-groups="[&quot;cat2&quot;]">
        		<div class="position-relative doctor-inner-box">
					<div class="doctor-card" data-doctor-id="' . $row['id'] . '">
						<div class="doctor-profile">
		        			<div class="doctor-img">
								<img src="Admin/images/' . $row['docImage'] . '" alt="Doctor Image" class="img-fluid w-100">
							</div>
	            		</div>
						<div class="content mt-3">
							<h4 class="mb-0">' . $row['username'] . '</h4>
							<p>' . $row['department'] . '</p>
							<p class="doctor-fees">Fees: Rs. ' . $row['docFees'] . '</p>
						</div>
					</div>
				</div>
				</div>';
			}
        ?>
    </div>
  </div>
</section>

<!-- /portfolio -->
<section class="section cta-page">
	<div class="container">
		<div class="row">
			<div class="col-lg-7">
				<div class="cta-content">
					<div class="divider mb-4"></div>
					<h2 class="mb-5 text-lg">We are pleased to offer you the <span class="title-color">chance to have the healthy</span></h2>
					<a href="appoinment.php" class="btn btn-main-2 btn-round-full">Get appoinment<i class="icofont-simple-right  ml-2"></i></a>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- footer Start -->
<?php include "footer.php"; ?>

    <!-- 
    Essential Scripts
    =====================================-->

    
    <!-- Main jQuery -->
    <script src="plugins/jquery/jquery.js"></script>
    <!-- Bootstrap 4.3.2 -->
    <script src="plugins/bootstrap/js/popper.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/counterup/jquery.easing.js"></script>
    <!-- Slick Slider -->
    <script src="plugins/slick-carousel/slick/slick.min.js"></script>
    <!-- Counterup -->
    <script src="plugins/counterup/jquery.waypoints.min.js"></script>
    
    <script src="plugins/shuffle/shuffle.min.js"></script>
    <script src="plugins/counterup/jquery.counterup.min.js"></script>
    <!-- Google Map -->
    <script src="plugins/google-map/map.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA&callback=initMap"></script>    
    
    <script src="js/script.js"></script>
    <script src="js/contact.js"></script>

  </body>
  </html>