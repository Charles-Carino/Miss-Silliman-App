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

    $(".form-line").on("input",".input_1",function(){
        var totalSum = 0;
        $(".input_1").each(function(){
            var inputVal = $(this).val();
            if($.isNumeric(inputVal))
              totalSum += parseFloat(inputVal);
        });
        $("#input_total1").attr('value',totalSum);
    });
    $(".form-line").on("input",".input_2",function(){
        var totalSum = 0;
        $(".input_2").each(function(){
            var inputVal = $(this).val();
            if($.isNumeric(inputVal))
              totalSum += parseFloat(inputVal);
        });
        $("#input_total2").attr('value',totalSum);
    });
    $(".form-line").on("input",".input_3",function(){
        var totalSum = 0;
        $(".input_3").each(function(){
            var inputVal = $(this).val();
            if($.isNumeric(inputVal))
              totalSum += parseFloat(inputVal);
        });
        $("#input_total3").attr('value',totalSum);
    });
    $(".form-line").on("input",".input_4",function(){
        var totalSum = 0;
        $(".input_4").each(function(){
            var inputVal = $(this).val();
            if($.isNumeric(inputVal))
              totalSum += parseFloat(inputVal);
        });
        $("#input_total4").attr('value',totalSum);
    });
    $(".form-line").on("input",".input_5",function(){
        var totalSum = 0;
        $(".input_5").each(function(){
            var inputVal = $(this).val();
            if($.isNumeric(inputVal))
              totalSum += parseFloat(inputVal);
        });
        $("#input_total5").attr('value',totalSum);
    });
    $(".form-line").on("input",".input_6",function(){
        var totalSum = 0;
        $(".input_6").each(function(){
            var inputVal = $(this).val();
            if($.isNumeric(inputVal))
              totalSum += parseFloat(inputVal);
        });
        $("#input_total6").attr('value',totalSum);
    });
    $(".form-line").on("input",".input_7",function(){
        var totalSum = 0;
        $(".input_7").each(function(){
            var inputVal = $(this).val();
            if($.isNumeric(inputVal))
              totalSum += parseFloat(inputVal);
        });
        $("#input_total7").attr('value',totalSum);
    });
    $(".form-line").on("input",".input_8",function(){
        var totalSum = 0;
        $(".input_8").each(function(){
            var inputVal = $(this).val();
            if($.isNumeric(inputVal))
              totalSum += parseFloat(inputVal);
        });
        $("#input_total8").attr('value',totalSum);
    });
    $(".form-line").on("input",".input_9",function(){
        var totalSum = 0;
        $(".input_9").each(function(){
            var inputVal = $(this).val();
            if($.isNumeric(inputVal))
              totalSum += parseFloat(inputVal);
        });
        $("#input_total9").attr('value',totalSum);
    });
    $(".form-line").on("input",".input_10",function(){
        var totalSum = 0;
        $(".input_10").each(function(){
            var inputVal = $(this).val();
            if($.isNumeric(inputVal))
              totalSum += parseFloat(inputVal);
        });
        $("#input_total10").attr('value',totalSum);
    });

    $("button").click(function(){
      var getParam = $(this).attr("data-rel");
      var paramArr = getParam.split('|');
      var judge = paramArr[0];
      var rowID = paramArr[1];
      var values = [];

      for(var i = 1; i < 5; i++)
        values[i] = $("#row"+rowID).find("input")[i]['value'];

      console.log(values);
        $.ajax({
          url: "{{url('/saveCandidate')}}",
          type: 'post',
          postType: 'json',
          data: {
            "_token": "{{csrf_token()}}",
            "values": values,
            "row": rowID,
            "judge": judge,
            "event": $("#row"+rowID).find("input")[0]['value'],
          },
          success:function(data){
              $(this).html('<div class="alert alert-success"><strong>Record added!</strong>.</p></div>')
          },
          async:false
        });
    });
});
</script>
</body>

</html>
