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
					<div class="panel panel-primary">
						<div class="panel-heading">Product name
							<span class="pull-right">Owner Name</span>
						</div>
						<div class="panel-body">
							<b>Form Booking</b>
							<button class="btn btn-secondary pull-right" type="button" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">Lihat Product dan Owner</button><br><br>
							<div class="jumbotron">
								<div class="row">

									<div class="col-sm-6 col-xs-6">
										<div class="collapse multi-collapse" id="multiCollapseExample1">
											<div class="panel panel-primary">
												<div class="panel-body">
													<div class="card card-body">
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
											</div>
										</div>
									</div>
									<div class="col-sm-6 col-xs-12">
										<div class="collapse multi-collapse" id="multiCollapseExample1">
											<div class="panel panel-primary">
												<div class="panel-body">
													<div class="card card-body">
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
											</div>
										</div>
									</div>
								</div>

								<div class="list-group">
									<div class="form-group">
										<label class="control-label">Nama Lengkap:</label>
										<input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required>
									</div>
									<div class="form-group">
										<label class="control-label">Whatsapp :</label>
										<input type="number" class="form-control" name="wa" placeholder="Nomor Whatsapp" required>
									</div>
									<div class="form-group">
										<label class="control-label">Tanggal Acara :</label>
										<input type="date" class="form-control" name="wa" placeholder="Nomor Whatsapp" required>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-sm-3 col-xs-12">
												<label>Tenor Pembayaran :</label>
											</div>
											<div class="col-md-2 col-sm-4 col-xs-12 col-option">
												<input type="radio" id="rb_status_1" name="status" value="1" class="square-purple" checked>
												<label for="rb_status_1" class="cursor-pointer">1 Kali</label>
											</div>
											<div class="col-md-2 col-sm-4 col-xs-12 col-option">
												<input type="radio" id="rb_status_2" name="status" value="0" class="square-purple">
												<label for="rb_status_2" class="cursor-pointer">2 Kali</label>
											</div>
											<div class="col-md-2 col-sm-4 col-xs-12 col-option">
												<input type="radio" id="rb_status_2" name="status" value="0" class="square-purple">
												<label for="rb_status_2" class="cursor-pointer">3 Kali</label>
											</div>
										</div>

										<div class="form-group">
											<label class="control-label">Alamat Lengkap:</label>
											<textarea class="form-control text-area" name="question" placeholder="Alamat lengkap: Kampung-Rt/Rw-Desa-Kecamatan-Kabupaten-Provnsi" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?> required><?php echo old('question'); ?></textarea>

										</div>

										<div class="">
										<center>
										<h6>Harga: Rp. 2708000</h6>
										<h6>Biaya penanganan: Rp. 2708000</h6>
										<h6>Total Bayar: <b>Rp. 2708000</b></h6> 	
										</center>
										</div><br>
										<div>
											<center>
											<!-- <button class=" btn btn-info">Ajukan Penawaran</button> -->
											<button class=" btn btn-primary">Booking Sekarang</button>
											</center>
										</div>
									</div>
								</div>
							</div>
						</div>


					</div>
				</div>
			</div>
		</div>
</section>
<!-- /.Section: main -->