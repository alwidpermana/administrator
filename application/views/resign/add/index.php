<!DOCTYPE html>
<html lang="en" data-footer="true" data-override='{"attributes": {"placement": "horizontal","navcolor": "light","layout": "fluid","radius": "rounded", "color": "light-red"}}' data-scrollspy="true">
  <head>
    <?php $this->load->view("_partial/style.php");?>
  </head>

  <body>
    <div id="root">
      <?php $this->load->view("_partial/sidebar");?>

      <main>
        <div class="container">
          <div class="row">
            <div class="col">
              <!-- Title Start -->
              <div class="page-title-container">
                <div class="row">
                  <!-- Title Start -->
                  <?php $this->load->view("_partial/content-header");?>
                  <!-- Title End -->
                </div>
              </div>
              <!-- Title End -->

              <!-- Content Start -->
              <form id="submit">
                <div class="row">
                  <div class="col-md-12">
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-floating mb-2">
                              <input type="text" class="form-control" placeholder="Nama Lengkap" name="inputNama"/>
                              <label>Nama Lengkap <span class="text-primary">*</span></label>
                            </div>
                            <div class="form-floating mb-2">
                              <input type="email" class="form-control" placeholder="Email" name="inputEmail" value="" />
                              <label>Email <span class="text-primary">*</span></label>
                            </div>
                            <div class="form-floating mb-2">
                              <input type="text" class="form-control" placeholder="No HP" name="inputNoHP" value="" />
                              <label>No HP <span class="text-primary">*</span></label>
                            </div>
                            <div class="form-floating mb-2">
                              <input type="text" class="form-control" placeholder="Tempat Lahir" name="inputTempatLahir" value="" />
                              <label>Tempat Lahir <span class="text-primary">*</span></label>
                            </div>
                            <div class="form-floating mb-2">
                              <input type="date" class="form-control" placeholder="Date" name="inputTglLahir" value="" />
                              <label>Tanggal Lahir<span class="text-primary">*</span></label>
                            </div>
                            <div class="form-floating mb-2">
                              <input type="text" class="form-control" placeholder="No KTP" name="inputNoKTP" id="inputNoKTP"  value="" />
                              <label>No KTP<span class="text-primary">*</span></label>
                            </div> 
                            <div class="form-floating mb-2">
                              <textarea class="form-control" placeholder="Alamat KTP" id="inputAlamatKTP" name="inputAlamatKTP" rows="3"></textarea>
                              <label>Alamat KTP</label>
                            </div>
                          </div>
                          <div class="col-md-6">
                             <div class="form-floating mb-2 w-100">
                                <select class="select2FloatingLabel" id="inputJenisKelamin" name="inputJenisKelamin">
                                  <option value="Laki-laki">Laki-laki</option>
                                  <option value="Perempuan">Perempuan</option>
                                </select>
                                <label>Jenis Kelamin<span class="text-primary">*</span></label>
                              </div>
                              <div class="form-floating mb-2 w-100">
                                <select class="select2FloatingLabel" id="inputStatusMenikah" name="inputStatusMenikah">
                                  <option value="Y">Menikah</option>
                                  <option value="N">Belum Menikah</option>
                                </select>
                                <label>Status Menikah <span class="text-primary">*</span></label>
                              </div>
                              <div class="form-floating mb-2">
                                <input type="number" class="form-control" placeholder="Jumlah Anak" name="inputJumlahAnak" id="inputJumlahAnak" />
                                <label>Jumlah Anak</label>
                              </div>
                              <div class="form-floating mb-2 w-100">
                                <select class="select2FloatingLabel" id="inputGolonganDarah" name="inputGolonganDarah">
                                  <option value="A">A</option>
                                  <option value="A&plus;">A+</option>
                                  <option value="A&minus;">A-</option>
                                  <option value="B">B</option>
                                  <option value="B&plus;">B+</option>
                                  <option value="B&minus;">B-</option>
                                  <option value="AB">AB</option>
                                  <option value="AB&plus;">AB+</option>
                                  <option value="AB&minus;">AB-</option>
                                  <option value="O">O</option>
                                  <option value="O&plus;">O+</option>
                                  <option value="O&minus;">O-</option>
                                  <option value="Rh-null">Rh-null</option>
                                </select>
                                <label>Golongan Darah</label>
                              </div>
                              <div class="form-floating mb-2 w-100">
                                <select class="select2FloatingLabel" id="inputAgama" name="inputAgama">
                                  <option value="Islam">Islam</option>
                                  <option value="Protestan">Protestan</option>
                                  <option value="Katolik">Katolik</option>
                                  <option value="Hindu">Hindu</option>
                                  <option value="Buddha">Buddha</option>
                                  <option value="Khonghucu">Khonghucu</option>
                                </select>
                                <label>Agama</label>
                              </div>
                              <div class="form-floating mb-2">
                                <textarea class="form-control" placeholder="Alamat Domisili" id="inputAlamatDomisili" name="inputAlamatDomisili" rows="3"></textarea>
                                <label>Alamat Domisili</label>
                              </div>
                              <div class="form-floating mb-2">
                                <input type="text" class="form-control" placeholder="Kode POS" name="inputKodePOS" id="inputKodePOS" value="" />
                                <label>Kode POS</label>
                              </div> 
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Help Text End -->
                </div>
                <div class="row mt-3">
                  <div class="col-md-12">
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-floating mb-2">
                                  <input type="text" class="form-control" placeholder="NIK Asal" name="inputNIKAsal[]"  value="" />
                                  <label>NIK Karyawan<span class="text-primary">*</span></label>
                                </div> 
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-floating mb-2">
                                  <input type="date" class="form-control" placeholder="Date" name="inputJoinDate[]" value="" />
                                  <label>Join Date<span class="text-primary">*</span></label>
                                </div>    
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-floating mb-2">
                                  <input type="date" class="form-control" placeholder="Date" name="inputMulaiTraining[]" value="" />
                                  <label>Mulai Masa Training<span class="text-primary">*</span></label>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-floating mb-2">
                                  <input type="date" class="form-control" placeholder="Date" name="inputSelesaiTraining[]" value="" />
                                  <label>Selesai Training<span class="text-primary">*</span></label>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-floating mb-2">
                                  <input type="date" class="form-control" placeholder="Date" name="inputMulaiKontrak1[]" />
                                  <label>Mulai Kontrak 1</label>
                                </div>    
                              </div>
                              <div class="col-md-6">
                                <div class="form-floating mb-2">
                                  <input type="date" class="form-control" placeholder="Date" name="inputSelesaiKontrak1[]" />
                                  <label>Selesai Kontrak 1</label>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-floating mb-2">
                                  <input type="date" class="form-control" placeholder="Date" name="inputMulaiKontrak2[]" />
                                  <label>Mulai Kontrak 2</label>
                                </div>    
                              </div>
                              <div class="col-md-6">
                                <div class="form-floating mb-2">
                                  <input type="date" class="form-control" placeholder="Date" name="inputSelesaiKontrak2[]" />
                                  <label>Selesai Kontrak 2</label>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-floating mb-2">
                                  <input type="date" class="form-control" placeholder="Date" name="inputMulaiKontrak3[]" />
                                  <label>Mulai Kontrak 3</label>
                                </div>    
                              </div>
                              <div class="col-md-6">
                                <div class="form-floating mb-2">
                                  <input type="date" class="form-control" placeholder="Date" name="inputSelesaiKontrak3[]" />
                                  <label>Selesai Kontrak 3</label>
                                </div>
                              </div>
                            </div>
                            <div id="divAddMasaKerja"></div>
                            <div class="row mb-3">
                              <div class="col-md-12">
                                <div class="d-flex justify-content-end">
                                  <button class="btn btn-sm btn-icon btn-icon-only btn-primary mb-1" type="button" id="btnTambahMasaKerja">
                                    <i data-acorn-icon="plus"></i>
                                  </button>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-floating mb-2">
                                  <input type="date" class="form-control" placeholder="Date" name="inputTglBerakhir" value="" />
                                  <label>Tanggal Berakhir Hubungan Kerja<span class="text-primary">*</span></label>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="row mt-4">
                          <div class="col-md-2">
                            <label class="form-label">Alasan Keluar</label>
                          </div>
                          <div class="col-md-9">
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="inputAlasanKeluar" id="inputMengundurkanDiri" value="Mengundurkan Diri" checked>
                              <label class="form-check-label" for="inputMengundurkanDiri">Mengundurkan Diri</label>
                            </div>
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="inputAlasanKeluar" id="inputHabisKontrak" value="Habis Kontrak">
                              <label class="form-check-label" for="inputHabisKontrak">Habis Kontrak</label>
                            </div>
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="inputAlasanKeluar" id="inputPelanggaran" value="Pelanggaran Peraturan Perusahaan">
                              <label class="form-check-label" for="inputPelanggaran">Pelanggaran Peraturan Perusahaan</label>
                            </div>
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="inputAlasanKeluar" id="inputPensiun" value="Pensiun">
                              <label class="form-check-label" for="inputPensiun">Pensiun</label>
                            </div>
                          </div>
                        </div>
                        <div class="row mt-3">
                          <div class="col-md-2">
                            <label class="form-label">Poin Pertimbangan</label>
                          </div>
                          <div class="col-md-10">
                            <div class="row">
                              <div class="col-md-2 mt-3">
                                Absensi Tidak Bagus
                              </div>
                              <div class="col-md-2">
                                <div class="form-floating mb-2">
                                  <input type="text" class="form-control maskNumber" placeholder="Kode POS" name="inputAbsensiSakit" id="inputAbsensiSakit" value="" />
                                  <label>Sakit</label>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-floating mb-2">
                                  <input type="text" class="form-control maskNumber" placeholder="Kode POS" name="inputAbsensiIjin" id="inputAbsensiIjin" value="" />
                                  <label>Ijin</label>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-floating mb-2">
                                  <input type="text" class="form-control maskNumber" placeholder="Kode POS" name="inputAbsensiAlpa" id="inputAbsensiAlpa" value="" />
                                  <label>Alpa</label>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-2 mt-2">
                                Pelanggaran Peraturan Perusahaan
                              </div>
                              <div class="col-md-2">
                                <div class="form-floating mb-2">
                                  <input type="text" class="form-control maskNumber" placeholder="" name="inputAbsensiPembinaan" id="inputAbsensiPembinaan" value="" />
                                  <label>Pembinaan</label>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-floating mb-2">
                                  <input type="text" class="form-control maskNumber" placeholder="" name="inputAbsensiSP1" id="inputAbsensiSP1" value="" />
                                  <label>SP1</label>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-floating mb-2">
                                  <input type="text" class="form-control maskNumber" placeholder="" name="inputAbsensiSP2" id="inputAbsensiSP2" value="" />
                                  <label>SP2</label>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-floating mb-2">
                                  <input type="text" class="form-control maskNumber" placeholder="" name="inputAbsensiSP3" id="inputAbsensiSP3" value="" />
                                  <label>SP3</label>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-floating mb-2">
                                  <input type="text" class="form-control maskNumber" placeholder="" name="inputAbsensiPelanggaranBerat" id="inputAbsensiPelanggaranBerat" value="" />
                                  <label>Pelanggaran Berat</label>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-2 mt-3">
                                <label>Attitude</label>
                              </div>
                              <div class="col-md-6">
                                <textarea class="form-control" rows="3" id="inputAttitude" name="inputAttitude"></textarea>
                              </div>
                            </div>
                            <div class="row mt-2">
                              <div class="col-md-2 mt-3">
                                <label>Produktivitas</label>
                              </div>
                              <div class="col-md-6">
                                <textarea class="form-control" rows="3" id="inputProduktivitas" name="inputProduktivitas"></textarea>
                              </div>
                            </div>
                            <div class="row mt-2">
                              <div class="col-md-2 mt-3">
                                <label>Lainnya</label>
                              </div>
                              <div class="col-md-6">
                                <textarea class="form-control" rows="3" id="inputLainnya" name="inputLainnya"></textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row mt-3">
                          <div class="col-md-2">
                            <label class="form-label">Kategori</label>
                          </div>
                          <div class="col-md-9">
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="inputKategori" id="inputMelamar" value="Dapat Melamar Kembali" checked>
                              <label class="form-check-label" for="inputMelamar">Dapat Melamar Kembali</label>
                            </div>
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="inputKategori" id="inputBlacklist" value="Blacklist">
                              <label class="form-check-label" for="inputBlacklist">Blacklist</label>
                            </div>
                          </div>
                        </div>
                        <div class="row mt-3">
                          <div class="col-md-2">
                            <label class="form-label">Keterangan</label>
                          </div>
                          <div class="col-md-4">
                            <textarea class="form-control" id="inputKeterangan" name="inputKeterangan" rows="3"></textarea>
                          </div>
                        </div>
                        <div class="row mt-5">
                          <div class="col-md-4"></div>
                          <div class="col-md-4 d-grid gap-2">
                            <button type="submit" class="btn btn-primary mb-1 active-scale-down btn-control" id="btnSimpan">Save</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>  
              </form>
              <!-- Content End -->
            </div>

            
          </div>
        </div>
      </main>
      <!-- Layout Footer Start -->
      <?php $this->load->view("_partial/footer");?>
      <!-- Layout Footer End -->
    </div>

    <?php $this->load->view("_partial/script");?>
    
    <script src="<?=base_url()?>assets/js/vendor/imask.js"></script>
    <script src="<?=base_url()?>assets/js/forms/inputmask.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#btnTambahMasaKerja').on('click', function(){
          var html =  '<hr>'+
                      '<div class="row">'+
                        '<div class="col-md-12">'+
                          '<div class="form-floating mb-2">'+
                            '<input type="text" class="form-control" placeholder="NIK Asal" name="inputNIKAsal[]" value=""/>'+
                            '<label>NIK Karyawan<span class="text-primary">*</span></label>'+
                          '</div>'+    
                        '</div>'+
                      '</div>'+
                      '<div class="row">'+
                        '<div class="col-md-12">'+
                          '<div class="form-floating mb-2">'+
                            '<input type="date" class="form-control" placeholder="Date" name="inputJoinDate[]" value="" />'+
                            '<label>Join Date<span class="text-primary">*</span></label>'+
                          '</div>'+    
                        '</div>'+
                      '</div>'+
                      '<div class="row">'+
                        '<div class="col-md-6">'+
                          '<div class="form-floating mb-2">'+
                            '<input type="date" class="form-control" placeholder="Date" name="inputMulaiTraining[]" value="" />'+
                            '<label>Mulai Masa Training<span class="text-primary">*</span></label>'+
                          '</div>'+
                        '</div>'+
                        '<div class="col-md-6">'+
                          '<div class="form-floating mb-2">'+
                            '<input type="date" class="form-control" placeholder="Date" name="inputSelesaiTraining[]" value="" />'+
                            '<label>Selesai Training<span class="text-primary">*</span></label>'+
                          '</div>'+
                        '</div>'+
                      '</div>'+
                      '<div class="row">'+
                        '<div class="col-md-6">'+
                          '<div class="form-floating mb-2">'+
                            '<input type="date" class="form-control" placeholder="Date" name="inputMulaiKontrak1[]" />'+
                            '<label>Mulai Kontrak 1</label>'+
                          '</div>'+
                        '</div>'+
                        '<div class="col-md-6">'+
                          '<div class="form-floating mb-2">'+
                            '<input type="date" class="form-control" placeholder="Date" name="inputSelesaiKontrak1[]" />'+
                            '<label>Selesai Kontrak 1</label>'+
                          '</div>'+
                        '</div>'+
                      '</div>'+
                      '<div class="row">'+
                        '<div class="col-md-6">'+
                          '<div class="form-floating mb-2">'+
                            '<input type="date" class="form-control" placeholder="Date" name="inputMulaiKontrak2[]" />'+
                            '<label>Mulai Kontrak 2</label>'+
                          '</div>'+
                        '</div>'+
                        '<div class="col-md-6">'+
                          '<div class="form-floating mb-2">'+
                            '<input type="date" class="form-control" placeholder="Date" name="inputSelesaiKontrak2[]" />'+
                            '<label>Selesai Kontrak 2</label>'+
                          '</div>'+
                        '</div>'+
                      '</div>'+
                      '<div class="row">'+
                        '<div class="col-md-6">'+
                          '<div class="form-floating mb-2">'+
                            '<input type="date" class="form-control" placeholder="Date" name="inputMulaiKontrak3[]" />'+
                            '<label>Mulai Kontrak 3</label>'+
                          '</div>'+
                        '</div>'+
                        '<div class="col-md-6">'+
                          '<div class="form-floating mb-2">'+
                            '<input type="date" class="form-control" placeholder="Date" name="inputSelesaiKontrak3[]" />'+
                            '<label>Selesai Kontrak 3</label>'+
                          '</div>'+
                        '</div>'+
                      '</div>';
          $('#divAddMasaKerja').append(html)
        })
        $('#submit').submit(function(e){
          e.preventDefault();
          $.ajax({
            type:"post",
            dataType:'json',
            data:new FormData(this), //this is formData
            processData:false,
            contentType:false,
            cache:false,
            async:true,
            url:base_url+'resign/saveData',
            beforeSend:function(data){
              $('#btnSimpan').attr("disabled",true)
            },
            success:function(data){
              if (data.status == 'success') {
                window.location.href=base_url+'resign/monitoring';
              }else{
                $(data.tagName).focus();
              }
              Swal.fire(data.message,data.sub_message,data.status)
            },
            complete:function(data){
              $('#btnSimpan').attr("disabled",false)
            },
            error:function(data){
              Swal.fire("Gagal Menyimpan Data","","error")
            }
          })
        })
      })
    </script>
  </body>
</html>
