

function deleteObject(id, type) {
    output = "";
    switch (type){
        case 1:
        output = "Rechnung";
        type = "bill";
        break;
    case 2:
        output = "Miet-Rechnung";
        type = "rent";
        break;
    case 3:
        output = "Wohnung";
        type = "room";
        break;
    case 4:
        output = "Mieter";
        type = "renter";
        break;
    }
    
    
    Check = confirm("Wollen Sie die " + output + " wirklich löschen?");
    if (Check == true) {
        // Wohnung löschen
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                this.responseText;
            }
        };
        xmlhttp.open("GET", "delete.php?type="+type+"&id=" + id, true);
        xmlhttp.send();
        alert(output + " wurde gelöscht");
        location.reload();
    }
}