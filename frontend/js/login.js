/* Agregar la funcionalidad para usuarios */
import Common from './commun.js';
/**
 *
 */
class Login extends Common {
	constructor() {
		super();
		this.email = this.getElement('#input-email');
		this.password = this.getElement('#input-pass');
		this.btnLogin = this.getElement('#btn-login');
		this.formulario = this.getElement('#formularioLogin');
		this.URL = this.retornaURL('login');
		this.divmensaje = this.getElement('#divmensaje');
		this.parmensaje = this.getElement('#parmensaje');
	}

	resetForm = () => {
		this.formulario.reset();
	};

	getById = (id) => {};

	eventoListenerBtnLogin = () => {
		this.btnLogin.addEventListener('click', () => {
			let dataForm = new FormData();
			dataForm.append('opcion', 'validarUsuario');
			dataForm.append('email', this.email.value);
			dataForm.append('password', this.password.value);

			this.serviceAxios(dataForm);
			//this.serviceFetch(dataForm);
		});
	};

	serviceFetch = async (dataForm) => {
		const resp = await fetch(this.URL, {
			method: 'POST',
			body: dataForm,
		});
		const data = await resp.json();
		return data;
	};

	serviceAxios = (dataForm) => {
		axios({
			url: this.URL,
			method: 'post',
			responseType: 'json',
			data: dataForm,
		})
			.then((resp) => {
				const { opc, msj, token } = resp.data;
				this.divmensaje.classList.remove('d-none');
				if (opc === 1) {
					window.location.href = 'home.html';
					this.divmensaje.classList.add('alert-success');
					this.parmensaje.innerHTML = `<strong>Exito!</strong> ${msj}`;
					this.setLocalStorage('token', token);
				} else {
					this.divmensaje.classList.add('alert-warning');
					this.parmensaje.innerHTML = `<strong>Advertencia!</strong> ${msj}`;
					this.deleteLocalStorage('token');
				}
			})
			.catch((err) => {
				console.log(err);
			});
	};
}
export default Login;
