const judulGroup = document.getElementById('judul-group');

function addJudul() {
	let inputTambah = document.getElementById('tambahInput').value;

	while (judulGroup.hasChildNodes()) {
		judulGroup.removeChild(judulGroup.lastChild);
	}

	for (let i = 0; i < inputTambah; i++) {
		// Define input
		const input = document.createElement('input');
		const label = document.createElement('label');
		input.type = 'text';
		input.className = 'form-control';
		label.for = 'jawaban_quiz' + i;
		label.textContent = 'Jawaban Quiz' + i;
		input.name = 'jawaban_quiz' + i;
		judulGroup.appendChild(input);
		// Break
		judulGroup.appendChild(document.createElement("br"));
	}

}
