function message() {
  var name = document.getElementById("name");
  var email = document.getElementById("email");
  var message = document.getElementById("message");
  const loadingButton = document.getElementById("loadingButton");

  if (name.value == "") {
    alert("Enter name");
  } else if (email.value == "") {
    alert("Enter email");
  } else if (message.value == "") {
    alert("Enter message");
  } else {
    loadingButton.classList.add("loading");

    var f = new FormData();
    f.append("n", name.value);
    f.append("e", email.value);
    f.append("m", message.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
      if (r.readyState == 4) {
        var t = r.responseText;
        if (t == "Success") {
          loadingButton.classList.remove("loading");
          name.value = "";
          email.value = "";
          message.value = "";
          alert("Success");
        } else {
          loadingButton.classList.remove("loading");
          alert(t);
        }
      }
    };

    r.open("POST", "process/messageProcess.php", true);
    r.send(f);
  }
}
