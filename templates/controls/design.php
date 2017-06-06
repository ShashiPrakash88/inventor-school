<?php do_action( 'inventor_listing_detail_school_aschool' ); ?>
<?php 
/**
  * Including asset dependencies
**/
 wp_enqueue_style( 'inventor-schools',    plugins_url('inventor-schools/').'assets/styles/frontend.css');
 wp_enqueue_style( 'inventor-schools-w3', plugins_url( 'inventor-schools/').'assets/styles/w3.css' );


 // 1st display  The Basic Details
 $school_code            = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'schcode', true ); 
 $estabalishment_year    = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'year',    true ); 
 $school_location        = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'location',true );
 $gender                 = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'gender',  true ); 
 $type_of_school         = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'type',    true ); 
 $school_management      = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'mngt',    true ); 
 $board_secondary        = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'board',   true ); 
 $board_higher_secondary = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'board2', true ); 
 $lowest_class           = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'lowclass' , true ); 
 $highest_class          = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'highclass', true ); 
 $instruction_1          = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . 'med_instruc1' , true ); 
 $instruction_2          = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . 'med_instruc2' , true ); 
 $instruction_3          = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . 'med_instruc3' , true ); 
 // 2nd display About The School
 $water_type             = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'watertype',  true ); 
 $electricity            = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'electricity',true );
 $medical_checkup        = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'medchk' ,    true ); 
 $mid_day_meal           = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'midday' ,    true );
 $food_from              = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'notinschool',true ); 
 $kitchen_status         = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'inschool' ,  true ); 
 $male_cooks             = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'cooks_m' ,   true );
 $female_cooks           = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'cooks_f' ,   true ); 
 $benefitted_boys        = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'benefit_b' , true ); 
 $benefitted_girls       = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'benefit_g',  true ); 
 $school_building        = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'building' ,  true ); 
 $class_rooms            = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'clrooms' ,  true ); 
 $major_repair           = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'clrooms_major' ,  true ); 
 $minor_repair           = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'clrooms_minor' ,  true );
 $toilets_boys           = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'toilets_b' ,  true ); 
 $toilets_girls          = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'toilets_g' ,  true );
 $boundary_wall          = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'boundary' ,  true );
 $playground             = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'playgrnd' ,  true ); 
 $ramps                  = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'ramps' ,  true );
 $cce_system             = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'cce' ,  true ); 
 $record_shared          = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'record' ,  true ); 
 $record_maintained      = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'records' ,  true ); 
 $library                = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'library' ,  true );
 $books                  = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'books' ,  true ); 
 $record                 = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'bookrec' ,  true );
 $computer_lab           = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'complabs' ,  true );
 $total_computers        = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'comp' ,  true ); 
 //3rd Display
 $receipt1               = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'devr',  true ); 
 $receipt2               = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'mngtr',true );
 $receipt3               = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'tlmr' ,    true ); 
 $receipt4               = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'other_r' ,    true ); 
 $expenditure1           = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'deve' ,    true );
 $expenditure2           = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'mngte',true ); 
 $expenditure3           = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'tlme' ,  true ); 
 $expenditure4           = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'other_e' ,  true ); 
 $inspection1            = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'blkoff' ,   true );
 $inspection2            = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'clstrof' ,   true ); 
 $inspection3            = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'commem' , true ); 
 $inspection4            = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'supoffic',  true ); 
 $SMC_development        = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'devplan' ,  true ); 
 $members_male           = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'mem_m' ,  true ); 
 $members_female         = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'mem_f' ,  true ); 
 $parents_male           = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'pare_m' ,  true );
 $parents_female         = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'pare_fe' ,  true ); 
 $local_male             = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'local_m' ,  true );
 $local_female           = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'local_f' ,  true );
 $meetings               = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'meet' ,  true ); 
 $type_of_training       = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'train_type' ,  true );
 $enrolled_male          = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'enrol_b' ,  true ); 
 $enrolled_female        = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'enrol_g' ,  true ); 
 $train_male             = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'prov_b' ,  true ); 
 $train_female           = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'prov_g' ,  true ); 
 $place_of_training      = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'trainat' ,  true ); 
 $trained_by             = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'sptrainby' ,  true ); 
 $total_enrolled         = $enrolled_male  + $enrolled_female;
 $total_trained = $train_male+ $train_female;
// Calculations for the display 
$cooks              = $malecooks + $female_cooks; 
$benfitted_students = $benefitted_girls + $benefitted_boys;
$classroom_repair   = $major_repair + $minor_repair; 
$toilets            = $toilets_boys + $toilets_girls;
$total_receipt      = $receipt1 + $receipt2 + $receipt3 + $receipt4; 
$total_expenditure  = $expenditure1 + $expenditure2 + $expenditure3 + $expenditure4;
$inspection_officer = $inspection1 + $inspection2;
$inspection_other   = $inspection3 + $inspection4;
$members            = $members_male  + $members_female; 
$parents            = $parents_male+ $parents_female;
$local_members      = $local_male + $local_female ; 
?>

<!-- 1st Display Basic Details-->
<?php if ( ! empty( $school_code)): ?>

<div class="listing-detail-section family">
<h2 class="page-header"><?php echo __( 'Basic Details', 'inventor-schools' ); ?></h2>
  <div class="row tcenter">
    <div class="col-sm-1 col-lg-2">
	<i class="fa fa-mortar-board colorred size2"></i><br>
	<div class="size1">Established <br> in <?php echo $estabalishment_year?></div>
	</div>
	<div class="col-sm-1 col-lg-2">
	<i class="fa fa-location-arrow colorgreen size2"></i><br>
	<div class="size1">Location<br><?php echo $school_location?></div>
	</div>
	<div class="col-sm-1 col-lg-2">
	<i class="fa fa-user-circle colorblue size2"></i><br>
	<div class="size1">Gender<br><?php echo $gender?></div>
	</div>
	<div class="col-sm-1 col-lg-2">
	<i class="fa fa-group coloryellow size2"></i><br>
	<div class="size1">Management<br><?php echo $school_management?></div>
	</div>
	<div class="col-sm-1 col-lg-2">
	<i class="fa fa-child colorpurple size2"></i><br>
	<div class="size1">From<br><?php echo $lowest_class ?></div>
	</div>
	<div class="col-sm-1 col-lg-2">
	<i class="fa fa-male colorbrown size2"></i><br>
	<div class="size1">To <br><?php echo $highest_class?></div>
	</div>
    </div>
	<div class="row tcenter">
    <div class="col-sm-1 col-lg-2">
	<i class="fa fa-bank colorpurple size2"></i><br>
	<div class="size1">Type<br><?php echo $type_of_school?></div>
	</div>
	<div class="col-sm-1 col-lg-2">
	<i class="fa fa-book colorred size2"></i><br>
	<div class="size1"><?php echo $board_secondary?><br>For 10th</div>
	</div>
	<div class="col-sm-1 col-lg-2">
	 <span class="glyphicon glyphicon-book coloryellow size2"></span><br>
	<div class="size1"><?php echo $board_higher_secondary?><br>for 12th</div>
	</div>
	<div class="col-sm-1 col-lg-2">
	<i class="fa fa-edit colorbrown size2"></i><br>
	<div class="size1">Medium Of <br>Instruction 1<br><?php echo $instruction_1?></div>
	</div>
	<div class="col-sm-1 col-lg-2">
	<i class="fa fa-pencil-square colorblue size2"></i><br>
	<div class="size1">Medium Of <br>Instruction 2<br><?php echo $instruction_2?></div>
	</div>
	 <div class="col-sm-1 col-lg-2">
	<i class="fa fa-pencil colorgreen size2"></i><br>
	<div class="size1">Medium Of <br>Instruction 3<br><?php echo $instruction_3?></div>
	</div>
	</div>
 </div> 
 <!-- 2nd Display About the School -->
<div class="listing-detail-section family" >
<h2 class="page-header"><?php echo __( 'About The School', 'inventor-schools' ); ?></h2>
  <div class="container">
<!-- 1st Pannel-->
<div class="col-sm-8 col-lg-9">
    <div class="panel-group" id="accordion">
     <div class="panel panel-default">
	 <div class="bgblue">
       <div class="panel-heading">
	     <h4 class="panel-title lcenter" >
           <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
		   <span style='font-size:24px'>Basic Facilities</span></a>
         </h4>
       </div>
	  </div>
       <div id="collapse1" class="panel-collapse collapse in">
	      <div class="panel-body tcenter">
		  <div class="col-lg-2 col-sm-2"></div>
          <div class="w3-card-4 w3-light-gray tcenter col-lg-8 col-sm-6">
            <div class="w3-container tcenter ">
			<h3>
			<div class="row">
              <div class="col-sm-1 col-lg-1">1.</div>
			  <div class="col-sm-6 col-lg-8  ">Source of drinking water :</div>
			  <div class="col-sm-1 col-lg-3 colorblue"> <?php echo $water_type?></div>
			</div>
			<div class="row">
              <div class="col-sm-1 col-lg-1">2.</div>
			  <div class="col-sm-6 col-lg-8  ">Electricity Available :</div>
			  <div class="col-sm-1 col-lg-2 colorblue"><?php echo $electricity?></div>
			</div>
			<div class="row">
              <div class="col-sm-1 col-lg-1">3.</div>
			  <div class="col-sm-6 col-lg-8  ">Medical checkup  :</div>
			  <div class="col-sm-1 col-lg-2 colorblue"><?php echo $medical_checkup?></div>
			</div>
			<div class="row">
              <div class="col-sm-1 col-lg-1">4.</div>
			  <div class="col-sm-6 col-lg-8  ">Midday meal Available :</div>
			  <div class="col-sm-1 col-lg-2 colorblue"><?php echo $mid_day_meal?></div>
			</div><br>
			<div class="row" >
			<h4>
              <div class="col-sm-2 col-lg-3"> Food from: </div>
			  <div class="col-sm-2 col-lg-3 colorblue "><?php echo $food_from?></div>
			   <div class="col-sm-2 col-lg-2"> Kitchen: </div>
			  <div class="col-sm-2 col-lg-3 colorblue "><?php echo $kitchen_status?></div>
			 </h4>
			</div>
		   <div class="row">
		   <h4>
              <div class="col-sm-2 col-lg-3"> Cooks: </div>
			  <div class="col-sm-2 col-lg-3 colorblue "><?php echo $cooks?></div>
			   <div class="col-sm-2 col-lg-2">Students:</div>
			  <div class="col-sm-2 col-lg-2 colorblue "><?php echo $benfitted_students?></div>
			</div>
			</h4>
			 </h3> 
			</div>
          </div>
		   </div>
		  </div>
	 </div>
     <div class="panel panel-default">
	 <div class="bgblue">
       <div class="panel-heading">
         <h4 class="panel-title lcenter" >
           <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
		   <span style='font-size:24px'>Infrastructure</span></a>
         </h4>
       </div></div>
       <div id="collapse2" class="panel-collapse collapse">
	      <div class="panel-body tcenter">
          <div class="col-lg-2 col-sm-2"></div>
          <div class="w3-card-4 w3-light-gray tcenter col-lg-8 col-sm-6">
            <div class="w3-container tcenter ">
			<h3>
			<div class="row">
              <div class="col-sm-1 col-lg-1">1.</div>
			  <div class="col-sm-6 col-lg-7  ">Status of Building :</div>
			  <div class="col-sm-1 col-lg-3 colorblue"> <?php echo $school_building?></div>
			</div>
			<div class="row">
              <div class="col-sm-1 col-lg-1">2.</div>
			  <div class="col-sm-6 col-lg-7  ">No. of Classrooms :</div>
			  <div class="col-sm-1 col-lg-3 colorblue"><?php echo $class_rooms?></div>
			</div>
			<div class="row">
			<h4>
              <div class="col-sm-1 col-lg-1"></div>
			  <div class="col-sm-6 col-lg-7  ">Class-room requiring repair:</div>
			  <div class="col-sm-1 col-lg-3 colorblue"><?php echo $classroom_repair?></div>
			</h4>
			</div>
			<div class="row">
              <div class="col-sm-1 col-lg-1">3.</div>
			  <div class="col-sm-6 col-lg-7  ">Total Toilets:</div>
			  <div class="col-sm-1 col-lg-3 colorblue"><?php echo $toilets?></div>
			</div>
			<div class="row">
              <div class="col-sm-1 col-lg-1">4.</div>
			  <div class="col-sm-6 col-lg-7 ">Boundary Wall:</div>
			  <div class="col-sm-1 col-lg-3 colorblue padng"><?php echo $boundary_wall ?></div>
			</div>
			<div class="row">
              <div class="col-sm-1 col-lg-1">5.</div>
			  <div class="col-sm-6 col-lg-7  ">Playground Available:</div>
			  <div class="col-sm-1 col-lg-3 colorblue"><?php echo $playground?></div>
			</div>
			<div class="row">
              <div class="col-sm-1 col-lg-1">6.</div>
			  <div class="col-sm-6 col-lg-7  ">Ramps Available:</div>
			  <div class="col-sm-1 col-lg-3 colorblue"><?php echo $ramps?></div>
			</div>
			</h3> 
			</div>
          </div>
		   </div>
		  </div>
	 </div>
	 <div class="panel panel-default">
	 <div class="bgblue">
       <div class="panel-heading">
         <h4 class="panel-title lcenter " >
           <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
		   <span style='font-size:24px'>Curriculum</span></a>
         </h4>
       </div></div>
       <div id="collapse3" class="panel-collapse collapse">
	      <div class="panel-body tcenter">
          <div class="col-lg-2 col-sm-2"></div>
          <div class="w3-card-4 w3-light-gray tcenter col-lg-8 col-sm-6">
            <div class="w3-container tcenter ">
			<h3>
			<div class="row">
              <div class="col-sm-1 col-lg-1">1.</div>
			  <div class="col-sm-6 col-lg-8  ">CCE System Implemented :</div>
			  <div class="col-sm-1 col-lg-2 colorblue"> <?php echo $cce_system?></div>
			</div>
			<div class="row">
              <div class="col-sm-1 col-lg-1">2.</div>
			  <div class="col-sm-6 col-lg-8  ">Student Records Maintained:</div>
			  <div class="col-sm-1 col-lg-2 colorblue"><?php echo $record_maintained?></div>
			</div>
			<div class="row">
			<h4>
              <div class="col-sm-1 col-lg-1"></div>
			  <div class="col-sm-6 col-lg-8  ">Records Shared with parents:</div>
			  <div class="col-sm-1 col-lg-2 colorblue"><?php echo $record_shared?></div>
			</h4>
			</div>
			<div class="row">
              <div class="col-sm-1 col-lg-1">3.</div>
			  <div class="col-sm-6 col-lg-8  ">Libarary Available :</div>
			  <div class="col-sm-1 col-lg-2 colorblue"><?php echo $library?></div>
			</div>
			<div class="row" >
			<h4>
              <div class="col-sm-2 col-lg-4"> No.of Books: </div>
			  <div class="col-sm-2 col-lg-1 colorblue "><?php echo $books?></div>
			  <div class="col-sm-2 col-lg-5">Record of books: </div>
			  <div class="col-sm-2 col-lg-1 colorblue"><?php echo $record?></div>
			 </h4>
			</div>
			<div class="row">
              <div class="col-sm-1 col-lg-1">4.</div>
			  <div class="col-sm-6 col-lg-8  ">Computer Lab Available:</div>
			  <div class="col-sm-1 col-lg-2 colorblue"><?php echo $computer_lab?></div>
			</div>
			<div class="row">
              <div class="col-sm-1 col-lg-1">5.</div>
			  <div class="col-sm-6 col-lg-8  ">No. of computers:</div>
			  <div class="col-sm-1 col-lg-2 colorblue"><?php echo $total_computers?></div>
			</div>
			 </h3> 
			</div>
          </div>
		   </div>
		  </div>
	 </div>
	</div>
   </div>
  </div>
</div>
<!-- 3rd Display -- Other Features -->
<div class="listing-detail-section family">
<h2 class="page-header"><?php echo __( 'Other Features', 'inventor-schools' ); ?></h2>
<div class="row">
<div class="col-sm-1 col-lg-1"></div>
<div class="cardcontain col-sm-3 col-lg-4">
<div class="card">
    <div class="front">
     <br><i class="fa fa-money colorpurple size2 tcenter"></i>
	 <h3>Fundings <br>And<br> Grants</h3>
    </div>
   <div class="back">
     <h2 class="tcenter "> Funds & Grants </h2>
     <br>     
	 <div class="row">
      <div class="col-sm-4 col-lg-6 size1">Total Grant Receipt:</div>
	  <div class="col-sm-4 col-lg-6 size2"><?php echo $total_receipt?></div>
	  </div><br>
	  <div class="row">
	  <div class="col-sm-4 col-lg-6 size1">Total Grant Expenditure:</div>
	  <div class="col-sm-4 col-lg-6 size2"><?php echo $total_expenditure?></div>
      </div> 
   </div>
</div></div>
<div class="col-sm-2 col-lg-2"></div>
<div class="cardcontain  col-sm-3 col-lg-4">
<div class="card">
    <div class="front">
     <br><i class="fa fa-institution coloryellow size2 tcenter"></i>
	 <h3>Inspections<br> In The<br> School</h3>
    </div>
   <div class="back">
	  <h2 class="tcenter">Inspections</h2>
	  <br>
      <div class="row">
      <div class="col-sm-4 col-lg-6 size1">Inspection By Officers :</div>
	  <div class="col-sm-4 col-lg-6 size2"><?php echo $inspection_officer?></div>
	  </div><br>
	  <div class="row">
	  <div class="col-sm-4 col-lg-6 size1">Inspections By Others:</div>
	  <div class="col-sm-4 col-lg-6 size2"><?php echo $inspection_other?></div>
      </div> 
   </div>
</div>
</div>
</div>
<br>
<div class="row">
<div class="col-sm-1 col-lg-1"></div>
<div class="cardcontain col-sm-3 col-lg-4">
<div class="card">
    <div class="front">
      <br><i class="fa fa-group colorpurple tcenter"></i>
	  <div><h2>School Management Council</h2></div>
    </div>
   <div class="back">
     <h3>School Management Councils</h3>
      <div class="row">
      <div class="col-sm-6 col-lg-8 size1">1.SMCs in School Development:</div>
	  <div class="col-sm-2 col-lg-2 size1"><?php echo $SMC_development?></div>
	  </div>
	  <div class="row">
      <div class="col-sm-6 col-lg-8 size1">2.Total Members:</div>
	  <div class="col-sm-2 col-lg-2 size1"><?php echo $members?></div>
	  </div>
	  <div class="row">
      <div class="col-sm-6 col-lg-8 size1">3.Parents Members:</div>
	  <div class="col-sm-2 col-lg-2 size1"><?php echo $parents?></div>
	  </div>
	  <div class="row">
	  <div class="col-sm-6 col-lg-8 size1">4.Local Authorities:</div>
	  <div class="col-sm-2 col-lg-2 size1"><?php echo $local_members?></div>
      </div>
	  <div class="row">
	  <div class="col-sm-6 col-lg-8 size1">5.SMCs Meetings in a year:</div>
	  <div class="col-sm-2 col-lg-2 size1"><?php echo $meetings?></div>
      </div> 	  
   </div>
</div></div>
<div class="col-sm-2 col-lg-2"></div>
<div class="cardcontain  col-sm-3 col-lg-4">
<div class="card">
    <div class="front">
     <br><i class="fa fa-graduation-cap colorred size2 tcenter"></i>
	 <h2>Special <br>Trainings</h2>
    </div>
   <div class="back">
   <h3> Special Trainings</h3>
     <div class="row">
      <div class="col-sm-5 col-lg-7 size1">1.Enrolled Children:</div>
	  <div class="col-sm-3 col-lg-3 size1"><?php echo $total_enrolled?></div>
	  </div>
	  <div class="row">
      <div class="col-sm-5 col-lg-7 size1">2.Children provided the training:</div>
	  <div class="col-sm-3 col-lg-3 size1 padng"><?php echo $total_trained?></div>
	  </div>
	  <div class="row">
      <div class="col-sm-5 col-lg-7 size1">3.Type Of Training:</div>
	  <div class="col-sm-3 col-lg-3 size1 padng"><?php echo $type_of_training?></div>
	  </div>
	  <div class="row">
	  <div class="col-sm-5 col-lg-7 size1">4.Teachers alloted:</div>
	  <div class="col-sm-3 col-lg-3 size1 padng"><?php echo $trained_by?></div>
      </div> 
	  <div class="row">
	  <div class="col-sm-5 col-lg-7 size1">5.Place of Training:</div>
	  <div class="col-sm-3 col-lg-3 size1 padng"><?php echo $place_of_training?></div>
      </div>
   </div>
</div>
</div>
</div>
</div>
<!-- 4th Display -- Teaches & Students --> 
	<!-- /.listing-detail-section -->
	<?php endif; ?>
<?php do_action( 'inventor_after_listing_detail_school_aschool' ); ?>