<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Departement;
use App\Models\Post;
use App\Models\User;

class ChartController extends Controller
{
    public function index(){

        $alldept = array();
        $allcapa = array();
        $capaopen = array();
        $capaclose = array();
        $capadone = array();
        $capacancel = array();
        $man = array();
        $machine = array();
        $methode = array();
        $material = array();
        $mileau = array();

        $departements = Departement::all();

        $kategoris  = Departement::withCount('posts')->get();

        foreach ($departements as $departement){
            $alldept[] = $departement->name;
            $capaclose[]=Post::where('departement_id',$departement->id)->where('status_id',2)->count();
            $capaopen[]=Post::where('departement_id',$departement->id)->where('status_id',1)->count();
            $capadone[]=Post::where('departement_id',$departement->id)->where('status_id',3)->count();
            $capacancel[]=Post::where('departement_id',$departement->id)->where('status_id',4)->count();
            $man[]=Post::where('departement_id',$departement->id)->where('rootcause_id',1)->count();
            $machine[]=Post::where('departement_id',$departement->id)->where('rootcause_id',2)->count();
            $methode[]=Post::where('departement_id',$departement->id)->where('rootcause_id',3)->count();
            $material[]=Post::where('departement_id',$departement->id)->where('rootcause_id',4)->count();
            $mileau[]=Post::where('departement_id',$departement->id)->where('rootcause_id',5)->count();
        }

        foreach ($kategoris as $kategori){
            $allcapa[] = $kategori->posts_count;
        }

        // dd($capaclosed);

        return view('dashboard.chart.index',[
            'alldept' => $alldept,
            'allcapa' => $allcapa,
            'capaclose' => $capaclose,
            'capadone' => $capadone,
            'capaopen' => $capaopen,
            'capacancel' => $capacancel,
            'man' => $man,
            'machine' => $machine,
            'methode' => $methode,
            'material' => $material,
            'mileau' => $mileau,

        ]);
    }
}
