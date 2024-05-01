<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<!-- Section: main -->
<section id="main">
	<div class="container">
		<div class="row">
			<!-- breadcrumb -->
			<div class="page-breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="<?php echo lang_base_url(); ?>"><?php echo trans("home"); ?></a>
					</li>
					<li class="breadcrumb-item">
						<a href="<?php echo base_url('owner'); ?>">Owner</a>
					</li>
					<li class="breadcrumb-item">
						<a href="#">Detail</a>
					</li>
					<li class="breadcrumb-item active"> <b>Owner Name</b></li>
				</ol>
			</div>
			<div class="page-content ">
				<div class="container">
					<div class="panel panel-info">
						<div class="panel-heading">Owner Name
							 <span class="pull-right">Rekomendasi</span> 
					</div>
						<div class="panel-body">
							<div class="jumbotron">
								<img src="<?php echo base_url('uploads/owner/owner_code/jombotron.jpg'); ?>" class="img-responsive" alt="Responsive image">
								<p>
									<center> Hiburan, dekoarsi, potografi</center>
								</p>
								<center>
								<!-- total start di postingan -->
									<button type="button" class="btn btn-info btn-lg"> <span class="glyphicon glyphicon-star"> </span> 89</button> 
									<a class="btn btn-primary btn-lg" href="#" role="button"><span class="glyphicon glyphicon-thumbs-up"></span></a>
									<br>
									<span>pofularitas 90%</span>
								</center>
							</div>
						</div> 
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- /.Section: main -->