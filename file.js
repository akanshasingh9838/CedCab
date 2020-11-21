 $(document).ready(function(){
        $('#fare').hide();
        $('#cabtype').change(function(){
          selectedCabType=$('#cabtype option:selected').text();
          if(selectedCabType == "CedMicro"){
            $('#luggage').attr("disabled",true);
          }
          else{
             $('#luggage').attr("disabled",false);
          }
        });

        $('select[name="pickup"]').on('change',function(){
          let selectedPickType=$(this).val();
          let drop_Childrens=$("select[name='drop']").children();
          $.each(drop_Childrens,function(index , value){
              if($(value).attr('value') === selectedPickType ){
                $(this).hide();
              }
              else{
                  $(this).show();
              }
          });
        });
        
         $('select[name="drop"]').on('change',function(){
          let selectedDropType=$(this).val();
          let pick_Childrens=$("select[name='pickup']").children();
          $.each(pick_Childrens,function(index , value){
              if($(value).attr('value') === selectedDropType ){
                $(this).hide();
              }
              else{
                  $(this).show();
              }
          });
        });     
        var values=[];
        $('#button').click(function(){
          if($('#pickup').val()==null){
            alert("Select Pickup Value")
            return;
          }
          else{
          pickup=$('#pickup').val();
          }

          if($('#drop').val()==null){
            alert("Select drop Value")
            return;
          }
          else{
           drop=$('#drop').val();
          }

          if($('#cabtype').val()==null){
            alert("Select cabtype Value")
            return;
          }
          else{
            cabtype=$('#cabtype').val();
          }
        luggage=$('#luggage').val();
          $.ajax({
            url:'calculate.php',
            type:'POST',
            data:{pickup:pickup,drop:drop,cabtype:cabtype,luggage:luggage
            },
            success:function(result){
              console.log(result);
              $('#fare').show();
              $('#fare').val("Your Total Fare is:  "+result);
              },
            error: function(){
            alert("error");
            }
          });
        });
      });
      function onlynumber(button){
        var code=button.which;
        if(code>31 && (code<48 || code>57))
          return false;
        return true;
      }