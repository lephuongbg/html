<?php
/**
 * @package		DZ Core Template
 * @update		April 2013
 * @copyright	Copyright © 2013 DZ Creative Studio. All rights reserved.
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
<a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid)); ?>" class="leading-article-link" title="<?php echo $this->item->title;?>">
<div class="row-fluid">
	<div class="span5">
    	<div class="leading-article-image">
        	<?php 
			$imgfloat = (empty($images->float_intro)) ? $params->get('float_intro') : $images->float_intro; 
			$imgurl = (empty($images->image_intro)) ? 'http://placehold.it/400x300' : $images->image_intro;
			$imgalt = (empty($images->image_intro_alt)) ? $this->item->title : $images->image_intro_alt;
			?>
            <img src="<?php echo $imgurl; ?>" alt="<?php echo $imgalt;?>" title="<?php echo $imgalt;?>"/>
        </div>
    </div>
    <div class="span7">
		<h2 class="leading-article-title">		
			<?php echo $this->escape($this->item->title); ?>
		</h2>
        <div class="leading-article-info">        
            <span class="leading-article-category">            	
                <?php echo $this->escape($this->item->category_title); ?>					
            </span>
            <span class="leading-article-create">
                <?php echo JHtml::_('date', $this->item->created, JText::_('DZ_DATE_FORMAT_1')); ?>
            </span>
            <span class="leading-article-hits">
            	<?php echo JText::sprintf('COM_CONTENT_ARTICLE_HITS', $this->item->hits); ?>
            </span>
        </div>
        <div class="leading-article-text">
        	<p><?php echo mb_substr(strip_tags($this->item->introtext),0,150,"UTF-8") ;?>...</p>
        </div>
        <div class="leading-article-readmore">
        	<span class="readmore"><?php echo JText::_('DZ_READ_MORE');?></span>
        </div>
    </div>
</div>
</a>


