<?php $classes =  array(
				'C1B'   => __( 'C1B', 'inventor-schools' ),
				'C1G'   => __( 'C1G', 'inventor-schools' ),
				'C2B'   => __( 'C2B', 'inventor-schools' ),
				'C2G'   => __( 'C2G', 'inventor-schools' ),
				'C3B'   => __( 'C3B', 'inventor-schools' ),
				'C3G'   => __( 'C3G', 'inventor-schools' ),
				'C4B'   => __( 'C4B', 'inventor-schools' ),
				'C4G'   => __( 'C4G', 'inventor-schools' ),
				'C5B'   => __( 'C5B', 'inventor-schools' ),
				'C5G'   => __( 'C5G', 'inventor-schools' ),
				);?>
<table>
    <thead>
        <tr>
		    <th><?php echo __( 'Class-Boys/Girls', 'inventor-schools' ); ?></th>
            <th><?php echo __( 'Total', 'inventor-schools' ); ?></th>
            <th><?php echo __( 'Appear', 'inventor-schools' ); ?></th>
            <th><?php echo __( 'Pass', 'inventor-schools' ); ?></th>
            <th><?php echo __( 'Above60', 'inventor-schools' ); ?></th>
			<th><?php echo __( 'Fail', 'inventor-schools' ); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php $index = 0; 
         foreach( $classes as $key => $display ): ?>
            <tr>
        <?php $total  = '';   $appear   = ''; $pass  = ''; 
			  $above60  = ''; $fail ='';
               if ( is_array( $field->value ) ) : 
               foreach( $field->value as $results ) : 
               if( $results['listing_day'] == $key ) : 
$total   = !empty( $results['total'] )   ? $results['total'] : '';
$appear  = !empty( $results['appear'] )  ? $results['appear']  : '';
$pass    = !empty( $results['pass'] )    ? $results['pass']  : '';
$above60 = !empty( $results['above60'] ) ? $results['above60'] : '';
$fail    = !empty( $results['fail'] )    ? $results['fail'] : '';
                         endif; 
						 endforeach; 
                         endif; ?>
<td>
<label for="class_<?php echo $index; ?>_no.class"></label>
<input type="hidden" name="class[<?php echo $index; ?>][no.class]" id="class_<?php echo $index; ?>_no.class" value="<?php echo $key; ?>"><?php echo $display; ?>
</td>

<td>
<label for="class_<?php echo $index; ?>_totalst"></label>
<input type="number"  min="0"  name="class_[<?php echo $index; ?>][totalst]" id="class_<?php echo $index; ?>_totalst" value="<?php echo $total ?>">
</td>

<td>
<label for="class_<?php echo $index; ?>_appearst"></label>
<input type="number"  min="0"  name="class_[<?php echo $index; ?>][appearst]" id="class_<?php echo $index; ?>appearst" value="<?php echo $appear ?>">
</td>

<td>
<label for="class_<?php echo $index; ?>_passst"></label>
<input type="number"  min="0" max='150' name="class_[<?php echo $index; ?>][passst]" id="class_<?php echo $index; ?>_passst" value="<?php echo $pass ?>">
</td>

<td>
<label for="class_<?php echo $index; ?>_above60st"></label>
<input type="number"  min="0" max='100' name="class_[<?php echo $index; ?>][above60st]" id="class_<?php echo $index; ?>_above60st" value="<?php echo $above60 ?>">
</td>

<td>
<label for="class_<?php echo $index; ?>_failst"></label>
<input type="number"  min="0" max ="50" name="class_[<?php echo $index; ?>][fail60st]" id="class_<?php echo $index; ?>_fail60st" value="<?php echo $fail ?>">
</td>
</tr>                                                 
            <?php $index++; ?>
        <?php endforeach; ?>
    </tbody>
</table>