<?php
global $cfg;

$options = array('template' => 'simple', 'filterVisibility' => true);

?>
<h3 class="drag-handle"><?php echo $info[':title']; ?></h3>
<b><a class="close" href="#"><i class="icon-remove-circle"></i></a></b>
<div class="clear"></div>
<hr/>
<?php
if ($info['error']) {
    echo sprintf('<p id="msg_error">%s</p>', $info['error']);
} elseif ($info['warn']) {
    echo sprintf('<p id="msg_warning">%s</p>', $info['warn']);
} elseif ($info['msg']) {
    echo sprintf('<p id="msg_notice">%s</p>', $info['msg']);
} elseif ($info['notice']) {
   echo sprintf('<p id="msg_info"><i class="icon-info-sign"></i> %s</p>',
           $info['notice']);
}

$action = $info[':action'] ?: ('#');
?>
<div style="display:block; margin:5px;">
<form method="post" name="inline_update" id="inline_update"
    action="<?php echo $action; ?>">
    <table width="100%">
        <?php
        if ($info[':extra']) {
            ?>
        <tbody>
            <tr><td colspan="2"><strong><?php echo $info[':extra'];
            ?></strong></td> </tr>
        </tbody>
        <?php
        }
       ?>
        <tbody>
          <tr>
            <td colspan=2>
              <div class="flush-left mycustom-field" id="field_new_ticket_number">
                    <div>
                                  <div class="field-label ">
                    <label for="_new_ticket_number">
                        ID Ticket relativo:
                                  </label>
                    </div>
                                                      </div><div>
                                        <input type="text" id="_new_ticket_number" size="16" placeholder="" name="new_ticket_number" value="">
                                        </div>
                                        </div>
            </td>
          </tr><tr>
            <td colspan=2>
             <?php
              include 'dynamic-form-simple.tmpl.php';
             ?>
           </td>
         </tr>
        </tbody>
    </table>
    <hr>
    <p class="full-width">
        <span class="buttons pull-left">
            <input type="button" name="cancel" class="close"
            value="<?php echo __('Cancel'); ?>">
        </span>
        <span class="buttons pull-right">
            <input type="submit" value="<?php
            echo $verb ?: __('Update'); ?>">
        </span>
     </p>
</form>
</div>
<div class="clear"></div>
<script type="text/javascript">
  $("div.custom-field>div>input")[0].setAttribute("value", "<?php echo $task->getNumber(); ?>");
</script>
