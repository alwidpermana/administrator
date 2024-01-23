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
                <!-- Search Start -->
                <div class="col-sm-12 col-md-5 col-lg-3 col-xxl-2 mb-1">
                  <div class="d-inline-block float-md-start me-1 mb-1 search-input-container w-100 shadow bg-foreground">
                    <input class="form-control datatable-search" placeholder="Search" data-datatable="#datatableRows" id="filSearch" />
                    <span class="search-magnifier-icon">
                      <i data-acorn-icon="search"></i>
                    </span>
                    <span class="search-delete-icon d-none">
                      <i data-acorn-icon="close"></i>
                    </span>
                  </div>
                </div>
                <!-- Search End -->
                <div class="col-sm-12 col-md-7 col-lg-9 col-xxl-10 text-end mb-1">
                  
                  <div class="d-inline-block me-0 me-sm-3 float-start float-md-none">
                    <!-- Length Start -->
                    <div class="dropdown-as-select d-inline-block datatable-length" data-datatable="#datatableRows" data-childSelector="span">
                      <button class="btn p-0 shadow" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-bs-offset="0,3">
                        <span
                          class="btn btn-foreground-alternate dropdown-toggle"
                          data-bs-toggle="tooltip"
                          data-bs-placement="top"
                          data-bs-delay="0"
                          title="Item Count"
                        >
                          10 Items
                        </span>
                      </button>
                      <div class="dropdown-menu shadow dropdown-menu-end">
                        <a class="dropdown-item filLimitActive active" href="javascript:;" data="10">10 Items</a>
                        <a class="dropdown-item filLimitActive" href="javascript:;" data="15">15 Items</a>
                        <a class="dropdown-item filLimitActive" href="javascript:;" data="20">20 Items</a>
                      </div>
                      <input type="hidden" id="filLimit" value="10">
                    </div>
                    <!-- Length End -->
                  </div>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-md-12">
                  <div class="card" id="cardTabel">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-2 col-lg-2 col-sm-12 col-12">
                          <label class="mb-3 top-label w-100">
                            <select class="select2TopLabel filter" id="filDepartemen" name="filDepartemen">
                                <option value="ALL">ALL</option>
                              <?php foreach ($departemen as $dp): ?>
                                <option value="<?=$dp->nama_departemen?>"><?=$dp->nama_departemen?></option>
                              <?php endforeach ?>
                            </select>
                            <span>Departemen</span>
                          </label>
                        </div>
                        <div class="col-md-2 col-lg-2 col-sm-12 col-12">
                          <label class="mb-3 top-label w-100">
                            <select class="select2TopLabel filter" id="filJabatan" name="filJabatan">
                                <option value="ALL">ALL</option>
                              <?php foreach ($jabatan as $jb): ?>
                                <option value="<?=$jb->nama_jabatan?>"><?=$jb->nama_jabatan?></option>
                              <?php endforeach ?>
                            </select>
                            <span>Jabatan</span>
                          </label>
                        </div>
                        <div class="col-md-2 col-lg-2 col-sm-12 col-12">
                          <label class="mb-3 top-label w-100">
                            <select class="select2TopLabel filter" id="filPlant" name="filPlant">
                                <option value="ALL">ALL</option>
                              <?php foreach ($plant as $pt): ?>
                                <option value="<?=$pt->plant.' '.$pt->tempat?>"><?=$pt->plant.' '.$pt->tempat?></option>
                              <?php endforeach ?>
                            </select>
                            <span>Plant</span>
                          </label>
                        </div>
                      </div>
                      <div class="row mt-5">
                        <div class="col-md-12">
                          <div id="getTabel"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-12">
                  <div class="d-flex justify-content-center">
                    <div id="paging"></div>
                  </div>
                </div>
              </div>
              <!-- Content End -->
            </div>

            
          </div>
        </div>
      </main>
      <div class="modal fade" id="modal-recruitment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelDefault" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-body">
              <div class="row">
                <div class="col-md-12">
                  <input type="hidden" id="inputIdPelamar">
                  <input type="hidden" id="inputIdLamaran">
                  <input type="text" id="filSearchRecruitment" class="form-control" placeholder="Cari Berdasarkan No Recruitment">
                </div>
              </div>
              <div class="row mt-4">
                <div class="col-md-12 table-responsive">
                  <table class="table table-hover table-bordered text-center table-striped w-100">
                    <thead>
                      <tr>
                        <th rowspan="2">No Recruitment</th>
                        <th rowspan="2">Jenis</th>
                        <th rowspan="2">Jabatan</th>
                        <th rowspan="2">Departemen</th>
                        <th rowspan="2">Plant</th>
                        <th rowspan="2">Shift</th>
                        <th colspan="2">Referensi</th>
                        <th colspan="2">Umum</th>
                        <th colspan="2">Eksternal</th>
                        <th rowspan="2"></th>
                      </tr>
                      <tr>
                        <th>Pria</th>
                        <th>Wanita</th>
                        <th>Pria</th>
                        <th>Wanita</th>
                        <th>Pria</th>
                        <th>Wanita</th>
                      </tr>
                    </thead>
                    <tbody id="getRecruitment"></tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Layout Footer Start -->
      <?php $this->load->view("_partial/footer");?>
      <!-- Layout Footer End -->
    </div>

    <?php $this->load->view("_partial/script");?>
    <script type="text/javascript">
      $(document).ready(function(){
        paging(0);
        $('#btnAdd').on('click', function(){
          $('#modal-user').modal("show")
        })
        $('#paging').on('click','.paging', function(){
          var offset = $(this).attr("offset");
          console.log(offset)
          paging(offset)
          $('#inputOffset').val(offset)
        });
        $('.filter').on('change', function(){
            paging(0)
        })
        $('#search').submit(function(e){
          e.preventDefault();
          paging(0);
        })
        $('#filSearch').on("keyup", function(){
          paging(0)
        })
        $('#paging').on('click','.btnStep', function(){
          var offset = $(this).attr("offset");
          console.log(offset)
          paging(offset)
          $('#inputOffset').val(offset)
        })
        $('#getTabel').on('click','.pilih', function(){
          var id = $(this).attr("data");
          var lamaranId = $(this).attr("lamaranId");
          $('#modal-recruitment').modal("show");
          $('#filSearchRecruitment').focus();
          getRecruitment();
          $('#inputIdPelamar').val(id)
          $('#inputIdLamaran').val(lamaranId)
        })
        $('#filSearchRecruitment').on('keyup', function(){
          getRecruitment();
        })
        $('#getRecruitment').on('click','.pilihRecruitment', function(){
          var recruitmentId = $(this).attr("data");
          var pelamarId = $('#inputIdPelamar').val();
          var lamaranMasukId = $('#inputIdLamaran').val();
          $.ajax({
            type:'post',
            data:{recruitmentId, pelamarId,lamaranMasukId},
            dataType:'json',
            cache:false,
            async:true,
            url:base_url+'data_master/saveLamaranOutstanding',
            success:function(data){
              if (data.status == 'success') {
                paging(0)
                $('#modal-recruitment').modal("hide");
              }
              Swal.fire(data.message,data.sub_message,data.status)
            },
            error:function(data){
              Swal.fire("gagal Menyimpan Data","Cek Jaringan Perangkat Anda","error")
            }
          })
        })
      })

      function paging(offset) {
        var filSearch = $('#filSearch').val();
        var limit = $('#filLimit').val();
        var filDepartemen = $('#filDepartemen').val();
        var filJabatan = $('#filJabatan').val();
        var filPlant = $('#filPlant').val();
        $.ajax({
          type:'get',
          data:{limit,offset, filSearch, filDepartemen, filJabatan, filPlant},
          cache:true,
          async:true,
          url:base_url+'data_master/getPagingLamaranMasuk',
          success:function(data){
            $('#paging').html(data)
            getTabel(limit,offset, filSearch, filDepartemen, filJabatan, filPlant)
          },
          error:function(data){
            Swal.fire("Gagal Mengambil Data","Cek Jaringan Perangkat Anda","error")
          }
        })
      }
      function getTabel(limit,offset, filSearch, filDepartemen, filJabatan, filPlant) {
        $.ajax({
          type:'get',
          data:{limit,offset, filSearch, filDepartemen, filJabatan, filPlant},
          cache:true,
          false:true,
          url:base_url+'data_master/getDataLamaranMasuk',
          beforeSend:function(data){
            $('#cardTabel').addClass("overlay-spinner");
          },
          success:function(data){
            $('#getTabel').html(data)
          },
          complete:function(data){
            $('#cardTabel').removeClass("overlay-spinner");
          },
          error:function(data){
            Swal.fire("Gagal Mengambil Data","Cek Jaringan Perangkat Anda","error")
          }
        })
      }
      function getRecruitment() {
        var filSearch = $('#filSearchRecruitment').val();
        $.ajax({
          type:'get',
          data:{filSearch},
          dataType:'json',
          cache:true,
          async:true,
          url:base_url+'data_master/getDataRecruitmentBySearch',
          success:function(data){
            $('#getRecruitment').html(data)
          },
          error:function(data){
            $('#getRecruitment').html("<tr><td colspan='12'>Data Tidak Tersedia</td></tr>")
          }
        })
      }
    </script>
  </body>
</html>
