

function handleUnderList() {
    const element = document.getElementById("sous");
    if (element.style.display == "block"){
        element.style.display = "none";
    }else{
        element.style.display ="block";
    }
}

function closeForm() {
    document.getElementById("sous").style.display="none";
}


document.getElementById("click").addEventListener("click", openPopup() );
