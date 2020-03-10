<?php require_once('header.php'); ?>

<section class="content-header">
	<div class="content-header-left">
		<h1>View Sent Messages from Contact Page</h1>
	</div>
</section>


<section class="content">

  <div class="row">
    <div class="col-md-12">
    <?php if(isset($_REQUEST['message'])) { ?>
	<div class="callout callout-success">
	    <p><?php echo $_REQUEST['message']; ?></p>
	</div>
	<?php } ?>
      <div class="box box-info">
        
        <div class="box-body table-responsive">
          <table id="example1" class="table table-bordered table-striped">
			<thead>
			    <tr>
			        <th>SL</th>
					<th>Date</th>
			        <th>Sender Name</th>
			        <th>Email</th>
			        <th>Subject</th>
			        <th>Message</th>
			    </tr>
			</thead>
            <tbody>
            	<?php
            	$i=0;
                $statement = $pdo->prepare("SELECT * FROM tbl_contact_message ORDER BY contact_message_id DESC");
            	$statement->execute();
            	$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
            	foreach ($result as $row) {
            		$i++;
            		?>
					<tr">
	                    <td><?php echo $i; ?></td>
						<td><?php echo $row['date']; ?></td>
	                    <td><?php echo $row['full_name']; ?></td>
	                    <td><?php echo $row['email']; ?></td>
	                    <td><?php echo $row['subject']; ?></td>
	                    <td><?php echo $row['message']; ?></td>
	                </tr>
            		<?php
            	}
            	?>
            </tbody>
          </table>
        </div>
      </div>
  

</section>


<?php require_once('footer.php'); ?>