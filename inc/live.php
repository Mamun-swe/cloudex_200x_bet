
<a style="background: <?php echo $live_color; ?> !important;" class="list-group-item livem ">
  <span class="">
    <i class="fa fa-refresh fa-spin" style="font-size:20px"></i> Live Match
  </span>
</a>

<?php
$i=0;
foreach ($results as $rows) {
  if($rows["game_status"]==1){
    $s=1;
    $i++;
    ?>
    <div id="liveContent">
      <div id="<?php echo$rows["type"] ?>">
        <div class="panel panel-default panel2  active-match <?php echo$rows["type"] ?>">
          <div style="background: #005A4C ?>" class="panel-heading first-lebal qsHeadinFirstLable" role="tab" id="<?php echo$rows["type"] ?>">

            <h4 style="cursor: pointer" class="panel-title" role="button" data-toggle="collapse" href="#one<?php echo$rows["game_id"] ?>" aria-expanded="true">

              <?php
              if($rows["type"]=="Cricket"){
                ?>
                <img src="./images/Cricket_Image1.png">
                <?php
              }
              else if($rows["type"]=="Football")
              {
                ?>
                <img src="./images/Football_Image1.png">
                <?php
              }
              else if($rows["type"]=="Hockey")
              {
                ?>
                <img src="./images/hockey.png">
                <?php
              }
              else if($rows["type"]=="Basketball")
              {
                ?>
                <img src="./images/basketball.png">
                <?php
              }
              else if($rows["type"]=="Badminton")
              {
                ?>
                <img src="./images/badminton.png">
                <?php
              }
              else if($rows["type"]=="Tennis")
              {
                ?>
                <img src="./images/tennis.png">
                <?php
              }
              else if($rows["type"]=="Virtual Game")
              {
                ?>
                <img src="./images/virtual.png">

                <?php
              }
              else if($rows["type"]=="Handball")
              {
                ?>
                <img src="./images/handball.png">
                <?php
              }
              ?>
              <?php echo $rows['desh1'].'<span style="color: #EFA71D"> VS</span> '.$rows['desh2'].' , '.$rows['tournament']." || ".$rows['date']." , ".$rows['time']; ?>
              <i class="fa fa-angle-up"></i>
            </h4>                  
          </div>
          <div id="one<?php echo$rows["game_id"] ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="">
            <div class="panel-body" style="padding: 0px;">
              <div class="panel panel-default panel2 active-question">
                <?php
                $state1 = $pdo->prepare("SELECT DISTINCT stake_name 
                  FROM tbl_stake WHERE game_id=? AND stake_status=? ");
                $state1->execute(array($rows['game_id'],$s));
                $results1 = $state1->fetchAll(PDO::FETCH_ASSOC);
                $j=0;
                foreach ($results1 as $rows1) {
                  $j++;
                  ?>
                  <div style="background: #e2e2e2 " class="panel-heading second-lebal qsHeading" role="tab" id="">
                    <h4 style="cursor: pointer" class="panel-title" role="button" data-toggle="collapse" href="##two<?php echo $rows['game_id'].$j;?>" aria-expanded="true" aria-controls="#two<?php echo $rows['game_id'].$j;?>">
                      <?php echo $rows1['stake_name']; ?><span class="badge bg"> Live </span>
                    </h4>
                  </div>
                  <div id="two<?php echo $rows['game_id'].$j;?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="">
                    <div class="panel-body" style="padding: 0px 0px;background: #5F5F5F;">
                      <div class="betOptionWrap">           
                        <?php
                          $state2 = $pdo->prepare("SELECT * FROM tbl_stake WHERE stake_name=? AND game_id=? AND stake_status=?");
                          $state2->execute(array($rows1['stake_name'],$rows['game_id'],$s));
                          $results2 = $state2->fetchAll(PDO::FETCH_ASSOC);
                          foreach ($results2 as $rows2) {
                            if(!isset($_SESSION['user'])){
                          ?>                                  
                          <div class="place-bet btn btn-default btn-sm data-show buttonrate active-question" style="cursor: pointer" data-toggle="modal" data-target="#loginModal">
                            <span class="text"><?php echo $rows2['bet_name']; ?> </span> <span style="color:#1C69C2;"><?php echo $rows2['rate']; ?></span>
                          </div>
                          <?php
                        }else{
                          ?>    

                          <div onclick="bet(
                            <?php echo $rows2['stake_id'].','.$rows['game_id'].','.$_SESSION['user']['user_id']; ?>); return false;" class="place-bet btn btn-default btn-sm data-show buttonrate active-question" style="cursor: pointer">
                            <span class="text"><?php echo $rows2['bet_name']; ?></span> <span style="color:#1C69C2 ;"><?php echo $rows2['rate']; ?></span>
                          </div>
                        <?php }} ?>                                           
                      </div>
                    </div>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>     
    </div>
  <?php  }

  if($rows["game_status"]==3){
    $s=1;
    $i++;
    ?>
    <div id="liveContent">
      <div id="<?php echo$rows["type"] ?>">
        <div class="panel panel-default panel2  active-match tnis">
          <div class="panel-heading first-lebal qsHeadinFirstLable" role="tab" id="<?php echo$rows["type"] ?>">

            <h4 style="cursor: pointer" class="panel-title" role="button" data-toggle="collapse" href="#one<?php echo$rows["game_id"] ?>" aria-expanded="true">

              <?php
              if($rows["type"]=="Cricket"){
                ?>
                <img src="./images/Cricket_Image1.png">
                <?php
              }
              else if($rows["type"]=="Football")
              {
                ?>
                <img src="./images/Football_Image1.png">
                <?php
              }
              else if($rows["type"]=="Hockey")
              {
                ?>
                <img src="./images/hockey.png">
                <?php
              }
              else if($rows["type"]=="Basketball")
              {
                ?>
                <img src="./images/basketball.png">
                <?php
              }
              else if($rows["type"]=="Badminton")
              {
                ?>
                <img src="./images/badminton.png">
                <?php
              }
              else if($rows["type"]=="Tennis")
              {
                ?>
                <img src="./images/tennis.png">
                <?php
              }
              else if($rows["type"]=="Virtual Game")
              {
                ?>
                <img src="./images/virtual.png">

                <?php
              }
              else if($rows["type"]=="Handball")
              {
                ?>
                <img src="./images/handball.png">
                <?php
              }
              ?>
              <?php echo $rows['desh1'].'<span style="color: #EFA71D"> VS</span> '.$rows['desh2'].' , '.$rows['tournament']." || ".$rows['date']." , ".$rows['time']; ?>
              <i class="fa fa-angle-up"></i>
            </h4>                  
          </div>
          <div id="one<?php echo$rows["game_id"] ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="">
            <div class="panel-body" style="padding: 0px;">
              <div class="panel panel-default panel2 active-question">
                <?php
                $state1 = $pdo->prepare("SELECT DISTINCT stake_name 
                  FROM tbl_stake WHERE game_id=? AND stake_status=? ");
                $state1->execute(array($rows['game_id'],$s));
                $results1 = $state1->fetchAll(PDO::FETCH_ASSOC);
                $j=0;
                foreach ($results1 as $rows1) {
                  $j++;
                  ?>
                  <div class="panel-heading second-lebal qsHeading" role="tab" id="">
                    <h4 style="cursor: pointer" class="panel-title" role="button" data-toggle="collapse" href="##two<?php echo $rows['game_id'].$j;?>" aria-expanded="true" aria-controls="#two<?php echo $rows['game_id'].$j;?>">
                      <?php echo $rows1['stake_name']; ?><span class="badge bg"> Live </span>
                    </h4>
                  </div>
                  <div id="two<?php echo $rows['game_id'].$j;?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="">
                    <div class="panel-body" style="padding: 0px 0px;background: #5F5F5F;">
                      <div class="betOptionWrap">           <?php
                      $state2 = $pdo->prepare("SELECT *
                        FROM tbl_stake WHERE stake_name=? AND game_id=? AND stake_status=?");
                      $state2->execute(array($rows1['stake_name'],$rows['game_id'],$s));
                      $results2 = $state2->fetchAll(PDO::FETCH_ASSOC);
                      foreach ($results2 as $rows2) {
                        if(!isset($_SESSION['user'])){
                          ?>                                  
                          <div class="place-bet btn btn-default btn-sm data-show buttonrate active-question" style="cursor: pointer" data-toggle="modal" data-target="#loginModal">
                            <span class="text"><?php echo $rows2['bet_name']; ?> </span> <span style="color:#F9CD51;"><?php echo $rows2['rate']; ?></span>
                          </div>
                          <?php
                        }else{
                          ?>                                             
                          <div onclick="#" class="place-bet btn btn-default btn-sm data-show buttonrate active-question" style="cursor: pointer">
                            <span class="text"><?php echo $rows2['bet_name']; ?></span> <span style="color:#F9CD51;"><?php echo $rows2['rate']; ?></span>
                          </div>
                        <?php }} ?>                                           
                      </div>
                    </div>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>     
    </div>
  <?php }


} ?>


