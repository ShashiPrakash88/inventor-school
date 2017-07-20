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
         add_action( 'after_setup_theme', array( __CLASS__,'inventor_listing_types_support') );
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
            'rewrite'           => array( 'slug' => __( 'schools', 'URL slug', 'inventor-schools' ) ),
            'public'            => true,
            'show_ui'           => true,
            'show_in_rest'      => true,
            'categories'        => array(),
         ));
        }
        
        function inventor_listing_types_support() 
        {
            add_theme_support( 'inventor-listing-types', array(
              'business',
              'car',
              'coupon',
              'dating',
              'education',
              'event',
              'food',
              'hotel',
              'job',
              'pet',
              'property',
              'resume',
              'shopping',
              'travel',
              'school'
            )  );
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
            'closed'        => true
           ) );
	     $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'schcode';
       	 if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
		  {  $details->add_field( array(
                'name'       => __( 'School Code', 'inventor-schools' ),
                'id'         => $field_id,
                'type'       => 'text',
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
	            'default'    => 'January', 
		        'options'    => array (
				   'January' => __( 'January', 'cmb2' ), 'February' => __( 'February', 'cmb2' ),  'march' => __('March', 'cmb2'),
				   'April'  => __('April', 'cmb2'),      'May' => __('May', 'cmb2'),         'june'  => __('June', 'cmb2'),
				   'July'   => __('July', 'cmb2'),       'August' => __('August', 'cmb2'),      'sept'  => __('September', 'cmb2'),
				   'October'  => __('October', 'cmb2'),  'November' => __('November', 'cmb2'),    'dec'   => __('December', 'cmb2') )   
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
                     'Girls'   => __('Girls', 'cmb2'),
                     'Boys'     => __('Boys', 'cmb2'),
					 'Co-educational'     => __('Co-Educational', 'cmb2')  )       
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
                     'Ashram(Government)'                         => __('Ashram(Government)', 'cmb2'),
                     'Non-Ashram(Government)'                     => __('Non-Ashram(Government)', 'cmb2'),
					 'Private'                                    => __('Private', 'cmb2'),
					 'Others'                                     => __('Others', 'cmb2'),
					 'Not Applicable'                             => __('Not Applicable', 'cmb2'),
					 'Kasturba Gandhi Balika Vidhyalaya(KGBV)'    => __('Kasturba Gandhi Balika Vidhyalaya(KGBV)', 'cmb2'),
					 'Model School'                               => __('Model School', 'cmb2')   )    
					 ));   }
	     $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'mngt';
         if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
			 {  $details->add_field( array(
                'name'              => __( 'School Management', 'inventor-schools' ),
				'description'       => __( 'Select the school management', 'inventor-schools' ),
                'id'                => $field_id,
                'type'              => 'select',
                'default'           => 'Department of Education',
				'show_option_none'  => false,
	            'options' => array(
                    'Department of Education'           => 'Department of Education',
                    'Tribal/Social Welfare Department'  => 'Tribal/Social Welfare Department',
                    'Local Body'                        => 'Local Body',         
                    'Private Aided'                     => 'Private Aided',
                    'Private Unaided'                   => 'Private Unaided',    
                    'Central Government'                => 'Central Government',
                    'Madarsa Recognised'                => 'Madarsa Recognised', 
                    'Madarsa Unrecognised'              => 'Madarsa Unrecognised',
                    'Unrecognised'                      => 'Unrecognised',             
                    'Others'                            => 'Others',) 
				     ));  }


        $schcat_array=array(
            'Primary only(1-5)'                                                     => __( 'Primary only(1-5)', 'cmb2' ),
            'Primary with Upper Primary(1-8)'                                       => __( 'Primary with Upper Primary(1-8)', 'cmb2' ),
            'Primary with upper primary and secondary and higher secondary(1-12)'   => __( 'Primary with upper primary and secondary and higher secondary(1-12)', 'cmb2' ),
            'Upper Primary only(6-8)'                                               => __( 'Upper Primary only(6-8)', 'cmb2' ),
            'Upper Primary with secondary and higher secondary(6-12)'               => __( 'Upper Primary with secondary and higher secondary(6-12)', 'cmb2' ),
            'Primary with upper primary and secondary(1-10)'                        => __( 'Primary with upper primary and secondary(1-10)', 'cmb2' ),
            'Upper Primary with secondary(6-10)'                                    => __( 'Upper Primary with secondary(6-10)', 'cmb2' ),
            'Secondary only(9 & 10)'                                                => __( 'Secondary only(9 & 10)', 'cmb2' ),
            'Secondary with Hr. Secondary(9-12)'                                    => __( 'Secondary with Hr. Secondary(9-12)', 'cmb2' ),
            'Hr. Secondary only/Jr. College(11 & 12)'                               => __( 'Hr. Secondary only/Jr. College(11 & 12)', 'cmb2' ), 
        );

        $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'schcat';
         if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
		  {  $details->add_field( array(
                'name'       => __( 'School Category', 'inventor-schools' ),
			    'desc'       => 'Select the school category',
                'id'         => $field_id,
                'type'       => 'select',
			    'show_option_none' => false,
	            'default'    => 'Primary only(1-5)', 
		        'options'    => $schcat_array
                )); }

	     $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'board';
         if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
             {  $details->add_field( array(
                'name'              => __( 'School Board for classes 9-10', 'inventor-schools' ),
                'id'                => $field_id,
                'type'              => 'select',
			    'show_option_none' => false,
	            'default'          => 'CBSE', 
		        'options'           => array (
				       'CBSE'   => __( 'CBSE', 'cmb2' ),  
                       'ICSE'     => __('ICSE', 'cmb2'),
					   'State Board'    => __('State Board', 'cmb2'),   
                       'International Board'    => __('International Board', 'cmb2'),
					   'Others'     => __('Others', 'cmb2')  )
                      ));   }
	     $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'board2';
         if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) {
            $details->add_field( array(
                'name'              => __( 'School Board for classes 11-12', 'inventor-schools' ),
                'id'                => $field_id,
                'type'              => 'select',
			    'show_option_none' => false,
	            'default'          => 'CBSE', 
		        'options'           => array (
				       'CBSE'   => __( 'CBSE', 'cmb2' ),  
                       'ICSE'     => __('ICSE', 'cmb2'),
					   'State Board'    => __('State Board', 'cmb2'),   
                       'International Board'    => __('International Board', 'cmb2'),
					   'Others'     => __('Others', 'cmb2')  )
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
            'closed'        => true
           ) );
         $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'ppsections';
       	 if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
		  {  $details->add_field( array(
                'name'       => __( 'Pre Primary Sections Available', 'inventor-schools' ),
                'id'         => $field_id,
                'type'              => 'radio_inline',
				'show_option_none'  => false,
		        'options'           => array (
                     'Yes'   => __('Yes', 'cmb2'), 'No'  => __('No', 'cmb2'), )
				 ) ); }
        $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'ppstudent';
       	 if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
		  {  $details->add_field( array(
                'name'       => __( 'No. of Pre-primary students', 'inventor-schools' ),
                'id'         => $field_id,
                'type'       => 'text_small',
                'attributes' => array(
                        'type' => 'number',   'pattern' => '\d*', 'min' => 0)
				 ) ); }

		 $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'lowclass';
       	 if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
		  {  $details->add_field( array(
                'name'       => __( 'Lowest Class', 'inventor-schools' ),
                'id'         => $field_id,
                'type'              => 'radio_inline',
				'show_option_none'  => false,
		        'options'           => array (
                     '1'   => __('1st', 'cmb2'),    '2'  => __('2nd', 'cmb2'), 
					 '3'   => __('3rd', 'cmb2'),    '4'   => __('4th', 'cmb2'),
					 '5'   => __('5th', 'cmb2'),    '6'    => __('6th', 'cmb2'),
					 '7'   => __('7th', 'cmb2'),    '8'    => __('8th', 'cmb2'),
					 '9'   => __('9th', 'cmb2'),    '11'   => __('11th', 'cmb2'),
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
				      '1'   => __('1st', 'cmb2'),   '2'  => __('2nd', 'cmb2'), 
					  '3'   => __('3rd', 'cmb2'),   '4'  => __('4th', 'cmb2'),
					  '5'   => __('5th', 'cmb2'),   '6'  => __('6th', 'cmb2'),
					  '7'   => __('7th', 'cmb2'),   '8'  => __('8th', 'cmb2'),
					  '10'  => __('10th', 'cmb2'),  '12' => __('12th', 'cmb2'), )
				 ) ); }  
        //medium of instructions
        
        $med_ins_array = array(
            'Assamese'      =>__('Assamese','cmb2'),
            'Bengali'       =>__('Bengali','cmb2'),
            'Gujarati'      =>__('Gujarati','cmb2'),
            'Hindi'         =>__('Hindi','cmb2'),
            'Kannad'        =>__('Kannad','cmb2'),
            'Kashmiri'      =>__('Kashmiri','cmb2'),
            'Konkani'       =>__('Konkani','cmb2'),
            'Malayalam'     =>__('Malayalam','cmb2'),
            'Manipuri'      =>__('Manipuri','cmb2'),
            'Marathi'       =>__('Marathi','cmb2'),
            'Nepali'        =>__('Nepali','cmb2'),
            'Odia'          =>__('Odia','cmb2'),
            'Punjabi'       =>__('Punjabi','cmb2'),
            'Sanskrit'      =>__('Sanskrit','cmb2'),
            'Sindhi'        =>__('Sindhi','cmb2'),
            'Tamil'         =>__('Tamil','cmb2'),
            'Telugu'        =>__('Telugu','cmb2'),
            'Urdu'          =>__('Urdu','cmb2'),
            'English'       =>__('English','cmb2'),
            'Bodo'          =>__('Bodo','cmb2'),
            'Mising'        =>__('Mising','cmb2'),
            'Dogri'         =>__('Dogri','cmb2'),
            'Khasi'         =>__('Khasi','cmb2'),
            'Garo'          =>__('Garo','cmb2'),
            'Mizo'          =>__('Mizo','cmb2'),
            'Bhutia'        =>__('Bhutia','cmb2'),
            'Lepcha'        =>__('Lepcha','cmb2'),
            'Limboo'        =>__('Limboo','cmb2'),
            'French '       =>__('French ','cmb2'),
            'Other'         =>__('Other','cmb2')
        );

        $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'med_instruc1';
         if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
		  {  $details->add_field( array(
                'name'       => __( 'Medium of Intruction 1', 'inventor-schools' ),
			    'desc'       => 'Primary language in which children are taught',
                'id'         => $field_id,
                'type'       => 'select',
			    'show_option_none' => false,
	            'default'    => 'English', 
		        'options'    => $med_ins_array   
				   )); }
        $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'med_instruc2';
         if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
		  {  $details->add_field( array(
                'name'       => __( 'Medium of Intruction 2', 'inventor-schools' ),
			    'desc'       => 'Secondary language in which children are taught',
                'id'         => $field_id,
                'type'       => 'select',
			    'show_option_none' => false,
	            'default'    => 'English', 
		        'options'    => $med_ins_array   
				   )); }
        $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'med_instruc3';
         if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
		  {  $details->add_field( array(
                'name'       => __( 'Medium of Intruction 3', 'inventor-schools' ),
			    'desc'       => '3rd language in which children are taught',
                'id'         => $field_id,
                'type'       => 'select',
			    'show_option_none' => false,
	            'default'    => 'English', 
		        'options'    => $med_ins_array   
				   )); }
        $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'med_instruc4';
         if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
		  {  $details->add_field( array(
                'name'       => __( 'Medium of Intruction 4', 'inventor-schools' ),
			    'desc'       => '4th language in which children are taught',
                'id'         => $field_id,
                'type'       => 'select',
			    'show_option_none' => false,
	            'default'    => 'English', 
		        'options'    => $med_ins_array   
				   )); }
// Adding predefined metaboxes 3rd, 4th, 5th , 6th ,7th (metabox number)
 Inventor_Post_Types::add_metabox( 'school', array( 'branding', 'location', 'gallery','video', 'contact','opening_hours','banner') );
// Altering metabox location (3rd metabox)
	$pin_metabox = CMB2_Boxes::get( INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'location' );
         $pin_metabox->add_field( array(
            'id'         => INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'pin',
            'name'       => __( 'Pincode of the area','inventor-schools'),
            'type'       => 'text_small',
			'attributes' => array('type' => 'number'  , 'pattern' => '\d*',),
         ) ); 
		  $pin_metabox->add_field( array(
            'id'         => INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'dis1',
            'name'       => __( 'Distance from the block','inventor-schools'),
			'description'=> 'Distance of the school from the nearest block in kms',
            'type'       => 'text_small',
            'attributes' => array('type' => 'number'  , 'pattern' => '\d*',),
         ) ); 
		  $pin_metabox->add_field( array(
            'id'         => INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'dis2',
            'name'       => __( 'Distance from the cluster','inventor-schools'),
			'description'=> 'Distance of the school from the nearest cluster in kms',
            'type'       => 'text_small',
            'attributes' => array('type' => 'number'  , 'pattern' => '\d*',),
         ) ); 
		  $pin_metabox->add_field( array(
            'id'         => INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'road',
            'name'       => __( 'Approachable By Road','inventor-schools'),
            'type'       => 'radio_inline',
			'options'           => array (
			'Yes' => __('Yes' , 'cmb2'), 'No' => __('No' , 'cmb2'))   
			) );

// Altering metabox contact
	$adrs_metabox = CMB2_Boxes::get( INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'contact' );
         $adrs_metabox->add_field( array(
            'id'         => INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'distname',
            'name'       => __( 'District Name','inventor-schools'),
            'type'       => 'text_medium',
         ) ); 
		  $adrs_metabox->add_field( array(
            'id'         => INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'block',
            'name'       => __( 'Block Name','inventor-schools'),
            'type'       => 'text_medium'
         ) ); 
		  $adrs_metabox->add_field( array(
            'id'         => INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'cluster',
            'name'       => __( 'Cluster Name','inventor-schools'),
            'type'       => 'text_medium'
         ) ); 
		  $adrs_metabox->add_field( array(
            'id'         => INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'village',
            'name'       => __( 'Village Name','inventor-schools'),
            'type'       => 'text_medium'
         ) );
         $adrs_metabox->add_field( array(
            'id'         => INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'state',
            'name'       => __( 'State Name','inventor-schools'),
            'type'       => 'text_medium'
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
            'closed'        => true
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
                     'Yes'   => __('Yes', 'cmb2'), 'No'  => __('No', 'cmb2'), )
				 ) ); }
		  $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'watertype';
		  if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
		  {  $details->add_field( array(
                'name'       => __( 'Source of drinking water', 'inventor-schools' ),
                'id'         => $field_id,
                'type'       => 'select',
			    'show_option_none' => false,
	            'default'    => 'Tap Water', 
		        'options'    => array (
			'Hand Pumps' => __( 'Hand Pumps', 'cmb2' ), 'Tap Water'   => __( 'Tap Water', 'cmb2' ),  
		    'From Well'     => __('From Well', 'cmb2'),  'Other' => __('Other', 'cmb2'),    
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
			    'show_option_none' => false,
	            'default'    => 'Central Kitchen', 
		        'options'    => array (
				'From Nearby School'    => __('From Nearby School', 'cmb2' ), 
                'NGO'                   => __('NGO', 'cmb2' ), 
                'Gram Panchayat'        => __('Gram Panchayat', 'cmb2'),
				'Self Help Group'       => __('Self Help Group', 'cmb2'),     
                'PTA/MTA'               => __('PTA/MTA', 'cmb2'),       
				'Central Kitchen'       => __('Central Kitchen', 'cmb2'),     
                'Others'                => __('Others', 'cmb2') )   
				   )); }
		 $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'inschool';
         if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
		  {  $details->add_field( array(
                'name'       => __( 'Status of kitchen', 'inventor-schools' ),
			    'desc'       => 'Availability of kitchen',
                'id'         => $field_id,
                'type'       => 'select',
			    'show_option_none' => false,
	            'default'    => 'Not Applicable', 
		        'options'    => array (
                    'Not Applicable'           => __('Not Applicable', 'cmb2' ),
	                'Available'           => __('Available', 'cmb2' ),         
                    'Not Available'                  => __('Not Available', 'cmb2' ), 
		            'Under Construction'  => __('Under Construction', 'cmb2'),  
                    'Classroom used as Kitchen'  => __('Classroom used as Kitchen', 'cmb2') )   
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
            'closed'        => true
           ) );
// Fields for 9th metabox 
		 $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'building';
         if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
		  {  $details->add_field( array(
                'name'       => __( 'Status of building', 'inventor-schools' ),
                'id'         => $field_id,
                'type'       => 'select',
			    'show_option_none' => false,
	            'default'    => 'Private', 
		        'options'    => array (
				   'Private'  => __('Private', 'cmb2' ),  
                   'Rented'     => __('Rented', 'cmb2' ), 
				   'Government'    => __('Government','cmb2'),  
                   'Government school in a rent free building'    => __('Government school in a rent free building', 'cmb2' ),
				   'No Building'    => __('No Building','cmb2'),
                   'Dilapidated'    => __('Dilapidated','cmb2'),
                   'Under Construction'   => __('Under Construction', 'cmb2' ) )
		  ));   }	   
		  $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'shift';
		  if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
		  {  $details->add_field( array(
                'name'       => __( 'School building a shift school', 'inventor-schools' ),
                'id'         => $field_id,
                'type'              => 'radio_inline',
				'show_option_none'  => false,
		        'options'           => array (
                     'Yes'   => __('Yes', 'cmb2'), 'No'  => __('No', 'cmb2'), )
				 ) ); }
        $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'schres';
		  if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
		  {  $details->add_field( array(
                'name'       => __( 'Is the school residential for primary students', 'inventor-schools' ),
                'id'         => $field_id,
                'type'              => 'radio_inline',
				'show_option_none'  => false,
		        'options'           => array (
                     'Yes'   => __('Yes', 'cmb2'), 'No'  => __('No', 'cmb2'), )
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
			    'show_option_none' => false,
	            'default'    => 'Pucca', 
		        'options'    => array (
                   'Not Applicable'         => __( 'Not Applicable', 'cmb2' ),
				   'Pucca'                  => __( 'Pucca', 'cmb2' ),             
                   'Pucca but broken'       => __( 'Pucca but broken', 'cmb2' ), 
				   'Barbed wire fencing'    => __('Barbed wire fencing','cmb2'),  
                   'Hedges'                 => __( 'Hedges', 'cmb2' ),   
                   'No boundary wall'       => __( 'No boundary wall', 'cmb2' ),            
				   'Partial'                => __('Partial','cmb2'),              
                   'Under Construction'     => __( 'Under Construction', 'cmb2' ), 
                   'Other'                  => __( 'Others', 'cmb2' ),)
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
        $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'hmroom';
		  if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
		  {  $details->add_field( array(
                'name'       => __( 'Separate room for Head Teacher/Principal available', 'inventor-schools' ),
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
            'closed'        => true
           ) );
           $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'ac_year';
            if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
            {  $details->add_field( array(
                    'name'       => __( 'Academic Year', 'inventor-schools' ),
                    'description'=> 'for eg. 2015-16',
                    'id'         => $field_id,
                    'type'              => 'text_small',
                ) ); }

            $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'workdays_pr';
            if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
            {  $details->add_field( array(
                    'name'       => __( 'Number of instructional days for Primary sections', 'inventor-schools' ),
                    'description'=> 'Number of instructional days (previous academic year) for Primary sections',
                    'id'         => $field_id,
                    'type'       => 'text_small',
                    'attributes' => array(
                            'type'    => 'number', 'pattern' => '\d*','min'      => 0, ) 
				 ) ); }

            $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'workdays_upr';
            if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
            {  $details->add_field( array(
                    'name'       => __( 'Number of instructional days for Upper Primary sections', 'inventor-schools' ),
                    'description'=> 'Number of instructional days (previous academic year) for Upper Primary sections',
                    'id'         => $field_id,
                    'type'       => 'text_small',
                    'attributes' => array(
                            'type'    => 'number', 'pattern' => '\d*','min'      => 0, ) 
				 ) ); }

            $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'workdays_sec';
            if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
            {  $details->add_field( array(
                    'name'       => __( 'Number of instructional days for Secondary sections', 'inventor-schools' ),
                    'description'=> 'Number of instructional days (previous academic year) for Secondary sections',
                    'id'         => $field_id,
                    'type'       => 'text_small',
                    'attributes' => array(
                            'type'    => 'number', 'pattern' => '\d*','min'      => 0, ) 
				 ) ); }

            $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'workdays_hsec';
            if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
            {  $details->add_field( array(
                    'name'       => __( 'Number of instructional days for Hr. Secondary secions', 'inventor-schools' ),
                    'description'=> 'Number of instructional days (previous academic year) for Hr. Secondary secions',
                    'id'         => $field_id,
                    'type'       => 'text_small',
                    'attributes' => array(
                            'type'    => 'number', 'pattern' => '\d*','min'      => 0, ) 
				 ) ); }

            $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'schhrschild_upr';
       	    if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
            {  $details->add_field( array(
                    'name'       => __( 'Children hours for Upper Primary sections', 'inventor-schools' ),
                    'descripton' => 'Number of hours Children stay in school (current academic year) for Upper Primary',
                    'id'         => $field_id,
                    'type'       => 'text_small',
                    'attributes' => array(
                            'type' => 'number',   'pattern' => '\d*', 'min' => 0)
				 ) ); }

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
                     '2014'   => __('2014', 'cmb2'), '2015'  => __('2015', 'cmb2'), 'Other'  => __('Other', 'cmb2')  )
				 ) ); }
// 11th Metabox -- Fundings and Grants
      $metabox_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'fund';
      $details = new_cmb2_box( array(
            'id'            => $metabox_id,
            'title'         => __( 'Fundings & Grants', 'inventor-schools' ),
            'object_types'  => array( $post_type ),
            'context'       => 'normal',
            'priority'      => 'high',
            'show_in_rest'  => true,
            'closed'        => true
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
            'closed'        => true
           ) );
	 $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'no_insp';
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
				'description'=> 'No. of inspections by community members in previous academic year',
                'id'         => $field_id,
                'type'       => 'text_small',
                'attributes' => array(
                        'type'    => 'number',   'pattern'  => '\d*', 'min'      => 0,  )
				 ) );  }  
	 $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'supoffic';
     if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) )
		  {  $details->add_field( array(
                'name'       => __( 'By Supervisory Officials', 'inventor-schools' ),
				'description'=> 'No. of inspections by supervisory official in previous academic year',
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
            'closed'        => true
           ) );
	     $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'schmngtcom';
       	 if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
		  {  $details->add_field( array(
                'name'       => __( 'School Management Committee Present', 'inventor-schools' ),
                'id'         => $field_id,
                'type'              => 'radio_inline',
				'show_option_none'  => false,
		        'options'           => array (
                     'Yes'   => __('Yes', 'cmb2'), 'No'  => __('No', 'cmb2'), )
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
            'closed'        => true
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
                     'Yes'   => __('Yes', 'cmb2'), 'No'  => __('No', 'cmb2'), )
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
	 
	 $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'teacher_no';
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
			    'show_option_none' => false,
	            'default'          => 'School Teachers', 
		        'options'           => array (
                       'Not Applicable'   => __( 'Not Applicable', 'cmb2' ),
				       'School Teachers'   => __( 'School Teachers', 'cmb2' ),  
                       'Special Engaged Teachers'  => __('Special Engaged Teachers', 'cmb2'),
					   'Both 2 & 3'    => __('Both 2 & 3', 'cmb2'),   
                       'NGO'    => __('NGO', 'cmb2'),
					   'Others'     => __('Others', 'cmb2'),
                       'None'   => __( 'None', 'cmb2' )  )
                      ));   }
         $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'train_type';
         if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) )
		  { $details->add_field( array(
                'name'            => __( 'Type of Special Training', 'inventor-schools' ),
                'description'     => __( 'Select the type', 'inventor-schools' ),
                 'id'             => $field_id,
                'type'            => 'radio_inline',
		        'show_option_none'  => false,
		        'options'         => array (
                     'Not Applicable'  => __('Not Applicable', 'cmb2'),
                     'Residential' => __('Residential', 'cmb2'),
                     'Non-Residential'  => __('Non-Residential', 'cmb2'), 
                     'Both'   => __('Both', 'cmb2'), )   
					 )); }	
         $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'trainat';
         if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) )
		  { $details->add_field( array(
                'name'            => __( 'Place of the Training', 'inventor-schools' ),
                'description'     => __( 'Select the place', 'inventor-schools' ),
                 'id'             => $field_id,
                'type'            => 'radio_inline',
		        'show_option_none'  => false,
		        'options'         => array (
                    'Not Applicable'   => __('Not Applicable', 'cmb2'),
                    'School Premises' => __('School Premises', 'cmb2'),
                    'Outside the school premises'  => __('Outside the school premises', 'cmb2'), 
                    'Both'   => __('Both', 'cmb2'), )      
					 )); }
        $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'wsec25p_enrolled';
        if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) )
            {  $details->add_field( array(
                    'name'       => __( 'Number of Students enrolled under 25% quota', 'inventor-schools' ),
                    'description'=> 'Number of Students continuing who got admission under 25% quota in previous years',
                    'id'         => $field_id,
                    'type'       => 'text_small',
                    'attributes' => array(
                            'type'    => 'number',   'pattern'  => '\d*', 'min'      => 0,  )
                    ) );  }
// 15th metabox -- Teachers 
        $metabox_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'Teachers';
        $details = new_cmb2_box( array(
            'id'            => $metabox_id,
            'title'         => __( 'Teachers', 'inventor-schools' ),
            'object_types'  => array( $post_type ),
            'context'       => 'normal',
            'priority'      => 'high',
            'show_in_rest'  => true,
            'closed'        => true
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

        $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'tch_nr';
         if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) )
		  {  $details->add_field( array(
                'name'       => __( 'Teachers with No Response in Gender Column', 'inventor-schools' ),
                'id'         => $field_id,
                'type'       => 'text_small',
                'attributes' => array(
                        'type'    => 'number',   'pattern'  => '\d*', 'min'      => 0,  )
				 ) );  }  

		  $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'tech_notr';
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
			 $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'ppteacher';
       	    if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
            {  $details->add_field( array(
                    'name'       => __( 'No. of Pre-primary teachers', 'inventor-schools' ),
                    'id'         => $field_id,
                    'type'       => 'text_small',
                    'attributes' => array(
                            'type' => 'number',   'pattern' => '\d*', 'min' => 0)
				 ) ); }

            $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'schhrstch_pr';
       	    if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
            {  $details->add_field( array(
                    'name'       => __( 'Teacher working hours for primary sections', 'inventor-schools' ),
                    'descripton' => 'Number of hours teachers stay in school (current academic year) for Primary sections',
                    'id'         => $field_id,
                    'type'       => 'text_small',
                    'attributes' => array(
                            'type' => 'number',   'pattern' => '\d*', 'min' => 0)
				 ) ); }

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
                     'Yes'   => __('Yes', 'cmb2'), 'No'  => __('No', 'cmb2'), )
				 ) ); }	
	     $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'headname';
       	 if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
		  {  $details->add_field( array(
                'name'       => __( 'Name of Head Teacher', 'inventor-schools' ),
                'id'         => $field_id,
                'type'       => 'text',
				 ) ); }

// 15.2th metabox -- Teacher's details
        $metabox_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'Teachers_details';
        $details = new_cmb2_box( array(
            'id'            => $metabox_id,
            'title'         => __( 'Teacher\'s Details', 'inventor-schools' ),
            'object_types'  => array( $post_type ),
            'context'       => 'normal',
            'priority'      => 'high',
            'show_in_rest'  => true,
            'closed'        => true
           ) );

        $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'tch_dtls';
        $group_field_id = $details->add_field( array(
            'id'          => $field_id,
            'type'        => 'group',
            'options'     => array(
                'group_title'   => __( 'Teacher {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
                'add_button'    => __( 'Add Another Teacher', 'cmb2' ),
                'remove_button' => __( 'Remove Teacher', 'cmb2' ),
                'closed'     => true, 
            ),
        ) );

        $details->add_group_field( $group_field_id, array(
                    'name' => 'Teacher Name',
                    'id'   => 'tchname',
                    'type' => 'text',
                ) );
        $details->add_group_field( $group_field_id, array(
                    'name' => 'Gender',
                    'id'   => 'sex',
                    'type' => 'text',
                ) );
        $details->add_group_field( $group_field_id, array(
                    'name' => 'Year of Joining',
                    'id'   => 'yoj',
                    'type' => 'text',
                ) );
        $details->add_group_field( $group_field_id, array(
                    'name' => 'Post Status',
                    'id'   => 'post_status',
                    'type' => 'text',
                    'description' => 'eg. Contract, Regular'
                ) );
        $details->add_group_field( $group_field_id, array(
                    'name' => 'Academic Qualification',
                    'id'   => 'qual_acad',
                    'type' => 'text',
                ) );
        $details->add_group_field( $group_field_id, array(
                    'name' => 'Professional Qualification',
                    'id'   => 'qual_prof',
                    'type' => 'text',
                ) );
        $details->add_group_field( $group_field_id, array(
                    'name' => 'Main Taught Subject 1',
                    'id'   => 'main_taught1',
                    'type' => 'hidden',
                ) );
        $details->add_group_field( $group_field_id, array(
                    'name' => 'Main Taught Subject 2',
                    'id'   => 'main_taught2',
                    'type' => 'hidden',
                ) );
        $details->add_group_field( $group_field_id, array(
                    'name' => 'cwsntrained_yn',
                    'id'   => 'cwsntrained_yn',
                    'type' => 'hidden',
                ) );
        $details->add_group_field( $group_field_id, array(
                    'name' => 'Class Taught',
                    'id'   => 'cls_taught',
                    'type' => 'hidden',
                ) );
        $details->add_group_field( $group_field_id, array(
                    'name' => 'Science Upto',
                    'id'   => 'scienceupto',
                    'type' => 'hidden',
                ) );
        $details->add_group_field( $group_field_id, array(
                    'name' => 'English Upto',
                    'id'   => 'eng_upto',
                    'type' => 'hidden',
                ) );
        $details->add_group_field( $group_field_id, array(
                    'name' => 'Category',
                    'id'   => 'category',
                    'type' => 'hidden',
                ) );
        $details->add_group_field( $group_field_id, array(
                    'name' => 'Academic Year',
                    'id'   => 'ac_year',
                    'type' => 'hidden',
                ) );
        $details->add_group_field( $group_field_id, array(
                    'name' => 'appointsub',
                    'id'   => 'appointsub',
                    'type' => 'hidden',
                ) );
        $details->add_group_field( $group_field_id, array(
                    'name' => 'trn_crc',
                    'id'   => 'trn_crc',
                    'type' => 'hidden',
                ) );
        $details->add_group_field( $group_field_id, array(
                    'name' => 'trn_diet',
                    'id'   => 'trn_diet',
                    'type' => 'hidden',
                ) );
        $details->add_group_field( $group_field_id, array(
                    'name' => 'Working Since',
                    'id'   => 'workingsince',
                    'type' => 'hidden',
                ) );
        $details->add_group_field( $group_field_id, array(
                    'name' => 'nontch_ass',
                    'id'   => 'nontch_ass',
                    'type' => 'hidden',
                ) );
        $details->add_group_field( $group_field_id, array(
                    'name' => 'Disability Type',
                    'id'   => 'disability_type',
                    'type' => 'hidden',
                ) );
        $details->add_group_field( $group_field_id, array(
                    'name' => 'SCHOOL CODE',
                    'id'   => 'SCHOOL_CODE',
                    'type' => 'hidden',
                ) );
        $details->add_group_field( $group_field_id, array(
                    'name' => 'Age',
                    'id'   => 'age',
                    'type' => 'hidden',
                ) );
        $details->add_group_field( $group_field_id, array(
                    'name' => 'trn_brc',
                    'id'   => 'trn_brc',
                    'type' => 'hidden',
                ) );
        $details->add_group_field( $group_field_id, array(
                    'name' => 'Math Upto',
                    'id'   => 'math_upto',
                    'type' => 'hidden',
                ) );
        $details->add_group_field( $group_field_id, array(
                    'name' => 'trn_other',
                    'id'   => 'trn_other',
                    'type' => 'hidden',
                ) );
        $details->add_group_field( $group_field_id, array(
                    'name' => 'Caste',
                    'id'   => 'caste',
                    'type' => 'hidden',
                ) );

        
           				 
// 16th Metabox  working time-- new field type				 
		$metabox_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'work_time';
        $details = new_cmb2_box( array(
            'id'            => $metabox_id,
            'title'         => __( 'Working time', 'inventor-schools' ),
            'object_types'  => array( $post_type ),
            'context'       => 'normal',
            'priority'      => 'high',
            'show_in_rest'  => true,
            'closed'        => true
           ) );
		$field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'work_hours';
		if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
		  {  $details->add_field( array(
                'id'          	=> $field_id,
                'type'        	=> 'working_hours',
                'post_type'   	=> $post_type,
                'description'   => apply_filters( 'inventor_metabox_field_description', null, $metabox_id, $field_id, $post_type ),
                'default'       => apply_filters( 'inventor_metabox_field_default', null, $metabox_id, $field_id, $post_type ),
                'attributes'    => apply_filters( 'inventor_metabox_field_attributes', array(), $metabox_id, $field_id, $post_type ),
               ) ); }	

// 17th Metabox -- Students 
 		$metabox_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'stud_1';
        $details = new_cmb2_box( array(
            'id'            => $metabox_id,
            'title'         => __( 'Students--Primary', 'inventor-schools' ),
            'object_types'  => array( $post_type ),
            'context'       => 'normal',
            'priority'      => 'high',
            'show_in_rest'  => true,
            'closed'        => true
           ) );
		$field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'students1';
		if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
		  {  $details->add_field( array(
                'id'          	=> $field_id,
                'type'        	=> 'student_primary',
                'post_type'   	=> $post_type,
                'description'   => apply_filters( 'inventor_metabox_field_description', null, $metabox_id, $field_id, $post_type ),
                'default'       => apply_filters( 'inventor_metabox_field_default', null, $metabox_id, $field_id, $post_type ),
                'attributes'    => apply_filters( 'inventor_metabox_field_attributes', array(), $metabox_id, $field_id, $post_type ),
               ) ); }
// 18th Metabox -- Students
 		$metabox_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'stud_2';
        $details = new_cmb2_box( array(
            'id'            => $metabox_id,
            'title'         => __( 'Students--Secondary', 'inventor-schools' ),
            'object_types'  => array( $post_type ),
            'context'       => 'normal',
            'priority'      => 'high',
            'show_in_rest'  => true,
            'closed'        => true
           ) );
	    $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'students2';
		if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
		  {  $details->add_field( array(
                'id'          	=> $field_id,
                'type'        	=> 'student_secondary',
                'post_type'   	=> $post_type,
                'description'   => apply_filters( 'inventor_metabox_field_description', null, $metabox_id, $field_id, $post_type ),
                'default'       => apply_filters( 'inventor_metabox_field_default', null, $metabox_id, $field_id, $post_type ),
                'attributes'    => apply_filters( 'inventor_metabox_field_attributes', array(), $metabox_id, $field_id, $post_type ),
               ) ); }
// 19th Metabox -- Results
		$metabox_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'results';
        $details = new_cmb2_box( array(
            'id'            => $metabox_id,
            'title'         => __( 'Results--Primary', 'inventor-schools' ),
            'object_types'  => array( $post_type ),
            'context'       => 'normal',
            'priority'      => 'high',
            'show_in_rest'  => true,
            'closed'        => true
           ) );
		$field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'res1';
		if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
		  {  $details->add_field( array(
                'id'          	=> $field_id,
                'type'        	=> 'result_primary',
                'post_type'   	=> $post_type,
                'description'   => apply_filters( 'inventor_metabox_field_description', null, $metabox_id, $field_id, $post_type ),
                'default'       => apply_filters( 'inventor_metabox_field_default', null, $metabox_id, $field_id, $post_type ),
                'attributes'    => apply_filters( 'inventor_metabox_field_attributes', array(), $metabox_id, $field_id, $post_type ),
               ) ); }
// 20th Metabox -- Result2
 		$metabox_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'res_2';
        $details = new_cmb2_box( array(
            'id'            => $metabox_id,
            'title'         => __( 'Results--Secondary', 'inventor-schools' ),
            'object_types'  => array( $post_type ),
            'context'       => 'normal',
            'priority'      => 'high',
            'show_in_rest'  => true,
            'closed'        => true
           ) );
	    $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'res2';
		if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) 
		  {  $details->add_field( array(
                'id'          	=> $field_id,
                'type'        	=> 'result_secondary',
                'post_type'   	=> $post_type,
                'description'   => apply_filters( 'inventor_metabox_field_description', null, $metabox_id, $field_id, $post_type ),
                'default'       => apply_filters( 'inventor_metabox_field_default', null, $metabox_id, $field_id, $post_type ),
                'attributes'    => apply_filters( 'inventor_metabox_field_attributes', array(), $metabox_id, $field_id, $post_type ),
               ) ); }
	
		}
	} 
Inventor_Schools_Post_Type_Schools::init();