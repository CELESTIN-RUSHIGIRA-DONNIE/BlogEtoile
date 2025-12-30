<?php include("include/header.php"); ?>

<div class="content-body">
	<div class="container-fluid">
		<div class="row">

			<div class="col-xl-3 col-xxl-3 col-sm-6">
				<div class="widget-stat card">
					<div class="card-body">
						<div class="media ai-icon">
							<span class="mr-3">
								<!-- <i class="ti-user"></i> -->
								<svg id="icon-customers" xmlns="http://www.w3.org/2000/svg" width="30" height="30"
									viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
									stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
									<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
									<circle cx="12" cy="7" r="4"></circle>
								</svg>
							</span>
							<div class="media-body">
								<p class="mb-1">Membres</p>
								<?php
								$dash_agents = "SELECT * FROM membres WHERE status = 1";
								$dash_agents_run = mysqli_query($con, $dash_agents);
								if ($agents_total = mysqli_num_rows($dash_agents_run)) {
									echo '<h3 class="mb-0">' . $agents_total . '</h3>';
								} else {
									echo '<h4 class="mb-0">0</h4>';
								}
								?>
								<span class="badge badge-primary">+3.5%</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-xxl-3 col-sm-6">
				<div class="widget-stat card">
					<div class="card-body">
						<div class="media ai-icon">
							<span class="mr-3">
								<svg id="icon-orders" xmlns="http://www.w3.org/2000/svg" width="30" height="30"
									viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
									stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text">
									<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
									<polyline points="14 2 14 8 20 8"></polyline>
									<line x1="16" y1="13" x2="8" y2="13"></line>
									<line x1="16" y1="17" x2="8" y2="17"></line>
									<polyline points="10 9 9 9 8 9"></polyline>
								</svg>
							</span>
							<div class="media-body">
								<p class="mb-1">Post</p>
								<?php
								$dash_post = "SELECT * FROM posts WHERE status = 1";
								$dash_post_run = mysqli_query($con, $dash_post);
								if ($post_total = mysqli_num_rows($dash_post_run)) {
									echo '<h3 class="mb-0">' . $post_total . '</h3>';
								} else {
									echo '<h4 class="mb-0">0</h4>';
								}
								?>
								<span class="badge badge-warning">+3.5%</span>
							</div>

						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-xxl-3 col-sm-6">
				<div class="widget-stat card">
					<div class="card-body">
						<div class="media ai-icon">
							<span class="mr-3">
								<svg id="icon-revenue" xmlns="http://www.w3.org/2000/svg" width="30" height="30"
									viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
									stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign">
									<line x1="12" y1="1" x2="12" y2="23"></line>
									<path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
								</svg>
							</span>
							<div class="media-body">
								<p class="mb-1">Fichiers</p>
								<?php
								$dash_fichier = "SELECT * FROM fichiers";
								$dash_fichier_run = mysqli_query($con, $dash_fichier);
								if ($fichier_total = mysqli_num_rows($dash_fichier_run)) {
									echo '<h3 class="mb-0">' . $fichier_total . '</h3>';
								} else {
									echo '<h4 class="mb-0">0</h4>';
								}
								?>
								<span class="badge badge-danger">+3.5%</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-xxl-3 col-sm-6">
				<div class="widget-stat card">
					<div class="card-body">
						<div class="media ai-icon">
							<span class="mr-3">
								<svg id="icon-database-widget" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
									viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
									stroke-linecap="round" stroke-linejoin="round" class="feather feather-database">
									<ellipse cx="12" cy="5" rx="9" ry="3"></ellipse>
									<path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path>
									<path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>
								</svg>
							</span>
							<div class="media-body">
								<p class="mb-1">Abonnés</p>
								<?php
								$dash_subscribers = "SELECT * FROM subscribers WHERE status ='active'";
								$dash_subscribers_run = mysqli_query($con, $dash_subscribers);
								if ($subscribers_total = mysqli_num_rows($dash_subscribers_run)) {
									echo '<h3 class="mb-0">' . $subscribers_total . '</h3>';
								} else {
									echo '<h4 class="mb-0">0</h4>';
								}
								?>
								<span class="badge badge-success">+3.5%</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include("include/footer.php"); ?>