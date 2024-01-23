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
                            <select class="select2TopLabel filter" id="filJenis" name="filJenis">
                              <option value="ALL">ALL</option>
                              <option value="Eksternal">Eksternal</option>
                              <option value="Umum">Umum</option>
                              <option value="Admin">Admin</option>
                            </select>
                            <span>Jenis Akun</span>
                          </label>
                        </div>
                        <div class="col-md-8 col-lg-8 col-sm-12 col-12">
                          
                        </div>
                        <div class="col-md-2 col-lg-2 col-sm-12 col-12">
                          <button class="btn btn-primary mb-1 active-scale-down w-100" type="button" id="btnAdd">Tambah User</button>
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
      <div class="modal fade" id="modal-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelDefault" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <label class="form-label">Email</label>
                        <input type="text" id="inputEmail" class="form-control">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <label class="form-label">Nama</label>
                        <input type="text" id="inputNama" class="form-control">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <label class="form-label">Jenis</label>
                        <select class="selectBasic" id="inputJenis">
                          <option value="Eksternal">Eksternal/Desa</option>
                          <option value="Admin">Admin</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" id="btnSave">Save</button>
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
        $('#btnSave').on('click', function(){
          var inputEmail = $('#inputEmail').val();
          var inputNama = $('#inputNama').val();
          var inputJenis = $('#inputJenis').val();
          $.ajax({
            type:'post',
            data:{inputEmail, inputNama, inputJenis},
            dataType:'json',
            cache:true,
            async:true,
            url:base_url+'/data_master/saveUser',
            success:function(data){
              if (data.status == 'success') {
                paging(0);
                $('#modal-user').modal("hide")
                $('#inputEmail').val("")
                $('#inputNama').val("")
              }
              $(data.tagName).focus();
              Swal.fire(data.message,data.sub_message, data.status)
            },
            error:function(data){
              Swal.fire("Gagal Menyimpan Data","Cek Jaringan Perangkat Anda","error");
            }
          })
        })
      })
      function paging(offset) {
        var filSearch = $('#filSearch').val();
        var limit = $('#filLimit').val();
        var filJenis = $('#filJenis').val();
        $.ajax({
          type:'get',
          data:{limit,offset, filSearch, filJenis},
          cache:true,
          async:true,
          url:base_url+'data_master/getPagingAkun',
          success:function(data){
            $('#paging').html(data)
            getTabel(limit,offset, filSearch, filJenis)
          },
          error:function(data){
            Swal.fire("Gagal Mengambil Data","Cek Jaringan Perangkat Anda","error")
          }
        })
      }
      function getTabel(limit,offset, filSearch, filJenis) {
        $.ajax({
          type:'get',
          data:{limit,offset, filSearch, filJenis},
          cache:true,
          false:true,
          url:base_url+'data_master/getDataAkun',
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
    </script>
  </body>
</html>
