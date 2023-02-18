<?php

namespace App\Http\Controllers\Label;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function __invoke()
    {
        $type = new User();
        $id = 1;
        $labels = ['label3', 'label4'];

        try {
            DB::beginTransaction();
            $label = new LabelController();
            $result = $label->read($type, $id);
            DB::commit();
        } catch(\Exception $e) {
            DB::rollBack();
            die($e->getMessage());
        }
        return $result;
    }
}
