<?php do_action( 'inventor_listing_detail_school_aschool' ); ?>
<!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"-->


<?php 
/**
  * Including asset dependencies
**/
 wp_enqueue_style( 'inventor-schools', plugin_dir_url( 'assets/style/frontend.css') );
 wp_enqueue_style( 'inventor-schools-w3', plugin_dir_url( 'assets/style/w3.css') );
// 1st display
 $code = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'schcode', true ); 
 $year = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'year',    true ); 
 $loc  = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'location',true );
 $gend = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'gender',  true ); 
 $type = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'type',    true ); 
 $mngt = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'mngt',    true ); 
 $bord = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'board',   true ); 
 $bord2 = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'board2', true ); 
 $lowclass  = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'lowclass' , true ); 
 $highclass = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'highclass', true ); 
 $md1 = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . 'med_instruc1' , true ); 
 $md2 = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . 'med_instruc2' , true ); 
 $md3 = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . 'med_instruc3' , true ); 
 $md4 = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . 'med_instruc4' , true ); 
 // 2nd display 
 $watertype = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'watertype',  true ); 
 $electric  = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'electricity',true );
 $medical   = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'medchk' ,    true ); 
 $midaymeal = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'midday' ,    true );
 $foodfrom  = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'notinschool',true ); 
 $kitchen   = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'inschool' ,  true ); 
 $mcooks    = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'cooks_m' ,   true );
 $fcooks    = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'cooks_f' ,   true ); 
 $benib     = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'benefit_b' , true ); 
 $benig     = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'benefit_g',  true ); 
 $cooks = $mcooks + $fcooks; $beni = $benig + $benib;
 $build     = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'building' ,  true ); 
 $clroom    = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'clrooms' ,  true ); 
 $rom_mj    = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'clrooms_major' ,  true ); 
 $rom_mn    = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'clrooms_minor' ,  true );
 $toil_b    = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'toilets_b' ,  true ); 
 $toil_g    = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'toilets_g' ,  true );
 $boundry   = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'boundary' ,  true );
 $playgr    = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'playgrnd' ,  true ); 
 $ramps     = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'ramps' ,  true );
 $repair = $rom_mj + $rom_mn; $toilets = $toil_b + $toil_g;
 $cce       = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'cce' ,  true ); 
 $rec_s     = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'record' ,  true ); 
 $rec_m     = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'records' ,  true ); 
 $library   = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'library' ,  true );
 $books     = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'books' ,  true ); 
 $record    = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'bookrec' ,  true );
 $complab   = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'complabs' ,  true );
 $nocomp    = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'comp' ,  true ); 
 //3rd Display
 $receipt1   = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'devr',  true ); 
 $receipt2   = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'mngtr',true );
 $receipt3   = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'tlmr' ,    true ); 
 $receipt4   = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'other_r' ,    true ); 
 $expendi1   = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'deve' ,    true );
 $expendi2   = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'mngte',true ); 
 $expendi3   = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'tlme' ,  true ); 
 $expendi4   = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'other_e' ,  true ); 
 $insp1      = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'blkoff' ,   true );
 $insp2      = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'clstrof' ,   true ); 
 $insp3      = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'commem' , true ); 
 $insp4      = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'supoffic',  true ); 
 $recipt = $receipt1 + $receipt2 + $receipt3 + $receipt4; 
 $expend = $expendi1 + $expendi2 + $expendi3 + $expendi4;
 $inpcto = $insp1 + $insp2;
 $inspot = $insp3 + $insp4;
 $smcdev    = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'devplan' ,  true ); 
 $mem_male  = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'mem_m' ,  true ); 
 $mem_fmale = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'mem_f' ,  true ); 
 $par_m     = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'pare_m' ,  true );
 $par_f     = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'pare_fe' ,  true ); 
 $local_m   = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'local_m' ,  true );
 $local_f   = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'local_f' ,  true );
 $meetng    = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'meet' ,  true ); 
 $mem =   $mem_male  + $mem_fmale; 
 $par =   $par_m  + $par_f;
 $local = $local_m + $local_f ; 
 $typetr    = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'train_type' ,  true );
 $enrolm    = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'enrol_b' ,  true ); 
 $enrolf    = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'enrol_g' ,  true ); 
 $trainm    = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'prov_b' ,  true ); 
 $trainf    = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'prov_g' ,  true ); 
 $placetr   = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'trainat' ,  true ); 
 $trainby   = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'sptrainby' ,  true ); 
 $enrol = $enrolm  + $enrolf;
 $train = $trainm + $trainf ;
 ?>

<!-- 1st Display Basic Details-->
<?php if ( ! empty( $code)): ?>

<div class="listing-detail-section family">
<h2 class="page-header"><?php echo __( 'Basic Details', 'inventor-schools' ); ?></h2>
  <div class="row tcenter">
    <div class="col-sm-1 col-lg-2">
	<i class="fa fa-mortar-board colorred size2"></i><br>
	<div class="size1">Established <br> in <?php echo $year?></div>
	</div>
	<div class="col-sm-1 col-lg-2">
	<i class="fa fa-location-arrow colorgreen size2"></i><br>
	<div class="size1">Location<br><?php echo $loc?></div>
	</div>
	<div class="col-sm-1 col-lg-2">
	<i class="fa fa-user-circle colorblue size2"></i><br>
	<div class="size1">Gender<br><?php echo $gend?></div>
	</div>
	<div class="col-sm-1 col-lg-2">
	<i class="fa fa-group coloryellow size2"></i><br>
	<div class="size1">Management<br><?php echo $mngt?></div>
	</div>
	<div class="col-sm-1 col-lg-2">
	<i class="fa fa-child colorpurple size2"></i><br>
	<div class="size1">From<br><?php echo $lowclass?></div>
	</div>
	<div class="col-sm-1 col-lg-2">
	<i class="fa fa-male colorbrown size2"></i><br>
	<div class="size1">To <br><?php echo $highclass?></div>
	</div>
    </div>
	<div class="row tcenter">
    <div class="col-sm-1 col-lg-2">
	<i class="fa fa-bank colorpurple size2"></i><br>
	<div class="size1">Type<br><?php echo $type?></div>
	</div>
	<div class="col-sm-1 col-lg-2">
	<i class="fa fa-book colorred size2"></i><br>
	<div class="size1"><?php echo $bord?><br>For 10th</div>
	</div>
	<div class="col-sm-1 col-lg-2">
	 <span class="glyphicon glyphicon-book coloryellow size2"></span><br>
	<div class="size1"><?php echo $bord2?><br>for 12th</div>
	</div>
	<div class="col-sm-1 col-lg-2">
	<i class="fa fa-edit colorbrown size2"></i><br>
	<div class="size1">Medium Of <br>Instruction 1<br><?php echo $md1?></div>
	</div>
	<div class="col-sm-1 col-lg-2">
	<i class="fa fa-pencil-square colorblue size2"></i><br>
	<div class="size1">Medium Of <br>Instruction 2<br><?php echo $md2?></div>
	</div>
	 <div class="col-sm-1 col-lg-2">
	<i class="fa fa-pencil colorgreen size2"></i><br>
	<div class="size1">Medium Of <br>Instruction 3<br><?php echo $md3?></div>
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
			  <div class="col-sm-1 col-lg-3 colorblue"> <?php echo $watertype?></div>
			</div>
			<div class="row">
              <div class="col-sm-1 col-lg-1">2.</div>
			  <div class="col-sm-6 col-lg-8  ">Electricity Available :</div>
			  <div class="col-sm-1 col-lg-2 colorblue"><?php echo $electric?></div>
			</div>
			<div class="row">
              <div class="col-sm-1 col-lg-1">3.</div>
			  <div class="col-sm-6 col-lg-8  ">Medical checkup  :</div>
			  <div class="col-sm-1 col-lg-2 colorblue"><?php echo $medical?></div>
			</div>
			<div class="row">
              <div class="col-sm-1 col-lg-1">4.</div>
			  <div class="col-sm-6 col-lg-8  ">Midday meal Available :</div>
			  <div class="col-sm-1 col-lg-2 colorblue"><?php echo $midaymeal?></div>
			</div><br>
			<div class="row" >
			<h4>
              <div class="col-sm-2 col-lg-3"> Food from: </div>
			  <div class="col-sm-2 col-lg-3 colorblue "><?php echo $foodfrom?></div>
			   <div class="col-sm-2 col-lg-2"> Kitchen: </div>
			  <div class="col-sm-2 col-lg-3 colorblue "><?php echo $kitchen?></div>
			 </h4>
			</div>
		   <div class="row">
		   <h4>
              <div class="col-sm-2 col-lg-3"> Cooks: </div>
			  <div class="col-sm-2 col-lg-3 colorblue "><?php echo $cooks?></div>
			   <div class="col-sm-2 col-lg-2">Students:</div>
			  <div class="col-sm-2 col-lg-2 colorblue "><?php echo $beni?></div>
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
			  <div class="col-sm-1 col-lg-3 colorblue"> <?php echo $build?></div>
			</div>
			<div class="row">
              <div class="col-sm-1 col-lg-1">2.</div>
			  <div class="col-sm-6 col-lg-7  ">No. of Classrooms :</div>
			  <div class="col-sm-1 col-lg-3 colorblue"><?php echo $clroom?></div>
			</div>
			<div class="row">
			<h4>
              <div class="col-sm-1 col-lg-1"></div>
			  <div class="col-sm-6 col-lg-7  ">Class-room requiring repair:</div>
			  <div class="col-sm-1 col-lg-3 colorblue"><?php echo $repair?></div>
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
			  <div class="col-sm-1 col-lg-3 colorblue padng"><?php echo $boundry ?></div>
			</div>
			<div class="row">
              <div class="col-sm-1 col-lg-1">5.</div>
			  <div class="col-sm-6 col-lg-7  ">Playground Available:</div>
			  <div class="col-sm-1 col-lg-3 colorblue"><?php echo $playgr?></div>
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
			  <div class="col-sm-1 col-lg-2 colorblue"> <?php echo $cce?></div>
			</div>
			<div class="row">
              <div class="col-sm-1 col-lg-1">2.</div>
			  <div class="col-sm-6 col-lg-8  ">Student Records Maintained:</div>
			  <div class="col-sm-1 col-lg-2 colorblue"><?php echo $rec_m?></div>
			</div>
			<div class="row">
			<h4>
              <div class="col-sm-1 col-lg-1"></div>
			  <div class="col-sm-6 col-lg-8  ">Records Shared with parents:</div>
			  <div class="col-sm-1 col-lg-2 colorblue"><?php echo $rec_s?></div>
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
			  <div class="col-sm-1 col-lg-2 colorblue"><?php echo $complab?></div>
			</div>
			<div class="row">
              <div class="col-sm-1 col-lg-1">5.</div>
			  <div class="col-sm-6 col-lg-8  ">No. of computers:</div>
			  <div class="col-sm-1 col-lg-2 colorblue"><?php echo $nocomp?></div>
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
	  <div class="col-sm-4 col-lg-6 size2"><?php echo $recipt?></div>
	  </div><br>
	  <div class="row">
	  <div class="col-sm-4 col-lg-6 size1">Total Grant Expenditure:</div>
	  <div class="col-sm-4 col-lg-6 size2"><?php echo $expend?></div>
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
	  <div class="col-sm-4 col-lg-6 size2"><?php echo $inpcto?></div>
	  </div><br>
	  <div class="row">
	  <div class="col-sm-4 col-lg-6 size1">Inspections By Others:</div>
	  <div class="col-sm-4 col-lg-6 size2"><?php echo $inspot?></div>
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
	  <div class="col-sm-2 col-lg-2 size1"><?php echo $smcdev?></div>
	  </div>
	  <div class="row">
      <div class="col-sm-6 col-lg-8 size1">2.Total Members:</div>
	  <div class="col-sm-2 col-lg-2 size1"><?php echo $mem?></div>
	  </div>
	  <div class="row">
      <div class="col-sm-6 col-lg-8 size1">3.Parents Members:</div>
	  <div class="col-sm-2 col-lg-2 size1"><?php echo $par?></div>
	  </div>
	  <div class="row">
	  <div class="col-sm-6 col-lg-8 size1">4.Local Authorities:</div>
	  <div class="col-sm-2 col-lg-2 size1"><?php echo $local?></div>
      </div>
	  <div class="row">
	  <div class="col-sm-6 col-lg-8 size1">5.SMCs Meetings in a year:</div>
	  <div class="col-sm-2 col-lg-2 size1"><?php echo $meetng?></div>
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
	  <div class="col-sm-3 col-lg-3 size1"><?php echo $enrol?></div>
	  </div>
	  <div class="row">
      <div class="col-sm-5 col-lg-7 size1">2.Children provided the training:</div>
	  <div class="col-sm-3 col-lg-3 size1 padng"><?php echo $train?></div>
	  </div>
	  <div class="row">
      <div class="col-sm-5 col-lg-7 size1">3.Type Of Training:</div>
	  <div class="col-sm-3 col-lg-3 size1 padng"><?php echo $typetr?></div>
	  </div>
	  <div class="row">
	  <div class="col-sm-5 col-lg-7 size1">4.Teachers alloted:</div>
	  <div class="col-sm-3 col-lg-3 size1 padng"><?php echo $trainby?></div>
      </div> 
	  <div class="row">
	  <div class="col-sm-5 col-lg-7 size1">5.Place of Training:</div>
	  <div class="col-sm-3 col-lg-3 size1 padng"><?php echo $placetr?></div>
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