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
								<center> <img src="<?php echo base_url('uploads/owner/owner_code/jombotron.jpg'); ?>" class="img-responsive" alt="Responsive image">
								</center>
								<p>
									<center> Hiburan, dekoarsi, potografi</center>
								</p>
								<center>
									<!-- total start di postingan -->
									<button type="button" class="btn btn-info btn-lg"> <span class="glyphicon glyphicon-star"> </span> 89</button>
									<a class="btn btn-primary btn-lg" href="#" role="button"><span class="glyphicon glyphicon-thumbs-up"></span></a>
									<br>
									<br>
									Tanggal Booking: <br>
									<span class="badge badge-info"><?= date("d-m-Y") ?></span>
									<span class="badge badge-info"><?= date("d-m-Y") ?></span>
									<span class="badge badge-info"><?= date("d-m-Y") ?></span>
									<span class="badge badge-info"><?= date("d-m-Y") ?></span>
								</center>
							</div>
						</div>
					</div>
					<ul class="nav nav-pills">
						<li role="presentation" class="active"><a href="#posting" data-toggle="tab">Posting</a></li>
						<li role="presentation"><a href="#gallery" data-toggle="tab">Gallery</a></li>
					</ul>

					<div class="tab-content">
						<div id="posting" class="tab-pane fade in active">
							<section id="main" class="margin-top-30">
								<div class="container">
									<div class="row">
										<div class="col-xs-12 col-sm-12 col-md-8">
											<div class="content">
												<?php if ($layout == "layout_4" || $layout == "layout_5" || $layout == "layout_6") : ?>
													<div class="first-tmp-slider">
														<!--Show if enabled-->
														<?php if ($general_settings->slider_active == 1) {
															$this->load->view('partials/_slider_second', $this->slider_posts);
														} ?>
													</div>
												<?php endif; ?>
												<div class="col-xs-12 col-sm-12 posts <?php echo ($layout == "layout_3" || $layout == "layout_6") ? 'p-0 posts-boxed' : ''; ?>">
													<div class="row">
														<?php $count = 0;
														foreach ($posts as $item) :
															if ($count != 0 && $count % 2 == 0) : ?>
																<div class="col-sm-12 col-xs-12"></div>
														<?php endif;
															$this->load->view('post/_post_item', ['item' => $item]);
															if ($count == 1) :
																$this->load->view("partials/_ad_spaces", ["ad_space" => "index_top"]);
															endif;
															$count++;
														endforeach; ?>
													</div>
												</div>
												<div class="col-xs-12 col-sm-12 col-xs-12">
													<div class="row">
														<?php $this->load->view("partials/_ad_spaces", ["ad_space" => "index_bottom"]); ?>
													</div>
												</div>
												<div class="col-xs-12 col-sm-12 col-xs-12">
													<div class="row">
														<?php echo $this->pagination->create_links(); ?>
													</div>
												</div>
											</div>
										</div>
										<div class="col-xs-12 col-sm-12 col-md-4">
											<?php $this->load->view('partials/_sidebar'); ?>
										</div>
									</div>
								</div>
							</section>
						</div>



						
						<div id="gallery" class="tab-pane fade">
							Galery
						</div>
					</div>


				</div>
			</div>
		</div>
	</div>
</section>
<!-- /.Section: main -->