<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Flash;
use Auth;
use App\Entretien;
use Calendar;

class HomeController extends Controller
{

    // MTTR
    public $total;
    public $total_panne;
    // MTBF
    public $nbr_panne;
    public $total_j;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // nombre de pièce dans l'application
        $nbr_produits= \App\Piece::all()->count();
        // nombre de utilisateurs dans l'application
        $nbr_users= \App\User::all()->count();
        // seuil de stock 
        $min_p = config('app.stock');
        // seuil de jours
        $min_j = config('app.jours');
        // pièces manquantes
        $pieces = \App\Piece::where('quantite','<=',$min_p)->get();
        // entretien à faire 
        $start_date = new \DateTime(' +'.$min_j.' day');
        $today = new \DateTime();
        $entretiens_future= \App\Entretien::where('start_date','<=',$start_date->format('Y-m-d'))->where('start_date','>=',$today->format('Y-m-d'))
        ->get();
        // calendar 
        $events = [];
        $entretiens = Entretien::all();

        if($entretiens->count()) {
            
            foreach ($entretiens as $entretien) {
                $events[] = Calendar::event(
                    $entretien->text_du_rappel,
                    true,
                    new \DateTime($entretien->start_date),
                    new \DateTime($entretien->end_date.' +1 day'),
                    null,
                    // Add color and link on event
                    [
                        'color' => $entretien->equipement->couleur,
                        'url' => route('entretiens.show',['id'=>$entretien->id]),
                    ]
                );
            }
            
        }
        $calendar = Calendar::addEvents($events);

        //dd($entretiens_future);
        return view('home',compact('nbr_produits','nbr_users','pieces','entretiens_future','calendar'));
    }

    // get a settings forum
    public function get_settings()
    {
        return view('settings');
    }
    // save settings 
    public function save_settings(Request $request)
    {
        // validation 
        $validatedData = $request->validate([
        'jours' => 'required|min:1',
        'stock' => 'required|min:1',
        ]);
        // update settings
            // NB_JOURS 
            $this->putPermanentEnv('NB_JOURS',$request->jours);
            // NB_PIECE 
            $this->putPermanentEnv('NB_PIECE',$request->stock);
        //return statement 
        Flash::success('Configuration enregistré avec succès.');
        return redirect(route('settings'));
    }

    public function putPermanentEnv($key, $value)
    {
        $path = app()->environmentFilePath();

        $escaped = preg_quote('='.env($key), '/');

        file_put_contents($path, preg_replace(
            "/^{$key}{$escaped}/m",
            "{$key}={$value}",
            file_get_contents($path)
        ));
    }


    /* MTTR section 
    *
    *
    *
    */
    public function mttr()
    {
        $data=array();
        $equipements =\App\Equipement::all();
        foreach ($equipements as $e) {
            array_push($data, array("y"=> $this->calcul_mttr($e), "label" => $e->nom));
            //dd($e->nom);
        }
        //dd($equipements);
         return response()->json(['response' =>$data]);
    }
    public function calcul_mttr($e)
    {
        $y=0;
        // nombre de panne 
        $this->total_panne = 0;
        // total de temps d'arrêt 
        $this->total = 0;
        $e->pannes()->each(function($panne){
            if($panne->intervention()->exists())
            {
                $this->total =  $this->total + (int) $panne->intervention->temps_arret;
                $this->total_panne = $this->total_panne + 1;
            }
        });
        // CALCUL 
        if($this->total_panne>0)
        $y = $this->total / $this->total_panne;
        //dd($this->total_panne);
        // return 
        return $y;
    }

    /*
    * MTBF 
    *
    */
    public function mtbf()
    {
        $data=array();
        $equipements =\App\Equipement::all();
        foreach ($equipements as $e) {
            array_push($data, array("y"=> $this->calcul_mtbf($e), "label" => $e->nom));
            //dd($e->nom);
        }
        //dd($equipements);
         return response()->json(['response' =>$data]);
    }
    public function calcul_mtbf($e)
    {
        $y=0;
        // nombre de panne 
        $this->nbr_panne = 0;
        // total_j de temps d'arrêt 
        $this->total_j = 0;
        $e->pannes()->each(function($panne){
            if($panne->intervention()->exists())
            {
                $start=  new \DateTime($panne->created_at);
                $diff = $start->diff(new \DateTime($panne->intervention->created_at));
                //dd($diff->days);
                $this->total_j =  $this->total_j + (int) $diff->days;
                $this->nbr_panne = $this->nbr_panne + 1;
            }
        });
        // CALCUL 
        if($this->nbr_panne>0)
        $y = $this->total_j / $this->nbr_panne;
        //dd($this->total_j);
        // return 
        return $y;
    }

}
