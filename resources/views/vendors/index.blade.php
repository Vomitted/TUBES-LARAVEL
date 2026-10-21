@extends('layouts.app')

@section('title', 'Modul B - Vendor & Supplier')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
        <h2 style="color: #ffffff; margin: 0;">Daftar Vendor / Supplier</h2>
        <a href="{{ route('vendors.create') }}" class="btn btn-success" style="padding: 12px 20px; font-size: 15px;">
            + Tambahkan Vendor / Supplier Baru
        </a>
    </div>

    <div style="overflow-x: auto;">
        <table border="1" cellpadding="8" cellspacing="0" style="width: 100%; border-collapse: collapse; border-color: #333333; font-size: 14px;">
            <thead>
                <tr style="background-color: #1f1f1f; color: #fffafa;">
                    <th style="padding: 10px;">Kode</th>
                    <th style="padding: 10px;">Nama & Alamat Kantor</th>
                    <th style="padding: 10px;">Kontak Kantor</th>
                    <th style="padding: 10px;">Legalitas (NPWP / NIB)</th>
                    <th style="padding: 10px;">Kontak PIC</th>
                    <th style="padding: 10px;">Status</th>
                    <th style="padding: 10px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($vendors as $vendor)
                    <tr style="background-color: #2b2b2b;">
                        <td style="text-align: center;"><strong>{{ $vendor->code }}</strong></td>
                        <td>
                            <strong>{{ $vendor->name }}</strong><br>
                            <small style="color: #bbb;">{{ $vendor->office_address }}</small>
                        </td>
                        <td>
                            {{ $vendor->phone }}<br>
                            <small style="color: #bbb;">{{ $vendor->email }}</small>
                        </td>
                        <td>
                            NPWP: {{ $vendor->tax_id }}<br>
                            NIB: {{ $vendor->business_license_number }}
                        </td>
                        <td>
                            {{ $vendor->pic_name }} ({{ $vendor->pic_position }})<br>
                            <small style="color: #bbb;">{{ $vendor->pic_phone }} | {{ $vendor->pic_email }}</small>
                        </td>
                        <td style="text-align: center;">
                            <span style="color: {{ $vendor->status === 'active' ? 'rgb(4, 255, 4)' : 'rgb(255, 75, 75)' }}; font-weight: bold; text-transform: uppercase;">
                                {{ $vendor->status }}
                            </span>
                        </td>
                        <td style="text-align: center; white-space: nowrap;">
                            <a href="{{ route('vendors.edit', $vendor->id) }}" style="color: #64b5f6; text-decoration: none; font-weight: bold; margin-right: 10px;">
                                Edit
                            </a>
                            <form action="{{ route('vendors.destroy', $vendor->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus vendor ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background: none; border: none; color: #e57373; font-weight: bold; cursor: pointer; padding: 0; font-size: 14px; text-decoration: underline;">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="text-align: center; padding: 25px; color: #aaa;">
                            Belum ada data vendor. Silakan klik tombol "Tambahkan Vendor / Supplier Baru" di atas.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
