<?php do_action( 'inventor_listing_detail_school_aschool' ); ?>
<?php if ( get_post_type() == 'school'): ?>
<?php 
/**
  * Including asset dependencies
**/
	wp_enqueue_style( 'inventor-schools-font', 'https://fonts.googleapis.com/css?family=Dosis:300');
 	wp_enqueue_style( 'inventor-schools-w3', plugins_url( 'inventor-schools/').'assets/styles/w3.css' );
	wp_enqueue_style( 'inventor-schools-frontend',    plugins_url( 'inventor-schools/').'assets/styles/frontend.css');

	wp_enqueue_script( 'inventor-schools-bootstrap', 	plugins_url( 'inventor-schools/').'assets/js/bootstrap.min.js');
	wp_enqueue_script( 'inventor-schools-myjs', 	plugins_url( 'inventor-schools/').'assets/js/myjs.js');

	echo "<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.min.js'></script>";
	//<link href="https://fonts.googleapis.com/css?family=Dosis:300" rel="stylesheet">
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
 $instruction_1          = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'med_instruc1' , true ); 
 $instruction_2          = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'med_instruc2' , true ); 
 $instruction_3          = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'med_instruc3' , true ); 
 // 2nd display About The School
 $ppsections             = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'ppsections',  true ); 
 $schhrschild_upr 			 = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'schhrschild_upr',  true ); 
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
//Teacher and students
	$tec_m             		 = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'tec_m' ,  true ); 
	$tec_f             		 = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'tec_f' ,  true ); 
	$tch_nr             	 = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'tch_nr' ,  true ); 
	$ppteacher             = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'ppteacher' ,  true ); 	
	$graduate              = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'graduate' ,  true ); 
	$professional          = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'professional' ,  true ); 
	$ppstudent          	 = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'ppstudent' ,  true ); 
	$result_primary        = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'res1' ,  true ); 
	$result_secondary      = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'res2' ,  true ); 

//Teacher's Details
	$tch_dtls 						 = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'tch_dtls' ,  true ); 
//contact Details
	$cnt_person = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX  . 'person' ,  true ); 
	$cnt_email = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX  . 'email' ,  true ); 
	$cnt_website = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX  . 'website' ,  true ); 
	$cnt_phone = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX  . 'phone' ,  true ); 
	$cnt_phone2 = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX  . 'phone2' ,  true );
	$cnt_phone3 = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX  . 'phone3' ,  true );
	$cnt_address = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX  . 'address' ,  true );
	$cnt_locality = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX  . INVENTOR_SCHOOL_PREFIX . 'locality' ,  true );
	$cnt_city = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX  . INVENTOR_SCHOOL_PREFIX . 'city' ,  true );
	$cnt_pincode = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX  . INVENTOR_SCHOOL_PREFIX . 'pin' ,  true );

// Calculations for the display 
$total_enrolled         = $enrolled_male  + $enrolled_female;
$total_trained = $train_male+ $train_female;
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
$total_teachers 		= $tec_m + $tec_f + $tch_nr + $ppteacher;

//students calculations
	//print_r($result_secondary);
	function counter($arr, $from, $to, $for) {
		$total=0;

		for($i=$from; $i<$to; $i++) {
			if($for=='B' && $i%2==0)
				// echo $arr['class_num_'.$i].'=>'.$arr['total_'.$i].'<br>';
				$total+=$arr['total_'.$i];
			else if($for=='G' && $i%2!=0)
				// echo $arr['class_num_'.$i].'=>'.$arr['total_'.$i].'<br>';
				$total+=$arr['total_'.$i];
		}
		return $total;
	}

	function GCD($num1, $num2) {
			while ($num2 != 0){
				$t = $num1 % $num2;
				$num1 = $num2;
				$num2 = $t;
			}
		return $num1;
	}

	function ratio($var1, $var2) {
		
		$gcd = GCD($var1, $var2);
		$var1 = $var1/$gcd;
		$var2 = $var2/$gcd;
	
	return "$var1 : $var2";
	}

	$primary_b=counter($result_primary,0,10,'B');
	$primary_g=counter($result_primary,0,10,'G');
	$sec_b=counter($result_secondary,0,10,'B');
	$sec_g=counter($result_secondary,0,10,'G');
	$hrsec_b=counter($result_secondary,10,14,'B');
	$hrsec_g=counter($result_secondary,10,14,'G');

	$total_boys=	$primary_b + $sec_b + $hrsec_b;
	$total_girls=	$primary_g + $sec_g + $hrsec_g;

	$primary_stu=$ppstudent + $primary_b + $primary_g;
	$sec_stu=$sec_b + $sec_g;
	$hrsec_stu=$hrsec_b + $hrsec_g;
	
	$stu_strength =$ppstudent + $total_boys + $total_girls;
	
//ratio calculations
	$ratio_bg=explode(":",ratio($total_boys, $total_girls));
	$ratio_ts=explode(":",ratio($total_teachers, $stu_strength));	

//School Management calculations
	$smc_members=$members_male + $members_female;
	$smc_parents=$parents_male + $parents_female;
	$smc_local=$local_male + $local_female;

?>

<!-- 1st Display Basic Details-->
<?php if ( ! empty( $school_code)): ?>
	<script>

		//chart global proprties
		Chart.defaults.global.animation.easing = 'easeInOutExpo';

		function onScr(t){
			var win = jQuery(window);
			
			var viewport = {
					top : win.scrollTop(),
					left : win.scrollLeft()
			};
			viewport.right = viewport.left + win.width();
			viewport.bottom = viewport.top + win.height();
			
			var bounds = jQuery(t).offset();
			bounds.right = bounds.left + jQuery(t).outerWidth();
			bounds.bottom = bounds.top + jQuery(t).outerHeight();
    	bounds.top = bounds.top + jQuery(t).outerHeight()*0.5;
			
			return (!(viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < bounds.top || viewport.top > bounds.bottom));
			
		};
	</script>

	<!-- 1st Display Basic Details-->
	<div class="listing-detail-section family" id="listing-detail-section-basic_details">
		<h2 class="page-header">Basic Details</h2>
		<div class="row"> 
			<div class="col-md-2 col-xs-6">
				<div class="tp" data-toggle="tooltip" data-placement="top" title="Established">
					<svg class="icon">
						<?php echo '<use xlink:href="'.plugins_url( 'inventor-schools/').'assets/svg/icons.svg#icon-074"></use>'; ?>
					</svg><span class="ename"><?php echo $estabalishment_year?></span>
				</div>
			</div>
			<div class="col-md-2 col-xs-6">
				<div class="tp" data-toggle="tooltip" data-placement="top" title="Board">
					<svg class="icon">
						<?php echo '<use xlink:href="'.plugins_url( 'inventor-schools/').'assets/svg/icons.svg#icon-047"></use>'; ?>
					</svg><span class="ename"><?php echo $board_secondary?></span>
				</div>
			</div>
			<div class="col-md-2 col-xs-6">
				<div class="tp" data-toggle="tooltip" data-placement="top" title="Gender">
					<svg class="icon">
						<!--<use xlink:href="./assets/svg/icons.svg#icon-129"></use>-->
						<?php echo '<use xlink:href="'.plugins_url( 'inventor-schools/').'assets/svg/icons.svg#icon-129"></use>'; ?>
					</svg><span class="ename"><?php echo $gender?></span>
				</div>
			</div>
			<div class="col-md-2 col-xs-6">
				<div class="tp" data-toggle="tooltip" data-placement="top" title="Management">
					<svg class="icon">
						<!--<use xlink:href="./assets/svg/icons.svg#icon-127"></use>-->
						<?php echo '<use xlink:href="'.plugins_url( 'inventor-schools/').'assets/svg/icons.svg#icon-127"></use>'; ?>
					</svg><span class="ename"><?php echo $school_management ?></span>
				</div>
			</div>
			<div class="col-md-2 col-xs-6">
				<div class="tp" data-toggle="tooltip" data-placement="top" title="Classes Offered">
					<svg class="icon">
						<!--<use xlink:href="./assets/svg/icons.svg#icon-002"></use>-->
						<?php echo '<use xlink:href="'.plugins_url( 'inventor-schools/').'assets/svg/icons.svg#icon-002"></use>'; ?>
					</svg><span class="ename">
						<?php
							function getClass($cl) {
								if($cl==1)
									return 'st';
								else if($cl==2)
									return 'nd';
								else if($cl==3)
									return 'rd';
								else
									return 'th';
							}
						echo $lowest_class ?><sup><?php echo getClass($lowest_class)?></sup> - <?php echo $highest_class?><sup><?php echo getClass($highest_class)?></sup></span>
				</div>
			</div>
			<div class="col-md-2 col-xs-6">
				<div class="tp" data-toggle="tooltip" data-placement="top" title="Student Strength">
					<svg class="icon">
						<?php echo '<use xlink:href="'.plugins_url( 'inventor-schools/').'assets/svg/icons.svg#icon-083"></use>'; ?>
					</svg><span class="ename"><?php echo $stu_strength?></span>
				</div>
			</div>
		</div>
	</div>
	<!-- 2nd Display About the School-->
	<div class="listing-detail-section family sec0" id="listing-detail-section-about_school">
		<h2 class="page-header">About The School</h2>
		<div class="container ac-container">
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				<div class="panel panel-default">
					<div class="panel-heading" id="headingOne" role="tab">
						<h4 class="panel-title"><a id="clp1" class="btn btn-default abc-ac-btn" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">Curriculum<i class="fa fa-plus"></i></a></h4>
					</div>
					<div class="panel-collapse collapse" id="collapseOne" role="tabpanel" aria-labelledby="headingOne">
						<div class="panel-body">
							<table class="table">
								<tr>
									<td>Instruction Medium</td>
									<td><strong><?php echo $instruction_1?></strong><?php if(!empty($instruction_2)) echo ','; ?> <?php echo $instruction_2?><?php if(!empty($instruction_3)) echo ','; ?> <?php echo $instruction_3?></td>
								</tr>
								<tr>
									<td>CCE Implemented</td>
									<td><?php echo $cce_system?></td>
								</tr>
								<tr>
									<td>Pre-Primary Available</td>
									<td><?php echo $ppsections?></td>
								</tr>
								<tr>
									<td>Teaching Hours</td>
									<td><?php echo $schhrschild_upr?> hours</td>
								</tr>
								<!--<tr>
									<td>School Timing*</td>
									<td> </td>
								</tr>
								<tr>
									<td>&nbsp&nbsp- Mon-Fri</td>
									<td>8:00 AM - 2:00 PM</td>
								</tr>
								<tr>
									<td>&nbsp&nbsp- Sat-Sun</td>
									<td>Closed</td>
								</tr>-->
							</table>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading" id="headingTwo" role="tab">
						<h4 class="panel-title"><a class="btn btn-default abc-ac-btn collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Infrastructure<i class="fa fa-plus"></i></a></h4>
					</div>
					<div class="panel-collapse collapse" id="collapseTwo" role="tabpanel" aria-labelledby="headingTwo">
						<div class="panel-body">
							<table class="table">
								<tr>
									<td>School Code</td>
									<td><?php echo $school_code?></td>
								</tr>
								<tr>
									<td>Status of Building</td>
									<td><?php echo $school_building?></td>
								</tr>
								<tr>
									<td>Total Classrooms</td>
									<td><?php echo $class_rooms?></td>
								</tr>
								<tr>
									<td>Mid-Day Meal provided</td>
									<td><?php echo $mid_day_meal?></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading" id="headingThree" role="tab">
						<h4 class="panel-title"><a class="btn btn-default abc-ac-btn collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Teachers<i class="fa fa-plus"></i></a></h4>
					</div>
					<div class="panel-collapse collapse" id="collapseThree" role="tabpanel" aria-labelledby="headingThree">
						<div class="panel-body">
							<table class="table">
								<tr>
									<td>Total Teachers</td>
									<td><?php echo $total_teachers?></td>
								</tr>
								<tr>
									<td>&nbsp&nbsp- Graduated</td>
									<td><?php echo $graduate?></td>
								</tr>
								<tr class="chld">
									<td>&nbsp&nbsp- Post-Graduated</td>
									<td><?php echo $professional?></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Important Ratios -->
	<div class="listing-detail-section family sec0" id="listing-detail-section-important_ratios">
		<h2 class="page-header">Distributions</h2>
		<div class="row">
			<div class="col-md-4" id="TchStuRatioDiv">
				<canvas id="TchStuRatio"></canvas>
				<script>
					var TchStuRatioCtx = document.getElementById("TchStuRatio").getContext('2d');
					
					var TchStuRatioData = {
							type: 'doughnut',
							data: {
							datasets: [{
								data: [<?php echo $ratio_ts[0] ?>, <?php echo $ratio_ts[1] ?>],
								backgroundColor: [
								'rgba(75, 192, 192, 0.7)',
								'rgba(153, 102, 255, 0.7)'
						],
						}],
						labels: [
								'Teacher',
								'Student'
						]
					},
					options: {
						legend: {
								position: 'bottom',
								labels: {
								usePointStyle: true,
								fontSize: 11,
								//fontStyle: 'normal'
							}
						},
						title: {
							display: true,
							text: 'Student Teacher Ratio'
						},
						animation: {
							duration: 1200,
						}
					}
					};
					
					var TchStuRatioOnScrTimer = setInterval(function() {
						if(onScr(jQuery('#TchStuRatioDiv'))) {
							new Chart(TchStuRatioCtx, TchStuRatioData);
							clearInterval(TchStuRatioOnScrTimer);
						}
					},500);

				</script>
				<hr class="divider"/>
			</div>

			<div class="col-md-4" id="BGRatioDiv">
				<canvas id="BGRatio"></canvas>
				<script>
					var BGRatioCtx = document.getElementById("BGRatio").getContext('2d');
					
					var BGRatioData = {
							type: 'doughnut',
							data: {
							datasets: [{
									data: [<?php echo $ratio_bg[0]?>, <?php echo $ratio_bg[1]?>],
									backgroundColor: [
									'rgba(64, 129, 255, 0.7)',
									'rgba(255, 64, 129, 0.7)'
							],
							}],
							labels: [
									'Boys',
									'Girls'
							]
							},
							options: {
								legend: {
										position: 'bottom',
										labels: {
											usePointStyle: true,
											fontSize: 11,
											//fontStyle: 'normal' 
									}
								},
								title: {
									display: true,
									text: 'Boys to Girls Ratio'
								},
								animation: {
									duration: 1400,
								}
							}
						};
						
					var BGRatioOnScrTimer = setInterval(function() {
						if(onScr(jQuery('#BGRatioDiv'))) {
							new Chart(BGRatioCtx, BGRatioData);
							clearInterval(BGRatioOnScrTimer);
						}
					},500);		

				</script>
				<hr class="divider"/>
			</div>
			<div class="col-md-4" id="StuRatioDiv">
				<canvas id="StuRatio"></canvas>
				<script>
					var StuRatioCtx = document.getElementById("StuRatio").getContext('2d');
					
					var StuRatioData = {
							type: 'doughnut',
							data: {
							datasets: [{
									data: [<?php echo $primary_stu?>, <?php echo $sec_stu?>, <?php echo $hrsec_stu?>],
									backgroundColor: [
									'rgba(198,255,0,0.7)',
									'rgba(118,255,3,0.7)',
									'rgba(0,230,118,0.7)'
							],
							}],
							labels: [
									'Primary',
									'Secondary',
									'Hr. Secondary'
							]
							},
							options: {
								legend: {
									position: 'bottom',
									labels: {
										usePointStyle: true,
										fontSize: 10.5, 
									}
								},
								title: {
									display: true,
									text: 'Students Distribution'
								},
								animation: {
									duration: 1600,
								}
							}
						};

					var StuRatioOnScrTimer = setInterval(function() {
						if(onScr(jQuery('#StuRatioDiv'))) {
							new Chart(StuRatioCtx, StuRatioData);
							clearInterval(StuRatioOnScrTimer);
						}
					},500);

				</script>
			</div>
		</div>
	</div>
	<!-- Teachers Details -->
	<div class="listing-detail-section family sec0" id="listing-detail-section-teacher_details">
		<h2 class="page-header">Teacher's Details</h2>
		<div class="card-container">
			<div class="prev ctrls">
					<i class="fa fa-chevron-left" aria-hidden="true"></i></div>
			<div class="next ctrls">
					<i class="fa fa-chevron-right" aria-hidden="true"></i></div>
			<div class="cards">
				<?php if(is_array($tch_dtls)): ?>
					<?php foreach($tch_dtls as $t): ?>
						<span class="card">
							<span class="inf name"><strong><?php echo $t['tchname']?></strong></span>
							<hr class="tbrk" style="width: 7rem"/>
							<span class="inf">Subject : <strong><?php echo $t['main_taught1']?></strong></span>
							<!-- <span class="brk">Qualifications</span> -->
							<hr class="tbrk" />
							<span class="inf">Academic : <strong><?php echo $t['qual_acad']?></strong></span>
							<span class="inf">Professional : <strong><?php echo $t['qual_prof']?></strong></span>
							<!-- <span class="brk gnrl">General</span> -->
							<hr class="tbrk" />
							<span class="inf">Gender : <strong><?php echo $t['sex']?></strong></span>
							<span class="inf">Year of Joining : <strong><?php echo $t['yoj']?></strong></span>
							<span class="inf">Status : <strong><?php echo $t['post_status']?></strong></span>
						</span>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<!-- Student Results-->
	<div class="listing-detail-section family sec0" id="listing-detail-section-results">
		<h2 class="page-header" id="ResultDiv">Result</h2>
		<canvas id="Result"></canvas>
		<script>
			var ResultCtx = document.getElementById("Result").getContext('2d');
			Chart.defaults.global.defaultFontStyle = 'bold';
			var ResultData = {
					type: 'bar',
					data: {
					labels: ["Class 5th", "Class 8th", "Class 10th", "Class 12th"],
					datasets: [{
					label: 'Total Students',
					data: [<?php echo $result_primary[total_8] + $result_primary[total_9]?>, <?php echo $result_secondary[total_4] + $result_secondary[total_5]?>, <?php echo $result_secondary[total_8] + $result_secondary[total_9]?>, <?php echo $result_secondary[total_12] + $result_secondary[total_13]?>],
					backgroundColor: [
					'rgba(54, 162, 235, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					],
					borderColor: [
					'rgba(54, 162, 235, 1)',
					'rgba(54, 162, 235, 1)',
					'rgba(54, 162, 235, 1)',
					'rgba(54, 162, 235, 1)',
					],
					borderWidth: 1,
					},
					
					{
					label: 'Passed',
					data: [<?php echo $result_primary[total_8] + $result_primary[total_9] - $result_primary[fail_8] - $result_primary[fail_9]?>, <?php echo $result_secondary[total_4] + $result_secondary[total_5] - $result_secondary[fail_4] - $result_secondary[fail_5]?>, <?php echo $result_secondary[total_8] + $result_secondary[total_9] - $result_secondary[fail_8] - $result_secondary[fail_9]?>, <?php echo $result_secondary[total_12] + $result_secondary[total_13] - $result_secondary[fail_12] - $result_secondary[fail_13]?>],
					backgroundColor: [
					'rgba(75, 192, 192, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					],
					borderColor: [
					'rgba(75, 192, 192, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(75, 192, 192, 1)',
					],
					borderWidth: 1
					},
					
					{
					label: 'Fail',
					data: [<?php echo $result_primary[fail_8] + $result_primary[fail_9]?>, <?php echo $result_secondary[fail_4] + $result_secondary[fail_5]?>, <?php echo $result_secondary[fail_8] + $result_secondary[fail_9]?>, <?php echo $result_secondary[fail_12] + $result_secondary[fail_13]?>],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(255, 99, 132, 0.2)',
					'rgba(255, 99, 132, 0.2)',
					'rgba(255, 99, 132, 0.2)',
					],
					borderColor: [
					'rgba(255, 99, 132, 1)',
					'rgba(255, 99, 132, 1)',
					'rgba(255, 99, 132, 1)',
					'rgba(255, 99, 132, 1)',
					],
					borderWidth: 1
					}
					
					]
					},
					options: {
						scales: {
							yAxes: [{
								ticks: {
									fontStyle: 'bold',
									beginAtZero:true
								}
							}]
						},
						animation: {
							duration: 2500,
						}
					}
				};
			var ResultOnScrTimer = setInterval(function() {
						if(onScr(jQuery('#Result'))) {
							new Chart(ResultCtx, ResultData);
							clearInterval(ResultOnScrTimer);
						}
				},200);
			
		</script>
	</div>
	<!-- School Management Display-->
	<div class="listing-detail-section sec0" id="listing-detail-section-school_management">
		<h2 class="page-header">School Management</h2>
		<div class="listing-detail-contact smc">
			<div class="row">
				<div class="col-md-6">
					<ul>
						<li><strong class="key">Total Members</strong><span class="value"><?php echo $smc_members ?></span></li>
						<li><strong class="key">Parents Involved</strong><span class="value"><?php echo $smc_parents ?></span></li>
					</ul>
				</div>
				<div class="col-md-6">
					<ul>
						<li><strong class="key">Local Authorities</strong><span class="value"><?php echo $smc_local ?></span></li>
						<li><strong class="key">Meetings Conducted</strong><span class="value"><?php echo $meetings ?></span></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- 3rd Display -- Other Features-->
	<div class="listing-detail-section family sec0" id="listing-detail-section-facilities">
		<h2 class="page-header">Facilities</h2>
		<div class="row">
			<?php if($library=='Yes'): ?> 
				<div class="col-md-2 col-xs-6">
					<div class="fac">
						<svg class="icon">
							<?php echo '<use xlink:href="'.plugins_url( 'inventor-schools/').'assets/svg/icons.svg#icon-007"></use>'; ?>
						</svg><span class="ename">Library</span>
					</div>
				</div>
			<?php endif; ?>
			<?php if($labs=='Yes'): ?>
				<div class="col-md-2 col-xs-6">
					<div class="fac">
						<svg class="icon">
							<?php echo '<use xlink:href="'.plugins_url( 'inventor-schools/').'assets/svg/icons.svg#icon-108"></use>'; ?>
						</svg><span class="ename">Labs</span>
					</div>
				</div>
			<?php endif; ?>
			<?php if($computer_lab=='Yes'): ?>
				<div class="col-md-2 col-xs-6">
					<div class="fac">
						<svg class="icon">
							<?php echo '<use xlink:href="'.plugins_url( 'inventor-schools/').'assets/svg/icons.svg#icon-076"></use>'; ?>
						</svg><span class="ename">Computers</span>
					</div>
				</div>
			<?php endif; ?>
			<?php if($playground=='Yes'): ?>
				<div class="col-md-2 col-xs-6">
					<div class="fac">
						<svg class="icon">
							<?php echo '<use xlink:href="'.plugins_url( 'inventor-schools/').'assets/svg/icons.svg#icon-175"></use>'; ?>
						</svg><span class="ename">Playground</span>
					</div>
				</div>
			<?php endif; ?>
			<?php if($buses=='Yes'): ?>
				<div class="col-md-2 col-xs-6">
					<div class="fac">
						<svg class="icon">
							<?php echo '<use xlink:href="'.plugins_url( 'inventor-schools/').'assets/svg/icons.svg#icon-016"></use>'; ?>
						</svg><span class="ename">Buses</span>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<!-- 4th Display -- Contact-->
	<div class="listing-detail-section sec0" id="listing-detail-section-contact_us">
		<h2 class="page-header">Contact</h2>
		<div class="listing-detail-contact">
			<div class="row">
				<div class="col-md-6">
					<ul>
						<li><strong class="key">Person</strong><span class="value"><?php echo $cnt_person; ?></span></li>
					</ul>
					<ul>
						<li class="email"><strong class="key">E-mail</strong><span class="value"><a href="mailto:<?php echo $cnt_email; ?>"><?php echo $cnt_email; ?></a></span></li>
						<li class="website"><strong class="key">Website</strong><span class="value"><a href="<?php echo $cnt_website; ?>" target="_blank"><?php echo $cnt_website; ?></a></span></li>
						<li class="phone"><strong class="key">Phone</strong><span class="value"><a href="tel:<?php echo $cnt_phone; ?>"><?php echo $cnt_phone; ?> </a><?php if(!empty($cnt_phone2)) echo '<br />' ?><a href="tel:<?php echo $cnt_phone2; ?>"><?php echo $cnt_phone2; ?></a><?php if(!empty($cnt_phone3)) echo '<br />' ?><a href="tel:<?php echo $cnt_phone3; ?>"><?php echo $cnt_phone3; ?></a></span></li>
					</ul>
				</div>
				<div class="col-md-6">
					<ul>
						<li class="address"><strong class="key">Address</strong><span class="value"><?php echo $cnt_address; ?><?php if(!empty($cnt_address)) echo '<br />' ?><?php echo $cnt_locality; ?><?php if(!empty($cnt_locality)) echo '<br />' ?><?php echo $cnt_city; ?></span></li>
						<li><strong class="key">Pincode</strong><span class="value"><?php echo $cnt_pincode; ?></span></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
<?php endif; ?>
<?php do_action( 'inventor_after_listing_detail_school_aschool' ); ?>