<div id="books">
	<span id="book_1"></span>
	<span id="book_2"></span>
</div>
<div id="authors">
	<span id="author_1"></span>
	<span id="author_2"></span>
</div>
<div id="chapters">
	<span id="chapter_1"></span>
	<span id="chapter_2"></span>
</div>
<div id="verses">
	<span id="verse_1"></span>
	<span id="verse_2"></span>
</div>
<div id="output"></div>

<script src="jquery.js"></script>

<script>

	var db;
	var books = ["old-testament","new-testament"];
	var authors = 0;
	var chapters = 0;
	var verses = 0;
	var speed = 0;
	var output = '';
	
	function getBook(book) {
	
		$.getJSON('data/'+book+'.json',function(data){

			db = data;
			authors = db.books.length;
			authors_find()

		});

	}

	function books_find() {

		var books_interval = setInterval(function(){    

			var a = Math.floor(Math.random()*books.length)
			var b = Math.floor(Math.random()*books.length)
			$("#book_1").html(books[a])
			$("#book_2").html(books[b])

			if(a === b){
				clearInterval(books_interval);
				getBook(books[a])
			}

		}, speed); 

	}

	function authors_find() {

		var authors_interval = setInterval(function(){    

			var a = Math.floor(Math.random()*authors)
			var b = Math.floor(Math.random()*authors)
			$("#author_1").html(db.books[a].book)
			$("#author_2").html(db.books[b].book)

			if(a === b){
				clearInterval(authors_interval);
				chapters = db.books[a].chapters.length;
				chapters_find(a)
			}

		}, speed); 

	}

	function chapters_find(book) {

		var stook = book;

		var chapters_interval = setInterval(function(){    

			var a = Math.floor(Math.random()*chapters)
			var b = Math.floor(Math.random()*chapters)
			$("#chapter_1").html(a)
			$("#chapter_2").html(b)

			if(a === b){
				clearInterval(chapters_interval);
				verses = db.books[stook].chapters[a].verses.length
				verses_find(stook, a)
			}

		}, speed); 

	}

	function verses_find(book, chapter) {

		var elf = book;
		var fly = chapter

		var verses_interval = setInterval(function(){    

			var a = Math.floor(Math.random()*verses)
			var b = Math.floor(Math.random()*verses)
			$("#verse_1").html(a)
			$("#verse_2").html(b)

			if(a === b){
				clearInterval(verses_interval);

				var ending = db.books[book].chapters[chapter].verses.length - a;

				$('#output').append("<p>"+db.books[elf].chapters[fly].verses[a].text+"</p>");

			        if (ending > 0) {

			        	for (var i = 0; i < ending; i++) {

			        		if(Math.random()>0.5) {

			        			$('#output').append("<p>"+db.books[elf].chapters[fly].verses[(a+(i+1))].text+"</p>");

			        		} else {
			        			break;
			        		}

			        	}

	        		}

        	}			
			
		}, speed); 

	}

	books_find();

</script>