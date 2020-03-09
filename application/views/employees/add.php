<?php echo validation_errors();?>

<?php echo form_open(); ?>
    <?php echo form_label('Név:', 'employee_name'); ?>
    <?php echo form_input('name',set_value('name','',FALSE),array(
        'id' => 'employee_name',
        'required' => 'required'
    ));?>

    <br/>

    <?php echo form_label('SSN:', 'employee_ssn'); ?>
    <?php echo form_input('ssn',set_value('ssn','',FALSE),array(
        'id' => 'employee_ssn',
        'required' => 'required'
    ));?>
    <?php echo form_error('ssn'); ?>
    <br/>

    <?php echo form_label('TIN:', 'employee_tin'); ?>
    <?php echo form_input('tin',set_value('tin','',FALSE),array(
        'id' => 'employee_tin',
        'required' => 'required'
    ));?>

    <br/>

    <?php echo form_submit('submit', 'Mentés'); ?>
<?php echo form_close(); ?>