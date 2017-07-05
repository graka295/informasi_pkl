function cekuser(a) {
  re = /^[ A-Za-z]{1,}$/;
  return re.test(a);
}
function angka(){
      var validasiHuruf = /^[a-zA-Z ]+$/;
      var nilai = $(this).val();
     if(cekuser(nilai)) {
      $(this).popover({trigger: 'manual', content : "Inputan Harus Angka",title : "Warning",placement : 'bottom'});
      $(this).popover('show');
      $(this).addClass("form-control-danger");
      $(this).parent().addClass("has-danger");     
       } 
      else if(isNaN(nilai))
      {
      $(this).popover({trigger: 'manual', content : "Inputan Harus Angka",title : "Warning",placement : 'bottom'});
      $(this).popover('show');
      $(this).addClass("form-control-danger");
      $(this).parent().addClass("has-danger");     
      }
      else{
      $(this).popover('hide');
      $(this).parent().removeClass("form-group has-danger");      
      }  
}
function huruf(){
     var validasiHuruf = /^[a-zA-Z ]+$/;
      var nilai = $(this).val();
	   if(nilai==""){
      $(this).popover('hide');
      $(this).parent().removeClass("form-group has-danger");      
   	    }
	    else if (!cekuser(nilai)) {
      $(this).popover({trigger: 'manual', content : "Inputan Harus Huruf!",title : "Warning",placement : 'bottom'});
      $(this).popover('show');
      $(this).addClass("form-control-danger");
      $(this).parent().addClass("has-danger");     
    	}  
      else{
      $(this).popover('hide');
      $(this).parent().removeClass("form-group has-danger");      
      }    
}
function email(){
      var email = $(this).val();
      var emailfilter = /^\w+[\+\.\w\-]*@([\w\-]+\.)*\w+[\w\-]*\.([a-z]{2,4}|\d+)$/ig;
      var checkval = emailfilter.test(email);
      if(email==""){
  	  $(this).popover('hide');
      $(this).parent().removeClass("form-group has-danger");      
      }
 	    else if (checkval == false) {
      $(this).popover({trigger: 'manual', content : "Email Tidak Valid!",title : "Warning",placement : 'bottom'});
      $(this).popover('show');
      $(this).addClass("form-control-danger");
      $(this).parent().addClass("has-danger");		
      }  	
      else{
      $(this).popover('hide');
      $(this).parent().removeClass("form-group has-danger");      
      }
}
function selected(){
    $(this).parent().removeClass("form-group has-danger");    
}
function alamat(){
  if($(this).val()==""){
     $(this).parent().removeClass("form-group has-danger");      
  }
  else{
    $(this).parent().removeClass("form-group has-danger");     
  }
}