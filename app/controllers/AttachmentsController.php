<?php

class AttachmentsController extends \BaseController {

    /**
     * Store a newly created attachement in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make($data = Input::all(), EventAttachment::$rules);

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $ext = last(explode(".", $_FILES['file']['name']));
        $file = basename(md5(time()). "." .$ext);

        if(!file_exists(realpath(__DIR__)."/../../public/assets/". $ext))
            mkdir(realpath(__DIR__)."/../../public/assets/". $ext);

        if(move_uploaded_file($_FILES['file']['tmp_name'], realpath(__DIR__)."/../../public/assets/".$ext."/". $file)){
            echo "Good";
        }else{
            echo "Bad";
        }

        EventAttachment::create([
            'name' => $data['name'],
            'event_id' => $data['event_id'],
            'path' => asset('assets/'.$ext."/" . $file),
            'local_path' => 'assets/'.$ext."/" . $file
        ]);

        return Redirect::route('events.index');
    }
}