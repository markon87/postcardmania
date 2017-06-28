$(document).ready(function(){
  $(function(){
    $("#contact-form").validate({
      rules:{
        name: {
          required: true,
          minlength: 2
        },
        email: {
          required: true,
          email: true
        },
        phone: {
          required: false,
          number: true
        }
      }
    });
  });
});
