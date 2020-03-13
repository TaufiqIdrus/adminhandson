const inputTambah = document.getElementById('tambahInput').value;
const judulGroup = document.getElementById('judul-group');

function addJudul() {
  
  for (let i = 0; i < inputTambah; i++) {
      // Define input
      const input = document.createElement('input');
      input.type = 'text';
      input.className = 'form-control';
      input.name = 'judul' + i;
      judulGroup.appendChild(input);
      
      // Break
      judulGroup.appendChild(document.createElement("br"));
    }
  
}

function resetJudul() {
  while(judulGroup.hasChildNodes()) {
    judulGroup.removeChild(judulGroup.lastChild);
  }
}
