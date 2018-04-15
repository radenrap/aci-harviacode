<!doctype html>
<html>
    <head>
        <title>CI 3 - harviacode</title>
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
        <h2>Town List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Town Nama</th>
		<th>Town Paket</th>
		<th>Town Min</th>
		<th>Town Tarif</th>
		<th>Town Drop</th>
		<th>Reg Id</th>
		<th>User Id</th>
		
            </tr><?php
            foreach ($town_data as $town)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $town->town_nama ?></td>
		      <td><?php echo $town->town_paket ?></td>
		      <td><?php echo $town->town_min ?></td>
		      <td><?php echo $town->town_tarif ?></td>
		      <td><?php echo $town->town_drop ?></td>
		      <td><?php echo $town->reg_id ?></td>
		      <td><?php echo $town->user_id ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>