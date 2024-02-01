<?php

namespace Invoicetic\Common\UnitCode;

class UnitCodeName
{
    protected $data;

    public function __construct($data = [])
    {
        $this->data = $data;
        $this->loadData();
    }

    public static function for($code, $lang = null)
    {
        $instance = static::instance();
        return $instance->get($code, $lang);
    }

    protected function get($code, $lang = null)
    {
        $lang = $lang ?: 'en';
        return $this->data[$lang][$code] ?? $code;
    }

    protected function loadData()
    {
        $langs = ['en', 'ro'];
        foreach ($langs as $lang) {
            $this->data[$lang] = $this->loadDataForLang($lang);
        }
    }

    protected function loadDataForLang($lang)
    {
        $data = [];
        $path = __DIR__ . '/data/' . $lang . '.php';
        if (file_exists($path)) {
            $data = require $path;
        }
        return $data;
    }

    /**
     * Singleton
     *
     * @return self
     */
    protected static function instance()
    {
        static $instance;
        if (!($instance instanceof static)) {
            $instance = new static();
        }
        return $instance;
    }
}

