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
                <div class="card mb-5">
                  <div class="card-body">
                    <p class="mb-0">Examples and usage guidelines for form control styles and layout options.</p>
                    <button type="button" class="btn btn-primary" id="btnTes">tes</button>
                  </div>
                </div>

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
    <script>
      $(document).ready(function(){
        $('#btnTes').on('click', function(){
           var inputJenisPengajuan = 'Operator';
            var inputPengajuan = [];
            var inputPria = [];
            var inputWanita = [];
            var token = 'it@kps0K123rancaKeKDwip4pu21mjlk';
            inputPengajuan.push('HRD-GA/TKK-PRD/2022/12/0006');
            inputPengajuan.push('HRD-GA/TKK-PRD/2023/07/0002');
            inputPengajuan.push('HRD-GA/TKK-PRD/2023/07/0003');
            inputPengajuan.push('HRD-GA/TKK-PRD/2023/07/0001');
            inputPria.push(2)
            inputPria.push(9)
            inputPria.push(1)
            inputPria.push(0)

            inputWanita.push(0)
            inputWanita.push(0)
            inputWanita.push(0)
            inputWanita.push(3)
            var hello = 'a';
           $.ajax({
              headers: { "Accept": "application/json"},
              type: 'POST',
              data:{inputJenisPengajuan, inputPengajuan, inputPria, inputWanita, token},
              dataType:'json',
              url: 'https://administrator.kps.co.id/Api_v2',
              crossDomain: true,
              beforeSend: function(xhr){
                  xhr.withCredentials = true;
            },
              success: function(data){
                Swal.fire(data.message,data.sub_message, data.status)
              },
              error:function(data){
                Swal.fire("Gagal Upload Data!","","error");
              }
           });
        })
      })
    </script>
  </body>
</html>
