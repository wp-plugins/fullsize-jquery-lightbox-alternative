<?php
$fullsize_options =  get_option('fullsize_plugin');

/* Check for admin Options submission and update options*/
if ('process' == $_POST['stage']) {
    $new_options = array();

    foreach($fullsize_options as $key => $option){
        $new_options[$key] = $_POST[strtolower($key)];
    }
    $new_options['extraTrigger'] = ($_POST['extratrigger'] == 'null') ? '' : $_POST['extratrigger'] ;
    $new_options['shadow'] = ($_POST['shadow'] == 1) ? true : false ;
    $new_options['forceTitleBar'] = ($_POST['forcetitlebar'] == 1) ? true : false ;

    update_option('fullsize_plugin', $new_options);
    $fullsize_options = $new_options;
}

?>

<div class="wrap">
  <h2><?php _e('Fullsize Options', 'fullsize') ?></h2>
  <form name="form1" method="post" action="<?php echo $options_page ?>&amp;updated=true">
	<input type="hidden" name="stage" value="process" />
    <table width="100%" cellspacing="2" cellpadding="5" class="form-table">




<tr valign="baseline">
    <th scope="row"><?php _e('Display Shadow', 'fullsize') ?></th>
    <td><?php
        if($fullsize_options['shadow'] == true) {
         	echo('<input type="checkbox" name="shadow" value="1" checked="checked" />');
        } else {
			echo('<input type="checkbox" name="shadow" value="1" />');
        }
        ?>
        <div><small><?php _e('Puts a drop shadow around the image when it is clicked.', 'fullsize') ?></small></div>
    </td>
</tr>

<tr valign="baseline">
    <th scope="row"><?php _e('Zoom in Speed', 'fullsize') ?></th>
    <td>
        <input type="text" value="<?php echo $fullsize_options['zoomInSpeed'] ?>" name="zoominspeed" />
        <div><small><?php _e('number (200 by default) : Speed to zoom in the image on click.', 'fullsize') ?></small></div>
    </td>
</tr>

<tr valign="baseline">
    <th scope="row"><?php _e('Zoom out Speed', 'fullsize') ?></th>
    <td>
        <input type="text" value="<?php echo $fullsize_options['zoomOutSpeed'] ?>" name="zoomoutspeed" />
        <div><small><?php _e('number (200 by default) : Speed to zoom out the image on click.', 'fullsize') ?></small></div>
    </td>
</tr>

<tr valign="baseline">
    <th scope="row"><?php _e('Fade in Speed', 'fullsize') ?></th>
    <td>
        <input type="text" value="<?php echo $fullsize_options['fadeInSpeed'] ?>" name="fadeinspeed" />
        <div><small><?php _e('number (250 by default) : Speed to fade in the image on click.', 'fullsize') ?></small></div>
    </td>
</tr>

<tr valign="baseline">
    <th scope="row"><?php _e('Fade out Speed', 'fullsize') ?></th>
    <td>
        <input type="text" value="<?php echo $fullsize_options['fadeOutSpeed'] ?>" name="fadeoutspeed" />
        <div><small><?php _e('number (250 by default) : Speed to fade out the image on click.', 'fullsize') ?></small></div>
    </td>
</tr>

<tr valign="baseline">
    <th scope="row"><?php _e('Left Offset', 'fullsize') ?></th>
    <td>
        <input type="text" value="<?php echo $fullsize_options['leftOffset'] ?>" name="leftoffset" />
        <div><small><?php _e('number (0 by default) : Offsets the Fullsize Popup Image to the left the number of pixels specified.', 'fullsize') ?></small></div>
    </td>
</tr>

<tr valign="baseline">
    <th scope="row"><?php _e('Top Offset', 'fullsize') ?></th>
    <td>
        <input type="text" value="<?php echo $fullsize_options['topOffset'] ?>" name="topoffset" />
        <div><small><?php _e('number (0 by default) : Offsets the Fullsize Popup Image from the top the number of pixels specified.', 'fullsize') ?></small></div>
    </td>
</tr>

<tr valign="baseline">
    <th scope="row"><?php _e('Icon Offset', 'fullsize') ?></th>
    <td>
        <input type="text" value="<?php echo $fullsize_options['iconOffset'] ?>" name="iconoffset" />
        <div><small><?php _e('number (8 by default) : Offsets the Fullsize Icon (top & left) by the number of pixels specified, relative to the current element.', 'fullsize') ?></small></div>
    </td>
</tr>

<tr valign="baseline">
    <th scope="row"><?php _e('Force Title Bar', 'fullsize') ?></th>
    <td><?php
        if($fullsize_options['forceTitleBar'] == true) {
         	echo('<input type="checkbox" name="forcetitlebar" value="1" checked="checked" />');
        } else {
			echo('<input type="checkbox" name="forcetitlebar" value="1" />');
        }
        ?>
        <div><small><?php _e('true or false (false by default) : Forces the Title Bar to be present even when the Title attribute is empty.', 'fullsize') ?></small></div>
    </td>
</tr>

<tr valign="baseline">
    <th scope="row"><?php _e('Extra Trigger', 'fullsize') ?></th>
    <td>
        <input type="text" value="<?php echo $fullsize_options['extraTrigger'] ?>" name="extratrigger" />
        <div><small><?php _e('selector (null by default) : Selector of an extra Fullsize popup trigger. Adds an additional Fullsize Icon to the Selector Element. Requires parentSteps.', 'fullsize') ?></small></div>
    </td>
</tr>

<tr valign="baseline">
    <th scope="row"><?php _e('Parent Steps', 'fullsize') ?></th>
    <td>
        <input type="text" value="<?php echo $fullsize_options['parentSteps'] ?>" name="parentsteps" />
        <div><small><?php _e('number (0 by default) : Climbs up the number of parents specified starting from the current element, then looks for extraTrigger. Requires extraTrigger.', 'fullsize') ?></small></div>
    </td>
</tr>

</table>

    <p class="submit">
      <input type="submit" name="Submit" value="<?php _e('Save Changes', 'fullsize') ?>" />
    </p>
  </form>
</div>