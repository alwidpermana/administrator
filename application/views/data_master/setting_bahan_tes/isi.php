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
              <div>
                <section class="scroll-section" id="taskListItems">
                  <h2 class="small-title">Task List Items</h2>
                  <div class="mb-5">
                    <div class="row mb-n2">
                      
                      <div class="col-md-12 mb-2">
                        <div class="card h-100">
                          <div class="card-body">
                            <form id="submit">
                              <input type="hidden" name="inputJenis" value="<?=$this->uri->segment("3")?>">
                              <div class="row">
                                <div class="col-12 table-responsive">
                                  <table class="table table-bordered table-hover text-center w-100" id="datatable">
                                    <thead>
                                      <tr>
                                        <th>Check</th>
                                        <th>Tahap</th>
                                        <th>Objek</th>
                                        <th>Tes</th>
                                        <th>Standar</th>
                                        <th>Nilai</th>
                                        <th>CT</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php foreach ($data as $key): ?>
                                        <tr>
                                          <td>
                                            <div class="d-flex justify-content-center">
                                              <label class="form-check custom-icon mb-0">
                                                <input type="checkbox" class="form-check-input inputPilih" name="inputPilih[]" id="inputPilih<?=$key->pk_default_id?>" data="<?=$key->pk_default_id?>" value="<?=$key->pk_default_id?>" <?=$key->default_id == null ? '' : 'checked'?>/>
                                              </label>  
                                            </div>
                                          </td>
                                          <td><?=$key->default_tahap?></td>
                                          <td><?=$key->default_objek?></td>
                                          <td><?=$key->default_tes?></td>
                                          <td>
                                            <input type="text" class="form-control" name="inputStandar[]" id="inputStandar<?=$key->pk_default_id?>" value="<?=$key->standar == null ? '' : $key->standar?>" <?=$key->default_id == null ? 'disabled':''?>>
                                          </td>
                                          <td>
                                            <input type="number" class="form-control" name="inputNilai[]" id="inputNilai<?=$key->pk_default_id?>" value="<?=$key->nilai?>" <?=$key->default_id == null ? 'disabled':''?>>
                                          </td>
                                          <td>
                                            <input type="number" class="form-control" name="inputCT[]" id="inputCT<?=$key->pk_default_id?>" value="<?=$key->ct?>" <?=$key->default_id == null ? 'disabled':''?>>
                                          </td>
                                        </tr>    
                                      <?php endforeach ?>
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                              <div class="row">
                                <div class="d-grid gap-2 col-4 mx-auto mb-3">
                                  <button type="submit" class="btn btn-primary mb-1 active-scale-down" id="btn-add">Save</button>
                                </div>
                              </div>    
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>

                <!-- Help Text End -->
              </div>
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
    <script type="text/javascript">
      $(document).ready(function(){
        var table = $('#datatable').DataTable( {
          scrollY:        "450px",
          scrollX:        true,
          scrollCollapse: true,
          paging:         false,
          info: false,
          'ordering':false,
          'searching': false,
      } ); 
        $('.inputPilih').on('click', function(){
          var id = $(this).attr("data");
          var status = $('#inputPilih' + id).is(":checked");
          if (status == true) {
            $('#inputStandar'+id).attr("disabled",false)
            $('#inputNilai'+id).attr("disabled",false)
            $('#inputCT'+id).attr("disabled",false)
            $('#inputStandar'+id).val("Lulus");
            $('#inputNilai'+id).val("100");
            $('#inputCT'+id).val("60");
          }else{
            $('#inputStandar'+id).attr("disabled",true)
            $('#inputNilai'+id).attr("disabled",true)
            $('#inputCT'+id).attr("disabled",true)
            $('#inputStandar'+id).val("");
            $('#inputNilai'+id).val("");
            $('#inputCT'+id).val("");
          }
        })

        $('#submit').submit(function(e){
          e.preventDefault();
          var filJenis = $('#filJenis').val();
          $.ajax({
              url:base_url+'data_master/saveStandar',
              type:"post",
              dataType:'json',
              data:new FormData(this), //this is formData
              processData:false,
              contentType:false,
              cache:false,
              async:true,
              beforeSend:function(data){
                $('#btn-add').attr("disabled",true);
              },
              success: function(data){
                if (data.status == 'success') {
                  window.location.href = base_url+'data_master/setting_bahan_tes';
                }
                Swal.fire(data.message,data.sub_message,data.status);
              },
              complete:function(data){
                $('#btn-add').attr("disabled",false);
              },
              error: function(data){
                Swal.fire("Gagal Menyimpan Data","Cek Jaringan Perangkat Anda","error")
              }
           });
      })
      })
    </script>
  </body>
</html>
