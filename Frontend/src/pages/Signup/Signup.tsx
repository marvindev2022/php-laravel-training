import { FormEvent, useState } from "react";
import { Link, useNavigate } from "react-router-dom";
import api from "./../../service/instance";
import { notifyError, notifySuccess } from "./../../util/notify";

interface DefaultFrom {
  name: string;
  email: string;
  password: string;
  confirmPassword: string;
}
const defaultForm: DefaultFrom = {
  name: "",
  email: "",
  password: "",
  confirmPassword: "",
};

function SignUp() {
  const navigate = useNavigate();

  const [form, setForm] = useState({ ...defaultForm });

  async function handleSubmit(e: FormEvent) {
    e.preventDefault();

    try {
      if (
        !form.name ||
        !form.email ||
        !form.password ||
        !form.confirmPassword
      ) {
        return notifyError("Todos os campos são obrigatórios.");
      }

      if (form.password !== form.confirmPassword) {
        return notifyError("As senhas precisam ser iguais.");
      }

      const response = await api.post("/usuario", {
        email: form.email,
        nome: form.name,
        senha: form.password,
      });

      if (response.status > 204) {
        return notifyError(response.data);
      }

      notifySuccess("Cadastro realizado.");

      navigate("/");
    } catch (error: any) {
      notifyError(error.response.data.mensagem);
    }
  }

  function handleChangeForm({ target }: any) {
    setForm({ ...form, [target.name]: target.value });
  }

  return (
     

      <div className="content-form-signup">
        <form onSubmit={handleSubmit}>
          <h2>Cadastre-se</h2>

          <div className="container-inputs">
            <label htmlFor="name">Nome</label>
            <input
              type="text"
              name="name"
              value={form.name}
              onChange={handleChangeForm}
            />
          </div>

          <div className="container-inputs">
            <label htmlFor="email">E-mail</label>
            <input
              type="text"
              name="email"
              value={form.email}
              onChange={handleChangeForm}
            />
          </div>

          <div className="container-inputs">
            <label htmlFor="password">Senha</label>
            <input
              type="password"
              name="password"
              value={form.password}
              onChange={handleChangeForm}
            />
          </div>

          <div className="container-inputs">
            <label htmlFor="confirm-password">Confirmação de senha</label>
            <input
              type="password"
              name="confirmPassword"
              value={form.confirmPassword}
              onChange={handleChangeForm}
            />
          </div>

          <button className="btn-purple btn-big">Cadastrar</button>

  
        </form>
      </div>
  );
}

export default SignUp;
