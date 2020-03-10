<?php
    $Handball=0;
    $Football=0;
    $Cricket=0;
    $Tennis=0;
    $VirtualGame=0;
    $Tennis=0;
    $Badminton=0;
    $Basketball=0;
    $Hockey=0;

    $statement = $pdo->prepare("SELECT * FROM tbl_game");
    $statement->execute();
    $total_game = $statement->rowCount();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) {
        
        if($row['type'] == "Football"){
            $Football++;
        }
        
        if($row['type'] == "Cricket"){
            $Cricket++;
        }
        
        if($row['type'] == "Tennis"){
            $Tennis++;
        }
        
        if($row['type'] == "Handball"){
            $Handball++;
        }
        
        if($row['type'] == "VirtualGame"){
            $VirtualGame++;
        }
        
        if($row['type'] == "Tennis"){
            $Tennis++;
        }
        
        if($row['type'] == "Badminton"){
            $Badminton++;
        }
        
        if($row['type'] == "Basketball"){
            $Basketball++;
        }
        
        if($row['type'] == "Hockey"){
            $Hockey++;
        }
        
    }
?>
<div class="owl-stage-outer">
  <div class="owl-stage" style="transform: translate3d(-1506px, 0px, 0px); transition: all 0.8s ease 0s; width: 4144px;">

    <div class="owl-item" style="width: 188.333px;">
      <div class="SliderItem">
        <div class="sliderImg">
          <a href="#all" data-toggle="tab" id="all">
            <img src="img/Star.png">
            <span> All Game <span class="vgame-count"><?php echo $total_game; ?></span></span>
          </a>
        </div>
      </div>
    </div>
    <div class="owl-item" style="width: 188.333px;">
      <div class="SliderItem">
        <div class="sliderImg">
          <a href="#Football" data-toggle="tab" id="Football">
            <img src="images/Football_Image1.png">
            <span>Football<span class="vgame-count"><?php echo $Football; ?></span></span>
          </a>
        </div>
      </div>
    </div>
    <div class="owl-item" style="width: 188.333px;">
      <div class="SliderItem">
        <div class="sliderImg">
          <a href="#Cricket" data-toggle="tab" id="Cricket">
            <img src="images/Cricket_Image1.png">
            <span>Cricket<span class="vgame-count"><?php echo $Cricket; ?></span></span>
          </a>
        </div>
      </div>
    </div>

    <div class="owl-item" style="width: 188.333px;">
      <div class="SliderItem">
        <div class="sliderImg">
          <a href="#Tennis" data-toggle="tab" id="Tennis">
            <img src="images/tennis.png">
            <span>Tennis<span class="vgame-count"><?php echo $Tennis; ?></span></span>
          </a>
        </div>
      </div>
    </div>
    <div class="owl-item" style="width: 188.333px;">
      <div class="SliderItem">
        <div class="sliderImg">
          <a href="#Handball" data-toggle="tab" id="Handball">
            <img src="images/handball.png">
            <span> Handball<span class="vgame-count"><?php echo $Handball; ?></span></span>
          </a>
        </div>
      </div>
    </div>
    <div class="owl-item" style="width: 188.333px;">
      <div class="SliderItem">
        <div class="sliderImg">
          <a href="#Virtual Game" data-toggle="tab" id="Virtual Game">
            <img src="images/virtual.png">
            <span> Virtual<span class="vgame-count"><?php echo $VirtualGame; ?></span></span>
          </a>
        </div>
      </div>
    </div>
    <div class="owl-item" style="width: 188.333px;">
      <div class="SliderItem">
        <div class="sliderImg">
          <a href="#Tennis" data-toggle="tab" id="Tennis">
            <img src="images/tennis.png">
            <span>Tennis<span class="vgame-count"><?php echo $Tennis; ?></span></span>
          </a>
        </div>
      </div>
    </div>
    <div class="owl-item" style="width: 188.333px;">
      <div class="SliderItem">
        <div class="sliderImg">
          <a href="#Badminton" data-toggle="tab" id="Badminton">
            <img src="images/badminton.png">
            <span>Badminton<span class="vgame-count"><?php echo $Badminton; ?></span></span>
          </a>
        </div>
      </div>
    </div>
    <div class="owl-item" style="width: 188.333px;">
      <div class="SliderItem">
        <div class="sliderImg">
          <a href="#Basketball" data-toggle="tab" id="Basketball">
            <img src="images/basketball.png">
            <span>Basketball<span class="vgame-count"><?php echo $Basketball; ?></span></span>
          </a>
        </div>
      </div>
    </div>
    <div class="owl-item" style="width: 188.333px;">
      <div class="SliderItem">
        <div class="sliderImg">
          <a href="#Hockey" data-toggle="tab" id="Hockey">
            <img src="images/hockey.png">
            <span>Hockey<span class="vgame-count"><?php echo $Hockey; ?></span></span>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="owl-nav">
  <button type="button" role="presentation" class="owl-prev"><i class="fa fa-angle-left"></i></button>
  <button type="button" role="presentation" class="owl-next"><i class="fa fa-angle-right"></i></button>
</div>
<div class="owl-dots disabled">
</div>
</div>
<div class="tab-content ">
</div>
</div>
<script>
  $('#all').on('click',function () {
    $('.Football').show();
    $('.Cricket').show();
    $('.Basketball').show();
    $('.Badminton').show();
    $('.Tennis').show();
    $('.vball').show();
    $('.Handball').show();
    $('.Hockey').show();
    $('.Virtual Game').show();
  });
  $('#Cricket').on('click',function () {
    $('.Football').hide();
    $('.Cricket').show();
    $('.Basketball').hide();
    $('.Badminton').hide();
    $('.Tennis').hide();
    $('.vball').hide();
    $('.Handball').hide();
    $('.Hockey').hide();
    $('.Virtual Game').hide();
  });
  $('#Football').on('click',function () {
    $('.Football').show();
    $('.Cricket').hide();
    $('.Basketball').hide();
    $('.Badminton').hide();
    $('.Tennis').hide();
    $('.vball').hide();
    $('.Handball').hide();
    $('.Hockey').hide();
    $('.Virtual Game').hide();
  });
  $('#Basketball').on('click',function () {
    $('.Football').hide();
    $('.Cricket').hide();
    $('.Basketball').show();
    $('.Badminton').hide();
    $('.Tennis').hide();
    $('.vball').hide();
    $('.Handball').hide();
    $('.Hockey').hide();
    $('.Virtual Game').hide();
  });
  $('#Badminton').on('click',function () {
    $('.Football').hide();
    $('.Cricket').hide();
    $('.Badminton').show();
    $('.Tennis').hide();
    $('.vball').hide();
    $('.Basketball').hide();
    $('.Handball').hide();
    $('.Hockey').hide();
    $('.Virtual Game').hide();
  });
  $('#Tennis').on('click',function () {
    $('.Football').hide();
    $('.Cricket').hide();
    $('.Badminton').hide();
    $('.Tennis').show();
    $('.vball').hide();
    $('.Basketball').hide();
    $('.Handball').hide();
    $('.Hockey').hide();
    $('.Virtual Game').hide();
  });
  $('#vball').on('click',function () {
    $('.Football').hide();
    $('.Cricket').hide();
    $('.Badminton').hide();
    $('.Tennis').hide();
    $('.vball').show();
    $('.Basketball').hide();
    $('.Handball').hide();
    $('.Hockey').hide();
    $('.Virtual Game').hide();
  });
  $('#Handball').on('click',function () {
    $('.Football').hide();
    $('.Cricket').hide();
    $('.Badminton').hide();
    $('.Tennis').hide();
    $('.vball').hide();
    $('.Basketball').hide();
    $('.Handball').show();
    $('.Hockey').hide();
    $('.Virtual Game').hide();
  });
  $('#Hockey').on('click',function () {
    $('.Football').hide();
    $('.Cricket').hide();
    $('.Badminton').hide();
    $('.Tennis').hide();
    $('.vball').hide();
    $('.Basketball').hide();
    $('.Handball').hide();
    $('.Hockey').show();
    $('.Virtual Game').hide();
  });
  $('#Virtual Game').on('click',function () {
    $('.Football').hide();
    $('.Cricket').hide();
    $('.Badminton').hide();
    $('.Tennis').hide();
    $('.vball').hide();
    $('.Basketball').hide();
    $('.Handball').hide();
    $('.Hockey').hide();
    $('.Virtual Game').show();
  });
</script>