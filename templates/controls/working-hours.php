<?php $work =  array(
				'workday'    => __( 'Days', 'inventor-schools' ),
				'workhrs'    => __( 'Hrs(teachers)', 'inventor-schools' ),
				'workhrs2'   => __( 'Hrs(students)', 'inventor-schools' ),
				);?>
<table>
    <thead>
        <tr>
            <th><?php echo __( 'Work', 'inventor-schools' ); ?></th>
            <th><?php echo __( 'Pre Primary', 'inventor-schools' ); ?></th>
            <th><?php echo __( 'Primary', 'inventor-schools' ); ?></th>
            <th><?php echo __( 'Secondary', 'inventor-schools' ); ?></th>
			<th><?php echo __( 'Hr-Secondary', 'inventor-schools' ); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php $index = 0; ?>
        <?php foreach( $work as $key => $display ): ?>
            <tr>
              <?php $pprim  = ''; ?>
              <?php $prim   = ''; ?>
              <?php $sec    = ''; ?>
			  <?php $hrsec  = ''; ?>
              <?php if ( is_array( $field->value ) ) : ?>
               <?php foreach( $field->value as $working_hours ) : ?>
               <?php if( $working_hours['listing_day'] == $key ) : ?>
               <?php
$pprim = !empty( $working_hours['preprimary'] ) ? $working_hours['preprimary'] : '';
$prim  = !empty( $working_hours['primary'] )    ? $working_hours['primary'] : '';
$sec   = !empty( $working_hours['secondary'] )  ? $working_hours['secondary'] : '';
$hrsec = !empty( $working_hours['hrsececond'] ) ? $working_hours['hrsecond'] : '';
                         ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
<td>
<label for="wrkhrs_<?php echo $index; ?>_wrk"></label>
<input type="hidden" name="wrkhrs[<?php echo $index; ?>][wrk]" id="wrkhrs_<?php echo $index; ?>_wrk" value="<?php echo $key; ?>"><?php echo $display; ?>
</td>

<td>
<label for="wrkhrs_<?php echo $index; ?>preprimary"></label>
<input type="number"  min="1" max='24'  name="wrkhrs_[<?php echo $index; ?>][preprimary]" id="wrkhrs_<?php echo $index; ?>preprimary" value="<?php echo $pprim ?>">
</td>

<td>
<label for="wrkhrs_<?php echo $index; ?>_primary"></label>
<input type="number"  min="1" max='24'  name="wrkhrs_[<?php echo $index; ?>][primary]" id="wrkhrs_<?php echo $index; ?>_primary" value="<?php echo $prim ?>">
</td>

<td>
<label for="wrkhrs_<?php echo $index; ?>_secondary"></label>
<input type="number"  min="1" max='24'  name="wrkhrs_[<?php echo $index; ?>][secondary]" id="wrkhrs_<?php echo $index; ?>_secondary" value="<?php echo $sec ?>">
</td>

<td>
<label for="wrkhrs_<?php echo $index; ?>_hrsecondary"></label>
<input type="number"  min="1" max='24'  name="wrkhrs_[<?php echo $index; ?>][hrsecondary]" id="wrkhrs_<?php echo $index; ?>_hrsecondary" value="<?php echo $hrsec ?>">
</td>
</tr>                                                 
            <?php $index++; ?>
        <?php endforeach; ?>
    </tbody>
</table>