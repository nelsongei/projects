<?php

namespace App\Http\Controllers;

use App\Charts\DataChart;
use App\Charts\SampleChart;
use App\Models\Email;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all()->count();
        $projects = Project::all()->count();
        $tasks = Task::all()->count();
        $emails = Email::all()->count();
        //Communication
        $previous_week = strtotime("0 day");
        $start_week = (strtotime("last sunday",$previous_week));
        $end_week = (strtotime("next saturday",$start_week));
        $start_week1 = date("Y-m-d",$start_week);
        $end_week1 = date("Y-m-d",$end_week);
        //previous
        $previous_week = strtotime("-1 week");
        $start_week = (strtotime("last sunday",$previous_week));
        $end_week = (strtotime("next saturday",$start_week));
        $start_week2 = date("Y-m-d",$start_week);
        $end_week2 = date("Y-m-d",$end_week);
        //previous-1
        $previous_week = strtotime("-2 week");
        $start_week = strtotime("last sunday",$previous_week);
        $end_week = strtotime("next saturday",$start_week);
        $start_week3 = date("Y-m-d",$start_week);
        $end_week3 = date("Y-m-d",$end_week);
        //
        $previous_week = strtotime("-3 week");
        $start_week = strtotime("last sunday",$previous_week);
        $end_week = strtotime("next saturday",$start_week);
        $start_week4 = date("Y-m-d",$start_week);
        $end_week4 = date("Y-m-d",$end_week);
        //
        $week1 = Email::whereBetween('created_at',[$start_week1,$end_week1])->count();
        $week2 = Email::whereBetween('created_at',[$start_week2,$end_week2])->count();
        $week3 = Email::whereBetween('created_at',[$start_week3,$end_week3])->count();
        $week4 = Email::whereBetween('created_at',[$start_week4,$end_week4])->count();
        //Projects Charts
        $project1 = Project::where('created_at',[$start_week1,$end_week1])->count();
        $project2 = Project::where('created_at',[$start_week2,$end_week2])->count();
        $project3 = Project::where('created_at',[$start_week3,$end_week3])->count();
        $project4 = Project::where('created_at',[$start_week4,$end_week4])->count();
        //Line Chart
        $emailCount = new DataChart();
        $emailCount->labels(['3 Weeks Ago','2 Weeks Ago','Last Week','This Week']);
        $emailCount->dataset('Email','line',[$week4, $week3,$week2,$week1])
                    ->color('#f96f34')
                    ->backgroundColor('#f96f34')
                    ->fill(false);
        $project = new DataChart();
        $project->labels(['3 weeks Ago','2 weeks Ago','Last Week','This Week']);
        $project->dataset('Projects','bar',[$project4,$project3,$project2,$project1])
                ->color('#dc3545')
                ->backgroundColor('#dc3545')
                ->fill(false);
        $usersCount = new DataChart();
        $usersCount->labels(['Users']);
        $usersCount->dataset('Users','bar',[$users])
                    ->color('#4b476d');
        return view('home',compact('users','projects','tasks','emails','emailCount','project','usersCount'));
    }
    public function project(){
        $users = User::all();
        return view('project.index',compact('users'));
    }
}
