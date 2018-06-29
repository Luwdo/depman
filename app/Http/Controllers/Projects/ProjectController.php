<?php

namespace App\Http\Controllers\Projects;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Project;

use Illuminate\Http\Request;

use App\Util\FlashMessage;

class ProjectController extends Controller
{
    protected $flashMessage;

    public function __construct(FlashMessage $flashMessage)
    {
        $this->flashMessage = $flashMessage;
        $this->middleware('auth');
    }


    public function index()
    {
        //$users = User::all()->except(Auth::id());
        $projects = Project::all();
        return view('projects.view', ['projects' => $projects]);
    }

    public function getCreateProject(Request $request){
        return view('projects.create');
    }

    public function postCreateProject(Request $request){
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'deployer_directory' => ['required','string',
                function($attribute, $value, $fail) {
                    if ($value === 'test') {
                        return $fail($attribute.' is invalid 123.');
                    }
                }
            ],
            'deployer_user' => 'nullable|string|min:6|confirmed',
        ]);

//        $validator->after(function ($validator) {
//            if ($this->somethingElseIsInvalid()) {
//                $validator->errors()->add('field', 'Something is wrong with this field!');
//            }
//        });

        $validator->validate();

        $projectData = [
            'name' => $data['name'],
            'deployer_directory' => $data['deployer_directory']
        ];

        if($data['deployer_user']){
            $projectData['deployer_user'] = $projectData['deployer_user'];
        }


        $project = Project::create($projectData);

        $this->flashMessage->success('Project Creation Successful');

        return redirect()->route('get_projects');
    }
}
