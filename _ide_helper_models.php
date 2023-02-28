<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Anggaran
 *
 * @property int $id
 * @property string $kode_skpd
 * @property string $nama_skpd
 * @property string $kode_sub_skpd
 * @property string $nama_sub_skpd
 * @property string $kode_urusan
 * @property string $nama_urusan
 * @property string $kode_bidang_urusan
 * @property string $nama_bidang_urusan
 * @property string $kode_program
 * @property string $nama_program
 * @property string $kode_kegiatan
 * @property string $nama_kegiatan
 * @property string $kode_sub_kegiatan
 * @property string $nama_sub_kegiatan
 * @property string|null $kode_rekening
 * @property string|null $nama_rekening
 * @property string|null $nomor_spd
 * @property string|null $periode_spd
 * @property float|null $nilai_detail_spd
 * @property float|null $sisa_detail_spd
 * @property string|null $tahap_spd
 * @property string|null $sub_tahap_spd
 * @property string|null $status_tahap_spd
 * @property string|null $dokumen
 * @property string|null $jenis
 * @property string|null $nomor_dokumen
 * @property string|null $nomor_lpj
 * @property string|null $status_lpj
 * @property string|null $tgl_simpan
 * @property string|null $tgl_dokumen
 * @property string|null $bln_dokumen
 * @property string|null $ket_dokumen
 * @property float|null $nilai_realisasi
 * @property float|null $nilai_setoran
 * @property string|null $user_dokumen
 * @property string|null $pegawai_dokumen
 * @property string|null $nomor_spp
 * @property string|null $tgl_spp
 * @property string|null $nomor_spm
 * @property string|null $tgl_spm
 * @property string|null $nomor_sp2d
 * @property float|null $nilai_sp2d
 * @property string|null $tgl_sp2d
 * @property string|null $periode
 * @property float|null $nilai_realisasi_lra
 * @property string|null $no_spp_gu
 * @property float|null $nilai_spp_gu
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran query()
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran whereBlnDokumen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran whereDokumen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran whereJenis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran whereKetDokumen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran whereKodeBidangUrusan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran whereKodeKegiatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran whereKodeProgram($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran whereKodeRekening($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran whereKodeSkpd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran whereKodeSubKegiatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran whereKodeSubSkpd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran whereKodeUrusan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran whereNamaBidangUrusan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran whereNamaKegiatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran whereNamaProgram($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran whereNamaRekening($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran whereNamaSkpd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran whereNamaSubKegiatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran whereNamaSubSkpd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran whereNamaUrusan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran whereNilaiDetailSpd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran whereNilaiRealisasi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran whereNilaiRealisasiLra($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran whereNilaiSetoran($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran whereNilaiSp2d($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran whereNilaiSppGu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran whereNoSppGu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran whereNomorDokumen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran whereNomorLpj($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran whereNomorSp2d($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran whereNomorSpd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran whereNomorSpm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran whereNomorSpp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran wherePegawaiDokumen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran wherePeriode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran wherePeriodeSpd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran whereSisaDetailSpd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran whereStatusLpj($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran whereStatusTahapSpd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran whereSubTahapSpd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran whereTahapSpd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran whereTglDokumen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran whereTglSimpan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran whereTglSp2d($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran whereTglSpm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran whereTglSpp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran whereUserDokumen($value)
 */
	class Anggaran extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Anggaran2
 *
 * @property int $id
 * @property string|null $urusan
 * @property string|null $opd
 * @property string|null $bidang_urusan
 * @property string|null $sub_unit
 * @property string|null $program
 * @property string|null $kegiatan
 * @property string|null $sub_kegiatan
 * @property string|null $rekening
 * @property string|null $nilai_rincian
 * @property string|null $nilai_realisasi
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran2 newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran2 newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran2 query()
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran2 whereBidangUrusan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran2 whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran2 whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran2 whereKegiatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran2 whereNilaiRealisasi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran2 whereNilaiRincian($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran2 whereOpd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran2 whereProgram($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran2 whereRekening($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran2 whereSubKegiatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran2 whereSubUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran2 whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran2 whereUrusan($value)
 */
	class Anggaran2 extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $uuid
 * @property string|null $name
 * @property string|null $username
 * @property string|null $phone
 * @property string|null $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property bool $is_active 0 = nonactive, 1 = active
 * @property \Illuminate\Support\Carbon|null $activated_at
 * @property \Illuminate\Support\Carbon|null $deactivated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Passport\Client> $clients
 * @property-read int|null $clients_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Passport\Token> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereActivatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeactivatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutTrashed()
 */
	class User extends \Eloquent implements \Illuminate\Contracts\Auth\MustVerifyEmail {}
}

namespace App\Models{
/**
 * App\Models\ViewAnggaran2
 *
 * @method static \Illuminate\Database\Eloquent\Builder|ViewAnggaran2 newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ViewAnggaran2 newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ViewAnggaran2 query()
 */
	class ViewAnggaran2 extends \Eloquent {}
}

