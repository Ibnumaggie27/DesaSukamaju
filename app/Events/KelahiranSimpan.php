<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class KelahiranSimpan
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

   public $noKK;
   public $nik;
   public $namaLengkap;
   public $jk;
   public $tempatLahir;
   public $tanggalLahir;
   public $agama;
   public $namaAyah;
   public $namaIbu;
   public $namaKepalaKeluarga;
   public $alamat;
   public $kewarganegaraan;
   public $rt;
   public $rw;
   public $kodePos;
   public $desa;
   public $kecamatan;
   public $kabupaten;
   public $provinsi;

    public function __construct($nik, $namaLengkap, $noKK, $jk, $tempatLahir, $tanggalLahir, $agama, $namaAyah, $namaIbu, $namaKepalaKeluarga, $alamat, $kewarganegaraan, $rt, $rw, $kodePos, $desa, $kecamatan, $kabupaten, $provinsi)
    {
        $this->noKK = $noKK;
        $this->nik = $nik;
        $this->namaLengkap = $namaLengkap;
        $this->jk = $jk;
        $this->tempatLahir = $tempatLahir;
        $this->tanggalLahir = $tanggalLahir;
        $this->agama = $agama;
        $this->namaAyah = $namaAyah;
        $this->namaIbu = $namaIbu;
        $this->namaKepalaKeluarga = $namaKepalaKeluarga;
        $this->alamat = $alamat;
        $this->kewarganegaraan = $kewarganegaraan;
        $this->rt = $rt;
        $this->rw = $rw;
        $this->kodePos = $kodePos;
        $this->desa = $desa;
        $this->kecamatan = $kecamatan;
        $this->kabupaten = $kabupaten;
        $this->provinsi = $provinsi;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
