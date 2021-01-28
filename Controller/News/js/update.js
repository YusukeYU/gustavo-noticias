function create() {
    var title = document.getElementById("title").value;
    var slug = document.getElementById("slug").value;
    var description = document.getElementById("description").value;
    var content = document.getElementById("content").value;
    var keyword = document.getElementById("keyword").value;
    var id = document.getElementById('id').value;


    fetch(`http://localhost/gustavo-noticias/Controller/News/NewsUpdate.php`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                id: id,
                title: title,
                slug: slug,
                description: description,
                keyword: keyword,
                content: content,
            }),
        })
        .then(response => response.json())
        .then(jsonBody => {
            if (jsonBody == "Editado com sucesso!") {
                document.getElementById("msg-success").style.display = "inherit";
                document.getElementById("main-form").style.display = "none";
            } else {
                alert(jsonBody);
            }
        });
}