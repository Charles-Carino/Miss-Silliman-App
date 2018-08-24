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
    $('table.specialprojects').DataTable({
      'paging': false,
      'searching': false,
      'order': [2,"desc"],
      "info":     false
    });
    $('table.prepReports').DataTable({
      'paging': false,
      'searching': false,
      'order': [5,"desc"],
      "info": false
    });
    $('table.ranking').DataTable({
      'paging': false,
      'searching': false,
      'order': [2,"desc"],
      "info":     false
    });
    $('table.finalreports').DataTable({
     'paging': false,
     'searching': false,
     'order': [9,"desc"],
     "info":     false
   });
    $('table.seqreport').DataTable({
     'paging': false,
     'searching': false,
     'order': [8,"desc"],
     "info":     false
   });
    $('table.speechresults').DataTable({
     'paging': false,
     'searching': false,
     'order': [4,"desc"],
     "info":     false
   });
   $('table.plsnoscandals').DataTable({
     'paging': false,
     'searching': false,
     'order': [6,"desc"],
     "info":     false
   });
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
      var max = $(this).attr('max');
      var min = $(this).attr('min');
      var num =  $(this).val();
      var getParam = $(this).attr("class").split('input_');
      var prodInput = $(this).attr("class").split('pro_input_');
      var themeInput = $(this).attr("class").split('theme_input_');
      var eveningInput = $(this).attr("class").split('evening_input_');
      var initInput = $(this).attr("class").split('init_input_');
      var seqInput = $(this).attr("class").split('seq_input_');
      var sqInput = $(this).attr("class").split('sq_input_');

      var rowID = getParam[1];
      var prodID = prodInput[1];
      var themeID = themeInput[1];
      var eveID = eveningInput[1];
      var seqID = seqInput[1];
      var initID = initInput[1];
      var sqID = sqInput[1];
      if(parseFloat(num)<min || parseFloat(num)>max ){
          $(this).css("background-color","#f2dede");
          $(this).val('').focus();
          $(this).animate(function(){
              $(this).removeAttr("style").an;
          },1000);
      }else{
        $(this).removeAttr("style");
        if(prodInput[0].indexOf("production") >= 0){
          $(".pro_input_"+prodID).each(function(){
            var inputVal = $(this).val();
            if($.isNumeric(inputVal))
              totalSum += parseFloat(inputVal);
          });
          $("#prodTotal"+prodID).attr('value',totalSum);
        }
        else if(themeInput[0].indexOf("themewear") >= 0){
          $(".theme_input_"+themeID).each(function(){
              var inputVal = $(this).val();
              if($.isNumeric(inputVal))
                totalSum += parseFloat(inputVal);
          });
          $("#themeTotal"+themeID).attr('value',totalSum);
        }else if(eveningInput[0].indexOf("eveninggown") >= 0){
          $(".evening_input_"+eveID).each(function(){
              var inputVal = $(this).val();
              if($.isNumeric(inputVal))
                totalSum += parseFloat(inputVal);
          });
          $("#eveningTotal"+eveID).attr('value',totalSum);
        }else if(seqInput[0].indexOf("seqintrvw") >= 0){
          $(".seq_input_"+seqID).each(function(){
              var inputVal = $(this).val();
              if($.isNumeric(inputVal))
                totalSum += parseFloat(inputVal);
          });
          $("#seqTotal"+seqID).attr('value',totalSum);
        }else if(initInput[0].indexOf("initintrvw") >= 0){
          $(".init_input_"+initID).each(function(){
              var inputVal = $(this).val();
              if($.isNumeric(inputVal))
                totalSum += parseFloat(inputVal);
          });
          $("#initTotal"+initID).attr('value',totalSum);
        }else if(sqInput[0].indexOf("stanquestion") >= 0){
          var x1=0;
          var x2=0;
          var x3=0;

          if($(this).hasClass("one")){

            if(!$.isNumeric($(this).val())) {
              $(this).val(0).select();
              x1 = $(this).val(0);
            }else
              x1 = $(this).val();

            if(!$.isNumeric($("#stanRow"+sqID+" #sq2").val())) {
              $("#stanRow" + sqID + " #sq2").val(0);
              x2 = $("#stanRow" + sqID + " #sq2").val(0);
            }else
              x2=$("#stanRow"+sqID+" #sq2").val();

            if(!$.isNumeric($("#stanRow"+sqID+" #sq3").val())) {
              $("#stanRow" + sqID + " #sq3").val(0);
              x3 = $("#stanRow" + sqID + " #sq3").val(0);
            }else
              x3 = $("#stanRow"+sqID+" #sq3").val();

          }else if($(this).hasClass("two")){

            if(!$.isNumeric($(this).val())) {
              $(this).val(0).select();
              x2 = $(this).val(0);
            }else
              x2=$(this).val();

            if(!$.isNumeric($("#stanRow"+sqID+" #sq1").val())) {
              $("#stanRow"+sqID+" #sq1").val(0);
              x1 = $("#stanRow"+sqID+" #sq1").val();
            }else
              x1 = $("#stanRow"+sqID+" #sq1").val();

            if(!$.isNumeric($("#stanRow"+sqID+" #sq3").val())) {
              $("#stanRow"+sqID+" #sq3").val(0);
              x3 = $("#stanRow"+sqID+" #sq3").val();
            }else
              x3 = $("#stanRow"+sqID+" #sq3").val();

          }else if($(this).hasClass("three")){

            if(!$.isNumeric($(this).val())) {
              $(this).val(0).select();
              x3 = $(this).val();
            }else
              x3 = $(this).val();

            if(!$.isNumeric($("#stanRow"+sqID+" #sq1").val())) {
              $("#stanRow"+sqID+" #sq1").val(0);
              x1 = $("#stanRow"+sqID+" #sq1").val();
            }else
              x1 = $("#stanRow"+sqID+" #sq1").val();

            if(!$.isNumeric($("#stanRow"+sqID+" #sq2").val())) {
              $("#stanRow"+sqID+" #sq2").val(0);
              x2 = $("#stanRow"+sqID+" #sq2").val();
            }else
              x2 = $("#stanRow"+sqID+" #sq2").val();

          }

          totalSum = parseFloat(x1)*.6+parseFloat(x2)*.2+parseFloat(x3)*.2;
          //console.log((x1)*.6+" - "+parseFloat(x2)*.2+" - "+parseFloat(x3) *.2);

          $("#sqTotal"+sqID).val(totalSum.toFixed(2));
        }else{
          $(".input_"+rowID).each(function(){
              var inputVal = $(this).val();
              if($.isNumeric(inputVal))
                totalSum += parseFloat(inputVal);
          });
          $("#input_total"+rowID).attr('value',totalSum);
        }
      }
    });

    $(".input").click(function(){
      var getParam = $(this).attr("data-rel");
      var paramArr = getParam.split('|');
      var judge = paramArr[0];
      var rowID = paramArr[1];
      var judgeEvent = paramArr[2];
      var values = [];

      if(judgeEvent == "Special Projects"){
        var limit = $("#sprow"+rowID).find("input").length;
        for(var i = 0; i < limit; i++)
          values[i] = $("#sprow"+rowID).find("input")[i]['value'];
      }else if(judgeEvent == "Press Launch"){
        var limit = $("#plrow"+rowID).find("input").length;
        for(var i = 0; i < limit; i++)
          values[i] = $("#plrow"+rowID).find("input")[i]['value'];
      }else if(judgeEvent == "Production"){
        var limit = $("#prodRow"+rowID).find("input").length;
        for(var i = 0; i < limit; i++)
          values[i] = $("#prodRow"+rowID).find("input")[i]['value'];
      }else if(judgeEvent == "Theme Wear"){
        var limit = $("#themeRow"+rowID).find("input").length;
        for(var i = 0; i < limit; i++)
          values[i] = $("#themeRow"+rowID).find("input")[i]['value'];
      }else if(judgeEvent == "Evening Gown"){
        var limit = $("#eveRow"+rowID).find("input").length;
        for(var i = 0; i < limit; i++)
          values[i] = $("#eveRow"+rowID).find("input")[i]['value'];
      }else if(judgeEvent == "Sequential Interview"){
        var limit = $("#seqRow"+rowID).find("input").length;
        for(var i = 0; i < limit; i++)
          values[i] = $("#seqRow"+rowID).find("input")[i]['value'];
      }else if(judgeEvent == "Initial Interview"){
        var limit = $("#initRow"+rowID).find("input").length;
        for(var i = 0; i < limit; i++)
          values[i] = $("#initRow"+rowID).find("input")[i]['value'];
      }else if(judgeEvent == "Standard Question"){
        var limit = $("#stanRow"+rowID).find("input").length;
        for(var i = 0; i < limit; i++)
          values[i] = $("#stanRow"+rowID).find("input")[i]['value'];
      }else if(judgeEvent == "Prep Deductions"){
        // console.log($("#preDeduc"+rowID).find("input"));
        var limit = $("#preDeduc"+rowID).find("input").length;
        for(var i = 0; i < limit; i++)
          values[i] = $("#preDeduc"+rowID).find("input")[i]['value'];
      }else if(judgeEvent == "Final Deductions"){
        // console.log($("#finDedRow"+rowID).find("input").length);
        var limit = $("#finDedRow"+rowID).find("input").length;
        for(var i = 0; i < limit; i++)
          values[i] = $("#finDedRow"+rowID).find("input")[i]['value'];
      }else{
        var limit = $("#row"+rowID).find("input").length;
        for(var i = 0; i < limit; i++)
          values[i] = $("#row"+rowID).find("input")[i]['value'];
      }
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
            if(judgeEvent == "Special Projects"){
              $("#sprow"+rowID+" .caption #input_success").remove();
              $("#sprow"+rowID+" .caption").append('<div id="input_success" class="alert alert-success" style="position:absolute;top:0;left: 10px;opacity: .7;padding: 3px;"><p style="color:white;text-align:center;font-size:10px;">Score saved!</p></div>').show(2000);
            }else if(judgeEvent == "Press Launch"){
              $("#plrow"+rowID+" .caption #input_success").remove();
              $("#plrow"+rowID+" .caption").append('<div id="input_success" class="alert alert-success" style="position:absolute;top:0;left: 10px;opacity: .7;padding: 3px;"><p style="color:white;text-align:center;font-size:10px;">Score saved!</p></div>').show(2000);
            }else if(judgeEvent == "Production"){
              $("#prodRow"+rowID+" .caption #input_success").remove();
              $("#prodRow"+rowID+" .caption").append('<div id="input_success" class="alert alert-success" style="position:absolute;top:0;left: 10px;opacity: .7;padding: 3px;"><p style="color:white;text-align:center;font-size:10px;">Score saved!</p></div>').show(2000);
            }else if(judgeEvent == "Theme Wear"){
              $("#themeRow"+rowID+" .caption #input_success").remove();
              $("#themeRow"+rowID+" .caption").append('<div id="input_success" class="alert alert-success" style="position:absolute;top:0;left: 10px;opacity: .7;padding: 3px;"><p style="color:white;text-align:center;font-size:10px;">Score saved!</p></div>').show(2000);
            }else if(judgeEvent == "Evening Gown"){
              $("#eveRow"+rowID+" .caption #input_success").remove();
              $("#eveRow"+rowID+" .caption").append('<div id="input_success" class="alert alert-success" style="position:absolute;top:0;left: 10px;opacity: .7;padding: 3px;"><p style="color:white;text-align:center;font-size:10px;">Score saved!</p></div>').show(2000);
            }else if(judgeEvent == "Sequential Interview"){
              $("#seqRow"+rowID+" .caption #input_success").remove();
              $("#seqRow"+rowID+" .caption").append('<div id="input_success" class="alert alert-success" style="position:absolute;top:0;left: 10px;opacity: .7;padding: 3px;"><p style="color:white;text-align:center;font-size:10px;">Score saved!</p></div>').show(2000);
            }else if(judgeEvent == "Initial Interview"){
              $("#initRow"+rowID+" .caption #input_success").remove();
              $("#initRow"+rowID+" .caption").append('<div id="input_success" class="alert alert-success" style="position:absolute;top:0;left: 10px;opacity: .7;padding: 3px;"><p style="color:white;text-align:center;font-size:10px;">Score saved!</p></div>').show(2000);
            }else if(judgeEvent == "Standard Question"){
              $("#stanRow"+rowID+" .caption #input_success").remove();
              $("#stanRow"+rowID+" .caption").append('<div id="input_success" class="alert alert-success" style="position:absolute;top:0;left: 10px;opacity: .7;padding: 3px;"><p style="color:white;text-align:center;font-size:10px;">Score saved!</p></div>').show(2000);
            }else if(judgeEvent == "Prep Deductions"){
              $("#preDeduc"+rowID+" .caption #input_success").remove();
              $("#preDeduc"+rowID+" .caption").append('<div id="input_success" class="alert alert-success" style="position:absolute;top:0;left: 10px;opacity: .7;padding: 3px;"><p style="color:white;text-align:center;font-size:10px;">Score saved!</p></div>').show(2000);
            }else if(judgeEvent == "Final Deductions"){
              $("#finDedRow"+rowID+" .caption #input_success").remove();
              $("#finDedRow"+rowID+" .caption").append('<div id="input_success" class="alert alert-success" style="position:absolute;top:0;left: 10px;opacity: .7;padding: 3px;"><p style="color:white;text-align:center;font-size:10px;">Score saved!</p></div>').show(2000);
            }else{
              $("#row"+rowID+" .caption #input_success").remove();
              $("#row"+rowID+" .caption").append('<div id="input_success" class="alert alert-success" style="position:absolute;top:0;left: 10px;opacity: .7;padding: 3px;"><p style="color:white;text-align:center;font-size:10px;">Score saved!</p></div>').show(2000);
            }

        },
        async:false
      });
    });

    $(".finalize").click(function(){
       var all = $("#print-pn-initialscore-summ").find("input").length;
       var values = [];
       var key = [];
       console.log($("#print-pn-initialscore-summ").find("input"));
       var j = 0;
       for(var i = 0; i < all;i++){
         if($("#print-pn-initialscore-summ").find("input")[i]['value'] != ''){
           key[j] = $("#print-pn-initialscore-summ").find("input")[j]['dataset']['rel'];
           values[j] = $("#print-pn-initialscore-summ").find("input")[j]['value'];
           // console.log('key '+i+' - j '+j);
         }
         j++;
       }

       $.ajax({
         url: "{{url('/finalizeTop5')}}",
         type: 'post',
         postType: 'json',
         data: {
           "_token": "{{csrf_token()}}",
           "key": key,
           "values": values
         },
         success:function(data){
           $('#finalizeTOP').modal('hide');
         },
         async:false
       });
    });

    $('panel').on( 'click', '.add', function () {
      $("#judgeForm").find("input[type=text]").val("");
      $("#JudgeField-Username").attr("onClick='suggestJUsername()'");
      $("#JudgeField-Username").removeAttr('readonly');
    });

    $('#judgeTable tbody').on( 'click', '.edit', function () {
      var judge = $("#judgeTable").DataTable();
      var data = judge.row($(this).parents('tr')).data();
      var split = data[0].split(',');
      $('#JudgeField-FName').val(split[1]);
      $('#JudgeField-LName').val(split[0]);
      $("#JudgeField-Event").val(data[1]);
      $("#JudgeField-Username").val(data[2]);
      $("#JudgeField-Username").removeAttr('onClick');
      $("#JudgeField-Username").attr('readonly',true);
      $(".editMode").val("edit");
    });

    $('#organizerTable tbody').on( 'click', 'a .edit', function () {
      var org = $("#organizerTable").DataTable();
      var data = org.row($(this).parents('tr')).data();
      var split = data[0].split(',');
      $('#OrgField-FName').val(split[1]);
      $('#OrgField-LName').val(split[0]);
      $("#OrgField-Event").val(data[1]);
      $("#OrgField-Username").val(data[3]);
    });

    $("button.btnRanking").click(function(e){
      var hTitle = $('.tab-pane.active').find('h3:first').text();

      $('.modal-body h3').text(hTitle);
      // e.stopPropagation();
      var hTitle = $(".tab-pane").attr('id');
      var x = $(this).attr("data-rel");
      if(x == "pl"){
        $("table.ranking").dataTable().fnDestroy();
        $(".ranking").find("th.sprs,td.sprs").hide();
        $(".ranking").find("th.plrs,td.plrs").show();
        refreshTable(3);
      }
      else if(x == 'sp'){
        $("table.ranking").dataTable().fnDestroy();
        $(".ranking").find("th.plrs,td.plrs").hide();
        $(".ranking").find("th.sprs,td.sprs").show();
        refreshTable(3);
      }else if(x == 'seq'){
        $("table.ranking").dataTable().fnDestroy();
        $(".ranking").find("th.prod,td.prod").hide();
        $(".ranking").find("th.theme,td.theme").hide();
        $(".ranking").find("th.eve,td.eve").hide();
        $(".ranking").find("th.init,td.init").hide();
        $(".ranking").find("th.sq,td.sq").hide();
        $(".ranking").find("th.seq,td.seq").show();
        refreshTable(2);
      }else if(x == 'prod'){
        $("table.ranking").dataTable().fnDestroy();
        $(".ranking").find("th.seq,td.seq").hide();
        $(".ranking").find("th.theme,td.theme").hide();
        $(".ranking").find("th.eve,td.eve").hide();
        $(".ranking").find("th.init,td.init").hide();
        $(".ranking").find("th.sq,td.sq").hide();
        $(".ranking").find("th.prod,td.prod").show();
        refreshTable(3);
      }else if(x == 'theme'){
        $("table.ranking").dataTable().fnDestroy();
        $(".ranking").find("th.prod,td.prod").hide();
        $(".ranking").find("th.seq,td.seq").hide();
        $(".ranking").find("th.eve,td.eve").hide();
        $(".ranking").find("th.init,td.init").hide();
        $(".ranking").find("th.sq,td.sq").hide();
        $(".ranking").find("th.theme,td.theme").show();
        refreshTable(4);
      }else if(x == 'eve'){
        $("table.ranking").dataTable().fnDestroy();
        $(".ranking").find("th.prod,td.prod").hide();
        $(".ranking").find("th.seq,td.seq").hide();
        $(".ranking").find("th.theme,td.theme").hide();
        $(".ranking").find("th.init,td.init").hide();
        $(".ranking").find("th.sq,td.sq").hide();
        $(".ranking").find("th.eve,td.eve").show();
        refreshTable(5);
      }else if(x == 'init'){
        $("table.ranking").dataTable().fnDestroy();
        $(".ranking").find("th.prod,td.prod").hide();
        $(".ranking").find("th.seq,td.seq").hide();
        $(".ranking").find("th.eve,td.eve").hide();
        $(".ranking").find("th.theme,td.theme").hide();
        $(".ranking").find("th.sq,td.sq").hide();
        $(".ranking").find("th.init,td.init").show();
        refreshTable(6);
      }else if(x == 'sq'){
        $("table.ranking").dataTable().fnDestroy();
        $(".ranking").find("th.prod,td.prod").hide();
        $(".ranking").find("th.seq,td.seq").hide();
        $(".ranking").find("th.eve,td.eve").hide();
        $(".ranking").find("th.init,td.init").hide();
        $(".ranking").find("th.theme,td.theme").hide();
        $(".ranking").find("th.sq,td.sq").show();
        refreshTable(7);
      }

      function refreshTable(col){
        $('table.ranking').DataTable({
          'paging': false,
          'searching': false,
          'order': [col,"desc"],
          'info': false
        });
      }
    });
});
</script>
</body>

</html>
