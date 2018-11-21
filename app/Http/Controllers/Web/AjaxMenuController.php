<?php

namespace App\Http\Controllers\Web;

use App\Initiative;
use App\Measurement;
use App\MinisterialInitiatives;
use App\StrategicInitiatives;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AjaxMenuController extends Controller
{
    /*
     * Function for Get Strategic Goal Menu And Initatives , Measurments Menu Ajax
     */

    public function getStrategicInitiativesManagementsMenus($strategic_goal_id)
    {
        $strategicInitiatives = StrategicInitiatives::where('strategic_goals_id',$strategic_goal_id)->get();
        return response()->json($strategicInitiatives);
    }

    public function getMinisterialInitiativesMenus($measurement_id)
    {
        $ministerialInitiatives = MinisterialInitiatives::where('measurement_id',$measurement_id)->get();
        return response()->json($ministerialInitiatives);

    }

    public function getStrategicInitiativesMenus($strategic_goal_id)
    {
        $initiatives = Initiative::where('strategic_goals_id',$strategic_goal_id)->get();
        return response()->json($initiatives);
    }

    public function getStrategicMeasurementMenus($strategic_goal_id)
    {
        $measurements = Measurement::where('strategic_goals_id',$strategic_goal_id)->get();
        return response()->json($measurements);
    }
}
