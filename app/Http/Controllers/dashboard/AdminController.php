<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('showName');
        // وظيفته يطبق على جميع method الموجودة  في نفس class
        
    }
public function showName()
{
     return "MY NAME : Ahmed R Salha";
}
public function landingpage()
{

     $data  = ['ahmed','Rafiq','salha'];
     return  view('frontsite.landingpage',compact('data'));
}
public function showName3()
{
     return "MY NAME : Ahmed3 R Salha";
}public function showName4()
{
     return "MY NAME : Ahmed4 R Salha";
}
public function showName5()
{ 

    $data ['id']= 9598484;
    $data ['name'] = 'ahmed '; 
     return view('admin.home',$data);
}


}
