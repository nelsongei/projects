<?php

namespace App\Http\Controllers;

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
        return Project::orderBy('created_at','desc')->get();
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
     * @return Project
     */
    public function store(Request $request): Project
    {
        //
        $project = new Project;
        $project->user_id = $request->project['user_id'];
        $project->project = $request->project['project'];
        $project->description = $request->project['description'];
        $project->save();

        return $project;
    }

    /**
     * Display the specified resource.
     *
     * @param Project $project
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
        return view('project.view',compact('project'));
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
