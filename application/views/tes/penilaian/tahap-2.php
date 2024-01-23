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
              <div class="row">
                <div class="col-md-4">
                  <div class="card mb-5">
                    <div class="card-body">
                      <div class="row mb-2">
                        <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Tahap</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control form-control-sm" id="inputTahap" value="<?=$tes->tahap?>" readonly />
                        </div>
                      </div>
                      <div class="row mb-2">
                        <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Tanggal Tes</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control form-control-sm" id="inputTanggal" value="<?=$tes->tahap == '1' ? $tes->tgl_tes:$tes->tgl_tes.', '.$tes->tgl_tes2.', '.$tes->tgl_tes3?>" readonly />
                        </div>
                      </div>
                      <div class="row mb-2">
                        <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">No Rekaman Tes</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control form-control-sm" id="inputNoRekaman" value="<?=$tes->no_rek?>" readonly />
                        </div>
                      </div>
                      <div class="row mb-2">
                        <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Jenis</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control form-control-sm" id="inputJenis" value="<?=$tes->jenis?>" readonly />
                        </div>
                      </div>
                      <div class="row">
                        <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Tempat</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control form-control-sm" id="inputTempat" value="<?=$tes->tempat?>" readonly />
                        </div>
                      </div>
                      <!-- <input type="hidden" id="inputId"> -->
                    </div>
                  </div>  
                </div>
                <div class="col-md-8">
                  <div class="card mb-5">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6 mb-3 mb-md-0">
                          <div class="row mb-2">
                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">NIP</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control form-control-sm" id="inputTahap" value="<?=$pelamar->nip?>" readonly />
                            </div>
                          </div>
                          <div class="row mb-2">
                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Nama</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control form-control-sm" id="inputTanggal" value="<?=$pelamar->nama?>" readonly />
                            </div>
                          </div>
                          <div class="row mb-2">
                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">No KTP</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control form-control-sm" id="inputNoRekaman" value="<?=$pelamar->no_ktp?>" readonly />
                            </div>
                          </div>
                          <div class="row mb-2">
                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Sub</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control form-control-sm" id="inputJenis" value="<?=$pelamar->sub?>" readonly />
                            </div>
                          </div>
                          <div class="row">
                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Type</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control form-control-sm" id="inputTempat" value="<?=$pelamar->type?>" readonly />
                            </div>
                          </div>
                          <!-- <input type="hidden" id="inputId"> -->
                        </div>
                        <div class="col-md-6">
                          <div class="sw-23 sh-23">
                            <img src="http://localhost/recruitment/<?=$pelamar->foto?>" class="img-fluid img-fluid-height rounded-md rounded mx-auto d-block" alt="thumb" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>  
                </div>
                <!-- Help Text End -->
              </div>
                <form id="submitTahap1">
                  <input type="hidden" name="inputIdLamaran" value="<?=$this->uri->segment("3")?>">
                  <input type="hidden" name="inputIdTes" value="<?=$this->uri->segment("4")?>">
                 <div class="row">
                   <div class="col-md-6">
                    <h2 class="small-title">Tahap 2 - Tes Basic</h2>
                     <div class="card">
                       <div class="card-body">
                        <?php
                          $tglTes = $nilai->tgl_h1 == null ? $rencana_tes_1 : $nilai->tgl_h1;
                          $tglTes2 = $nilai->tgl_h2 == null ? $rencana_tes_2 : $nilai->tgl_h2;
                          $tglTes3 = $nilai->tgl_h3== null ? $rencana_tes_3 : $nilai->tgl_h3;
                        ?>
                        <div class="row">
                          <div class="col-md-4">
                            <label class="form-label">Tes H 1</label>
                            <input type="text" class="form-control date-picker datePickerFloatingLabel" name="inputTglTes1" value="<?=date('m/d/Y', strtotime($tglTes))?>" />
                          </div>
                          <div class="col-md-4">
                            <label class="form-label">Tes H 2</label>
                            <input type="text" class="form-control date-picker datePickerFloatingLabel" name="inputTglTes2" value="<?=date('m/d/Y', strtotime($tglTes2))?>" />
                          </div>
                          <div class="col-md-4">
                            <label class="form-label">Tes H 3</label>
                            <input type="text" class="form-control date-picker datePickerFloatingLabel" name="inputTglTes3" value="<?=date('m/d/Y', strtotime($tglTes3))?>" />
                          </div>
                        </div>
                        <div class="row mt-3">
                          <div class="col-md-4">
                            <label class="form-label">Kehadiran H 1</label>
                            <select class="selectBasic kehadiran" name="inputKehadiran1" id="inputKehadiran1" style="width: 100%;">
                              <option value="Hadir" <?=$nilai->jadwal_h1_kehadiran == 'Hadir'?'selected':''?>>Hadir</option>
                              <option value="Tidak Hadir" <?=$nilai->jadwal_h1_kehadiran == 'Tidak Hadir'?'selected':''?>>Tidak Hadir</option>
                            </select>
                          </div>
                          <div class="col-md-4">
                            <label class="form-label">Kehadiran H 2</label>
                            <select class="selectBasic kehadiran" name="inputKehadiran2" id="inputKehadiran2" style="width: 100%;">
                              <option value="Hadir" <?=$nilai->jadwal_h2_kehadiran == 'Hadir'?'selected':''?>>Hadir</option>
                              <option value="Tidak Hadir" <?=$nilai->jadwal_h2_kehadiran == 'Tidak Hadir'?'selected':''?>>Tidak Hadir</option>
                            </select>
                          </div>
                          <div class="col-md-4">
                            <label class="form-label">Kehadiran H 3</label>
                            <select class="selectBasic kehadiran" name="inputKehadiran3" id="inputKehadiran3" style="width: 100%;">
                              <option value="Hadir" <?=$nilai->jadwal_h3_kehadiran == 'Hadir'?'selected':''?>>Hadir</option>
                              <option value="Tidak Hadir" <?=$nilai->jadwal_h3_kehadiran == 'Tidak Hadir'?'selected':''?>>Tidak Hadir</option>
                            </select>
                          </div>
                        </div>
                       </div>
                     </div>
                   </div>
                 </div>
                  <div class="row mt-5">
                    <div class="col-md-12">
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-12 table-responsive">
                              <table width="100%" class="table table-border">
                                <thead class="text-center">
                                  <tr>
                                    <th colspan="2">Tes</th>
                                    <th>Nilai</th>
                                    <th>Standar</th>
                                    <th>Hasil</th>
                                    <th>Keterangan</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                    $i=0;
                                    foreach ($setting as $key) {
                                      $row[$i] = $key;
                                      $i++;
                                    }
                                    foreach ($row as $cell) {
                                            if (isset($total[$cell->objek]['jml'])) {
                                                $total[$cell->objek]['jml']++;
                                            } else{
                                                $total[$cell->objek]['jml']=1;
                                            }
                                        }
                                        $n=count($row);
                                        $cekID="";
                                        $no = 1;
                                        $field = '';
                                        for ($i=0; $i <$n ; $i++) { 
                                          $cell=$row[$i];
                                          $field = $cell->field == 'komitmen_ttd_pernyataan'?$cell->field:'nilai_'.$cell->field;
                                          $keterangan = 'keterangan_'.$cell->field;
                                          $hasil =$nilai->$field >=$cell->nilai ? 'Lulus':"Tidak Lulus";
                                          echo '<tr class="text-center">';
                                          if($cekID!=$cell->objek){
                                            echo '<td' .($total[$cell->objek]['jml']>1?' rowspan="' .($total[$cell->objek]['jml']).'">':'>') .$cell->objek.'</td>';
                                            $cekID=$cell->objek;
                                          }
                                          echo "<td>$cell->tes</td>";
                                          echo '<td><input type="number" class="form-control inputNilai savePenilaian" id="inputNilai'.$cell->id.'"  name="inputNilai[]" urut="'.$cell->id.'" value="'.$nilai->$field.'" standar="'.$cell->nilai.'"/></td>';
                                          echo "<td>$cell->nilai</td>";
                                          echo '<td><span id="hasil'.$cell->id.'">'.$hasil.'</span>
                                                  <input type="hidden" name="inputId[]" value="'.$cell->id.'">
                                                </td>';
                                          echo '<td><textarea placeholder="" class="form-control" rows="2" name="inputKeterangan[]">'.$nilai->$keterangan.'</textarea></td>';
                                            echo '</tr>';

                                        $no++;
                                        }
                                  ?>
                                </tbody>
                                <tfoot>
                                  <tr>
                                    <th>Hasil Tes</th>
                                    <th colspan="2">
                                      <select class="selectBasic" name="inputHasilTes" id="inputHasilTes" style="width: 100%;">
                                        <option value="Lulus" <?=$nilai->hasil_tes == 'Lulus'?'selected':''?>>Lulus</option>
                                        <option value="Tidak Lulus" <?=$nilai->hasil_tes == 'Tidak Lulus'?'selected':''?>>Tidak Lulus</option>
                                      </select>
                                    </th>
                                    <th colspan="3"></th>
                                  </tr>
                                </tfoot>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row mt-5">
                    <div class="d-grid gap-2 col-6 mx-auto mb-3">
                      <button class="btn btn-primary active-scale-down" type="submit">Simpan Penilaian</button>
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
        $('.inputNilai').on('keyup', function(){
          var urut = $(this).attr("urut");
          var nilai = $('#inputNilai'+urut).val();
          var standar = $(this).attr("standar");
          var hasil = parseInt(nilai)>=parseInt(standar)?'Lulus':"Tidak Lulus";
          console.log(nilai)
          $('#hasil'+urut).html(hasil);
        })
        $('.kehadiran').on('change',function(){
          setKelulusan();
        })
        // $('.savePenilaian').on('change', function(){
        //   var result = $(this).val();
        //   var jenis = $(this).attr("jenis");
        //   var urut = $(this).attr("urut");
        //   var kategori = $(this).attr("kategori");
        //   var standar = $(this).attr("standar");
        //   var tipe = $(this).attr("tipe");
        //   var lamaran = '<?=$this->uri->segment("3")?>'
        //   var tes = '<?=$this->uri->segment("4")?>'
        //   $.ajax({
        //     type:'post',
        //     data:{result, jenis, urut, kategori, standar, tipe, lamaran, tes},
        //     dataType:'json',
        //     cache:false,
        //     async:true,
        //     url:base_url+'tes/savePenilaianTahap1Operator',
        //     success:function(data){

        //     },
        //     error:function(data){
        //       Swal.fire("Gagal Menyimpan Data","Harap Periksa Jaringan Anda Terlebih Dahulu Sebelum Melanjutkan Proses Penilaian","error")
        //     }
        //   })
        // })
        $('#submitTahap1').submit(function(e){
          e.preventDefault();
          $.ajax({
            type:"post",
            dataType:'json',
            data:new FormData(this), //this is formData
            processData:false,
            contentType:false,
            cache:false,
            async:true,
            url:base_url+'tes/savePenilaianTahap2Operator',
            beforeSend:function(data){
              $('#btnSimpan').attr("disabled",true)
            },
            success:function(data){
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
      function setKelulusan() {
        var inputKehadiran1 = $('#inputKehadiran1').val();
        var inputKehadiran2 = $('#inputKehadiran2').val();
        var inputKehadiran3 = $('#inputKehadiran3').val();
        if (inputKehadiran1 == 'Tidak Hadir' || inputKehadiran2 == 'Tidak Hadir' || inputKehadiran3 == 'Tidak Hadir') {
          $("select#inputHasilTes option[value='Tidak Lulus']").prop("selected","selected");
          $("select#inputHasilTes").trigger("change");
        }
      }
    </script>
  </body>
</html>
