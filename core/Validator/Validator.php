<?php

namespace Lilo\Core\Validator;

class Validator implements ValidtorInterface
{
    private array $data = [];
    private array $errors = [];

    public function validate(array $data, array $rules): array|false
    {
        foreach ($data as $key => $value) {
            foreach ($rules[$key] as $rule) {
                $rule = explode(':', $rule);
                $rule_name = $rule[0];
                $rule_option = $rule[1] ?? null;

                $res = $this->validate_rules($value, $rule_name, $rule_option);
                if (is_string($res)) {
                    $this->errors[$key][] = $res;
                }
            }
        }

        if (!empty($this->errors)) {
            return false;
        }

        return $data;
    }

    public function validate_rules(string|array $to_validate, string $rule_name, ?string $rule_option): string|true
    {
        switch ($rule_name) {
            case 'required':
                if ((empty($to_validate))) {
                    return 'Field is required';
                }
                break;
            case 'array':
                if (!is_array($to_validate)) {
                    return "Value must be an array";
                }
                break;
            case 'min':
                if (strlen($to_validate) < $rule_option) {
                    return "Min length is $rule_option";
                }
                break;
            case 'max':
                if (strlen($to_validate) > $rule_option) {
                    return "Max length is $rule_option";
                }
                break;
            case 'email':
                if (!filter_var($to_validate, FILTER_VALIDATE_EMAIL)) {
                    return "Value must be a valid email";
                }
                break;
//            case 'password':
//                if (!filter_var($to_validate, FILTER_VALIDATE)) {
//                    return "Value must be a valid email";
//                }
//                break;
            default:
                return "No such rule <$rule_name>";
        }

        return true;
    }

    public function errors(): array
    {
        return $this->errors;
    }
}