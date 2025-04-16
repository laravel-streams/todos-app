<?php

namespace App\Http\Livewire;

use Streams\Ui\Pages\Page;

class TodosPage extends Page
{
    public $todos;

    // protected static string $layout = 'ui::layouts.page';

    protected static string $view = 'livewire.todos.index';

    public function mount()
    {
        $this->todos = entries('todos')->get();
    }
}
