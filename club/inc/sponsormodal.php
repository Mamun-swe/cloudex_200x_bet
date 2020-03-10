 <?php if(isset($_SESSION['user'])){
            ?>
            
            <!-- User Club Modal -->
            <div class="modal fade" id="userClubModal" tabindex="-1" role="dialog"
            aria-labelledby="userClubModalModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content rounded-0">
                    <div class="modal-header rounded-0" style="background: #016D5F;">
                        <h5 class="modal-title text-white" id="userClubModalModalLabel">
                        My Sponsors</h5>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body" style="background: unset !important;">

                        <div class="table-responsive-md" style="background: unset !important;">

                            <table v-if=""
                            class="table table-sm table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">SN.</th>
                                    <th scope="col" class="text-center">Joining Date</th>
                                    <th scope="col" class="text-center">Recent Bet Date</th>
                                    <th scope="col">Name</th>
                                    <th scope="col" class="text-center">Username</th>
                                    <th scope="col" class="text-center">Total Bet</th>
                                    <th scope="col" class="text-center">Commission Earned</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=0;
                                $commission=0;
                                $last="--";
                                $total="--";
                                $total_commission=0;
                                $total_bet=0;
                                foreach ($result9 as $row9) {

                                    $i++;
                                    $statement10 = $pdo->prepare("SELECT * FROM tbl_commission WHERE commission_to=?");
                                    $statement10->execute(array($row9['sponsor_user_id']));
                                    $total = $statement10->rowCount(); 
                                    $result10 = $statement10->fetchAll(PDO::FETCH_ASSOC);
                                    if($total==0) {
                                        $commission=0;
                                    }
                                    else{
                                        foreach ($result10 as $row10) {
                                            $commission=$commission+$row10['amount'];
                                        }
                                    }
                                    $total_commission=$total_commission+$commission;

                                    $statement11 = $pdo->prepare("SELECT MAX(bet_id),date FROM tbl_bet WHERE bet_by=?");
                                    $statement11->execute(array($row9['sponsor_user_id']));
                                            // $total1 = $statement11->rowCount(); 
                                    $result11 = $statement11->fetchAll(PDO::FETCH_ASSOC);

                                    $statement12 = $pdo->prepare("SELECT * FROM tbl_bet WHERE bet_by=?");
                                    $statement12->execute(array($row9['sponsor_user_id']));
                                    $total1 = $statement12->rowCount(); 
                                    $result12 = $statement12->fetchAll(PDO::FETCH_ASSOC);

                                    if($total1==0) {
                                        $last="No Bet Yet";
                                        $total="0";
                                    }
                                    else{
                                        foreach ($result11 as $row11) {
                                            $last=$row11['date'];
                                        }
                                        foreach ($result12 as $row12) {
                                            $total=$total+$row12['amount'];
                                        }
                                    }
                                    $total_bet=$total_bet+$total;
                                    ?>
                                    <tr>
                                        <td scope="col"><?php echo $i; ?></td>
                                        <td scope="col" class="text-center"><?php echo $row9['joining_date']; ?></td>
                                        <td scope="col" class="text-center"><?php echo $last; ?></td>
                                        <td scope="col"><?php echo $row9['full_name']; ?></td>
                                        <td scope="col" class="text-center"><?php echo $row9['user_name']; ?></td>
                                        <td scope="col" class="text-center"><?php echo number_format($total, 2, '.', ','); ?></td>
                                        <td scope="col" class="text-center text-success"><?php echo number_format($commission, 2, '.', ','); ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th scope="col" colspan="5">Total</th>
                                    <th scope="col" class="text-center"><?php echo number_format($total_bet, 2, '.', ','); ?></th>
                                    <th scope="col" class="text-center"><?php echo number_format($total_commission, 2, '.', ','); ?></th>
                                </tr>
                            </tfoot>
                        </table>

                    </div>

                </div>

                <div class="modal-footer rounded-0">
                    <button data-dismiss="modal" type="button"
                    class="btn btn-danger btn-lg rounded-0 border-0 pull-right">Close</button>
                </div>

            </div>
        </div>
    </div>
    <!-- User Club Modal -->
    <?php
}
?>


