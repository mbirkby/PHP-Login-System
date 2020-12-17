$(document)
.on("submit", "form.js-register", function(event){
    event.preventDefault();

    alert('Form was submitted')

    return false;
})