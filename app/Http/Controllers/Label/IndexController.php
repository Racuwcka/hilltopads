<?php

namespace App\Http\Controllers\Label;

use App\Http\Controllers\Controller;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke()
    {
        $type = new User();
        $id = 1;
        $labels = ['label2', 'label1'];

        $label = new LabelController();
        return $label->add($type, $id, $labels);
    }
}
