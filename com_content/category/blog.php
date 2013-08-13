<?php
/**
 * @package		DZ Core Template
 * @update		April 2013
 * @copyright	Copyright © 2013 DZ Creative Studio. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT.'/helpers');

?>
<div class="component-inner content-category<?php if($this->pageclass_sfx) echo ' '.$this->pageclass_sfx?>">

<!-- PAGE HEADING -->
<?php if ($this->params->get('show_page_heading')) : ?>
	<h1 class="page-heading">
		<?php echo $this->escape($this->params->get('page_heading')); ?>
	</h1>
	<?php endif; ?>
<!-- CATEGORY TITLE -->
<?php if ($this->params->get('show_category_title', 1) or $this->params->get('page_subheading')) : ?>
	<h2 class="category-heading">
		<?php echo $this->escape($this->params->get('page_subheading')); ?>
		<?php if ($this->params->get('show_category_title')) : ?>
			<span><?php echo $this->category->title;?></span>
		<?php endif; ?>
	</h2>
<?php endif; ?>

<?php if (($this->params->get('show_description') && $this->category->description ) || ($this->params->get('show_description_image') && $this->category->getParams()->get('image'))) : ?>
	<div class="category-desc">
	<?php if ($this->params->get('show_description_image') && $this->category->getParams()->get('image')) : ?>
		<img src="<?php echo $this->category->getParams()->get('image'); ?>"/>
	<?php endif; ?>
	<?php if ($this->params->get('show_description') && $this->category->description) : ?>
		<?php echo $this->category->description; ?>
	<?php endif; ?>	
	</div>
<?php endif; ?>

<?php $leadingcount=0 ; ?>
<?php if (!empty($this->lead_items)) : ?>
<div class="category-leading">
	<?php foreach ($this->lead_items as &$item) : ?>
		<div class="leading-article">
			<?php
				$this->item = &$item;
				echo $this->loadTemplate('item');
			?>
		</div>
		<?php
			$leadingcount++;
		?>
	<?php endforeach; ?>
</div>
<?php endif; ?>

<?php if (!empty($this->intro_items)) : ?>
<div class="category-intro">
	<?php foreach (array_chunk($this->intro_items, $this->columns) as $row) : ?>
    	<div class="row-fluid">
			<?php foreach ($row as $item) :?>
		<div class="span<?php echo 12/(int)$this->columns;?>"><?php
			$this->item = &$item;
			echo $this->loadTemplate('cell');
		?></div>
        	<?php endforeach ;?>
        </div>
	<?php endforeach; ?>
</div>
<?php endif; ?>

<?php if (!empty($this->link_items)) : ?>
	<div class="category-link">
	<?php echo $this->loadTemplate('links'); ?>
    </div>
<?php endif; ?>



<?php if (($this->params->def('show_pagination', 1) == 1  || ($this->params->get('show_pagination') == 2)) && ($this->pagination->get('pages.total') > 1)) : ?>
		<div class="dz-pagination">
						<?php  if ($this->params->def('show_pagination_results', 1)) : ?>
						<div class="counter">
								<?php echo $this->pagination->getPagesCounter(); ?>
						</div>

				<?php endif; ?>
				<?php echo $this->pagination->getPagesLinks(); ?>
		</div>
<?php  endif; ?>


</div>
