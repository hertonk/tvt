<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreProject;
use App\Project;
use App\Methodology;
use App\Budget;
use App\BudgetItem;
use App\User;

class ProjectController extends Controller
{
    function list(){

        $projects = Project::paginate(15);

        return view('projects.list', ['projects' => $projects]);
    }

    function create(){

        $methods = Methodology::all();

        return view('projects.create', ['methods' => $methods]);
    }

    function store(StoreProject $request){

        $project = new Project([
            'title' => $request->title,
            'methodology_id' => $request->methodology_id,
            'imported' => 1,
            'date_init' => $request->date_init,
            'date_end' => $request->date_end,
        ]);

        $project->save();

        session()->flash('message', 'O projeto foi adicionado com sucesso!');
        return redirect('/projects/create');

    }

    function dashboard($id){

        $id = \Auth::user()->id;
        $user = User::find($id);

        if($user->hasRole('manager')) {

            $project = Project::find($id);
            $budget_items = BudgetItem::where('project_id', $id)->get();

            return view('projects.dashboard', ['project' => $project, 'budget_items' => $budget_items]);

        } elseif ($user->hasRole('analist')){
            return redirect('/view/'.$id);
        } elseif ($user->hasRole('developer')){
            return redirect('/view/'.$id);
        }
    }


    function import($id){

        return view('projects.import');

    }
}
