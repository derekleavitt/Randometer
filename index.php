<div id="output"></div>

<script src="jquery.js"></script>

<script>

var books = ["doctrine-and-covenants","book-of-mormon","pearl-of-great-price","new-testament","old-testament"];

var output = '';
var db;
var book_pick = books[Math.floor(Math.random()*books.length)];
var cutter = 3;

console.log("book: "+book_pick)

    $.getJSON('data/'+book_pick+'.json',function(data){
        
        db = data;

        if (book_pick === "doctrine-and-covenants") {

	        var section = Math.floor(Math.random()*db.sections.length);
			console.log("section: "+section)
			var verse = Math.floor(Math.random()*db.sections[section].verses.length)
    		console.log("verse: "+verse)
    		var ending = db.sections[section].verses.length - verse;
	        console.log("ending: "+ending)
	        var cut = Math.floor(Math.random()*ending);
	        console.log("cut: "+cut);

	        if (cut > cutter){
	        	cut = cutter;
	        }

	        if (cut === 0) {

	        	output = output + "<p>"+db.sections[section].verses[(verse)].text+"</p>";

	        } else {

	        	for (var i = 0; i < cut; i++) {
	        		output = output + "<p>"+db.sections[section].verses[(verse+i)].text+"</p>";
	        	}

	        }



        } else {

	       	var book = Math.floor(Math.random()*db.books.length);
	        console.log("author: "+book)
	        
	        var chapter = Math.floor(Math.random()*db.books[book].chapters.length);
	        console.log("chapter: "+chapter)
	        var verse = Math.floor(Math.random()*db.books[book].chapters[chapter].verses.length)
	        console.log("verse: "+verse)
	        var ending = db.books[book].chapters[chapter].verses.length - verse;
	        console.log("ending: "+ending)
	        var cut = Math.floor(Math.random()*ending);
	        console.log("cut: "+cut);
	       	if (cut > cutter){
	        	cut = cutter;
	        }

	        if (cut === 0) {

	        	output = output + "<p>"+db.books[book].chapters[chapter].verses[(verse)].text+"</p>";

	        } else {

	        	for (var i = 0; i < cut; i++) {
	        		output = output + "<p>"+db.books[book].chapters[chapter].verses[(verse+i)].text+"</p>";
	        	}

	        }

        }			

        $('#output').html(output)

    });

</script>