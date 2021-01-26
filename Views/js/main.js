function create(e) {
    var title = document.getElementById("title").value;
    var slug = document.getElementById("slug").value;
    var description = document.getElementById("description").value;
    var content = document.getElementById("content").value;
    var photo = document.getElementById("photo").value;
    var keyword = document.getElementById("keyword").value;

    fetch(`http://localhost/gustavo-noticias/Controller/News/NewsCreate.php`, {
            method: 'POST',
            body: {
                title: title,
                slug: slug,
                description: description,
                photo: photo,
                keyword: keyword,
                content: content
            },
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            }
        })
        .then(function(response) {
            console.log(response.text());
            alert(response.json());
        });
}