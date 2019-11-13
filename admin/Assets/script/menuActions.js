  $(document).ready(function(){
    $('#menu-sidebar').click(function(){

      /*DashBoard Response to menu click showing*/
      $('.dashboard').toggleClass('dashTmp');

      /*Alumni Page response*/
      $('.sidebar-menu-container').toggleClass('sidebar-menu-active');
      $('.header-title').toggleClass('tempMenu');
      $('.table-alums').toggleClass('tmpP');
      $('.thead').toggleClass('tmpW');
      console.log("hjh");
    });
    $('body').click(function(){
      var win = $('.sidebar-menu-container').hasClass('sidebar-menu-active');
      if (win) {
      }
    });
  });
  function showProf(id){
      var uid = $('#jkl').val();
      if ($('.showProf').hasClass('showTmp') && uid == id ) {
        $('.showProf').removeClass('showTmp');
      }else{
        $('.showProf').addClass('showTmp');
        console.log('No');
      }
  
    $.ajax({
      url:'sideInfo.php',
      type: 'POST',
      data:{id:id},
      success:function(data){
      var uid = data.id;
        $('.hid').html(data);
        // console.log(data);
      },error:function(err){
        // console.log(err);
      }
    });
    console.log("HUB" + id);
    console.log(uid);
  }

    function showCom(id){
      var uid = '';
      if ($('.showProf').hasClass('showTmp') && uid == id ) {
        uid = $('#jkl').val();
        $('.showProf').removeClass('showTmp');
      }else{
        uid = id;
        $('.showProf').addClass('showTmp');
        console.log('No');
      }
  
    $.ajax({
      url:'comment_info.php',
      type: 'POST',
      data:{id:id},
      success:function(data){
      var uid = data.id;
        $('.hid').html(data);
      }
    });
  }
  $(document).ready(function(){
    $('.msg-email').click(function(){
      $('.send-msg').toggleClass('tmpH');
      $('.email-wrap').toggleClass('tmpS');
      if ($('.user-list').hasClass('userActive')) {
        $('.user-list').removeClass('userActive');
      } else {
        $('.user-list').addClass('userActive');
      }
    });

    $('#emStat').change(function(){
      var v = $(this).val();
      // $("#u-res-msg").show();
      $.post("inc/an_search.php",{
        stat:v
      },function(data){
        $(".na").html(data);
      });
    });
    $("#recipient").keyup(function(){
      var alum = $(this).val();
      // $("#u-res-msg").show();
      $.post("inc/an_search.php",{
        name:alum
      },function(data){
        $(".na").html(data);
      });
    });
  });