function create() {
    var title = document.getElementById("title").value;
    var slug = document.getElementById("slug").value;
    var description = document.getElementById("description").value;
    var content = document.getElementById("content").value;
    var keyword = document.getElementById("keyword").value;
    var fullPath = document.getElementById('photo2').value;
    if (fullPath) {
        var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/'));
        var filename = fullPath.substring(startIndex);
        if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
            filename = filename.substring(1);
        }
    }

    if (filename == null) {
        alert("Necessário anexar uma imagem!");
        return false;
    } else if (filename.substr(-3) != "jpg" && filename.substr(-3) != "png") {
        alert("Formato não aceito, anexe uma imagem em .png ou .jpg!");
        return false;
    }


    fetch(`http://localhost/gustavo-noticias/Controller/News/NewsCreate.php`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                title: title,
                slug: slug,
                description: description,
                keyword: keyword,
                content: content,
                photo: filename,
            }),
        })
        .then(response => response.json())
        .then(jsonBody => {
            if (jsonBody == "Cadastrado com sucesso!") {
                document.getElementById("msg-success").style.display = "inherit";
                document.getElementById("main-form").style.display = "none";
            } else {
                alert(jsonBody);
            }
        })



    const form = new FormData();
    const file = document.querySelector('#photo2').files[0];
    form.append('photo2', file);

    fetch(`http://localhost/gustavo-noticias/Controller/News/NewsAddPhoto.php`, {
        method: 'POST',
        body: form,
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        },
    });
}

function find() {
    var title = document.getElementById("title").value;

    fetch(`http://localhost/gustavo-noticias/Controller/News/NewsFind.php`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                title: title
            }),
        })
        .then(response => response.json())
        .then(jsonBody => {
            // var obj = JSON.parse(jsonBody);
            var newData = JSON.stringify(jsonBody);
            var obj = JSON.parse(newData);
            if (obj.id > 0) {
                document.getElementById("new-form").style.display = "none";
                document.getElementById("news-post").style.display = "inherit";
                document.getElementById("title-finded").innerHTML = obj.title;
                document.getElementById("description").innerHTML = obj.description;
                document.getElementById("content").innerHTML = obj.content;
                document.getElementById("id").value = obj.id;
                document.getElementById("photo").src = '../Views/img/news/' + obj.photo;
            } else {
                alert(jsonBody);
            }
        });

}

function refresh() {
    location.reload();
}

function deletes() {
    var id = document.getElementById("id").value;

    fetch(`http://localhost/gustavo-noticias/Controller/News/NewsDelete.php`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                id: id
            }),
        })
        .then(response => response.json())
        .then(jsonBody => {
            if (jsonBody == "Deletado com sucesso! ") {
                alert(jsonBody);
                location.reload();
            } else {
                alert(jsonBody);
            }
        });
}