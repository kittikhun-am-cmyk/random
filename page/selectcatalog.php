<?php 
$new = new HnawStudio;
$resultcatalog = $new->resultcatalog();
?>
<?php 
$use = new HnawStudio;

$resultid = $use->resultid($_SESSION['id']);
$resulthistory = $use->resulthistory();
?>
<div class="page-banner-section-lg bg-image" data-bg="./assets/ปก9999.png" style="background-image: url(./assets/bg-sub.jpg);">

<!--<div class="page-banner-section-lg" style="background-color: #009cde;background-image: radial-gradient(circle farthest-side at center bottom,#009cde,#003087 125%);">-->

  <div class="container">

    <div class="row">

      <div class="col">

        <div class="page-banner text-center">

          <h2 class="white"><a href="#">ร้านค้า</a></h2>

          <ul class="page-breadcrumb">

            <li><a href="?page=home">Home</a></li>

            <li>select</li>

          </ul>

        </div>

      </div>

    </div>

  </div>

</div>

<div class="section pt-20 pb-20">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="bg_content">
						<h3 class="">สินค้าทั้งหมด</h3>
						<hr>
            <div class="row">
          <?php if (empty($resultcatalog)) {
           echo "<center><h1 class='text-dark mt-5'>ยังไม่มีสินค้า ณ ขณะนี้</h1></center>";
           ?> 
         <?php }else{ ?>
           <?php foreach ($resultcatalog as $row) {  ?>

            <div class="col-md-4">

              <div class="card mx mb-3" style="border-radius:10px">
                <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                  <img
                  src="<?php echo $row['image_catalog']; ?>"
                  class="img-fluid w-100"

                  />
                  <a href="#!">
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
                  </a>
                  <span class="d-block p-1 bg-dark text-white mx-auto btn-block"></span>
                </div>
                <div class="card-body">
                  <small><strong><?php echo $row['game']; ?></strong></small>
                  <h5 class="card-title mt-1"><strong><?php echo $row['name_catalog']; ?></strong></h5>
                  <div class="form-outline">
                    <textarea class="form-control bg-light" disabled id="textAreaExample" rows="5" style="resize:none;"><?php echo $row['detail_catalog']; ?></textarea>
                  </div>
                  <p class="text-center h5 mb-3"><?php echo $row['price_catalog']; ?> -. บาท</p>
                  <center> <a href="#!" class="btn text-light col-md-5 mb-3 sasdad" id="<?php echo $row['id']; ?>"   style="background-color:#1E90FF; font-size:14px">รายละเอียด</a>
                    <a href="#!" class="btn text-light col-md-5 mb-3 buy" idpack = "<?php echo $row['id']; ?>" pack="<?php echo $row['name_catalog']; ?>" pricepack = "<?php echo $row['price_catalog']; ?>" style="background-color:#32CD32; font-size:14px">ซื้อสินค้า</a></center>
                  </div>
                </div>

              </div>
            <?php } ?>
          <?php } ?>
          <div
          class="modal fade"
          id="add_data_Modal"
          tabindex="-1"
          aria-labelledby="exampleModalLabel"
          aria-hidden="true"
          >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ข้อมูลสินค้า</h5>
                <button
                type="button"
                class="btn-close"
                data-mdb-dismiss="modal"
                aria-label="Close"
                ></button>
              </div>
              <div class="modal-body">
                <form>
                  <!-- Email input -->

                  <div class="form mb-4">
                    <label class="form-label" for="form1Example1">ชื่อสินค้า</label>
                    <input type="email" id="name_catalog1" disabled class="form-control"  value="<?php echo   $row['name_catalog'];?>" />
                  </div>

                  <!-- Password input -->
                  <div class="form mb-4">
                    <label class="form-label" for="form1Example2">GAME</label>
                    <input type="text" id="game_catalog1" disabled class="form-control" value="<?php echo   $row['game'];?>"/>
                  </div>
                  <div class="form mb-4">
                    <label class="form-label" for="form1Example2">รายละเอียดสินค้า</label>
                    <textarea class="form-control bg-light"  id="detail_catalog1" disabled rows="5" style="resize:none;"><?php echo $row['detail_catalog']; ?></textarea>
                  </div>
                  <div class="form mb-4">
                    <label class="form-label" for="form1Example2">ราคาสินค้า</label>
                    <input type="number" id="price_catalog1" disabled class="form-control" value="<?php echo   $row['price_catalog'];?>"/>
                  </div>
                </form>


              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary " data-mdb-dismiss="modal">
                  OK
                </button>
                
              </div>
            </div>
          </div>
        </div>
        </div>
        </div>

	<div class="card mt-5">
		<div class="card-title text-center h1 bg-dark text-light mb-3">
			<label class="mt-2">ประวัติการซื้อสินค้า</label> <i class="fas fa-history"></i>
		</div>
		<div class="card-body table-responsive ">
			<table class="table">
				<thead>
					<tr>
						<th scope="col">เลขที่</th>
						<th scope="col">บัญชีผู้ใช้</th>
						<th scope="col">ชื่อสินค้า</th>
						<th scope="col">สินค้าที่ได้รับ</th>
						<th scope="col">ราคา</th>
						<th scope="col">วันที่-เวลา</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($resulthistory as $row) {  ?>
						<tr>
							<th><?php echo $row['id']; ?></th>
							<td><?php echo $row['name_buy']; ?></td>
							<td><?php echo $row['name_catalog']; ?></td>
							<td><?php echo $row['item_catalog']; ?></td>
							<td><?php echo $row['price_catalog']; ?> -. บาท</td>
							<td><?php echo $row['date']; ?></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>


        <script type="text/javascript">
          $(".sasdad").click(function(){
            var employee_id = $(this).attr("id"); 
            $.ajax({  
              url:"./system/url/fetch.php",  
              method:"POST",  
              data:{employee_id:employee_id},  
              dataType:"json",  
              success:function(data){  
                $('#name_catalog1').val(data.name_catalog);  
                $('#game_catalog1').val(data.game);  
                $('#detail_catalog1').val(data.detail_catalog);  
                $('#price_catalog1').val(data.price_catalog);  
                $('#link_catalog1').val(data.image_catalog);  
                $('#employee_id').val(data.id);  
                $('#add_data_Modal').modal('show');  

              }  
            });  
          })
        </script>








      </div>
    </div>
  </div>
</div>
</div>
<script type="text/javascript">
  $(".buy").click(function(){
    var idpack = $(this).attr("idpack");
    var pack = $(this).attr("pack");
    var pricepack = $(this).attr("pricepack");
    swal({
      title: "แน่ใจหรือไม่?",
      text: "คุณต้องการซื้อสินค้าชิ้นนี้หรือไม?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        $.ajax({
          type:"POST",
          url:"./system/url/buy.php",
          dataType:"json",
          data:{
            idpack:idpack,
            pack:pack,
            pricepack:pricepack,
          },success:function(data){
            if (data.status == "success") {
              swal({
                title: "ซื้อสินค้า",
                text: "ซื้อสินค้า สำเร็จ!",
                icon: "success",
              }).then((result) => {
                window.location.reload();
              })
            }else{
              swal({
                icon: 'error',
                title: 'สั่งซื้อ',
                text: data.info
              })
            }
          }
        })

      } 
    });

  })
</script>

