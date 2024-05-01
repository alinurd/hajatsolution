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
					<li class="breadcrumb-item active">Owner</li>
				</ol>
			</div>
			<div class="page-content">
				<div class="row ">
					<?php for ($i = 0; $i < 20; $i++) { ?>
						<div class="col-xs-6 col-sm-4 col-md-3">
							<div class="panel panel-primary">
								<div class="panel-heading">Owner Name</div>
								<div class="panel-body">
									<center>
										<img src="https://picsum.photos/150/130" alt="..."><br>
										<span style="font-size: 10px; font-style: italic;">Hiburan, dekoarsi, potografi</span>
									</center>
								</div>
								<div class="panel-footer">
									<center>
										<div class="btn-group" role="group" aria-label="...">
											<button type="button" class="btn btn-info"> <span class="glyphicon glyphicon-star"> </span> 89</button>
 
											<a href="<?php echo base_url('owner/detail/12'); ?>" class="btn btn-default" type="button">Detail</a>
	 										</div>
									</center>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- /.Section: main -->