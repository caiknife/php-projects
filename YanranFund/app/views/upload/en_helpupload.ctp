<input type="hidden" name="attachments[]" value="<?php echo $data['id']?>" />
<a for="attachments" href="<?php echo $this->Format->getHelpAttachmentImage($data, true)?>" target="_blank"><?php echo h($data['banner_file_name'])?></a>