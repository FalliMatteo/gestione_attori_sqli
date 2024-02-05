function updateInputs(){
    if(document.getElementById("insert_input").checked){
        document.getElementById("form").action = "insert.php";
        document.getElementById("year").classList.remove("blocked");
        document.getElementById("nation").classList.remove("blocked");
    }
    if(document.getElementById("delete_input").checked){
        document.getElementById("form").action = "delete.php";
        document.getElementById("year").classList.add("blocked");
        document.getElementById("nation").classList.add("blocked");
    }
    if(document.getElementById("update_input").checked){
        document.getElementById("form").action = "update.php";
        document.getElementById("year").classList.add("blocked");
        document.getElementById("nation").classList.remove("blocked");
    }
}