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
							<div class="jumbotron">
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
										<br>
										<div class="form-group">
											<label class="control-label"><?php echo trans('question'); ?></label>
											<textarea class="form-control text-area" name="question" placeholder="Alamat lengkap: Kampung-Rt/Rw-Desa-Kecamatan-Kabupaten-Provnsi" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?> required><?php echo old('question'); ?></textarea>

										</div>
									</div>
									<div class="pull-right">
									<button class=" btn btn-info">Ajukan Penawaran</button>
									<button class=" btn btn-primary">Booking Sekarang</button>
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