<?php

namespace Invoicetic\Common\Utility;

use Invoicetic\Common\Gateway\GatewayInterface;

class Helper
{
    /**
     * Convert a string to camelCase. Strings already in camelCase will not be harmed.
     *
     * @param  string  $str The input string
     * @return string camelCased output string
     */
    public static function camelCase($str)
    {
        $str = self::convertToLowercase($str);
        return preg_replace_callback(
            '/_([a-z])/',
            function ($match) {
                return strtoupper($match[1]);
            },
            $str
        );
    }

    /**
     * Convert strings with underscores to be all lowercase before camelCase is preformed.
     *
     * @param  string $str The input string
     * @return string The output string
     */
    protected static function convertToLowercase($str)
    {
        $explodedStr = explode('_', $str);
        $lowercasedStr = [];

        if (count($explodedStr) > 1) {
            foreach ($explodedStr as $value) {
                $lowercasedStr[] = strtolower($value);
            }
            $str = implode('_', $lowercasedStr);
        }

        return $str;
    }

    /**
     * Initialize an object with a given array of parameters
     *
     * Parameters are automatically converted to camelCase. Any parameters which do
     * not match a setter on the target object are ignored.
     *
     * @param mixed $target     The object to set parameters on
     * @param array $parameters An array of parameters to set
     */
    public static function initialize($target, array $parameters = null): void
    {
        if ($parameters) {
            foreach ($parameters as $key => $value) {
                $method = 'set'.ucfirst(static::camelCase($key));
                if (method_exists($target, $method)) {
                    $target->$method($value);
                }
            }
        }
    }


    /**
     * Resolve a short gateway name to a full namespaced gateway class.
     *
     * Class names beginning with a namespace marker (\) are left intact.
     * Non-namespaced classes are expected to be in the \Omnipay namespace, e.g.:
     *
     *      \Custom\Gateway     => \Custom\Gateway
     *      \Custom_Gateway     => \Custom_Gateway
     *      Stripe              => \Invoicetic\Stripe\Gateway
     *      PayPal\Express      => \Invoicetic\PayPal\ExpressGateway
     *      PayPal_Express      => \Invoicetic\PayPal\ExpressGateway
     *
     * @param  string  $shortName The short gateway name or the FQCN
     * @return string  The fully namespaced gateway class name
     */
    public static function getGatewayClassName($shortName)
    {
        // If the class starts with \ or Omnipay\, assume it's a FQCN
        if (0 === strpos($shortName, '\\') || 0 === strpos($shortName, 'Omnipay\\')) {
            return $shortName;
        }

        // Check if the class exists and implements the Gateway Interface, if so -> FCQN
        if (is_subclass_of($shortName, GatewayInterface::class, true)) {
            return $shortName;
        }

        // replace underscores with namespace marker, PSR-0 style
        $shortName = str_replace('_', '\\', $shortName);
        if (false === strpos($shortName, '\\')) {
            $shortName .= '\\';
        }

        return '\\Invoicetic\\'.$shortName.'Gateway';
    }
}

