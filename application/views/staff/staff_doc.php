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
        <h2>Staff List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
        		<th>Staff Id</th>
                <th>Staff Nama</th>
        		<th>Staff Tplahir</th>
        		<th>Staff Tglahir</th>
        		<th>Staff Jenkel</th>
        		<th>Staff Alamat</th>
        		<th>Staff Email</th>
        		<th>Staff Telpon</th>
        		<th>Reg Id</th>
        		<th>User Id</th>
		
            </tr><?php
            foreach ($staff_data as $staff) {
                ?>
                <tr>
    		      <td><?php echo ++$start ?></td>
    		      <td><?php echo $staff->staff_id ?></td>
                  <td><?php echo $staff->staff_nama ?></td>
    		      <td><?php echo $staff->staff_tplahir ?></td>
    		      <td><?php echo $staff->staff_tglahir ?></td>
    		      <td><?php echo $staff->staff_jenkel ?></td>
    		      <td><?php echo $staff->staff_alamat ?></td>
    		      <td><?php echo $staff->staff_email ?></td>
    		      <td><?php echo $staff->staff_telpon ?></td>
    		      <td><?php echo $staff->reg_id ?></td>
    		      <td><?php echo $staff->user_id ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>