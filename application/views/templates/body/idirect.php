<div class="content-wrapper">
	<div class="container">
		<section class="content">
			<div class="box box-default">
          		<div class="box-header with-border">
            		<h3 class="box-title">Vessels Registered</h3>
          		</div>
          		<div class="box-body">
          			<table id="vessels" class="table table-bordered table-striped">
		                <thead>
			                <tr>
			                 	<th>VESSEL NAME</th>
			                  	<th>MODEM DID</th>
			                  	<th>LATITUDE</th>
			                  	<th>LONGITUDE</th>
			                  	<th>ACTION</th>
			                </tr>
		                </thead>
		                <tbody>
		                	<?php
		                	foreach($vessels as $item){ ?>
								<tr>
				                  <td><?php echo $item['nama_node'];?></td>
				                  <td><?php echo $item['did'];?></td>
				                  <td><?php echo $item['latitude_realtime'];?></td>
				                  <td><?php echo $item['longitude_realtime'];?></td>
				                  <td>
				                  	<a href="" style="color:firebrick;"><i class="fa fa-dashboard"></i> Dashboard</a>
				                  	&nbsp | &nbsp
				                  	<a href=""><i class="fa fa-rocket"></i> Follow</a>
				                  	&nbsp | &nbsp
				                  	<a href="" style="color:green;"><i class="fa fa-map"></i> Track</a>
				                  </td>
				                </tr>
		                	<?php } ?>
			            </tbody>
		         	</table>
          		</div>
          	</div>
		</section>
	</div>
</div>

  