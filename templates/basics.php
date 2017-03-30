/* Creating a sample of metaboxes 
Then the other file contains the code to add, format and save these . 
<?php
include("inventor-school/templates/main.php");

//I created an array called $meta_box and set the array key to the relevant post type, in this case post
add_action( 'init', 'prefix_create_metaboxes' );
function prefix_create_metaboxes() {
$meta_boxes = array();
$meta_boxes[] = array(
    'id' => 'Place',  
    'title' => 'place',
    'pages' => array('post'), // post type
    'context' => 'normal',
    'priority' => 'high',
     array(
        'name' => 'District',
        'desc' => 'district_name',
        'id' => 'dis_name',
        'type' => 'text',
        'default' => ''
    ),
    array(
        'name' => 'Block',
        'desc' => 'block_name',
        'id' => 'blk_name',
        'type' => 'text',
        'default' => ''
    ),
    array(
        'name' => 'Cluster',
        'desc' => 'cluster_name',
        'id' => 'clstr_name',
        'type' => 'text',
        'default' => ''
    ),
    array(
        'name' => 'Village',
        'desc' => 'village_name',
        'id' => 'vilg_name',
        'type' => 'text',
        'default' => ''
    )
)
);

}
add_action('add_meta_boxes', 'plib_add_box');
?>
