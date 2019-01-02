<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Project</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/css/bootstrap.min.css">	
</head>
<body>

<div class="container">
	<?php foreach ($employe->result() as $value) {?>
		<h2><a class="btn btn-primary" href="<?php echo base_url(); ?>" role="button"><--Back</a> <?php echo $value->first.' '.$value->last;?></h2>
		<hr>
    <div class="row">
    	<div class="col-4">
    		<img src="<?php echo base_url().'ktp/'.$value->ktpfname; ?>" style="width:300px; height:150px;">
    	</div>
    	<div class="col-8">
    		<div>First Name : <?php echo $value->first;?></div><hr>
    		<div>Last Name: <?php echo $value->last;?></div><hr>
    		<div>Date of Birth : <?php echo $value->birth;?></div><hr>
    		<div>Phone: <?php echo $value->phone;?></div><hr>
    		<div>E-Mail : <?php echo $value->email;?></div><hr>
    		<div>Province : <?php echo $value->provinsi;?></div><hr>
    		<div>City : <?php echo $value->kota_kab;?></div><hr>
    		<div>Address : <?php echo $value->address;?></div><hr>
    		<div>Zip Code : <?php echo $value->zip;?></div><hr>
    		<div>KTP Number : <?php echo $value->ktp;?></div><hr>
    		<div>Current Position : <?php echo $value->position;?></div><hr>
    		<div>Bank Account : <?php echo $value->bank;?></div><hr>
    		<div>Bank Account Number : <?php echo $value->n_bank;?></div><hr>
    		<div>Last Update : <?php echo $value->date;?></div><hr>
    	</div>
    </div>
	<?php } ?>
</body>
</html>