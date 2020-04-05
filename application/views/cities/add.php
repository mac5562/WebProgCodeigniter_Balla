<?php echo validation_errors();?>

<?php echo form_open(); ?>
    <?php echo form_label('Város:', 'name'); ?>
    <?php echo form_input('name',set_value('name','',FALSE),array(
        'id' => 'name',
        'required' => 'required'
    ));?>

    <br/>

    <?php echo form_label('Irányítószám:', 'postal_code'); ?>
    <?php echo form_input('postal_code',set_value('postal_code','',FALSE),array(
        'id' => 'postal_code',
        'required' => 'required'
    ));?>
    <?php echo form_error('ssn'); ?>
    <br/>

    <br/>

    <?php echo form_submit('submit', 'Mentés'); ?>
<?php echo form_close(); ?>