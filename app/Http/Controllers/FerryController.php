<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Equipement, Ferry};
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\FerryRequest; 
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;


class FerryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ferrys = Ferry::all();

        return view('index', compact('ferrys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $equipements = Equipement::all();
        return view('create',compact('equipements'));
    }

    public function __construct(){
        $this->middleware('auth')->only(['index','create','store','show','destroy','creerPDF']);
    }

    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson()?null:route('login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FerryRequest $ferryRequest) : RedirectResponse
    {
        $ferry = new Ferry();
    $ferry->nom = $ferryRequest->input('nom');
    $ferry->longueur = $ferryRequest->input('longueur');
    $ferry->largeur = $ferryRequest->input('largeur');
    $ferry->vitesse = $ferryRequest->input('vitesse');

    if ($ferryRequest->hasFile('photo')) {
        $photoName = time() . '.' . $ferryRequest->photo->extension();
        $ferryRequest->photo->move(public_path('images'), $photoName);
        $ferry->photo = $photoName;
    }

    $ferry->save();
    $ferry->equipements()->attach($ferryRequest->equipement_id);

    return redirect()->route('ferry.index')->with('info', "Le ferry a bien été créé");
    }

    /**
     * Display the specified resource.
     */
    public function show(Ferry $ferry) : View
    {
        $equipement = Equipement::all();
        return view("show", compact('ferry','equipement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ferry $ferry) : RedirectResponse
    {
        $ferry->delete();
        return back()->with('info', "Le ferry a été supprimé"); 
    }

    public function creerPDF()
    {
        $equipements = Equipement::all();
        $ferrys = DB::table('ferries')
            ->join("equipement_ferry", "ferry_id", "=", "ferries.id")
            ->select("ferries.*", "equipement_ferry.*")
            ->orderBy('nom')
            ->get();

        $ferrys = Ferry::with('equipements')->orderBy('nom')->get();
        $data = [
            'titre' => 'Liste des ferrys',
            'date' => date("d/m/y"),
            'ferrys' => $ferrys
        ];
        $pdf = PDF::loadView('pdf', $data);
        return $pdf->download('ferry_pdf.pdf');
    }

}
