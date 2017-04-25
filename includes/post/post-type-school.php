<?php

    if ( ! defined( 'ABSPATH' ) ) {exit;}
/**
 * Class Inventor_Schools_Post_Type_Schools
 * @package Inventor/Classes/Post_Types
 * @author Bhaargavi Agrawal
 */
    class Inventor_Schools_Post_Type_Schools 
  {
// functions to add metaboxes and fields 
      public static function init() 
       {        
         add_action( 'init', array( __CLASS__, 'definition' ), 11 );
         add_action( 'cmb2_init', array( __CLASS__, 'fields' ) );
         add_filter( 'inventor_shop_allowed_listing_post_types', array( __CLASS__, 'allowed_purchasing' ) );
         add_filter( 'inventor_claims_allowed_listing_post_types', array( __CLASS__, 'allowed_claiming' ) );
       }
// Allowing claiming and purchasing the last two functions
      public static function allowed_purchasing( $post_types ){
		  $post_types[] = 'school';      return $post_types;   }
      public static function allowed_claiming( $post_types ){
        $post_types[] = 'school'  ;   return $post_types;    }
// Defining a post school 
      public static function definition() 
	   {
          $labels = array(
            'name'                  => __( 'Schools', 'inventor-schools' ),
            'singular_name'         => __( 'School', 'inventor-schools' ),
            'add_new'               => __( 'Add New School', 'inventor-schools' ),
            'add_new_item'          => __( 'Add New School', 'inventor-schools' ),
            'edit_item'             => __( 'Edit School', 'inventor-schools' ),
            'new_item'              => __( 'New School', 'inventor-schools' ),
            'all_items'             => __( 'Schools', 'inventor-schools' ),
            'view_item'             => __( 'View Schools', 'inventor-schools' ),
            'search_items'          => __( 'Search Schools', 'inventor-schools' ),
            'not_found'             => __( 'No Schools found', 'inventor-schools' ),
            'not_found_in_trash'    => __( 'No Schools Found in Trash', 'inventor-schools' ),
            'parent_item_colon'     => '',
            'menu_name'             => __( 'Schools', 'inventor-schools' ),
            'icon'                  => apply_filters( 'inventor_listing_type_icon', 'inventor-poi-single-house', 'school' )
              );
          register_post_type( 'school', array(
            'labels'            => $labels,
            'show_in_menu'	    => 'listings',
            'supports'          => array( 'title', 'editor', 'thumbnail', 'comments', 'author' ),
            'has_archive'       => true,
            'rewrite'           => array( 'slug' => _x( 'schools', 'URL slug', 'inventor-schools' ) ),
            'public'            => true,
            'show_ui'           => true,
            'show_in_rest'      => true,
            'categories'        => array(),
         ));
		  add_action( 'after_setup_theme', 'inventor_listing_types_support' );
		  function inventor_listing_types_support() {add_theme_support( 'inventor-listing-types', array('school',) );}
        }
// Defining metaboxes and fields 		
      public static function fields()
	  {
        $post_type = 'school';
		if ( ! is_admin() ) 
		{ Inventor_Post_Types::add_metabox( $post_type, array( 'general' ) ); }

// 1st Metabox -- Basic Details
         $metabox_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'Basic Details';
         $details = new_cmb2_box( array(
            'id'            => $metabox_id,
            'title'         => __( 'Basic Details', 'inventor-schools' ),
            'object_types'  => array( $post_type ),
            'context'       => 'normal',
            'priority'      => 'high',
            'show_in_rest'  => true,
           ) );
	     $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'schcode';
       	 if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
		  {  $details->add_field( array(
                'name'       => __( 'School Code', 'inventor-schools' ),
                'id'         => $field_id,
                'type'       => 'text_small',
                'attributes' => array(
                        'type'    => 'number', 'pattern' => '\d*')
				 ) ); }
         $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'year';
         if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) )
		  {  $details->add_field( array(
                'name'       => __( 'Year of Establishment', 'inventor-schools' ),
                'id'         => $field_id,
                'type'       => 'text_small',
                'attributes' => array(
                        'type'    => 'number',   'pattern'  => '\d*', 'min'      => 1800,       'max'      => 2017)
				 ) );  }
         $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'month';
         if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
		  {  $details->add_field( array(
                'name'       => __( 'Academic Month', 'inventor-schools' ),
			    'desc'       => 'Select the Month in which the school starts',
                'id'         => $field_id,
                'type'       => 'select',
			    'show_option_none' => false,
	            'default'    => 'custom', 
		        'options'    => array (
				   'custom' => __( 'January', 'cmb2' ), 'feb' => __( 'February', 'cmb2' ),  'march' => __('March', 'cmb2'),
				   'april'  => __('April', 'cmb2'),     'may' => __('May', 'cmb2'),         'june'  => __('June', 'cmb2'),
				   'july'   => __('July', 'cmb2'),      'aug' => __('August', 'cmb2'),      'sept'  => __('September', 'cmb2'),
				   'octbr'  => __('October', 'cmb2'),   'nov' => __('Novmeber', 'cmb2'),    'dec'   => __('December', 'cmb2') )   
				   )); }
         $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'location';
         if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) )
		  { $details->add_field( array(
                'name'            => __( 'Location of the school', 'inventor-schools' ),
                'description'     => __( 'Select the location rural/urban', 'inventor-schools' ),
                 'id'             => $field_id,
                'type'            => 'radio_inline',
		        'show_option_none'  => false,
		        'options'         => array (
                     'Rural' => __('Rural', 'cmb2'),'Urban'  => __('Urban', 'cmb2')  )   
					 )); }
	     $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'gender';
         if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
		   {  $details->add_field( array(
                'name'              => __( 'Gender', 'inventor-schools' ),
                'description'       => __( 'Select the organisation of school', 'inventor-schools' ),
                'id'                => $field_id,
                'type'              => 'radio_inline',
				'show_option_none'  => false,
		        'options'           => array (
                     'Girls Only'   => __('Only for Girls', 'cmb2'), 'Boys Only'     => __('Only for Boys', 'cmb2'),
					 'Co-Ed'     => __('Co-education', 'cmb2')  )       
					 ));  }
	     $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'type';
         if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) )
		   {  $details->add_field( array(
                'name'              => __( 'School type', 'inventor-schools' ),
				'description'       => __( 'Select the type of school', 'inventor-schools' ),
                'id'                => $field_id,
                'type'              => 'radio_inline',
				'show_option_none'  => false,
		        'options'           => array (
                     'Non-Residential'     => __('Non Residential', 'cmb2'),
                     'Residential(Ashram)'   => __('Residential -> Ashram', 'cmb2'),
					 'Residential(Non-Ashram)'   => __('Residential -> Non-Ashram(Govt)', 'cmb2'),
					 'Residential(KGBV)'     => __('Residential -> KGBV', 'cmb2'),
					 'Residential(Model)'    => __('Residential -> Model School', 'cmb2'),
					 'Residential(No-type)'      => __('Residential -> No Type', 'cmb2'),
					 'Not-Applicable'    => __('Not Applicable', 'cmb2')   )    
					 ));   }
	     $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'mngt';
         if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
			 {  $details->add_field( array(
                'name'              => __( 'School Management', 'inventor-schools' ),
				'description'       => __( 'Select the school management', 'inventor-schools' ),
                'id'                => $field_id,
                 'type'              => 'radio_inline',
				'show_option_none'  => false,
	            'options' => array(
 'Dept-of-Education'  => 'Dept. of Education', 'Tribal/Social Welfare' =>   'Tribal/Social Welfare Dept.',
 'Local body'         => 'Local body',         'PVT Aided'             =>   'Private Aided',
 'PVT Unaided'        => 'Private Unaided',    'Central Govt'          =>   'Central Government',
 'Madarsa Recognised' => 'Madarsa Recognised', 'Madarsa Unrecognised'  =>   'Madarsa Unrecognised',
 'Unrecodnised' => 'Unrecognised',       'Other'     =>   'Other',) 
				     ));  }
	     $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'board';
         if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
             {  $details->add_field( array(
                'name'              => __( 'School Board for classes 9-10', 'inventor-schools' ),
                'id'                => $field_id,
                'type'              => 'select',
			    'show_option_none' => false,
	            'default'          => 'custom', 
		        'options'           => array (
				       'CBSE'   => __( 'CBSE', 'cmb2' ),  'Icse'     => __('ICSE', 'cmb2'),
					   'State'    => __('State', 'cmb2'),   'International'    => __('International', 'cmb2'),
					   'Other'     => __('Other', 'cmb2')  )
                      ));   }
	     $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'board2';
         if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) {
            $details->add_field( array(
                'name'              => __( 'School Board for classes 11-12', 'inventor-schools' ),
                'id'                => $field_id,
                'type'              => 'select',
			    'show_option_none' => false,
	            'default'          => 'custom', 
		        'options'           => array (
				       'CBSE'   => __( 'CBSE', 'cmb2' ),  'Icse'     => __('ICSE', 'cmb2'),
					   'State'    => __('State', 'cmb2'),   'International'    => __('International', 'cmb2'),
					   'Other'     => __('Other', 'cmb2')  )
                      ) );   }	
// End of the first metabox 
// 2nd metabox -- About the school 
         $metabox_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'About';
         $details = new_cmb2_box( array(
            'id'            => $metabox_id,
            'title'         => __( 'About the school', 'inventor-schools' ),
            'object_types'  => array( $post_type ),
            'context'       => 'normal',
            'priority'      => 'high',
            'show_in_rest'  => true,
           ) );
         $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'ppsections';
       	 if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
		  {  $details->add_field( array(
                'name'       => __( 'Pre Primary Sections Available', 'inventor-schools' ),
                'id'         => $field_id,
                'type'              => 'radio_inline',
				'show_option_none'  => false,
		        'options'           => array (
                     'custom'   => __('Yes', 'cmb2'), 'no'  => __('No', 'cmb2'), )
				 ) ); }
		 $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'lowclass';
       	 if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
		  {  $details->add_field( array(
                'name'       => __( 'Lowest Class', 'inventor-schools' ),
                'id'         => $field_id,
                'type'              => 'radio_inline',
				'show_option_none'  => false,
		        'options'           => array (
                     '1st'   => __('1st', 'cmb2'),    '2nd'  => __('2nd', 'cmb2'), 
					 '3rd'   => __('3rd', 'cmb2'),   '4th'   => __('4th', 'cmb2'),
					 '5th'   => __('5th', 'cmb2'),  '6th'    => __('6th', 'cmb2'),
					 '7th'   => __('7th', 'cmb2'),  '8th'    => __('8th', 'cmb2'),
					 '9th'   => __('9th', 'cmb2'),  '11th'   => __('11th', 'cmb2'),
					 )
				 ) ); }
  		 $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'highclass';
       	 if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
		  {  $details->add_field( array(
                'name'       => __( 'Highest Class', 'inventor-schools' ),
                'id'         => $field_id,
                'type'              => 'radio_inline',
				'show_option_none'  => false,
		        'options'           => array (
				      '1st'   => __('1st', 'cmb2'),   '2nd'  => __('2nd', 'cmb2'), 
					  '3rd'   => __('3rd', 'cmb2'),   '4th'  => __('4th', 'cmb2'),
					  '5th'   => __('5th', 'cmb2'),   '6th'  => __('6th', 'cmb2'),
					  '7th'   => __('7th', 'cmb2'),   '8th'  => __('8th', 'cmb2'),
					  '10th'  => __('10th', 'cmb2'),  '12th' => __('12th', 'cmb2'), )
				 ) ); }  
// Adding predefined metaboxes 3rd, 4th, 5th , 6th ,7th (metabox number)
 Inventor_Post_Types::add_metabox( 'school', array( 'branding', 'location', 'gallery','video', 'contact') );
// Altering metabox location (3rd metabox)
	$pin_metabox = CMB2_Boxes::get( INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'location' );
         $pin_metabox->add_field( array(
            'id'         => INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'pin',
            'name'       => __( 'Pincode of the area','inventor-schools'),
            'type'       => 'text',
			'attributes' => array('type' => 'number'  , 'pattern' => '\d*',),
         ) ); 
		  $pin_metabox->add_field( array(
            'id'         => INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'dis1',
            'name'       => __( 'Distance from the block','inventor-schools'),
			'description'=> 'Distance of the school from the nearest block in kms',
            'type'       => 'text'
         ) ); 
		  $pin_metabox->add_field( array(
            'id'         => INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'dis2',
            'name'       => __( 'Distance from the cluster','inventor-schools'),
			'description'=> 'Distance of the school from the nearest cluster in kms',
            'type'       => 'text'
         ) ); 
		  $pin_metabox->add_field( array(
            'id'         => INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'road',
            'name'       => __( 'Approachable By Road','inventor-schools'),
            'type'       => 'radio_inline',
			'options'           => array (
			'yes' => __('Yes' , 'cmb2'), 'no' => __('No' , 'cmb2'))   
			) );
// 8th metabox -- Basic Facilites 
         $metabox_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'Basic Facilities';
         $details = new_cmb2_box( array(
            'id'            => $metabox_id,
            'title'         => __( 'Basic Facilities', 'inventor-schools' ),
            'object_types'  => array( $post_type ),
            'context'       => 'normal',
            'priority'      => 'high',
            'show_in_rest'  => true,
           ) );
// Fields for 8th metabox 
	     $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'water';
       	  if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
		  {  $details->add_field( array(
                'name'       => __( 'Drinking water available', 'inventor-schools' ),
                'id'         => $field_id,
                'type'              => 'radio_inline',
				'show_option_none'  => false,
		        'options'           => array (
                     'custom'   => __('Yes', 'cmb2'), 'no'  => __('No', 'cmb2'), )
				 ) ); }
		  $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'watertype';
		  if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
		  {  $details->add_field( array(
                'name'       => __( 'Source of drinking water', 'inventor-schools' ),
                'id'         => $field_id,
                'type'       => 'select',
			    'show_option_none' => false,
	            'default'    => 'custom', 
		        'options'    => array (
			'Handpump' => __( 'Handpump', 'cmb2' ), 'Tap'   => __( 'Tap Water', 'cmb2' ),  
		    'Well'     => __('From Well', 'cmb2'),  'Other' => __('Other', 'cmb2'),    
		    'None'     => __('None', 'cmb2') )   
				   )); }
          $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'electricity';
       	  if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
		  {  $details->add_field( array(
                'name'       => __( 'Electricity Available', 'inventor-schools' ),
                'id'         => $field_id,
                'type'              => 'radio_inline',
				'show_option_none'  => false,
		        'options'           => array (
                     'Yes'   => __('Yes', 'cmb2'), 'No'  => __('No', 'cmb2'), )
				 ) ); }
		  $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'medchk';
		  if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
		  {  $details->add_field( array(
                'name'       => __( 'Medical Checkup', 'inventor-schools' ),
				'description' => 'Medical checkup done previous year or not',
                'id'         => $field_id,
                'type'              => 'radio_inline',
				'show_option_none'  => false,
		        'options'           => array (
                     'Yes'   => __('Yes', 'cmb2'), 'No'  => __('No', 'cmb2'), )
				 ) ); }
		  $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'midday';
		  if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
		  {  $details->add_field( array(
                'name'       => __( 'Mid day meal Provided', 'inventor-schools' ),
                'id'         => $field_id,
                'type'              => 'radio_inline',
				'show_option_none'  => false,
		        'options'           => array (
                     'Yes'   => __('Yes', 'cmb2'), 'No'  => __('No', 'cmb2'), )
				 ) ); }
         $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'notinschool';
         if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
		  {  $details->add_field( array(
                'name'       => __( 'Food brought from', 'inventor-schools' ),
			    'desc'       => 'If food is not prepared in the school, then the food is brought from',
                'id'         => $field_id,
                'type'       => 'select',
			    'show_option_none' => true,
	            'default'    => 'custom', 
		        'options'    => array (
				'Nearby School'    => __( 'From nearby school', 'cmb2' ), 'NGO'      => __( 'NGO', 'cmb2' ), 'panch'  => __('Gram Panchayat', 'cmb2'),
				'Self help group'  => __('Self help group', 'cmb2'),     'PTA/ MTA'  => __('PTA/ MTA', 'cmb2'),       
				'Central Kitchen'  => __('Central Kitchen', 'cmb2'),     'others'    => __('Others', 'cmb2') )   
				   )); }
		 $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'inschool';
         if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
		  {  $details->add_field( array(
                'name'       => __( 'Status of kitchen', 'inventor-schools' ),
			    'desc'       => 'If food is prepared in the school then status of kitchen',
                'id'         => $field_id,
                'type'       => 'select',
			    'show_option_none' => false,
	            'default'    => 'custom', 
		        'options'    => array (
	    'Available'           => __( 'Available', 'cmb2' ),         'NA'                  => __( 'Not available', 'cmb2' ), 
		'Under Construction'  => __('Under Construction', 'cmb2'),  'Class as a kitchen'  => __('Class used as a kitchen', 'cmb2') )   
				   )); }         
	     $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'cooks_m';
         if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) )
		  {  $details->add_field( array(
                'name'       => __( 'Male Cooks', 'inventor-schools' ),
                'id'         => $field_id,
                'type'       => 'text_small',
                'attributes' => array(
                        'type' => 'number',   'pattern' => '\d*', 'min' => 0)
            ) );  }
	     $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'cooks_f';
        if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) )
		  {  $details->add_field( array(
                'name'       => __( 'Female Cooks', 'inventor-schools' ),
                'id'         => $field_id,
                'type'       => 'text_small',
                'attributes' => array(
                        'type'    => 'number',   'pattern'  => '\d*', 'min'      => 0)
            ) );  }
		 $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'benefit_b';
        if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) )
		  {  $details->add_field( array(
                'name'       => __( 'Benefitted Boys', 'inventor-schools' ),
                'description' => 'No of boys who opted for mid day meal in previous academic year',
				'id'         => $field_id,
                'type'       => 'text_small',
                'attributes' => array(
                        'type'    => 'number',   'pattern'  => '\d*', 'min'      => 0)
            ) );  }
				     $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'benefit_g';
        if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) )
		  {  $details->add_field( array(
                'name'       => __( 'Benefitted Girls', 'inventor-schools' ),
                'description' => 'No of girls who opted for mid day meal in previous academic year',               
			   'id'         => $field_id,
                'type'       => 'text_small',
                'attributes' => array(
                        'type'    => 'number',   'pattern'  => '\d*', 'min'      => 0)
            ) );  }
	     $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'dayswithoutfood';
        if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) )
		  {  $details->add_field( array(
                'name'       => __( 'Number of days without meal', 'inventor-schools' ),
                'id'         => $field_id,
                'type'       => 'text_small',
                'attributes' => array(
                        'type'    => 'number',   'pattern'  => '\d*', 'min'      => 0)
            ) );  }
	     $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'mealserv';
        if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) )
		  {  $details->add_field( array(
                'name'       => __( 'Meals served', 'inventor-schools' ),
				'description'=> 'No. of meals served during the previous year',
                'id'         => $field_id,
                'type'       => 'text_small',
                'attributes' => array(
                        'type'    => 'number',   'pattern'  => '\d*', 'min'      => 0)
            ) );  }
// 9th Metabox  -- Infrastructure
$metabox_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'Infrastructure';
         $details = new_cmb2_box( array(
            'id'            => $metabox_id,
            'title'         => __( 'Infrastructure', 'inventor-schools' ),
            'object_types'  => array( $post_type ),
            'context'       => 'normal',
            'priority'      => 'high',
            'show_in_rest'  => true,
           ) );
// Fields for 9th metabox 
		 $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'building';
         if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
		  {  $details->add_field( array(
                'name'       => __( 'Status of building', 'inventor-schools' ),
                'id'         => $field_id,
                'type'       => 'select',
			    'show_option_none' => false,
	            'default'    => 'custom', 
		        'options'    => array (
				   'Private'  => __( 'Private', 'cmb2' ),  'Rented'     => __( 'Rented', 'cmb2' ), 
				   'Govt.'    => __('Government','cmb2'),  'Govt but rented'    => __( 'Government but rented', 'cmb2' ),
				   'Delapidated'    => __('Delapidated','cmb2'),'Under Construction'   => __( 'Under Construction', 'cmb2' ) )
		  ));   }	   
		  $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'shift';
		  if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
		  {  $details->add_field( array(
                'name'       => __( 'School building a shift school', 'inventor-schools' ),
                'id'         => $field_id,
                'type'              => 'radio_inline',
				'show_option_none'  => false,
		        'options'           => array (
                     'custom'   => __('Yes', 'cmb2'), 'no'  => __('No', 'cmb2'), )
				 ) ); }
         $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'clrooms';
         if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) )
		  {  $details->add_field( array(
                'name'       => __( 'No. of Class-rooms', 'inventor-schools' ),
                'id'         => $field_id,
                'type'       => 'text_small',
                'attributes' => array(
                        'type'    => 'number',   'pattern'  => '\d*', 'min'      => 0,  )
				 ) );  }
		 $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'clroomspucca';
         if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) )
		  {  $details->add_field( array(
                'name'       => __( 'No. of Pucca Class-rooms', 'inventor-schools' ),
                'id'         => $field_id,
                'type'       => 'text_small',
                'attributes' => array(
                        'type'    => 'number',   'pattern'  => '\d*', 'min'      => 0,  )
				 ) );  }
		  $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'clrooms_major';
         if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) )
		  {  $details->add_field( array(
                'name'       => __( 'Major repair', 'inventor-schools' ),
				'description'=> 'Classrooms requiring major repair',
                'id'         => $field_id,
                'type'       => 'text_small',
                'attributes' => array(
                        'type'    => 'number',   'pattern'  => '\d*', 'min'      => 0,  )
				 ) );  }
		 $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'clrooms_minor';
         if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) )
		  {  $details->add_field( array(
                'name'       => __( 'Minor repair', 'inventor-schools' ),
				'description'=> 'Classrooms requiring minor repair',
                'id'         => $field_id,
                'type'       => 'text_small',
                'attributes' => array(
                        'type'    => 'number',   'pattern'  => '\d*', 'min'      => 0,  )
				 ) );  }
		  $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'toilets_b';
         if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) )
		  {  $details->add_field( array(
                'name'       => __( 'No. of Toilets for Boys', 'inventor-schools' ),
                'id'         => $field_id,
                'type'       => 'text_small',
                'attributes' => array(
                        'type'    => 'number',   'pattern'  => '\d*', 'min'      => 0,  )
				 ) );  }
		$field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'toilets_g';
         if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) )
		  {  $details->add_field( array(
                'name'       => __( 'No. of Toilets for girls', 'inventor-schools' ),
                'id'         => $field_id,
                'type'       => 'text_small',
                'attributes' => array(
                        'type'    => 'number',   'pattern'  => '\d*', 'min'      => 0,  )
				 ) );  }
		 $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'boundary';
         if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
		  {  $details->add_field( array(
                'name'       => __( 'Type of Boundary wall ', 'inventor-schools' ),
                'id'         => $field_id,
                'type'       => 'select',
			    'show_option_none' => true,
	            'default'    => 'custom', 
		        'options'    => array (
				   'Pucca'  => __( 'Pucca', 'cmb2' ),             'Pucca but broken'     => __( 'Pucca but broken', 'cmb2' ), 
				   'Barbed wire'    => __('Barbed wire fencing','cmb2'),  'Hedges'    => __( 'Hedges', 'cmb2' ),               'NA'   => __( 'Not Applicable', 'cmb2' ),
				   'Partial'   => __('Partial','cmb2'),              'Under Construction'   => __( 'Under Construction', 'cmb2' ), 'other'   => __( 'Others', 'cmb2' ),)
		  ));   }
		$field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'playgrnd';
		  if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
		  {  $details->add_field( array(
                'name'       => __( 'Playground Available', 'inventor-schools' ),
                'id'         => $field_id,
                'type'              => 'radio_inline',
				'show_option_none'  => false,
		        'options'           => array (
                     'Yes'   => __('Yes', 'cmb2'), 'No'  => __('No', 'cmb2'), )
				 ) ); }
		 $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'ramps';
		  if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
		  {  $details->add_field( array(
                'name'       => __( 'Ramps Available', 'inventor-schools' ),
                'id'         => $field_id,
                'type'              => 'radio_inline',
				'show_option_none'  => false,
		        'options'           => array (
                     'Yes'   => __('Yes', 'cmb2'), 'No'  => __('No', 'cmb2'), )
				 ) ); }
		$field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'complabs';
		  if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
		  {  $details->add_field( array(
                'name'       => __( 'Computer lab Available', 'inventor-schools' ),
                'id'         => $field_id,
                'type'              => 'radio_inline',
				'show_option_none'  => false,
		        'options'           => array (
                     'Yes'   => __('Yes', 'cmb2'), 'No'  => __('No', 'cmb2'), )
				 ) ); }
	    $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'comp';
         if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) )
		  {  $details->add_field( array(
                'name'       => __( 'No. of Computers', 'inventor-schools' ),
                'id'         => $field_id,
                'type'       => 'text_small',
                'attributes' => array(
                        'type'    => 'number',   'pattern'  => '\d*', 'min'      => 0,  )
				 ) );  }
// 10th metabox -- Curriculum 
$metabox_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'Curriculum';
         $details = new_cmb2_box( array(
            'id'            => $metabox_id,
            'title'         => __( 'Curriculum', 'inventor-schools' ),
            'object_types'  => array( $post_type ),
            'context'       => 'normal',
            'priority'      => 'high',
            'show_in_rest'  => true,
           ) );
          $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'cce';
		  if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
		  {  $details->add_field( array(
                'name'       => __( 'CCE System Implemented', 'inventor-schools' ),
                'id'         => $field_id,
                'type'              => 'radio_inline',
				'show_option_none'  => false,
		        'options'           => array (
                     'Yes'   => __('Yes', 'cmb2'), 'No'  => __('No', 'cmb2'), )
				 ) ); }
		   $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'record';
		  if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
		  {  $details->add_field( array(
                'name'       => __( 'Pupils records maintained', 'inventor-schools' ),
                'id'         => $field_id,
                'type'              => 'radio_inline',
				'show_option_none'  => false,
		        'options'           => array (
                     'Yes'   => __('Yes', 'cmb2'), 'No'  => __('No', 'cmb2'), )
				 ) ); }
		  $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'records';
		  if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
		  {  $details->add_field( array(
                'name'       => __( 'Pupils records shared with parents', 'inventor-schools' ),
                'id'         => $field_id,
                'type'              => 'radio_inline',
				'show_option_none'  => false,
		        'options'           => array (
                     'Yes'   => __('Yes', 'cmb2'), 'No'  => __('No', 'cmb2'), )
				 ) ); }
		  $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'library';
		  if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
		  {  $details->add_field( array(
                'name'       => __( 'Library Available', 'inventor-schools' ),
                'id'         => $field_id,
                'type'              => 'radio_inline',
				'show_option_none'  => false,
		        'options'           => array (
                     'Yes'   => __('Yes', 'cmb2'), 'No'  => __('No', 'cmb2'), )
				 ) ); }
	     $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'books';
       	 if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
		  {  $details->add_field( array(
                'name'       => __( 'No. of books in library', 'inventor-schools' ),
                'id'         => $field_id,
                'type'       => 'text_small',
                'attributes' => array(
                        'type'    => 'number', 'pattern' => '\d*','min'      => 0, ) 
				 ) ); }
		$field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'bookrec';
		  if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
		  {  $details->add_field( array(
                'name'       => __( 'Text-books record maintained', 'inventor-schools' ),
                'id'         => $field_id,
                'type'              => 'radio_inline',
				'show_option_none'  => false,
		        'options'           => array (
                     'Yes'   => __('Yes', 'cmb2'), 'No'  => __('No', 'cmb2'), )
				 ) ); }

		 $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'recievedmoth';
       	 if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
		  {  $details->add_field( array(
                'name'       => __( 'Text book received month', 'inventor-schools' ),
				'description'=> 'In which month was the text book received (write the month number)',
                'id'         => $field_id,
                'type'       => 'text_small',
                'attributes' => array(
                        'type'    => 'number', 'pattern' => '\d*', 'min'  => 0,)
				 ) ); }
		 $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'library_year';
		  if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
		  {  $details->add_field( array(
                'name'       => __( 'Text book received which year (last time)', 'inventor-schools' ),
                'id'         => $field_id,
                'type'              => 'radio_inline',
				'show_option_none'  => false,
		        'options'           => array (
                     'custom'   => __('2014', 'cmb2'), '15'  => __('2015', 'cmb2'), 'other'  => __('other', 'cmb2')  )
				 ) ); }
// 11th Metabox -- Fundings and Inspections
      $metabox_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'fund';
      $details = new_cmb2_box( array(
            'id'            => $metabox_id,
            'title'         => __( 'Fundings & Grants', 'inventor-schools' ),
            'object_types'  => array( $post_type ),
            'context'       => 'normal',
            'priority'      => 'high',
            'show_in_rest'  => true,
           ) );
	 $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'devr';
     if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) )
		  {  $details->add_field( array(
                'name'       => __( 'Grant Receipt for development', 'inventor-schools' ),
				'description'=> 'Amount of school development grant receipt',
                'id'         => $field_id,
                'type'       => 'text_small',
                'attributes' => array(
                        'type'    => 'number',   'pattern'  => '\d*', 'min'      => 0,  )
				 ) );  }  
	 $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'deve';
     if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) )
		  {  $details->add_field( array(
                'name'       => __( 'Grant Expenditure for development', 'inventor-schools' ),
				'description'=> 'Amount of school development grant expenditure',
                'id'         => $field_id,
                'type'       => 'text_small',
                'attributes' => array(
                        'type'    => 'number',   'pattern'  => '\d*', 'min'      => 0,  )
				 ) );  }  
 	 $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'mngtr';
     if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) )
		  {  $details->add_field( array(
                'name'       => __( 'Grant Receipt for management', 'inventor-schools' ),
				'description'=> 'Amount of school management grant receipt',
                'id'         => $field_id,
                'type'       => 'text_small',
                'attributes' => array(
                        'type'    => 'number',   'pattern'  => '\d*', 'min'      => 0,  )
				 ) );  }  
	 $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'mngte';
     if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) )
		  {  $details->add_field( array(
                'name'       => __( 'Grant Expenditure for management', 'inventor-schools' ),
				'description'=> 'Amount of school management grant expenditure',
                'id'         => $field_id,
                'type'       => 'text_small',
                'attributes' => array(
                        'type'    => 'number',   'pattern'  => '\d*', 'min'      => 0,  )
				 ) );  }  
	 $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'tlmr';
     if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) )
		  {  $details->add_field( array(
                'name'       => __( 'Grant Receipt for teachers', 'inventor-schools' ),
				'description'=> 'Amount of teacher learning material grant receipt',
                'id'         => $field_id,
                'type'       => 'text_small',
                'attributes' => array(
                        'type'    => 'number',   'pattern'  => '\d*', 'min'      => 0,  )
				 ) );  }  
	 $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'tlme';
     if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) )
		  {  $details->add_field( array(
                'name'       => __( 'Grant Expenditure for teachers', 'inventor-schools' ),
				'description'=> 'Amount of teacher learning material grant expenditure',
                'id'         => $field_id,
                'type'       => 'text_small',
                'attributes' => array(
                        'type'    => 'number',   'pattern'  => '\d*', 'min'      => 0,  )
				 ) );  }  
		 $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'other_r';
        if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) )
		  {  $details->add_field( array(
                'name'       => __( 'Other Sources Receipt', 'inventor-schools' ),
				'description'=> 'Funds from other sources Receipts',
                'id'         => $field_id,
                'type'       => 'text_small',
                'attributes' => array(
                        'type'    => 'number',   'pattern'  => '\d*', 'min'      => 0,  )
				 ) );  }  
	     $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'other_e';
         if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) )
		  {  $details->add_field( array(
                'name'       => __( 'Other Sources Expenditure', 'inventor-schools' ),
				'description'=> 'Funds from other sources Expenditure',
                'id'         => $field_id,
                'type'       => 'text_small',
                'attributes' => array(
                        'type'    => 'number',   'pattern'  => '\d*', 'min'      => 0,  )
				 ) );  }  
// 12th Metabox -- Inspections 
     $metabox_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'insp';
      $details = new_cmb2_box( array(
            'id'            => $metabox_id,
            'title'         => __( 'Inspections', 'inventor-schools' ),
            'object_types'  => array( $post_type ),
            'context'       => 'normal',
            'priority'      => 'high',
            'show_in_rest'  => true,
           ) );
	 $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'no.insp';
     if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) )
		  {  $details->add_field( array(
                'name'       => __( 'Number of Inspections', 'inventor-schools' ),
				'description'=> 'The total number of Inspections',
                'id'         => $field_id,
                'type'       => 'text_small',
                'attributes' => array(
                        'type'    => 'number',   'pattern'  => '\d*', 'min'      => 0,  )
				 ) );  }  
	 $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'blkoff';
     if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) )
		  {  $details->add_field( array(
                'name'       => __( 'By Block Resource Center Officer', 'inventor-schools' ),
				'description'=> 'Number of visits by block resource center officer',
                'id'         => $field_id,
                'type'       => 'text_small',
                'attributes' => array(
                        'type'    => 'number',   'pattern'  => '\d*', 'min'      => 0,  )
				 ) );  }  
 	 $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'clstrof';
     if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) )
		  {  $details->add_field( array(
                'name'       => __( 'By Cluster Resource Center Officer', 'inventor-schools' ),
				'description'=> 'Number of visits by cluster resource center officer',
                'id'         => $field_id,
                'type'       => 'text_small',
                'attributes' => array(
                        'type'    => 'number',   'pattern'  => '\d*', 'min'      => 0,  )
				 ) );  }  
	 $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'commem';
     if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) )
		  {  $details->add_field( array(
                'name'       => __( 'By Community Members', 'inventor-schools' ),
				'description'=> 'No. of inspections by community members previous academic year',
                'id'         => $field_id,
                'type'       => 'text_small',
                'attributes' => array(
                        'type'    => 'number',   'pattern'  => '\d*', 'min'      => 0,  )
				 ) );  }  
	 $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'supoffic';
     if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) )
		  {  $details->add_field( array(
                'name'       => __( 'By Supervisory Officials', 'inventor-schools' ),
				'description'=> 'No. of inspections by supervisory officia previous academic year',
                'id'         => $field_id,
                'type'       => 'text_small',
                'attributes' => array(
                        'type'    => 'number',   'pattern'  => '\d*', 'min'      => 0,  )
				 ) );  }  			
// 13th Metabox School Management Committees 
      $metabox_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'committee';
      $details = new_cmb2_box( array(
            'id'            => $metabox_id,
            'title'         => __( 'School Management Committee', 'inventor-schools' ),
            'object_types'  => array( $post_type ),
            'context'       => 'normal',
            'priority'      => 'high',
            'show_in_rest'  => true,
           ) );
	     $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'schmngtcom';
       	 if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
		  {  $details->add_field( array(
                'name'       => __( 'School Management Committee Present', 'inventor-schools' ),
                'id'         => $field_id,
                'type'              => 'radio_inline',
				'show_option_none'  => false,
		        'options'           => array (
                     'custom'   => __('Yes', 'cmb2'), 'no'  => __('No', 'cmb2'), )
				 ) ); }
         $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'devplan';
       	 if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
		  {  $details->add_field( array(
                'name'       => __( 'Whether SMC prepare Development Plan', 'inventor-schools' ),
                'id'         => $field_id,
                'type'              => 'radio_inline',
				'show_option_none'  => false,
		        'options'           => array (
                     'Yes'   => __('Yes', 'cmb2'), 'No'  => __('No', 'cmb2'), )
				 ) ); }
	     $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'mem_m';
         if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) )
		  {  $details->add_field( array(
                'name'       => __( 'Total male members present', 'inventor-schools' ),
                'id'         => $field_id,
                'type'       => 'text_small',
                'attributes' => array(
                        'type'    => 'number',   'pattern'  => '\d*', 'min' => 0,  )
				 ) );  } 
	     $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'mem_f';
         if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) )
		  {  $details->add_field( array(
                'name'       => __( 'Total female members present', 'inventor-schools' ),
                'id'         => $field_id,
                'type'       => 'text_small',
                'attributes' => array(
                        'type'    => 'number',   'pattern'  => '\d*', 'min' => 0,  )
				 ) );  } 
	     $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'pare_m';
         if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) )
		  {  $details->add_field( array(
                'name'       => __( 'No. of Parents/Guardians-- Males', 'inventor-schools' ),
                'id'         => $field_id,
                'type'       => 'text_small',
                'attributes' => array(
                        'type'    => 'number',   'pattern'  => '\d*', 'min' => 0,  )
				 ) );  }  
	     $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'pare_fe';
         if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) )
		  {  $details->add_field( array(
                'name'       => __( 'No. of Parents/Guardians-- Females', 'inventor-schools' ),
                'id'         => $field_id,
                'type'       => 'text_small',
                'attributes' => array(
                        'type'    => 'number',   'pattern'  => '\d*', 'min'  => 0,  )
				 ) );  }  
	     $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'local_m';
         if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) )
		  {  $details->add_field( array(
                'name'       => __( 'No. of local authorities -- Male', 'inventor-schools' ),
                'id'         => $field_id,
                'type'       => 'text_small',
                'attributes' => array(
                        'type'    => 'number',   'pattern'  => '\d*', 'min'      => 0,  )
				 ) );  }  
	     $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'local_f';
         if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) )
		  {  $details->add_field( array(
                'name'       => __( 'No. of local authorities -- Female', 'inventor-schools' ),
                'id'         => $field_id,
                'type'       => 'text_small',
                'attributes' => array(
                        'type'    => 'number',   'pattern'  => '\d*', 'min'  => 0,  )
				 ) );  }  
	     $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'meet';
         if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) )
		  {  $details->add_field( array(
                'name'       => __( 'No. of meetings previous year', 'inventor-schools' ),
                'id'         => $field_id,
                'type'       => 'text_small',
                'attributes' => array(
                        'type'    => 'number',   'pattern'  => '\d*', 'min'      => 0,  )
				 ) );  }  		
// 14th Metabox	-- Special Training Schools 
         $metabox_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'special';
         $details = new_cmb2_box( array(
            'id'            => $metabox_id,
            'title'         => __( 'Special  Trainings ', 'inventor-schools' ),
            'object_types'  => array( $post_type ),
            'context'       => 'normal',
            'priority'      => 'high',
            'show_in_rest'  => true,
           ) );	
	     $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'specialtr';
       	  if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
		  {  $details->add_field( array(
                'name'       => __( 'Special Training Provided', 'inventor-schools' ),
                'id'         => $field_id,
                'type'              => 'radio_inline',
				'show_option_none'  => false,
		        'options'           => array (
                     'Yes'   => __('Yes', 'cmb2'), 'No'  => __('No', 'cmb2'), )
				 ) ); }
	     $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'sp_material';
       	  if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
		  {  $details->add_field( array(
                'name'       => __( 'Material Provided for Special Training', 'inventor-schools' ),
                'id'         => $field_id,
                'type'              => 'radio_inline',
				'show_option_none'  => false,
		        'options'           => array (
                     'custom'   => __('Yes', 'cmb2'), 'no'  => __('No', 'cmb2'), )
				 ) ); }
  	 $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'enrol_b';
     if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) )
		  {  $details->add_field( array(
                'name'       => __( 'Enrolled Boys', 'inventor-schools' ),
				'description'=> 'No. of enrolled boys before 30th September',
                'id'         => $field_id,
                'type'       => 'text_small',
                'attributes' => array(
                        'type'    => 'number',   'pattern'  => '\d*', 'min'  => 0,  )
				 ) );  }  
	 $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'enrol_g';
     if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) )
		  {  $details->add_field( array(
                'name'       => __( 'Enrolled Girls', 'inventor-schools' ),
				'description'=> 'No. of enrolled girls before 30th September',
                'id'         => $field_id,
                'type'       => 'text_small',
                'attributes' => array(
                        'type'    => 'number',   'pattern'  => '\d*', 'min'  => 0,  )
				 ) );  }  
	 $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'prov_b';
     if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) )
		  {  $details->add_field( array(
                'name'       => __( 'Provided Training -- Boys', 'inventor-schools' ),
				'description'=> 'No. of boys provided training upto 30th September',
                'id'         => $field_id,
                'type'       => 'text_small',
                'attributes' => array(
                        'type'    => 'number',   'pattern'  => '\d*', 'min'      => 0,  )
				 ) );  }  
	 $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'prov_g';
     if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) )
		  {  $details->add_field( array(
                'name'       => __( 'Provided Training -- Girls', 'inventor-schools' ),
				'description'=> 'No. of girls provided training upto 30th September',
                'id'         => $field_id,
                'type'       => 'text_small',
                'attributes' => array(
                        'type'    => 'number',   'pattern'  => '\d*', 'min'      => 0,  )
				 ) );  }  
  	 $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'enrol_bprev';
     if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) )
		  {  $details->add_field( array(
                'name'       => __( 'Enrolled Boys previous year', 'inventor-schools' ),
				'description'=> 'No. of enrolled boys before 30th September previous year',
                'id'         => $field_id,
                'type'       => 'text_small',
                'attributes' => array(
                        'type'    => 'number',   'pattern'  => '\d*', 'min'  => 0,  )
				 ) );  }  
	 $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'enrol_gprev';
     if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) )
		  {  $details->add_field( array(
                'name'       => __( 'Enrolled Girls previous year', 'inventor-schools' ),
				'description'=> 'No. of enrolled girls before 30th September previous year',
                'id'         => $field_id,
                'type'       => 'text_small',
                'attributes' => array(
                        'type'    => 'number',   'pattern'  => '\d*', 'min'  => 0,  )
				 ) );  }  
	 $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'prov_bprev';
     if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) )
		  {  $details->add_field( array(
                'name'       => __( 'Provided Training -- Boys previous year', 'inventor-schools' ),
				'description'=> 'No. of boys provided training upto 30th September previous year',
                'id'         => $field_id,
                'type'       => 'text_small',
                'attributes' => array(
                        'type'    => 'number',   'pattern'  => '\d*', 'min'      => 0,  )
				 ) );  }  
	 $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'prov_gprev';
     if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) )
		  {  $details->add_field( array(
                'name'       => __( 'Provided Training -- Girls previous year', 'inventor-schools' ),
				'description'=> 'No. of girls provided training upto 30th September previous year',
                'id'         => $field_id,
                'type'       => 'text_small',
                'attributes' => array(
                        'type'    => 'number',   'pattern'  => '\d*', 'min'      => 0,  )
				 ) );  }
	 
	 $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'teacherno.';
     if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) )
		  {  $details->add_field( array(
                'name'       => __( 'No. of teachers', 'inventor-schools' ),
				'description'=> 'No. of teachers there to provide training',
                'id'         => $field_id,
                'type'       => 'text_small',
                'attributes' => array(
                        'type'    => 'number',   'pattern'  => '\d*', 'min'      => 0,  )
				 ) );  }  
	     $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'sptrainby';
         if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
             {  $details->add_field( array(
                'name'              => __( 'Training Provided By', 'inventor-schools' ),
                'id'                => $field_id,
                'type'              => 'select',
			    'show_option_none' => true,
	            'default'          => 'custom', 
		        'options'           => array (
				       'School '   => __( 'school teachers', 'cmb2' ),  'Special'  => __('Special Engaged Teachers', 'cmb2'),
					   'School & Special'    => __('Both', 'cmb2'),   'NGO'    => __('NGO', 'cmb2'),
					   'Others'     => __('Others', 'cmb2')  )
                      ));   }
         $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'train_type';
         if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) )
		  { $details->add_field( array(
                'name'            => __( 'Type of Special Training', 'inventor-schools' ),
                'description'     => __( 'Select the location rural/urban', 'inventor-schools' ),
                 'id'             => $field_id,
                'type'            => 'radio_inline',
		        'show_option_none'  => false,
		        'options'         => array (
                     'Residential' => __('Residential', 'cmb2'),'Non-Residential'  => __('Non-Residential', 'cmb2'), 
                     'All types'   => __('Both', 'cmb2'),       'Others'  => __('Others', 'cmb2')  )   
					 )); }	
         $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'trainat';
         if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) )
		  { $details->add_field( array(
                'name'            => __( 'Place of the Training', 'inventor-schools' ),
                'description'     => __( 'Select the location rural/urban', 'inventor-schools' ),
                 'id'             => $field_id,
                'type'            => 'radio_inline',
		        'show_option_none'  => true,
		        'options'         => array (
                    'School Premises' => __('School Premises', 'cmb2'),'Outside School'  => __('Outside the school premises', 'cmb2'), 
                     'In & Out of school'   => __('Both', 'cmb2'),           'Not Applicable'   => __('Not Applicable', 'cmb2')  )      
					 )); }
// 15th metabox -- Teachers 
        $metabox_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'Teachers';
        $details = new_cmb2_box( array(
            'id'            => $metabox_id,
            'title'         => __( 'Teachers', 'inventor-schools' ),
            'object_types'  => array( $post_type ),
            'context'       => 'normal',
            'priority'      => 'high',
            'show_in_rest'  => true,
           ) );
	     $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'tec_m';
         if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) )
		  {  $details->add_field( array(
                'name'       => __( 'No. of Male teachers in all', 'inventor-schools' ),
                'id'         => $field_id,
                'type'       => 'text_small',
                'attributes' => array(
                        'type'    => 'number',   'pattern'  => '\d*', 'min'      => 0,  )
				 ) );  }  
		 $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'tec_f';
         if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) )
		  {  $details->add_field( array(
                'name'       => __( 'No. of Female teachers in all', 'inventor-schools' ),
                'id'         => $field_id,
                'type'       => 'text_small',
                'attributes' => array(
                        'type'    => 'number',   'pattern'  => '\d*', 'min'      => 0,  )
				 ) );  }  
		  $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'tech_notr.';
          if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) )
		  {  $details->add_field( array(
                'name'       => __( 'No. of teachers not registered', 'inventor-schools' ),
                'id'         => $field_id,
                'type'       => 'text_small',
                'attributes' => array(
                        'type'    => 'number',   'pattern'  => '\d*', 'min'      => 0,  )
				 ) );  }  
		  $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'graduate';
     if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) )
		  {  $details->add_field( array(
                'name'       => __( 'No. of teachers who are graduate', 'inventor-schools' ),
                'id'         => $field_id,
                'type'       => 'text_small',
                'attributes' => array(
                        'type'    => 'number',   'pattern'  => '\d*', 'min'      => 0,  )
				 ) );  }  
			 $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'professional';
             if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) )
		  {  $details->add_field( array(
                'name'       => __( 'No. of teachers with professional qualifications', 'inventor-schools' ),
                'id'         => $field_id,
                'type'       => 'text_small',
                'attributes' => array(
                        'type'    => 'number',   'pattern'  => '\d*', 'min'      => 0,  )
				 ) );  }  
			 $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'daysinv';
             if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) )
		     {  $details->add_field( array(
                'name'       => __( 'Days to Non-Teaching Assignments', 'inventor-schools' ),
				'description'=> 'No. of working days spent to non-teaching assignments',
                'id'         => $field_id,
                'type'       => 'text_small',
                'attributes' => array(
                        'type'    => 'number',   'pattern'  => '\d*', 'min'      => 0,  )
				 ) );  }  
			 $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'teac_noteach';
             if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) )
		     {  $details->add_field( array(
                'name'       => __( 'Teachers Non-teaching assignments', 'inventor-schools' ),
				'description'=> 'No. of teachers involved in non-teaching assignments',
                'id'         => $field_id,
                'type'       => 'text_small',
                'attributes' => array(
                        'type'    => 'number',   'pattern'  => '\d*', 'min'      => 0,  )
				 ) );  }  
			 $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'ppteacherno.';
             if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) )
		     {  $details->add_field( array(
                'name'       => __( 'No. of Pre Primary Teachers', 'inventor-schools' ),
                'id'         => $field_id,
                'type'       => 'text_small',
                'attributes' => array(
                        'type'    => 'number',   'pattern'  => '\d*', 'min'      => 0,  )
				 ) );  }
		  $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'headteacher';
		  if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
		  {  $details->add_field( array(
                'name'       => __( 'Number of Head Teacher present', 'inventor-schools' ),
                 'id'         => $field_id,
                'type'       => 'text_small',
                'attributes' => array(
                        'type'    => 'number',   'pattern'  => '\d*',  'min'      => 0,  )
				 ) ); }
		  $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'roomhead';
		  if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
		  {  $details->add_field( array(
                'name'       => __( 'Separate room for head teacher', 'inventor-schools' ),
                'id'         => $field_id,
                'type'              => 'radio_inline',
				'show_option_none'  => false,
		        'options'           => array (
                     'custom'   => __('Yes', 'cmb2'), 'no'  => __('No', 'cmb2'), )
				 ) ); }	
	     $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'headname';
       	 if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
		  {  $details->add_field( array(
                'name'       => __( 'Name of Head Teacher', 'inventor-schools' ),
                'id'         => $field_id,
                'type'       => 'text',
				 ) ); }
           				 
// 16th Metabox  working time-- new field type				 
		$metabox_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'work_time';
        $details = new_cmb2_box( array(
            'id'            => $metabox_id,
            'title'         => __( 'Working time', 'inventor-schools' ),
            'object_types'  => array( $post_type ),
            'context'       => 'normal',
            'priority'      => 'high',
            'show_in_rest'  => true,
           ) );
		$field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'work_hours';
		if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
		  {  $details->add_field( array(
                'name'              => __( '', 'inventor-schools' ),
                'id'                => $field_id,
                'type'              => 'workhours',
               ) ); }	
// 17th Metabox -- Students 
 		$metabox_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'stud_1';
        $details = new_cmb2_box( array(
            'id'            => $metabox_id,
            'title'         => __( 'Students-- Primary', 'inventor-schools' ),
            'object_types'  => array( $post_type ),
            'context'       => 'normal',
            'priority'      => 'high',
            'show_in_rest'  => true,
           ) );
		$field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'students1';
		if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
		  {  $details->add_field( array(
                'name'              => __( '', 'inventor-schools' ),
                'id'                => $field_id,
                'type'              => 'student1',
               ) ); }
// 18th Metabox -- Students
 		$metabox_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'stud_2';
        $details = new_cmb2_box( array(
            'id'            => $metabox_id,
            'title'         => __( 'Students-- Secondary', 'inventor-schools' ),
            'object_types'  => array( $post_type ),
            'context'       => 'normal',
            'priority'      => 'high',
            'show_in_rest'  => true,
           ) );
	    $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'students2';
		if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
		  {  $details->add_field( array(
                'name'              => __( '', 'inventor-schools' ),
                'id'                => $field_id,
                'type'              => 'student2',
               ) ); }
// 19th Metabox -- Results
		$metabox_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'results';
        $details = new_cmb2_box( array(
            'id'            => $metabox_id,
            'title'         => __( 'Results-- Primary', 'inventor-schools' ),
            'object_types'  => array( $post_type ),
            'context'       => 'normal',
            'priority'      => 'high',
            'show_in_rest'  => true,
           ) );
		$field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'res1';
		if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
		  {  $details->add_field( array(
                'name'              => __( '', 'inventor-schools' ),
                'id'                => $field_id,
                'type'              => 'result1',
               ) ); }
// 20th Metabox -- Result2
 		$metabox_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'res_2';
        $details = new_cmb2_box( array(
            'id'            => $metabox_id,
            'title'         => __( 'Results-- Secondary', 'inventor-schools' ),
            'object_types'  => array( $post_type ),
            'context'       => 'normal',
            'priority'      => 'high',
            'show_in_rest'  => true,
           ) );
	    $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'res2';
		if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
		  {  $details->add_field( array(
                'name'              => __( '', 'inventor-schools' ),
                'id'                => $field_id,
                'type'              => 'result2',
               ) ); }
	
		}
	} 
Inventor_Schools_Post_Type_Schools::init();