function ciagA() {
		let a1 = parseInt(document.getElementById("a1").value);
		let r = parseInt(document.getElementById("r").value);
		let n = parseInt(document.getElementById("n").value);
		
		let wynik = "Ciąg arytmetyczny zawiera wyrazy: "
		
		wynik += a1;
		
		for(let i = 1; i<n; i++) {
			a1 = a1 + r;
			wynik += ", " + a1;
		};
		console.log(wynik);
		
		};