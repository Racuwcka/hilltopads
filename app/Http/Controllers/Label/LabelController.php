<?php

namespace App\Http\Controllers\Label;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Label;
use App\Models\Site;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;

class LabelController extends Controller
{
    /**
     * Перезаписывает Лейблы у сущности
     * @throws Exception
     */
    public function rewrite($type, $id, array $data = []): string
    {
        try {
            DB::beginTransaction();
            $this->checkTypeAndId($type, $id);

            $labels = $this->findLabels($data);

            if (isset($labels)) {
                $type::find($id)->labels()->sync($labels);
            } else {
                $type::find($id)->labels()->detach();
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            die($e->getMessage());
        }
        return 'Лейблы перезаписаны.';
    }

    /**
     * Добавляет Лейблы к сущности
     * @throws Exception
     */
    public function add($type, $id, array $data): string
    {
        try {
            DB::beginTransaction();
            $this->checkTypeAndId($type, $id);

            if (!isset($data)) throw new Exception('Нельзя передавать пустой массив labels.');

            $labels = $this->findLabels($data);

            $type::find($id)->labels()->syncWithoutDetaching($labels);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            die($e->getMessage());
        }
        return 'Лейблы добавлены.';
    }

    /**
     * Удаляет переданные лейблы у сущности
     * @throws Exception
     */
    public function delete($type, $id, array $data): string
    {
        try {
            DB::beginTransaction();
            $this->checkTypeAndId($type, $id);

            if (!isset($data)) throw new Exception('Нельзя передавать пустой массив labels.');

            $labels = $this->findLabels($data);

            foreach ($labels as $labelId) {
                $type::find($id)->labels()->detach($labelId);
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            die($e->getMessage());
        }
        return 'Лейблы удалены.';
    }

    /**
     * Получение лейблов у переданной сущности
     * @throws Exception
     */
    public function read($type, $id)
    {
        try {
            $this->checkTypeAndId($type, $id);
        } catch (Exception $e) {
            die($e->getMessage());
        }
        return $type::find($id)->labels;
    }

    /**
     * @throws Exception
     */
    private function checkTypeAndId($type, $id)
    {
        if (!($type instanceof User || $type instanceof Company || $type instanceof Site)) {
            throw new Exception('Неправильный тип сущности.');
        }

        if ($type::find($id) === null) {
            throw new Exception('Объект с идентификатором ' . $id . ' не найден.');
        }
    }

    /**
     * Находит Лейблы в БД
     * @throws Exception
     */
    private function findLabels($data): array
    {
        $labels = [];
        foreach ($data as $item) {
            $label = Label::query()->where('title', $item)->first();
            if ($label === null) {
                throw new Exception('Labels \'' . $item . '\' не найден.');
            }
            $labels[] = $label->id;
        }
        return $labels;
    }
}
