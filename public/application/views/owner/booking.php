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
						<div class="panel-heading"><?= $k->title ?>
							<span class="pull-right"><?= $k->group ?></span>
						</div>
						<div class="panel-body">
							<b>Form Booking</b>
							<!-- <button class="btn btn-secondary pull-right" type="button" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">Lihat Product dan Owner</button><br><br> -->
							<div class="jumbotron">
								<div class="panel panel-primary">
									<div class="panel-body">
										<div class="card card-body">
											<div class="jumbotron">
												<center>
													<?php $this->load->view("post/_post_image_booking", ['post_item' => $k, 'type' => 'image_small']); ?></center>
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
											<textarea class="form-control text-area" name="question" placeholder="Contoh:  Kampung Baru RT 001 RW 002, Desa Mulya, Kecamatan Sejahtera, Kabupaten Maju Jaya, Provinsi Sejahtera " <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?> required><?php echo old('question'); ?></textarea>

										</div>

										<div class="">
											<center>
												<h6> Harga Rp.
												<?php echo html_escape($k->harga !== null && $k->harga !== 0 ? number_format($k->harga) : '0'); ?>
												</h6>
												<h6>Biaya penanganan: Rp. 120.000</h6>
												<h6>Total Bayar: <b>Rp. <span id="ttlBayar">
												<?php
												$harga=$k->harga+120000;
												 echo html_escape($k->harga !== null && $k->harga !== 0 ? number_format($harga) : '0'); ?>
												</span></b></h6>
											</center>
										</div><br>
										<div>
											<center>
												<button class=" btn btn-primary">Booking Sekarang</button><br><br>
												<a style="color:blue" target="_blank" href="https://wa.me/6285717570339?text=Halo%20Admin,%20saya%20tertarik%20 <?=$k->nama_kategori?>%20dari%20grup%20<?=$k->group?>%20(<?=$k->title?>)%20apakah%20boleh%20tanya-tanya%20dulu%3F">Tanya-Tanya Dulu?</a>
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

