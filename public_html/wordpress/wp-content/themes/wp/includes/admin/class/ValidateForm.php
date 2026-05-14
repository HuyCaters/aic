<?php
trait ValidateForm
{
    function notEmpty($value)
    {
        return !empty($value);
    }

    function minLength($value, $min)
    {
        return mb_strlen($value) >= $min;
    }

    function maxLength($value, $max)
    {
        return mb_strlen($value) <= $max;
    }

    function phone($value)
    {
        return preg_match('/^0[0-9]{2,3}-?[0-9]{2,4}-?[0-9]{3,4}$/', $value);
    }

    function date($value)
    {
        $prematch = preg_match('/^\d{4}-\d{2}-\d{2}$/', $value);
        if (!$prematch) return false;

        $date = explode('-', $value);
        return checkdate($date[1], $date[2], $date[0]);
    }

    function time($value)
    {
        return preg_match('/^\d{2}:\d{2}$/', $value);
    }

    function email($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL) !== false;
    }

    function postcode($value)
    {
        return preg_match('/^[0-9]{3}-?[0-9]{4}$/', $value);
    }

    function hiragana($value)
    {
        return preg_match('/^[ぁ-んー]*$/u', $value);
    }

    function katakana($value)
    {
        return preg_match('/^[ァ-ヶー]+$/u', $value);
    }

    function agree($value)
    {
        return intval($value) == 1;
    }

    function notEmptyFile($value)
    {
        return $value['error'] === UPLOAD_ERR_OK;
    }

    function fileSize($value, $max)
    {
        return $value['size'] <= $max;
    }

    function fileType($value, $types)
    {
        if ($this->notEmptyFile($value) === false) return true;
        $fileType = pathinfo($value['name'], PATHINFO_EXTENSION);
        return in_array($fileType, $types);
    }

    function inArray($value, $array)
    {
        return in_array($value, $array);
    }
}
