<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Select;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;

class Patient extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Patient';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'name',
        'phone',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            BelongsTo::make('HealthFacilities', 'healthFacility')
                ->searchable()
                ->sortable(),

            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Phone')
                ->sortable()
                ->rules('required', 'min:11', 'max:13'),

            Select::make('Sex')->options([
                '1' => 'Female',
                '2' => 'Male',
                '3' => 'Others',
            ])->displayUsingLabels(),

            Date::make('Date of Birth', 'dob')
                ->sortable()
                ->rules('required'),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }

    public function healthFacility()
    {
        if (Auth()->user()->role === 1) {
            return BelongsTo::make('HealthFacilities', 'healthFacility')
                ->searchable()
                ->sortable();
        } else {
            if (Auth()->user()->healthFacility()) {
                return Text::make('Health Facility', 'health_facility_id')
                    ->sortable()
                    ->withMeta(['extraAttributes' => [
                        'disabled' => 'true',
                        'value' => Auth()->user()->healthFacility()->id,
                        'placeholder' => Auth()->user()->healthFacility()->name,
                    ]
                ]);
            } else {
                return Text::make('Health Facility')
                    ->sortable()
                    ->withMeta(['extraAttributes' => [
                        'disabled' => 'true',
                        'placeholder' => 'Not Assigned',
                    ]
                ]);
            }
        }
    }
}
