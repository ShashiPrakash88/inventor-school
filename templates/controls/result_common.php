<?php
//for handling default values
  $value = wp_parse_args( $value, array(
        'class_num' => '',
        'total'     => '',
        'appear'    => '',
        'pass'      => '',
        'above60'   => '',
        'fail'      =>  ''
        )  );
    
?>
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
        <td>
            <?php echo $field_type_object->input( array(
                'name'  => $field_type_object->_name( '[class_num_'.$index.']' ),
                'id'    => $field_type_object->_id( '_class_num_'.$index ),
                'value' => $key,
                'type'  => 'hidden',
                'desc'  => '',
            ) ); 
            echo $display;
            ?>
        </td>         

        <td>
            <?php echo $field_type_object->input( array(
                'name'  => $field_type_object->_name( '[total_'.$index.']'),
                'id'    => $field_type_object->_id( '_total_'.$index ),
                'value' => $value['total_'.$index],
                'type'  => 'number',
                'desc'  => '',
                'class' => 'table_num',
                'min'   => 0
            ) ); 
            ?>
        </td>

        <td>
            <?php echo $field_type_object->input( array(
                'name'  => $field_type_object->_name( '[appear_'.$index.']'),
                'id'    => $field_type_object->_id( '_appear_'.$index ),
                'value' => $value['appear_'.$index],
                'type'  => 'number',
                'desc'  => '',
                'class' => 'table_num',
                'min'   => 0
            ) ); 
            ?>
        </td>

        <td>
            <?php echo $field_type_object->input( array(
                'name'  => $field_type_object->_name( '[pass_'.$index.']'),
                'id'    => $field_type_object->_id( '_pass_'.$index ),
                'value' => $value['pass_'.$index],
                'type'  => 'number',
                'desc'  => '',
                'class' => 'table_num',
                'min'   => 0
            ) ); 
            ?>
        </td>

        <td>
            <?php echo $field_type_object->input( array(
                'name'  => $field_type_object->_name( '[above60_'.$index.']'),
                'id'    => $field_type_object->_id( '_above60_'.$index ),
                'value' => $value['above60_'.$index],
                'type'  => 'number',
                'desc'  => '',
                'class' => 'table_num',
                'min'   => 0
            ) ); 
            ?>
        </td>
        
        <td>
            <?php echo $field_type_object->input( array(
                'name'  => $field_type_object->_name( '[fail_'.$index.']'),
                'id'    => $field_type_object->_id( '_fail_'.$index ),
                'value' => $value['fail_'.$index],
                'type'  => 'number',
                'desc'  => '',
                'class' => 'table_num',
                'min'   => 0
            ) ); 
            ?>
        </td>

    </tr>

            <?php $index++; ?>
        <?php endforeach; ?>
    </tbody>
</table>