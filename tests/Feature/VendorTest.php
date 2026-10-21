<?php

namespace Tests\Feature;

use App\Models\Vendor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VendorTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_view_vendor_list(): void
    {
        Vendor::create([
            'code'                    => 'VND-001',
            'name'                    => 'PT Sumber Makmur',
            'office_address'          => 'Jl. Sudirman No. 10, Jakarta',
            'email'                   => 'info@sumbermakmur.com',
            'phone'                   => '021-12345678',
            'tax_id'                  => '01.234.567.8-901.000',
            'business_license_number' => '1234567890123',
            'status'                  => 'active',
            'pic_name'                => 'Budi Santoso',
            'pic_position'            => 'Manager Pengadaan',
            'pic_email'               => 'budi@sumbermakmur.com',
            'pic_phone'               => '081234567890',
        ]);

        $response = $this->get('/vendors');

        $response->assertStatus(200);
        $response->assertSee('PT Sumber Makmur');
        $response->assertSee('VND-001');
    }

    public function test_can_view_create_vendor_page(): void
    {
        $response = $this->get('/vendors/create');

        $response->assertStatus(200);
        $response->assertSee('Tambah Vendor Baru');
    }

    public function test_can_create_new_vendor(): void
    {
        $data = [
            'code'                    => 'VND-002',
            'name'                    => 'PT Jaya Abadi',
            'office_address'          => 'Jl. Thamrin No. 20, Bandung',
            'email'                   => 'kontak@jayaabadi.com',
            'phone'                   => '022-87654321',
            'tax_id'                  => '02.345.678.9-012.000',
            'business_license_number' => '9876543210987',
            'status'                  => 'active',
            'pic_name'                => 'Siti Rahma',
            'pic_position'            => 'Staff Vendor',
            'pic_email'               => 'siti@jayaabadi.com',
            'pic_phone'               => '081987654321',
        ];

        $response = $this->post('/vendors', $data);

        $response->assertRedirect('/vendors');
        $this->assertDatabaseHas('vendors', [
            'code' => 'VND-002',
            'name' => 'PT Jaya Abadi',
        ]);
    }

    public function test_can_view_edit_vendor_page(): void
    {
        $vendor = Vendor::create([
            'code'                    => 'VND-003',
            'name'                    => 'CV Maju Lancar',
            'office_address'          => 'Jl. Gajah Mada No. 5',
            'email'                   => 'info@majulancar.com',
            'phone'                   => '024-55556666',
            'tax_id'                  => '03.456.789.0-123.000',
            'business_license_number' => '5556667778889',
            'status'                  => 'inactive',
            'pic_name'                => 'Agus Setiawan',
            'pic_position'            => 'Direktur',
            'pic_email'               => 'agus@majulancar.com',
            'pic_phone'               => '081333444555',
        ]);

        $response = $this->get("/vendors/{$vendor->id}/edit");

        $response->assertStatus(200);
        $response->assertSee('Edit Data Vendor');
        $response->assertSee('CV Maju Lancar');
    }

    public function test_can_update_vendor(): void
    {
        $vendor = Vendor::create([
            'code'                    => 'VND-004',
            'name'                    => 'PT Awal Sejahtera',
            'office_address'          => 'Alamat Lama',
            'email'                   => 'awal@sejahtera.com',
            'phone'                   => '021-11112222',
            'tax_id'                  => '04.567.890.1-234.000',
            'business_license_number' => '1112223334445',
            'status'                  => 'active',
            'pic_name'                => 'Eko Prasetyo',
            'pic_position'            => 'Koordinator',
            'pic_email'               => 'eko@sejahtera.com',
            'pic_phone'               => '081122334455',
        ]);

        $response = $this->put("/vendors/{$vendor->id}", [
            'code'                    => 'VND-004-REV',
            'name'                    => 'PT Awal Sejahtera Sukses',
            'office_address'          => 'Alamat Baru No. 99',
            'email'                   => 'update@sejahtera.com',
            'phone'                   => '021-99998888',
            'tax_id'                  => '04.567.890.1-234.000',
            'business_license_number' => '1112223334445',
            'status'                  => 'suspend',
            'pic_name'                => 'Eko Prasetyo',
            'pic_position'            => 'Kepala Operasional',
            'pic_email'               => 'eko.p@sejahtera.com',
            'pic_phone'               => '081122334455',
        ]);

        $response->assertRedirect('/vendors');
        $this->assertDatabaseHas('vendors', [
            'id'     => $vendor->id,
            'code'   => 'VND-004-REV',
            'name'   => 'PT Awal Sejahtera Sukses',
            'status' => 'suspend',
        ]);
    }

    public function test_can_delete_vendor(): void
    {
        $vendor = Vendor::create([
            'code'                    => 'VND-005',
            'name'                    => 'PT Hapus Cepat',
            'office_address'          => 'Alamat Hapus',
            'email'                   => 'hapus@cepat.com',
            'phone'                   => '021-00000000',
            'tax_id'                  => '05.678.901.2-345.000',
            'business_license_number' => '0000000000000',
            'status'                  => 'inactive',
            'pic_name'                => 'Deni',
            'pic_position'            => 'Staff',
            'pic_email'               => 'deni@cepat.com',
            'pic_phone'               => '081000000000',
        ]);

        $response = $this->delete("/vendors/{$vendor->id}");

        $response->assertRedirect('/vendors');
        $this->assertDatabaseMissing('vendors', [
            'id' => $vendor->id,
        ]);
    }

    public function test_legacy_url_redirects_to_vendors(): void
    {
        $response = $this->get('/B_ModulVendorDanSupplier.php');

        $response->assertRedirect('/vendors');
    }
}
