<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TaskList extends Component
{

    public $tasks;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($tasks)
    {
        $this->tasks = $tasks;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.task-list');
    }
}
