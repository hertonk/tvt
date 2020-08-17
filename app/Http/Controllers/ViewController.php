<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Question;
use App\Requeriment;
use App\VisualizationQuestion;
use App\Project;
use App\Link;
use App\Test;
use App\Story;
use App\Diagram;

use App\Http\Requests\GetVisu;


class ViewController extends Controller
{
    function index($id){

        $questions = Question::where('profile', 2)->get();
        $requeriments = Requeriment::where('project_id', $id)->get();

        $firstQuestion = Question::where('profile', 2)->first();

        $visus = VisualizationQuestion::where('question_id', $firstQuestion->id)->get();

        return view('views.index', ['questions' => $questions, 'requeriments' => $requeriments, 'visus' => $visus]);
    }

    function matrix($project, $requeriment){

        $p = Project::find($project);

        $r = Requeriment::find($requeriment);

        $links = Link::where('project_id', $project)->get();

        return view('views.matrix', ['project' => $p, 'requeriment' => $r, 'links' => $links]);

    }

    function process(GetVisu $request){

        $question = $request->question;
        $visu = $request->visu;
        $project = $request->project;
        $artifacts = $request->artifacts;

        $question = 10;

        if($question == 1){
            //LiquidFill

            return view('views.liquid', ['question' => $question]);

        } elseif($question == 2){
            //Simple Bar

            return view('views.bar', ['question' => $question]);

        } elseif($question == 3){
            //Graph

            return view('views.graph', ['question' => $question]);

        } elseif($question == 4){
            //Timeline

            return view('views.timeline', ['question' => $question]);

        }  else {
            //Sunburst

            return view('views.sunburst', ['question' => $question]);

        }

        // if($question == 1){

        //     $requeriment = $request->requeriment;
        //     $q = $request->question;
        //     $arts = $request->artifacts;

        //     if($visu == 'matrix'){

        //         $reqs = 0;
        //         $tsts = 0;
        //         $sts = 0;
        //         $mls = 0;

        //         $totalitems = 0;

        //         if(in_array("requeriment", $arts)){

        //             $reqs = Requeriment::where('project_id', $project)->get();

        //             $totalitems += count($reqs);

        //         } 

        //         if(in_array("tests", $arts)){

        //             $tsts = Test::where('project_id', $project)->get();

        //             $totalitems += count($tsts);

        //         } 

        //         if(in_array("stories", $arts)){

        //             $sts = Story::where('project_id', $project)->get();

        //             $totalitems += count($sts);

        //         } 

        //         if(in_array("models", $arts)){

        //             $mls = Diagram::where('project_id', $project)->get();

        //             $totalitems += count($mls);

        //         }

        //         $p = Project::find($project);

        //         $r = Requeriment::find($requeriment);

        //         $links = Link::where('project_id', $project)->get();

        //         $rs = Requeriment::orderBy('code', 'ASC')->get();

        //         return view('views.matrix', ['project' => $p, 'requeriment' => $r, 'links' => $links, 'question' => $q, 'artifacts' => $arts, 'rs' => $rs, 'reqs' => $reqs, 'tsts' => $tsts, 'sts' => $sts, 'mls' => $mls, 'totalitems' => $totalitems ]);

        //     } elseif($visu == 'graph'){

        //         echo 'graph';

        //     } elseif($visu == 'sunburst'){

        //         echo 'sunburst';

        //     }

        // }

    }

}
