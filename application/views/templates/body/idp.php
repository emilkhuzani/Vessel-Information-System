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
			                 	<th>LATITUDE</th>
			                 	<th>LONGITUDE</th>
			                 	<th>SPEED</th>
			                 	<th>TIME UPDATE</th>
			   					<th>GPS STATUS</th>
			                  	<th>ACTION</th>
			                </tr>
		                </thead>
		                <tbody>
		                	<?php
		                	foreach($vessels as $item){ ?>
								<tr>
				                  <td><?php echo $item['nama_kapal'];?></td>
				                  <td><?php echo $item['waktu_lokal']?></td>
				                  <td><?php echo $item['latitude']?></td>
				                  <td><?php echo $item['longitude']?></td>
				                  <td><?php echo $item['speed']?></td>
				                  <td><?php if($item['status_gps']=='Online'){
			                          echo '<span class="label label-success">Online</span>';
			                          }else{
			                          echo '<span class="label label-danger">Offline</span>';
			                          }
			                          ?>
			                      </td>
				                  <td>
				                  	<a href="" style="color:firebrick"><i class="fa fa-dashboard"></i> Dashboard</a>
				                  	&nbsp | &nbsp
				                  	<a href="" ><i class="fa fa-rocket"></i> Follow</a>
				                  	&nbsp | &nbsp
				                  	<a href="" style="color:green"><i class="fa fa-map"></i> Track</a>
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

  