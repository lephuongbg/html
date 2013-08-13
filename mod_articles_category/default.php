<?php
defined('_JEXEC') or die;
?>
<ul class="articles">
	<?php foreach ($list as $item) : ?>
     <?php $images= json_decode($item->images);?>
	    <li>
        <a href="<?php echo $item->link; ?>" title="<?php echo $item->title; ?>">
        	<img src="<?php echo $images->image_intro; ?>" />
			<?php echo $item->title; ?>
            <br />
            <small><?php echo JHtml::_('date', $item->publish_up, JText::_('DATE_FORMAT_LC3')); ?></small>            <div class="clr"></div>
      	</a>
        </li>     
	<?php endforeach; ?>
</ul>


