<?php
/**
 * @package		Joomla.Site
 * @subpackage	com_content
 * @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

// Create a shortcut for params.
$params = &$this->item->params;
$images = json_decode($this->item->images);
$canEdit	= $this->item->params->get('access-edit');
JHtml::addIncludePath(JPATH_COMPONENT.'/helpers/html');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.framework');

?>
<div class="intro-article">
	<a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid)); ?>" class="intro-item-link" title="<?php echo $this->item->title;?>">
    <div class="intro-article-image">
        	<?php 			
			$imgurl = (empty($images->image_intro)) ? 'http://placehold.it/400x300' : $images->image_intro;
			$imgalt = (empty($images->image_intro_alt)) ? $this->item->title : $images->image_intro_alt;
			?>
            <img src="<?php echo $imgurl; ?>" alt="<?php echo $imgalt;?>" title="<?php echo $imgalt;?>"/>
        </div>
    <h2 class="intro-article-title">
    	<?php echo $this->item->title;?>
    </h2>
    <div class="intro-article-info">
    	<span class="intro-item-category">            	
                <?php echo $this->escape($this->item->category_title); ?>					
            </span>
            <span class="intro-article-create">
                <?php echo JHtml::_('date', $this->item->created, JText::_('DZ_DATE_FORMAT_1')); ?>
            </span>
            <span class="intro-hits">
            	<?php echo JText::sprintf('COM_CONTENT_ARTICLE_HITS', $this->item->hits); ?>
            </span>
    </div>
    <div class="intro-article-text">
    	<p><?php echo mb_substr(strip_tags($this->item->introtext),0,100,"UTF-8") ;?>...</p>
    </div>
    <div class="intro-article-readmore">
        	<span class="readmore"><?php echo JText::_('DZ_READ_MORE');?></span>
        </div>
    
    </a>
</div>