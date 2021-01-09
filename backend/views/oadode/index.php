<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;

use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>

<div class="site-index">
	<div class="row">
		<div class="col-md-6">
			<h3>List Busniess information</h3>
		</div>
		<div class="col-md-6 text-right mt-3">
			<span><?= Html::a('Create',['/oadode/create'],['class'=>'btn btn-primary'])?></span>
		</div>
	</div>

	<div class="body-content">
        <table class="table table-hover">
		  <thead>
		    <tr>
		      <th scope="col">ID</th>
		      <th scope="col">Legal Name</th>
		      <th scope="col">Name</th>
		      <th scope="col">Address</th>
		      <th scope="col">Mailing Address</th>
		      <th scope="col">Phone</th>
		      <th scope="col">Fax</th>
		      <th scope="col">Email</th>
		      <th scope="col">Lang</th>
		      <th scope="col">Application Type</th>
		      <th scope="col">Business Title</th>
		      <th scope="col">Description</th>
		      <th scope="col">Ecl Group</th>
		      <th scope="col">Ecl Item</th>
		      <th scope="col">Created At</th>
		      <th scope="col" style="width: 18%;">Action</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php if(count($oadodes) > 0):?>
		  		<?php foreach($oadodes as $oadode): ?>
				    <tr class="table-active">
				      <td><?php echo $oadode['oadode_id'];?></td>
				      <td><?php echo $oadode['legal_name'];?></td>
				     <td style="text-align: justify;"><?php echo $oadode['business_name'];?></td>
				      <td style="width: 15%;"><?php echo $oadode['business_address'];?></td>
				      <td style="width: 15%;"><?php echo $oadode['business_mailing_address'];?></td>
				      <td style="width: 15%;"><?php echo $oadode['business_phone'];?></td>
				      <td style="width: 15%;"><?php echo $oadode['business_fax'];?></td>
				      <td style="width: 15%;"><?php echo $oadode['business_email'];?></td>
				      <td style="width: 15%;">
				      	<?php if($oadode['lang'] == 1){  ?>
				      		<span>English</span>
				      	<?php } else {  ?>
				      		<span>French</span>
				      	<?php  } ?>
				      </td>
				      <td style="width: 15%;">
				      	<?php if($oadode['application_type'] == 1){  ?>
				      		<span>New</span>
				      	<?php } else if($oadode['application_type'] != NULL) {  ?>
				      		<span>Re-assesmentss</span>
				      	<?php  } else{ ?>
							<span>N/A</span>
				      	<?php } ?>
				      </td>
				      <td style="width: 15%;">
				      	<?php 

				      		$data = explode(',', $oadode['business_title']);
				      		foreach ($data as $key => $value) {
					      		if($value == 'a'){
					      			echo "Owner<br>";
					      		}else if($value == 'b'){
					      			echo "Authorized Individual<br>";
					      		}else if($value == 'c'){
					      			echo "Designated Official<br>";
					      		}else if($value == 'd'){
					      			echo "Officer<br>";
					      		}else if($value == 'e'){
					      			echo "Director<br>";
					      		}else if($value == 'f'){
					      			echo "Employee<br>";
					      		}
				      		}
				      		
				      	?>
				      </td>
				      <td style="width: 15%;"><?php echo $oadode['description'];?></td>
				      <td style="width: 15%;"><?php echo $oadode['ecl_group'];?></td>
				      <td style="width: 15%;"><?php echo $oadode['ecl_item'];?></td>

				      <td style="width: 15%;"><?= date('Y-m-d H:i:s', strtotime('now'))."\n"; ?></td>
				      <td>
				      <span><?= Html::a('Print',['hello','id'=>$oadode['oadode_id']],['class'=>'btn btn-success']) ?>
				      	</span>
				      <span><?= Html::a('Download',['download','id'=>$oadode['oadode_id']],['class'=>'btn btn-primary']) ?>
				      	</span>
				      <span><?= Html::a('Edit',['update','id'=>$oadode['oadode_id']],['class'=>'btn btn-warning']) ?>
				      	</span>
				      </td>
				    </tr>
				<?php endforeach; ?>
		    <?php else: ?>
		    	<tr>
		    		<td>No records found</td>
		    	</tr>
		    <?php  endif; ?>
		  </tbody>
		</table>
    </div>

</div>
