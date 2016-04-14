<?php

namespace App\Http\Controllers;
use App\Filer;
use App\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Input;
use Validator;
use DB;
use Session;
use View;
use Hash;
use File;
use Storage;
class FilerController extends Controller
{

	public function getUpload() {
		$session = Session::get('auth');
		return view('upload')->with('name', $session->username);
	}
	public function postUpload(Request $request)
	{


		if (Input::hasFile('file')) {

			$files = Input::file('file');

			$count = count($files); // => DIRECTORY  OPTION TITLE ET CREATE DIR + move dir
			$upload_count = 0;
			foreach($files as $file) {

				/*$destinationPath = 'uploads';*/
				$filename = $file->getClientOriginalName();
				$extension = $file->getClientOriginalExtension();
				$validator = $this->validator($request->all());
				if ($validator->fails()) {
					/*$this->throwValidationException($request, $validator);*/
				}
				$all_files = $request->all();
				$this->create($all_files, $upload_count);
				Storage::disk('local')->put($filename,  File::get($file));
				$upload_count ++;
			}
		}

		return $this->getUpload();
	}

	protected function validator(array $data)
	{
		return Validator::make($data, [
		                       /*'title' => 'required|max:20|unique:files',
		                       'file' => 'required|mimes:png,jpeg,gif,pdf,doc, txt|unique:files',*/
		                       /* 'email' => 'required|email|max:255|unique:users',*/

		                       ]);
	}
	protected function create(array $data, $count)
	{
		$session = Session::get('auth');
		return Filer::create([
		                     'user_id' => $session->user_id,
		                     'title' => $data['title'],
		                     'file' => $data['file'][$count]->getClientOriginalName(),
		                     'extension' => $data['file'][$count]->getClientOriginalExtension(),
		                     'mime' => $data['file'][$count]->getMimeType(),
		                     'size' => $data['file'][$count]->getSize(),
		                     ]);
	}
	public function getLogout() {
		return view('welcome');
	}
	public function postLogout() {
		Session::flush();
		Auth::logout();
		return redirect('/');	}
	}
