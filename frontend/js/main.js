const titulo = document.querySelector('#titulo');

document.addEventListener('DOMContentLoaded', () => {
	console.log('iniciando home');
	varificaToken();
});

const varificaToken = () => {
	let dataForm = new FormData();
	dataForm.append('opcion', 'verificarToken');
	dataForm.append('token', getLocalStorage('token'));
	axios({
		url: '../backend/api/login.php',
		method: 'post',
		responseType: 'json',
		data: dataForm,
	})
		.then((resp) => {
			if (resp.data) {
				const { nombre, apellido } = resp.data;
				titulo.innerHTML = `Bienvenid@ ${nombre} ${apellido}`;
			} else {
				titulo.innerHTML = `Bienvenid@ Desconocido`;
				window.location.href = 'login.html';
			}
		})
		.catch((err) => {
			console.log(err);
		});
};

const getLocalStorage = (name) => {
	let data = localStorage.getItem(name);
	return data;
};
