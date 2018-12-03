<?php

namespace App\Http\Controllers\Web;

use App\Initiative;
use App\Measurement;
use App\MinisterialInitiatives;
use App\OperationalPlan;
use App\Strategic;
use App\StrategicGoal;
use App\StrategicInitiatives;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class HomeController extends Controller
{


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


        $management = $this->getManagement($data);
        $department = $this->getDepartment($data);


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


        $management = $this->getManagement($data);
        $department = $this->getDepartment($data);






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
        $document->setValue('ministerial_number', ($data->ministerial_number) );
        $document->setValue('strategic_number', ($data->strategic_number) );
        $document->setValue('detailed_number', ($data->detailed_number) );

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
        return view('web.index');
    }


    public function getDepartment($data)
    {
        if($data->management == 1)
        {
            if($data->department == 1)
                $department = ' التخطيط والتطوير';
            elseif($data->department == 2)
                $department = ' تقنية المعلومات';
            elseif($data->department == 3)
                $department = 'الجودة الشاملة';
            elseif($data->department == 4)
                $department = 'الأمانة';
            elseif($data->department == 5)
                $department = 'الإعلام التربوي';
            elseif($data->department == 6)
                $department = 'العلاقات العامة';
            elseif($data->department == 7)
                $department = 'المراجعة الداخلية';
            elseif($data->department == 8)
                $department = 'المتابعة';
            elseif($data->department == 9)
                $department = 'الشؤون القانونية';
            elseif($data->department == 10)
                $department = 'القضايا';
            elseif($data->department == 11)
                $department = 'الأمن والسلامة';
            elseif($data->department == 12)
                $department = 'الشراكة المجتمعية';
            elseif($data->department == 13)
                $department = 'مركز التميز';
            elseif($data->department == 14)
                $department = 'مكتب وفاء';



        }elseif($data->management == 2)
        {
            if($data->department == 1)
                $department = 'تطوير الموارد البشرية';
            elseif($data->department == 2)
                $department = 'إدارة العمليات';
            elseif($data->department == 3)
                $department = 'إدارة التواصل الداخلي';



        }elseif($data->management == 3)
        {
            if($data->department == 1)
                $department = 'الشؤون المالية';
            elseif($data->department == 2)
                $department = 'الميزانية';
            elseif($data->department == 3)
                $department = 'المستودعات';
            elseif($data->department == 4)
                $department = 'المشتريات';
            elseif($data->department == 5)
                $department = 'الخدمات العامة';
            elseif($data->department == 6)
                $department = 'مراقبة المخزون';
            elseif($data->department == 7)
                $department = 'الاتصالات الإدارية';



        }elseif($data->management == 4)
        {
            if($data->department == 1)
                $department = 'التشغيل والصيانة';
            elseif($data->department == 2)
                $department = 'الإشراف والتنفيذ';
            elseif($data->department == 3)
                $department = 'الأراضي والبرمجة';
            elseif($data->department == 4)
                $department = 'الدراسات والتصاميم';



        }elseif($data->management == 5)
        {
            if($data->department == 1)
                $department = 'التخطيط المدرسي';
            elseif($data->department == 2)
                $department = 'التجهيزات المدرسية';
            elseif($data->department == 3)
                $department = 'خدمات الطلاب';




        }elseif($data->management == 6)
        {
            if($data->department == 1)
                $department = 'مكتب التعليم بتنومة';
            elseif($data->department == 2)
                $department = 'مكتب التعليم ببني عمرو';
            elseif($data->department == 3)
                $department = 'الإشراف التربوي';
            elseif($data->department == 4)
                $department = 'التدريب والابتعاث';
            elseif($data->department == 5)
                $department = 'الموهوبين';
            elseif($data->department == 6)
                $department = 'التربية الخاصة';
            elseif($data->department == 7)
                $department = 'التوجيه والإرشاد';
            elseif($data->department == 8)
                $department = 'التوعية الإسلامية';
            elseif($data->department == 9)
                $department = 'الاختبارات والقبول';
            elseif($data->department == 10)
                $department = 'النشاط الطلابي';
            elseif($data->department == 11)
                $department = 'تعليم الكبار';
            elseif($data->department == 12)
                $department = 'وحدة شراكة المدرسة مع الأسرة والمجتمع';




        }elseif($data->management == 7)
        {
            if($data->department == 1)
                $department = 'الإشراف التربوي';
            elseif($data->department == 2)
                $department = 'التدريب والابتعاث';
            elseif($data->department == 3)
                $department = 'الموهوبات';
            elseif($data->department == 4)
                $department = 'التربية الخاصة';
            elseif($data->department == 5)
                $department = 'التوجيه والإرشاد';
            elseif($data->department == 6)
                $department = 'التوعية الإسلامية';
            elseif($data->department == 7)
                $department = 'الاختبارات والقبول';
            elseif($data->department == 8)
                $department = 'نشاط الطالبات';
            elseif($data->department == 9)
                $department = 'تعليم الكبيرات';
            elseif($data->department == 10)
                $department = 'وحدة شراكة المدرسة مع الأسرة والمجتمع';
            elseif($data->department == 11)
                $department = 'رياض الأطفال';

        }



        return $department;
    }

    public function getManagement($data)
    {
        if($data->management == 1)
        {
            $management = 'الإدارات المرتبطة';
        }
        elseif($data->management == 2)
            $management = 'الموارد البشرية';
        elseif($data->management == 3)
            $management = 'الشؤون المالية والادارية';
        elseif($data->management == 4)
            $management = ' شؤون المباني';
        elseif($data->management == 5)
            $management = 'الشؤون المدرسية';
        elseif($data->management == 6)
            $management = 'الشؤون التعليمية - بنين';
        elseif($data->management == 7)
            $management = 'الشؤون التعليمية - بنات';


        return $management;
    }
}
