	<footer style="border-top: 1px solid var(--borderColor);z-index: 2;bottom: 0px;position: fixed;bottom: 0px;">
		<div class="footDiv">
			<div class="leftFoot">		
				<a href="https://www.facebook.com/clint.distro" target="_blank"><p>Creator</p></a>
			</div>
			<div class="rightFoot">
				<a href="#"><p>Copyright &copy;2018</p></a>
			</div>
		</div>	
	</footer> 
<script>
	$(document).ready(function(){
		$(window).click(function(){
			$('#search_result').fadeOut(100);
		});
	});
	$(document).ready(function(){
	$('.popclick').change(function(){
		var fd = new FormData();
		var photo_data = $(this).prop('files')[0];
		fd.append('feat',photo_data);
		$.ajax({
			url:'inc/featured_img.php',
			type:'POST',
		    processData: false, // important
		    contentType: false, // important
			data:fd,
			beforeSend:function(){
				$('#progress').show();
			},
			success:function(data){
				console.log("success");
			},
			error:function(err){
				console.log(err);
			}
		});
	});
	});
	$(document).ready(function(){
		$(".editIcon").click(function(){
			$("#btn-about-up").show();
		});
		$("#overviewSchool").click(function(){
			$("#addU").fadeToggle();
		});
		$(".uClose").click(function(){
			$("#addU").fadeToggle();;
		});
		$("#employed").click(function(){
			$(this).prop('checked',true);
			$("#addW").fadeToggle();
		});
		$("#unemployed").click(function(){
			// $(this).prop('checked',true);
			// $("#addW").fadeToggle();
			$.ajax({
				url:'inc/unemployed.php',
				success:function(data){
					if (data == 'success') {
					alert("Employment status Updated!!!");
					}
				}
			});
		});


		$(".wClose").click(function(){
			$("#addW").hide();
		});
		$(".adInfor").click(function(){
			$("#contAdd").fadeToggle();
		});
		$(".wClose").click(function(){
			$("#contAdd").hide();
		});



	});

	/*Below script use in education.php file*/
	
	function drp(div_id){
		$('#addU').show();
		console.log(div_id);
	}

	$(document).on('click','.edUpdate',function(){
		
		var id = $(this).attr('id');

		$.ajax({
			url:'inc/update.php',
			type:'POST',
			data:{
				editID:id
			},
			dataType:'json',
			success:function(data){
				console.log(data);
				$('.save').hide();
				$('#addU').show();
				$('.update').show();
				$('.remove').show();
				$('#school').val(data.d.school_name);
				$('#degree').val(data.d.degree);
				$('#year').val(data.f['0']);
				$('#to').val(data.f['1']);
				$('#sch_id').val(data.d.id);

			},
			error:function(err){
				console.log("fai");
			}
		});
	});
	$(document).ready(function(){
		$('.remove').click(function(){
			var ed_id = $('#sch_id').val();
			$.ajax({
				url:'inc/delete.php',
				type:'POST',
				data:{edID:ed_id},
				success:function(data){
					$('#addU').hide();
					console.log(data)
				},
				error:function(err){
					console.log(err);
				}
			});
		});
	});

</script>
</body>
</html>
			