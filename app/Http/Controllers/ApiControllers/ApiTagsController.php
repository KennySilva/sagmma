<?php

namespace Sagmma\Http\Controllers\ApiControllers;

use Illuminate\Http\Request;

use Request as Req;
use Sagmma\Http\Requests;
use Sagmma\Http\Controllers\Controller;
use Sagmma\Http\Requests\WebRequests\TagsRequest;
use Tag;
use Response;
use Input;

class ApiTagsController extends Controller
{
    public function index($row)
    {
        return Tag::paginate($row);
    }

    public function create()
    {}

        public function store(tagsRequest $request)
        {
            $tag              = new Tag($request->all());
            $tag->name        = $request->name;
            $tag->description = $request->description;
            $tag->save();
        }


        public function show($id)
        {
            $tag = Tag::findOrFail($id);
            return $tag;
        }

        public function edit($id)
        {
            //
        }

        public function update(Req $request, $id)
        {
            Tag::findOrFail($id)->update($request::all());
            return Response::json($request::all());

        }

        public function destroy($id)
        {
            return Tag::destroy($id);
        }
    }
