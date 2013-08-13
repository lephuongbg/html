<?php
defined('_JEXEC') or die;
$title = $item->anchor_title ? 'title="'.$item->anchor_title.'" ' : '';
if ($item->menu_image) {
		$item->params->get('menu_text', 1 ) ?
		$linktype = '<img src="'.$item->menu_image.'" alt="'.$item->title.'" title="'.$item->title.'"/><span>'.$item->title.'</span> ' :
		$linktype = '<img src="'.$item->menu_image.'" alt="'.$item->title.'" title="'.$item->title.'" />';
}
else { $linktype = $item->title; }?>

<a class="separator"><span><?php echo $linktype; ?><?php if( $item->note) :?><em><?php echo $item->note;?></em><?php endif;?></span></a>

