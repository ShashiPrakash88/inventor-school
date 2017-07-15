<?php
	function map($med) {
		switch($med) {
		  case 1 : echo 'Assamese'; break;
		  case 2 : echo 'Bengali'; break;
		  case 3 : echo 'Gujarati'; break;
		  case 4 : echo 'Hindi'; break;
		  case 5 : echo 'Kannad'; break;
		  case 6 : echo 'Kashmiri'; break;
		  case 7 : echo 'Konkani'; break;
		  case 8 : echo 'Malayalam'; break;
		  case 9 : echo 'Manipuri'; break;
		  case 10 : echo 'Marathi'; break;
		  case 11 : echo 'Nepali'; break;
		  case 12 : echo 'Odia'; break;
		  case 13 : echo 'Punjabi'; break;
		  case 14 : echo 'Sanskrit'; break;
		  case 15 : echo 'Sindhi'; break;
		  case 16 : echo 'Tamil'; break;
		  case 17 : echo 'Telugu'; break;
		  case 18 : echo 'Urdu'; break;
		  case 19 : echo 'English'; break;
		  case 20 : echo 'Bodo'; break;
		  case 21 : echo 'Mising'; break;
		  case 22 : echo 'Dogri'; break;
		  case 23 : echo 'Khasi'; break;
		  case 24 : echo 'Garo'; break;
		  case 25 : echo 'Mizo'; break;
		  case 26 : echo 'Bhutia'; break;
		  case 27 : echo 'Lepcha'; break;
		  case 28 : echo 'Limboo'; break;
		  case 29 : echo 'French'; break;
		  case 98 : echo 'Other'; break;
		  case 99 : echo 'Other'; break;
		}
	}

add_action('pmxi_gallery_image', 'my_gallery_image', 10, 3);
function my_gallery_image($pid, $attid, $image_filepath) {
	$listing_gallery = get_post_meta($pid, 'listing_gallery', $single = false);
	$listing_gallery[$attid] = wp_get_attachment_url($attid);
	$result = Array();
	foreach ($listing_gallery as $key => $value) {
		$key_in = $key;
		$value_in = $value;
		
		if($key_in>0)
			$result[$key_in] = $value_in;

		while(is_array($value_in)) {
				if(isset($value[0]))
					$value = $value[0];
				
				foreach ($value as $key_inner => $value_inner) {
					$key_in = $key_inner;
					$value_in = $value_inner;
					
					if($key_in>0)
						$result[$key_in] = $value_in;			
				}
			}
		}
		update_post_meta($pid, 'listing_gallery', $result);    
	}

add_action('pmxi_saved_post', 'post_saved', 10, 1);
function post_saved($id)
{
    /** Inserting comments**/
    $comments = get_post_meta($id, 'comments', true);
    $ratings = get_post_meta($id, 'ratings', true);
    $comments_authors = get_post_meta($id, 'comments_authors', true);
	if($comments != "") {
		$comments = explode(",", $comments);
		$ratings = explode(",", $ratings);
		$comments_authors = explode(",", $comments_authors);

		for ($i = 0; $i < count($comments); $i++) {
			$comment = Array();
			$comment['comment_author'] = $comments_authors[$i];

			if ($ratings[$i] < 3) {
				$comment['comment_meta'] = Array(
					'rating' => $ratings[$i],
					'cons' => $comments[$i]
				);
				$comment['comment_content'] =  '<table><tr><td><h4>PROS: </h4>' . $comments[$i] . '</td><td><h4>CONS: </h4></td></tr></table>';
			} else {
				$comment['comment_meta'] = Array(
					'rating' => $ratings[$i],
					'pros' => $comments[$i]
				);
				$comment['comment_content'] = '<table><tr><td><h4>PROS: </h4></td><td><h4>CONS: </h4>' . $comments[$i] . '</td></tr></table>';
			}
			$comment['comment_post_ID'] = $id;
			wp_insert_comment($comment);
		}
		
		update_post_meta($id, 'comment_number', count($comments) );
    }

    /**Inserting users**/
    $email = get_post_meta($id, 'listing_email', true);
	/*
	if ( !is_email( $email ) ) {
      $email = '';
	}*/
	
    if (isset($email) && !empty($email)) {
        //check whether user already exists - if doesn't exist - insert him else assign him this page
        $user_exist = get_user_by('email', $email);
        //$user_id = 1;

        if($user_exist == false) {
            $userDetails = Array();
            $display_name = get_post_meta($id, 'listing_person', true);

            if (!isset($display_name) || empty($display_name)) {
                $display_name = get_post_meta($id, 'listing_title', true);
            }

            $userDetails['display_name'] = $display_name;
            $userDetails['first_name'] = $display_name;
            $userDetails['user_email'] = $email;
            $userDetails['user_url'] = get_post_meta($id, 'listing_website', true);
			

            $email_parts = explode("@", $email);
            $userDetails['user_login'] = $email_parts[0];
			
			//Check if username already exists, if exist - add some characters
			$usernameCounter=0;
			while(username_exists( $userDetails['user_login'] )) {
				$userDetails['user_login'] = $email_parts[0].$usernameCounter;
				$usernameCounter++;
				echo "Inside userdetails:";
				print_r($userDetails);
			}
			
            $userDetails['user_pass'] = randomPassword();
			
            //$userDetails['phone'] = get_post_meta($id, 'listing_phone', true);
            $user_id = wp_insert_user($userDetails);
			if(is_wp_error($user_id))
			{
				print_r($userDetails);
				print_r($user_id->get_error_message());
				$user_id = 1;
				print_r("Got an error while inserting users");
			} else 
				echo 'inserted user';
			
			//$user_id = 1; //Temporary - remove this line
        } else {
            $user_id = $user_exist->ID;
            echo "User already exists with ID: "+$user_id;
        }
        //Update owner of this listing
        $arg = array(
            'ID' => $id,
            'post_author' => $user_id,
        );
        wp_update_post($arg);
		
		$result = update_user_option( $user_id, 'user_listing_link', get_permalink($id) );				
		update_user_option( $user_id, 'total_views', get_post_meta($id, 'inventor_statistics_post_total_views', true) );
		update_user_option( $user_id, 'listing_website', get_post_meta($id, 'listing_website', true) );
		update_user_option( $user_id, 'phone_number', get_post_meta($id, 'listing_phone', true) );
		update_user_option( $user_id, 'institute_name', get_post_meta($id, 'listing_title', true) );

        //send an email to the user
		if($user_exist == false) {
			wp_new_user_notification($user_id, null, 'user');
		}
    } else {
		echo "EmailID doesn't exist \n";
	}

    /** Correcting stats by inserting dummy records */
    global $wpdb;
    $numberOfRecordsToInsert = get_post_meta($id, 'inventor_statistics_post_total_views', true);
    $values = array();
    $query = "INSERT INTO ".$wpdb->prefix . 'listing_stats'." (`key`, `value`, `ip`, `created`) VALUES ";
    for($i=0; $i<$numberOfRecordsToInsert; $i++) {
        $values[] = "('". $id ."',
                        '". md5(1)."',
                        '".$_SERVER['REMOTE_ADDR']."',
                        '".current_time('mysql')."'
                        )";
    }

    $query .= implode(', ', $values);
    $wpdb->query($query);
	echo "Done";
}


function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 7; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}
?>