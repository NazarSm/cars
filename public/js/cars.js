$(document).ready( function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });

    $('select.brand').on('keyup change', function () {
        $('select.model').empty();
      /* var id =  $('select.brands').val();*/
       var data = {
         id:  $('select.brand').val()
       };
       $.post('/get_models', data, function (result) {
           console.log(result);
           $.each(result, function(key, value) {
               $('select.model').append('<option value="' + value['name'] + '">' + value['name'] + '</option>');
           });
       });
    });


});
