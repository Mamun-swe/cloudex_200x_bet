<?php 
include("login.php"); 
include("registration.php"); 
// if(!isset($_SESSION['user'])){
//     session_destroy();
//     header('location: index.php');
// }
date_default_timezone_set('Asia/Dhaka');
$date=date("Y-m-d h:i");
if(isset($_SESSION['user'])){
  $uid=$_SESSION['user']['user_id'];
  $pass=$_SESSION['user']['password'];
  $statement666 = $pdo->prepare("SELECT *
    FROM tbl_member WHERE user_id=?");
  $statement666->execute(array($uid));
  $result666 = $statement666->fetchAll(PDO::FETCH_ASSOC);
  foreach ($result666 as $row666) {
    $m=$row666['credit'];
  }
  $statement9 = $pdo->prepare("SELECT * FROM tbl_sponsor JOIN tbl_member ON  tbl_sponsor.sponsor_user_id=tbl_member.user_id WHERE tbl_sponsor.user_id=?");
  $statement9->execute(array($uid));
  $result9 = $statement9->fetchAll(PDO::FETCH_ASSOC);

    //password
  if(isset($_POST['form3'])) {

    $current_password = strip_tags($_POST['current_password']);

    $new_password = strip_tags($_POST['new_password']);

    $confirm_password = strip_tags($_POST['confirm_password']);

    if( ($pass != md5($current_password)) OR ($confirm_password != $new_password)) {

    }

    else{
      $password = md5($new_password);
      $statement = $pdo->prepare("UPDATE tbl_member SET password=? WHERE user_id=?");
      $statement->execute(array($password,$_SESSION['user']['user_id']));
    }
  }
}
$statement1 = $pdo->prepare("SELECT *
  FROM tbl_payment");
$statement1->execute();
$result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);

$statement2 = $pdo->prepare("SELECT *
  FROM tbl_club");
$statement2->execute();
$result2 = $statement2->fetchAll(PDO::FETCH_ASSOC);

$hide="Hidden";
$state = $pdo->prepare("SELECT *
  FROM tbl_game WHERE game_status!=? ORDER BY game_id ASC");
$state->execute(array($hide));
$results = $state->fetchAll(PDO::FETCH_ASSOC);

$statement20 = $pdo->prepare("SELECT * FROM tbl_scroll");
$statement20->execute();
$result20 = $statement20->fetchAll(PDO::FETCH_ASSOC);
foreach ($result20 as $row20) {
  $message=$row20['message'];
}


?>

<?php include 'inc/betmodal.php'; ?>
<?php include 'inc/head.php'; ?>
<?php include 'inc/header.php'; ?>
<div class="">
  <section class="callaction ">
    <div class="content-wrap p-0 ">
      <div class="container  p-0 ">
        <div class="row">
          <div class="col-xs-12">
            <div class=" bhoechie-tab-container">
              <div class=" bhoechie-tab-menu">
                <ul class="list-group tabMenu">
                  <li>
                    <a href="#inbox" id="msg_inbox" class="list-group-item active text-center list-item">Inbox</a>
                  </li>
                  <li>
                    <a href="#sent" v-on:click="get_user_sent_messages(20444)" id="msg_sent" class="list-group-item text-center list-item">Sent</a>
                  </li>
                  <li>
                    <a href="#" class="list-group-item text-center list-item " data-toggle="modal" data-target="#reply-message-modal">
                      Deposit Request
                    </a>
                    <a href="#allWithdrawals" class="list-group-item text-center list-item">Withdrawals</a>
                  </li>
                  <li>
                    <a href="#transactionHistory" class="list-group-item text-center list-item transactionHistory">Transactions</a>
                  </li>
                </ul>
              </div>
              <div id="allWithdrawals" class="bhoechie-tab hide">
                <div class="bhoechie-tab-content ">
                  <div class="">
                    <div class="row">
                      <div class="col-xs-12">
                        <div class="table-responsive">
                          <div id="withdrawalTable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                            <div class="row">
                              <div class="col-sm-6">
                                <div class="dataTables_length" id="withdrawalTable_length">
                                  <label>Show
                                    <select name="withdrawalTable_length" aria-controls="withdrawalTable" class="form-control input-sm">
                                      <option value="10" selected="selected">10</option>
                                      <option value="25">25</option>
                                      <option value="50">50</option>
                                      <option value="100">100</option>
                                    </select>entries
                                  </label>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div id="withdrawalTable_filter" class="dataTables_filter">
                                  <label>Search:
                                    <input type="search" class="form-control input-sm" placeholder="" aria-controls="withdrawalTable">
                                  </label>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-12">
                                <table class="table table-bordered table-hover dataTable no-footer" id="withdrawalTable" role="grid" style="width: 1083px;">
                                  <thead>
                                    <tr role="row">
                                      <th style="width: 40px">SN</th>
                                      <th style="width: 40px">From</th>
                                      <th style="width: 40px">To</th>
                                      <th style="width: 40px">Amount</th>
                                      <th style="width: 40px">Through</th>
                                      <th style="width: 40px">Status</th>
                                      <th style="width: 40px">Note</th>
                                      <th style="width: 40px">Requested At</th>
                                      <th style="width: 40px">Accepted/Canceled At</th>
                                      <th style="width: 40px">Cancel</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                    foreach ($result2 as $row2) {
                                      ?>
                                      <tr class="odd">
                                        <td>NA</td>
                                        <td><?php echo $row2['send_to']; ?></td>
                                        <td><?php echo $row2['amount']; ?></td>
                                        <td><?php echo $row2['method']; ?></td>
                                        <td>
                                          <?php if($row2['withdraw_status'] == 1){echo "<span style='color:green;'>Completed</span>";} else if($row2['withdraw_status'] == 2){echo "<span style='color:red;'>Rejected</span>";} else{echo "Pending";} ?>
                                        </td>
                                        <td><?php echo $row2['withdraw_note']; ?></td>
                                        <td><?php echo $row2['date']; ?></td>
                                        <td>
                                          <?php
                                          if($row2['withdraw_status'] == "0"){

                                          }
                                          else{
                                            $type="Withdraw";
                                            $statement3 = $pdo->prepare("SELECT *
                                              FROM tbl_transaction WHERE type=? AND detail_id=?");
                                            $statement3->execute(array($type,$row2['withdraw_id']));
                                            $result3 = $statement3->fetchAll(PDO::FETCH_ASSOC);
                                            foreach ($result3 as $row3) {
                                              echo $row3['transaction_date'];
                                            }
                                          }
                                          ?>
                                        </td>
                                        <td></td>
                                      </tr>
                                    <?php } ?>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-5">
                              </div>
                              <div class="col-sm-5">
                                <div class="dataTables_paginate paging_simple_numbers" id="withdrawalTable_paginate">
                                  <ul class="pagination">
                                    <li class="paginate_button previous disabled" id="withdrawalTable_previous">
                                      <a href="#" aria-controls="withdrawalTable" data-dt-idx="0" tabindex="0">
                                        <span class="fa fa-angle-double-left"></span>
                                      </a>
                                    </li>
                                    <li class="paginate_button next disabled" id="withdrawalTable_next">
                                      <a href="#" aria-controls="withdrawalTable" data-dt-idx="1" tabindex="0">
                                        <span class="fa fa-angle-double-right"></span>
                                      </a>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="reply-message-modal" tabindex="-1" role="dialog"
        aria-labelledby="replyMessageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content rounded-0">
            <div class="modal-header bg-yellow rounded-0">
              <h5 class="modal-title text-dark" id="balanceTranferModalLabel">Messages
              </h5>
              <button type="button" class="close text-dark" data-dismiss="modal"
              aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <form class="" action="" method="post">

            <div class="modal-body">

              <div class="form-group">
                <label for="message_frm_message"
                class="col-form-label">Message:</label>
                <textarea type="number" class="form-control"
                id="message_frm_message" name="message"
                placholder="Message" required="required"></textarea>
              </div>

            </div>

            <div class="modal-footer rounded-0">
              <button type="submit" name="form7"
              class="btn btn-dark mx-auto rounded-0 border-0 btn-block bg-yellow text-dark font-weight-bold position-relative">
              Send
              <div class="loading-spinner login-spinner-wrapper display_none">
              </div>
            </button>
          </div>


        </form>

      </div>
    </div>
  </div>
  <hr class="start-footer">

  <?php include 'inc/footer.php'; ?>
  <?php include 'inc/scripts.php'; ?>