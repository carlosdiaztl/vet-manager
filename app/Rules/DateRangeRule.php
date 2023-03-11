<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class DateRangeRule implements Rule
{
    protected $date;
    protected $date_end;

    public function __construct($date, $date_end)
    {
        $this->date = $date;
        $this->date_end = $date_end;
    }

    public function passes($attribute, $value)
    {
        $exists = DB::table('books')
            ->where(function ($query) {
                $query->whereBetween('date', [$this->date, $this->date_end])
                    ->orWhereBetween('date_end', [$this->date, $this->date_end])
                    ->orWhere(function ($query) {
                        $query->where('date', '<=', $this->date)
                            ->where('date_end', '>=', $this->date_end);
                    });
            })
            ->exists();

        return !$exists;
    }

    public function message()
    {
        return 'El rango de fechas ya está ocupado.';
    }
}
