<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Project::orderBy('created_at','desc')->with('user')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
//        $store = Project::create($data);
        $store = new Project;
        $store->user_id = $request->user_id;
        $store->project = $request->project;
        $store->description = $request->description;
        $store->save();
        if ($store){
            return response()->json(['status'=>0]);
        }
        else{
            return response()->json(['status'=>1]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Project $project
     * @param Card $card
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Project $project,Card $card)
    {
        //
        return view('project.view',compact('project','card'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return string
     */
    public function update(Request $request, $id)
    {
        //
        $project = Project::find($id);
        if ($project){
            $project->user_id = $request->project['user_id'];
            $project->project = $request->project['project'];
            $project->description = $request->project['description'];
            $project->save();
            return $project;
        }
        return "Project Not Found";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return string
     */
    public function destroy($id)
    {
        //
        $project = Project::find($id);
        if ($project){
            $project->delete();
            return "Project Deleted successfully";
        }
        return "Project Not Found";
    }
}
