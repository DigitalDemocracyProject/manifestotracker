<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manifesto;
use App\Models\ManifestoTable;

class ManifestoController extends Controller
{
    //
    public function dashboard()
    {
        $broken = Manifesto::where('Policy_Progress', 'broken')->value('Number');
        $done = Manifesto::where('Policy_Progress', 'done')->value('Number');
        $in_progress = Manifesto::where('Policy_Progress', 'in progress')->value('Number');
        $not_started = Manifesto::where('Policy_Progress', 'not started')->value('Number');
        $manifestos = ManifestoTable::all();
        return view('dashboard', compact('broken', 'done', 'in_progress', 'not_started', 'manifestos'));
    }
}
