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
        <h2 style="margin-top:0px">Town Read</h2>
        <table class="table">
    	    <tr><td>Town Nama</td><td><?php echo $town_nama; ?></td></tr>
    	    <tr><td>Town Paket</td><td><?php echo $town_paket; ?></td></tr>
    	    <tr><td>Town Min</td><td><?php echo $town_min; ?></td></tr>
    	    <tr><td>Town Tarif</td><td><?php echo $town_tarif; ?></td></tr>
    	    <tr><td>Town Drop</td><td><?php echo $town_drop; ?></td></tr>
    	    <tr><td>Reg Id</td><td><?php echo $reg_id; ?></td></tr>
    	    <tr><td>User Id</td><td><?php echo $user_id; ?></td></tr>
    	    <tr><td></td><td><a href="<?php echo site_url('town') ?>" class="btn btn-default">Cancel</a></td></tr>
    	</table>
        </body>
</html>