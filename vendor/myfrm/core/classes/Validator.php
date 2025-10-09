<?php

namespace myfrm;

class Validator
{

    protected $errors = [];
    protected $rules_list = ['required', 'min', 'max', 'email', 'unique', 'ext', 'size'];
    protected $messages = [
        'required' => 'The :fieldname: поле обязательно для заполнения',
        'min' => 'The :fieldname: поле должно быть минимум :rulevalue: символов',
        'max' => 'The :fieldname: поле должно быть максимум :rulevalue: символов',
        'email' => 'Неверный email',
        'unique' => 'The :fieldname: уже используется',
        'ext' => 'Файл :fieldname: должно быть формата :rulevalue:',
        'size' => 'Размер файла :fieldname: должен быть не более :rulevalue: байт',
    ];

    public function validate($data = [], $rules = [])
    {
        foreach ($data as $fieldname => $value) {
            if ( isset($rules[$fieldname]) ) {
                $this->check(
                    [
                        'fieldname' => $fieldname,
                        'value' => $value,
                        'rules' => $rules[$fieldname],
                    ]
                );
            }
        }

        return $this;
    }

    protected function check($field)
    {
        foreach ( $field['rules'] as $rule => $rule_value ) {
            if ( in_array($rule, $this->rules_list) ) {
                if (!call_user_func_array([$this, $rule], [ $field['value'], $rule_value ])) {
                    
                    $this->addError(
                        $field['fieldname'],
                        str_replace(
                            [':fieldname:', ':rulevalue:'],
                            [$field['fieldname'], $rule_value],
                            $this->messages[$rule]
                        )
                    );
                }
            }
        }
    }

    protected function addError($fieldname, $error)
    {
        $this->errors[$fieldname][] = $error;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function hasErrors()
    {
        return !empty($this->errors);
    }

    protected function required($value, $rule_value)
    {
        return !empty($value);
    }

    protected function min($value, $rule_value)
    {
        return mb_strlen($value, 'UTF-8') >= $rule_value;
    }

    protected function max($value, $rule_value)
    {
        return mb_strlen($value, 'UTF-8') <= $rule_value;
    }

    protected function email($value, $rule_value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    protected function unique($value, $rule_value)
    {
        $data = explode(':', $rule_value);
        return (!db()->query("SELECT {$data[1]} FROM {$data[0]} WHERE {$data[1]} = ? LIMIT 1", [$value])->rowCount());
    }

    protected function ext($value, $rule_value)
    {
        if ( empty($value['name']) ) {
            return true;
        }

        $file_ext = get_file_ext($value['name']);
        $allowed_exts = explode('|', $rule_value);
        return in_array($file_ext, $allowed_exts);
    }

    protected function size($value, $rule_value)
    {
        if ( empty($value['size']) ) {
            return true;
        }

        return $value['size'] <= $rule_value;
    }
}