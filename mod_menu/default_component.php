<?php
defined('_JEXEC') or die;
$class = $item->anchor_css ? 'class="'.$item->anchor_css.'" ' : '';
$title = $item->anchor_title ? 'title="'.$item->anchor_title.'" ' : '';
if ($item->menu_image) {
		$item->params->get('menu_text', 1 ) ?
		$linktype = '<img src="'.$item->menu_image.'" alt="'.$item->title.'" title="'.$item->title.'"/><span>'.$item->title.'</span> ' :
		$linktype = '<img src="'.$item->menu_image.'" alt="'.$item->title.'" title="'.$item->title.'" />';
}
else { $linktype = '<span>'.$item->title.'</span>';
}

switch ($item->browserNav) :
	default:
	case 0:
?><a <?php echo $class; ?>href="<?php echo $item->flink; ?>" <?php echo $title; ?>><?php echo $linktype; ?><?php if( $item->note) :?><em><?php echo $item->note;?></em><?php endif;?></a><?php
		break;
	case 1:
	// _blank
?><a <?php echo $class; ?>href="<?php echo $item->flink; ?>" target="_blank" <?php echo $title; ?>><?php echo $linktype; ?><?php if( $item->note) :?><em><?php echo $item->note;?></em><?php endif;?></a><?php
		break;
	case 2:
	// window.open
?><a <?php echo $class; ?>href="<?php echo $item->flink; ?>" onclick="window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes');return false;" <?php echo $title; ?>><?php echo $linktype; ?><?php if( $item->note) :?><em><?php echo $item->note;?></em><?php endif;?></a>
<?php
		break;
endswitch; ?>