<?php

/**
 * @see       https://github.com/laminas/laminas-captcha for the canonical source repository
 * @copyright https://github.com/laminas/laminas-captcha/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-captcha/blob/master/LICENSE.md New BSD License
 */

namespace LaminasTest\Captcha\TestAsset;

class SessionContainer
{
    protected static $_word;

    public function __get($name)
    {
        if ('word' == $name) {
            return self::$_word;
        }

        return null;
    }

    public function __set($name, $value)
    {
        if ('word' == $name) {
            self::$_word = $value;
        } else {
            $this->$name = $value;
        }
    }

    public function __isset($name)
    {
        if (('word' == $name) && (null !== self::$_word))  {
            return true;
        }

        return false;
    }

    public function __call($method, $args)
    {
        switch ($method) {
            case 'setExpirationHops':
            case 'setExpirationSeconds':
                $this->$method = array_shift($args);
                break;
            default:
        }
    }
}
