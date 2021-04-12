
(function ($) {
    "use strict";


     /*==================================================================
    [ Focus input ]*/
    $('.input100').each(function(){
        $(this).on('blur', function(){
            if($(this).val().trim() != "") {
                $(this).addClass('has-val');
            }
            else {
                $(this).removeClass('has-val');
            }
        })    
    })
  
  
    /*==================================================================
    [ Validate ]*/
    var input = $('.validate-input .input100');

    $('.validate-form').on('submit',function(){
        var check = true;

        for(var i=0; i<input.length; i++) {
            if(validate(input[i]) == false){
                showValidate(input[i]);
                check=false;
            }
        }

        return check;
    });


    $('.validate-form .input100').each(function(){
        $(this).focus(function(){
           hideValidate(this);
        });
    });

    function validate (input) {
        if($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        }
        else {
            if($(input).val().trim() == ''){
                return false;
            }
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }
    
    

})(jQuery);

////by rawan 

$(window).ready(function(){


    $("#addDT").click(function(){
        
        var date = $('#intvDate').val(); 
        var time= $("#intvTime").val(); 
        

        let isValidDate = Date.parse(date);

        if (!isNaN(isValidDate)) {
            var addT= $('<div class="addedT"> </div>').html('<p>'+date+'</p>'+'<p>'+time+'</p>'+'<button class="deleEle" type="button" onClick="removeDiv(this)"><i class="fas fa-times fa-sm"></i></button>'); 
            $("#avaTimes").append(addT);
        }

        let isValidTime = TimeRanges.parse(time);

        if (!isNaN(isValidDate)) {
            var addT= $('<div class="addedT"> </div>').html('<p>'+date+'</p>'+'<p>'+time+'</p>'+'<button class="deleEle" type="button" onClick="removeDiv(this)"><i class="fas fa-times fa-sm"></i></button>'); 
            $("#avaTimes").append(addT);
        }
         
    }); 

})



function removeDiv(elem){
    $(elem).parent('div').remove();
}