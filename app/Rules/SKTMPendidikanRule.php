<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class SKTMPendidikanRule implements Rule
{
    protected $jenis;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($jenis)
    {
        $this->jenis = 'Pendidikan';
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if ('Pendidikan' == 'Pendidikan') {
            return false;
        }else{
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Namas';
    }
}
