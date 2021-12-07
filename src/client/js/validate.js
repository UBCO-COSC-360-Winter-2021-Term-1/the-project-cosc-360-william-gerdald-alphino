

function isBlank(inputField)
{
    if (inputField.value=="" || inputField.value==" ")
    {
	     return true;
    }
    return false;
}

function makeRed(inputDiv){
	inputDiv.style.borderColor="red";
  inputDiv.style.background="red";
}

function makeClean(inputDiv){
	inputDiv.style.borderColor="white";
}

window.onload = function() {
    var mainForm = document.getElementById("form");

    mainForm.onsubmit = function(e) {
	     var requiredInputs = document.querySelectorAll(".required");
       var err = false;

	     for (var i=0; i < requiredInputs.length; i++)
       {
	        if( isBlank(requiredInputs[i])) {
		          err |= true;
		          makeRed(requiredInputs[i]);
	        }
	        else {
		          makeClean(requiredInputs[i]);
	        }
	    }
      if (err == true) {
        e.preventDefault();
      }
      else {
        checkPasswordMatch(e);
      }
    }
}