$(document).ready(function(){



	//get quantity according to category
	$("#category_id").change(function(){
		alert('clicked');
		var idCat = $(this).val();
		if(idCat==""){
			return false;
		}
		$.ajax({
			type:'get',
			url:'/get-item-quantity',
			data:{idCat:idCat},
			success:function(resp){
				$("#getQuantity").html('Available Qty - '+resp);
				if(resp==0){					
					$("#submitButton").prop('disabled', true);
					$("#Availability").html("<span class='text-danger'> <i class='fa fa-ban'></i></span>");
				}else{
					$("#submitButton").prop('disabled', false);
					$("#Availability").html("<span class='text-success'> <i class='fa fa-check'></i></span>");
				}
			},error:function(){
				alert("Check Quantity");
			}
		});
	});

	//get quantity according to category
	$("#selCat").change(function(){
		var idCat = $(this).val();
		if(idCat==""){
			return false;
		}
		$.ajax({
			type:'get',
			url:'/get-item-quantity',
			data:{idCat:idCat},
			success:function(resp){
				$("#getQuantity").html('Available Qty - '+resp);
				if(resp==0){					
					$("#submitButton").prop('disabled', true);
					$("#Availability").html("<span class='text-danger'> <i class='fa fa-ban'></i></span>");
				}else{
					$("#submitButton").prop('disabled', false);
					$("#Availability").html("<span class='text-success'> <i class='fa fa-check'></i></span>");
				}
			},error:function(){
				alert("Check Quantity");
			}
		});
	});

	//check admin password correct or incorrect
	$("#current_pwd").keyup(function(){
		var current_pwd = $("#current_pwd").val();
		$.ajax({
			type:'get',
			url:'/admin/check-pwd',
			data:{current_pwd:current_pwd},
			success:function(resp){
				//alert(resp);
				if(resp=="false"){
					$("#chkPwd").html("<font color='red'>Current Password is Incorrect</font>");
				}else if(resp=="true"){
					$("#chkPwd").html("<font color='green'>Current Password is Correct</font>");
				}
			},error:function(){
				alert("Error");
			}
		});
	});

	
	$('input[type=checkbox],input[type=radio],input[type=file]').uniform();
	
	$('select').select2();
	
	// Form Validation
    $("#stock_distribution").validate({
		rules:{
			category_id:{
				required:true
			},
			quantity:{
				required:true,
				number: true
			},
			vendor:{
				required:true,
			},
			price:{
				required:true,
				number: true
			},
			date:{
				required:true,
				date: true
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
	// Form Validation
    $("#basic_validate").validate({
		rules:{
			required:{
				required:true
			},
			email:{
				required:true,
				email: true
			},
			date:{
				required:true,
				date: true
			},
			url:{
				required:true,
				url: true
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

	// Add Category Validation
    $("#add_category").validate({
		rules:{
			category_name:{
				required:true
			},
			description:{
				required:false,
			},
			url:{
				required:true,
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

	// Add Category Validation
    $("#stock_category").validate({
		rules:{
			category_name:{
				required:true
			},
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

	// Add Product Validation
    $("#add_product").validate({
		rules:{
			category_id:{
				required:true
			},
			product_name:{
				required:true
			},
			product_code:{
				required:true,
			},
			price:{
				required:true,
				number:true
			},
			image:{
				required:true,
			},
			unit:{
				required:true,
			},
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

	// Edit Product Validation
	$("#edit_product").validate({
		rules:{
			category_id:{
				required:true
			},
			product_name:{
				required:true
			},
			product_code:{
				required:true
			},
			price:{
				required:true,
				number:true
			},
			unit:{
				required:true,
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

	// Edit Category Validation
    $("#edit_category").validate({
		rules:{
			category_name:{
				required:true
			},
			description:{
				required:true,
			},
			url:{
				required:true,
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
	
	$("#number_validate").validate({
		rules:{
			min:{
				required: true,
				min:10
			},
			max:{
				required:true,
				max:24
			},
			number:{
				required:true,
				number:true
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
	
	$("#password_validate").validate({
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

	// Add Product Validation
    $("#add_item").validate({
		rules:{
			category_id:{
				required:true
			},
			product_name:{
				required:true
			},
			sku:{
				required:true,
			},
			brand:{
				required:true,
			},
			arrival_date:{
				required:true,
			},
			purchase_price:{
				required:true,
				number:true
			},
			sell_price:{
				required:true,
				number:true
			},
			quantity:{
				required:true,
				number:true
			},
			image:{
				required:true,
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

	// Add vendor form Validation
    $("#add_vendor").validate({
		rules:{
			vname:{
				required:true
			},
			email:{
				required:true,
				email: true,
			},
			vphone:{
				required:true,
				minlength:10,
				maxlength:10,
				number:true
			},
			vpincode:{
				required:true,
				minlength:6,
				maxlength:6,
			},
			password:{
				required:true,
				minlength:8,
			},
			confirm_password:{
				required:true,
				minlength:8,
				equalTo: "#myPassword"
			},
			vaddress:{
				required:true,
			},
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

	// Add vendor form Validation
    $("#order_locate").validate({
		rules:{
			vpincode:{
				required:true,
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

	$("#delAttribute").click(function(){
		if(confirm('Are you sure to delete the Attribute?')){
            return true;
        }
        return false;
	});

	$("#delImage").click(function(){
		if(confirm('Are you sure to delete the Image?')){
            return true;
        }
        return false;
	});

	$("#delPage").click(function(){
		if(confirm('Are you sure to delete the Page?')){
            return true;
        }
        return false;
	});


	// delete category sweetalert
	$(document).on('click','.deleteCategory',function(e){
        var id = $(this).attr('rel');
        var deleteFunction = $(this).attr('rel1');
        swal({
          title: "Are you sure?",
          text: "before deleting this category, delete this category product first",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: "btn-danger",
          confirmButtonText: "Yes, Delete it!",
        },
        function(){
            window.location.href="/admin/"+deleteFunction+"/"+id;
        });
    });

	// delete stock category sweetalert
	$(document).on('click','.deleteStockCategory',function(e){
        var id = $(this).attr('rel');
        var deleteFunction = $(this).attr('rel1');
        swal({
          title: "Are you sure?",
          text: "before deleting this category, delete this category item first",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: "btn-danger",
          confirmButtonText: "Yes, Delete it!",
        },
        function(){
            window.location.href="/admin/"+deleteFunction+"/"+id;
        });
    });

	// delete product sweetalert
	$(document).on('click','.deleteProduct',function(e){
        var id = $(this).attr('rel');
        var deleteFunction = $(this).attr('rel1');
        swal({
          title: "Are you sure?",
          text: "You will not be able to recover this record again!",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: "btn-danger",
          confirmButtonText: "Yes, Delete it!",
        },
        function(){
            window.location.href="/admin/"+deleteFunction+"/"+id;
        });
    });

	// delete stock item sweetalert
	$(document).on('click','.deleteStockItem',function(e){
        var id = $(this).attr('rel');
        var deleteFunction = $(this).attr('rel1');
        swal({
          title: "Are you sure?",
          text: "You will not be able to recover this record again!",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: "btn-danger",
          confirmButtonText: "Yes, Delete it!",
        },
        function(){
            window.location.href="/admin/"+deleteFunction+"/"+id;
        });
    });

	// delete banner sweetalert
	$(document).on('click','.deleteBanner',function(e){
        var id = $(this).attr('rel');
        var deleteFunction = $(this).attr('rel1');
        swal({
          title: "Are you sure?",
          text: "You will not be able to recover this record again!",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: "btn-danger",
          confirmButtonText: "Yes, Delete it!",
        },
        function(){
            window.location.href="/admin/"+deleteFunction+"/"+id;
        });
    });

	// delete offer banner sweetalert
	$(document).on('click','.deleteOfferBanner',function(e){
        var id = $(this).attr('rel');
        var deleteFunction = $(this).attr('rel1');
        swal({
          title: "Are you sure?",
          text: "You will not be able to recover this record again!",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: "btn-danger",
          confirmButtonText: "Yes, Delete it!",
        },
        function(){
            window.location.href="/admin/"+deleteFunction+"/"+id;
        });
    });

	// delete testimonial sweetalert
	$(document).on('click','.deleteTestimonial',function(e){
        var id = $(this).attr('rel');
        var deleteFunction = $(this).attr('rel1');
        swal({
          title: "Are you sure?",
          text: "You will not be able to recover this record again!",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: "btn-danger",
          confirmButtonText: "Yes, Delete it!",
        },
        function(){
            window.location.href="/admin/"+deleteFunction+"/"+id;
        });
    });

	// delete vendor stock item sweetalert
	$(document).on('click','.deleteVendorStockItem',function(e){
        var id = $(this).attr('rel');
        var deleteFunction = $(this).attr('rel1');
        swal({
          title: "Are you sure?",
          text: "You will not be able to recover this record again!",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: "btn-danger",
          confirmButtonText: "Yes, Delete it!",
        },
        function(){
            window.location.href="/admin/"+deleteFunction+"/"+id;
        });
    });

 $(document).ready(function(){
 	alert("Test");
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div style="margin-left:180px;"><input type="text" name="sku[]" placeholder="SKU" style="width:120px;"/> <input type="text" name="size[]" placeholder="Size" style="width:120px;"/> <input type="text" name="price[]" placeholder="Price" style="width:120px;"/> <input type="text" name="stock[]" placeholder="Stock" style="width:120px;"/><a href="javascript:void(0);" class="remove_button">&nbsp;&nbsp;Remove</a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});

});