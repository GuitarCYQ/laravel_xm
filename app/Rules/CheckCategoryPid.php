<?php

namespace App\Rules;

use App\Model\Category;
use Illuminate\Contracts\Validation\Rule;

class CheckCategoryPid implements Rule
{
    private $pid;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($pid)
    {
        $this->pid = $pid;
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
        $ids = Category::getChildsIds($value);
        if(in_array($this->pid,$ids)){
            return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation.CheckCategoryPid');
    }
}
