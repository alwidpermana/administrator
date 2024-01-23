<!DOCTYPE html>
<html lang="en" data-footer="true" data-override='{"attributes": {"color": "light-red","placement": "horizontal","navcolor": "light","layout": "fluid","radius": "rounded"}}' data-scrollspy="true">
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
              <div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <label class="form-label">No Recruitment</label>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        : <?=$no_recruitment?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <label class="form-label">Jenis</label>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        : <?=$filJenis?>
                                        <input type="hidden" id="filJenis" value="<?=$filJenis?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <label class="form-label">Tahun</label>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        : <?=date("Y")?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <label class="form-label">Bulan</label>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        : <?=date("F")?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <label class="form-label">Departemen</label>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <select class="selectBasic w-100" id="inputDepartemen" name="inputDepartemen">
                                            <option label="&nbsp;"></option>
                                            <?php foreach ($departemen as $dp): ?>
                                                <?php if ($cek == '0'): ?>
                                                     <option value="<?=$dp->nama_departemen?>" <?=$this->input->get("jenis") == 'Operator' && $dp->nama_departemen == 'Produksi'?'selected':''?>><?=$dp->nama_departemen?></option>     
                                                <?php else: ?>
                                                     <option value="<?=$dp->nama_departemen?>" <?=$recDepartemen == $dp->nama_departemen?'selected':''?>><?=$dp->nama_departemen?></option>
                                                <?php endif ?>
                                               
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6 col-sm-6">
                                        <label class="form-label">Jabatan</label>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <select class="selectBasic w-100" id="inputJabatan" name="inputJabatan">
                                            <?php if ($this->input->get("jenis") == 'Operator'): ?>
                                                <option value="Operator">Operator</option>
                                            <?php else: ?>
                                                <?php foreach ($jabatan as $jb): ?>
                                                    <option value="<?=$jb->nama_jabatan?>" <?=$recJabatan == $dp->nama_jabatan?'selected':''?>><?=$jb->nama_jabatan?></option>
                                                <?php endforeach ?>    
                                            <?php endif ?>
                                            <option label="&nbsp;"></option>
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6 col-sm-6">
                                        <label class="form-label">Shift</label>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <select class="selectBasic w-100" id="inputShift" name="inputShift">
                                            <?php if ($cek=='0'): ?>
                                                <option value="Non Shift" <?=$this->input->get("jenis") != 'Operator' ? 'selected':''?>>Non Shift</option>
                                                <option value="3 Shift" <?=$this->input->get("jenis") == 'Operator' ? 'selected':''?>>3 Shift</option>    
                                            <?php else: ?>
                                                <option value="Non Shift" <?=$recShift == 'Non Shift' ? 'selected':''?>>Non Shift</option>
                                                <option value="3 Shift" <?=$recShift == '3 Shift' ? 'selected':''?>>3 Shift</option>                                            
                                            <?php endif ?>
                                            
                                            <option label="&nbsp;"></option>
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6 col-sm-6">
                                        <label class="form-label">Plant</label>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <select class="selectBasic w-100" id="inputPlant" name="inputPlant">
                                            <?php foreach ($plant as $pt): ?>
                                                <option value="<?=$pt->plant.' - '.$pt->tempat?>" <?=$recPlant == $pt->plant ? 'selected':''?>><?=$pt->plant.' - '.$pt->tempat?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6 col-sm-6">
                                        <label class="form-label">Tanggal Terakhir Melamar</label>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" class="date-picker form-control datePickerFloatingLabel" placeholder="Date" name="inputLastApply" id="inputLastApply" value="<?=$cek == '' ? '' : date('m/d/Y', strtotime($recApply))?>" />
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
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th colspan="3"></th>
                                                        <th>Pria</th>
                                                        <th>Wanita</th>
                                                        <th>Jumlah</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td colspan="3">Stok Pelamar Umum</td>
                                                        <td><input type="number" class="form-control" id="inputStokPria" readonly></td>
                                                        <td><input type="number" class="form-control" id="inputStokWanita" readonly></td>
                                                        <td><input type="number" class="form-control" id="inputStok" readonly></td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td colspan="3">Kebutuhan</td>
                                                        <td><input type="number" class="form-control hitungSisa" id="inputKebutuhanPria" value="<?=$priaP?>" readonly></td>
                                                        <td><input type="number" class="form-control hitungSisa" id="inputKebutuhanWanita" value="<?=$wanitaP?>" readonly></td>
                                                        <td><input type="number" class="form-control" id="inputKebutuhan"  value="<?=$jumlahP?>" readonly></td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan="3">3</td>
                                                        <td rowspan="3">Alokasi</td>
                                                        <td>Referensi</td>
                                                        <td>Internal</td>
                                                        <td><input type="number" class="form-control hitungSisa hitungReferensi" id="inputReferensiPria" value="<?=$referensiPria?>"></td>
                                                        <td><input type="number" class="form-control hitungSisa hitungReferensi" id="inputReferensiWanita" value="<?=$referensiWanita?>"></td>
                                                        <td><input type="number" class="form-control" id="inputReferensi" readonly></td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan="2">Reguler</td>
                                                        <td>Log In Eksternal</td>
                                                        <td><input type="number" class="form-control hitungSisa hitungEksternal" id="inputEksternalPria" value="<?=$eksternalPria?>"></td>
                                                        <td><input type="number" class="form-control hitungSisa hitungEksternal" id="inputEksternalWanita" value="<?=$eksternalWanita?>"></td>
                                                        <td><input type="number" class="form-control" id="inputEksternal" readonly></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Umum</td>
                                                        <td><input type="number" class="form-control hitungSisa hitungUmum" id="inputUmumPria" value="<?=$umumPria?>"></td>
                                                        <td><input type="number" class="form-control hitungSisa hitungUmum" id="inputUmumWanita" value="<?=$umumWanita?>"></td>
                                                        <td><input type="number" class="form-control" id="inputUmum" readonly></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3"></td>
                                                        <td class="text-start">Deskripsi</td>
                                                        <td colspan="3">
                                                            <textarea class="form-control" id="inputDeskripsi" rows="4"><?=$recDeskripsi?></textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3"></td>
                                                        <td><button class="btn btn-outline-primary mb-1 active-scale-down" type="button" id="btnRequirement">Add Requirement</button></td>
                                                        <td colspan="3">
                                                            <div id="getRequirement"></div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <tfoot class="text-center">
                                                    <tr>
                                                        <th colspan="4" class="text-right">Sisa:</th>
                                                        <th><span id="sisaPria"></span></th>
                                                        <th><span id="sisaWanita"></span></th>
                                                        <th>
                                                            <!-- <span id="sisaJml"></span> -->
                                                            <input type="hidden" id="inputJmlSisa">
                                                        </th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                            <input type="hidden" id="inputSisaPria">
                                            <input type="hidden" id="inputSisaWanita">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12 text-center">
                                        <div id="getNotif"></div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="d-grid gap-2 col-md-4 col-sm-12 mx-auto mb-3">
                                        <button type="button" class="btn btn-primary mb-1 active-scale-down" id="btn-save">Save Setup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Help Text End -->
              </div>
              <!-- Content End -->
            </div>

            
          </div>
        </div>
      </main>
      <div class="modal fade" id="modal-requirement" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelDefault" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <label class="form-label">Requirement</label>
                        <textarea class="form-control" id="inputRequirement" rows="3"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" id="btnSaveRequirement">Save</button>
            </div>
          </div>
        </div>
      </div>
      <input type="hidden" id="inputId" value="<?=$inputId?>">
      <!-- Layout Footer Start -->
      <?php $this->load->view("_partial/footer");?>
      <!-- Layout Footer End -->
    </div>

    <?php $this->load->view("_partial/script");?>
    <script type="text/javascript">
      $(document).ready(function(){
        getRequirement();
        hitungEksternal();
        hitungReferensi();
        hitungUmum();
        hitungSisa();
          $('.hitungSisa').on('keyup', function(){
              hitungSisa();
          })
          $('.hitungReferensi').on('keyup', function(){
               hitungReferensi();
          })

          $('.hitungEksternal').on('keyup', function(){
               hitungEksternal();
          })
          $('.hitungUmum').on('keyup', function(){
               hitungUmum();
          })
          $('#btn-save').on('click', function(){
              var inputSisaPria = $('#inputSisaPria').val();
              var inputSisaWanita = $('#inputSisaWanita').val();
              if (inputSisaPria == '' && inputSisaWanita == '') {
                  Swal.fire("Isi Setup Terlebih Dahulu","","warning")
              }else if (parseInt(inputSisaPria)>0 || parseInt(inputSisaWanita)>0) {
                  Swal.fire({
                    title: 'Masih Terdapat Sisa Yang Belum Di Setup',
                    text: "Tetap Menyimpan Data?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#B22222',
                    cancelButtonColor: '#CD5C5C',
                    confirmButtonText: 'Ya, Simpan!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      saveSetup();
                    }
                  })
              }else{
                  saveSetup();
              }
              
          })
          $('#btnRequirement').on('click', function(){
            $('#modal-requirement').modal("show");
          })
          $('#btnSaveRequirement').on('click', function(){
            var inputRequirement = $('#inputRequirement').val();
            var inputId = $('#inputId').val();
            $.ajax({
                type:'post',
                data:{inputRequirement, inputId},
                dataType:'json',
                cache:false,
                async:true,
                url:base_url+'data_master/saveRequirement',
                success:function(data){
                    if (data.status == 'success') {
                        getRequirement();
                        $('#modal-requirement').modal("hide")
                        $('#inputRequirement').val("")
                    }
                    Swal.fire(data.message,data.sub_message,data.status)
                },
                error:function(data){
                    Swal.fire("Gagal Menyimpan Data Requirement","Cek Jaringan Perangkat Anda","error")
                }
            })
          })
          $('#getRequirement').on('click','.hapusRequirement',function(){
            var id = $(this).attr("data");
            $.ajax({
                type:'post',
                data:{id},
                dataType:'json',
                cache:true,
                async:true,
                url:base_url+'data_master/hapusRequirement',
                success:function(data){
                    Swal.fire("Berhasil Menghapus Requirement","","success");
                    getRequirement();
                },
                error:function(data){
                    Swal.fire("gagal menghapus requirement",'',"error")
                }
            })
          })

      })

      function saveSetup(argument) {
          var inputReferensiPria = $('#inputReferensiPria').val();
          var inputReferensiWanita = $('#inputReferensiWanita').val();
          var inputEksternalPria = $('#inputEksternalPria').val();
          var inputEksternalWanita = $('#inputEksternalWanita').val();
          var inputUmumPria = $('#inputUmumPria').val();
          var inputUmumWanita = $('#inputUmumWanita').val();
          var inputId = $('#inputId').val();
          var filJenis = $('#filJenis').val();
          var inputDepartemen = $('#inputDepartemen').val();
          var inputJabatan = $('#inputJabatan').val();
          var inputPlant = $('#inputPlant').val();
          var inputShift = $('#inputShift').val();
          var inputDeskripsi = $('#inputDeskripsi').val();
          var inputLastApply = $('#inputLastApply').val();
          $.ajax({
              type:'post',
              data:{inputReferensiPria,inputReferensiWanita, inputEksternalPria, inputEksternalWanita, inputUmumPria, inputUmumWanita, inputId, filJenis, inputDepartemen, inputJabatan, inputPlant, inputShift,inputDeskripsi, inputLastApply},
              dataType:'json',
              cache:false,
              async:true,
              url:base_url+'data_master/saveSetup',
              beforeSend:function(data){
                  $('#btn-save').attr("disabled",true)
              },
              success:function(data){
                  if (data.status == 'success') {
                      window.location.href = base_url+'monitoring/recruitment'
                  }
                  Swal.fire(data.message, data.sub_message, data.status)
              },
              complete:function(data){
                  $('#btn-save').attr("disabled",false)
              },
              error:function(data){
                  Swal.fire("Gagal Menyimpan Data","Periksa Jaringan Anda!","error")
              }
          })
      }
      function getRequirement() {
            var inputId = $('#inputId').val();
            $.ajax({
                type:'get',
                data:{inputId},
                dataType:'json',
                cache:true,
                async:true,
                url:base_url+'data_master/getRequirement',
                success:function(data){
                    $('#getRequirement').html(data)
                },
                error:function(data){
                    $('#getRequirement').html(data)
                }
            })
      }
      function hitungEksternal() {
          var inputEksternalPria = $('#inputEksternalPria').val() == ''? 0 : parseInt($('#inputEksternalPria').val());
           var inputEksternalWanita = $('#inputEksternalWanita').val() == ''? 0 : parseInt($('#inputEksternalWanita').val());
           var jumlahEksternal = inputEksternalPria + inputEksternalWanita;
           console.log(jumlahEksternal)
           $('#inputEksternal').val(jumlahEksternal)
      }
      function hitungReferensi() {
            var inputReferensiPria = $('#inputReferensiPria').val() == ''? 0 : parseInt($('#inputReferensiPria').val());
           var inputReferensiWanita = $('#inputReferensiWanita').val() == ''? 0 : parseInt($('#inputReferensiWanita').val());
           var jumlahReferensi = inputReferensiPria + inputReferensiWanita;
           $('#inputReferensi').val(jumlahReferensi)
      }
      function hitungUmum() {
          var inputUmumPria = $('#inputUmumPria').val() == ''? 0 : parseInt($('#inputUmumPria').val());
           var inputUmumWanita = $('#inputUmumWanita').val() == ''? 0 : parseInt($('#inputUmumWanita').val());
           var jumlahUmum = inputUmumPria + inputUmumWanita;
           $('#inputUmum').val(jumlahUmum)
      }
      function hitungSisa() {
          var inputKebutuhanPria = $('#inputKebutuhanPria').val() == ''? 0 : parseInt($('#inputKebutuhanPria').val());
              var inputKebutuhanWanita = $('#inputKebutuhanWanita').val() == ''? 0 : parseInt($('#inputKebutuhanWanita').val());
              var inputKebutuhan = $('#inputKebutuhan').val() == ''? 0 : parseInt($('#inputKebutuhan').val());
              var inputReferensiPria = $('#inputReferensiPria').val() == ''? 0 : parseInt($('#inputReferensiPria').val());
              var inputReferensiWanita = $('#inputReferensiWanita').val() == ''? 0 : parseInt($('#inputReferensiWanita').val());
              var inputReferensi = $('#inputReferensi').val() == ''? 0 : parseInt($('#inputReferensi').val());
              var inputEksternalPria = $('#inputEksternalPria').val() == ''? 0 : parseInt($('#inputEksternalPria').val());
              var inputEksternalWanita = $('#inputEksternalWanita').val() == ''? 0 : parseInt($('#inputEksternalWanita').val());
              var inputEksternal = $('#inputEksternal').val() == ''? 0 : parseInt($('#inputEksternal').val());
              var inputUmumPria = $('#inputUmumPria').val() == ''? 0 : parseInt($('#inputUmumPria').val());
              var inputUmumWanita = $('#inputUmumWanita').val() == ''? 0 : parseInt($('#inputUmumWanita').val());
              var inputUmum = $('#inputUmum').val() == ''? 0 : parseInt($('#inputUmum').val());
              var sisaPria = inputKebutuhanPria - (inputReferensiPria+inputEksternalPria+inputUmumPria);
              var sisaWanita = inputKebutuhanWanita - (inputReferensiWanita+inputEksternalWanita+inputUmumWanita);
              var sisa = inputKebutuhan - (sisaPria + sisaWanita)
              $('#sisaPria').html(sisaPria)
              $('#sisaWanita').html(sisaWanita)
              $('#inputSisaPria').val(sisaPria);
              $('#inputSisaWanita').val();
              $('#sisaJml').html(sisa)
              $('#inputJmlSisa').val(sisa)
              if (sisaPria <0 || sisaWanita <0) {
                  $('#btn-save').attr("disabled",true)
                  $('#getNotif').html('<div class="alert alert-danger" role="alert"><i class="mdi mdi-block-helper me-2"></i> Sisa Tidak Boleh Kurang Dari 0 !</div>')
              }else{
                  $('#btn-save').attr("disabled",false)
                  $('#getNotif').html("")
              }
      }
  </script>
  </body>
</html>
