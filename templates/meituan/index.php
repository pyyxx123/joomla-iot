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
    <div class="main">
        <div class="tag_header"><span>最新文章</span>
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
            <jdoc:include type="message" />
            <jdoc:include type="component" />

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
                <article class="post post-with-tags">
                    <header class="post-title"><a href="/renwuzhi_panweizeng.html">【人物志】技术十年：美团第一位前端工程师潘魏增</a></header>
                    <div class="post-meta"><span class="post-meta-author">技术学院</span><span class="post-meta-ctime">2018-12-06</span>
                    </div>
                    <p class="post-abstract">从饭否到美团，潘魏增用十年的技术生涯，诠释了“长期有耐心”这句话的含义。在他看来，长期有耐心，其实也是延迟满足感。</p>
                    <footer class="post-tags"><a class="tag" href="/tag/人物志"><span class="tag_name">人物志</span></a><a
                            class="tag" href="/tag/潘魏增"><span class="tag_name">潘魏增</span></a><a class="tag"
                                                                                                href="/tag/技术学院"><span
                                class="tag_name">技术学院</span></a><a class="tag" href="/tag/工程师文化"><span class="tag_name">工程师文化</span></a><a
                            class="tag" href="/tag/饭否"><span class="tag_name">饭否</span></a><a class="tag"
                                                                                              href="/tag/前端"><span
                                class="tag_name">前端</span></a><a class="tag" href="/tag/成长"><span class="tag_name">成长</span></a>
                    </footer>
                </article>

            </div>
            <footer class="more"><span class="rectangle"><a class="btn" href="https://tech.meituan.com/?l=40">查看更多</a></span></footer>
        </section>
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