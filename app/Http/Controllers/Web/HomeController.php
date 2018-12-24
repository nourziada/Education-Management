<?php

namespace App\Http\Controllers\Web;

use App\Department;
use App\EducationalResearch;
use App\Initiative;
use App\Management;
use App\Measurement;
use App\MinisterialInitiatives;
use App\OperationalPlan;
use App\PlansModel;
use App\RiskForm;
use App\Strategic;
use App\StrategicGoal;
use App\StrategicInitiatives;
use App\Http\Controllers\Controller;
use App\Swat;
use App\User;
use Illuminate\Support\Facades\Response;

class HomeController extends Controller
{

    /*
     * Research to Word
     */

    public function getResearchReport($id)
    {
        // get the SWAT Data
        $data = EducationalResearch::findOrFail($id);

        // Get the Word Document
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $document = $phpWord->loadTemplate('doc/research.docx');

        $document->setValue('name', ($data->name) );
        $document->setValue('id_number', ($data->id_number) );
        $document->setValue('work', ($data->work) );
        $document->setValue('mobile', ($data->mobile) );
        $document->setValue('email', ($data->email) );
        $document->setValue('search_title', ($data->search_title) );
        $document->setValue('qualification', ($data->qualification) );
        $document->setValue('uni', ($data->uni) );
        $document->setValue('college', ($data->college) );
        $document->setValue('specialization', ($data->specialization) );
        $document->setValue('search_goal', ($data->search_goal) );
        $document->setValue('chapter_date', ($data->chapter_date) );
        $document->setValue('targets', ($data->targets) );
        $document->setValue('authority', ($data->authority) );
        $document->setValue('target', ($data->target) );
        $document->setValue('authority_address', ($data->authority_address) );
        $document->setValue('search_tool', ($data->search_tool) );

        $name = 'Document' . time() . '.docx';
        $document->saveAs(public_path() . "/research_reports/" . $name);
        $file = public_path(). "/research_reports/{$name}";

        $headers = array(
            //'Content-Type: application/msword',
            'Content-Type: vnd.openxmlformats-officedocument.wordprocessingml.document'
        );

        $response = Response::download($file, $name, $headers);
        return $response;

    }
    /*
     * Risks Word
     */

    public function getRisksReport($id)
    {
        // get the SWAT Data
        $data = RiskForm::findOrFail($id);
        $user = User::find($data->user_id);

        // Get the Word Document
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $document = $phpWord->loadTemplate('doc/risks.docx');

        if($user != null)
        {
            $management = Management::find($user->management);
            if($management != null)
            {
                $management = $management->name;
            }else
            {
                $management = "";
            }


            $department = Department::find($user->department);
            if($department != null)
            {
                $department = $department->name;
            }else
            {
                $department = "";
            }
        }else
        {
            $management = "";
            $department = "";
        }


        $document->setValue('management', ($management) );
        $document->setValue('department', ($department) );
        $document->setValue('type', ($data->type) );
        $document->setValue('name', ($data->name) );
        $document->setValue('description', ($data->description) );
        $document->setValue('level', ($data->level) );
        $document->setValue('protection', ($data->protection) );
        $document->setValue('effect', ($data->effect) );
        $document->setValue('responsible', ($data->responsible) );
        $document->setValue('treatment', ($data->treatment) );
        $document->setValue('end', ($data->end) );

        $name = 'Document' . time() . '.docx';
        $document->saveAs(public_path() . "/risks_reports/" . $name);
        $file = public_path(). "/risks_reports/{$name}";

        $headers = array(
            //'Content-Type: application/msword',
            'Content-Type: vnd.openxmlformats-officedocument.wordprocessingml.document'
        );

        $response = Response::download($file, $name, $headers);
        return $response;
    }

    /*
     * SWAT Word
     */

    public function getSwatReport($id)
    {
        // get the SWAT Data
        $data = Swat::findOrFail($id);
        $user = User::find($data->user_id);



        // Get the Word Document
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $document = $phpWord->loadTemplate('doc/swat.docx');

        if($user != null)
        {
            $management = Management::find($user->management);
            if($management != null)
            {
                $management = $management->name;
            }else
            {
                $management = "";
            }


            $department = Department::find($user->department);
            if($department != null)
            {
                $department = $department->name;
            }else
            {
                $department = "";
            }
        }else
        {
            $management = "";
            $department = "";
        }


        $plan_title = OperationalPlan::find($data->operational_plan_id);
        if($plan_title != null)
        {
            $plan_title =  $plan_title->plane_title;
        }else
        {
            $plan_title = "";
        }



        $document->setValue('management', ($management) );
        $document->setValue('department', ($department) );
        $document->setValue('plan_title', ($plan_title) );
        $document->setValue('strong', ($data->strong) );
        $document->setValue('week', ($data->week) );
        $document->setValue('opportunities', ($data->opportunities) );
        $document->setValue('threats', ($data->threats) );


        $name = 'Document' . time() . '.docx';
        $document->saveAs(public_path() . "/swat_reports/" . $name);
        $file = public_path(). "/swat_reports/{$name}";

        $headers = array(
            //'Content-Type: application/msword',
            'Content-Type: vnd.openxmlformats-officedocument.wordprocessingml.document'
        );

        $response = Response::download($file, $name, $headers);
        return $response;

    }
    /*
     * Strategic Plans Word
     */

    public function getStrategicPlanReport($id)
    {
        // get the Plan Data
        $data = Strategic::findOrFail($id);

        // Get the Word Document
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $document = $phpWord->loadTemplate('doc/strategic_plan.docx');


        $management = Management::find($data->management);
        if($management != null)
        {
            $management = $management->name;
        }else
        {
            $management = "";
        }


        $department = Department::find($data->department);
        if($department != null)
        {
        $department = $department->name;
        }else
        {
        $department = "";
        }


        $strategic_goal = StrategicGoal::find($data->strategic_goal);
        if($strategic_goal != null)
        {
            $strategic_goal =  $strategic_goal->name;
        }else
        {
            $strategic_goal = "";
        }


        $initiatives = Initiative::find($data->initiatives);
        if($initiatives != null)
        {
            $initiatives =  $initiatives->name;
        }else
        {
            $initiatives = "";
        }

        $measurement = Measurement::find($data->measurement);
        if($measurement != null)
        {
            $measurement =  $measurement->name;
        }else
        {
            $measurement = "";
        }


        $document->setValue('management', ($management) );
        $document->setValue('department', ($department) );
        $document->setValue('strategic_goal', ($strategic_goal) );
        $document->setValue('initiatives', ($initiatives) );
        $document->setValue('measurement', ($measurement) );
        $document->setValue('target', ($data->target) );
        $document->setValue('department_initiatives', ($data->department_initiatives) );
        $document->setValue('performance_index', ($data->performance_index) );
        $document->setValue('executing_agency', ($data->executing_agency) );
        $document->setValue('supporting_body', ($data->supporting_body) );
        $document->setValue('responsible_management', ($management) );


        $name = 'Document' . time() . '.docx';
        $document->saveAs(public_path() . "/strategic_reports/" . $name);
        $file = public_path(). "/strategic_reports/{$name}";

        $headers = array(
            //'Content-Type: application/msword',
            'Content-Type: vnd.openxmlformats-officedocument.wordprocessingml.document'
        );

        $response = Response::download($file, $name, $headers);
        return $response;
    }

    public function getOperationalPlanReport($id)
    {
        // get the Plan Data
        $data = OperationalPlan::findOrFail($id);

        // Get the Word Document
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $document = $phpWord->loadTemplate('doc/operational_plan.docx');

        $strategic = StrategicGoal::find($data->strategic_goal);
        if($strategic != null)
        {
            $strategic_goal = $strategic->name;
        }else
        {
            $strategic_goal = "";
        }

        $meas = Measurement::find($data->strategic_indicators);
        if($meas != null)
        {
            $strategic_indicators = $meas->name;
        }else
        {
            $strategic_indicators = "";
        }


        $associated_title = MinisterialInitiatives::find($data->associated_title);
        if($associated_title != null)
        {
            $associated_title = $associated_title->name;
        }else
        {
            $associated_title = "";
        }

        $initiative_title = StrategicInitiatives::find($data->initiative_title);
        if($initiative_title != null)
        {
            $initiative_title = $initiative_title->name;
        }else
        {
            $initiative_title = "";
        }


        $management = Management::find($data->management);
        if($management != null)
        {
            $management = $management->name;
        }else
        {
            $management = "";
        }


        $department = Department::find($data->department);
        if($department != null)
        {
            $department = $department->name;
        }else
        {
            $department = "";
        }






        $document->setValue('management', ($management) );
        $document->setValue('department', ($department) );
        $document->setValue('strategic_goal', ($strategic_goal) );
        $document->setValue('strategic_indicators', ($strategic_indicators) );
        $document->setValue('associated_title', ($associated_title) );
        $document->setValue('initiative_title', ($initiative_title) );
        $document->setValue('plane_title', ($data->plane_title) );
        $document->setValue('requirements', ($data->requirements) );
        $document->setValue('targeted', ($data->targeted) );
        $document->setValue('ad_execution_time_from', ($data->ad_execution_time_from) );
        $document->setValue('ad_execution_time_to', ($data->ad_execution_time_to) );
        $document->setValue('place', ($data->place) );
        $document->setValue('main_implementing', ($data->main_implementing) );
        $document->setValue('sub_implementing', ($data->sub_implementing) );
        $document->setValue('cost', ($data->cost) );
//        $document->setValue('ministerial_number', ($data->ministerial_number) );
//        $document->setValue('strategic_number', ($data->strategic_number) );
//        $document->setValue('detailed_number', ($data->detailed_number) );

        $name = 'Document' . time() . '.docx';
        $document->saveAs(public_path() . "/operational_reports/" . $name);
        $file = public_path(). "/operational_reports/{$name}";

        $headers = array(
            //'Content-Type: application/msword',
            'Content-Type: vnd.openxmlformats-officedocument.wordprocessingml.document'
        );

        $response = Response::download($file, $name, $headers);
        return $response;
    }


    public function index()
    {
        $plansModels = PlansModel::get();
        return view('web.index',compact('plansModels'));
    }

}
