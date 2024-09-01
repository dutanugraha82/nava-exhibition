<?php

namespace App\Exports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CustomerExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Customer::where('status_validasi','=','1')->with(['ticket','admin'])->get()->map(function($customer){
            return [
                'kode_registrasi' => $customer->kode_registrasi,
                'nohp' => $customer->nohp,
                'name' => $customer->name,
                'jenis_tiket' => $customer->ticket->nama,
                'jumlah_tiket' => $customer->jumlah_tiket,
                'total_harga' => $customer->total_harga,
                'validator' => $customer->admin->name ?? 'No Admin',
                'tanggal_pembelian' => $customer->updated_at,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Kode Registrasi',
            'No HP',
            'Nama',
            'Jenis Tiket',
            'Jumlah Tiket',
            'Total Harga',
            'Validator',
            'Tanggal Pembelian'
        ];
    }
}
