<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BankaccountDelete extends Component
{
    public $bank;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($bank)
    {
        //
        $this->bank = $bank;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.bankaccount-delete');
    }
}
