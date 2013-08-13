<?php
/**
 * @package		DZ Joomla 2.5
 * @subpackage	mod_custom
 * @layout		default
 * @version		1.0
 * @date		10/2012
 */
defined('_JEXEC') or die;

?>
<a href="<?php echo $sitename ?>" title="<?php echo $sitename;?>" class="dz-logo">
<?php if ($logo): ?>
<img src="<?php echo $this->baseurl ?>/<?php echo htmlspecialchars($logo); ?>"  alt="<?php echo $sitename;?>" />
<?php else:?>
<h1><?php echo $sitename;?></h1>
<?php endif;?>
</a>
