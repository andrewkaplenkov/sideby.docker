<?php

namespace Lilo\Core\Http\Validator;

interface ValidtorInterface
{
    public function validate(array $data, array $rules): array|false;

    public function validate_rules(string|array $to_validate, string $rule_name, ?string $rule_option): string|true;

    public function errors(): array;
}