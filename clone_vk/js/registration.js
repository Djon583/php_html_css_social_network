$(function() {

  $("#fname_error_message").hide();
  $("#sname_error_message").hide();
  $("#password_error_message").hide();
  $("#retype_password_error_message").hide();
  $("#old_password_error_message").hide();
  $("#confirm_old_password_error_message").hide();

  var error_fname = false;
  var error_sname = false;
  var error_email = false;
  var error_password = false;
  var error_retype_password = false;

  $("#name").focusout(function(){
    check_fname();
  });
  $("#surname").focusout(function() {
    check_sname();
  });

  $("#password1").focusout(function() {
    check_password();
  });
  $("#password2").focusout(function() {
    check_retype_password();
  });
  $("#old-password").focusout(function() {
    check_old_password();
  });
  $("#confirm-old-password").focusout(function() {
    check_old_password();
  });

  function check_fname() {
    var pattern = /^[a-zA-Z]*$/;
    var fname = $("#name").val();
    if (pattern.test(fname) && fname !== '') {
      $("#fname_error_message").hide();
      $("#name").css("border-bottom","2px solid #34F458");
    } else {
      $("#fname_error_message").html("Should contain only Characters");
      $("#fname_error_message").show();
      $("#name").css("border-bottom","2px solid #F90A0A");
      error_fname = true;
    }
  }

  function check_sname() {
    var pattern = /^[a-zA-Z]*$/;
    var sname = $("#surname").val()
    if (pattern.test(sname) && sname !== '') {
      $("#sname_error_message").hide();
      $("#surname").css("border-bottom","2px solid #34F458");
    } else {
      $("#sname_error_message").html("Should contain only Characters");
      $("#sname_error_message").show();
      $("#surname").css("border-bottom","2px solid #F90A0A");
      error_fname = true;
    }
  }

  function check_password() {
    var password_length = $("#password1").val().length;
    if (password_length < 8) {
      $("#password_error_message").html("Atleast 8 Characters");
      $("#password_error_message").show();
      $("#password1").css("border-bottom","2px solid #F90A0A");
      error_password = true;
    } else {
      $("#password_error_message").hide();
      $("#password1").css("border-bottom","2px solid #34F458");
    }
  }

  function check_retype_password() {
    var password = $("#password1").val();
    var retype_password = $("#password2").val();
    if (password != retype_password) {
      $("#retype_password_error_message").html("Passwords Did not Matched");
      $("#retype_password_error_message").show();
      $("#password2").css("border-bottom","2px solid #F90A0A");
      error_retype_password = true;
    } else {
      $("#retype_password_error_message").hide();
      $("#password2").css("border-bottom","2px solid #34F458");
    }
  }
 //=====================================================================
  function check_old_password() {
    var password = $("#old-password").val();
    var retype_password = $("#confirm-old-password").val();
    if (password != retype_password) {
      $("#confirm_old_password_error_message").html("Passwords Did not Matched");
      $("#confirm_old_password_error_message").show();
      $("#confirm-old-password").css("border-bottom","2px solid #F90A0A");
      $("#old-password").css("border-bottom","2px solid #F90A0A");
      error_retype_password = true;
    } else {
      $("#confirm_old_password_error_message").hide();
      $("#old-password").css("border-bottom","2px solid #34F458");
      $("#confirm-old-password").css("border-bottom","2px solid #34F458");
    }
  }


//=====================================================================
  $("#registration_form").submit(function() {
    error_fname = false;
    error_sname = false;
    error_password = false;
    error_retype_password = false;

    check_fname();
    check_sname();
    check_password();
    check_retype_password();

    if (error_fname === false && error_sname === false  && error_password === false && error_retype_password === false) {
      window.location("../layouts/index.php");
    } else {
      alert("Please Fill the form Correctly");
      return false;
    }


  });
});
