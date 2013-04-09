<?php foreach($notes as $key => $note):?>
<option value="<?php echo $key?>"><?php echo h($note)?></option>
<?php endforeach;?>