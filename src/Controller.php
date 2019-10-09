<?php

namespace Walthere\MD;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{


    public function upload(Request $request)
    {

        $config = config('MD');
        $data = [];
        try {
            $file = $request->file("editormd-image-file");
            $folder = "img";
            if ($config['date_folder']) {
                $folder = "img/".date("Ymd", time());
                if (!file_exists(public_path('uploads/' . $folder))) {
                    mkdir(public_path('uploads/' . $folder));
                }
            }
            $path = $file->store('/' . $folder, 'md');
            $data['success'] = 1;
            $data['message'] = 'image upload success';
            $data['url'] = "/uploads/" . $path;
        } catch (\Exception $e) {
            $data['success'] = 0;
            $data['message'] = $e->getMessage();
        }

        return $data;
    }


}
