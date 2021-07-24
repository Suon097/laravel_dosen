<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\D112012119_dosen;
use Illuminate\Support\Facades\Validator;

class D112012119_dosenController extends Controller
{
    //
    public function index()
    {

    	$posts= D112012119_dosen::latest()->get();

    	return response()->json([

    		'success' => true,
    		'message' => 'List Semua Data Post',
    		'data'	  => $posts	 		
    	], 200);
      
    }

 
    public function store(Request $request)
    {
 
        $validator = Validator::make($request->all(), [

            'ktp_dosen' 	=> 'required',
            'nama_dosen'   => 'required',
            'alamat_dosen'  => 'required',
            'email_dosen'      => 'required',
            'notlp_dosen'      => 'required',
            'bidang_dosen'      => 'required',
            'jadwal_dosen'      => 'required'
        ],

        [
            'ktp_dosen.required' => 'Masukkan Title Post !',
            'nama_dosen.required' => 'Masukkan Image Url Post !',
            'alamat_dosen.required' => 'Masukkan Sub Description Url Post !',
            'email_dosen.required' => 'Masukkan Description Post !',
            'notlp_dosen.required' => 'Masukkan Sub Description Url Post !',
            'bidang_dosen.required' => 'Masukkan Sub Description Url Post !',
            'jadwal_dosen.required' => 'Masukkan Sub Description Url Post !'

       ]


       );

        if ($validator->fails()) {
            return response()->json([


                'success' => false,
                'message' => 'Silahkan Isi Yang Kosong',
                'data'    => $validator->errors()


              ],400);

        } else {


            $posts = D112012119_dosen::create([

            'ktp_dosen'     => $request->ktp_dosen,
            'nama_dosen'   => $request->nama_dosen,
            'alamat_dosen'  => $request->alamat_dosen,
            'email_dosen'    => $request->email_dosen,
            'notlp_dosen'    => $request->notlp_dosen,
            'bidang_dosen'    => $request->bidang_dosen,
            'jadwal_dosen'    => $request->jadwal_dosen


            ]);


            if($posts) {

               return response()->json([

                'success' => true,
                'message' => 'Post Created',
                'data'    => $posts  

                ],201);

            } else {

              return response()->json([
                'success' => false,
                'message' => 'Post Gagal Disimpan!',

                ], 401);


            }

        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  Client  $client
     * @return Response
     */
    public function show($id)
    {
      $posts= D112012119_dosen::whereId($id)->first();

      if ($posts) {
    	return response()->json([

    		'success' => true,
    		'message' => 'Detail Data Post',
    		'data'	  => $posts	 		
    	], 200);

      } else {
          return response()->json([
                'success' => false,
                'message' => 'Post Tidak Ditemukan!',
                'data'    => ''
          ], 401);
      }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Client  $client
     * @return Response
     */
    public function update(Request $request,$id)
    {
        
         $validator = Validator::make($request->all(), [
            
           'ktp_dosen'  => 'required',
            'nama_dosen'   => 'required',
            'alamat_dosen'  => 'required',
            'email_dosen'      => 'required',
            'notlp_dosen'      => 'required',
            'bidang_dosen'      => 'required',
            'jadwal_dosen'      => 'required'
           
        ],

           [
           
            'ktp_dosen.required' => 'Masukkan Title Post !',
            'nama_dosen.required' => 'Masukkan Image Url Post !',
            'alamat_dosen.required' => 'Masukkan Sub Description Url Post !',
            'email_dosen.required' => 'Masukkan Description Post !',
            'notlp_dosen.required' => 'Masukkan Sub Description Url Post !',
            'bidang_dosen.required' => 'Masukkan Sub Description Url Post !',
            'jadwal_dosen.required' => 'Masukkan Sub Description Url Post !'
           ]

       );

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Yang Kosong',
                'data'    => $validator->errors()
            ], 400);
        } //else {
        $posts= D112012119_dosen::whereId($id)->first();

          

            if ($posts) {

               $posts->update([
                'ktp_dosen'     => $request->input('ktp_dosen'),
                'nama_dosen'   => $request->input('nama_dosen'),
                'alamat_dosen'  => $request->input('alamat_dosen'),
                'email_dosen'      => $request->input('email_dosen'),
                'notlp_dosen'      => $request->input('notlp_dosen'),
                'bidang_dosen'      => $request->input('bidang_dosen'),
                'jadwal_dosen'      => $request->input('jadwal_dosen'),
            ]);
                return response()->json([
                    'success' => true,
                    'message' => 'Data Post Berhasil Diupdate!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Post Gagal Diupdate Karena ID Tersebut Tidak Ditemukan!',
                ], 401);
            }
        //}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Client  $client
     * @return Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        $posts= D112012119_dosen::whereId($id)->first();

        //$posts = D112012119_news::findOrfail($id);
        

        if($posts) {
        	//delete post
        	$posts->delete();

      		return response()->json([

			     'success' => true,
    		   'message' => 'Data ID Post Tersebut Berhasil Dihapus'
    		 

      		],200);

      	} else {

      	//data post not found
      	     return response()->json([

      	        'success' => false,
    	          'message' => 'ID Post Tersebut Tidak Ditemukan!'

      	     ], 404);

        }


    }
}
