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
use \Joomla\CMS\Language\Text;

require_once JPATH_THEMES . '/' . $this->template . '/helper.php';
tplMeituanHelper::initJsAndCss();
tplMeituanHelper::loadCss();
tplMeituanHelper::loadJs();
tplMeituanHelper::setMetadata();
?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<jdoc:include type="head" />
</head>
<body class="holygrail pg-index">
<div class="holygrail-body">
    <div class="nav-bar">
        <div class="nav-bar-inner"><a class="nav-bar-logo" href="/"><img src="https://tech.meituan.com/css/s/logo.svg"></a><span
                class="nav-bar-site-title"><a href="/"><?php echo tplMeituanHelper::getSitename(); ?></a></span>
            <button class="nav-bar-btn"><span class="icon-bar"></span><span class="icon-bar"></span><span
                    class="icon-bar"></span></button>
        </div>

        <!--nav start-->
        <div class="nav-bar-tabs">
            <jdoc:include type="modules" name="position-0" style="none" />
        </div>
        <!--nav end-->
    </div>
            <jdoc:include type="message" />
            <jdoc:include type="component" />
    </div>
</div>
<div class="qr_code_btn_container">
    <a class="qr_code_btn_link" href="javascript: void(0)">
        <span class="qr_code_btn">
            <img src="https://tech.meituan.com/img/qr_icon.png">
        </span>
    </a>
    <div class="qr_code">
        <div class="content" id="qr_code_btn"><p class="title">关注我们</p>
            <p class="desktop_qr_tittle">扫码关注技术博客</p>
            <img class="qr_img" src="https://tech.meituan.com/img/qrcode_for_gh.jpg">
            <p class="tips">微信搜索 "美团技术团队"</p></div>
    </div>
    <a href="javascript:window.scrollToTopHandle()"><span class="top_btn"></span></a></div>

<footer id="footer">
    <div id="hide"><a href="javascript:window.smoothScrollToTop()"><img src="https://tech.meituan.com/css/s/top.png"></a></div>
    <div class="ft"><span class="copyright">© 2018 美团技术团队</span><span class="copyright">All rights reserved.</span>
    </div>
</footer>

<script type="text/javascript">
    (function () {
        var dis = document.getElementById('hide');
        window.onscroll = function () {
            if (window.scrollY >= 100) {
                dis.setAttribute('Id', 'toTop');
            } else {
                dis.setAttribute('Id', 'hide');
            }
        }
    })()

    function changeShowYear(e) {
        var ele = e.target;
        if (ele.tagName !== "SPAN") {
            return;
        }
        var text = ele.innerHTML;
        var yearTags = document.querySelectorAll(".year_header span");

        for (var i in yearTags) {
            if (yearTags.hasOwnProperty(i)) {
                yearTags[i].setAttribute("class", "enable_year");
            }
        }
        ele.setAttribute("class", "active_year");

        var queryFlag = "[data-year='" + text + "']";
        var allList = document.querySelectorAll(".post-list");
        var showYearEle = document.querySelector(queryFlag);

        for (var i in allList) {
            if (allList.hasOwnProperty(i)) {
                allList[i].setAttribute("class", "post-list hide");
            }
        }
        showYearEle.setAttribute("class", "post-list active");
    }

    var tagYear = document.querySelector(".year_header");
    if (tagYear) {
        tagYear.addEventListener("click", changeShowYear, false);
    }

</script>

</body>
</html>