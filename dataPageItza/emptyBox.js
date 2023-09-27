const canonName = document.getElementById("canonical_name")
const objectType = document.getElementById("obj")
const deviceType = document.getElementById("dev")
const date = document.getElementById("date")
const description = document.getElementById("data")
const autor = document.getElementById("aut")
const estatus = document.getElementById("st")
const archiveLink = document.getElementById("archive")
const fileLocation = document.getElementById("file")

const form = document.getElementById("form")

    form.addEventListener("submit", e=> {
        

        let enter = false

            if (canonName.value.length < 5)  {
                enter = true
            }
            if (description.value.length < 5)  {
                enter = true
            }
            if (autor.value.length < 5)  {
                enter = true
            }
            if (estatus.value.length < 5)  {
                enter = true
            }
            if (archiveLink.value.length < 5)  {
                enter = true
            }
            if (fileLocation.value.length < 5)  {
                enter = true
            }

            if (enter) {
                alert("Any box empty")
                e.preventDefault()
            }

    })