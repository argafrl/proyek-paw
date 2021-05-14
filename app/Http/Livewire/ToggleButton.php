<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class ToggleButton extends Component
{
    public Model $model;
    public string $field;
    public bool $state;

    public function mount()
    {
        // dump($this->model);
        // dump($this->field);
        // dump($this->state);
        $this->state = (bool) $this->model->getAttribute($this->field);
    }
    public function render()
    {
        return view('livewire.toggle-button');
        // return view( view:'livewire' . $this->designTemplate . '.toggle-button');
    }
    public function updating($field, $value)
    {
        dump($value);
        $this->model->setAttribute($this->field, $value)->save();
    }
}
