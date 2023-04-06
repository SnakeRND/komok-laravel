<?php


namespace App\Services;


use App\Helpers\DirectoryHelper;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;

class GalleryService
{
    const GALLERY_ROOT = '/Галерея';
    const SLIDER_SHIFTS_FAMILY = '/Slider-shifts-family';
    const SLIDER_SHIFTS = '/Slider-shifts';

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
     * @param int $type
     * @return LengthAwarePaginator
     */
    public function getShiftImages(int $type = 1): LengthAwarePaginator
    {
        $directory = self::GALLERY_ROOT . self::SLIDER_SHIFTS;
        if ($type === 2) {
            $directory = self::GALLERY_ROOT . self::SLIDER_SHIFTS_FAMILY;
        }

        $result = array_slice(
            Storage::disk('public')->files($directory, true),
            -49,
            49
        );

        return new LengthAwarePaginator($result, count($result), 7);
    }

    /**
     * @param int $type
     * @return LengthAwarePaginator
     */
    public function getGalleryImages(int $type = 1): LengthAwarePaginator
    {
        $directory = '/Галерея/Смены 13-17 лет';
        if ($type === 2) {
            $directory = '/Галерея/Смены 7-12 лет';
        }

        $result = array_slice(
            Storage::disk('public')->files($directory, true),
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
