<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\Penduduk;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\Importable;

class PendudukImport implements ToCollection, WithHeadingRow, WithValidation, WithStartRow
{
    use Importable;

    protected $errors = [];

    private $agamaMapping = [
        'ISLAM' => 1,
        'KRISTEN' => 2,
        'KATOLIK' => 3,
        'HINDU' => 4,
        'BUDHA' => 5,
        'KONGHUCU' => 6,
        // Tambahkan pemetaan lain jika diperlukan
    ];

    public function collection(Collection $rows)
    {
        $importedNiks = []; // Array untuk menyimpan NIK yang telah diimpor
        $errorCount = 0; // Counter untuk jumlah kesalahan

        foreach ($rows as $rowNumber => $row) {
            $nik = $row['nik'];

            // Periksa apakah NIK sudah ada dalam array $importedNiks atau di database
            if (Penduduk::where('NIK', $nik)->exists() || in_array($nik, $importedNiks)) {
                // Tambahkan pesan kesalahan jika belum mencapai batas maksimum
                if ($errorCount < 10) {
                    $this->errors[] = [
                        'row' => $rowNumber + 2, // Baris 1 untuk heading, 1 untuk index 0
                        'message' => 'Duplikat data dengan NIK: ' . $nik
                    ];
                }
                $errorCount++;
                continue; // Lewati baris ini dan lanjutkan ke baris berikutnya
            }

            try {
                Penduduk::create([
                    'noKK' => $row['nomor_kk'],
                    'namaLengkap' => $row['nama_lengkap'],
                    'NIK' => $row['nik'],
                    'jk' => $this->convertJenisKelamin($row['jenis_kelamin']),
                    'tempatLahir' => $row['tempat_lahir'],
                    'tanggalLahir' => $this->convertTanggalLahir($row['tanggal_lahir']),
                    'agama' => $this->convertAgama($row['agama']),
                    'pendidikan' => $row['pendidikan'],
                    'jenisPekerjaan' => $row['jenis_pekerjaan'],
                    'goldar' => $this->convertGoldar($row['golongan_darah']),
                    'statusPerkawinan' => $this->convertStatusPerkawinan($row['status_perkawinan']),
                    'tanggalPerkawinan' => $this->convertTanggal($row['tanggal_perkawinan']),
                    'statusHubungan' => $row['status_hubungan'],
                    'kewarganegaraan' => $this->convertKewarganegaraan($row['kewarganegaraan']),
                    'noPaspor' => $row['nomor_paspor'],
                    'noKitap' => $row['nomor_kitap'],
                    'namaAyah' => $row['nama_ayah'],
                    'namaIbu' => $row['nama_ibu'],
                    'namaKepalaKeluarga' => $row['nama_kepala_keluarga'],
                    'alamat' => $row['alamat'],
                    'rt' => $row['rt'],
                    'rw' => $row['rw'],
                    'kodePos' => $row['kode_pos'],
                    'desa' => $row['desa'],
                    'kecamatan' => $row['kecamatan'],
                    'kabupaten' => $row['kabupaten'],
                    'provinsi' => $row['provinsi'],
                    'tanggalDikeluarkan' => $this->convertTanggal($row['tanggal_dikeluarkan']),
                    'tipePenduduk' => $this->convertTipePenduduk($row['tipe_penduduk']),
                    'statusNik' => $this->convertStatusNik($row['status_nik']),
                ]);

                // Tambahkan NIK ke dalam array $importedNiks
                $importedNiks[] = $nik;
            } catch (\Exception $e) {
                if ($errorCount < 10) {
                    $this->errors[] = [
                        'row' => $rowNumber + 2,
                        'message' => 'Kesalahan pada NIK: ' . $nik . ' - ' . $e->getMessage()
                    ];
                }
                $errorCount++;
            }
        }
    }

    public function rules(): array
    {
        return [
            'nik' => 'required|unique:penduduks,nik',
        ];
    }

    public function startRow(): int
    {
        return 2; // Jika file memiliki header di baris pertama
    }

    public function customValidationMessages()
    {
        return [
            'nik.unique' => 'NIK sudah ada di database.',
        ];
    }

    public function getErrors()
    {
        return $this->errors;
    }

    private function convertJenisKelamin($jenisKelamin)
    {
        return ($jenisKelamin == 'LAKI-LAKI') ? 0 : 1;
    }

    private function convertTanggalLahir($tanggalLahir)
    {
        try {
            $tanggalLahir = trim($tanggalLahir, "'"); // Menghapus tanda kutip tunggal di awal atau akhir string
            return Carbon::createFromFormat('d/m/Y', $tanggalLahir)->format('Y-m-d');
        } catch (\Exception $e) {
            return null; // Kembalikan null jika terjadi kesalahan
        }
    }

    private function convertTanggal($tanggal)
    {
        return $tanggal ? Carbon::createFromFormat('d/m/Y', $tanggal)->format('Y-m-d') : null;
    }

    private function convertAgama($agama)
    {
        $agama = strtoupper($agama);

        if (isset($this->agamaMapping[$agama])) {
            return $this->agamaMapping[$agama];
        } else {
            return null;
        }
    }

    private function convertStatusPerkawinan($statusPerkawinan)
    {
        $mapping = [
            'KAWIN' => 1,
            'BELUM KAWIN' => 2,
            'CERAI HIDUP' => 3,
            'CERAI MATI' => 4,
        ];

        if (isset($mapping[$statusPerkawinan])) {
            return $mapping[$statusPerkawinan];
        } else {
            return null;
        }
    }

    private function convertKewarganegaraan($kewarganegaraan)
    {
        $mapping = [
            'WNI' => 1,
            'WNA' => 2,
        ];

        if (isset($mapping[$kewarganegaraan])) {
            return $mapping[$kewarganegaraan];
        } else {
            return null;
        }
    }

    private function convertTipePenduduk($tipePenduduk)
    {
        $mapping = [
            'PENDUDUK TETAP' => 1,
            'PENDUDUK SEMENTARA' => 2,
        ];

        if (isset($mapping[$tipePenduduk])) {
            return $mapping[$tipePenduduk];
        } else {
            return null;
        }
    }

    private function convertStatusNik($statusNik)
    {
        $mapping = [
            'PERMANEN' => 1,
            'SEMENTARA' => 2,
        ];

        if (isset($mapping[$statusNik])) {
            return $mapping[$statusNik];
        } else {
            return null;
        }
    }

    private function convertGoldar($goldar)
    {
        $mapping = [
            'A+' => 1,
            'A-' => 2,
            'B+' => 3,
            'B-' => 4,
            'AB+' => 5,
            'AB-' => 6,
            'O+' => 7,
            'O-' => 8,
        ];

        if (isset($mapping[$goldar])) {
            return $mapping[$goldar];
        } else {
            return null;
        }
    }
}
