<?php
defined('_JEXEC') or die;
if (count($this->items[$this->parent->id]) > 0 && $this->maxLevelcat != 0) :
?>
<ul class="catSubList">
<?php foreach($this->items[$this->parent->id] as $id => $item) : ?>
	<?php
	if ($this->params->get('show_empty_categories_cat') || $item->numitems || count($item->getChildren())) :
	if (!isset($this->items[$this->parent->id][$id + 1]))
	{
		$class = ' class="last"';
	}
	?>
	<li<?php echo $class; ?>>
	<?php $class = ''; ?>
    	<a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($item->id));?>"><img src="<?php echo $item->getParams()->get('image'); ?>" class="catImg" alt="<?php echo $this->escape($item->title); ?>" title="<?php echo $this->escape($item->title); ?>"/></a>
        
		<h3 class="catTitle"><a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($item->id));?>">
			<?php echo $this->escape($item->title); ?></a>
		</h3>
		<?php if ($this->params->get('show_subcat_desc_cat') == 1) :?>
		<?php if ($item->description) : ?>
		<p class="catDesc">
			<?php echo mb_substr(strip_tags(JHtml::_('content.prepare', $item->description)),0, 150, 'UTF-8'); if (strlen(strip_tags(JHtml::_('content.prepare', $item->description)))>150) echo '...'; ?>
        </p>	
		<?php endif; ?>
        <?php endif; ?>
		<?php if ($this->params->get('show_cat_num_articles_cat') == 1) :?>
		<p class="catItemCount">
				<?php echo JText::_('COM_CONTENT_NUM_ITEMS'); ?> <?php echo $item->numitems; ?>
			</p>	
		<?php endif; ?>
		<div class="clr"></div>
		<?php if (count($item->getChildren()) > 0) :
			$this->items[$item->id] = $item->getChildren();
			$this->parent = $item;
			$this->maxLevelcat--;
			echo $this->loadTemplate('links');
			$this->parent = $item->getParent();
			$this->maxLevelcat++;
		endif; ?>
        
        <div class="clr"></div>
	</li>
	<?php endif; ?>
<?php endforeach; ?>
</ul>
<?php endif; ?>