
<p class="file-info">
    <span class="filesize">(<?php echo $file->getReadableFileSize () ?>)</span>
    <span class="download-counter">
      <?php echo ($file->download_count == 0 ? __ ('Never downloaded') : (
                  $file->download_count == 1 ? __ ('Downloaded once') :
                                               __r('Download %x% times', array(
                                                'x' => (int) $file->download_count
      )))); // TODO ugly DIY plural ... ?>
    </span>
</p>
<p class="availability"><?php echo __r('Available from %from% to %to%', array (
    'from' => ($file->getAvailableFrom  ()->get (Zend_Date::MONTH) ==
               $file->getAvailableUntil ()->get (Zend_Date::MONTH)) ?
               $file->getAvailableFrom ()->toString ('d') : $file->getAvailableFrom ()->toString ('d MMMM'),
    'to' =>  '<b>'.$file->getAvailableUntil ()->toString ('d MMMM').'</b>')) // FIXME I18N ?>
</p>
<p class="filename">
  <?php // TODO add a copy to clipboard button ?>
  <a href="<?php echo $file->getDownloadUrl () ?>/download">
    <span class="filename"><?php echo h ( truncate_string ($file->file_name, 40)) ?></span>
    <span class="url"     ><?php echo str_replace (
            $file->getHash (), '<span class="hash">'.$file->getHash ().'</span>',
            $file->getDownloadUrl ()) ?></span>
  </a>
</p>
<p class="comment"><?php echo $file->comment ?> &nbsp;</p>
<div style="clear: both;"></div>
<ul class="actions">
  <li>
    <a href="<?php echo $file->getDownloadUrl () ?>/email" class="send-by-email">
      <?php echo __('Email') ?>
    </a>
  </li>
  <li>
    <a href="<?php echo $file->getDownloadUrl () ?>/delete" class="delete">
      <?php echo __('Delete') ?>
    </a>
  </li>
  <li>
    <a href="<?php echo $file->getDownloadUrl () ?>/extend" class="extend">
      <?php echo __('Extend one more day') ?>
    </a>
  </li>
</ul>

