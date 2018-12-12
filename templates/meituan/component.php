<?php
/**
 * @package    meituan
 *
 * @author     姚信选 <pyyxx1234@qq.com>
 * @copyright  澜创科技 copyright 2018
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @link       http://iot.lantrue.net
 */

defined('_JEXEC') or die;

use \Joomla\CMS\Factory;

require_once JPATH_THEMES . '/' . $this->template . '/helper.php';

// Output as HTML5
$doc->setHtml5(true);

tplMeituanHelper::loadCss();

?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<jdoc:include type="head" />
</head>
<body class="contentpane modal">
	<jdoc:include type="message" />
	<jdoc:include type="component" />
</body>
</html>