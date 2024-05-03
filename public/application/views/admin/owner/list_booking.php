<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="box">
    <div class="box-header with-border">
        <div class="left">
            <h3 class="box-title"><?php echo trans('users'); ?></h3>
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
                                    <td><?php echo html_escape($k->post_id); ?></td>
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
                                        <?php echo form_open('owner_controller/booking_options_post'); ?>
                                        <input type="hidden" name="id" value="<?php echo html_escape($k->id); ?>">

                                        <div class="dropdown">
                                            <button class="btn bg-purple dropdown-toggle btn-select-option" type="button" data-toggle="dropdown"><?php echo trans('select_option'); ?>
                                                <span class="caret"></span>
                                            </button>

                                            <ul class="dropdown-menu options-dropdown">
                                                <li>
                                                    <button type="button" class="btn-list-button" data-toggle="modal" data-target="#myModal" onclick="$('#modal_user_id').val('<?php echo html_escape($k->id); ?>');">
                                                        <i class="fa fa-user option-icon"></i>Update Pembayaran
                                                    </button>
                                                </li>

                                                <li>
                                                    <a href="javascript:void(0)" onclick="delete_item('admin_controller/delete_user_post','<?php echo $k->id; ?>','<?php echo trans("confirm_user"); ?>');"><i class="fa fa-trash option-icon"></i><?php echo trans('delete'); ?></a>
                                                </li>
                                            </ul>
                                        </div>

                                        <?php echo form_close(); ?><!-- form end -->
                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div><!-- /.box-body -->
</div>


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tenor Pembayaran</h4>
            </div>
            <?php echo form_open('owner_controller/update_pembayaran'); ?>
            <div class="modal-body">
                <div class="form-group">
                         <label for="role_admin" class="">jumlah Pembayaran</label>
                        <input type="number" id="role_admin" name="jumlah" value="admin" class="form-control" >
                 </div>
                <div class="form-group">

                    <div class="row">
                        <input type="hidden" name="user_id" id="modal_user_id" value="">
                        <div class="col-sm-4 col-xs-12 col-option">
                            <input type="radio" id="role_admin" name="tenor" value="admin" class="square-purple" checked>
                            <label for="role_admin" class="cursor-pointer">Pembayaran ke 1</label>
                        </div>
                        <div class="col-sm-4 col-xs-12 col-option">
                            <input type="radio" id="role_author" name="tenor" value="author" class="square-purple">
                            <label for="role_author" class="cursor-pointer">Pembayaran ke 2</label>
                        </div>
                        <div class="col-sm-4 col-xs-12 col-option">
                            <input type="radio" id="role_user" name="tenor" value="user" class="square-purple">
                            <label for="role_user" class="cursor-pointer">Pembayaran ke 3</label>
                        </div>

                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success"><?php echo trans('save'); ?></button>
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo trans('close'); ?></button>
            </div>

            <?php echo form_close(); ?><!-- form end -->
        </div>

    </div>
</div>