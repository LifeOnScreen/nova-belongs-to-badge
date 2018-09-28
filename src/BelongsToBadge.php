<?php

namespace LifeOnScreen\BelongsToBadge;

use Laravel\Nova\Fields\BelongsTo;

class BelongsToBadge extends BelongsTo
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'belongs-to-badge';

    /**
     * Indicates if the element should be shown on the creation view.
     *
     * @var bool
     */
    public $showOnCreation = false;

    /**
     * Indicates if the element should be shown on the update view.
     *
     * @var bool
     */
    public $showOnUpdate = false;

    /**
     * Resolve the field's value.
     *
     * @param  mixed $resource
     * @param  string|null $attribute
     * @return void
     */
    public function resolve($resource, $attribute = null)
    {
        $value = $resource->{$this->attribute}()->withoutGlobalScopes()->first();

        if ($value) {
            $this->belongsToId = $value->getKey();

            $this->value = $this->formatDisplayValue($value);

            $this->withMeta([
                'backgroundColor' => $value->badgeBackgroundColor,
                'foregroundColor' => $value->badgeForegroundColor,
            ]);
        }
    }

}
