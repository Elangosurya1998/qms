<?php

namespace App\View\Composers;

use App\Models\Menus;
use App\Models\SiteSetting;
use Illuminate\View\View;

class PageSettingComposer
{
    public function compose(View $view)
    {
        $siteSetting = SiteSetting::first();

        $view->with([
            'siteSetting' => $siteSetting,
        ]);
    }

}
