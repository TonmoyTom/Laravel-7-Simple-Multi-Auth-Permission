$(document).ready(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('keyup', '#old_password', function(){
         var old_password = $("#old_password").val();
        $.ajax({
            type: 'post',
            url: '/admin/update-password',
            data:{old_password:old_password,},
            success:function(resp){
               if(resp == "false"){
                   $("#chkoldpwd").html("<p  > Current Password is InCorrect </p>").css({"color": "red"});
               }else if(resp =="true"){
                    $("#chkoldpwd").html("<p  > Current Password is Correct</p>").css({"color": "green"});
               }
            },error:function(){
                alert("eroor");
            }
        });


    });

    





  
    


  

      $('#order-listing').DataTable( {
        // dom: 'Blfrtip',
        // buttons: [
        //     'copy', 'csv', 'excel', 'pdf', 'print'
        // ]
    } );

    $('.js-example-basic-multiple').select2();



    // $("#exampleCheck1").click(function(){
    //     if($(this).is(":checked")){
    //         $('input[type=checkbox]').prop('checked',true);        
    //     }else{
    //         $('input[type=checkbox]').prop('checked',false);  
    //     }
    // });

    // function checkPermissionByGroup(className, checkThis){
    //     const groupIdName = $("#"+checkThis.id);
    //     const classCheckBox = $('.'+className+' input');
    //     if(groupIdName.is(':checked')){
    //          classCheckBox.prop('checked', true);
    //      }else{
    //          classCheckBox.prop('checked', false);
    //      }
    //  }
});