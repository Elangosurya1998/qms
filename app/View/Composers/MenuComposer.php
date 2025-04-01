<?php

namespace App\View\Composers;

use App\Models\Menus;
use Illuminate\View\View;

class MenuComposer
{
    public function compose(View $view)
    {
        $menus = Menus::where('type', 'main_menu')
            ->where('status', 1)
            ->whereJsonContains('locations', 'header')
            ->orderBy('order_by', 'asc')->get();

        $menus->load('children');

        $view->with([
            'menus' => $menus,
            'menu' => $menus->first(),
        ]);
    }

}
