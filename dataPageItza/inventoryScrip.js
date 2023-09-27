window.addEventListener('DOMContentLoaded', () => {
    const search = document.querySelector('#search')
    const tableContainer = document.querySelector('#results tbody')
    const resultsContainer = document.querySelector('#resultsContainer')
    const errorsContainer = document.querySelector('.errorsContainer')
    let search_criteria = ''

    if(search){
        search.addEventListener('input', event => {
            search_criteria = event.target.value.toUpperCase()
            showResults()
        })
    }

    // send request using fetch
        const searchData = async () => {
            let searchData = new FormData()
            searchData.append('search_criteria', search_criteria)

            try {

                const response = await fetch('searchDataInventory.php', {              // file name .php
                    method: 'POST',
                    body: searchData
                })

                return response.json()
                
            } catch (error) {
                alert(`${'We have a problen, this is: '}${error.message}`)
                console.log(error)
            }
        } 
        

        
        // funtion to show data
        const showResults = () => {
            searchData()
            .then(dataResults => {
                console.log(dataResults)

                tableContainer.innerHTML = ''

                if (typeof dataResults.data !== 'undefined' && !dataResults.data) {
                    errorsContainer.style.display = 'block'
                    errorsContainer.querySelector('p').innerHTML = `No results` 
                    resultsContainer.style.display = 'none'
                    
                } else {
                    resultsContainer.style.display = 'block'
                    errorsContainer.style.display = 'none'

                    for (const proyect of dataResults) {
                        const row = document.createElement('tr')
                        row.innerHTML = `
                        <td>${proyect.id_dataset}</td>
                        <td>${proyect.canonical_name}</td>
                        <td>${proyect.object_type}</td>
                        <td>${proyect.device_type}</td>
                        <td>${proyect.date_capture}</td>
                        <td>${proyect.data_description}</td>
                        <td>${proyect.name}</td>
                        <td>${proyect.data_status}</td>
                        <td>${proyect.archive_link}</td>
                        <td>${proyect.file_location}</td>
                        `
                        tableContainer.appendChild(row)
                    }
                }

            })
           
        }

    showResults()

} )