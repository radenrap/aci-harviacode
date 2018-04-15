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
        <h2 style="margin-top:0px">User <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">User Nama <?php echo form_error('user_nama') ?></label>
            <input type="text" class="form-control" name="user_nama" id="user_nama" placeholder="User Nama" value="<?php echo $user_nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">User Level <?php echo form_error('user_level') ?></label>
            <input type="text" class="form-control" name="user_level" id="user_level" placeholder="User Level" value="<?php echo $user_level; ?>" />
        </div>
	    <div class="form-group">
            <label for="username">User Inisial <?php echo form_error('user_inisial') ?></label>
            <input type="username" class="form-control" name="user_inisial" id="user_inisial" placeholder="User Inisial" value="<?php echo $user_inisial; ?>" />
        </div>
	    <div class="form-group">
            <label for="password">User Kunci <?php echo form_error('user_kunci') ?></label>
            <input type="password" class="form-control" name="user_kunci" id="user_kunci" placeholder="User Kunci" value="<?php echo $user_kunci; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">User Aktif <?php echo form_error('user_aktif') ?></label>
            <input type="text" class="form-control" name="user_aktif" id="user_aktif" placeholder="User Aktif" value="<?php echo $user_aktif; ?>" />
        </div>
	    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('user') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>