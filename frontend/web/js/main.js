$(document).ready(function() {
	$('#getBooks').click(function(){
		$.ajax({
      type: 'GET',
      url: '/api',
    }).done(function(books){
      	renderHtml(books);
      	console.log(books);
    });
	});

	function renderHtml(books) {
		let html = '';
		for(let book of books){
			html += `<tr>
				<th>${book.id}</th>
				<th>${book.title}</th>
				<th>${book.size}</th>
				<th>${book.author}</th>
				<th>${book.heading}</th>
			</tr>`;
		}

		$('#tableBooks tbody').html(html);
	}

});