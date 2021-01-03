<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Project;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        return Project::orderBy('id','asc')->with('user')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
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
     * @return Application|Factory|View|Response
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
     * @return Response
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
        $project = Project::findOrFail($id);
        $project->user_id = $request->user_id;
        $project->project = $request->project;
        $project->description = $request->description;
        $project->push();
        if($project){
            return response()->json(['status'=>0]);
        }
        else{
            return response()->json(['status'=>1]);
        }


//
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
        $project = Project::find($id)->delete();
        if ($project){
            return response()->json(['status'=>0]);
        }
        else{
            return response()->json(['status'=>1]);
        }
    }
}
