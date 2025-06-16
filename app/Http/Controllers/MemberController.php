<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\kasir;
use App\Models\member;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function index()
    {
        $member = kasir::with('member')
            ->where('id_level', 3)
            ->paginate(5);

        $user = Auth::user();
        // dd($member->);
        return view('admin.member', compact('member'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_hp' => 'required|numeric|digits_between:10,14',
            'nama_member' => 'required|string|max:25',
            'email' => 'required|email|max:25',
        ], [
            'nomor_hp.required' => 'Nomor HP wajib diisi.',
            'nomor_hp.numeric' => 'Nomor HP harus berupa angka.',
            'nomor_hp.digits_between' => 'Nomor HP harus antara 10 hingga 14 digit.',
            'nama_member.required' => 'Nama member wajib diisi.',
            'nama_member.string' => 'Nama member harus berupa string.',
            'nama_member.max' => 'Nama member maksimal 25 karakter.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Email tidak valid.',
            'email.max' => 'Email maksimal 25 karakter.',
        ]);

        $CekNoHpmember = member::where('nomor_hp', $request->nomor_hp)->first();
        if ($CekNoHpmember) {
            return redirect()->route('member')->with('error', 'Nomor HP sudah terdaftar.');
        }

        $CekEmailmemmber = member::where('email', $request->email)->first();
        if ($CekEmailmemmber) {
            return redirect()->route('member')->with('error', 'Email sudah terdaftar.');
        }

        $user = new kasir();
        $user->nama_lengkap = $request->nama_member;
        $user->password = bcrypt("123456#");
        $user->id_level = 3;
        $user->username = $request->email;
        $user->save();

        $member = new Member();
        $member->nomor_hp = $request->nomor_hp;
        $member->email = $request->email;
        $member->nama_member = $request->nama_member;
        $member->total_poin = 0;
        $member->id_user = $user->id_user;
        $member->save();


        return redirect()->route('member')->with('success', 'Member berhasil ditambahkan.');
    }

    public function update(Request $request, $id_member)
    {
        $request->validate([
            'nomor_hp' => 'required|numeric|digits_between:10,14',
            'nama_member' => 'required|string|max:25',
            'email' => 'required|email|max:25',
        ], [
            'nomor_hp.required' => 'Nomor HP wajib diisi.',
            'nomor_hp.numeric' => 'Nomor HP harus berupa angka.',
            'nomor_hp.digits_between' => 'Nomor HP harus antara 10 hingga 14 digit.',
            'nama_member.required' => 'Nama member wajib diisi.',
            'nama_member.string' => 'Nama member harus berupa string.',
            'nama_member.max' => 'Nama member maksimal 25 karakter.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Email tidak valid.',
            'email.max' => 'Email maksimal 25 karakter.',
        ]);


        $member = member::find($id_member);
        $member->nomor_hp = $request->nomor_hp;
        $member->email = $request->email;
        $member->nama_member = $request->nama_member;
        $member->update();

        return redirect()->route('member')->with('success', 'Member berhasil diupdate.');
    }

    public function getPoints($id_member): JsonResponse
    {
        $member = Member::findOrFail($id_member);
        return response()->json([
            'total_poin' => $member->total_poin
        ]);
    }

    public function destroy($id_member)
    {
        $member = member::find($id_member);
        $member->delete();

        $user = kasir::find($member->id_user);
        $user->delete();
        return redirect()->route('member')->with('success', 'Member berhasil dihapus.');
    }
}
