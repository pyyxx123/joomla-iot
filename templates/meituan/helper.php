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
use \Joomla\CMS\HTML\HTMLHelper;
use \Joomla\CMS\Uri\Uri;

/**
 * Iot template helper.
 *
 * @package  meituan
 * @since    1.0
 */
class tplMeituanHelper
{
    static public function template()
    {
        return Factory::getApplication()->getTemplate();
    }

    static public function getPageOption()
    {
        //return str_replace('_', '-', Factory::getApplication()->input->getCmd('option', ''));
        return Factory::getApplication()->input->getCmd('option', '');
    }


    static public function getPageView()
    {
        return Factory::getApplication()->input->getCmd('view', '');
    }

    static public function getPageLayout()
    {
        return Factory::getApplication()->input->getCmd('layout', '');
    }


    static public function getPageTask()
    {
        return Factory::getApplication()->input->getCmd('task', '');
    }


    static public function getItemId()
    {
        return Factory::getApplication()->input->getInt('Itemid');
    }


    static public function getPageClass()
    {
        $activeMenu = Factory::getApplication()->getMenu()->getActive();
        $pageclass = ($activeMenu) ? $activeMenu->params->get('pageclass_sfx', '') : '';

        return $pageclass;
    }


    static public function isHome()
    {
        // Fetch the active menu-item
        $activeMenu = Factory::getApplication()->getMenu()->getActive();

        // Return whether this active menu-item is home or not
        return (boolean)($activeMenu) ? $activeMenu->home : false;
    }

    static public function getPath($output = 'array')
    {
        $path = Uri::getInstance()->getPath();
        $path = preg_replace('/^\//', '', $path);
        if ($output == 'array') {
            $path = explode('/', $path);

            return $path;
        }

        return $path;
    }


    static public function setBodySuffix()
    {
        $classes = array();
        $classes[] = 'option-' . self::getPageOption();
        $classes[] = 'view-' . self::getPageView();
        $classes[] = self::getPageLayout() ? 'layout-' . self::getPageLayout() : 'no-layout';
        $classes[] = self::getPageTask() ? 'task-' . self::getPageTask() : 'no-task';
        $classes[] = 'itemid-' . self::getItemId();
        $classes[] = self::getPageClass();
        $classes[] = self::isHome() ? 'path-home' : 'path-' . implode('-', self::getPath('array'));

        return implode(' ', $classes);
    }

    static public function setGenerator($generator)
    {
        Factory::getDocument()->setGenerator($generator);
    }


    static public function getSitename()
    {
        return Factory::getConfig()->get('sitename');
    }


    static public function setMetadata()
    {
        $doc = Factory::getDocument();

        $doc->setHtml5(true);
        $doc->setMetaData('X-UA-Compatible', 'IE=edge', true);
        $doc->setMetaData('viewport', 'width=device-width, initial-scale=1.0');
        self::setGenerator(self::getSitename());
    }


    static public function loadCss()
    {
        JHtml::_('stylesheet', 'template.css', ['version' => 'auto', 'relative' => true]);
        JHtml::_('stylesheet', 'https://tech.meituan.com/css/font-awesome.min.css', ['version' => 'auto', 'relative' => true]);
        // Check for a custom CSS file
        $userCss = JPATH_SITE . '/templates/' . self::template() . '/css/user.css';
        if (file_exists($userCss) && filesize($userCss) > 0) {
            JHtml::_('stylesheet', 'user.css', ['version' => 'auto', 'relative' => true]);
        }

    }


    static public function loadJs()
    {
        JHtml::_('script', 'https://tech.meituan.com/js/html5shiv.js', ['version' => 'auto']);
        JHtml::_('script', 'template.js', ['version' => 'auto', 'relative' => true]);
    }

    /**
     * 模版使用自己的js和css样式
     * 因此首先初始化系统默认的js和css
     * @author 姚信选
     * @since 1.0
     */
    static public function initJsAndCss()
    {
        $document = Factory::getDocument();
        unset($document->_script);
        unset($document->_scripts["/media/jui/js/jquery.min.js"]);
        unset($document->_scripts["/media/jui/js/jquery-noconflict.js"]);
        unset($document->_scripts["/media/jui/js/jquery-migrate.min.js"]);
        unset($document->_scripts["/media/system/js/caption.js"]);
    }

}