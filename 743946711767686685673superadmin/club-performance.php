<?php require_once('header.php'); ?>
<?php 
    if(isset($_POST['update_performance'])){
        echo $_POST['club_id'];
    }
?>



<section class="content">
	<div class="row">
		<div class="col-lg-12">
            <div class="card">
                <br>
                <h4 style="margin-left: 15px;"><b>Change CLub Performance</b></h4>
            
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td><b>SL</b></td>
                                <td><b>Club Name</b></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $statement = $pdo->prepare("SELECT * FROM tbl_club ORDER BY club_id ASC");
                                $statement->execute();
                                $result = $statement->fetchAll(PDO::FETCH_ASSOC);						
                                foreach ($result as $row) {
                                ?>
                            <tr>
                            <form action="" method="post">
                                <td style="width: 80px;">
                                    <input type="text" class="form-control" value="<?php echo $row['club_id']; ?>" name="club_id">
                                </td>
                                <td><p><?php echo $row['club_name']; ?></p></td>
                                <td><button type="submit" name="update_performance" class="btn btn-info">Change</button></td>

                                </form>
                            </tr>
                            <?php 
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>





<?php require_once('footer.php'); ?>