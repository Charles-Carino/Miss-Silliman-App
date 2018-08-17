</div> <!-- END wrapper -->

<!-- Jquery Core Js -->
<script src="public/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="public/plugins/bootstrap/js/bootstrap.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="public/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="public/plugins/node-waves/waves.js"></script>

<!-- Custom Js -->
<script src="public/js/admin.js"></script>
<script src='public/plugins/datatables/jquery.dataTables.min.js'></script>
<script src='public/plugins/datatables/dataTables.buttons.min.js'></script>
<script src='public/plugins/datatables/dataTables.bootstrap.min.js'></script>
<script src="public/plugins/magnific-popup/magnific-popup.js"></script>
<script src="public/plugins/datatables/dataTables.bootstrap.js"></script>
<script src="public/js/wow.min.js"></script>
<script src="public/js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="public/js/jquery.scrollTo.min.js"></script>
<script src="public/js/jquery.sparkline.min.js"></script>
<script src="public/js/detect.js"></script>
<script src="public/js/fastclick.js"></script>
<script src="public/js/jquery.blockUI.js"></script>

<script src="public/js/imagething.js"></script>
<script>
$(document).ready(function() {

    $('table.datatable').DataTable();
    $('.input-row').css('margin-bottom','5px');
    $('.preList').click(function(event){
      event.preventDefault();
      $('#products .sub-event').removeClass('col-xs-5 col-md-5');
      $('#products .col-input').removeClass('col-xs-7 col-md-7');
      $('#products .item').removeClass('grid-group-item');
      $('#products .item').addClass('list-group-item');
      $('#products .col-input').addClass('col-xs-2 col-md-2');
      $('#products .sub-event').addClass('col-xs-2 col-md-2');
      $('.total').removeClass('col-xs-2 col-md-2');
      $('.total').addClass('col-xs-1 col-md-1');
      $('.input-row').attr('style','height:34px;');
      $('.input-row').css('margin-bottom','5px');
    });
    $('.preGrid').click(function(event){
      event.preventDefault();
      $('.input-row').css('height','');
      $('#products .sub-event').removeClass('col-xs-2 col-md-2');
      $('#products .col-input').removeClass('col-xs-2 col-md-2');
      $('#products .item').removeClass('list-group-item');
      $('#products .item').addClass('grid-group-item');
      $('#products .col-input').addClass('col-xs-7 col-md-7');
      $('#products .sub-event').addClass('col-xs-5 col-md-5');
      $('.total').removeClass('col-xs-1 col-md-1');
      $('.total').addClass('col-xs-5 col-md-5');
    });

    $(".form-line").on("input",".form-control",function(){
      var totalSum = 0;
      var getParam = $(this).attr("class");
      var paramArr = getParam.split(' ');
      rowID = paramArr[3].slice(-2);
      $(".input_"+rowID).each(function(){
          var inputVal = $(this).val();
          if($.isNumeric(inputVal))
            totalSum += parseFloat(inputVal);
      });
      $("#input_total"+rowID).attr('value',totalSum);
    });

    $("button").click(function(){
      var getParam = $(this).attr("data-rel");
      var paramArr = getParam.split('|');
      var judge = paramArr[0];
      var rowID = paramArr[1];
      var judgeEvent = paramArr[2];
      var values = [];

      for(var i = 0; i < 5; i++)
        values[i] = $("#row"+rowID).find("input")[i]['value'];

      $.ajax({
        url: "{{url('/saveCandidate')}}",
        type: 'post',
        postType: 'json',
        data: {
          "_token": "{{csrf_token()}}",
          "values": values,
          "row": rowID,
          "judge": judge,
          "event": judgeEvent,
        },
        success:function(data){
            $("#row"+rowID+" .caption").append('<div id="input_success" class="alert alert-success"><p style="color:white;text-align:center;">Record added!</p></div>').fadeIn(2000);
            $("#input_success").fadeOut(1500,function(){
              $("div").remove('#input_success');
            });
        },
        async:false
      });
    });
});
</script>
</body>

</html>
