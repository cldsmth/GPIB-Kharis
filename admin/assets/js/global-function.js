function sizeFile(file){
  return file.value != "" ? file.files[0].size : "";
}

function checkFormatImage(value){
  var val = value.toLowerCase();
  var regex = new RegExp("(.*?)\.(jpg|jpeg|png)$");
  if(!(regex.test(val))){
    return false;
  }else{
    return true;
  }
}

//success alert
function successAlert(text){
  Command: toastr["success"](text)
  toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }
}

//error alert
function errorAlert(text){
  Command: toastr["error"](text)
  toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }
}