<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Place;
use Laravel\Nova\Fields\Avatar;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\HasOne;
use Laravel\Nova\Fields\TextArea;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\PasswordConfirmation;
use Laravel\Nova\Fields\Country;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;

class FacilityManager extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\FacilityManager';

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
        'id',
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

            // HasOne::make('Health Facility', 'healthFacility'),

            Avatar::make('Image')->disk('public'),

            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Username')
                ->sortable()
                ->rules('max:255'),

            Text::make('Email')
                ->sortable()
                ->rules('required', 'email', 'max:254'),

            Password::make('Password')
                ->onlyOnForms()
                ->creationRules('required', 'string', 'min:6')
                ->updateRules('nullable', 'string', 'min:6'),

            PasswordConfirmation::make('Password Confirmation'),

            Text::make('Phone')
                ->sortable()
                ->rules('required', 'min:11', 'max:13'),

            TextArea::make('Address'),

        ];
    }


    protected function addressFields()
    {
        return $this->merge([

            Place::make('Address', 'address_line_1')
                ->rules('required')
                ->hideFromIndex(),

            Text::make('Address Line 2')->hideFromIndex(),

            Text::make('LGA')
                ->sortable()
                ->rules('required')
                ->hideFromIndex(),

            Text::make('State')
                ->rules('required')
                ->hideFromIndex(),

            Text::make('Postal Code')->hideFromIndex(),

            Country::make('Country')
                ->rules('required')
                ->hideFromIndex(),

        ]);
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
}
