<?php $classes =  array(
				'C6B'   => __( 'C6B', 'inventor-schools' ),
				'C6G'   => __( 'C6G', 'inventor-schools' ),
				'C7B'   => __( 'C7B', 'inventor-schools' ),
				'C7G'   => __( 'C7G', 'inventor-schools' ),
				'C8B'   => __( 'C8B', 'inventor-schools' ),
				'C8G'   => __( 'C8G', 'inventor-schools' ),
				'C9B'   => __( 'C9B', 'inventor-schools' ),
				'C9G'   => __( 'C9G', 'inventor-schools' ),
				'C10B'  => __( 'C10B', 'inventor-schools' ),
				'C10G'  => __( 'C10G', 'inventor-schools' ),
				'C11B'  => __( 'C11B', 'inventor-schools' ),
				'C11G'  => __( 'C11G', 'inventor-schools' ),
				'C12B'  => __( 'C12B', 'inventor-schools' ),
				'C12G'  => __( 'C12G', 'inventor-schools' ),
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
        <?php $index = 0; ?>
        <?php foreach( $classes as $key => $display ): ?>
            <tr>
              <?php $dis  = ''; ?>
              <?php $sc   = ''; ?>
              <?php $st   = ''; ?>
			  <?php $obc  = ''; ?>
              <?php if ( is_array( $field->value ) ) : ?>
               <?php foreach( $field->value as $classes ) : ?>
               <?php if( $results2['listing_day'] == $key ) : ?>
               <?php
$total   = !empty( $results2['total'] )   ? $results2['total'] : '';
$appear  = !empty( $results2['appear'] )  ? $results2['appear']  : '';
$pass    = !empty( $results2['pass'] )    ? $results2['pass']  : '';
$above60 = !empty( $results2['above60'] ) ? $results2['above60'] : '';
$fail    = !empty( $results2['fail'] )     ? $results2['fail'] : '';
                         ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
<td>
<label for="class_<?php echo $index; ?>_no.class"></label>
<input type="hidden" name="class[<?php echo $index; ?>][no.class]" id="class_<?php echo $index; ?>_no.class" value="<?php echo $key; ?>"><?php echo $display; ?>
</td>

<td>
<label for="class_<?php echo $index; ?>_totalst"></label>
<input type="number"  min="0"   name="class_[<?php echo $index; ?>][totalst]" id="class_<?php echo $index; ?>_totalst" value="<?php echo $total ?>">
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
<input type="number"  min="0" max='100'  name="class_[<?php echo $index; ?>][above60st]" id="class_<?php echo $index; ?>_above60st" value="<?php echo $above60 ?>">
</td>

<td>
<label for="class_<?php echo $index; ?>_failst"></label>
<input type="number"  min="0"  max ="50"  name="class_[<?php echo $index; ?>][fail60st]" id="class_<?php echo $index; ?>_fail60st" value="<?php echo $fail ?>">
</td>
</tr>                                                 
            <?php $index++; ?>
        <?php endforeach; ?>
    </tbody>
</table>