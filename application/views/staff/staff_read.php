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
        <h2 style="margin-top:0px">Staff Read</h2>
        <table class="table">
            <tr><td>Staff Id</td><td><?php echo $staff_id; ?></td></tr>
    	    <tr><td>Staff Nama</td><td><?php echo $staff_nama; ?></td></tr>
    	    <tr><td>Staff Tplahir</td><td><?php echo $staff_tplahir; ?></td></tr>
    	    <tr><td>Staff Tglahir</td><td><?php echo $staff_tglahir; ?></td></tr>
    	    <tr><td>Staff Jenkel</td><td><?php echo $staff_jenkel; ?></td></tr>
    	    <tr><td>Staff Alamat</td><td><?php echo $staff_alamat; ?></td></tr>
    	    <tr><td>Staff Email</td><td><?php echo $staff_email; ?></td></tr>
    	    <tr><td>Staff Telpon</td><td><?php echo $staff_telpon; ?></td></tr>
    	    <tr><td>Reg Id</td><td><?php echo $reg_id; ?></td></tr>
    	    <tr><td>User Id</td><td><?php echo $user_id; ?></td></tr>
    	    <tr><td></td><td><a href="<?php echo site_url('staff') ?>" class="btn btn-default">Cancel</a></td></tr>
    	</table>
        </body>
</html>