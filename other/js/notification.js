var element_delete = document.getElementById("delete");
var element_div = document.getElementById("container");
element_delete.onclick = function()
{
    element_div.style.visibility = "visible";
    if (element_div.style.visibility == "visible")
    {
        element_div.style.visibility = "hidden";
    }
};
