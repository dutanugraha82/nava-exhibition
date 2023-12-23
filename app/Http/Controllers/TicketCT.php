<?php

namespace App\Http\Controllers;

use App\Models\Tickets;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class TicketCT extends Controller
{
    public function index(){
        $data = Tickets::all();

        return view('admin.contents.ticket.index', compact('data'));
    }

    public function store(Request $request){

        // dd($request);
        $request->validate([
            'nama' => 'required',
            'foto' => 'image',
            'slot' => 'required',
            'available' => 'required',
            'expired' => 'required',
            'harga' => 'required',
        ]);

        Tickets::create([
            'nama' => Str::upper($request->nama),
            'foto' => $request->file('foto')->store('foto-ticket'),
            'slot' => $request->slot,
            'available' => $request->available,
            'expired' => $request->expired,
            'status' => "1",
            'harga' => $request->harga,
       ]);

       Alert::success('Berhasil','Ticket ditambahkan!');
       return redirect('/superadmin/tickets');
    }

    public function edit($id){
       $data = Tickets::find($id);
       return view('admin.contents.ticket.edit', compact('data'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'nama' => 'required',
            'slot' => 'required',
            'available' => 'required',
            'expired' => 'required',
        ]);

        if($request->foto_baru){
            $request->validate([
                'foto_baru' => 'image',
            ]);
        }
        // dd($request);
        

        if ($request->foto_baru) {
            Tickets::find($id)->update([
                'nama' => $request->nama,
                'slot' => $request->slot,
                'foto' => $request->file('foto_baru')->store('foto-ticket'),
                'available' => $request->available,
                'expired' => $request->expired,
            ]);
            Storage::delete($request->foto_lama);
            Alert::success('Data Tiket Berubah!');
            return redirect('/superadmin/tickets');
        }else{
            Tickets::find($id)->update([
                'nama' => $request->nama,
                'slot' => $request->slot,
                'available' => $request->available,
                'expired' => $request->expired,
            ]);
            Alert::success('Data Tiket Berubah!');
            return redirect('/superadmin/tickets');
        }
        
    }

    public function activate($id){
        Tickets::find($id)->update([
            'status' => "1",
        ]);
        Alert::success('Ticket Activated!');
        return redirect('/superadmin/tickets');
    }

    public function unactivate($id){
        Tickets::find($id)->update([
            'status' => "0",
        ]);
        Alert::success('Ticket Unactivated!');
        return redirect('/superadmin/tickets');
    }

    public function destroy(Request $request, $id){
       $data = Tickets::find($id);
       Storage::delete($data->foto);
       $data->delete();
       Alert::success('Data terhapus!');
       return redirect('/superadmin/tickets');
    }

    public function customers(Request $request, $id){

        $total = DB::table('customer')->where('tickets_id', $id)->where('status_validasi','1')->count();
        $ticket = Tickets::find($id);

        if($request->ajax()){
            $data = DB::table('customer')->where('tickets_id', $id)->where('status_validasi','1')->get();
            return datatables()->of($data)
            ->addIndexColumn()
            ->addColumn('total', function($data){
                return $this->moneyFormat($data->total_harga);
            })
            ->addColumn('file', function($data){
                if ($data->invoice) {
                    return "<a href=".asset('/storage'.'/'.$data->invoice)." target='_blank' rel='noopener noreferrer'>show</a>";
                }else{
                    return 'NULL';
                }
            })
            ->rawColumns(['total','file'])
            ->make(true);
        }

        return view('admin.contents.detail-ticket-customers', compact('total','ticket'));
    }
}
