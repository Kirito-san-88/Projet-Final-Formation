document.addEventListener("DOMContentLoaded", function (){
    document.getElementById("contact_form").addEventListener("submit",function(event){
        event.preventDefault();

        let fetchData = {
            method: 'post',
            body: new FormData(document.getElementById("contact_form")),
        };

        for (const pair of fetchData.body.entries()) {
            console.log(pair);
        }

// Then pour traiter la réponse, catch en cas d'erreur !
        fetch("add_contact_fetch", fetchData)
            .then(response => response.json())
            .then(json=>{document.getElementById('target').innerHTML=`<strong>${json['message']}</strong>`;})
            .catch(err => console.log(err));
    })
})