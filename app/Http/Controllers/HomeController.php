<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;

class HomeController extends Controller
{
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
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // return view('dashboard');
        $home = Home::all();
        $totalLampu= Home::where('thingType', '<=', "Lampu")->get();
        $countTotalLampu = $totalLampu->count();
        // return view('dashboard', ['things' => $home]);
        return view('dashboard', compact('home', 'countTotalLampu'));
    }

    public function store(Request $request)
    {
        // $mahasiswa = new Mahasiswa;
        // $mahasiswa->nim = $request->nim;
        // $mahasiswa->nama = $request->nama;
        // $mahasiswa->email = $request->email;
        // $mahasiswa->jurusan = $request->jurusan;
        // $mahasiswa->save();
        // return redirect('/');

        $request->validate([
            'thing' => 'required',
            'thingType' => 'required',
            'room' => 'required',
        ]);

        Home::create([
            'thing' => $request->nama,
            'thingType' => $request->jenis,
            'room' => $request->lokasi,
            'state' => 0
        ]); 

        // Home::create($request->all());

        
        return redirect('/home')
            ->with('success','Benda Berhasil Ditambahkan!');
    }

    public function updateThing(Request $request)
    {
        $home = Home::find($request->id);
        $home->state = $request->state;
        $home->save();
    }
}
