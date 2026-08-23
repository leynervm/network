<?php

namespace App\Http\Livewire\Admin\Yape;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\YapeNotification;

class ShowNotifications extends Component
{
    use WithPagination;

    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $notifications = YapeNotification::where('title', 'like', '%' . $this->search . '%')
            ->orWhere('content', 'like', '%' . $this->search . '%')
            ->orderBy('id', 'desc')
            ->paginate(15);

        return view('livewire.admin.yape.show-notifications', compact('notifications'))
            ->layout('layouts.app');
    }
}
