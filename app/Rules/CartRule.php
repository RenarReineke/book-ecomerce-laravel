<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CartRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        foreach($value as $item) {
            if(!isset($item['id'])) {
                $fail('Поле id должно быть задано');
                return;
            }
            if(!$item['id']) {
                $fail('Поле id не должно быть false');
                return;
            }
            if(!is_int($item['id'])) {
                $fail('Поле id должно быть типа int');
                return;
            }

        }

        foreach($value as $item) {
            if(!isset($item['amount'])) {
                $fail('Поле amount должно быть задано');
                return;
            }
            if(!$item['amount']) {
                $fail('Поле amount не должно быть false');
                return;
            }
            if(!is_int($item['amount'])) {
                $fail('Поле amount должно быть типа int');
                return;
            }

        }
    }
}
