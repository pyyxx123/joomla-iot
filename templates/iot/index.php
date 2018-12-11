<?php
/**
 * @package    iot
 *
 * @author     姚信选 <pyyxx1234@qq.com>
 * @copyright  澜创科技 copyright 2018
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @link       http://iot.lantrue.net
 */

defined('_JEXEC') or die;

use \Joomla\CMS\Factory;
use \Joomla\CMS\Language\Text;

require_once JPATH_THEMES . '/' . $this->template . '/helper.php';
tplIotHelper::initJsAndCss();
tplIotHelper::loadCss();
tplIotHelper::loadJs();
tplIotHelper::setMetadata();
?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<jdoc:include type="head" />


</head>
<!--<div><?php echo tplIotHelper::setBodySuffix(); ?></div>-->
<body>


<nav role="navigation" >
	<jdoc:include type="modules" name="position-0" style="none" />
</nav>

<main id="main">
	<jdoc:include type="message" />
	<jdoc:include type="component" />
</main>


<footer>
	<jdoc:include type="modules" name="footer" style="none" />
	<p>
		&copy; <?php echo date('Y'); ?> <?php echo tplIotHelper::getSitename(); ?>
	</p>
</footer>

<jdoc:include type="modules" name="debug" style="none" />

</body>
</html>
