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

class DirectoryVariable
{
    public function plugins()
    {
        return craft()->directory->plugins();
    }
}