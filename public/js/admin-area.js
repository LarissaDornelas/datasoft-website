function changeContent() {
    let cardArea = document.getElementById("card-area");
    let editArea = document.getElementById("edit-area");
    if (cardArea.style.display == "block") {
        cardArea.style.display = "none";
        editArea.style.display = "block";
    } else {
        cardArea.style.display = "block";
        editArea.style.display = "none";
    }
}
