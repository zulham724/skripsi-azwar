<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\PollingRequest as StoreRequest;
use App\Http\Requests\PollingRequest as UpdateRequest;

/**
 * Class PollingCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class PollingCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Polling');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/polling');
        $this->crud->setEntityNameStrings('polling', 'pollings');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */
        $this->crud->addField([
            'label'=>'User',
            'name'=>'user_id',
            'type'=>'select',
            'entity'=>'user',
            'attribute'=>'name',
            'model'=>'App\Models\User'
        ]);

        $this->crud->addColumn([
            'name'=>'user_id',
            'label'=>'user',
            'type'=>'select',
            'entity'=>'user',
            'attribute'=>'name',
            'model'=>'App\Models\User'
        ]);
        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->setFromDb();

        // add asterisk for fields that are required in PollingRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
