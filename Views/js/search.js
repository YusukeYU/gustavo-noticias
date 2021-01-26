function create(e) {
    var title = document.getElementById("title").value;

    fetch(`http://localhost/gustavo-noticias/Controller/News/NewsFind.php`, {
        method: 'GET',
        body: {
            title: title
        },
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        }
    })
}