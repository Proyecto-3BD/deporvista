let url = "http://192.168.48.5/dameAnuncio";
fetch(url)
.then(function(res){
	return res.json();
})
.then(function(data){
	let body = '';
	data.forEach(function(d){
	body += `<tr><td>${d.src}</td></tr>`;	
	});
			
	document.getElementById('data').innerHTML = body;
})