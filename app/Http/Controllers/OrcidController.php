<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orcid;

class OrcidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createOrcid(Request $request)
    {
        $signup = $request->validate([
            'orcid' => 'required|string | unique:orcids',
            'name' => 'required|string',
            'surname' => 'required|string',
            'keywords' => 'required|string',
            'primary_email' => 'required | string | email | unique:orcids',
        ]);
  
        $orcid = new Orcid();
        $orcid->orcid = $request->orcid;
        $orcid->name = $request->name;
        $orcid->surname = $request->surname;
        $orcid->keywords = $request->keywords;
        $orcid->primary_email = $request->primary_email;
        $orcid->save();

        $respon = [
            'status' => '200',
            'msg' => 'created new orcid successfully',
            'new_orcid' => $orcid
        ];

        return response()->json($respon, 200);  
    }

    public function deleteOrcid($orcid)
    {
        $res = Orcid::where(['orcid' => $orcid])->delete();
        if($res){
            $respon = [
                'status' => '200',
                'msg' => 'Deleted orcid '.$orcid.' successfully',
    
            ];
    
            return response()->json($respon, 200);  
        } else {
            $respon1 = [
                'status' => '401',
                'msg' => 'No orcid',
            ];
    
            return response()->json($respon1, 200); 
        }
        
    }

    public function getAllOrcid()
    {
        $res = Orcid::all();
        if($res){
            $respon = [
                'status' => '200',
                'msg' => 'All List',
                'data' => $res
    
            ];
    
            return response()->json($respon, 200);  
        } else {
            $respon1 = [
                'status' => '401',
                'msg' => 'No Orcid',
            ];
    
            return response()->json($respon1, 200); 
        }
        
    }

    public function getOrcidDetail($orcid)
    {
        $res = Orcid::where(['orcid' => $orcid])->get();
        if($res){
            $respon = [
                'status' => '200',
                'msg' => 'Orcid Detail',
                'data' => $res
    
            ];
    
            return response()->json($respon, 200);  
        } else {
            $respon1 = [
                'status' => '401',
                'msg' => 'No Orcid',
            ];
    
            return response()->json($respon1, 200); 
        }
        
    }

}
