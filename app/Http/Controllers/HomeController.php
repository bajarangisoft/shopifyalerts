<?php

namespace App\Http\Controllers;

use App\Models\ActionConditions;
use App\Models\AlertConditions;
use App\Models\BlockCondition;
use App\Models\FilterConditions;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function alert_details(){
        $all_alerts = AlertConditions::orderBy('id','Desc')->get();
        return view('alert_details',compact('all_alerts'));
    }

    public function post_data(Request $request)
    {
        if($request->first_name == '' || $request->about == ''){
            echo 'Enter Title and description';
            exit;
        }
//        echo '<pre>';
        $AInput = [];
        $AInput['title'] = $request->first_name;
        $AInput['description'] = $request->about;
        $AInput['is_trigered'] = 0;
        $AInput['condition_block_count'] = $request->condition_blks;
        $alert = AlertConditions::create($AInput);
        $parent_id = $alert->id;
//        $parent_id = 10;
        if(isset($request->condition_blks)){
            for($i = 1; $i <= $request->condition_blks; $i++) {
                $BInput = [];
                $BInput['parent_id'] = $parent_id;
                $BInput['condition_block_no'] = $i;
                $BInput['choice_made'] = $request['condition_choice_'.$i];;
                $block = BlockCondition::create($BInput);

                $filter_count = $request['condition_blks_filter_count_' . $i];
                if($filter_count != '' && $filter_count > 0){
                    for ($f = 1; $f <= $filter_count; $f++) {
                        if (isset($request["filter_condition_$i" . "_" . "$f"])) {
                            $FInput = [];
                            $FInput['parent_id'] = $parent_id;
                            $FInput['condition_block_no'] = $block->id;
                            $FInput['condition_1'] = $request["top_level_$i"."_"."$f"];
                            $key = 2;
                            foreach ($request["filter_condition_$i" . "_" . "$f"] as $record) {
                                if (!empty($record) && $key <= 4) {
                                    $FInput['condition_' . $key] = $record;
                                }
                                $key++;
                            }
                            FilterConditions::create($FInput);
    //                        print_r($FInput);
                        }
                    }
                }

                $action_count = $request['condition_action_count_'.$i];
                if($action_count != '' && $action_count > 0) {
                    for ($a = 0; $a <= $action_count; $a++) {
                        if (isset($request["action_condition_$i" . "_" . "$a"])) {
                            $AcInput = [];
                            $AcInput['parent_id'] = $parent_id;
                            $AcInput['condition_block_no'] = $block->id;
                            $AcInput['condition_1'] = $request["action_type_$i" . "_" . "$a"];
                            $key = 2;
                            $value = $request["action_condition_$i" . "_" . "$a"];
                            if($value[0] == 'Day'){
                                $day = $value[1].'-'.$this->remove_minute($value[2]).' '.$value[3];
                                $AcInput['condition_2'] = 'Day';
                                $AcInput['condition_3'] = $value[1];
                                $AcInput['condition_4'] = $value[2];
                                $AcInput['condition_5'] = $value[3];
                                $AcInput['date']        = $day;
                            }
                            elseif ($value[0] == 'Hour'){
                                $minute = $this->remove_minute($value[1]);
                                $AcInput['condition_2'] = 'Hour';
                                $AcInput['condition_3'] = $value[1];
                                $AcInput['date']        = $minute;
                            }
                            elseif ($value[0] == 'Week'){
                                $week = $value[2].'-'.$this->remove_minute($value[3]).' '.$value[4];
                                $AcInput['condition_2'] = 'Week';
                                $AcInput['condition_3'] = $value[1];
                                $AcInput['condition_4'] = $value[2];
                                $AcInput['condition_5'] = $value[3];
                                $AcInput['condition_6'] = $value[4];
                                $AcInput['date']        = $week;
                            }
                            elseif ($value[0] == 'Month'){
                                $month = $value[2].'-'.$this->remove_minute($value[3]).' '.$value[4];
                                $AcInput['condition_2'] = 'Month';
                                $AcInput['condition_3'] = $value[1];
                                $AcInput['condition_4'] = $value[2];
                                $AcInput['condition_5'] = $value[3];
                                $AcInput['condition_6'] = $value[4];
                                $AcInput['date']        = $month;
                            }
                            else{
                                foreach ($request["action_condition_$i" . "_" . "$a"] as $record) {
                                    $column_count = 5;
                                    if (!empty($record) && $key <= $column_count) {
                                        $AcInput['condition_' . $key] = $record;
                                    }
                                    $key++;
                                }
                            }
                            ActionConditions::create($AcInput);
//                            echo "<br> here is action block<br>";
                        }
                    }
                }
            }
        }
        return redirect(url('alert-details'));
    }

    public function remove_minute($str){
        return str_replace('minuate_', '',$str);
    }
}
