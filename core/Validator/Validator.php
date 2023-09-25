<?php

namespace Lilo\Core\Validator;

class Validator
{
    protected array $errors = [];
    protected array $data = [];

    public function validate(array $data, array $rules): false|array
    {
        foreach ($data as $key => $value) {
            foreach ($rules[$key] as $rule) {
                $rule = explode(':', $rule);
                $rule_name = $rule[0];
                $rule_value = $rule[1] ?? null;

                $res = $this->validation_rules($value, $rule_name, $rule_value);
                if (is_string($res)) {
                    $this->errors[$key][] = $res;
                }
            }

        }
        return empty($this->errors) ? $data : false;
    }

    public function validation_rules(
        string $to_be_validated,
        string $rule_name,
        string $rule_value = null): string|false
    {
        switch ($rule_name) {
            case 'required':
                if ((empty($to_be_validated))) {
                    return 'Field is required';
                }
                break;
            case 'min':
                if (strlen($to_be_validated) < $rule_value) {
                    return "Min length is $rule_value";
                }
                break;
            case 'max':
                if (strlen($to_be_validated) > $rule_value) {
                    return "Max length is $rule_value";
                }
                break;
            case 'email':
                if (!filter_var($to_be_validated, FILTER_VALIDATE_EMAIL)) {
                    return "$to_be_validated must be a valid email";
                }
                break;
            default:
                return $to_be_validated;
        }

        return false;
    }

    public function errors(): array
    {
        return $this->errors;
    }
}

