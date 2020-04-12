
<?php
if(isset($_SESSION['user'])){ ?>
  <div class="modal fade betForm in bet-modal" id="betRequestModal" role="dialog" aria-labelledby="betRequestModalLabel" style="display: none;">
    <div class="modal-dialog">


      <div class="modal-content m-content">
        <div class="modal-header m-head mh-color" >
          <button type="button" onClick="window.location.reload();" class="close" data-dismiss="modal" style="color: #ffffff">×</button>
          <h4 class="modal-title" style="color: #D2D2D2" id="betRequestModalLabel"> &nbsp; Enter Your  Bet Amount</h4>
        </div>
  
          <div id="single-tab" class="tab current-tab">
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
  </div>

</div>




<!-- Multi Bet -->
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary multibet-count-button" id="multiBetTrigger" data-toggle="modal" data-target="#exampleModal">
       <span id="count"></span> Multi Bet
    </button>

    <!-- Modal -->
    <div class="modal fade multi-bet-modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header m-head mh-color" >
                <button type="button" class="close close-modal" style="color: #ffffff">×</button>
                <h4 class="modal-title" style="color: #D2D2D2" id="betRequestModalLabel"> &nbsp; Multi Bet</h4>
              </div>

                <div class="modal-body" id="modal-body">
                  <div id="multi-bet-message"></div>
                  <form id="multi-bet-form">
                    <div class="multi-bet-data" style="padding: 15px;" id="multi-bet-data">
                      <div id="data-list"></div>
                    </div>

                    <div class="equiation">
                      <ul class="list-inline">
                        <li class="list-inline-item p-0"><span class="multiAmountBtn">200</span></li>
                        <li class="list-inline-item p-0"><span class="multiAmountBtn">500</span></li>
                        <li class="list-inline-item p-0"><span class="multiAmountBtn">1000</span></li>
                        <li class="list-inline-item p-0"><span class="multiAmountBtn">3000</span></li>
                        <li class="list-inline-item p-0"><span class="multiAmountBtn">5000</span></li>
                      </ul>
                      <div>
                        <input type="hidden" id="rate" value="10000">
                        <input id="multiBet" type="number" min="1" class="number form-control"> 
                      
                        <div class="d-flex">
                          <div><p>Total Stake</p></div>
                          <div class="ml-auto"><p id="totalStake"></p></div>
                        </div>
                        <div class="d-flex">
                          <div><p>Possible Winning</p></div>
                          <div class="ml-auto"><p id="winResult"></p></div>
                        </div>

                      </div>
                    </div>

                    <input type="hidden" name="multi-amount" id="multi-amount" value="100">

                    <button type="submit" class="btn half-block btn-primary place-bet-btn" id="multi-bet-form-submit">PLACE BET</button>
                    <button type="button" class="btn half-block btn-primary more-bet-btn">ADD MORE</button>
                    <button type="button" class="btn half-block btn-info close-modal">CLOSE</button>
                  </form>

                </div>
              
            </div>
        </div>
    </div>
<!-- /Multi Bet -->


<!-- Exist Modal -->

<!-- Modal -->
<div class="modal exist-modal fade" id="existModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header m-head mh-color" >
        <button type="button" class="close" data-dismiss="modal" style="color: #ffffff">×</button>
        <h4 class="modal-title" style="color: #D2D2D2" id="betRequestModalLabel"> &nbsp; Multi Bet Alert</h4>
      </div>
      <div class="modal-body text-center">
        <h1><b>X</b></h1>
        <br>
        <p>Sorry You can't add multiple question from same match in multi bet. If you wanna back to single bet system please press single bet button.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn half-block btn-primary btn-secondary" data-dismiss="modal">NO THANKS</button>
        <button type="button" class="btn half-block btn-primary btn-primary close-modal">SINGLE BET</button>
      </div>
    </div>
  </div>
</div>

<!-- /Exist Modal -->





<?php
  } 
?>