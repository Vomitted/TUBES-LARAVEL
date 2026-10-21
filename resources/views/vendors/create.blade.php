@extends('layouts.app')

@section('title', 'Tambah Vendor Baru')

@section('content')
    <div style="margin-bottom: 20px;">
        <a href="{{ route('vendors.index') }}" class="btn btn-cancel">
            &larr; Batalkan / Kembali
        </a>
    </div>

    <div class="form-container">
        <h2 style="color: #dcdddc; margin-bottom: 20px;">Tambah Vendor Baru</h2>

        <form method="POST" action="{{ route('vendors.store') }}">
            @csrf

            <div class="form-group">
                <label for="code">Kode Vendor:</label>
                <input type="text" id="code" name="code" value="{{ old('code') }}" placeholder="Contoh: VND-000" required class="form-control">
                @error('code')
                    <div class="field-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="name">Nama Perusahaan:</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Contoh: PT Wijaya" required class="form-control">
                @error('name')
                    <div class="field-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="office_address">Alamat Kantor:</label>
                <textarea id="office_address" name="office_address" rows="3" required class="form-control">{{ old('office_address') }}</textarea>
                @error('office_address')
                    <div class="field-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email Kantor:</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required class="form-control">
                @error('email')
                    <div class="field-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="phone">Telepon Kantor:</label>
                <input type="text" id="phone" name="phone" value="{{ old('phone') }}" required class="form-control">
                @error('phone')
                    <div class="field-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="tax_id">NPWP:</label>
                <input type="text" id="tax_id" name="tax_id" value="{{ old('tax_id') }}" required class="form-control">
                @error('tax_id')
                    <div class="field-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="business_license_number">NIB / SIUP:</label>
                <input type="text" id="business_license_number" name="business_license_number" value="{{ old('business_license_number') }}" required class="form-control">
                @error('business_license_number')
                    <div class="field-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select id="status" name="status" class="form-control">
                    <option value="active" {{ old('status') === 'active' ? 'selected' : '' }}>ACTIVE</option>
                    <option value="inactive" {{ old('status') === 'inactive' ? 'selected' : '' }}>INACTIVE</option>
                    <option value="suspend" {{ old('status') === 'suspend' ? 'selected' : '' }}>SUSPEND</option>
                </select>
                @error('status')
                    <div class="field-error">{{ $message }}</div>
                @enderror
            </div>

            <h4 style="color: #64b5f6; margin-top: 25px; margin-bottom: 15px;">Kontak PIC Vendor</h4>

            <div class="form-group">
                <label for="pic_name">Nama PIC:</label>
                <input type="text" id="pic_name" name="pic_name" value="{{ old('pic_name') }}" required class="form-control">
                @error('pic_name')
                    <div class="field-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="pic_position">Jabatan PIC:</label>
                <input type="text" id="pic_position" name="pic_position" value="{{ old('pic_position') }}" required class="form-control">
                @error('pic_position')
                    <div class="field-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="pic_email">Email PIC:</label>
                <input type="email" id="pic_email" name="pic_email" value="{{ old('pic_email') }}" required class="form-control">
                @error('pic_email')
                    <div class="field-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="pic_phone">Nomor HP / WhatsApp PIC:</label>
                <input type="text" id="pic_phone" name="pic_phone" value="{{ old('pic_phone') }}" required class="form-control">
                @error('pic_phone')
                    <div class="field-error">{{ $message }}</div>
                @enderror
            </div>

            <div style="margin-top: 20px;">
                <button type="submit" class="btn btn-save">
                    Simpan Vendor
                </button>
            </div>
        </form>
    </div>
@endsection
