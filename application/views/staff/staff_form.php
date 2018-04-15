<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Staff <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Staff Id <?php echo form_error('staff_id') ?></label>
            <input type="text" class="form-control" name="staff_id" id="staff_id" placeholder="Staff Id" value="<?php echo $staff_id; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Staff Nama <?php echo form_error('staff_nama') ?></label>
            <input type="text" class="form-control" name="staff_nama" id="staff_nama" placeholder="Staff Nama" value="<?php echo $staff_nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Staff Tplahir <?php echo form_error('staff_tplahir') ?></label>
            <input type="text" class="form-control" name="staff_tplahir" id="staff_tplahir" placeholder="Staff Tplahir" value="<?php echo $staff_tplahir; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Staff Tglahir <?php echo form_error('staff_tglahir') ?></label>
            <input type="text" class="form-control" name="staff_tglahir" id="staff_tglahir" placeholder="Staff Tglahir" value="<?php echo $staff_tglahir; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Staff Jenkel <?php echo form_error('staff_jenkel') ?></label>
            <input type="text" class="form-control" name="staff_jenkel" id="staff_jenkel" placeholder="Staff Jenkel" value="<?php echo $staff_jenkel; ?>" />
        </div>
	    <div class="form-group">
            <label for="staff_alamat">Staff Alamat <?php echo form_error('staff_alamat') ?></label>
            <textarea class="form-control" rows="3" name="staff_alamat" id="staff_alamat" placeholder="Staff Alamat"><?php echo $staff_alamat; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Staff Email <?php echo form_error('staff_email') ?></label>
            <input type="text" class="form-control" name="staff_email" id="staff_email" placeholder="Staff Email" value="<?php echo $staff_email; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Staff Telpon <?php echo form_error('staff_telpon') ?></label>
            <input type="text" class="form-control" name="staff_telpon" id="staff_telpon" placeholder="Staff Telpon" value="<?php echo $staff_telpon; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Reg Id <?php echo form_error('reg_id') ?></label>
            <input type="text" class="form-control" name="reg_id" id="reg_id" placeholder="Reg Id" value="<?php echo $reg_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">User Id <?php echo form_error('user_id') ?></label>
            <input type="text" class="form-control" name="user_id" id="user_id" placeholder="User Id" value="<?php echo $user_id; ?>" />
        </div>
	    <input type="hidden" name="staff_id" value="<?php echo $staff_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('staff') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>