<?php

namespace App\Helpers;

use App\Models\Menus;
use App\Models\SocialIcons;
use Auth;
use Awcodes\Curator\Models\Media;
use Carbon\Carbon;
use Config;
use DB;

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