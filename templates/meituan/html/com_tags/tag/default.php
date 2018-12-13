<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_tags
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Note that there are certain parts of this layout used only when there is exactly one tag.
JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');
$isSingleTag = count($this->item) === 1;

?>


<div class="main">
    <div class="tag_header"><span><?php echo JHtml::_('content.prepare', $this->tags_title, '', 'com_tag.tag'); ?></span>
        <form action="//google.com/search" class="search" method="get" target="_blank">
            <div class="search_box"><input class="search_input" name="q" type="text">
                <input name="q" type="hidden" value="site:tech.meituan.com">
                <input name="gw_rd" type="hidden" value="cr">
                <input id="search_submit" type="submit">
                <label for="search_submit"></label>
            </div>
        </form>
    </div>
    <section class="post-list">
	<?php echo $this->loadTemplate('items'); ?>
    </section>

</div>
