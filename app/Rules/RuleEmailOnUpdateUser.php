<?php

namespace App\Rules;

use App\Models\User;
use Illuminate\Contracts\Validation\Rule;

class RuleEmailOnUpdateUser implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $newEmail)
    {
        $oldEmail = request()->user->email;
        if ($newEmail == $oldEmail) {
            //không update email -> trả về true -> cho phép request tiếp tục
            return true;
        }
        // email cũ khác với email mới -> có update
        // ktra email trong db xem có bản ghi nào có email trùng với email update không 
        //nếu có -> false, không có -> true 
        $check = User::where('email', $newEmail)->count();
        if ($check > 0) {
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
        return 'Email đã tồn tại';
    }
}
