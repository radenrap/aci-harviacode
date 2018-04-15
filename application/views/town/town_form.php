<!doctype html>
<html>
    <head>
        <title>CI 3 - harviacode</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Town <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="town_nama">Town Nama <?php echo form_error('town_nama') ?></label>
            <textarea class="form-control" rows="3" name="town_nama" id="town_nama" placeholder="Town Nama"><?php echo $town_nama; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Town Paket <?php echo form_error('town_paket') ?></label>
            <input type="text" class="form-control" name="town_paket" id="town_paket" placeholder="Town Paket" value="<?php echo $town_paket; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Town Min <?php echo form_error('town_min') ?></label>
            <input type="text" class="form-control" name="town_min" id="town_min" placeholder="Town Min" value="<?php echo $town_min; ?>" />
        </div>
	    <div class="form-group">
            <label for="decimal">Town Tarif <?php echo form_error('town_tarif') ?></label>
            <input type="text" class="form-control" name="town_tarif" id="town_tarif" placeholder="Town Tarif" value="<?php echo $town_tarif; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Town Drop <?php echo form_error('town_drop') ?></label>
            <input type="text" class="form-control" name="town_drop" id="town_drop" placeholder="Town Drop" value="<?php echo $town_drop; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Reg Id <?php echo form_error('reg_id') ?></label>
            <input type="text" class="form-control" name="reg_id" id="reg_id" placeholder="Reg Id" value="<?php echo $reg_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">User Id <?php echo form_error('user_id') ?></label>
            <input type="text" class="form-control" name="user_id" id="user_id" placeholder="User Id" value="<?php echo $user_id; ?>" />
        </div>
	    <input type="hidden" name="town_id" value="<?php echo $town_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('town') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>