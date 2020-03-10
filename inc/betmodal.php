
<?php
if(isset($_SESSION['user'])){ ?>
  <div class="modal fade betForm in" id="betRequestModal" role="dialog" aria-labelledby="betRequestModalLabel" style="display: none;">
    <div class="modal-dialog">

      <div class="modal-content m-content">
        <div class="modal-header m-head mh-color" >
          <button type="button" onClick="window.location.reload();" class="close" data-dismiss="modal" style="color: #ffffff">×</button>
          <h4 class="modal-title" style="color: #D2D2D2" id="betRequestModalLabel"> &nbsp; Enter Your  Bet Amount</h4>
        </div>
        <div class="modal-body" style="padding: 2% !important" id="betRequestModal">

          <div class="alert-float alert alert-dismissable ajaxalert" id="" style="display: none">
            <button type="button" class="close ajaxclose" id="">×</button>
            <ul class="list-unstyled">
            </ul>
          </div>
          <div class="betModalWrap">
            <form action="" method="POST" >
              <div id="error_data">
              </div>
              <ul id="first_data">
                <li class="matchTitle">
                  <img style="border-radius: 50%;" class="img-circle" src="" width="25px;">
                  <span></span>
                  <span class="badge text-right"></span>
                </li>
                <li>
                  <span ></span>
                </li>
              </ul>
              <ul>
                <li>
                  <span class="amountBtn">200</span>
                  <span class="amountBtn">500</span>
                  <span class="amountBtn">1000</span>
                  <span class="amountBtn">3000</span>
                  <span class="amountBtn">5000</span>
                  <input name="bet_stake" id="bet" onkeyup="this.onchange();" onchange="valueChange(this);" type="number" min="1" class="number form-control" value="">
                </li>
              </ul>

              <div id="second_data">
              </div>
              <div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 border-bottom form-row mt-15 mb-10'>
                <div class='col-xl-8 col-lg-8 col-md-8 col-sm-8 col-xs-8 text-left'>
                  <strong>Total Stake</strong>
                </div> 
                <div class='col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right'>
                  <strong><span id='stake'>100</span></strong>
                </div>
              </div> 

              <div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 form-row '>
                <div class='col-xl-8 col-lg-8 col-md-8 col-sm-8 col-xs-8 text-left'>
                  <strong>Possible Winning</strong>
                </div> 
                <div class='col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right'>
                  <strong>
                    <span style="visibility: hidden;" id="asshole"></span>
                    <span style="visibility: hidden;" id="poss"></span>
                    <span id="possible"></span>
                  </strong>
                </div>
              </div>
            <div id="button_data">
            </div>
            <br>
          </form>
        </div>

      </div>
    </div>
  </div>
</div>

<?php } ?>