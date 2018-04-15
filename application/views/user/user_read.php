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
        <h2 style="margin-top:0px">User Read</h2>
        <table class="table">
	    <tr><td>User Nama</td><td><?php echo $user_nama; ?></td></tr>
	    <tr><td>User Level</td><td><?php echo $user_level; ?></td></tr>
	    <tr><td>User Inisial</td><td><?php echo $user_inisial; ?></td></tr>
	    <tr><td>User Kunci</td><td><?php echo $user_kunci; ?></td></tr>
	    <tr><td>User Aktif</td><td><?php echo $user_aktif; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('user') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>