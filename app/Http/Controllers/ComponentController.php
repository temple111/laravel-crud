<?php

namespace App\Http\Controllers;

use App\Models\Component;
use Illuminate\Http\Request;

class ComponentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $components = auth()->user()->component;
        return view('components.index', compact('components'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('components.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        $component = $user->component()->create([
            'name' => $request['name']
        ]);
        return redirect()->route('components.index')->with('alert', [
            'type' => 'success',
            'message' => "Component {$request['name']} was created."
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Component  $component
     * @return \Illuminate\Http\Response
     */
    public function show(Component $component)
    {
        return view('components.show', compact('component'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Component  $component
     * @return \Illuminate\Http\Response
     */
    public function edit(Component $component)
    {
        $this->authorize('update', $component);
        return view('components.edit', compact('component'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Component  $component
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Component $component)
    {
        $this->authorize('update', $component);
        if ($component->name == $request->name) {
            return redirect()->route('components.index')->with('alert', [
                'type' => 'warning',
                'message' => "Component {$request['name']} was not updated because the name is the same."
            ]);
        } else {
            $component->update([
                'name' => $request->name
            ]);

            return redirect()->route('components.index')->with('alert', [
                'type' => 'success',
                'message' => "Component {$request['name']} was updated."
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Component  $component
     * @return \Illuminate\Http\Response
     */
    public function destroy(Component $component)
    {
        $this->authorize('delete', $component);
        $component->delete();

        return redirect()->route('components.index')->with('alert', [
            'type' => 'primary',
            'message' => "Component {$component['name']} was deleted successfully."
        ]);
    }
}
