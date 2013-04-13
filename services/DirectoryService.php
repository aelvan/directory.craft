<?php

/**
 * Craft Analytics
 *
 * @package     Craft Analytics
 * @version     Version 1.0
 * @author      Benjamin David
 * @copyright   Copyright (c) 2013 - DUKT
 * @link        http://dukt.net/add-ons/craft/analytics/
 *
 */

namespace Craft;

class DirectoryService extends BaseApplicationComponent
{
    public function plugins()
    {
        $plugins = CRAFT_PLUGINS_PATH.'directory/config/plugins.json';

        $plugins = file_get_contents($plugins);

        $plugins = (array) json_decode($plugins);

        return $plugins;
    }
}

