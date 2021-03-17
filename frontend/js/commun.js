/**
 *
 */
class Commun {
	constructor() {}

	getElement(selector) {
		const element = document.querySelector(selector);
		return element;
	}

	retornaURL = (nombre) => {
		const rutas = [
			{
				nombre: 'usuario',
				url: '../backend/api/usuarios.php',
			},
			{
				nombre: 'persona',
				url: '../backend/api/persona.php',
			},
			{
				nombre: 'login',
				url: '../backend/api/login.php',
			},
		];
		const { url } = rutas.find((ruta) => ruta.nombre === nombre);
		return url;
	};

	// Establecer en Local Storage
	setLocalStorage = (name, data) => {
		localStorage.setItem(name, data);
	};
	// Obtener en Local Storage
	getLocalStorage = (name) => {
		let data = localStorage.getItem(name);
		return data;
	};
	deleteLocalStorage = (name) => {
		localStorage.removeItem(name);
	};
}

export default Commun;
