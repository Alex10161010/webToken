import Login from './login.js';

const login = new Login();

document.addEventListener('DOMContentLoaded', () => {
	console.log('iniciando login');
	login.eventoListenerBtnLogin();
	login.deleteLocalStorage('token');
});
