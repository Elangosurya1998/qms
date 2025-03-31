<?php

namespace App\Helpers;

use App\Models\Menus;

class Common
{

    /**
     * Replace the null value with empty
     *
     * @return
     */

    public static function getMenus()
    {
        $menus = Menus::where('type', 'main_menu')->where('status', 1)->orderBy('order_by', 'asc')->get();

        $menus->load('children');

        return $menus;
    }

}