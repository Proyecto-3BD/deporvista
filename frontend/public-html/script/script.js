function drop() {
    document.getElementById("dropdownMenuLink").style.backgroundColor = "#205720";
}

function registro() {
    document.getElementById("conect").style.display = "none";
    document.getElementById("registro").style.display = "block";
    document.getElementById("inicio-p").style.backgroundColor = "#369741";
    document.getElementById("inicio-p").style.color = "#000000";

    document.getElementById("registro-p").style.backgroundColor = "#093a0d";
    document.getElementById("registro-p").style.color = "#ffffff";

}

function inicio() {
    document.getElementById("conect").style.display = "block";
    document.getElementById("registro").style.display = "none";
    document.getElementById("inicio-p").style.backgroundColor = "#093a0d";
    document.getElementById("inicio-p").style.color = "#ffffff";

    document.getElementById("registro-p").style.backgroundColor = "#369741";

    document.getElementById("registro-p").style.color = "#000000";


}