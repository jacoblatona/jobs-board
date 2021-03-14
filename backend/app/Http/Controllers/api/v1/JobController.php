<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobPostRequest;
use App\Http\Resources\JobResource;
use App\Models\JobPost;
use Illuminate\Http\Request;
use App\Http\Traits\Upload;

class JobController extends Controller
{
    use Upload;
    public function index()
    {
        return JobResource::collection(JobPost::orderBy('id', 'desc')->get());
    }


    public function store(JobPostRequest $request)
    {
        $data = $request->validated();
        $job = JobPost::create($request->except('company_logo') + ['company_logo' => $this->uploadImage($request->file('company_logo'))]);

        return response()->json($job, 200);
    }

    public function show(JobPost $job)
    {
        return new JobResource($job);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
