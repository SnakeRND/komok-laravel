<?php


namespace App\Services;


use App\Helpers\DirectoryHelper;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;

class GalleryService
{
    const GALLERY_ROOT = '/Галерея';
    const SHIFT7_12 = '/Галерея/Смены 7-12 лет';
    const SHIFT13_17 = '/Галерея/Смены 13-17 лет';

    /**
     * @param array $filter
     * @return LengthAwarePaginator
     */
    public function getList(array $filter = []): LengthAwarePaginator
    {
        $tree = $this->getTree();
        $result = [];
        if (!$filter) {
            $result = array_slice(
                Storage::disk('public')->files(self::GALLERY_ROOT, true),
                -49,
                49
            );

            return new LengthAwarePaginator($result, count($result), 7);
        }

        foreach ($tree[$filter['age']][$filter['year']][$filter['season']][$filter['shift']] as $picName) {
            $result[] = self::GALLERY_ROOT . '/'
                . $filter['age']
                . '/'
                . $filter['year']
                . '/'
                . $filter['season']
                . '/'
                . $filter['shift']
                . '/'
                . $picName;
        }

        return new LengthAwarePaginator($result, count($result), 7);
    }

    /**
     * @return LengthAwarePaginator
     */
    public function getShiftImages(): LengthAwarePaginator
    {
        $result = array_slice(
            Storage::disk('public')->files(self::SHIFT13_17, true),
            -49,
            49
        );

        return new LengthAwarePaginator($result, count($result), 7);
    }

    /**
     * @return array
     */
    private function getTree(): array
    {
        return DirectoryHelper::makeTree(storage_path('app/public') . self::GALLERY_ROOT);
    }
}
