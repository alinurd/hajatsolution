<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="box">
    <div class="box-header with-border">
        <div class="left">
            <h3 class="box-title"><?php echo $title; ?></h3>
        </div>
    </div><!-- /.box-header -->

    <!-- include message block -->
    <div class="col-sm-12">
        <?php $this->load->view('admin/includes/_messages'); ?>
    </div>

    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped dataTable" id="cs_datatable" role="grid" aria-describedby="example1_info">
                        <thead>
                            <tr role="row">
                                <th width="20"><?php echo trans('id'); ?></th>
                                <th>Code Transaksi</th>
                                <th>Group</th>
                                <th>Nama Customer</th>
                                <th>Nama Event</th>
                                <th>Tanggal Acara</th>
                                <th>Status</th>
                                <th class="max-width-120"><?php echo trans('options'); ?></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($data as $k) :
                            ?>
                                <tr>
                                    <td><?php echo html_escape($k->id_booking); ?></td>
                                    <td><?php echo html_escape($k->code); ?></td>
                                    <td><?php echo html_escape($k->group); ?></td>
                                    <td><?php echo html_escape($k->nama); ?></td>
                                    <td><?php echo html_escape($k->title); ?></td>
                                    <td><?php echo html_escape($k->tanggal_acara); ?></td>
                                    <td>
                                        <?php if ($k->status_booking == 1) : ?>
                                            <label class="label bg-info    ">Pending</label>
                                        <?php elseif ($k->status_booking == 2) : ?>
                                            <label class="label label-warning">Proses Pembayaran</label>
                                        <?php else : ?>
                                            <label class="label label-success">Lunas</label>
                                        <?php endif; ?>
                                    </td>

                                    <td>
                                        <button type="button" class="btn-list-button" data-toggle="modal" data-target="#myModal<?= $k->id_booking ?>" onclick="$('#modal_user_id').val('<?php echo html_escape($k->id_booking); ?>');">
                                            <i class="fa fa-user option-icon"></i>Update Pembayaran
                                        </button>
                                        <?php echo form_open('owner_controller/booking_options_post'); ?>
                                        <input type="hidden" name="id" value="<?php echo html_escape($k->id_booking); ?>">

                                        <div class="dropdown">
                                            <button class="btn bg-purple dropdown-toggle btn-select-option" type="button" data-toggle="dropdown"><?php echo trans('select_option'); ?>
                                                <span class="caret"></span>
                                            </button>

                                            <ul class="dropdown-menu options-dropdown">
                                                <li>

                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)" onclick="delete_item('admin_controller/delete_user_post','<?php echo $k->id_booking; ?>','<?php echo trans("confirm_user"); ?>');"><i class="fa fa-trash option-icon"></i><?php echo trans('delete'); ?></a>
                                                </li>
                                            </ul>
                                        </div>

                                        <?php echo form_close(); ?><!-- form end -->
                                    </td>

                                </tr>
                                <div id="myModal<?= $k->id_booking ?>" class="modal fade" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Tenor Pembayaran [<?= $k->title ?> - <?= $k->nama ?>]</h4>
                                            </div>
                                            <?php echo form_open('owner_controller/update_pembayaran'); ?>
                                            <input type="hidden" name="id_booking" id="modal_user_id" value="<?= $k->id_booking ?>">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="jml" class="">jumlah Pembayaran </label>
                                                    <input type="number" id="jml" name="jumlah" class="form-control">
                                                </div>
                                                <div class="form-group">
										<label class="control-label">Tenor Pembayaran :</label>
										<div class="input-group">
											<span class="input-group-btn">
												<button class="btn btn-primary btn-md" id="tenoskurang" type="button">-</button>
											</span>
											<input id="tenorInput" type="text" readonly class="form-control text-center col-md-6" name="tenor" placeholder="Tenor Pembayaran" value="1">
											<span class="input-group-btn">
												<button class="btn btn-primary btn-md" id="tenortambah" type="button">+</button>
											</span>
										</div>
									</div>
                                                <!-- <div class="form-group">
                                                    <div class="row">
                                                        <?php
                                                        for ($i = 1; $i <= $k->tenor; $i++) { ?>
                                                            <div class="col-sm-4 col-xs-12 col-option">
                                                                <input type="radio" id="tenor<?= $i ?>" name="tenor" value="<?= $i ?>" class="square-purple" <?= $i === 1 ? 'checked' : '' ?>>
                                                                <label for="tenor<?= $i ?>" class="cursor-pointer">Pembayaran ke <?= $i ?></label>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                </div> -->

                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success"><?php echo trans('save'); ?></button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo trans('close'); ?></button>
                                            </div>

                                            <?php echo form_close(); ?><!-- form end -->
                                        </div>

                                    </div>
                                </div>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div><!-- /.box-body -->
</div>


<script>
	$(document).ready(function() {
		$('#tenortambah').click(function() {
			var value = parseInt($('#tenorInput').val()) || 0;
			$('#tenorInput').val(value + 1);
		});

		$('#tenoskurang').click(function() {
			var value = parseInt($('#tenorInput').val()) || 0;
			if (value > 1) {
				$('#tenorInput').val(value - 1);
			} else {
				alert("Tenor Pembayaran Minimal 1 Kali")
			}
		});
	});
</script>