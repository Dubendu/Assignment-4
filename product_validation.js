let productNode=document.getElementById("product_name");
let errNode2=document.getElementById("errorPname");
function validate2(){
    errNode2.innerHTML="";
    productNode.style.backgroundColor="yellow";
    productNode.style.border="2px solid green";
    let pname=productNode.value;
    let regexpress_pname=new RegExp("[a-zA-Z0-9]+");
    if (pname===""){
        errNode2.innerHTML="<b>this field is required.<b>";
        productNode.style.border="2px solid red";
        productNode.style.backgroundColor="pink";
        return false;
    }
    else if(!regexpress_pname.test(pname)){
        errNode2.innerHTML="<b>Name should be only alphanumerics.</b>"
        productNode.style.border="2px solid red";
        productNode.style.backgroundColor="pink";
        return false;
    }
    else
        return true;
}

let productPrice=document.getElementById("product_price");
let errNode3=document.getElementById("errorPrice");
function validate3(){
    errNode3.innerHTML="";
    productPrice.style.backgroundColor="yellow";
    productPrice.style.border="2px solid green";
    let price=productPrice.value;
    let regexpress_price=new RegExp("[+]?([0-9]+(?:[\.][0-9]*)?|\.[0-9]+)");
    if (price===""){
        errNode3.innerHTML="<b>this field is required.<b>";
        productPrice.style.border="2px solid red";
        productPrice.style.backgroundColor="pink";
        return false;
    }
    else if(!regexpress_price.test(price)){
        errNode3.innerHTML="<b>Product price should be in decimal.</b>"
        productPrice.style.border="2px solid red";
        productPrice.style.backgroundColor="pink";
        return false;
    }
    else
        return true;
}

let productImage=document.getElementById("upload_image");
let errNode4=document.getElementById("errorPname");
function validate4(){
    let image=productImage.value;
    let regexpress_image=new RegExp("([^\\s]+(\\.(?i)(jpe?g|png|jfif))$)");
    if(!regexpress_price.test(image)){
        errNode4.innerHTML="<b>Image should be in jpg,jpeg,png,jfif format only.</b>"
        productImage.style.border="2px solid red";
        productImage.style.backgroundColor="pink";
        return false;
    }
    else
        return true;
}

let productCategory=document.getElementById("select_category");
let errNode5=document.getElementById("errorCategory");

function validate5(){
    errNode5.innerHTML="";
    productCategory.style.backgroundColor="yellow";
    productCategory.style.border="2px solid green";
    let category=productCategory.value;
    if (category===""){
        errNode5.innerHTML="<b>this field is required.<b>";
        productCategory.style.border="2px solid red";
        productCategory.style.backgroundColor="pink";
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