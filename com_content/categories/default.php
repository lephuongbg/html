<?php
defined('_JEXEC') or die;
JHtml::addIncludePath(JPATH_COMPONENT.'/helpers');
?>

<div class="cB viewCatListDefault">
<?php if ($this->params->get('show_page_heading', 1)) : ?>
<h2 class="pageHeading">
	<?php echo $this->escape($this->params->get('page_heading')); ?>
</h2 class="pageHeading">
<?php endif; ?>
<?php if ($this->params->get('show_base_description')) : ?>
	<?php 	//If there is a description in the menu parameters use that; ?>
		<?php if($this->params->get('categories_description')) : ?>
			<div class="catDesc">
            	<p><?php echo  JHtml::_('content.prepare',$this->params->get('categories_description')); ?></p>
            </div>
		<?php  else: ?>
			<?php //Otherwise get one from the database if it exists. ?>
			<?php  if ($this->parent->description) : ?>
				<div class="catDesc">
					<?php  echo JHtml::_('content.prepare', $this->parent->description); ?>
				</div>
			<?php  endif; ?>
		<?php  endif; ?>
	<?php endif; ?>
<?php
echo $this->loadTemplate('items');
?>
</div>