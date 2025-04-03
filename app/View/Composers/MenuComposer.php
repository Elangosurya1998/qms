<?php

namespace App\View\Composers;

use App\Models\Menus;
use Illuminate\View\View;

class MenuComposer
{
    public function compose(View $view)
    {
        $headerMenus = Menus::where('type', 'main_menu')
            ->where('status', 1)
            ->whereJsonContains('locations', 'header')
            ->orderBy('order_by', 'asc')->get();

        $footerMenus = Menus::where('type', 'main_menu')
            ->where('status', 1)
            ->whereJsonContains('locations', 'footer')
            ->orderBy('order_by', 'asc')->get();

        $topBarMenus = Menus::where('type', 'main_menu')
            ->where('status', 1)
            ->whereJsonContains('locations', 'topbar')
            ->orderBy('order_by', 'asc')->get();

        $view->with([
            'headerMenus' => $headerMenus,
            'footerMenus' => $footerMenus,
            'topBarMenus' => $topBarMenus,
        ]);
    }

}
