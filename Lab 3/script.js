function test(){
    let username = document.getElementById("username").value;
    if(username == ""){
        //alert('please enter the username');
        uError.innerHTML = "please type username first!";
        uError.style.color = "red";

    }else if(username != ""){
    // alert('thank you , '+username);
    uError.innerHTML = "";
    }
}