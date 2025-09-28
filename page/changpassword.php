<?php 

$use = new HnawStudio;

$resultprofile = $use->resultuser($_SESSION['id']);

$fetchAllhistory = $use->fetchAllhistory($_SESSION['username']);

$fetchAllspin = $use->fetchAllspin();

$fetchtopupall1 = $use->fetchtopupall1();

$authcheck = $use->authcheck();

?>

<link href="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.css" rel="stylesheet">



<script src="https://unpkg.com/tableexport.jquery.plugin/tableExport.min.js"></script>

<script src="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.js"></script>



<script src="https://unpkg.com/bootstrap-table@1.18.3/dist/extensions/export/bootstrap-table-export.min.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>

<div class="page-banner-section-lg bg-image" data-bg="./assets/bg-sub.jpg" style="background-image: url(./assets/bg-sub.jpg);">

	<!--<div class="page-banner-section-lg" style="background-color: #009cde;background-image: radial-gradient(circle farthest-side at center bottom,#009cde,#003087 125%);">-->

		<div class="container">

			<div class="row">

				<div class="col">

					<div class="page-banner text-center">

						<h2 class="white"><a href="#">ข้อมูลส่วนตัว</a></h2>

						<ul class="page-breadcrumb">

							<li><a href="?page=home">Home</a></li>

							<li>setting</li>

						</ul>

					</div>

				</div>

			</div>

		</div>

	</div>

	

	<div class="section pt-20 pb-50">

		<div class="container">

			<div class="row">

				<div class="col-lg-3 d-none d-lg-block">

					<div class="list-group">

						<a style="background-color:#FFCC00" class="list-group-item list-group-item-action asd"><i class="fas fa-user fa-fw text-white"></i><b class="text-white"> ข้อมูลบัญชีผู้ใช้</b></a>

						<button  class="list-group-item list-group-item-action del"><i class="fas fa-sign-out-alt fa-fw"></i> ออกจาระบบ</button>

					</div>

				</div>

				<div class="col-lg-9">

					<div class="card myaccount-content mt-xs-15 ">

						<h3 class="gray">แผงควบคุม ( รายการ ล่าสุด 10 รายการ )</h3>

						<div class="table-responsive">

							<table class="table">

								<thead>

									<tr>

										<th scope="col">ID</th>

										<th scope="col">ของที่ได้รับ</th>

										<th scope="col">ของที่ได้</th>

										<th scope="col">วันที่-เวลา</th>

									</tr>

								</thead>

								<tbody>

									<?php foreach ($fetchAllspin as $row) { ?>

										<tr>

											<th scope="row"><?php echo $row['id']; ?></th>

											<td><?php echo $row['type']; ?></td>

											<td><?php echo $row['item']; ?>&nbsp;</td>

											<td><?php echo $row['date']; ?></td>

										</tr>

									<?php } ?>

								</tbody>

							</table>



							

						</div>

						<hr>

					</div>

				</div>

			</div>

		</div>

	</div>

	<script type="text/javascript">

		$(".del").click(function(){

			$.ajax({

				type:"POST",

				url:"./system/url/logout.php",

				success:function(){

					swal({

						icon: 'success',

						title: 'ออกจากระบบ',

						text: 'ออกจากระบบ สำเร็จ!',

					}).then(function(){

						window.location.reload();

					})

				}

			})



		})

		$(".changpassword").click(function(){

			var oldpassword = $("#oldpassword").val();

			var newpassword = $("#newpassword").val();

			var confirmnewpassword = $("#confirmnewpassword").val();

			$.ajax({

				type:"POST",

				url:"./system/url/changpassword.php",

				dataType:"JSON",

				data:{

					oldpassword:oldpassword,

					newpassword:newpassword,

					confirmnewpassword:confirmnewpassword,

				},success:function(data){

					if (data.status == "success") {

						swal({

							icon: "success",

							title: "เปลี่ยนรหัสผ่าน",

							text: "เปลี่ยนรหัสผ่าน สำเร็จ!",

							button: "OK",

						}).then(function(){

							window.location.reload();

						})

					}else{

						swal({

							title: "เปลี่ยนรหัสผ่าน",

							text: data.info,

							icon: "error",

							button: "OK",

						});

					}

				}

			})

		})

	</script>







	<script>

		var $table = $('#table')

		var $remove = $('#remove')

		var selections = []



		function getIdSelections() {

			return $.map($table.bootstrapTable('getSelections'), function (row) {

				return row.id

			})

		}



		function responseHandler(res) {

			$.each(res.rows, function (i, row) {

				row.state = $.inArray(row.id, selections) !== -1

			})

			return res

		}



		function detailFormatter(index, row) {

			var html = []

			$.each(row, function (key, value) {

				html.push('<p><b>' + key + ':</b> ' + value + '</p>')

			})

			return html.join('')

		}



		function operateFormatter(value, row, index) {

			return [

			'<a class="like" href="javascript:void(0)" title="Like">',

			'<i class="fa fa-heart"></i>',

			'</a>  ',

			'<a class="remove" href="javascript:void(0)" title="Remove">',

			'<i class="fa fa-trash"></i>',

			'</a>'

			].join('')

		}



		window.operateEvents = {

			'click .like': function (e, value, row, index) {

				alert('You click like action, row: ' + JSON.stringify(row))

			},

			'click .remove': function (e, value, row, index) {

				$table.bootstrapTable('remove', {

					field: 'id',

					values: [row.id]

				})

			}

		}



		function totalTextFormatter(data) {

			return 'Total'

		}



		function totalNameFormatter(data) {

			return data.length

		}



		function totalPriceFormatter(data) {

			var field = this.field

			return '$' + data.map(function (row) {

				return +row[field].substring(1)

			}).reduce(function (sum, i) {

				return sum + i

			}, 0)

		}



		function initTable() {

			$table.bootstrapTable('destroy').bootstrapTable({

				height: 550,

				locale: $('#locale').val(),



			})

			$table.on('check.bs.table uncheck.bs.table ' +

				'check-all.bs.table uncheck-all.bs.table',

				function () {

					$remove.prop('disabled', !$table.bootstrapTable('getSelections').length)



      // save your data, here just save the current page

      selections = getIdSelections()

      // push or splice the selections if you want to save all data selections

  })

			$table.on('all.bs.table', function (e, name, args) {

				console.log(name, args)

			})

			$remove.click(function () {

				var ids = getIdSelections()

				$table.bootstrapTable('remove', {

					field: 'id',

					values: ids

				})

				$remove.prop('disabled', true)

			})

		}



		$(function() {

			initTable()



			$('#locale').change(initTable)

		})

	</script>

