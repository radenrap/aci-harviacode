<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>User List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>User Nama</th>
		<th>User Level</th>
		<th>User Inisial</th>
		<th>User Kunci</th>
		<th>User Aktif</th>
		
            </tr><?php
            foreach ($user_data as $user)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $user->user_nama ?></td>
		      <td><?php echo $user->user_level ?></td>
		      <td><?php echo $user->user_inisial ?></td>
		      <td><?php echo $user->user_kunci ?></td>
		      <td><?php echo $user->user_aktif ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>