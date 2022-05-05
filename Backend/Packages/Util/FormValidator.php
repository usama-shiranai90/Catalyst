<?php

use JetBrains\PhpStorm\Pure;

/**
 *
 * Example:
 *
 *  $validations = array('name' => 'anything','email' => 'email','alias' => 'anything','pwd'=>'anything','gsm' => 'phone','birthdate' => 'date');
 *  $required = array('name', 'email', 'alias', 'pwd');
 *  $sanitize = array('alias');
 *  $validator = new FormValidator($validations, $required, $sanitize);
 *  if($validator->validate($_POST))
 *      $_POST = $validator->sanitize($_POST); // $_POST has been sanitized.
 * To validate just one element:
 * $validated = new FormValidator()->validate('blah@bla.', 'email');
 * To sanitize just one element:
 * $sanitized = new FormValidator()->sanitize('<b>blah</b>', 'string');
 *-------------------------------------------------------------------------
 * *  break down : "^[a-zA-Z0-9_]*$"
 * ^ : start of string
 * [ : beginning of character group
 * a-z : any lowercase letter
 * A-Z : any uppercase letter
 * 0-9 : any digit
 * _ : underscore
 * ] : end of character group
 * : zero or more of the given characters
 * $ : end of string
 * ---------------------------------------------------------------------------
 */
class FormValidator
{
    private $validations, $sanitation, $mandatory, $errors, $corrects, $fields;

    public static $regexExpression = array(
        'date' => "^[0-9]{1,2}[-/][0-9]{1,2}[-/][0-9]{4}\$",
        'amount' => "^[-]?[0-9]+\$",
        'number' => "^[-]?[0-9,]+\$",
        'alphaNumeric' => "^[0-9a-zA-Z ,.-_\\s\?\!]+\$",
        'not_empty' => "[a-z0-9A-Z]+",
        'words' => "^[A-Za-z]+[A-Za-z \\s]*\$",
        'phone' => "^[0-9]{10,11}\$",
        '2digitopt' => "^\d+(\,\d{2})?\$",
        '2digitforce' => "^\d+\,\d\d\$",
        'anything' => "^[\d\D]{1,}\$"
    );

    public function __construct($validations = array(), $mandatory = array(), $sanitation = array())
    {
        $this->validations = $validations;
        $this->sanitation = $sanitation;
        $this->mandatory = $mandatory;
        $this->errors = array();
        $this->corrects = array();
    }

    /** Validates an array of items (if needed)*/
    public function validate($items): bool
    {
        $this->fields = $items;
        $hasFailed = false;
        foreach ($items as $key => $val) {
            if ((strlen($val) == 0 || array_search($key, $this->validations) === false) && array_search($key, $this->mandatory) === false) {
                $this->corrects[] = $key;
                continue;
            }
            $result = self::validateItem($val, $this->validations[$key]);
            if ($result === false) {
                $hasFailed = true;
                $this->addError($key, $this->validations[$key]);
            } else {
                $this->corrects[] = $key;
            }
        }

        return (!$hasFailed);
    }


    /** Sanitizes an array of items according to the $this->sanitation will be standard of type string, but can also be specified.
     * For ease of use, this syntax is accepted: $this->sanitation = array('fieldname', 'otherfieldname'=>'float');  */
    public function sanitize($items)
    {
        /**Testing
         * foreach ($items as $key => $val) {
         * if (array_search($key, $this->sanitation) === false && !array_key_exists($key, $this->sanitation)) continue;
         * $items[$key] = self::sanitizeItem($val, $this->validations[$key]);
         * }
         * return $items;*/
        foreach ($items as $key => $val) {
            if (array_search($key, $this->sanitation) === false && !array_key_exists($key, $this->sanitation)) continue;
            $items[$key] = self::sanitizeUserInput($val, $this->validations[$key]);
        }
        return $items;
    }


    /** Sanitize a single var according to $type.
     * Allows for static calling to allow simple sanitization. */
    public static function sanitizeUserInput($var, $type)
    {
        $flags = NULL;
        switch ($type) {
            case 'url':
                $filter = FILTER_SANITIZE_URL;
                break;
            case 'int':
                $filter = FILTER_SANITIZE_NUMBER_INT;
                break;
            case 'float':
                $filter = FILTER_SANITIZE_NUMBER_FLOAT;
                $flags = FILTER_FLAG_ALLOW_FRACTION | FILTER_FLAG_ALLOW_THOUSAND;
                break;
            case 'email':
                $var = substr($var, 0, 254);
                $filter = FILTER_SANITIZE_EMAIL;
                break;
            case 'string':
            default:
                $filter = FILTER_SANITIZE_STRING;
                $flags = FILTER_FLAG_NO_ENCODE_QUOTES;
                break;

        }
        $output = filter_var($var, $filter, $flags);
        return ($output);
    }

    /** Validates a single var according to $type.
     * Allows for static calling to allow simple validation. */
    public static function validateItem($var, $type): bool
    {
        if (array_key_exists($type, self::$regexExpression)) {
            return (filter_var($var, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '!' . self::$regexExpression[$type] . '!i'))) !== false);
        }
        $filter = false;
        switch ($type) {
            case 'email':
                $var = substr($var, 0, 254);
                $filter = FILTER_VALIDATE_EMAIL;
                break;
            case 'int':
                $filter = FILTER_VALIDATE_INT;
                break;
            case 'boolean':
                $filter = FILTER_VALIDATE_BOOLEAN;
                break;
            case 'ip':
                $filter = FILTER_VALIDATE_IP;
                break;

            case 'url':
                $filter = FILTER_VALIDATE_URL;
                break;
        }
        return !($filter === false) && filter_var($var, $filter) !== false;
    }

    public static function validatePassword($password)
    {
        return filter_var($password, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/.{8,30}/")));
    }


    /** Adds an error to the errors array. */
    private function addError($field, $type = 'string')
    {
        $this->errors[$field] = $type;
    }

    /** sanitization and filtration */
    function sanitizationValue($text): string
    {
        return htmlspecialchars(strip_tags($text));
    }

    public static function sanitizeStringWithSpace($text, $withDash = true): array|string|null
    {
        $filterPattern = '';
        if ($withDash)
            $filterPattern = " _-";
        return preg_replace("/[^a-zA-Z0-9$filterPattern]+/", " ", html_entity_decode($text, ENT_QUOTES));
    }

    public static function sanitizeStringWithNoSpace($text, $withDash = true): array|string|null
    {
        $filterPattern = '';
        if ($withDash)
            $filterPattern = " _-";
        return preg_replace("/[^a-zA-Z0-9$filterPattern]+/", "", html_entity_decode($text, ENT_QUOTES));
    }


}

?>
