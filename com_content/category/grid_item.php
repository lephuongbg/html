<?php
/**
 * @version		$Id: blog_item.php 21092 2011-04-06 17:12:16Z infograf768 $
 * @package		Joomla.Site
 * @subpackage	com_content
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT.DS.'helpers');
// Create a shortcut for params.
$params = &$this->item->params;


$canEdit	= $this->item->params->get('access-edit');
JHtml::addIncludePath(JPATH_COMPONENT.'/helpers/html');
JHtml::_('behavior.tooltip');
JHtml::core();

$customdata = $this->item->metadata;
if ($customdata->get('custom_pagetitle')) {
$alt = $customdata->get('custom_pagetitle');
} else {
$alt = $this->item->title;
}

if ($customdata->get('itemimg')) {
$itemimg = '<img src="'.$customdata->get('itemimg').'" alt="'.$alt.'" class="itemImg"/>' ;
} else {
$itemimg = '<img src="images/defaultimg.jpg" alt="'.$alt.'" class="itemImg"/>' ;
}

$prize = number_format($customdata->get('cf_prize'), 0, ',', '.');
?>



<!-- IMG & TITLE -->

<?php if ($params->get('show_title')) : ?>
<?php if ($params->get('access-view')) : ?>
			<a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid)); ?>" title="<?php echo $this->item->title;?>">
				<?php echo $itemimg ;?>
				<h2 class="row itemTitle">
				<strong><?php echo $this->escape($this->item->title); ?></strong>
                </h2>
			</a>
		<?php else : ?>
        		<?php echo $itemimg ;?>
                <h2 class="row itemTitle">
				<strong><?php echo $this->escape($this->item->title); ?></strong>
                </h2>
		<?php endif; ?>	
<?php endif; ?>
<div class="row itemCategory">
<?php echo $this->escape($this->item->category_title); ?>
</div>
<div class="row itemPrize">

	<?php echo $prize ;?> <span class="currency"><?php echo $customdata->get('cf_currency');?></span>
</div>

<!--  INFO
<div class="row small info">
	<?php if ($params->get('show_create_date')) : ?>
		<span class="date">
		<?php echo JText::sprintf(JHtml::_('date',$this->item->created, JText::_('DATE_FORMAT_LC3'))); ?>
		</span>
	<?php endif; ?>
	<?php if ($params->get('show_category')) : ?>
		 | <span class="category"><?php echo $this->escape($this->item->category_title); ?></span>
	<?php endif; ?>
</div>
 
FIELDS
<div class="row fields">
	<span class="field1">Kh&#7903;i h&agrave;nh: <?php echo $customdata->get('cf_time');?></span><br />
	<span class="field2">Th&#7901;i gian: <?php echo ($customdata->get('cf_nights')-1);?> ng&agrave;y <?php echo $customdata->get('cf_nights');?> &#273;&ecirc;m</span><br />
<span class="field3">Di chuy&#7875;n: <?php echo $customdata->get('cf_transit');?></span><br />
	<span class="field4"><?php echo $customdata->get('custom_field4');?></span><br />    
</div>
<div class="row prize">
	<?php echo $customdata->get('cf_prize');?> <?php echo $customdata->get('cf_currency');?><span class="oldprize"><?php echo $customdata->get('cf_oldprize');?> <?php echo $customdata->get('cf_currency');?></span>
</div>
<?php if ($saleoff != 0) :?>
<div class="saleoff">
	<?php echo $saleoff;?> %
</div>
<?php endif;?>

 TEXT -->

<!--<div class="row text">
		// <?php echo substr(strip_tags($this->item->introtext),0,200); ?>
</div>-->

<!-- EDIT BUTTON -->
<?php if ($canEdit) : ?>
	<div class="admin small">
		<?php echo JHtml::_('icon.edit', $this->item, $params); ?>
	</div>
<?php endif; ?>



