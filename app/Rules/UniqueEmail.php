<?php

namespace App\Rules;

use App\Models\User;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class UniqueEmail implements ValidationRule
{
    /** @var int|null $userId */
    protected $userId;

    /** 
     * @var int|null $userId
     */
    public function __construct(?int $userId = null)
    {
        $this->userId = $userId;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $exists = User::where('email', $value)
            ->when($this->userId !== null, function ($query) {
                $query->where('id', '!=', $this->userId);
            })->exists();
        
        if ($exists) {
            $fail('The email address is already in use.');
        }
    }
}
