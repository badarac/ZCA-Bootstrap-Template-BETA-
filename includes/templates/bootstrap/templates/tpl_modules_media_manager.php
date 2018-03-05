<?php
/**
 * Module Template
 * 
 * BOOTSTRAP v1.0.BETA
 *
 * @package templateSystem
 * @copyright Copyright 2003-2007 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_modules_media_manager.php 5952 2007-03-03 06:18:46Z drbyte $
 */
/**
 * require module to aggregate media clips to an array
 */
  require(DIR_WS_MODULES . zen_get_module_directory('media_manager.php'));
  if ($zv_product_has_media) {
?>

<!--bof media manager card-->
<div id="mediaManager-card" class="card mb-3">
    
<h2 id="mediaManager-card-header" class="card-header"><?php echo TEXT_PRODUCT_COLLECTIONS; ?></h2>

  <div id="mediaManager-card-body" class="card-body p-3">
<?php
  while (list($za_media_key, $za_media) = each($za_media_manager)) {
?>

      <div id="mediaManager-mediaTitle"><?php echo $za_media['text']; ?></div>
      
<?php
    $zv_counter1 = 0;
    while(list($za_clip_key, $za_clip) = each($za_media_manager[$za_media_key]['clips'])) {
?>
      <div class="mediaTypeLink"><a href="<?php echo zen_href_link(DIR_WS_MEDIA  . $za_clip['clip_filename'], '', 'NONSSL', false, true, true); ?>" target="_blank"><?php echo '<span class="mediaClipFilename">' . $za_clip['clip_filename'] . '</span>' . (!empty($za_clip['clip_type']) ? '<span class="mediaClipType"> (' . $za_clip['clip_type'] . ')</span>' : ''); ?></a></div>

<?php
    }
?>

<?php
  }
  }
?>
  </div>
</div>
<!--eof media manager card-->

