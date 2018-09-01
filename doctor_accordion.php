<?php
$us_state_abbrs = [
  'Alabama'=>'AL','Alaska'=>'AK', 'Arizona'=>'AZ', 'Arizona'=>'AZ', 'Arkansas'=>'AR',
  'California'=>'CA','Colorado'=>'CO', 'Connecticut'=>'CT', 'Delaware'=>'DE',
  'Florida'=>'FL', 'Georgia'=>'GA', 'Hawaii'=>'HI',
  'Idaho'=>'ID', 'Illinois'=>'IL', 'Indiana'=>'IN', 'Iowa'=>'IA', 'Kansas'=>'KS', 'Kentucky'=>'KY',
  'Louisiana'=>'LA', 'Maine'=>'ME', 'Maryland'=>'MD', 'Massachusetts'=>'MA', 'Michigan'=>'MI', 'Minnesota'=>'MN', 'Mississippi'=>'MS', 'Missouri'=>'MO', 'Montana'=>'MT'
    ];

?>

<!-- ACCORDION -->

<div class="container">	
    <div id="accordion" role="tablist">

      <!--Begin State -->
      <?php 
   foreach($us_state_abbrs as $stateName=>$stateAbbr){
?>      
      <div class="card" id="<?php echo '#state_top_' . strtolower($stateAbbr) . '_top';  ?>">
        <div class="card-header" role="tab" id="heading">
          <h2 class="mb-0"><a  href="<?php echo '#' .  strtolower($stateName); ?>"  class="btn btn-primary btn-block stated " 
     		        state_abbr="<?php echo $stateAbbr?>" data-parent="#accordion" data-toggle="collapse">
            <h4 ><?php echo $stateName?></h4>
          </a></h2>
        </div>

        <div id="<?php echo strtolower($stateName);?>" class="collapse">
          <div id="<?php echo strtolower($stateName) . '_data';?>" class="card-body table-response" onmousedown='return false;' onselectstart='return false;'>

          </div>

        </div>

      </div>
      <hr>
         <?php } ?>

      <!--End State -->

       


    </div> <!--container-->
      
  </div> <!--role-->
  <div style="margin-top:500px;"></div>