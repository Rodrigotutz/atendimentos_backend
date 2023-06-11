const editButton = document.querySelector("#editButton")

editButton.addEventListener("click", () => {
    let name = document.getElementById("name").disabled = false
    let email = document.getElementById("email").disabled = false
    let serviceNumber = document.getElementById("serviceNumber").disabled = false
    let entity = document.getElementById("entity").disabled = false
    let system = document.getElementById("system").disabled = false
    let situation = document.getElementById("situation").disabled = false
    let callCase = document.getElementById("case").disabled = false
    let generalError = document.getElementById("generalError").disabled = false

    let saveButton = document.getElementById("saveButton").classList.remove("d-none")
    editButton.classList.add("d-none")

})