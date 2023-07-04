var selectElement = document.getElementById("questioninput");

for (var i = 2; i <= 100; i++) {
    var option = document.createElement("option");
    option.value = i;
    option.text = i;
    selectElement.add(option);
}