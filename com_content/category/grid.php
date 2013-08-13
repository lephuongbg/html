<?php
/**
 * @version		$Id: blog.php 20960 2011-03-12 14:14:00Z chdemko $
 * @package		Joomla.Site
 * @subpackage	com_content
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT.'/helpers');

?>
<div class="comBody contentGrid<?php echo $this->pageclass_sfx;?>">
<!-- PAGE HEADING -->
<?php if ($this->params->get('show_page_heading', 1)) : ?>
	<h3 class="row pageHeading">
    	<?php echo $this->escape($this->params->get('page_heading')); ?>
	</h3>
<?php endif; ?>

<!-- PAGE SUBHEADING + IMAGE + DESCRIPTION -->


<?php if ($this->escape($this->params->get('page_headingtag'))) : ?>
		<h1 class="row pageHeadingTag">
			<strong><em><?php echo $this->escape($this->params->get('page_headingtag')); ?></em></strong>
		</h1>
<?php endif; ?>


<?php if ($this->params->get('show_category_title')) :?>
<h3 class="row blogTitle">
	<?php echo $this->category->title;?>
</h3>
<?php endif;?>

<!-- GRID -->
<ul class="gridLayout" title="<?php echo $this->escape($this->params->get('page_subheading')); ?>">

<?php $leadingcount=0 ; ?>
<?php if (!empty($this->lead_items)) : ?>
	<?php foreach ($this->lead_items as &$item) : ?>
		<li class="item<?php echo ($leadingcount+1); ?><?php echo $item->state == 0 ? ' system-unpublished' : null; ?> <?php if (($leadingcount+1) % 4 ==0) :?>last<?php endif ;?>">
        	
			<?php
				$this->item = &$item;
				echo $this->loadTemplate('item');
			?>
		</li>
		<?php $leadingcount++;	?>
	<?php endforeach; ?>
<?php endif; ?>
<div class="clr"></div>
</ul>



<!-- SUB CATEGORIES -->

<?php if (!empty($this->children[$this->category->id])&& $this->maxLevel != 0) : ?>
		<div class="cat-children">
		<h3 class="row">
<?php echo JTEXT::_('JGLOBAL_SUBCATEGORIES'); ?>
</h3>
			<?php echo $this->loadTemplate('children'); ?>
		</div>
	<?php endif; ?>
    
    
<!-- DESC & IMAGE -->

<?php if ($this->params->get('page_footertag')) : ?>
		<h1 class="row pageFooterTag">
			<strong><em><?php echo $this->escape($this->params->get('page_footertag')); ?></em></strong>
        </h1>
<?php endif; ?>
    
<!-- PAGINATION -->    

<?php if (($this->params->def('show_pagination', 1) == 1  || ($this->params->get('show_pagination') == 2)) && ($this->pagination->get('pages.total') > 1)) : ?>

<div class="row pagination small">
						<?php  if ($this->params->def('show_pagination_results', 1)) : ?>
						<span class="floatR counter">
								<?php echo $this->pagination->getPagesCounter(); ?>
						</span>

				<?php endif; ?>
				<?php echo $this->pagination->getPagesLinks(); ?>
</div>
<?php  endif; ?>

</div>
