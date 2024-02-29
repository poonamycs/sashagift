// function Search() {
//     var x = document.getElementById("productSearch").value;
//     if (x == ""){
//         return false;
//     }else{
//     	return true;
//     }
// }

$(document).ready(function(){
	// alert("Test1");

	var isshow = sessionStorage.getItem('isshow');
    if (isshow == null) {
        sessionStorage.setItem('isshow', 1);        
        $('#offerModal').modal('show');
    }

	$(document).on('click', '.dropdown-menu', function (e) {
      	e.stopPropagation();
    });

	$("#addtocartForm").validate({
		rules:{
			size:{
				required:true,
			},
			quantity:{
				required:true,
				min: 1,
			},
		},
		messages:{
			size:{ 
				required:"Please Choose Size.",
			},
			quantity:{ 
				required:"Please enter quantity",
				min: "Please select quantity."		
			},
		}
	});

	$("#registerForm").validate({
		rules:{
			name:{
				required:true,
			},
			mobile:{
				required:true,
				minlength:10,
				maxlength:10,
				number:true
			},
			pincode:{
				required:true,
				minlength:6,
				maxlength:6,
				number:true
			},
			email:{
				required:true,
				email:true,
				remote:"/check-email"
			},
			password:{
				required:true,
				minlength:6
			},
			confirm_password:{
				required:true,
				equalTo: "#myPassword"
			}
		},
		messages:{
			name:{ 
				required:"Please enter your name",
			},
			mobile:{
				required:"Please enter phone number",
				minlength: "Please enter valid phone number",
				maxlength: "Please enter valid phone number",
				number: "Please enter digits only"
			},
			pincode:{
				required:"Please enter pincode",
				minlength: "Please enter valid pincode",
				maxlength: "Please enter valid pincode",
				number: "Please enter digits only"
			},
			email:{
				required: "Please enter your email",
				email: "Please enter valid email",
				remote: "Email already exists! please use another email."
			},
			password:{
				required:"Please provide your password",
				minlength: "Your password must be atleast 6 characters long"
			},
			confirm_password:{
				required:"Please confirm password",
				equalTo: "Please enter the same password"
			}
		}
	});

	$("#registerFormPage").validate({
		rules:{
			name:{
				required:true,
			},
			mobile:{
				required:true,
				minlength:10,
				maxlength:10,
				number:true
			},
			pincode:{
				required:true,
				minlength:6,
				maxlength:6,
				number:true
			},
			email:{
				required:true,
				email:true,
				remote:"/check-email"
			},
			password:{
				required:true,
				minlength:6
			},
			confirm_password:{
				required:true,
				equalTo: "#myPassword"
			}
		},
		messages:{
			name:{ 
				required:"Please enter your name",
			},
			mobile:{
				required:"Please enter phone number",
				minlength: "Please enter valid phone number",
				maxlength: "Please enter valid phone number",
				number: "Please enter digits only"
			},
			pincode:{
				required:"Please enter pincode",
				minlength: "Please enter valid pincode",
				maxlength: "Please enter valid pincode",
				number: "Please enter digits only"
			},
			email:{
				required: "Please enter your email",
				email: "Please enter valid email",
				remote: "Email already exists! please use another email."
			},
			password:{
				required:"Please provide your password",
				minlength: "Your password must be atleast 6 characters long"
			},
			confirm_password:{
				required:"Please confirm password",
				equalTo: "Please enter the same password"
			}
		}
	});

	$("#loginForm").validate({
		rules:{
			password:{
				required:true,
			},
			email:{
				required:true,
				email:true,
			}
		},
		messages:{
			password:{
				required:"Please enter your password",
			},
			email:{
				required: "Please enter your email",
				email: "Please enter valid email",
			}
		}
	});

	$("#accountForm").validate({
		rules:{
			name:{
				required:true,
				minlength:2,
				accept: "[a-zA-Z]+"
			},
			address:{
				required:true,
				minlength:10
			},
			city:{
				required:true,
				minlength:2
			},
			state:{
				required:true,
				minlength:2
			},
			country:{
				required:true,
			}
		},
		messages:{
			name:{ 
				required:"Please enter your Name.",
				minlength: "Please enter valid name.",
				accept: "Your Name must contain letters only."		
			}, 
			address:{
				required:"Please provide your address.",
				minlength: "Please enter detail address."
			},
			city:{
				required: "Please enter your city",
				minlength: "Please enter valid city name."
			},
			state:{
				required: "Please enter your state",
				minlength: "Please enter valid state name."
			},
			country:{
				required: "Please enter your country",
			}
		}
	});

	$("#loginForm").validate({
		rules:{
			email:{
				required:true,
				email:true,
			},
			password:{
				required:true,
			}
		},
		messages:{ 
			email:{
				required: "Please enter your email",
				email: "Please enter valid email",
			},
			password:{
				required:"Please enter your password!",
			}
		}
	});

	// user password
	$("#passwordForm").validate({
		rules:{
			current_pwd:{
				required: true,
				minlength:6,
				maxlength:20
			},
			new_pwd:{
				required: true,
				minlength:6,
				maxlength:20
			},
			confirm_pwd:{
				required:true,
				minlength:6,
				maxlength:20,
				equalTo:"#new_pwd"
			}
		},	
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});

	$("#contactForm").validate({
		rules:{
			name:{
				required:true,
			},
			mobile:{
				required:true,
				minlength:10,
				maxlength:10,
				number:true
			},
			email:{
				required:true,
				email:true,
			},
			subject:{
				required:true,
			},
			comment:{
				required:true,
			}
		},
		messages:{
			name:{ 
				required:"Please enter your full name",
			}, 
			mobile:{
				required:"Please enter phone number",
				minlength: "Please enter valid phone number",
				maxlength: "Please enter valid phone number",
				number: "Please enter digits only"
			},
			email:{
				required: "Please enter your email",
				email: "Please enter valid email",
			},
			subject:{
				required: "Please enter subject of your query/suggetion",
			},
			comment:{
				required: "Please enter your query/suggetion.",
			}
		}
	});

	//password strength 
	// $('#myPassword').passtrength({
 //    	minChars: 4,
 //      	passwordToggle: true,
 //      	tooltip: true,
 //      	eyeImg : "images/frontend_images/eye.svg"
 //    });

	$("#bill2ship").click(function(){
		if(this.checked){
			$("#shipping_name").val($("#billing_name").val());
			$("#shipping_address").val($("#billing_address").val());
			$("#shipping_city").val($("#billing_city").val());
			$("#shipping_state").val($("#billing_state").val());
			$("#shipping_pincode").val($("#billing_pincode").val());
			$("#shipping_mobile").val($("#billing_mobile").val());
			$("#shipping_country").val($("#billing_country").val());
		}else{
			$("#shipping_name").val('');
			$("#shipping_address").val('');
			$("#shipping_city").val('');
			$("#shipping_state").val('');
			$("#shipping_pincode").val('');
			$("#shipping_mobile").val('');
			$("#shipping_country").val('');
		}
	});

});

$(document).ready(function(){

	//change price and stock with size
	$("#selSize").change(function(){
		var idSize = $(this).val();
		if(idSize==""){
			return false;
		}
		$.ajax({
			type:'get',
			url:'/get-product-price',
			data:{idSize:idSize},
			success:function(resp){
				// alert(resp);
				var arr = resp.split('#');
				$("#getPrice").html("₹ "+arr[0]);
				$("#price").val(arr[0]);
				if(arr[1]==0){
					// $("#cartButton").hide();
					$("#cartButton").prop('disabled', true);
					$("#Availability").html("<span class='badge badge-danger'> Out of Stock</span>");
				}else{
					// $("#cartButton").show();
					$("#cartButton").prop('disabled', false);
					$("#Availability").html("<span class='badge badge-success'> In Stock</span>");
				}
			},error:function(){
				alert("Error");
			}
		});
	});


	$("#bill2ship").click(function(){
		if(this.checked){
			$("#shipping_name").val($("#billing_name").val());
			$("#shipping_address").val($("#billing_address").val());
			$("#shipping_city").val($("#billing_city").val());
			$("#shipping_state").val($("#billing_state").val());
			$("#shipping_pincode").val($("#billing_pincode").val());
			$("#shipping_mobile").val($("#billing_mobile").val());
			$("#shipping_country").val($("#billing_country").val());
		}else{
			$("#shipping_name").val('');
			$("#shipping_address").val('');
			$("#shipping_city").val('');
			$("#shipping_state").val('');
			$("#shipping_pincode").val('');
			$("#shipping_mobile").val('');
			$("#shipping_country").val('');
		}
	});
	

	// check user current password 
	$("#current_pwd").keyup(function(){
		// alert("Test");
		var current_pwd = $(this).val();
		// alert(current_pwd);
		$.ajax({
			headers: {
			    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			type: 'post',
			url:'/check-user-pwd',
			data:{current_pwd:current_pwd},
			success:function(resp){
				if(resp=="false"){
					$("#chkPwd").html("<font color='red' style='font-size: 13px;'>Current Password is incorrect</font>");
				}else if(resp=="true"){
					$("#chkPwd").html("<font color='green' style='font-size: 13px;'>Current Password is correct</font>");
				}
			},error:function(){
				alert("Error");
			}
		});
	});

	//user password
	$("#passwordForm").validate({
		rules:{
			current_pwd:{
				required: true,
				minlength:6,
				maxlength:20
			},
			new_pwd:{
				required: true,
				minlength:6,
				maxlength:20
			},
			confirm_pwd:{
				required:true,
				minlength:6,
				maxlength:20,
				equalTo:"#new_pwd"
			}
		},	
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});

	$("#updateQty").click(function(){
		alert("Clicked");
	});

});

function selectPaymentMethod(){
	// if($('#payment_details').is(':checked') || $('#COD').is(':checked')){
	if($('#Razorpay').is(':checked') || $('#COD').is(':checked')){
		// alert("checked");
	}else{
		alert("Please Select Payment Method");
		return false;
	}
}

function checkPincode(){
	var pincode = $("#chkPincode").val();
	if(pincode==""){
		alert("Please Enter Pincode"); return false;
	}
	$.ajax({
		type:'post',
		data:{pincode:pincode},
		url:'/check-pincode',
		success:function(resp){			
			if(resp>0){
				$("#pincodeResponse").html("<font color='green' style='font-size: 13px; font-weight: bold'><i class='fa fa-check'></i> This pincode is available for delivery.</font>");
			}else{
				$("#pincodeResponse").html("<font color='red' style='font-size: 13px; font-weight: bold'><i class='fa fa-ban'></i> This pincode is not available for delivery.</font>");
			}
		},error:function(){
			alert("Error");
		}
	});
}

function checkPincodeHeader(){
	var pincode = $("#checkPincode").val();
	if(pincode==""){
		alert("Please Enter Pincode"); return false;
	}
	$.ajax({
		type:'post',
		data:{pincode:pincode},
		url:'/check-pincode',
		success:function(resp){			
			if(resp>0){
				$("#pincodeResponseHeader").html("<font color='white' style='font-size: 13px; font-weight: bold'><i class='fa fa-check'></i> This pincode is available for delivery.</font>");
			}else{
				$("#pincodeResponseHeader").html("<font color='white' style='font-size: 13px; font-weight: bold'><i class='fa fa-ban'></i> This pincode is not available for delivery.</font>");
			}
		},error:function(){
			alert("Error");
		}
	});
}

