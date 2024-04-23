<?php

namespace App\Livewire;

use App\Models\Lead;
use Livewire\Component;
use Livewire\WithPagination;

class LeadIndex extends Component
{
    public function render()
    {

        $leads = Lead::paginate(10);
        return view('livewire.lead-index', [
            'lead' => $leads
        ]);
    }


    public function leadDelete($id) {
        $lead = Lead::findOrFail($id);
        flash()->addSuccess('You have deleted!');
        $lead->delete();
    }
}
