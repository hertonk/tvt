<?php

use App\BudgetItem;
use App\Visualization;
use App\VisualizationQuestion;
use App\Question;
use App\Requeriment;
use App\Link;

function getPorcentBudgetItem($id){

    $budget_item = BudgetItem::find($id);

    if($budget_item->value < calculatePorcentage(50, $budget_item->limit)){
    ?>
        <td>
            <div class="progress progress-xs">
                <div class="progress-bar progress-bar-success" style="width: <?php echo $budget_item->value; ?>%"></div>
            </div>
        </td>
        <td><span class="badge bg-green"><?php echo $budget_item->value; ?>%</span></td>

    <?php
    } elseif ($budget_item->value > $budget_item->limit){
    ?>
    <td>
        <div class="progress progress-xs">
            <div class="progress-bar progress-bar-danger" style="width: <?php echo $budget_item->value; ?>%"></div>
        </div>
    </td>
    <td><span class="badge bg-red"><?php echo $budget_item->value; ?>%</span></td>

    <?php
    } elseif ($budget_item->value > calculatePorcentage(50, $budget_item->limit) && $budget_item->value < calculatePorcentage(100, $budget_item->limit)) {
        ?>
        <td>
            <div class="progress progress-xs">
                <div class="progress-bar progress-bar-warning" style="width: <?php echo $budget_item->value; ?>%"></div>
            </div>
        </td>
        <td><span class="badge bg-yellow"><?php echo $budget_item->value; ?>%</span></td>

        <?php
    } elseif ($budget_item->value == calculatePorcentage(100, $budget_item->limit)) {
        ?>
        <td>
            <div class="progress progress-xs">
                <div class="progress-bar progress-bar-info" style="width: <?php echo $budget_item->value; ?>%"></div>
            </div>
        </td>
        <td><span class="badge bg-blue"><?php echo $budget_item->value; ?>%</span></td>

        <?php
    }
}

function calculatePorcentage($perc, $value){

    $new_value = ($perc / 100) * $value;

    return $new_value;

}

function calculateDoughnut($id){

    $budget_items = BudgetItem::where('project_id', $id)->get();

    $total = 0;

    foreach($budget_items as $item){
        $total += $item->value;
    }

    $used = $total;
    $notUsed = 100 - $used;

    if($notUsed < 0){
        $notUsed = 0;
    }

    return "[$used,$notUsed]";

}

function getVisu($idQuestion){

    $visu = VisualizationQuestion::where('question_id', $idQuestion)->first();

    return $visu->visualization_id;

}

function getVisuCheck($id){

    $visu = Visualization::find($id);

    if($visu->id == 1){

        ?>

      <input type="radio" name="visu" id="optionsRadios1" value="matrix" checked>
                            <img src="<?php echo asset('icons/matrix.png'); ?>" alt="">&nbsp;Matriz&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <?php

    } elseif($visu->id == 2){

        ?>

        <input type="radio" name="visu" id="optionsRadios1" value="graph" checked>
                            <img src="<?php echo asset('icons/graph.png'); ?>" alt="">&nbsp;Liquid Fill&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <?php

    } elseif($visu->id == 3){

        ?>

        <input type="radio" name="visu" id="optionsRadios1" value="graph" checked>
                            <img src="<?php echo asset('icons/graph.png'); ?>" alt="">&nbsp;Bar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <?php

    } elseif($visu->id == 4){

        ?>

        <input type="radio" name="visu" id="optionsRadios1" value="graph" checked>
                            <img src="<?php echo asset('icons/graph.png'); ?>" alt="">&nbsp;Grafo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <?php

    } 
      elseif($visu->id == 5){

        ?>

       <input type="radio" name="visu" id="optionsRadios1" value="sunburst" checked>
                           <img src="<?php echo asset('icons/sunburst.png'); ?>" alt="">&nbsp;Timeline&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <?php

    }

}

function getDescriptionQuestion($id){

    $question = Question::find($id);

    return $question->description;

}

function getNameRequeriment($id){

    $requeriment = Requeriment::find($id);

    return $requeriment->name;

}

function print_requeriment($req1, $req2){

    $link1 = Link::where('item1_id', $req1)
                ->where('item2_id', $req2)
                ->where('type1', 'req')
                ->where('type2', 'req')
                ->get();

    $link2 = Link::where('item1_id', $req2)
                ->where('item2_id', $req1)
                ->where('type1', 'req')
                ->where('type2', 'req')
                ->get();

    if(count($link1) > 0 || count($link2) > 0){
        return 1;
    } else {
        return 0;
    }    

}

function print_test($req1, $test1){

    $link1 = Link::where('item1_id', $req1)
                ->where('item2_id', $test1)
                ->where('type1', 'req')
                ->where('type2', 'test')
                ->get();

    $link2 = Link::where('item1_id', $test1)
                ->where('item2_id', $req1)
                ->where('type1', 'test')
                ->where('type2', 'req')
                ->get();

    if(count($link1) > 0 || count($link2) > 0){
        return 1;
    } else {
        return 0;
    }    

}

function print_st($req1, $st1){

    $link1 = Link::where('item1_id', $req1)
                ->where('item2_id', $st1)
                ->where('type1', 'req')
                ->where('type2', 'sto')
                ->get();

    $link2 = Link::where('item1_id', $st1)
                ->where('item2_id', $req1)
                ->where('type1', 'sto')
                ->where('type2', 'req')
                ->get();

    if(count($link1) > 0 || count($link2) > 0){
        return 1;
    } else {
        return 0;
    }    

}

function print_mdls($req1, $ml1){

    $link1 = Link::where('item1_id', $req1)
                ->where('item2_id', $ml1)
                ->where('type1', 'req')
                ->where('type2', 'ml')
                ->get();

    $link2 = Link::where('item1_id', $ml1)
                ->where('item2_id', $req1)
                ->where('type1', 'ml')
                ->where('type2', 'req')
                ->get();

    if(count($link1) > 0 || count($link2) > 0){
        return 1;
    } else {
        return 0;
    }    

}