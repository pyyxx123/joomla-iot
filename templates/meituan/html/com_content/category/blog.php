<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');

JHtml::_('behavior.caption');

$dispatcher = JEventDispatcher::getInstance();

$this->category->text = $this->category->description;
$dispatcher->trigger('onContentPrepare', array($this->category->extension . '.categories', &$this->category, &$this->params, 0));
$this->category->description = $this->category->text;

$results = $dispatcher->trigger('onContentAfterTitle', array($this->category->extension . '.categories', &$this->category, &$this->params, 0));
$afterDisplayTitle = trim(implode("\n", $results));

$results = $dispatcher->trigger('onContentBeforeDisplay', array($this->category->extension . '.categories', &$this->category, &$this->params, 0));
$beforeDisplayContent = trim(implode("\n", $results));

$results = $dispatcher->trigger('onContentAfterDisplay', array($this->category->extension . '.categories', &$this->category, &$this->params, 0));
$afterDisplayContent = trim(implode("\n", $results));

?>
<div>
    <article class="post post-with-tags">
        <header class="post-title"><a href="/binlog_dw.html">美团DB数据同步到数据仓库的架构与实践</a></header>

        <div class="post-meta"><span class="post-meta-author">萌萌 心序 成聪</span><span class="post-meta-ctime">2018-12-06</span>
        </div>
        <p class="post-abstract">
            DB数据是大数据场景下进行数据分析与挖掘的重要数据来源，是ODS层数据的重要构成部分。本文主要从Binlog流式采集和基于Hive的ODS数据生产两方...</p>
        <footer class="post-tags"><a class="tag" href="/tag/后台"><span class="tag_name">后台</span></a><a
                    class="tag" href="/tag/基础研发平台"><span class="tag_name">基础研发平台</span></a><a class="tag"
                                                                                              href="/tag/Binlog"><span
                        class="tag_name">Binlog</span></a><a class="tag" href="/tag/ODS"><span
                        class="tag_name">ODS</span></a><a class="tag" href="/tag/数据仓库"><span
                        class="tag_name">数据仓库</span></a></footer>
    </article>

	<?php if ($this->params->get('show_page_heading')) : ?>
		<div class="page-header">
			<h1> <?php echo $this->escape($this->params->get('page_heading')); ?> </h1>
		</div>
	<?php endif; ?>

	<?php if ($this->params->get('show_category_title', 1) or $this->params->get('page_subheading')) : ?>
		<h2> <?php echo $this->escape($this->params->get('page_subheading')); ?>
			<?php if ($this->params->get('show_category_title')) : ?>
				<span class="subheading-category"><?php echo $this->category->title; ?></span>
			<?php endif; ?>
		</h2>
	<?php endif; ?>

	<?php echo $afterDisplayTitle; ?>

	<?php if ($this->params->get('show_cat_tags', 1) && !empty($this->category->tags->itemTags)) : ?>
		<?php $this->category->tagLayout = new JLayoutFile('joomla.content.tags'); ?>
		<?php echo $this->category->tagLayout->render($this->category->tags->itemTags); ?>
	<?php endif; ?>

	<?php if ($beforeDisplayContent || $afterDisplayContent || $this->params->get('show_description', 1) || $this->params->def('show_description_image', 1)) : ?>
		<div class="category-desc clearfix">
			<?php if ($this->params->get('show_description_image') && $this->category->getParams()->get('image')) : ?>
				<img src="<?php echo $this->category->getParams()->get('image'); ?>" alt="<?php echo htmlspecialchars($this->category->getParams()->get('image_alt'), ENT_COMPAT, 'UTF-8'); ?>"/>
			<?php endif; ?>
			<?php echo $beforeDisplayContent; ?>
			<?php if ($this->params->get('show_description') && $this->category->description) : ?>
				<?php echo JHtml::_('content.prepare', $this->category->description, '', 'com_content.category'); ?>
			<?php endif; ?>
			<?php echo $afterDisplayContent; ?>
		</div>
	<?php endif; ?>

	<?php if (empty($this->lead_items) && empty($this->link_items) && empty($this->intro_items)) : ?>
		<?php if ($this->params->get('show_no_articles', 1)) : ?>
			<p><?php echo JText::_('COM_CONTENT_NO_ARTICLES'); ?></p>
		<?php endif; ?>
	<?php endif; ?>

<!--    文章开始   -->

	<?php $leadingcount = 0; ?>
	<?php if (!empty($this->lead_items)) : ?>
		<div class="items-leading clearfix">
			<?php foreach ($this->lead_items as &$item) : ?>
				<div class="leading-<?php echo $leadingcount; ?><?php echo $item->state == 0 ? ' system-unpublished' : null; ?>"
					itemprop="blogPost" itemscope itemtype="https://schema.org/BlogPosting">
					<?php
					$this->item = &$item;
					echo $this->loadTemplate('item');
					?>
				</div>
				<?php $leadingcount++; ?>
			<?php endforeach; ?>
		</div><!-- end items-leading -->
	<?php endif; ?>

	<?php
	$introcount = count($this->intro_items);
	$counter = 0;
	?>

	<?php if (!empty($this->intro_items)) : ?>
		<?php foreach ($this->intro_items as $key => &$item) : ?>
			<?php $rowcount = ((int) $key % (int) $this->columns) + 1; ?>
			<?php if ($rowcount === 1) : ?>
				<?php $row = $counter / $this->columns; ?>
				<div class="items-row cols-<?php echo (int) $this->columns; ?> <?php echo 'row-' . $row; ?> row-fluid clearfix">
			<?php endif; ?>
			<div class="span<?php echo round(12 / $this->columns); ?>">
				<div class="item column-<?php echo $rowcount; ?><?php echo $item->state == 0 ? ' system-unpublished' : null; ?>"
					itemprop="blogPost" itemscope itemtype="https://schema.org/BlogPosting">
					<?php
					$this->item = &$item;
					echo $this->loadTemplate('item');
					?>
				</div>
				<!-- end item -->
				<?php $counter++; ?>
			</div><!-- end span -->
			<?php if (($rowcount == $this->columns) or ($counter == $introcount)) : ?>
				</div><!-- end row -->
			<?php endif; ?>
		<?php endforeach; ?>
	<?php endif; ?>

	<?php if (!empty($this->link_items)) : ?>
		<div class="items-more">
			<?php echo $this->loadTemplate('links'); ?>
		</div>
	<?php endif; ?>

	<?php if ($this->maxLevel != 0 && !empty($this->children[$this->category->id])) : ?>
		<div class="cat-children">
			<?php if ($this->params->get('show_category_heading_title_text', 1) == 1) : ?>
				<h3> <?php echo JText::_('JGLOBAL_SUBCATEGORIES'); ?> </h3>
			<?php endif; ?>
			<?php echo $this->loadTemplate('children'); ?> </div>
	<?php endif; ?>
	<?php if (($this->params->def('show_pagination', 1) == 1 || ($this->params->get('show_pagination') == 2)) && ($this->pagination->get('pages.total') > 1)) : ?>
		<div class="pagination">
			<?php if ($this->params->def('show_pagination_results', 1)) : ?>
				<p class="counter pull-right"> <?php echo $this->pagination->getPagesCounter(); ?> </p>
			<?php endif; ?>
			<?php echo $this->pagination->getPagesLinks(); ?> </div>
	<?php endif; ?>
</div>