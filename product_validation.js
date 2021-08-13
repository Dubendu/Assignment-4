let productNode;
let errNode2;
let productPrice;
let errNode3;
let productImage;
let errNode4;
let productCategory;
let errNode5;
$(function(){
    productNode=$("#product_name");
    errNode2=$("#errorPname");
    productPrice=$("#product_price");
    errNode3=$("#errorPrice");
    productImage=$("#upload_image");
    errNode4=$("#errorImage");
    productCategory=$("#select_category");
    errNode5=$("#errorCategory");
    formNode=$('#regForm')
    productNode.blur(function(){
        validate2();
    });
    productPrice.blur(function(){
        validate3();
    });
    productImage.blur(function(){
        validate4();
    });
    productCategory.blur(function(){
        validate5();
    });
    formNode.submit(()=>validateForm());
});

function validate2(){
    errNode2.innerHTML(" ");
    productNode.css({border:'2px solid green',backgroundColor:'yellow'});
    let pname=productNode.val();
    let regexpress_pname=new RegExp("[a-zA-Z0-9]+");
    if (pname===""){
        errNode2.html("<b>this field is required.<b>");
        productNode.css({border:'2px solid red',backgroundColor:'pink'});
        return false;
    }
    else if(!regexpress_pname.test(pname)){
        errNode2.html("<b>Name should be only alphanumerics.</b>");
        productNode.css({border:'2px solid red',backgroundColor:'pink'});
        return false;
    }
    else
        return true;
}


function validate3(){
    errNode3.html("");
    productPrice.css({border:'2px solid green',backgroundColor:'yellow'});
    let price=productPrice.value;
    let regexpress_price=new RegExp("[+]?([0-9]+(?:[\.][0-9]*)?|\.[0-9]+)");
    if (price===""){
        errNode3.html("<b>this field is required.<b>");
        productPrice.css({border:'2px solid red',backgroundColor:'pink'});
        return false;
    }
    else if(!regexpress_price.test(price)){
        errNode3.html("<b>Product price should be in decimal.</b>");
        productPrice.css({border:'2px solid red',backgroundColor:'pink'});
        return false;
    }
    else
        return true;
}


function validate4(){
    let image=productImage.value;
    let regexpress_image=new RegExp("([^\\s]+(\\.(?i)(jpe?g|png|jfif))$)");
    if(!regexpress_price.test(image)){
        errNode4.html("<b>Image should be in jpg,jpeg,png,jfif format only.</b>");
        productImage.css({border:'2px solid red',backgroundColor:'pink'});
        return false;
    }
    else
        return true;
}



function validate5(){
    errNode5.html("");
    productCategory.css({border:'2px solid green',backgroundColor:'yellow'});
    let category=productCategory.value;
    if (category===""){
        errNode5.html("<b>this field is required.<b>");
        productCategory.css({border:'2px solid red',backgroundColor:'pink'});
        return false;
    }
    else
        return true;
}

function validateForm(){
    let st2=validate2();
    let st3=validate3();
    let st4=validate4();
    let st5=validate5();
    return(st2 && st3 && st4 && st5);
}