<?php

/**
 * Craft Directory by Dukt
 *
 * @package   Craft Directory
 * @author    Benjamin David
 * @copyright Copyright (c) 2013, Dukt
 * @license   http://docs.dukt.net/craft/directory/license
 * @link      http://dukt.net/craft/directory
 */

namespace Craft;

class Directory_PluginController extends BaseController
{
    public function actionDownload()
    {
        $key = craft()->request->getParam('key');

        if(craft()->directory->download($key)) {
            $redirect = UrlHelper::getActionUrl('directory/plugin/install', array('key' => $key));

            $this->redirect($redirect);
        } else {
            $this->redirect('directory');
        }
    }

    public function actionInstall()
    {
        $key = craft()->request->getParam('key');

        $install = craft()->directory->install($key);

        if($install['success']) {
            craft()->userSession->setNotice(Craft::t('Plugin installed.'));
        } else {
            craft()->userSession->setError(Craft::t('Couldn’t install plugin.'));
        }

        $this->redirect('directory');
    }

    public function actionUninstall()
    {
        $key = craft()->request->getParam('key');

        $uninstall = craft()->directory->uninstall($key);

        if($uninstall['success']) {
            craft()->userSession->setNotice(Craft::t('Plugin uninstalled.'));
        } else {
            craft()->userSession->setError(Craft::t('Couldn’t uninstall plugin.'));
        }

        $this->redirect('directory');
    }

    public function actionUpdate()
    {
        $key = craft()->request->getParam('key');

        $download = craft()->directory->download($key);

        if($download['success']) {
            craft()->userSession->setNotice(Craft::t('Plugin files have been replaced.'));
        } else {
            craft()->userSession->setError(Craft::t('Couldn’t replace plugin files.'));
        }

        $this->redirect('directory');
    }
}