<?php
add_action( 'add_meta_boxes', 'cd_meta_box_add' );
function cd_meta_box_add()
{
    add_meta_box( 'place', 'Place_Name', 'callback_place', 'post', 'normal', 'high' );
}
?>
<?php
function callback_place( $post )
{
$values = get_post_custom( $post->ID );
$district = isset( $values['dis_name'] ) ? esc_attr( $values['dis_name'][0] ) : ”;
$block = isset( $values['block_name'] ) ? esc_attr( $values['block_name'][0] ) : ”;
$cluster = isset( $values['clust_name'] ) ? esc_attr( $values['clust_name'][0] ) : ”;
$village = isset( $values['vilg_name'] ) ? esc_attr( $values['vilg_name'][0] ) : ”;
wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
?>
