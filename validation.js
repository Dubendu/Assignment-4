let nameNode=document.getElementById("category_name");
let errNode=document.getElementById("error");

function validate(){
    errNode.innerHTML="";
    nameNode.style.backgroundColor="yellow";
    nameNode.style.border="2px solid green";
    let name=nameNode.value;
    let regexpress=new RegExp("[a-zA-Z]+");
    if (name===""){
        errNode.innerHTML="<b>this field is required.<b>";
        nameNode.style.border="2px solid red";
        nameNode.style.backgroundColor="pink";
        return false;
    }
    else if(!regexpress.test(name)){
        errNode.innerHTML="<b>Name should only contains alphabets.</b>"
        nameNode.style.border="2px solid red";
        nameNode.style.backgroundColor="pink";
        return false;
    }
    else
        return true;
}

function validateform(){
    let st=validate();
    return(st);
}
