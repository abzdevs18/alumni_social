
<?php
  include '../inc/conn_db.php';
  $l = mysqli_query($conn,"SELECT post_like, month FROM reactions GROUP BY month");
  $like = '';

  while($re = mysqli_fetch_assoc($l)){
    $mn = $re['month'];
    $m = mysqli_query($conn,"SELECT SUM(post_like) AS likes, month FROM reactions WHERE month = '$mn' ORDER BY month ");
    $ml = mysqli_fetch_assoc($m);
    $like .= "{ month: '". $ml['month'] ."', value: ". $ml['likes']." },";
    // $kl = $re['num'];
  }
  // echo $r . "<br />";
  $lik = trim($like,'"');
  
  $bar = mysqli_query($conn, "SELECT yearGraduate FROM users GROUP BY yearGraduate");
  $data = '';
  
  while($numl = mysqli_fetch_assoc($bar)){
    $yr = $numl['yearGraduate'];
    $em = mysqli_query($conn, "SELECT Employed FROM users WHERE (Employed = 1 AND yearGraduate = '$yr') AND id != 0 ");
    $num_em = mysqli_num_rows($em);

    $u_em = mysqli_query($conn, "SELECT Unemployed FROM users WHERE (Unemployed = 1 AND yearGraduate = '$yr') AND id != 0 ");
    $num_um = mysqli_num_rows($u_em);
    // $data .= "{y: '". $numl['yearGraduate']."', Employed: ". $numl['em'] .", Unemployed: ".$numl['uem']."}";
    $data .= "{ y: '". $numl['yearGraduate']."', Employed: ". $num_em .", Unemployed: ".$num_um." },";
  }

  $ty = trim($data,'"');

?>

  </main>
<script src="Assets/script/morris/raphael-min.js"></script>
<script src="Assets/script/morris/morris.min.js"></script>
<script src="Assets/slick/slick.min.js"></script>
<!-- animsition.js -->
<script src="Assets/script/animsition.min.js"></script>
<script src="Assets/script/chart.min.js"></script>
<script src="Assets/script/design.js"></script>
<script src="Assets/script/morris-chart.js"></script>
<script src="Assets/script/adminUp.js"></script>
<script src="Assets/script/menuActions.js"></script>
<script src="Assets/script/header.js"></script>
<script>


    $(document).ready(function(){
      $('.feature-item-slide').slick({
      	dots: true,
    		infinite: true,
    		speed: 300,
    		slidesToShow: 1,
    		autoplay:true,
    		autoplaySpeed:2000
      });	

      function profileImg(input) {

        if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function(e) {
            $('#profileImageContainer').attr('src', e.target.result);
          }

          reader.readAsDataURL(input.files[0]);
        }
      }
      
      $("#updateAd").change(function() {
        $('#update_admin_prof').submit();
        profileImg(this);
      });
    });

new Morris.Bar({
  element: 'user-growth',
  data: [<?php echo $ty; ?>],
  xkey: 'y',
  ykeys: ['Employed', 'Unemployed'],
  labels: ['Employed', 'Unemployed']
});

new Morris.Line({
  element: 'myChart',
  data: [<?php echo $lik; ?>],
  xkey: 'month',
  ykeys: ['value'],
  labels: ['month'],
  parseTime: false
});

  </script>
</body>
</html>
