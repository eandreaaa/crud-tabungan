<?php

namespace App\Http\Controllers;

use App\Models\Tabungan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TabunganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('login');
    }

    public function login()
    {
        return view('login');
    }

    public function nabung()
    {
        $data = Tabungan::where('user_id', Auth::user()->id);
        return view('dashboard.dashboard', compact('data'));
    }

    public function home()
    {
        return view('home');
    }

    public function dashboard()
    {

        $data = Tabungan::all();
        return view('dashboard.dashboard', compact('data'));
    }

    public function register()
    {
        return view('register');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function registerAccount(Request $request)
    {
        $request->validate([
            'email' => 'required|email:dns',
            'username' => 'required|min:4|max:8',
            'password' => 'required|min:4',
            'name' => 'required|min:3'
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/')->with('success', 'Berhasil membuat akun. Silakan login');
    }

    public function auth(Request $request)
    {
        $request->validate([
            'username' => 'required|exists:users,username',
            'password' => 'required',
        ],[
            'username.exists' => 'Username belum ada, silakan registrasi.',
            'username.required' => 'Username harus ada.',
            'password.required' => 'Password harus ada.',
        ]);

        $user = $request->only('username', 'password');
        if (Auth::attempt($user)) {
            return redirect()->route('nabung.home');
        }else{
            return redirect()->back()->with('error', 'Login gagal, silakan coba lagi');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   


        return view('dashboard.create');
    

        // return 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|min:8|unique:tabungans',
            'name' => 'required|min:3',
            'rayon' => 'required',
            'money' => 'required|min:3'
        ]);

        Tabungan::create([
            'nis' => $request->nis,
            'name' => $request->name,
            'rayon' => $request->rayon,
            'money' => $request->money,
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('nabung.dashboard')->with('successAdd', 'Berhasil menambah siswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tabungan  $tabungan
     * @return \Illuminate\Http\Response
     */
    public function show(Tabungan $tabungan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tabungan  $tabungan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tabungan = Tabungan::where('id', $id)->first();
        return view('dashboard.edit', compact('tabungan'),[
            'title' => 'Edit',
        ]);
        
        // $tabungan = Tabungan::where();
        // if($request->aksi == 1){ //nambah
        //     $tabungan->money + $request->money2;
        //     $tabungan->save();
        //     return redirect('/nabung/dashboard')->with('addMoney', 'Berhasil menabung');
        // }else{ //kurang
        //     $tabungan->money - $request->money2;
        //     $tabungan->save();
        //     return redirect('/nabung/dashboard')->with('addMinus', 'Uang berhasil diambil');
        // };

        // $request->validate([
        //     'money2' => $request->money2,
        //     'money' => $request->money + $request->money2
        // ]);
        // return redirect('/nabung/dashboard')->with('successAddi', 'Berhasil menabung');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tabungan  $tabungan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $tabungan = Tabungan::where('id', $id)->first();
        // dd($tabungan);
        $request->validate([
            'nis' => 'required|min:8',
            'name' => 'required|min:3',
            'rayon' => 'required',
            'money' => 'required'
        ]);

        if($request->aksi == "nabung"){
            $tabungan->update([
                "money" => $tabungan->money + $request->money2
            ]); 
            return redirect('/nabung/dashboard')->with('suksesUp', 'Berhasil menambahkan uang');
        }elseif($request->aksi == "tarik"){
            $tabungan->update([
                "money" => $tabungan->money - $request->money2
            ]);
            return redirect('/nabung/dashboard')->with('suksesDown', 'Berhasil menarik uang');
        }
        // $tabungan->update($request->only('money'));
        // return redirect('/nabung/dashboard')->with('suksesUp', 'Berhasil melakukan transaksi');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tabungan  $tabungan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tabungan::where('id', '=', $id)->delete();
        return redirect()->back()->with('successDelete', 'Tabungan siswa dihapus.');
    }
}


