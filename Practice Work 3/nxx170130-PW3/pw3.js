$.ajax({
    url: "movies.xml",
    dataType: "xml",
    success: function(data) {
        alert("File is loaded.");
        $("table").append("<tr><th>Title</th><th>Director</th><th>Mpaa-rating</th><th>Genre</th><th>Short description</th><th>IMDB-rating</th><th>Cast</th></tr>");
        $(data).find('movie').each(function(){
            var title = $(this).find('title').text();
            var director = $(this).find('director').text();
            var mpaarating = $(this).find('mpaa-rating').text();
            var genre = "";
            $(this).find('genre').each(function(){
                genre += $(this).text() + ', ';
            });
            genre = genre.substring(0, genre.length - 2);
            var synopsis = "";
            var score = "";
            $(this).find('imdb-info').each(function () {
                synopsis = $(this).find('synopsis').text();
                score = $(this).find('score').text();
            });

            var cast = "";
            $(this).find('cast').each(function () {
                var name = "Name: " + $(this).find('person').attr("name");
                var role = "Role: " + $(this).find('person').attr("role");
                cast = name + ', ' + role;
            });

            var info = '<tr><td> ' + title + '</td><td> ' + director + '</td><td> ' + mpaarating + '</td><td> ' + genre + '</td><td>' + synopsis + '</td><td>' + score + '</td><td>' + cast + '</td></tr>';
            $("table").append(info);
        });
    },
    error: function() { alert("error loading file");  }
});
