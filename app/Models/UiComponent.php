<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UiComponent extends Model
{
    use HasFactory;

    protected $table = 'ui_components';

    protected $fillable = [
        'component_group',
        'component_name',
        'label',
        'value',
        'icon_class',
        'desktop_position',
        'mobile_position',
        'order_no',
        'visible_global',
        'visible_routes',
        'hidden_routes',
        'extra_settings',
    ];

    protected $casts = [
        'visible_routes' => 'array',
        'hidden_routes' => 'array',
        'extra_settings' => 'array',
        'visible_global' => 'boolean',
    ];

    /**
     * Build UI structure like API: topbar + header
     */
    public static function buildUiStructure()
    {
        $all = static::orderBy('order_no')->get();

        $groups = [
            'topbar' => [
                'desktop' => ['left' => [], 'center' => [], 'right' => []],
                'mobile'  => ['top' => [], 'sidebar' => [], 'bottom' => []],
            ],
            'header' => [
                'desktop' => ['left' => [], 'center' => [], 'right' => []],
                'mobile'  => ['top' => [], 'sidebar' => [], 'bottom' => []],
            ],
        ];

        foreach ($all as $item) {

            // Desktop placement
            $groups[$item->component_group]['desktop'][$item->desktop_position][] = $item;

            // Mobile placement
            $groups[$item->component_group]['mobile'][$item->mobile_position][] = $item;
        }

        return $groups;
    }
}
